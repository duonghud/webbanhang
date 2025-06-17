<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../index.php");
    exit();
}

include_once "../../Connection/open.php";

$customer_id = $_SESSION['customer_id'];
$sql = "SELECT * FROM customers WHERE id = $customer_id";
$result = mysqli_query($connection, $sql);
$customer = mysqli_fetch_assoc($result);

include_once "../../Connection/close.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .account-container {
            max-width: 600px;
            margin: 40px auto;
        }
    </style>
</head>

<?php include_once "../layout/header.php"; ?>

<body>
    <div class="container account-container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Thông tin tài khoản</h4>
                <a href="edit-profile.php" class="btn btn-light btn-sm"><i class="bi bi-pencil-square"></i> Sửa thông tin</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-4">
                    <tr>
                        <th class="text-muted">Họ tên:</th>
                        <td class="fw-bold"><?= $customer['name'] ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Email:</th>
                        <td><?= $customer['email'] ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Mật khẩu:</th>
                        <td>
                            <span id="maskedPassword">●●●●●</span>
                            <span id="realPassword" style="display:none;"><?= $customer['password'] ?></span>
                            <button class="btn btn-sm btn-outline-secondary ms-2" onclick="togglePassword()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Số điện thoại:</th>
                        <td><?= $customer['phone'] ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Địa chỉ:</th>
                        <td><?= $customer['address'] ?></td>
                    </tr>
                </table>
                <a href="../logout.php" class="btn btn-danger">Đăng xuất</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const masked = document.getElementById("maskedPassword");
            const real = document.getElementById("realPassword");
            const btn = event.currentTarget.querySelector("i");

            if (real.style.display === "none") {
                real.style.display = "inline";
                masked.style.display = "none";
                btn.classList.remove("bi-eye");
                btn.classList.add("bi-eye-slash");
            } else {
                real.style.display = "none";
                masked.style.display = "inline";
                btn.classList.remove("bi-eye-slash");
                btn.classList.add("bi-eye");
            }
        }
    </script>
</body>

<?php include_once "../layout/footer.php"; ?>
</html>
