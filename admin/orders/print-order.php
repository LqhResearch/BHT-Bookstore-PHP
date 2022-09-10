<?php include '../../config/config.php'?>
<?php include '../../config/database.php'?>
<?php include '../../config/Helper.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In hoá đơn</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My style -->
    <style>
    .main-logo {
        width: 322px;
        height: 100px;
    }
    </style>
</head>

<?php
    $orderID = isset($_GET['order-id']) ? $_GET['order-id'] : '';
    $sql = "SELECT * FROM orders, users WHERE orders.Username = users.Username AND OrderID = '$orderID'";
    $user = Database::GetData($sql, ['row' => 0]);

    $sql = "SELECT * FROM order_details, books WHERE books.ISBN = order_details.ISBN AND orderID = '$orderID'";
    $books = Database::GetData($sql);

    $sql = "SELECT * FROM orders WHERE OrderID = '$orderID'";
    $order = Database::GetData($sql, ['row' => 0]);
?>

<body>
    <div class="container">
        <div class="text-primary text-center pb-5">
            <h4><b>Cửa hàng bán sách trực tuyến BHT Bookstore</b></h4>
            <img class="main-logo" src="<?='/assets/img/bht_bookstore_logo.png'?>" alt="Image">
        </div>
        <h3 class="text-primary text-center pb-5"><b>HOÁ ĐƠN</b></h3>
        <div class="pb-5">
            <h5 class="text-primary"><b>THÔNG TIN KHÁCH HÀNG</b></h5>
            <p><b>Họ và tên</b>: <?=$user['Fullname']?></p>
            <p><b>Số điện thoại</b>: <?=$user['Phone']?></p>
            <p><b>Email: </b>: <?=$user['Email']?></p>
        </div>
        <div class="pb-5">
            <h5 class="text-primary"><b>CHI TIẾT ĐƠN HÀNG</b></h5>
            <table class="table table-hover table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Mã sách</th>
                        <th>Tên sách</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($books) {
                            foreach ($books as $book) {
                                echo '<tr>
                                    <th>' . $book['ISBN'] . '</th>
                                    <td>' . $book['BookTitle'] . '</td>
                                    <td>' . Helper::Currency($book['Price']) . '</td>
                                    <td>' . $book['Amount'] . '</td>
                                    <td>' . Helper::Currency($book['Price'] * $book['Amount']) . '</td>
                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="100%" class="text-center">Không có dữ liệu</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
            <div class="text-end">
                <p><b>Tổng sản phẩm:</b> <?=Helper::Currency($order['TotalMoney'])?></p>
                <p><b>Phí vận chuyển:</b> 0 ₫</p>
                <p><b>Tổng tiền:</b> <?=Helper::Currency($order['TotalRevenue'])?></p>
                <?php if ($order['Status'] == 1) {?>
                <img style="height: 150px;" src="<?='/assets/img/paid-logo.jpg'?>">
                <?php }?>
            </div>
        </div>
        <button onclick="window.print();" class="btn">
            <b>Link hoá đơn: </b><a href="<?='https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>"><?=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?></a>
        </button>
    </div>
</body>

</html>