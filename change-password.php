<?php
// Initialize the session
session_start();


// Include config file
require_once('./config/connection/connectDatabase.php');

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate new password
    $macode = $_SESSION['MaCode'];
    $inputCode = $_POST['txtCode'];
    if ($macode != $inputCode) {
        $new_password_err = "Mã Code không đúng.";
    } else if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Vui lòng nhập mật khẩu mới.";
    } else if (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Mật khẩu mới phải dài hơn 6 ký tự.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Vui lòng confirm lại mật khẩu.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Mật khẩu confirm không giống nhau.";
        }
    }
    $randPassword = rand_string(8);
    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $email = $_SESSION['emailNe'];
        $password = $_POST["new_password"];
        $password = md5($password);
        $sql = "UPDATE user SET Password ='$password' WHERE Email = '$email'";
        session_destroy();

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["idUser"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php?passwordSuccess");
                exit();
            } else {
                echo "Oops! Có gì đó không đúng.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2><b style="color: red;">Quên mật khẩu</b></h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <span class="help-block"><b><?php echo $new_password_err; ?></b></span>
            <div class="form-group">
                <label>Mã đã được gửi đến Email</label>
                <input type="text" name="txtCode" class="form-control">
            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Xác nhận">
            </div>
        </form>
    </div>
</body>

</html>