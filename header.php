<?php session_start()?>
<?php include 'config/config.php'?>
<?php include 'config/Database.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BHT Bookstore</title>
    <link rel="icon" href="<?=ROOT_URL?>/assets/img/favicon.png" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=ADMIN_TEMPLATE_URL?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/ustora-style.css">
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/responsive.css">

    <style>
    .form-search {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-search input,
    .form-search .btn {
        font-size: inherit;
        font-family: inherit;
        padding: 8px;
        border: 1px solid #ccc;
    }

    .form-search input {
        width: 100%;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        outline: none;
    }

    .form-search .btn {
        background-color: #428bca;
        color: white;
        padding: 8px 16px;
        border-radius: 0;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .form-search .btn:hover {
        opacity: 0.7;
    }
    </style>
</head>

<body>
    <div class="header-area">
        <div class="container">
            <div class="user-menu">
                <ul>
                    <?php if (isset($_SESSION['Role']) && $_SESSION['Role'] == '1') {?>
                    <li><a href="<?=ROOT_URL?>/admin/dashboard/index.php"><i class="fas fa-user-shield"></i> Trang qu???n tr???</a></li>
                    <?php }if (isset($_SESSION['Role'])) {?>
                    <li><a href="<?=ROOT_URL?>/profile.php"><i class="fas fa-user"></i> <?=$_SESSION['DisplayName']?></a></li>
                    <li><a href="<?=ROOT_URL?>/logout.php"><i class="fas fa-sign-in-alt"></i> ????ng xu???t</a></li>
                    <?php } else {?>
                    <li><a href="<?=ROOT_URL?>/sign.php"><i class="fas fa-sign-in-alt"></i> ????ng nh???p</a></li>
                    <li><a href="<?=ROOT_URL?>/sign.php"><i class="fas fa-user"></i> ????ng k??</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <h1><a href="./"><img src="<?=ROOT_URL?>/assets/img/bht_bookstore_logo.png" style="height: 60px"></a></h1>
                    </div>
                </div>

                <form class="col-sm-6 form-search" action="shop.php">
                    <input name="keyword" placeholder="T??? kho??">
                    <button class="btn"><i class="glyphicon glyphicon-search"></i></button>
                </form>

                <?php
                    $totalMoney = 0;
                    $countItem = 0;
                    if (isset($_SESSION['Username'])) {
                        $sql = "SELECT SUM(Amount * Price) FROM Carts, Books WHERE Carts.ISBN = Books.ISBN AND Username = '" . $_SESSION['Username'] . "'";
                        $totalMoney = Database::GetData($sql, ['row' => 0, 'cell' => 0]);
                        $sql = "SELECT count(*) FROM Carts WHERE Username = '" . $_SESSION['Username'] . "'";
                        $countItem = Database::GetData($sql, ['row' => 0, 'cell' => 0]);
                    }
                ?>
                <div class="col-sm-3">
                    <div class="shopping-item">
                        <a href="<?=ROOT_URL . '/cart.php'?>">Gi??? h??ng - <span class="cart-amunt"><?=number_format($totalMoney)?> ??</span>
                            <i class="fa fa-shopping-cart"></i>
                            <span class="product-count"><?=$countItem?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="./">Trang ch???</a></li>
                        <li><a href="<?=ROOT_URL . '/shop.php'?>">Mua h??ng</a></li>
                        <li><a href="<?=ROOT_URL . '/category-book.php'?>">Danh m???c</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->