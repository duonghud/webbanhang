<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách hình ảnh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php
    include_once "../Layout/header.PHP";
    ?>
    <?php
    //Mở kết nối đến DB
    include_once "../../Connection/open.php";
    //Viết sql lấy dữ liệu
    $sql = "SELECT * FROM images";
    //Chạy query
    $images = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách hình ảnh</h2>
            <a href="create.php" class="btn btn-success">Thêm hình ảnh</a>
        </div>
    </div>
    <table class="table table-bordered table-light align-middle">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Product id</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        foreach ($images as $images) {
        ?>
            <tr>
                <td>
                    <?php echo $images['id']; ?>
                </td>
                <td>
                    <?php echo $images['name']; ?>
                </td>
                <td>
                    <?php echo $images['product_id']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $images['id']; ?>" class="btn btn-sm btn-danger">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $images['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
<footer>
    <?php
    include_once "../Layout/footer.php";
    ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>