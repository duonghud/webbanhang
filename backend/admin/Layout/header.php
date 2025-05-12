<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

echo '' . $page . '';
?>

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

    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100vh;
      background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
      color: #f8f9fc;
      z-index: 999;
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

    .sidebar hr {
      border-top: 1px solid #4b5563;
    }

    .toggle-btn {
      background-color: #e5e7eb;
      color: #1f2937;
      font-weight: bold;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
    }

    .toggle-btn:hover {
      background-color: #d1d5db;
    }

    .dropdown-item {
      color: #d1d5db;
    }

    .dropdown-item:hover {
      color: #fff;
      background-color: #374151;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div id="sidebar" class="d-flex flex-column position-fixed p-3">
    <div class="sidebar-header">Quản trị viên</div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li><a href="../Brands/index.php" class="nav-link"><i class="bi bi-tags"></i> Thương hiệu</a></li>
      <li><a href="../Types/index.php" class="nav-link"><i class="bi bi-layout-text-window"></i> Kiểu loại</a></li>
      <li><a href="../Payment/index.php" class="nav-link"><i class="bi bi-credit-card"></i> Thanh toán</a></li>
      <li><a href="../Admins/index.php" class="nav-link"><i class="bi bi-shield-lock"></i> Quản trị viên</a></li>
      <li><a href="../Customers/index.php" class="nav-link"><i class="bi bi-people"></i> Khách hàng</a></li>
      <li><a href="../Products/index.php" class="nav-link"><i class="bi bi-box-seam"></i> Sản phẩm</a></li>
      <li><a href="../image/index.php" class="nav-link"><i class="bi bi-image"></i> Hình ảnh</a></li>

    </ul>
    <hr>
    <a class="dropdown-item" href="../logout.php"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
  </div>

  <!-- Main Content -->
  <div id="content" class="p-4">
  </div>

</body>

</html>