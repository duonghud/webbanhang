<?php
session_start();
include_once "../../Connection/open.php";

// Kiểm tra đăng nhập
if (!isset($_SESSION['customer_id'])) {
    header("Location: ../login.php");
    exit;
}

$customerId = $_SESSION['customer_id'];
$order_id = $_GET['id'] ?? null;

// Kiểm tra ID đơn hàng
if (!$order_id) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}

// Lấy đơn hàng thuộc về customer đang đăng nhập
$sqlOrder = "SELECT * FROM orders WHERE id = '$order_id' AND customer_id = '$customerId'";
$orderResult = mysqli_query($connection, $sqlOrder);
$order = mysqli_fetch_assoc($orderResult);

// Nếu không có đơn hàng phù hợp
if (!$order) {
    echo "Bạn không có quyền xem đơn hàng này.";
    exit;
}

// Lấy chi tiết sản phẩm
$sqlDetails = "SELECT od.*, p.name, p.image 
               FROM order_details od
               JOIN products p ON od.product_id = p.id
               WHERE od.order_id = '$order_id'";
$detailsResult = mysqli_query($connection, $sqlDetails);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Chi tiết đơn hàng #<?php echo $order_id; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include_once "../layout/header.php"?>
<body class="container mt-5">

  <h2 class="mb-4">Chi tiết đơn hàng #<?php echo $order_id; ?></h2>

  <div class="mb-4">
    <strong>Ngày đặt:</strong> <?php echo $order['order_date']; ?><br>
    <strong>Địa chỉ giao hàng:</strong> <?php echo $order['address']; ?>
    <strong>Trạng thái:</strong>
    <?php
      $statusText = ["Chờ duyệt", "Đang chuẩn bị", "Đang giao", "Đã giao", "Đã hủy", "Hoàn hàng"];
      echo $statusText[$order['status']] ?? "Không xác định";
    ?><br>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($detailsResult as $row): ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><img src="../../Admin/images/<?php echo $row['image']; ?>" width="80"></td>
          <td><?php echo number_format($row['price'] / $row['quantity'], 0, ',', '.'); ?> ₫</td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo number_format($row['price'], 0, ',', '.'); ?> ₫</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="oderList.php" class="btn btn-secondary mt-3">← Quay lại danh sách đơn hàng</a>

</body>
        <?php include_once "../layout/footer.php"; ?>
</html>
