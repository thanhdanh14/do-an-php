<html>

<head>
    <meta charset="utf8">
    <link href="./assets/css/login.css" rel="stylesheet">
    <title>Đăng nhập cửa hàng</title>
</head>

<body>
    <div class="login">
        <h1>Cửa hàng</h1>
        <form method="POST" action="./controller/user/user.controller.php?action=login">
            <?php if (isset($_GET['loginFail']))
                echo '<p style="color: red;"><b>Sai Địa chỉ Email hoặc Mật khẩu!</b></p>'; ?>
            <input type="text" name="email" placeholder="Địa chỉ Email" required="required" />
            <input type="password" name="password" placeholder="Mật khẩu" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btn_submits">Đăng nhập</button>
        </form>
    </div>
</body>

</html>