<?php
// Kết nối database
include_once "../../Connection/open.php";

// Lấy ID sản phẩm từ URL và ép kiểu an toàn
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Kiểm tra và lấy sản phẩm
$product = null;
if ($id > 0) {
    $stmt = $connection->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

// Đóng kết nối
include_once "../../Connection/close.php";

// Xử lý đường dẫn ảnh
$imagePath = "../../uploads/" . htmlspecialchars($product['image'] ?? '');
if (!file_exists($imagePath) || empty($product['image'])) {
    $imagePath = "../../uploads/default.jpg"; // fallback ảnh mặc định
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header>
    <?php
    include_once "../layout/header.php";
    ?>
</header>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto py-10 px-6">
        <?php if ($product): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row gap-6">
                <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full md:w-1/2 h-64 object-cover rounded">
                <div class="flex-1">
                    <h2 class="text-3xl font-bold mb-4"><?= htmlspecialchars($product['name']) ?></h2>
                    <p class="text-gray-600 mb-2"><strong>Số lượng:</strong> <?= (int)$product['quantity'] ?></p>
                    <p class="text-gray-600 mb-2"><strong>Giá:</strong> <span class="text-red-500"><?= number_format($product['price'], 0, ',', '.') ?>₫</span></p>
                    <p class="text-gray-600 mb-2"><strong>Chất liệu:</strong> <?= htmlspecialchars($product['material']) ?></p>
                    <p class="text-gray-600 mb-2"><strong>Màu sắc:</strong> <?= htmlspecialchars($product['color']) ?></p>
                    <p class="text-gray-600 mb-2"><strong>Số lượng hoa:</strong> <?= (int)$product['number_of_flower'] ?></p>
                    <p class="text-gray-600 mb-4"><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($product['description'])) ?></p>
                    <a href="index.php" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800">← Quay lại danh sách</a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-red-500 text-center text-xl">❌ Không tìm thấy sản phẩm.</p>
        <?php endif; ?>
    </div>
</body>
<footer class="mt-5">
    <?php
    include_once "../layout/footer.php";
    ?>
</footer>

</html>