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
                    <h1 class="m-0">Bảng điều khiển</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?=ADMIN_URL?>/dasboard/"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            Báo cáo thống kê
        </div>
    </section>
    <!-- /.content -->
</div>
<?php include '../footer.php'?>