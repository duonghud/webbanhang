<?php
    session_start();
    // Nếu cần kiểm tra admin đăng nhập, bạn có thể dùng $_SESSION['admin_id']
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include_once "../layout/header.php"; ?>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Danh sách đơn hàng</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Đơn</th>
                <th>Email khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include_once "../../Connection/open.php";

            $sql = "SELECT orders.*, customers.email 
                    FROM orders
                    INNER JOIN customers ON customers.id = orders.customer_id
                    ORDER BY orders.order_date DESC";
            $orders = mysqli_query($connection, $sql);
            include_once "../../Connection/close.php";
            foreach ($orders as $order) {
        ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['email']; ?></td>
            <td><?php echo $order['order_date']; ?></td>
            <td>
                <?php
                if($order['status'] == 0) {
                    echo 'Đang xử lý';
                } else if($order['status'] == 1) {
                    echo "Đang chuẩn bị hàng";
                } else if($order['status'] == 2) {
                    echo "Đang giao hàng";
                } else if($order['status'] == 3) {
                    echo "Đã giao hàng";
                } else if($order['status'] == 4) {
                    echo "Đã hủy";
                } else if($order['status'] == 5) {
                    echo "Hoàn hàng";
                }
                ?>
            </td>
            <td>
                <a href="orderDetails.php?id=<?php echo $order['id']; ?>" class='btn btn-sm btn-primary'>Detail</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
