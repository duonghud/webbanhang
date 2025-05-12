<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm phương thức thanh toán</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../style.css">
</head>
<body>
  <?php include_once "../Layout/header.php"; ?>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Thêm phương thương hiệu</h2>
        <form method="post" action="store.php" class="border p-4 rounded shadow-sm bg-light">
          <div class="mb-3">
            <label for="name" class="form-label">Tên thương hiệu:</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="text-left">
            <button type="submit" class="btn btn-success">Thêm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
