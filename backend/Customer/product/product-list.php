<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Shop Uy Tín</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <?php
        include_once "../layout/header.php";
        ?>
    </header>

    <!-- Danh sách sản phẩm -->
    <?php
    include_once "../../Connection/open.php";

    // Lấy toàn bộ sản phẩm
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql);

    // Chuyển dữ liệu thành mảng
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[$row['id']] = $row;
    }

    include_once "../../Connection/close.php";
    ?>
    <main class="max-w-7xl mx-auto px-6 py-12 bg-[#fef2f8]">
        <h2 class="text-3xl font-bold text-center mb-8">Sản Phẩm Bán Chạy</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($products as $id => $product): ?>
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <a href="detail-view.php?id=<?= $id ?>">
                        <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-lg mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="text-red-500 font-bold mb-2"><?= number_format($product['price'], 0, ',', '.') ?>₫</p>
                        <a href="detail-view.php?id=<?= $id ?>" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mua ngay</a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-transparent-800 text-white py-6 mt-12 text-center">
        <?php
        include_once "../layout/footer.php";
        ?>
    </footer>

</body>

</html>