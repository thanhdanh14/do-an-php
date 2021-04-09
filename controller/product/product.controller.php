<?php
require_once(__DIR__ . "\product.service.php");

if (isset($_REQUEST["action"])) {
    $method = $_REQUEST["action"];
    if (isset($method)) {
        switch ($method) {
            case 'add':
                addProduct();
                break;
            default:
                break;
        }
    }
}

function addProduct()
{
    $tensp = $_POST['txtTenSP'];
    $slsp = $_POST['txtSLSP'];
    $giasp = $_POST['txtGiaSP'];
    $masp = $_POST['txtMaSP'];
    // $Picture = $_FILES['txtPicture'];
    // Up image
    // $file_temp = $Picture['tmp_name'];
    // $user_file = $Picture['name'];
    $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
    $filepath = __DIR__ . "\..\..\assets\imageProduct'";
    // $nameFile = $timestamp . $user_file;
    // if (move_uploaded_file($file_temp, $filepath . $nameFile) == false)
    //     die("a");
    $nameFile = "a.png";

    if (sv_addProduct($tensp, $slsp, $giasp, $nameFile, $masp)) {
        header("Location: ../../views/them-san-pham.php?success");
    } else header("Location: ../../views/them-san-pham.php?fail");
}
