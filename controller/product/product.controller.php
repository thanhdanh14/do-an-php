<?php
require_once(__DIR__ . "\product.service.php");

if (isset($_REQUEST["action"])) {
    $method = $_REQUEST["action"];
    if (isset($method)) {
        switch ($method) {
            case 'add':
                addProduct();
                break;
            case 'remove':
                removeProduct();
                break;
            case 'update':
                updateProduct();
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
    $Picture = $_FILES['txtImage'];
    // Up image
    $file_temp = $Picture['tmp_name'];
    $user_file = $Picture['name'];
    $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
    $filepath = "../../assets/imageProduct/";
    $nameFile = $timestamp . $user_file;
    if (move_uploaded_file($file_temp, $filepath . $nameFile) == false)
        header("Location: ../../views/them-san-pham.php?fail");

    if (sv_addProduct($tensp, $slsp, $giasp, $nameFile, $masp)) {
        header("Location: ../../views/them-san-pham.php?success");
    } else header("Location: ../../views/them-san-pham.php?fail");
}

function listProduct()
{
    return sv_listProduct();
}

function removeProduct()
{
    $idproduct = $_GET['id'];
    if (sv_removeProduct($idproduct)) {
        header("Location: ../../views/quan-ly-san-pham.php?RemoveSucces");
    } else header("Location: ../../views/quan-ly-san-pham.php?RemoveFail");
}
function updateProduct()
{
    $id = $_GET['id'];
    $tensp = $_POST['txtTenSP'];
    $slsp = $_POST['txtSLSP'];
    $giasp = $_POST['txtGiaSP'];
    $masp = $_POST['txtMaSP'];
    $nameFile = null;
    if (isset($_FILES['txtImage']) && $_FILES['txtImage']['name'] != null) {
        // Up image
        $Picture = $_FILES['txtImage'];
        $file_temp = $Picture['tmp_name'];
        $user_file = $Picture['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath = "../../assets/imageProduct/";
        $nameFile = $timestamp . $user_file;
        if (move_uploaded_file($file_temp, $filepath . $nameFile) == false)
            header("Location: ../../views/chinh-sua-san-pham.php?fail&id=$id");
    }

    if (sv_updateProduct($id, $tensp, $slsp, $giasp, $nameFile, $masp)) {
        header("Location: ../../views/chinh-sua-san-pham.php?success&id=$id");
    } else header("Location: ../../views/chinh-sua-san-pham.php?fail&id=$id");
}

function getInfoProduct($id, $value)
{
    return sv_getInfoProduct($id, $value);
}
