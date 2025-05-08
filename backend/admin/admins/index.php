<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách quản trị viên</title>
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
    $sql = "SELECT * FROM admins";
    //Chạy query
    $admins = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Quản Trị Viên</h2>
            <a href="create.php" class="btn btn-success">Thêm Quản Trị Viên</a>
        </div>
    </div>
    <table class="table table-bordered table-light align-middle">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Address</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        foreach ($admins as $admins) {
        ?>
            <tr>
                <td>
                    <?php echo $admins['id']; ?>
                </td>
                <td>
                    <?php echo $admins['name']; ?>
                </td>
                <td>
                    <?php echo $admins['email']; ?>
                </td>
                <td>
                    <?php echo $admins['role']; ?>
                </td>
                <td>
                    <?php echo $admins['phone']; ?>
                </td>
                <td>
                    <?php echo $admins['address']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $admins['id']; ?>" class="btn btn-sm btn-danger">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $admins['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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