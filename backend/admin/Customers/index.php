<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách khách hàng</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom style -->
  <link rel="stylesheet" href="../../../style.css">
</head>

<body>

  <!-- Include phần header -->
  <?php include_once "../Layout/header.php"; ?>

  <!-- Breadcrumb + Form tìm kiếm -->
  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <p class="mb-0">
        <a href="#" class="text-dark">Trang chủ</a>
        <span class="mx-1 text-muted">></span>
        <a href="#" class="text-dark">Danh sách khách hàng</a>
      </p>

      <!-- Form tìm kiếm -->
      <form method="get" action="" class="d-flex">
        <?php
        // Lấy từ khóa nếu có từ URL (GET)
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
        ?>
        <input type="text" name="keyword" class="form-control form-control-sm me-2" placeholder="Tìm kiếm..." value="<?php echo $keyword; ?>">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>

  <?php
  // Kết nối DB
  include_once "../../Connection/open.php";

  // Số lượng bản ghi trên mỗi trang
  $recordsPerPage = 4;

  // Câu lệnh đếm tổng số bản ghi phù hợp với từ khóa tìm kiếm
  $sqlCount = "SELECT COUNT(*) AS total FROM customers WHERE name LIKE '%$keyword%'";
  $resultCount = mysqli_query($connection, $sqlCount);
  $totalRecords = mysqli_fetch_assoc($resultCount)["total"];

  // Tính tổng số trang
  $pages = ceil($totalRecords / $recordsPerPage);

  // Trang hiện tại (mặc định là 1)
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;

  // Tính vị trí bắt đầu (OFFSET)
  $start = ($page - 1) * $recordsPerPage;

  // Lấy danh sách khách hàng giới hạn theo phân trang và từ khóa tìm kiếm
  $sql = "SELECT * FROM customers WHERE name LIKE '%$keyword%' LIMIT $start, $recordsPerPage";
  $customers = mysqli_query($connection, $sql);

  // Đóng kết nối DB
  include_once "../../Connection/close.php";
  ?>

  <!-- Tiêu đề và nút thêm khách hàng -->
  <div class="container w-40 my-1">
    <div class="d-flex justify-content-between align-items-left mb-4">
      <h2>Danh Sách Khách Hàng</h2>
      <a href="create.php" class="btn btn-success">Thêm Khách Hàng</a>
    </div>
  </div>

  <!-- Bảng hiển thị danh sách khách hàng -->
  <div class="table-responsive">
    <table class="table table-bordered table-light align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Id</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th colspan="2">Hành Động</th>
        </tr>
      </thead>
      <tbody>
        <!-- Lặp qua từng khách hàng và hiển thị -->
        <?php foreach ($customers as $customer) : ?>
          <tr>
            <td><?= $customer['id']; ?></td>
            <td><?= $customer['name']; ?></td>
            <td><?= $customer['email']; ?></td>
            <td><?= $customer['phone']; ?></td>
            <td><?= $customer['address']; ?></td>
            <td><a href="edit.php?id=<?= $customer['id']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
            <td><a href="destroy.php?id=<?= $customer['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Phân trang -->
    <div class="text-center">
      <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <?php if ($keyword == "") : ?>
          <a href="?page=<?= $i; ?>" class="btn btn-outline-primary btn-sm mx-1"><?= $i; ?></a>
        <?php else : ?>
          <a href="?page=<?= $i; ?>&keyword=<?= $keyword; ?>" class="btn btn-outline-primary btn-sm mx-1"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
