<?php
if ($_SESSION['email'] == null) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: /do-an-php/login.php');
}
