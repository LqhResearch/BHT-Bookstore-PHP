<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about-us">
                    <h2>BHT<span> Bookstore</span></h2>
                    <p>BHT Bookstore nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ thống BHT Bookstore trên toàn quốc.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Danh mục</h2>
                    <ul>
                        <?php
                            $sql = 'SELECT * FROM categories ORDER BY CategoryID DESC';
                            $categories = Database::GetData($sql);
                            foreach ($categories as $cate) {
                                echo '<li><a href="/category-book.php?CategoryID=' . $cate['CategoryID'] . '">' . $cate['CategoryName'] . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Liên hệ</h2>
                    <p>Đăng ký nhận bản tin của chúng tôi và nhận các ưu đãi độc quyền mà bạn sẽ không tìm thấy ở bất kỳ nơi nào khác ngay trong hộp thư đến của bạn!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="yourmail@gmail.com">
                            <input type="submit" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- jQuery sticky menu -->
<script src="<?=HOME_TEMPLATE_URL?>/js/owl.carousel.min.js"></script>
<script src="<?=HOME_TEMPLATE_URL?>/js/jquery.sticky.js"></script>
<!-- jQuery easing -->
<script src="<?=HOME_TEMPLATE_URL?>/js/jquery.easing.1.3.min.js"></script>
<!-- Main Script -->
<script src="<?=HOME_TEMPLATE_URL?>/js/main.js"></script>
<!-- Slider -->
<script type="text/javascript" src="<?=HOME_TEMPLATE_URL?>/js/bxslider.min.js"></script>
<script type="text/javascript" src="<?=HOME_TEMPLATE_URL?>/js/script.slider.js"></script>
</body>

</html>