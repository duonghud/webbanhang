<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách kiểu loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php
    include_once "../layout/header.php";
    ?>
    <?php
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql lấy dữ liệu
    $sql = "SELECT * FROM types";
    //Chạy query
    $types = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>

    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách kiểu loại</a>
            </p>
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Kiểu Loại</h2>
            <a href="create.php" class="btn btn-success">Thêm Kiểu Loại</a>
        </div>
    </div>
    <div class="table-responsive" style="max-width: 1200px; margin: auto;">
        <table class="table table-bordered table-light align-middle">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th colspan="2">Hành Động</th>
            </tr>
            <?php
            foreach ($types as $type) {
            ?>
                <tr>
                    <td>
                        <?php echo $type['id']; ?>
                    </td>
                    <td>
                        <?php echo $type['name']; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $type['id']; ?>" class="btn btn-sm btn-danger">Edit</a>
                    </td>
                    <td>
                        <a href="destroy.php?id=<?php echo $type['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>