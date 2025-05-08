<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách khách hàng</title>
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
    $sql = "SELECT * FROM customers";
    //Chạy query
    $customers = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Khách Hàng</h2>
            <a href="create.php" class="btn btn-success">Thêm Khách Hàng</a>
        </div>
    </div>
    <table class="table table-bordered table-light align-middle">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        foreach ($customers as $customers) {
        ?>
            <tr>
                <td>
                    <?php echo $customers['id']; ?>
                </td>
                <td>
                    <?php echo $customers['name']; ?>
                </td>
                <td>
                    <?php echo $customers['email']; ?>
                </td>
                <td>
                    <?php echo $customers['phone']; ?>
                </td>
                <td>
                    <?php echo $customers['address']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $customers['id']; ?>" class="btn btn-sm btn-danger">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $customers['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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

</html>