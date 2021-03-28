<?php
session_start();
?>
  <?php
   //Gọi file connection.php ở bài trước
	require_once("connection/connectDatabase.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submits"])) {
		// lấy thông tin người dùng
		$email= $_POST["email"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$email = strip_tags($email);
		$email = addslashes($email);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($email == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from user where Email = '$email' and Password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				 $_SESSION['email'] = $email;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                 header('Location: ../index.html');
				
			}
		}
	}
	

?>