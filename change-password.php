<?php include 'config/config.php'?>
<?php include 'config/Database.php'?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="icon" href="/assets/img/favicon.png" />
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<?php
    if (isset($_POST['submit'])) {
        $re_pass = (isset($_POST['re-pass'])) ? $_POST['re-pass'] : '';
        $pass_1 = (isset($_POST['pass-1'])) ? $_POST['pass-1'] : '';
        $pass_2 = (isset($_POST['pass-2'])) ? $_POST['pass-2'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';

        if ($pass_1 == $pass_2 && $pass_1 != '') {
            $sql = "SELECT * FROM Users WHERE Username = '" . $_SESSION['Username'] . "' AND Password = sha1('$re_pass')";
            if (count(Database::GetData($sql))) {
                $sql = "UPDATE Users SET Password = sha1('$pass_1') WHERE Username = '" . $_SESSION['Username'] . "'";
                if (Database::NonQuery($sql)) {
                    $message = '<p style="color: #48CFAD;">Đổi mật khẩu thành công</p>';
                    header('Location: logout.php');
                }
            } else {
                $message = '<p style="color: #ED5565;">Mật khẩu không hợp lệ</p>';
            }
        } else {
            $message = '<p style="color: #ED5565;">Mật khẩu không khớp</p>';
        }
    }
?>

<body class="profile__bg d-flex-center">
    <img class="profile__avatar" src="<?=$_SESSION['Avatar']?>" alt="Avatar">
    <div class="profile__form">
        <div class="profile__form--header">
            <h3>Đổi mật khẩu</h3>
        </div>
        <form class="profile__form--body" method="POST">
            <div class="profile__group">
                <b>Mật khẩu cũ: </b>
                <input type="password" name="re-pass">
            </div>
            <div class="profile__group">
                <b>Mật khẩu mới: </b>
                <input type="password" name="pass-1">
            </div>
            <div class="profile__group">
                <b>Nhập lại mật khẩu mới: </b>
                <input type="password" name="pass-2">
            </div>
            <div class="profile__group d-flex-center">
                <div>
                    <input class="btn" name="submit" type="submit" value="Đổi mật khẩu">
                    <a class="btn" href="/profile.php">Thông tin cá nhân</a>
                    <a class="btn" href="/">Trang chủ</a>
                </div>
            </div>
        </form>
        <?php
            if (isset($message)) {
                echo '<div class="profile__form--footer">' . $message . '</div>';
            }
        ?>
    </div>
</body>

</html>