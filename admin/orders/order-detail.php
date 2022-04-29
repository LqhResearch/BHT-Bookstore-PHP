<?php include '../header.php'?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?=ADMIN_URL?>/dasboard/" class="brand-link">
        <img src="<?=ROOT_URL?>/assets/img/bht_bookstore_logo.png" alt="BHT Bookstore" style="width: 100%">
    </a>
    <?php include '../sidebar.php'?>
</aside>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chi tiết đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/orders/list.php"><i class="fas fa-truck-loading"></i> Đơn hàng</a>
                        </li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php include '../alert.php'?>

        <div class="container-fluid">
            <div class="row my-2">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Mã sách</th>
                                    <th>Tên sách</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $orderID = isset($_GET['order-id']) ? $_GET['order-id'] : '';
                                    $sql = "SELECT * FROM Order_Details, Books WHERE Books.ISBN = Order_Details.ISBN AND OrderID = '$orderID'";
                                    $books = Database::GetData($sql);

                                    $sql = "SELECT * FROM Orders WHERE OrderID = '$orderID'";
                                    $order = Database::GetData($sql, ['row' => 0]);

                                    if ($books) {
                                        foreach ($books as $book) {
                                            echo '
                                                <tr>
                                                    <th>' . $book['ISBN'] . '</th>
                                                    <td>' . $book['BookTitle'] . '</td>
                                                    <td class="text-center"><img height="60" src="' . ROOT_URL . $book['Thumbnail'] . '" alt="" /></td>
                                                    <td>' . number_format($book['Price']) . ' đ</td>
                                                    <td>' . $book['Amount'] . '</td>
                                                    <td>' . number_format($book['Price'] * $book['Amount']) . 'đ</td>
                                                </tr>
                                            ';
                                        }
                                    } else {
                                        echo '<tr><td colspan="100%" class="text-center">Không có dữ liệu</td></tr>';
                                    }
                                ?>
                                <button type="button" data-toggle="modal" data-target="#modal-edit" hidden>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <p>Tổng sản phẩm: <?=number_format($order['TotalMoney'])?> đ</p>
                            <p>Phí vận chuyển: 0đ</p>
                            <p>Tổng tiền: <?=number_format($order['TotalRevenue'])?> đ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php include '../footer.php'?>

<script>
$(document).ready(function() {
    function GetParameterValues(param) {
        var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < url.length; i++) {
            var urlparam = url[i].split('=');
            if (urlparam[0] == param) {
                return urlparam[1];
            }
        }
    }

    if (GetParameterValues('edit-id') != undefined) {
        document.querySelector("[data-target='#modal-edit']").click();
    }
});

function removeRow(id) {
    if (confirm('Bạn có chắc chắn muốn xoá không?')) {
        window.location = '?del-id=' + id;
    }
}
</script>