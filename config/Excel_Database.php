<?php
include PATH_ROOT . "admin/template/Classes/PHPExcel.php";
include PATH_ROOT . "admin/template/SimpleXLSXGen.php";

class Excel_Database
{
    public static function ImportExcel($filePath)
    {
        // Tiến hành xác thực file
        $objFile = PHPExcel_IOFactory::identify($filePath);
        $objData = PHPExcel_IOFactory::createReader($objFile);
        $objData->setReadDataOnly(true); //Chỉ đọc dữ liệu

        // Load dữ liệu sang dạng đối tượng
        $objPHPExcel = $objData->load($filePath);

        // Chọn trang cần truy xuất
        $sheet = $objPHPExcel->setActiveSheetIndex(0);

        // Lấy ra số dòng cuối cùng
        $totalRow = $sheet->getHighestRow();
        // Lấy ra tên cột cuối cùng và chuyển đổi tên cột đó về vị trí thứ, VD: C là 3, D là 4
        $totalColumn = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());

        // Tạo mảng chứa dữ liệu
        $data = [];

        //Tiến hành lặp qua từng ô dữ liệu
        for ($i = 2; $i <= $totalRow; $i++) {
            for ($j = 0; $j < $totalColumn; $j++) {
                // Tiến hành lấy giá trị của từng ô đổ vào mảng
                $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
            }
        }
        return $data;
    }

    /*public static function ExportExcel($tableName)
    {
    // Lấy data từ cơ sở dữ liệu
    $dataTable = Database::GetData("SELECT * FROM $tableName");

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
    //Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
    //Tạo tiêu đề cho trang. (có thể không cần)
    $excel->getActiveSheet()->setTitle("Thông tin của $tableName");

    // //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

    //Xét in đậm cho khoảng cột
    $excel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);

    //Tạo tiêu đề cho từng cột
    $excel->getActiveSheet()->setCellValue('A1', 'ID')
    ->setCellValue('B1', 'Tên shipper')
    ->setCellValue('C1', 'Số điện thoại');

    // Thực hiện thêm dữ liệu vào từng ô bằng vòng lặp bắt đầu từ dòng bắt đầu = 2
    $numRow = 2;
    foreach ($dataTable as $row) {
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $row[0])
    ->setCellValue('B' . $numRow, $row[1])
    ->setCellValue('C' . $numRow, $row[2]);
    $numRow++;
    }

    // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file ở đây mình lưu file dưới dạng excel2007
    PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');
    }*/

    public static function ExportExcel($tableName, $titleTable = [])
    {
        // Lấy data từ cơ sở dữ liệu
        $dataTable = Database::GetData("SELECT * FROM $tableName");

        $xlsx = SimpleXLSXGen::fromArray(array_merge($titleTable, $dataTable), "Thông tin của " . $tableName);
        $xlsx->setDefaultFont('Times New Roman')->setDefaultFontSize(14);
        $xlsx->downloadAs("$tableName.xlsx"); // hoặc save về thiết bị $xlsx->saveAs('books.xlsx');
    }

    public static function ImportDatabase($tableName, $dataTable)
    {
        $successRow = 0;
        foreach ($dataTable as $dataRow) {
            $sql = "INSERT INTO $tableName VALUES (";
            for ($i = 0; $i < count($dataRow); $i++) {
                if ($i == 0) {
                    $sql .= "'$dataRow[$i]'";
                } else {
                    $sql .= ", '$dataRow[$i]'";}
            }
            $sql .= ')';

            if (Database::NonQuery($sql)) {
                $successRow++;
            }
        }
        return [
            'successRow' => $successRow,
            'totalRow' => count($dataTable),
        ];
    }
}
