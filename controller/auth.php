<?php
if (!isset($_SESSION['email'])) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: /do-an-php/login.php');
}
