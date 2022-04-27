<?php
class Database
{
    private const HOST = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DBNAME = 'bht_bookstore';

    /**
     * Tạo kết nối với CSDL
     */
    private static function Connect()
    {
        $connect = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
        if ($connect->connect_error) {
            die('Connection failed: ' . $connect->connect_error);
        }
        return $connect;
    }

    /**
     * Sử dụng cho câu truy vấn SELECT
     * @param string $query Câu truy vấn
     * @param array $format Định dạng kết quả trả về.
     * $format = ['row' => int, 'cell' => int|string]
     * @return array $arr
     */
    public static function GetData($query, $format = [])
    {
        if (is_array($format)) {
            $connect = self::Connect();
            $resQuery = $connect->query($query);

            if (!$resQuery) {
                die('Invalid query: ' . $connect->error);
            } else {
                $arr = [];
                if ($resQuery->num_rows > 0) {
                    while ($row = $resQuery->fetch_assoc()) {
                        $arr[] = $row;
                    }

                    // Trả về một giá trị theo key hoặc index
                    if (isset($format['cell'])) {
                        $formatRow = isset($format['row']) ? $format['row'] : 0;
                        $formatKey = is_numeric($format['cell']) ? array_keys($arr[$formatRow])[$format['cell']] : $format['cell'];
                        return isset($formatRow) ? $arr[$formatRow][$formatKey] : $arr[0][$formatKey];
                    }

                    // Trả về một dòng dữ liệu tại index
                    if (isset($format['row'])) {
                        return $arr[$format['row']];
                    }
                }
            }
            $connect->close();
            return $arr;
        }
        return [];
    }

    /**
     * Sử dụng cho câu truy vấn SELECT có tính năng phân trang
     */
    public static function GetDataWithPagination($query, $offset = 10, $page = 1)
    {
        $countAll = self::GetData('SELECT count(*) FROM categories', ['cell' => 0]);

        $start = ($page - 1) * $offset;
        $data = self::GetData($query . " LIMIT $start, $offset");
        $end = $start + count($data);
        return [
            'data'        => $data,
            'start'       => $start + 1,
            'end'         => $end,
            'countAll'    => $countAll,
            'page_number' => ceil($countAll / $offset),
        ];
    }

    /**
     * Dùng cho truy vấn INSERT, UPDATE, DELETE
     */
    public static function NonQuery($query)
    {
        $connect = self::Connect();
        $result = $connect->query($query);
        $connect->close();
        return $result == true;
    }
}
