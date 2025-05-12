<?php
include_once "../../Connection/open.php";

$id = $_POST['id'];
$product_id = $_POST['product_id'];

// Lấy ảnh cũ
$result = mysqli_query($connection, "SELECT name FROM images WHERE id = $id");
$row = mysqli_fetch_assoc($result);
$old_image = $row['name'];

// Xóa ảnh cũ khỏi thư mục nếu tồn tại
if (file_exists("uploads/" . $old_image)) {
    unlink("uploads/" . $old_image);
}

// Upload ảnh mới
$new_image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($tmp, "uploads/" . $new_image);

// Cập nhật tên ảnh trong DB
$sql = "UPDATE images SET name = '$new_image' WHERE id = $id";
mysqli_query($connection, $sql);

include_once "../../Connection/close.php";
header("Location: index.php?product_id=$product_id");
?>
