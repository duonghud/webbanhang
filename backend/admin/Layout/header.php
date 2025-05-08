<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sidebar Toggle</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
  <style>
    body {
      overflow-x: hidden;
    }

    #sidebar {
      width: 250px;
      min-height: 100vh;
      background: #f8f9fa;
      transition: margin-left 0.3s ease;
    }

    #sidebar.collapsed {
      margin-left: -250px;
    }

    #content {
      transition: margin-left 0.3s ease;
      margin-left: 250px;
    }

    #content.full-width {
      margin-left: 0;
    }

    .nav-link:hover {
      background-color: #e2e6ea;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div id="sidebar" class="d-flex flex-column position-fixed p-3 border-end">
    <a href="../Admins/index.php" class="d-flex align-items-center mb-3 text-dark text-decoration-none">
      <span class="fs-5 ms-2">Quản trị viên </span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li><a href="../Brands/index.PHP" class="nav-link">Quản lý Thương hiệu</a></li>
      <li><a href="../Types/index.PHP" class="nav-link">Quản Lý Kiểu loại</a></li>
      <li><a href="../Payment/index.PHP" class="nav-link">Quản Lý Thanh toán</a></li>
      <li><a href="../Admins/index.PHP" class="nav-link">Quản lý Quản Trị viên</a></li>
      <li><a href="../Customers/index.PHP" class="nav-link">Quản lý Khách hàng</a></li>
      <li><a href="../Products/index.PHP" class="nav-link">Quản lý sản phẩm</a></li>
      <li><a href="../image/index.PHP" class="nav-link">Quản lý hình ảnh</a></li>
    </ul>
    <hr>
    <div class="dropdown">
      <li><a class="dropdown-item" href="../logout.php">Đăng xuất</a></li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div id="content" class="p-4">
    <!-- Toggle Button -->
    <button class="btn btn-outline-secondary mb-3" id="toggleBtn">☰</button>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-cVKIPhGWiC2AlnUOUlV1aG1GkS5VdYOK9KR4VAb9Y+Y5HZS3AuV0y4n2eL4i6tbt"
    crossorigin="anonymous"></script>
  <script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('full-width');
    });
  </script>

</body>

</html>