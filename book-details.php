<?php include 'header.php'?>

<?php
    $isbn = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * FROM books, languages, categories, publishes WHERE books.LanguageID = languages.LanguageID AND books.CategoryID = categories.CategoryID AND books.PublishID = publishes.PublishID AND ISBN = '$isbn'";
    $book = Database::GetData($sql, ['row' => 0]);
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div style="display: flex;">
            <div style="width: 300px; padding: 0 16px;">
                <img style="height: 320px" src="<?=$book['Thumbnail']?>" alt="Image">
            </div>
            <div style="padding: 0 16px;">
                <h3>Thông tin sản phẩm</h3>
                <p><b>ISBN: </b><?=$book['ISBN']?></p>
                <p><b>Tên sách: </b><?=$book['BookTitle']?></p>
                <p><b>Năm xuất bản: </b><?=$book['PublishYear']?></p>
                <p><b>Trọng lượng: </b><?=$book['Weight']?> gam</p>
                <p><b>Kích thước: </b><?=$book['Size']?> mm</p>
                <p><b>Số trang: </b><?=$book['PageNumber']?></p>
                <p><b>Giá: </b><?=number_format($book['Price'])?> ₫</p>
                <p><b>Ngôn ngữ: </b><?=$book['LanguageName']?></p>
                <p><b>Danh mục: </b><a href="<?='/category-book.php?CategoryID=' . $book['CategoryID']?>"><?=$book['CategoryName']?></a></p>
                <p><b>Nhà xuất bản: </b><?=$book['PublishName']?></p>
                <p><b>Mô tả: </b><?=$book['Description']?></p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>