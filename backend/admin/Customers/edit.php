<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập khách hàng</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php include_once "../Layout/header.php"; ?>

    <?php
    // Lấy id
    $id = $_GET['id'];
    // Kết nối db
    include_once "../../Connection/open.php";
    // Viết sql
    $sql = "SELECT * FROM customers WHERE id = '$id'";
    // Chạy sql
    $customers = mysqli_query($connection, $sql);
    // Đóng kết nối
    include_once "../../Connection/close.php";
    ?>

    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách khách hàng</a> <a href="#" class="text-dark">> Cập nhập khách hàng</a>
            </p>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">Cập nhật khách hàng</h2>
        <form method="post" action="update.php" class="row g-3">
            <?php foreach ($customers as $customer) { ?>
                <div class="col-md-6">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" readonly value="<?= $customer['id']; ?>" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="<?= $customer['name']; ?>" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="<?= $customer['email']; ?>" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" value="<?= $customer['phone']; ?>" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" value="<?= $customer['address']; ?>" class="form-control">
                </div>
            <?php } ?>

            <div class="col-12 text-left">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>