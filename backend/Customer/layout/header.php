<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bloom Flower Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #fff9fc;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar-custom {
      background-color: #fff9fc;
      padding: 1rem 2rem;
      border-bottom: 1px solid #f3d3e4;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: bold;
      color: #c65f9b;
      font-size: 1.8rem;
    }

    .navbar-brand img {
      height: 36px;
      margin-right: 8px;
    }

    .nav-link-custom {
      color: #3e2b3e;
      font-weight: 500;
      text-transform: uppercase;
      position: relative;
    }

    .nav-link-custom.active,
    .nav-link-custom:hover {
      color: #c65f9b;
    }

    .nav-link-custom.active::after,
    .nav-link-custom:hover::after {
      content: "";
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #c65f9b;
    }

    .icon-btn {
      width: 42px;
      height: 42px;
      border-radius: 12px;
      font-size: 1.2rem;
      padding: 0;
      border: 1px dashed #c65f9b;
      color: #3e2b3e;
      background-color: transparent;
      transition: all 0.3s ease;
    }

    .icon-btn:hover {
      background-color: #fce9f4;
      color: #c65f9b;
    }

    .btn-gradient {
      background: linear-gradient(135deg, #ce6faa, #d893c5);
      color: #fff;
      font-weight: 500;
      border: none;
      border-radius: 0.75rem;
      padding: 0.5rem 1.2rem;
      position: relative;
      overflow: hidden;
      /* Prevents the pseudo-element from overflowing the button */
      transition: all 0.3s ease;
      box-shadow: 0 3px 8px rgba(198, 95, 155, 0.3);
    }

    .btn-gradient::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #e980bd;
      transform: scaleX(0);
      transform-origin: bottom right;
      transition: transform 0.3s ease;
      z-index: -1;
      /* Ensures the fill is behind the text */
    }

    .btn-gradient:hover {
      background: linear-gradient(135deg, #e980bd, #e3a0d0);
      color: #fff;
    }

    .btn-gradient:hover::before {
      transform: scaleX(1);
      /* Lớp điền màu mở rộng từ trái sang phải */
      transform-origin: bottom left;
    }

    /* Custom style for the search input */
    .search-bar input {
      border-radius: 12px;
      padding: 0.6rem 1rem;
      border: 1px solid #c65f9b;
      width: 180px; /* Reduced width */
    }

    /* Search icon inside the input */
    .search-bar .input-group-text {
      background-color: transparent;
      border: none;
      color: #c65f9b;
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <!-- Left side: Logo + Menu -->
      <div class="d-flex align-items-center gap-4">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo-flower.png" alt="Logo" /> bloom
        </a>
        <ul class="navbar-nav d-flex flex-row gap-4">
          <li class="nav-item"><a class="nav-link nav-link-custom active" href="#">Trang Chủ</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom" href="#">Cửa Hàng</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom" href="#">Giới Thiệu Về Chúng Tôi</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom" href="#">Bài Viết</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom" href="#">Trang</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom" href="#">Liên Hệ Với Chúng Tôi</a></li>
        </ul>
      </div>

      <!-- Center: Search Bar with Icon -->
      <div class="search-bar d-none d-lg-block">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Tìm kiếm..." />
          <span class="input-group-text"><i class="bi bi-search"></i></span>
        </div>
      </div>

      <!-- Right side: Icons -->
      <div class="d-flex align-items-center gap-3">
        <button class="icon-btn"><i class="bi bi-person"></i></button>
        <button class="icon-btn"><i class="bi bi-cart"></i></button>
      </div>

    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
