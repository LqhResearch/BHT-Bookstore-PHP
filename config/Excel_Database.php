<?php
include PATH_ROOT . 'admin/template/Classes/PHPExcel.php';
include PATH_ROOT . 'admin/template/SimpleXLSXGen.php';

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

    public static function ExportExcel($tableName, $titleTable = [])
    {
        // Lấy data từ cơ sở dữ liệu
        $dataTable = Database::GetData("SELECT * FROM $tableName");

        $xlsx = SimpleXLSXGen::fromArray(array_merge($titleTable, $dataTable), 'Thông tin của ' . $tableName);
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
            'totalRow'   => count($dataTable),
        ];
    }
}