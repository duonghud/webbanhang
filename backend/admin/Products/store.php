<?php
//Lấy dữ liệu từ form
$name = $_POST['name'];
$image =$_FILES['image']['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$material = $_POST['material'];
$color = $_POST['color'];
$number_of_flower = $_POST['number_of_flower'];
$description = $_POST['description'];
$brands_id = $_POST['brand_id'];
$types_id = $_POST['type_id'];
//Mở kết nối đến DB
include_once "../../Connection/open.php";
//Viết sql
$sql = "INSERT INTO products(name, image, quantity, price, material, color, number_of_flower, description, brand_id, type_id) VALUES ('$name', '$image', '$quantity', '$price', '$material', '$color', '$number_of_flower', '$description', '$brands_id', '$types_id')";
//Chạy sql
mysqli_query($connection, $sql);
//Đóng kết nối
include_once "../../Connection/close.php";
//Kiểm tra nếu ảnh chưa có trong folder image thì copy ảnh vào
if (!file_exists("../image/" . $image)) {
    //Lấy path
    $path = $_FILES["image"]["tmp_name"];
    //Lưu ảnh vào thư mục image
    move_uploaded_file($path, "../image/" . $image);
}
//Quay về danh sách
header("Location: index.php");