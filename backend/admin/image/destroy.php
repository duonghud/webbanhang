<?php
    //Lấy id
    $id = $_GET['id'];
    //Mở kết nối
    include_once "../../Connection/open.php";
    //Viết sql
    $sql = "DELETE FROM images WHERE id = '$id'";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay lại danh sách
    header("Location: index.php");
?>