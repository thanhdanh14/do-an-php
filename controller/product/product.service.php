<?php
require_once(__DIR__ . "\..\..\config\connection\connectDatabase.php");

function sv_listProduct()
{
    global $conn;
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    return $data;
}

function sv_addProduct($nameProduct, $quantity, $price, $img, $code)
{
    global $conn;
    $checkProduct = "SELECT * FROM product WHERE codeProduct = '$code'";
    $check = $conn->query($checkProduct);
    if ($check->num_rows > 0) {
        if ($img) {
            $sql = "UPDATE product SET quantityProduct = quantityProduct + '$quantity', priceProduct = '$price',
                    nameProduct = '$nameProduct', imageProduct = '$img'  WHERE codeProduct = '$code'";
        } else {
            $sql = "UPDATE product SET quantityProduct = quantityProduct + '$quantity', priceProduct = '$price',
                    nameProduct = '$nameProduct' WHERE codeProduct = '$code'";
        }
    } else {
        $sql = "INSERT INTO product VALUES (NULL, '$nameProduct', '$quantity', '$price', '$img', '$code')";
    }
    $result = $conn->query($sql);
    return $result;
}

function sv_removeProduct($idproduct)
{
    global $conn;
    $sql = "DELETE FROM product WHERE idProduct = '$idproduct'";
    $result = $conn->query($sql);
    return $result;
}

function sv_updateProduct($id, $nameProduct, $quantity, $price, $img, $code)
{
    global $conn;
    if ($img) {
        $sql = "UPDATE product SET quantityProduct = quantityProduct + '$quantity', priceProduct = '$price',
                    nameProduct = '$nameProduct', imageProduct = '$img', codeProduct = '$code' WHERE idProduct = '$id'";
    } else {
        $sql = "UPDATE product SET quantityProduct = quantityProduct + '$quantity', priceProduct = '$price',
                    nameProduct = '$nameProduct', codeProduct = '$code' WHERE idProduct = '$id'";
    }
    $result = $conn->query($sql);
    return $result;
}

function sv_getInfoProduct($id, $value)
{
    global $conn;
    $sql = "SELECT * FROM product WHERE idProduct = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data[$value];
}
