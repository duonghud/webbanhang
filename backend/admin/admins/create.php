<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm quản trị viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php include_once "../Layout/header.php"; ?>

  <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-left mb-4">
            <p>
                <a href="#" class="text-dark">Trang chủ</a> <a href="#" class="text-dark">> Danh sách quản trị viên</a> <a href="#" class="text-dark">> Thêm quản trị viên</a>
            </p>
        </div>
    </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="form-container">
          <h3 class="text-center form-title mb-4"> Thêm Quản Trị Viên</h3>
          <form method="post" action="store.php">
            <div class="mb-3">
              <label for="name" class="form-label">Tên quản trị viên</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-3">
              <label for="role" class="form-label">Vai trò</label>
              <select class="form-select" name="role" id="role">
                <option value="admin" selected>Admin</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Số điện thoại</label>
              <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <div class="mb-4">
              <label for="address" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" name="address" id="address">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-success">Thêm quản trị viên</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
