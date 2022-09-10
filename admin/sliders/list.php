<?php include '../header.php'?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Add images
        $image_path = '';
        if (isset($_FILES['pic'])) {
            $image_size = $_FILES['pic']['size'];
            $image_path = '/uploads/' . $_FILES['pic']['name'];
            move_uploaded_file($_FILES['pic']['tmp_name'], '../../' . $image_path);
        }

        // Add items
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            if (!empty($name)) {
                $sql = "INSERT INTO sliders VALUES (null, '$name', '$description', '$image_path', $status)";
                if (Database::NonQuery($sql)) {
                    $message = [
                        'type' => 'success',
                        'text' => 'Thêm thành công',
                    ];
                }
            } else {
                $message = [
                    'type' => 'warning',
                    'text' => 'Tên slider không được trống',
                ];
            }
        }

        // Edit items
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $thumbnail = isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            if (!empty($name)) {
                $thumbnail_sql = $image_path != '/uploads/' ? "Thumbnail = '$image_path', " : '';
                $sql = "UPDATE sliders SET SliderName = '$name', Description = '$description', $thumbnail_sql Status = $status WHERE SliderID = $id";
                if (Database::NonQuery($sql)) {
                    $message = [
                        'type' => 'success',
                        'text' => 'Cập nhật thành công',
                    ];
                }
            } else {
                $message = [
                    'type' => 'warning',
                    'text' => 'Tên slider không được trống',
                ];
            }
        }
    }

    // Delete items
    if (isset($_GET['del-id'])) {
        $id = isset($_GET['del-id']) ? $_GET['del-id'] : '';
        $sql = "DELETE FROM sliders WHERE SliderID = $id";

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
                    <h1 class="m-0">Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php include '../alert.php'?>

        <!-- Modal: Add -->
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <form class="modal-content" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Thêm slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="add" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal: Edit -->
        <?php
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $slider = [];
            if ($id != '') {
                $sql = "SELECT * FROM sliders WHERE SliderID = $id";
                $slider = Database::GetData($sql, ['row' => 0]);
            }
        ?>
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <form class="modal-content" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Sửa slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mã slider</label>
                            <input type="text" name="id" value="<?=$slider['SliderID']?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" name="name" value="<?=$slider['SliderName']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="description" value="<?=$slider['Description']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="0" <?=$slider['Status'] == 0 ? 'selected' : ''?>>Khóa</option>
                                <option value="1" <?=$slider['Status'] == 1 ? 'selected' : ''?>>Hoạt động</option>
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
                <button type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i>
                </button>
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
                                    <th>Mã slider</th>
                                    <th>Tên slider</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th width="111">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('sliders', $page, ROW_OF_PAGE);

                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    if ($keyword) {
                                        $keyword = "WHERE SliderName LIKE '%$keyword%'";
                                    }

                                    $sql = "SELECT * FROM sliders $keyword ORDER BY SliderID DESC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    $sliders = Database::GetData($sql);

                                    if ($sliders) {
                                        foreach ($sliders as $slider) {
                                            echo '
                                                <tr>
                                                    <th>' . $slider['SliderID'] . '</th>
                                                    <td>' . $slider['SliderName'] . '</td>
                                                    <td>' . $slider['Description'] . '</td>
                                                    <td><img height="60" src="' . $slider['Thumbnail'] . '" alt="" /></td>
                                                    <td>' . Helper::StatusBadge($slider['Status']) . '</td>
                                                    <td>
                                                        <a href="?edit-id=' . $slider['SliderID'] . '"class="btn btn-warning"><i class="fas fa-marker"></i></a>
                                                        <a onclick="removeRow(' . $slider['SliderID'] . ')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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