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

    <?php include_once "../Layout/header.PHP"; ?>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0">
                <a href="#" class="text-dark">Trang chủ</a>
                <span class="mx-1 text-muted">></span>
                <a href="#" class="text-dark">Danh sách quản trị viên</a>
            </p>
            <form method="get" action="" class="d-flex">
                <?php
                // Lấy giá trị đang tìm kiếm
                if (isset($_GET["keyword"])) {
                    $keyword = $_GET["keyword"];
                } else {
                    $keyword = "";
                }
                ?>
                <input type="text" name="keyword" class="form-control form-control-sm me-2" placeholder="Tìm kiếm..." value="<?php echo $keyword; ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
    <?php
    include_once "../../Connection/open.php";

    // Số bản ghi mỗi trang
    $recordsPerPage = 2;

    // Lấy tổng số bản ghi (theo từ khóa nếu có)
    $sqlCount = "SELECT COUNT(*) AS total FROM admins WHERE name LIKE '%$keyword%'";
    $resultCount = mysqli_query($connection, $sqlCount);
    $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

    $pages = ceil($totalRecords / $recordsPerPage);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $recordsPerPage;

    // Lấy dữ liệu admins theo trang và từ khóa
    $sql = "SELECT * FROM admins WHERE name LIKE '%$keyword%' LIMIT $offset, $recordsPerPage";
    $admins = mysqli_query($connection, $sql);

    include_once "../../Connection/close.php";
    ?>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Quản Trị Viên</h2>
            <a href="create.php" class="btn btn-success">Thêm Quản Trị Viên</a>
        </div>

        <div class="table-responsive"></div>
            <table class="table table-bordered table-light align-middle table-sm-custom">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th colspan="2">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin) { ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo $admin['name']; ?></td>
                            <td><?php echo $admin['email']; ?></td>
                            <td><?php echo $admin['role']; ?></td>
                            <td><?php echo $admin['phone']; ?></td>
                            <td><?php echo $admin['address']; ?></td>
                            <td><a href="edit.php?id=<?php echo $admin['id']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
                            <td><a href="destroy.php?id=<?php echo $admin['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <nav class="d-flex justify-content-center">
            <ul class="pagination">
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
                        <a href="?page=<?php echo $page; ?> &&keyword=<?php echo $keyword; ?>">
                            <?php echo $page; ?>
                        </a>
                <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>

    <?php include_once "../Layout/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>