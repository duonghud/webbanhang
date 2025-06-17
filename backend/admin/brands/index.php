<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách thương hiệu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css ">
</head>

<body>
    <?php
    include_once "../Layout/header.PHP";
    ?>
    <?php
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql lấy dữ liệu
    $sql = "SELECT * FROM brands";
    //Chạy query
    $brands = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>

    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách thương hiệu</a>
            </p>
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách thương hiệu</h2>
            <a href="create.php" class="btn btn-success">Thêm Thương Hiệu</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-light align-middle table-sm-custom">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($brands as $brand): ?>
                    <tr>
                        <td><?= $brand['id']; ?></td>
                        <td><?= $brand['name']; ?></td>
                        <td><a href="edit.php?id=<?= $brand['id']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
                        <td><a href="destroy.php?id=<?= $brand['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>