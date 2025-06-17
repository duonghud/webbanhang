<?php
include_once "../Layout/header.php";
include_once "../../Connection/open.php";

// Lấy danh sách khách có giỏ hàng
$sql = "SELECT DISTINCT customers.id, customers.name, customers.email
        FROM cart
        JOIN customers ON cart.customer_id = customers.id";
$customers = mysqli_query($connection, $sql);
include_once "../../Connection/close.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý giỏ hàng</title>
</head>
<body>
    <h2>Danh sách khách hàng đã thêm sản phẩm vào giỏ</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?= $customer['name'] ?></td>
            <td><?= $customer['email'] ?></td>
            <td><a href="Cart.php?customer_id=<?= $customer['id'] ?>">Xem chi tiết</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
