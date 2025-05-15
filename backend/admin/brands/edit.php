<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập thương hiệu</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your custom styles -->
    <link rel="stylesheet" href="../../../style.css">
</head>

<body class="bg-light">
    <?php include_once "../Layout/header.PHP"; ?>

    <?php
    $id = $_GET['id'];
    include_once "../../Connection/open.php";
    $sql = "SELECT * FROM brands WHERE id = '$id'";
    $brands = mysqli_query($connection, $sql);
    include_once "../../Connection/close.php";
    ?>

    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách thương hiệu</a> <a href="#" class="text-dark">> Cập nhập thương hiệu</a>
            </p>
        </div>
    </div>

    <div class="container py-5">
        <h2 class="mb-4">Cập nhật thương hiệu</h2>
        <form method="post" action="update.php" class="bg-white p-4 rounded shadow-sm">
            <?php foreach ($brands as $brand) { ?>
                <div class="mb-3">
                    <label for="id" class="form-label">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $brand['id']; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên thương hiệu:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $brand['name']; ?>">
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <!-- Bootstrap 5 JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>