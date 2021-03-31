<?php
require_once(__DIR__ . "\..\..\config\connection\connectDatabase.php");

function sv_checkLogin($email, $password)
{
    global $conn;
    $password = md5($password);
    $sql = "select * from user where Email = '$email' and Password = '$password'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    return $num_rows;
}

function sv_registerAccount($username, $email, $password, $sdt, $gender, $role)
{
    global $conn;
    $password = md5($password);
    //thực hiện việc lưu trữ dữ liệu vào db
    $sql = "INSERT INTO user (Username, Email, Password, PhoneNumber, Gender, idRole)
					VALUES('$username', '$email', '$password', '$sdt', '$gender', '$role')";
    // thực thi câu $sql với biến conn lấy từ file connection.php
    $result = $conn->query($sql);
    return $result;
}

function sv_InfoUser($email)
{
    global $conn;
    $sql = "select a.*, b.nameRole from user a
            join role b on a.idRole = b.idRole where a.Email ='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row["Password"] = NULL;
            $data = $row;
        }
    }
    return $data;
}

function sv_listInfo()
{
    global $conn;
    $sql = "SELECT a.*, b.nameRole FROM user a JOIN role b ON a.idRole = b.idRole";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    return $data;
}
function sv_updateInfo($username, $email, $password, $sdt, $gender, $ssEmail)
{
    global $conn;
    if ($password == "")
        $sql = "UPDATE user SET Username = '$username', Email = '$email', PhoneNumber = '$sdt', Gender = '$gender' WHERE Email = '$ssEmail'";
    else $sql = "UPDATE user SET Username = '$username', Email = '$email', PhoneNumber = '$sdt', Gender = '$gender', Password = '$password' WHERE Email = '$ssEmail'";
    $result = $conn->query($sql);
    return $result;
}
function sv_deleteInfoByEmail($email)
{
    global $conn;
    $sql = "DELETE FROM user WHERE Email ='$email'";
    $result = $conn->query($sql);
    return $result;
    
}
