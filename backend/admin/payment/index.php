<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách phương thức thanh toán</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../style.css">
</head>

<body>

  <!-- Breadcrumb + Search form -->
  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <p class="mb-0">
        <a href="#" class="text-dark">Trang chủ</a>
        <span class="mx-1 text-muted">></span>
        <a href="#" class="text-dark">Danh sách phương thức thanh toán</a>
      </p>

      <!-- Search form -->
      <form method="get" action="" class="d-flex">
        <?php
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
        ?>
        <input type="text" name="keyword" class="form-control form-control-sm me-2" placeholder="Tìm kiếm..." value="<?php echo $keyword; ?>">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>

  <?php include_once "../layout/header.php"; ?>

  <?php
  // Mở kết nối DB
  include_once "../../Connection/open.php";

  // Cấu hình phân trang
  $recordsPerPage = 2;

  // Đếm tổng số bản ghi có từ khóa
  $sqlCount = "SELECT COUNT(*) AS total_records FROM payment_method WHERE name LIKE '%$keyword%'";
  $countRecords = mysqli_query($connection, $sqlCount);
  $totalRecords = mysqli_fetch_assoc($countRecords)['total_records'];

  // Tổng số trang
  $pages = ceil($totalRecords / $recordsPerPage);

  // Trang hiện tại
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;

  // Vị trí bắt đầu
  $start = ($page - 1) * $recordsPerPage;

  // Truy vấn dữ liệu
  $sql = "SELECT * FROM payment_method WHERE name LIKE '%$keyword%' LIMIT $start, $recordsPerPage";
  $payment_methods = mysqli_query($connection, $sql);

  // Đóng kết nối
  include_once "../../Connection/close.php";
  ?>

  <!-- Tiêu đề + nút thêm -->
  <div class="container w-40 my-1">
    <div class="d-flex justify-content-between align-items-left mb-4">
      <h2>Danh sách phương thức thanh toán</h2>
      <a href="create.php" class="btn btn-success">Thêm phương thức</a>
    </div>
  </div>

  <!-- Bảng hiển thị -->
  <div class="table-responsive">
    <table class="table table-bordered table-primary align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Id</th>
          <th>Phương thức</th>
          <th colspan="2">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($payment_methods as $method) : ?>
          <tr>
            <td><?= $method['id']; ?></td>
            <td><?= $method['name']; ?></td>
            <td>
              <a href="edit.php?id=<?= $method['id']; ?>" class="btn btn-sm btn-danger">Sửa</a>
            </td>
            <td>
              <a href="destroy.php?id=<?= $method['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Phân trang -->
    <div class="text-center my-3">
      <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <?php if ($keyword == "") : ?>
          <a class="btn btn-outline-dark btn-sm mx-1" href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php else : ?>
          <a class="btn btn-outline-dark btn-sm mx-1" href="?page=<?= $i; ?>&keyword=<?= urlencode($keyword); ?>"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
