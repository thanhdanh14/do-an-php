<?php
session_start();
require_once(__DIR__ . "\user.service.php");

if (isset($_REQUEST["action"])) {
	$method = $_REQUEST["action"];
	if (isset($method)) {
		switch ($method) {
			case 'login';
				checkLogin();
				break;
			case 'dangky':
				registerAccount();
				break;
			case 'updateInfo':
				updateInfo();
				break;
			default:
				break;
		}
	}
}

function registerAccount()
{
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$sdt = $_POST["txtSdt"];
		$password = $_POST["txtPassword"];
		$username = $_POST["txtHoTen"];
		$email = $_POST["txtEmail"];
		$gender = $_POST["txtGioiTinh"];
		$role = $_POST["txtChucVu"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($sdt == "" || $password == "" || $username == "" || $email == "" || $gender == "" || $role == "") {
			header("Location: ../../views/them-tai-khoan.php?regFail");
		} else {
			// Kiểm tra tài khoản đã tồn tại chưa
			if (sv_registerAccount($username, $email, $password, $sdt, $gender, $role)) {
				header("Location: ../../views/them-tai-khoan.php?regSuccess");
			}
			header("Location: ../../views/them-tai-khoan.php?regFail");
		}
	}
}

function checkLogin()
{
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submits"])) {
		// lấy thông tin người dùng
		$email = $_POST["email"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$email = strip_tags($email);
		$email = addslashes($email);
		$password = strip_tags($password);
		$password = addslashes($password);

		if (sv_checkLogin($email, $password) > 0) {
			//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
			$_SESSION['email'] = $email;
			// Thực thi hành động sau khi lưu thông tin vào session
			// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			header('Location: ../../index.php');
		} else {
			header('Location: ../../login.php?loginFail'); //Tên dn or mk không đúng
		}
	}
}

function InfoUser($value)
{
	if (isset($_SESSION['email'])) {
		$data = sv_InfoUser($_SESSION['email']);
	}
	return $data[$value];
}

function updateInfo()
{
	if (isset($_POST['btn_submit'])) {
		$sdt = $_POST["txtSdt"];
		$password = $_POST["txtPassword"];
		$username = $_POST["txtHoTen"];
		$email = $_POST["txtEmail"];
		$gender = $_POST["txtGioiTinh"];

		if(sv_updateInfo($username, $email, $password, $sdt, $gender) > 0) {
			header('Location: ../../../views/thong-tin-ca-nhan.php?updateSuccess');
		}
		else header('Location: ../../../views/thong-tin-ca-nhan.php?updateFail');
	}
	else header('Location: ../../../views/thong-tin-ca-nhan.php?updateFail');
}
