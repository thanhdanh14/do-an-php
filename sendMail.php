<?php
session_start();
    require_once __DIR__."/mail/index.php";
    require_once('./config/connection/connectDatabase.php');

    // Kiểm tra nếu thực hiện thao tác cập nhật quyền của người dùng
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errors = '';
        $email = '';
        // kiem tra email co ton tai va dung dinh dang
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email = $_POST['email'];
        }
        else
        {
            $errors = "email";
        }
        if (empty($_POST['email'])) {
            $_SESSION['errors'] = 'Please enter your email';
            header('Location: /forgot.php');
            exit();
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = 'Email address does not exist';
            header('Location: ./forgot.php');
            exit();
        }
        if (empty($errors) && !empty($email)) {
            $conn = new mysqli($servername, $username, NULL, $databasename);
            $sql = "SELECT  `IdUser`, `UserName`, `Email`, `Password` , `PhoneNumber` , `Gender` , `IdRole` FROM `user` WHERE Email = '". $email. "'";
            $result = $conn->query($sql);
            $account = mysqli_fetch_assoc($result);

            if (empty($account)) {
                $_SESSION['errors'] = 'Email address does not exist ';
                header('Location: ./forgot.php');
                exit();
            }

            $randPassword = rand_string(8);
            $title = 'Update password';
            $content = "<h3> Dear ". $account['UserName']. '</h3>';
            $content .= "<p>We have received a request to re-issue your password recently.</p>";
            $content .= "<p>We have updated and sent you a new password</p>";
            $content .= "<p>Your new password is : </p> <b>$randPassword</b>";
            $sendMai = SendMail::send($title, $content, $account['UserName'], $account['Email']);
            if ($sendMai) {
                $hash = password_hash($randPassword, PASSWORD_DEFAULT);
                $sqlUpdate = "UPDATE user SET Password= ' $randPassword ' WHERE idUser = ". $account['idUser'];
                $conn->query($sqlUpdate);
                $_SESSION['success'] = 'We sent you an email please check it';
                header('Location: change-password.php');
            } else {
                die($sqlUpdate);
                $_SESSION['errors'] = 'An error has occurred unable to retrieve the password';
                header('Location: forgot.php');
                exit();
            }
        }

    }