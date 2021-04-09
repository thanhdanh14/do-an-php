<?php
require_once(__DIR__ . "\..\..\config\connection\connectDatabase.php");

function addProduct($Picture) {
    // Up image
    $file_temp = $Picture['tmp_name'];
    $user_file = $Picture['name'];
    $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
    $filepath = "../assets/imageProduct/";
    $nameFile = $timestamp . $user_file;
    if (move_uploaded_file($file_temp, $filepath . $nameFile) == false)
        return false;

    // $sql = "INSERT INTO product (ProductName, CateID, PriceProduct, Quantity, Description, Picture) VALUES 
    //         ('$this->productName', '$this->cateID', '$this->Price', '$this->Quantity', '$this->Description', '$nameFile')";
    // $result = $db->query_execute($sql);
    // return $result;
}


?>