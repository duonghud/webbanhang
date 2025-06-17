<?php
    //Lấy dữ liệu từ form
    $name = $_POST["name"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO customers(name, email,  phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>