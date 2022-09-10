<?php include '../header.php'?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Edit items
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            $accountType = isset($_POST['accountType']) ? $_POST['accountType'] : '';

            $sql = "UPDATE users SET Status = $status, AccountTypeID = $accountType WHERE Username = '$id'";
            if (Database::NonQuery($sql)) {
                $message = [
                    'type' => 'success',
                    'text' => 'Cập nhật thành công',
                ];
            }
        }
    }

    // Delete items
    if (isset($_GET['del-id'])) {
        $id = isset($_GET['del-id']) ? $_GET['del-id'] : '';
        $sql = "DELETE FROM users WHERE Username = '$id'";

        if (Database::NonQuery($sql)) {
            $message = [
                'type' => 'success',
                'text' => 'Xoá thành công',
            ];
        }
    }
?>

<?php include '../sidebar.php'?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php include '../alert.php'?>

        <!-- Modal: Edit -->
        <?php
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $user = [];
            if ($id != '') {
                $sql = "SELECT * FROM users WHERE Username = '$id'";
                $user = Database::GetData($sql, ['row' => 0]);
            }
        ?>
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <form class="modal-content" method="POST">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Sửa tài khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="id" value="<?=$user['Username']?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="0" <?=$user['Status'] == 0 ? 'selected' : ''?>>Khóa</option>
                                <option value="1" <?=$user['Status'] == 1 ? 'selected' : ''?>>Hoạt động</option>
                            </select>
                        </div>
                        <?php
                            $sql = 'SELECT * FROM account_types';
                            $accountTypes = Database::GetData($sql);
                        ?>
                        <div class="form-group">
                            <label>Loại tài khoản</label>
                            <select class="form-control" name="accountType">
                                <?php foreach ($accountTypes as $accountType) {
                                        $selected = $accountType['AccountTypeID'] == $user['AccountTypeID'] ? 'selected' : '';
                                        echo '<option value="' . $accountType['AccountTypeID'] . '" ' . $selected . '>' . $accountType['AccountTypeName'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="edit" class="btn btn-success">Sửa</button>
                    </div>
                </form>
            </div>
        </div>

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
                                    <th>Tên đăng nhập</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Ví tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Loại tài khoản</th>
                                    <th width="113">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('users', $page, ROW_OF_PAGE);

                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    if ($keyword) {
                                        $keyword = "AND (Username LIKE '%$keyword%' OR Fullname LIKE '%$keyword%')";
                                    }

                                    $sql = "SELECT * FROM users, account_types WHERE users.AccountTypeID = account_types.AccountTypeID $keyword LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    $users = Database::GetData($sql);

                                    if ($users) {
                                        foreach ($users as $user) {
                                            echo '
                                                <tr>
                                                    <th>' . $user['Username'] . '</th>
                                                    <td>' . $user['Fullname'] . '</td>
                                                    <td>' . Helper::Phone($user['Phone']) . '</td>
                                                    <td>' . $user['Email'] . '</td>
                                                    <td><img height="50" src="' . $user['Avatar'] . '" alt="" /></td>
                                                    <td>' . Helper::Currency($user['Money']) . '</td>
                                                    <td>' . Helper::StatusBadge($user['Status']) . '</td>
                                                    <td>' . Helper::AccountTypeBadge($user['AccountTypeID']) . '</td>
                                                    <td>
                                                        <a href="?reset-password-id=' . $user['Username'] . '"class="btn btn-info"><i class="fas fa-key"></i></a>
                                                        <a href="?edit-id=' . $user['Username'] . '"class="btn btn-warning"><i class="fas fa-marker"></i></a>
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