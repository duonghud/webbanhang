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
    // Số bản ghi trong 1 trang
    $recordsPerPage = 3;
    // Lấy được tổng số bản ghi
    $sqlCountRecords = "SELECT COUNT(*) AS total_records FROM products ";
    // Chạy sql
    $countRecords = mysqli_query($connection, $sqlCountRecords);
    // Lấy tổng số bản ghi
    foreach ($countRecords as $countRecord) {
        $totalRecords = $countRecord["total_records"];
    }
    // Tính được số trang
    $pages = ceil($totalRecords / $recordsPerPage);
    // Lấy trang hiện tại
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    //Viết sql lấy dữ liệu
    $sql = "SELECT * FROM admins";
    //Chạy query
    $admins = mysqli_query($connection, $sql);
    //Đóng kết nối đến DB
    include_once "../../Connection/close.php";
    //Hiển thị dữ liệu
    ?>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0">
                <a href="#" class="text-dark">Trang chủ</a>
                <span class="mx-1 text-muted">></span>
                <a href="#" class="text-dark">Danh sách quản trị viên</a>
            </p>
            <form method="get" action="" class="d-flex">
                <?php
                $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
                ?>
                <input type="text" name="keyword" class="form-control form-control-sm me-2" placeholder="Tìm kiếm..." value="<?php echo $keyword; ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Quản Trị Viên</h2>
            <a href="create.php" class="btn btn-success">Thêm Quản Trị Viên</a>
        </div>
    </div>
    <div class="table-responsive" style="max-width: 1150px; margin: auto;">
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

        <?php
        for ($page = 1; $page <= $pages; $page++) {
            if ($keyword == "") {
        ?>
                <a href="?page=<?php echo $page; ?>">
                    <?php echo $page; ?>
                </a>
            <?php
            } else {
            ?>
                <a href="?page=<?php echo $page; ?>&&keyword=<?php echo $keyword; ?>">
                    <?php echo $page; ?>
                </a>
        <?php
            }
        }
        ?>
    </div>

</body>
<footer>
    <?php
    include_once "../Layout/footer.php";
    ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>