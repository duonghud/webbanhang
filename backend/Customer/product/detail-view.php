<?php
// Kết nối database
include_once "../../Connection/open.php";

// Lấy ID sản phẩm từ URL
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Truy vấn thông tin chi tiết sản phẩm
$sql = "SELECT products.*, brands.name AS brand_name, types.name AS type_name
        FROM products
        LEFT JOIN brands ON products.brand_id = brands.id
        LEFT JOIN types ON products.type_id = types.id
        WHERE products.id = $product_id";
$result = mysqli_query($connection, $sql);
$product = mysqli_fetch_assoc($result);

// Đóng kết nối
include_once "../../Connection/close.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $product['name'] ?> - Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../fontend/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include_once "../layout/header.php"; ?>
    </header>

    <!-- Chi tiết sản phẩm -->
    <main class="container my-5">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6 text-center">
                <img src="../../admin/images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded shadow">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h1 class="text-3xl font-bold text-pink-700 mb-4"><?= $product['name'] ?></h1>
                <p class="text-xl text-gray-800 font-semibold mb-2">Giá:
                    <span class="text-pink-600"><?= number_format($product['price'], 0, ',', '.') ?>₫</span>
                </p>
                <p class="mb-2"><strong>Chất liệu:</strong> <?= $product['material'] ?></p>
                <p class="mb-2"><strong>Màu sắc:</strong> <?= $product['color'] ?></p>
                <p class="mb-2"><strong>Số lượng hoa:</strong> <?= $product['number_of_flower'] ?></p>
                <p class="mb-2"><strong>Số lượng hàng:</strong> <?= $product['quantity'] ?></p>
                <p class="mb-2"><strong>Thương hiệu:</strong> <?= $product['brand_name'] ?></p>
                <p class="mb-2"><strong>Kiểu loại:</strong> <?= $product['type_name'] ?></p>
                <p class="mt-3"><strong>Mô tả:</strong><br><?= nl2br($product['description']) ?></p>

                <!-- Nút mua -->
                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="../Cart/addToCart.php?id=<?= $product['id'] ?>" class="btn btn-lg bg-pink-500 text-dark hover:bg-pink-600">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                    </a>
                    <a href="list.php" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-arrow-left-circle"></i> Tiếp tục mua hàng
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-5">
        <?php include_once "../layout/footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>