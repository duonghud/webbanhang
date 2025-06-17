<?php
session_start();

// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];


// Mở kết nối
include_once "../Connection/open.php";

// Kiểm tra email đã tồn tại chưa
$check_sql = "SELECT * FROM customers WHERE email = '$email'";
$check_result = mysqli_query($connection, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Email đã được sử dụng
    echo "Email đã tồn tại. Vui lòng dùng email khác.";
    exit;
}

// Chèn dữ liệu người dùng mới vào bảng customers
$insert_sql = "INSERT INTO customers (name, email, password, phone, address)
               VALUES ('$name', '$email', '$password', '$phone', '$address')";

if (mysqli_query($connection, $insert_sql)) {
    // Đăng ký thành công => Tự động đăng nhập
    $new_user_id = mysqli_insert_id($connection);
    $_SESSION['customers_id'] = $new_user_id;
    $_SESSION['customers_email'] = $email;
    
    header("Location: product/list.php"); // Chuyển hướng đến trang sản phẩm
    exit;
} else {
    echo "Đăng ký thất bại: " . mysqli_error($connection);
}

// Đóng kết nối
include_once "../Connection/close.php";
?>
