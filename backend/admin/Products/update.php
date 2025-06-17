<?php
    //Lấy dữ liệu
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['images']['name'];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $material = $_POST["material"];
    $color = $_POST["color"];
    $number_of_flower = $_POST["number_of_flower"];
    $description = $_POST["description"];
    $brand_id = $_POST["brand_id"];
    $type_id = $_POST["type_id"];
    //Mở kết nối
    include_once "../../Connection/open.php";
    //Viết query
    $sql = "UPDATE products SET name = '$name', image '$image',quantity = '$quantity', price = '$price', material = '$material', color = '$color', number_of_flower = '$number_of_flower', description = '$description', brand_id = '$brand_id', type_id = '$type_id' WHERE id = '$id'";
    //Chạy query
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>