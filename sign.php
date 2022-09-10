<?php include './config/config.php';?>
<?php include './config/database.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/sign.css" />
    <title>Đăng ký và đăng nhập</title>
    <link rel="icon" href="/assets/img/favicon.png" />
</head>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Đăng nhập
        if (isset($_POST['SignIn'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $sql = "SELECT * FROM users WHERE (Username = '$username' OR Phone = '$username' OR Email = '$username') AND Password = sha1('$password') AND Status = 1";
            $users = Database::GetData($sql);
            if ($users != null) {
                session_start();
                $user = $users[0];
                $_SESSION['Username'] = $user['Username'];
                $_SESSION['DisplayName'] = $user['Fullname'] == '' ? $user['Username'] : $user['Fullname'];
                $_SESSION['Avatar'] = !empty($user['Avatar']) ? $user['Avatar'] : '/assets/img/user.png';
                $_SESSION['Role'] = $user['AccountTypeID'];
                header('Location: admin/index.php');
            } else {
                $message = "<p style='color: #dc3545'>Tên đăng nhập hoặc mật khẩu không hợp lệ!</p>";
            }
        }

        // Đăng ký
        if (isset($_POST['SignUp'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';

            if ($password1 == $password2) {
                $sql = "INSERT INTO users VALUES ('$username', sha1('$password1'), '', '', '$email', '', 0, 1, NOW(3), 3)";
                $check = Database::NonQuery($sql);
                if ($check) {
                    $message = "<p style='color: #0d6efd'>Đăng ký thành công</p>";
                } else {
                    $message = "<p style='color: #dc3545'>Đăng ký thất bại</p>";
                }
            } else {
                $message = "<p style='color: #dc3545'>Mật khẩu không khớp!</p>";
            }
        }
    }
?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" method="POST" class="sign-in-form">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" placeholder="Tài khoản / Email / Điện thoại" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" placeholder="Mật khẩu" required />
                    </div>
                    <?=isset($message) ? $message : ''?>
                    <input name="SignIn" type="submit" value="Đăng nhập" class="btn solid" />
                </form>

                <form action="#" method="POST" class="sign-up-form">
                    <h2 class="title">Đăng ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" placeholder="Tên đăng nhập" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password1" type="password" placeholder="Mật khẩu" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password2" type="password" placeholder="Nhập lại mật khẩu" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input name="email" type="email" placeholder="yourmail@gmail.com" required />
                    </div>
                    <?=isset($message) ? $message : ''?>
                    <input name="SignUp" type="submit" class="btn" value="Đăng ký" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Thành viên mới?</h3>
                    <p>Nếu bạn chưa có tài khoản. Hãy tạo ngay một tài khoản và tham gia cùng chúng tôi nào!</p>
                    <button class="btn transparent" id="sign-up-btn">Đăng ký</button>
                </div>
                <img src="./assets/img/log.svg" class="image" alt="" />
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Xin chào!</h3>
                    <p>Nếu bạn đã có tài khoản. Hãy đăng nhập vào để bắt đầu mua hàng!</p>
                    <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
                </div>
                <img src="./assets/img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="./assets/js/sign.js"></script>
</body>

</html>