<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập quản trị viên</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include_once "../Layout/header.PHP"; ?>

    <div class="container my-5">
        <h2 class="mb-4">Cập nhập quản trị viên</h2>

        <?php
            $id = $_GET['id'];
            include_once "../../Connection/open.php";
            $sql = "SELECT * FROM admins WHERE id = '$id'";
            $admins = mysqli_query($connection, $sql);
            include_once "../../Connection/close.php";
        ?>

        <form method="post" action="update.php" class="row g-3">
            <?php foreach ($admins as $admin) { ?>
                <div class="col-md-6">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" class="form-control" readonly value="<?php echo $admin['id']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $admin['name']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $admin['email']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $admin['password']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="role" class="form-label">Vai trò</label>
                    <input type="role" name="role" id="role" class="form-control" value="<?php echo $admin['role']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $admin['phone']; ?>">
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $admin['address']; ?>">
                </div>
            <?php } ?>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>

    <?php include_once "../Layout/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
