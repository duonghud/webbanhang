<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách sản phẩm</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../../style.css">
</head>

<body>

  <!-- Include header layout -->
  <?php include_once "../Layout/header.php"; ?>

  <!-- Breadcrumb + Search form -->
  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <p class="mb-0">
        <a href="#" class="text-dark">Trang chủ</a>
        <span class="mx-1 text-muted">></span>
        <a href="#" class="text-dark">Danh sách quản trị viên</a>
      </p>
      
      <!-- Search form -->
      <form method="get" action="" class="d-flex">
        <?php
        // Lấy từ khóa tìm kiếm nếu có
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
        ?>
        <input type="text" name="keyword" class="form-control form-control-sm me-2" placeholder="Tìm kiếm..." value="<?php echo $keyword; ?>">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>

  <?php
  // Mở kết nối đến database
  include_once "../../Connection/open.php";

  // Số bản ghi mỗi trang
  $recordsPerPage = 2;

  // Truy vấn đếm tổng số bản ghi (có lọc theo từ khóa)
  $sqlCountRecords = "SELECT COUNT(*) AS total_records FROM products WHERE products.name LIKE '%$keyword%'";
  $countRecords = mysqli_query($connection, $sqlCountRecords);

  // Lấy tổng số bản ghi
  foreach ($countRecords as $countRecord) {
    $totalRecords = $countRecord["total_records"];
  }

  // Tính tổng số trang
  $pages = ceil($totalRecords / $recordsPerPage);

  // Lấy trang hiện tại
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;

  // Vị trí bắt đầu truy vấn
  $start = ($page - 1) * $recordsPerPage;

  // Truy vấn danh sách sản phẩm (có phân trang và lọc từ khóa)
  $sql = "SELECT products.*, brands.name AS brand_name, types.name AS type_name 
          FROM products 
          INNER JOIN brands ON brands.id = products.brand_id
          INNER JOIN types ON types.id = products.type_id
          WHERE products.name LIKE '%$keyword%'
          LIMIT $start, $recordsPerPage";

  // Thực hiện truy vấn
  $products = mysqli_query($connection, $sql);

  // Đóng kết nối
  include_once "../../Connection/close.php";
  ?>

  <!-- Tiêu đề + nút thêm sản phẩm -->
  <div class="container w-40 my-1">
    <div class="d-flex justify-content-between align-items-left mb-4">
      <h2>Danh Sách Sản Phẩm</h2>
      <a href="create.php" class="btn btn-success">Thêm Sản Phẩm</a>
    </div>
  </div>

  <!-- Bảng hiển thị danh sách sản phẩm -->
  <div class="table-responsive" style="max-width: 1150px; margin: auto;">
    <table class="table table-bordered table-light align-middle text-center">
      <thead class="table-primary">
        <tr>
          <th>Id</th>
          <th>Tên sản phẩm</th>
          <!-- <th>Ảnh</th> -->
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Chất liệu</th>
          <th>Màu sắc</th>
          <th>Số lượng hoa</th>
          <th>Mô tả</th>
          <th>Thương hiệu</th>
          <th>Kiểu loại</th>
          <th colspan="2">Hành Động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
        <tr>
          <td><?= $product['id']; ?></td>
          <td><?= $product['name']; ?></td>
          <!-- <td><img src="../image/<?php echo $product["image"] ?>" alt="product image"></td> -->
          <td><?= $product['quantity']; ?></td>
          <td><?= number_format($product['price'], 0, ',', '.'); ?>₫</td>
          <td><?= $product['material']; ?></td>
          <td><?= $product['color']; ?></td>
          <td><?= $product['number_of_flower']; ?></td>
          <td><?= $product['description']; ?></td>
          <td><?= $product['brand_name']; ?></td>
          <td><?= $product['type_name']; ?></td>
          <td><a href="edit.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
          <td><a href="destroy.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Phân trang -->
    <?php
    for ($page = 1; $page <= $pages; $page++) {
      if ($keyword == "") {
        ?>
        <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
      <?php } else { ?>
        <a href="?page=<?php echo $page; ?>&keyword=<?php echo $keyword; ?>"><?php echo $page; ?></a>
      <?php }
    }
    ?>
  </div>

</body>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
