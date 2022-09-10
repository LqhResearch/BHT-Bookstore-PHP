<?php include '../header.php'?>

<?php
    if (isset($_GET['payment'])) {
        $orderID = $_GET['payment'];
        $sql = "UPDATE orders SET Status = 1 WHERE OrderID = '$orderID'";
        Database::NonQuery($sql);
    }
?>

<?php include '../sidebar.php'?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php include '../alert.php'?>

        <div class="container-fluid">
            <div class="row my-2 d-flex-end">
                <form method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Từ khoá" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row my-2">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng đơn hàng</th>
                                    <th>Tiền thanh toán</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày thanh toán</th>
                                    <th>Ngày tạo</th>
                                    <th>Người dùng</th>
                                    <th width="175">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('orders', $page, ROW_OF_PAGE);

                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    if ($keyword) {
                                        $keyword = "WHERE OrderID LIKE '%$keyword%' OR Username LIKE '%$keyword%'";
                                    }

                                    $sql = "SELECT * FROM orders $keyword ORDER BY CreatedAt DESC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    $ordes = Database::GetData($sql);

                                    if ($ordes) {
                                        foreach ($ordes as $order) {
                                            $paymentBtn = $order['Status'] == 0 ? '<a href="?payment=' . $order['OrderID'] . '" class="btn btn-success">Thanh toán</a>' : '';
                                            echo '
                                                <tr>
                                                    <th>' . $order['OrderID'] . '</th>
                                                    <td>' . Helper::Currency($order['TotalMoney']) . '</td>
                                                    <td>' . Helper::Currency($order['TotalRevenue']) . '</td>
                                                    <td>' . Helper::PaymentBadge($order['Status']) . '</td>
                                                    <td>' . Helper::DateTime($order['PaymentDate']) . '</td>
                                                    <td>' . Helper::DateTime($order['CreatedAt']) . '</td>
                                                    <td>' . $order['Username'] . '</td>
                                                    <td>
                                                        <a href="print-order.php?order-id=' . $order['OrderID'] . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        ' . $paymentBtn . '
                                                    </td>
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
                    </div>
                </div>
            </div>

            <div class="row my-2 d-flex-between">
                <div>Hiển thị từ <?=$pager['StartPage']?> đến <?=$pager['EndPage']?> của <?=$pager['TotalItems']?> bản ghi</div>
                <ul class="pagination">
                    <?php
                        for ($i = 1; $i <= $pager['TotalPages']; $i++) {
                            $active = $page == $i ? 'active' : '';
                            echo '<li class="page-item ' . $active . '">
                                <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    ?>
                </ul>
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