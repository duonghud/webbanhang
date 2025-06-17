<?php
    session_start();
    //Lấy email, pwd từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Mở kết nối
    include_once "../Connection/open.PHP";
    //Viết sql
    $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $results = mysqli_query($connection, $sql);
    
    // Lấy bản ghi
    $result = mysqli_fetch_assoc($results);
    
    if ($result === null) {
        // Không có tài khoản đúng
        
        header("Location: index.php");
        exit;
    } else {
        // Đăng nhập thành công
        $_SESSION['customer_id'] = $result['id'];
        $_SESSION['cusromer_email'] = $result['email'];
        $_SESSION['customer_name'] = $result['name'];
        header("Location: product/list.php");
        exit;
    }
?>