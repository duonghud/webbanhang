<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include_once "../layout/header.php"; ?>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Chi tiết đơn hàng #<?php echo $_GET['id']; ?></h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //Lấy id của order
            $id = $_GET['id'];
            //Mở kết nối
            include_once "../../Connection/open.php";
            //Viết sql
            $sql = "SELECT products.id, products.name, products.image, order_details.price, order_details.quantity FROM order_details
                    INNER JOIN products ON order_details.product_id = products.id
                    WHERE order_details.order_id = '$id'";
            //Chạy sql
            $orderDetails = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../../Connection/close.php";
            //Hiển thị
            foreach ($orderDetails as $orderDetail) {
        ?>
            <tr>
                <td>
                    <?php echo $orderDetail['id'] ?>
                </td>
                <td>
                    <?php echo $orderDetail['name'] ?>
                </td>
                <td>
                    <img src="../images/<?php echo $orderDetail['image'] ?>" alt="image" width="100px" height="100px">
                </td>
                <td>
                    <?php echo $orderDetail['price'] ?>
                </td>
                <td>
                    <?php echo $orderDetail['quantity'] ?>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">← Quay lại danh sách đơn hàng</a>
        <a href="changeStatus.php?id=<?php echo $_GET['id']; ?>" class="btn btn-warning">Thay đổi trạng thái</a>
    </div>
</div>
</body>
</html>
