<?php
require_once('connection/connectDatabase.php');
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
        echo "bạn vui lòng nhập đầy đủ thông tin";
    } else {
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql = "select * from user where Username='$username'";
        $kt = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kt)  > 0) {
            echo "Tài khoản đã tồn tại";
        } else {
            //thực hiện việc lưu trữ dữ liệu vào db
        $sql = "INSERT INTO user(
                Username,
                Email,
                Password,
                PhoneNumber,
                Gender,
                idRole)
                VALUES(
                '$username',
                '$email',
                '$password',
                '$sdt',
                '$gender',
                '$role')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn, $sql);
            echo "chúc mừng bạn đã đăng ký thành công";
        }
    }
}
?>