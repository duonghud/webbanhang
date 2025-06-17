<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
      background-color: #f1f5f9;
    }

    /* Sidebar (overlay style) */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100vh;
      background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
      color: #f8f9fc;
      z-index: 999;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
      padding: 20px;
    }

    #sidebar.active {
      transform: translateX(0);
    }

    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      z-index: 998;
      display: none;
    }

    #overlay.active {
      display: block;
    }

    .nav-link {
      color: #d1d5db;
      padding: 10px 15px;
      border-radius: 8px;
      transition: background-color 0.2s ease, color 0.2s ease;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: rgba(255, 255, 255, 0.15);
      color: #ffffff;
    }

    .sidebar-header {
      font-size: 1.25rem;
      font-weight: 600;
      color: #ffffff;
      margin-bottom: 20px;
    }

    .dropdown-item {
      color: #d1d5db;
    }

    .dropdown-item:hover {
      color: #fff;
      background-color: rgb(20, 96, 227);
    }
  </style>
</head>

<body>

  <!-- Toggle button -->
  <button id="toggleSidebar" class="btn btn-primary m-3">
    <i class="bi bi-list"></i>
  </button>

  <!-- Overlay -->
  <div id="overlay" onclick="closeSidebar()"></div>

  <!-- Sidebar -->
  <div id="sidebar" class="d-flex flex-column position-fixed">
    <div class="sidebar-header">Quản trị viên</div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li><a href="../Brands/index.php" class="nav-link"><i class="bi bi-tags"></i> Thương hiệu</a></li>
      <li><a href="../Types/index.php" class="nav-link"><i class="bi bi-layout-text-window"></i> Kiểu loại</a></li>
      <li><a href="../Payment/index.php" class="nav-link"><i class="bi bi-credit-card"></i> Thanh toán</a></li>
      <li><a href="../Admins/index.php" class="nav-link"><i class="bi bi-shield-lock"></i> Quản trị viên</a></li>
      <li><a href="../Customers/index.php" class="nav-link"><i class="bi bi-people"></i> Khách hàng</a></li>
      <li><a href="../Products/index.php" class="nav-link"><i class="bi bi-box-seam"></i> Sản phẩm</a></li>
      <li><a href="../CartAdmin/index.php" class="nav-link"><i class="bi bi-bag"></i> Giỏ hàng</a></li>
      <li><a href="../Order/index.php" class="nav-link"><i class="bi bi-tags"></i> Đơn hàng</a></li>
    </ul>
    <hr>
    <a class="dropdown-item" href="../logout.php"><i class="bi bi-box-arrow-left"></i> Đăng xuất</a>
  </div>

  <!-- Main Content -->
  <div class="container mt-5">
  </div>

  <!-- Script -->
  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('toggleSidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.add('active');
      overlay.classList.add('active');
    });

    function closeSidebar() {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    }
  </script>

</body>

</html>
