<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách phương thức thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php include_once "../layout/header.php"; ?>

    <?php
    // Mở kết nối đến DB
    include_once "../../Connection/open.php";
    // Viết SQL lấy dữ liệu
    $sql = "SELECT * FROM payment_method";
    // Chạy query
    $payment_method = mysqli_query($connection, $sql);

    // Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    ?>
    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách phương thức thanh toán</a>
            </p>
        </div>
    </div>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách phương thức thanh toán</h2>
            <a href="create.php" class="btn btn-success"> Thêm phương thức</a>
        </div>

        <div class="table-responsive" style="max-width: 1150px; margin: auto;">
            <table class="table table-bordered table-light align-middle">
                <thead class="table-light">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            phương thức
                        </th>
                        <th colspan="2">
                            Hành động
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($payment_method as $method) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $method['id']; ?>
                            </td>
                            <td>
                                <?php echo $method['name']; ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $method['id']; ?>" class="btn btn-sm btn-danger">Sửa</a>
                            </td>
                            <td>
                                <a href="destroy.php?id=<?php echo $method['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>