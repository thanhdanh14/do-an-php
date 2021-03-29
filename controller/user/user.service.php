<?php
include_once("../../config/connection/connectDatabase.php");

function sv_checkLogin($email, $password)
{
    global $conn;
    $sql = "select * from user where Email = '$email' and Password = '$password'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    return $num_rows;
}

function sv_registerAccount($username, $email, $password, $sdt, $gender, $role)
{
    global $conn;
    //thực hiện việc lưu trữ dữ liệu vào db
    $sql = "INSERT INTO user( Username, Email, Password, PhoneNumber, Gender, idRole)
					VALUES( '$username', '$email', '$password', '$sdt', '$gender', '$role')";
    // thực thi câu $sql với biến conn lấy từ file connection.php
    $result = $conn->query($sql);
    return $result;
}

function sv_InfoUser($email)
{
    global $conn;
    $sql = "select * from user a
            join role b on a.idRole = b.idRole where a.Email ='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data;
}
