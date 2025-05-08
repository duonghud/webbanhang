<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../style.css">
</head>
<body>
  <?php include_once "../Layout/header.php"; ?>

    <?php
        //Mở kết nối
        include_once "../../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM brands";
        //Chạy sql
        $brands = mysqli_query($connection, $sql);

        $sql = "SELECT * FROM types";
        //Chạy sql
        $types = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../../Connection/close.php";
    ?>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center mb-4">Thêm sản phẩm</h2>
        <form method="post" action="store.php" class="p-4 border rounded shadow-sm bg-light">
          <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng hàng:</label>
            <input type="number" class="form-control" name="quantity" id="quantity" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" class="form-control" name="price" id="price" required>
          </div>
          <div class="mb-3">
            <label for="material" class="form-label">Chất liệu:</label>
            <input type="text" class="form-control" name="material" id="material">
          </div>
          <div class="mb-3">
            <label for="color" class="form-label">Màu sắc:</label>
            <input type="text" class="form-control" name="color" id="color">
          </div>
          <div class="mb-3">
            <label for="number_of_flower" class="form-label">Số lượng hoa:</label>
            <input type="number" class="form-control" name="number_of_flower" id="number_of_flower">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
          <label for="brand_id" class="form-label">Thương hiệu: </label>
          <select class="form-control" id="brand_id" name="brand_id">
          <?php
                foreach ($brands as $brand) {
            ?>
                <option value="<?php echo $brand["id"]; ?>">
                    <?php echo $brand["name"]; ?>
                </option>
            <?php
                }
            ?>
        </select><br>
          </div>
          <div class="mb-3">
          <label for="type_id" class="form-label">Kiểu loại: </label>
          <select class="form-control" id="type_id" name="type_id">
          <?php
                foreach ($types as $type) {
            ?>
                <option value="<?php echo $type["id"]; ?>">
                    <?php echo $type["name"]; ?>
                </option>
            <?php
                }
            ?>
        </select><br>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../Layout/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
