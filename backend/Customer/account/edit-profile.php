<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../index.php");
    exit();
}

include_once "../../Connection/open.php";

$customer_id = $_SESSION['customer_id'];

// Xử lý cập nhật khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $update_sql = "UPDATE customers SET name = '$name', phone = '$phone', address = '$address' WHERE id = $customer_id";
    mysqli_query($connection, $update_sql);

    // Quay về trang account.php sau khi cập nhật
    header("Location: account.php");
    exit();
}

// Lấy thông tin hiện tại để hiển thị lên form
$sql = "SELECT * FROM customers WHERE id = $customer_id";
$result = mysqli_query($connection, $sql);
$customer = mysqli_fetch_assoc($result);

include_once "../../Connection/close.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .edit-container {
            max-width: 600px;
            margin: 40px auto;
        }
    </style>
</head>

<?php include_once "../layout/header.php"; ?>

<body>
    <div class="container edit-container">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Cập nhật thông tin cá nhân</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $customer['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= $customer['password'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?= $customer['address'] ?></textarea>
                    </div>
                    <button type="submit"  class="btn btn-primary">Lưu thay đổi</button>
                    <a href="account.php" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

<?php include_once "../layout/footer.php"; ?>
</html>
