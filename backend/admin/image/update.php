<?php
    //Lấy dữ liệu
    $id = $_POST['id'];
    $name = $_POST['name'];
    $product_id = $_POST['product_id'];
    //Mở kết nối
    include_once "../../Connection/open.php";
    //Viết query
    $sql = "UPDATE images SET name = '$name', product_id = '$product_id' WHERE id ='$id'";
    //Chạy query
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
    
?>