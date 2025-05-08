<?php
    //Lấy dữ liệu từ form
    $name = $_POST["name"];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $number_of_flower = $_POST['number_of_flower'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];
    $type_id = $_POST['type_id'];
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO products(name, quantity, price, material, color, number_of_flower, description, brand_id, type_id) VALUES ('$name', '$quantity', '$price', '$material', '$color', '$number_of_flower', '$description', '$brand_id', '$type_id')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>