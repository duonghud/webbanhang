<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Navbar Styled</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<style>
  .nav-link-custom {
  color: #2c1e2c;
  font-weight: 500;
}

.nav-link-custom.active,
.nav-link-custom:hover {
  color: #c05fa9;
  border-bottom: 2px solid #c05fa9;
}

.btn-outline-pink {
  border: 2px dashed #c05fa9;
  color: #2c1e2c;
  background-color: transparent;
}

.btn-outline-pink:hover {
  background-color: #fbe4f3;
  color: #c05fa9;
}

.btn-pink {
  background-color: #f6d6eb;
  color: #2c1e2c;
  border: 2px dashed #c05fa9;
}

.btn-pink:hover {
  background-color: #f9cbea;
  color: #c05fa9;
}

.icon-btn {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  font-size: 1.2rem;
  padding: 0;
}
</style>
<body style="background-color: #fff9fc;">
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Left side: Logo + Menu -->
    <div class="d-flex align-items-center w-50">
      <a class="navbar-brand fw-bold text-dark me-4" href="#">Shop Hoa</a>
      <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row gap-4">
        <li class="nav-item"><a class="nav-link active text-uppercase fw-bold nav-link-custom" href="#">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link text-uppercase nav-link-custom" href="#">Cửa hàng</a></li>
        <li class="nav-item"><a class="nav-link text-uppercase nav-link-custom" href="#">Về chúng tôi</a></li>
        <li class="nav-item"><a class="nav-link text-uppercase nav-link-custom" href="#">Bài viết</a></li>
        <li class="nav-item"><a class="nav-link text-uppercase nav-link-custom" href="#">Liên hệ</a></li>
      </ul>
    </div>

    <!-- Right side: Icons + Button -->
    <div class="d-flex align-items-center justify-content-end w-50 gap-2">
      <button class="btn btn-outline-pink icon-btn"><i class="bi bi-person"></i></button>
      <button class="btn btn-outline-pink icon-btn"><i class="bi bi-cart"></i></button>
      <button class="btn btn-pink d-flex align-items-center gap-1">
        Liên hệ với chúng tôi <i class="bi bi-hand-index-thumb"></i>
      </button>
    </div>

  </div>
</nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
