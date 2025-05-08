<?php
    //Lấy dữ liệu từ form
    $name = $_POST['name'];
    $product_id = $_POST['product_id'];
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO images(name, product_id) VALUES ('$name', '$product_id')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>