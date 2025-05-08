<?php
    //Lấy dữ liệu
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    //Mở kết nối
    include_once "../../Connection/open.php";
    //Viết query
    $sql = "UPDATE customers SET name = '$name', email = '$email', password = '$password', phone = '$phone', address = '$address' WHERE id = '$id'";
    //Chạy query
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>