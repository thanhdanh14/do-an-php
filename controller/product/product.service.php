<?php
require_once(__DIR__ . "\..\..\config\connection\connectDatabase.php");
require_once(__DIR__ . "\..\user\user.service.php");

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
        $sql = "UPDATE product SET quantityProduct = '$quantity', priceProduct = '$price',
                    nameProduct = '$nameProduct', imageProduct = '$img', codeProduct = '$code' WHERE idProduct = '$id'";
    } else {
        $sql = "UPDATE product SET quantityProduct = '$quantity', priceProduct = '$price',
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

function sv_payCart()
{
    global $conn;
    $id = sv_InfoUser($_SESSION['email']);
    $id = $id["idUser"];

    $sql = "INSERT INTO bill VALUES (null, '$id', NOW())";
    $conn->query($sql);

    $sql = "SELECT LAST_INSERT_ID() AS Haha;";
    $result_getID = $conn->query($sql);
    while ($row_getID = $result_getID->fetch_assoc()) {
        $idSQL = $row_getID["Haha"];
    }

    if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
        foreach ($_SESSION["cart_items"] as $item) {
            $id = $item["idProduct"];
            $name = getInfoProduct($id, "nameProduct");
            $price = getInfoProduct($id, "priceProduct");
            $quantity = $item["quantityProduct"];
            $sql .= "INSERT INTO bill_detail VALUES (NULL, '$name', '$price', '$quantity', '$idSQL');";

            $sqlUpdate = "UPDATE product SET quantityProduct = quantityProduct - '$quantity' WHERE idProduct = '$id';";
            $conn->query($sqlUpdate);
        }
    }
    $result = $conn->multi_query($sql);
    return $result;
}

function sv_getBill()
{
    global $conn;
    $sql = "SELECT a.*, b.Username 
            FROM bill a
            JOIN user b ON a.idUser = b.idUser
            ORDER BY a.dateCreate DESC";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    return $data;
}

function sv_BillDetail($id)
{
    global $conn;
    $sql = "SELECT * FROM bill_detail WHERE idBill = '$id'";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    return $data;
}

function sv_countBill() {
    global $conn;
    $sql = "SELECT COUNT(idBill) AS countBill FROM bill";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data["countBill"];
}

function sv_countProduct() {
    global $conn;
    $sql = "SELECT SUM(quantityProduct) AS Total FROM product";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data["Total"];
}