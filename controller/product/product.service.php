<?php
require_once(__DIR__ . "\..\..\config\connection\connectDatabase.php");

function sv_listProduct() {
    global $conn;
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    $data = array();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
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
