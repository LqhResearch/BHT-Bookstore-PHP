<?php include 'config/config.php'?>
<?php include 'config/Database.php'?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="icon" href="/assets/img/favicon.png" />
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<?php
    if (isset($_POST['submit'])) {
        if (!empty($_FILES['avatar']['name'])) {
            $image_size = $_FILES['avatar']['size'];
            $image_path = '/uploads/' . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], '.' . $image_path);

            $sql = "UPDATE Users SET Avatar = '$image_path' WHERE Username = '" . $_SESSION['Username'] . "'";
            Database::NonQuery($sql);
        }

        $username = (isset($_POST['username'])) ? $_POST['username'] : '';
        $fullname = (isset($_POST['fullname'])) ? $_POST['fullname'] : '';
        $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';

        $sql = "UPDATE Users SET Fullname = '$fullname', Phone = '$phone', Email = '$email' WHERE Username = '" . $_SESSION['Username'] . "'";
        if (Database::NonQuery($sql)) {
            $message = '<p style="color: #48CFAD;">Cập nhật thông tin cá nhân thành công</p>';
            header('Location: logout.php');
        }
    }

    $sql = "SELECT * FROM Users, Account_Types WHERE Users.AccountTypeID = Account_Types.AccountTypeID AND Username = '" . $_SESSION['Username'] . "'";
    $user = Database::GetData($sql, ['row' => 0]);

?>

<body class="profile__bg d-flex-center">
    <img class="profile__avatar" src="<?=$_SESSION['Avatar']?>" alt="Avatar">
    <div class="profile__form">
        <div class="profile__form--header">
            <h3>Thông tin cá nhân</h3>
        </div>
        <form class="profile__form--body" method="POST" enctype="multipart/form-data">
            <div class="profile__group">
                <b>Tên đăng nhập: </b>
                <input type="text" name="username" value="<?=$user['Username']?>" disabled>
            </div>
            <div class="profile__group">
                <b>Họ tên: </b>
                <input type="text" name="fullname" value="<?=$user['Fullname']?>">
            </div>
            <div class="profile__group">
                <b>Số điện thoại: </b>
                <input type="text" name="phone" value="<?=$user['Phone']?>">
            </div>
            <div class="profile__group">
                <b>Email: </b>
                <input type="email" name="email" value="<?=$user['Email']?>">
            </div>
            <div class="profile__group">
                <b>Ảnh đại diện: </b>
                <input type="file" name="avatar">
            </div>
            <div class="profile__group">
                <span><b>Ngày tạo tài khoản: </b> <?=date_format(new DateTime($user['CreatedAt']), 'd-m-Y')?></span>
            </div>
            <div class="profile__group">
                <span><b>Loại tài khoản: </b> <?=$user['AccountTypeName']?></span>
            </div>
            <div class="profile__group d-flex-center">
                <div>
                    <input class="btn" name="submit" type="submit" value="Cập nhật">
                    <a class="btn" href="/change-password.php">Đổi mật khẩu</a>
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