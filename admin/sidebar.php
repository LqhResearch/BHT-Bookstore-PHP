<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?=ADMIN_URL?>/dasboard/" class="brand-link">
        <img src="/assets/img/bht_bookstore_logo.png" alt="BHT Bookstore" style="width: 100%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php $avatar = empty($_SESSION['Avatar']) ? '/assets/img/user.png' : $_SESSION['Avatar'];?>
                <img src="<?=$avatar?>" class="img-circle elevation-2" alt="User image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$_SESSION['DisplayName']?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="height: calc(100% - 74px)">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/dashboard/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/categories/list.php" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Thể loại</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/authors/list.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tác giả</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/publishes/list.php" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Nhà xuất bản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/books/list.php" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Sách</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/suppliers/list.php" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Nhà cung cấp</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/orders/list.php" class="nav-link">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/users/list.php" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/sliders/list.php" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Trang mua hàng</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>