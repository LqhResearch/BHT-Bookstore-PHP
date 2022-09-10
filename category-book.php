<?php include 'header.php'?>
<div class="single-product-area">
    <?php
        $categoryID = isset($_GET['CategoryID']) ? $_GET['CategoryID'] : 1;
        $sql = "SELECT CategoryName FROM categories WHERE CategoryID = $categoryID";
        $categoryName = Database::GetData($sql, ['row' => 0, 'cell' => 0]);
    ?>
    <div class="zigzag-bottom"></div>
    <div class="container">
        <h1 class="text-primary text-center"><?=$categoryName?></h1>
        <div class="row">
            <?php
                $sql = "SELECT * FROM books WHERE CategoryID = $categoryID ORDER BY UpdatedAt";
                $books = Database::GetData($sql);
                foreach ($books as $book) {
                ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="<?=$book['Thumbnail']?>" alt="" style="height: 320px">
                    </div>
                    <h2><a href="<?='/book-details.php?id=' . $book['ISBN']?>"><?=$book['BookTitle']?></a></h2>
                    <div class="product-carousel-price">
                        <ins><?=Helper::Currency($book['Price'])?></ins>
                    </div>

                    <div class="product-option-shop">
                        <?php if (isset($_SESSION['Role']) && $_SESSION['Role'] == 3) {?>
                        <a class="add_to_cart_button" href="<?='/cart.php?id=' . $book['ISBN']?>"><i class="fas fa-cart-plus"></i></a>
                        <?php }?>
                        <a class="add_to_cart_button" href="<?='/book-details.php?id=' . $book['ISBN']?>">Chi tiết</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php include 'footer.php'?>