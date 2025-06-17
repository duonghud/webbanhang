<?php
    session_start();
    if (!isset($_SESSION['customer_id'])) {
        header("Location: ../index.php");
        exit();
    }
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đơn hàng của tôi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #fff0f5; /* nền hồng nhạt */
        }
        main {
            flex: 1;
        }
        footer {
            background-color: #ffe6f0;
            padding: 1rem;
            text-align: center;
            color: #444;
        }
        h2 {
            color: #d63384; /* màu hồng Bootstrap */
        }
        .table thead {
            background-color: #f8d7da; /* hồng nhẹ */
        }
        .table tbody tr:hover {
            background-color: #ffe6f0;
        }
        .btn-primary {
            background-color: #d63384;
            border-color: #d63384;
        }
        .btn-primary:hover {
            background-color: #c2186a;
            border-color: #c2186a;
        }
    </style>
</head>

<body>
    <?php include_once "../layout/header.php"; ?>

    <main class="container mt-5 mb-5">
        <h2 class="mb-4 text-center"><i class="bi bi-receipt"></i> Đơn hàng của bạn</h2>
        <table class="table table-bordered rounded shadow-sm overflow-hidden">
            <thead class="table-light">
                <tr>
                    <th>ID Đơn</th>
                    <th>Email</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $customersId = $_SESSION['customer_id'];
                include_once "../../Connection/open.php";

                $sql = "SELECT orders.*, customers.email 
                        FROM orders
                        INNER JOIN customers ON customers.id = orders.customer_id
                        WHERE orders.customer_id = '$customersId'
                        ORDER BY orders.order_date DESC";
                $orders = mysqli_query($connection, $sql);

                if (mysqli_num_rows($orders) > 0) {
                    foreach ($orders as $order) {
                        echo "<tr>";
                        echo "<td>" . $order['id'] . "</td>";
                        echo "<td>" . $order['email'] . "</td>";
                        echo "<td>" . date("d/m/Y", strtotime($order['order_date'])) . "</td>";
                        echo "<td>";
                        switch ($order['status']) {
                            case 0: echo "Đang xử lý"; break;   
                            case 1: echo "Đang chuẩn bị hàng"; break;
                            case 2: echo "Đang giao hàng"; break;
                            case 3: echo "Đã giao hàng"; break;
                            case 4: echo "Đã hủy"; break;
                            case 5: echo "Hoàn hàng"; break;
                            default: echo "Không xác định";
                        }
                        echo "</td>";
                        echo "<td><a href='oderDetails.php?id=" . $order['id'] . "' class='btn btn-sm btn-primary'>Xem</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Bạn chưa có đơn hàng nào.</td></tr>";
                }

                include_once "../../Connection/close.php";
            ?>
            </tbody>
        </table>
    </main>

    <footer>
        <?php include_once "../layout/footer.php"; ?>
    </footer>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
