<?php
session_start();
require_once __DIR__ . "/mail/index.php";
require_once('./config/connection/connectDatabase.php');

// Kiểm tra nếu thực hiện thao tác cập nhật quyền của người dùng
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = '';
    $email = '';
    // kiem tra email co ton tai va dung dinh dang
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $errors = "email";
    }
    if (empty($_POST['email'])) {
        $_SESSION['errors'] = 'Vui lòng nhập Email';
        header('Location: ./forgot.php');
        exit();
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = 'Email không tồn tại';
        header('Location: ./forgot.php');
        exit();
    }
    if (empty($errors) && !empty($email)) {
        $conn = new mysqli($servername, $username, NULL, $databasename);
        $sql = "SELECT  `UserName`, `Email` FROM `user` WHERE Email = '" . $email . "'";
        $result = $conn->query($sql);
        $account = mysqli_fetch_assoc($result);

        if (empty($account)) {
            $_SESSION['errors'] = 'Email không tồn tại';
            header('Location: ./forgot.php');
            exit();
        }

        $randPassword = rand_string(8);
        $title = '[CUA-HANG] Quên mật khẩu';
        $content = "<h3> Dear " . $account['UserName'] . '!</h3>';
        $content .= "<p>Mã code của bạn là: </p> <b>$randPassword</b>";
        $sendMai = SendMail::send($title, $content, $account['UserName'], $account['Email']);
        if ($sendMai) {
            $hash = password_hash($randPassword, PASSWORD_DEFAULT);
            $_SESSION['emailNe'] = $_POST['email'];
            $_SESSION['MaCode'] = $randPassword;
            $_SESSION['success'] = 'Mã code đã được gửi đến Email của bạn vui lòng kiểm tra!';
            header('Location: change-password.php');
        } else {
            $_SESSION['errors'] = 'Oops! Có gì đó không đúng.';
            header('Location: ./forgot.php');
            exit();
        }
    }
}
