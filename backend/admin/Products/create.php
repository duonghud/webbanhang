<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php include_once "../Layout/header.php"; ?>

  <?php
  include_once "../../Connection/open.php";
  $brands = mysqli_query($connection, "SELECT * FROM brands");
  $types = mysqli_query($connection, "SELECT * FROM types");
  include_once "../../Connection/close.php";
  ?>

  <div class="container w-40 my-1">
    <div class="d-flex justify-content-between align-items-left mb-4">
      <p>
        <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách sản phẩm</a> <a href="#" class="text-dark">> Thêm sản phẩm mới</a>
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <h3 class="text-center form-title mb-4"> Thêm Sản Phẩm Mới</h3>
          <form method="post" action="store.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
            <!--  <div class="col-md-6 mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image" >
              </div> -->
              <div class="col-md-6 mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="quantity" name="quantity" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="material" class="form-label">Chất liệu</label>
                <input type="text" class="form-control" id="material" name="material">
              </div>
              <div class="col-md-6 mb-3">
                <label for="color" class="form-label">Màu sắc</label>
                <input type="text" class="form-control" id="color" name="color">
              </div>
              <div class="col-md-6 mb-3">
                <label for="number_of_flower" class="form-label">Số lượng hoa</label>
                <input type="number" class="form-control" id="number_of_flower" name="number_of_flower">
              </div>
              <div class="col-12 mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label for="brand_id" class="form-label">Thương hiệu</label>
                <select class="form-select" id="brand_id" name="brand_id">
                  <?php foreach ($brands as $brand) { ?>
                    <option value="<?= $brand["id"]; ?>"><?= $brand["name"]; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6 mb-4">
                <label for="type_id" class="form-label">Kiểu loại</label>
                <select class="form-select" id="type_id" name="type_id">
                  <?php foreach ($types as $type) { ?>
                    <option value="<?= $type["id"]; ?>"><?= $type["name"]; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>