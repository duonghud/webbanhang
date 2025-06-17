<?php
    session_start();
    //Lấy cart
    $carts = $_SESSION['cart'];
    //Mở kết nối
    include_once '../../Connection/open.php';
    //Lấy ngày đặt hàng là ngày hôm nay
    $orderDate = date("Y-m-d");
    //Order status: 0 là đang chờ duyệt, 1 đang chuẩn bị hàng, 2 đang giao hàng, 3 đã giao hàng, 4 hủy, 5 hoàn hàng, ...
    $orderStatus = 0;
    //Lấy id của người đặt hàng
    $customerId = $_SESSION['customer_id'];
    //Viết sql lưu bảng orders
    $sqlSaveOrder = "INSERT INTO orders(order_date, status, customer_id)
                    VALUES ('$orderDate', '$orderStatus', '$customerId')";
    //Chạy sql lưu Orders
    mysqli_query($connection, $sqlSaveOrder);
    /* Lấy id của order vừa được tạo */
    //Viết sql
    $sqlGetOrderIds = "SELECT MAX(id) AS order_id FROM orders WHERE customer_id = '$customerId'";
    //Chạy sql
    $getOrderIds = mysqli_query($connection, $sqlGetOrderIds);
    //Lấy order_id
    foreach ($getOrderIds as $getOrderId){
        $orderId = $getOrderId['order_id'];
    }
    /* Lấy thông tin sản phẩm để lưu vào order_details */
    foreach ($carts as $productId => $quantity){
        //Viết sql lấy giá của product
        $sqlGetPrice = "SELECT price FROM products WHERE id = '$productId'";
        //Chạy sql
        $getPrices = mysqli_query($connection, $sqlGetPrice);
        //Lấy price
        foreach ($getPrices as $getPrice){
            $price = $getPrice['price'];
        }
        //Viết sql lưu dữ liệu vào order_details
        $sqlSaveOrderDetails = "INSERT INTO order_details(order_id, product_id, quantity, price)
                                VALUES ('$orderId', '$productId', $quantity, $price)";
        //Chạy sql
        mysqli_query($connection, $sqlSaveOrderDetails);
    }
    //Đóng kết nối
    include_once '../../Connection/close.php';
    //xóa giỏ hàng
    unset($_SESSION['cart']);
    //Quay về danh sách đơn hàng
    header("Location: oderList.php");
?>