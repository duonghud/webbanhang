<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Shop Hoa Uy Tín</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <?php include_once "../layout/header.php"; ?>
    </header>

    <!-- Danh sách sản phẩm -->
    <?php
    include_once "../../Connection/open.php";

    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql);
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[$row['id']] = $row;
    }

    include_once "../../Connection/close.php";
    ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-[#fff0f5]">
        <h2 class="text-4xl font-extrabold text-left text-pink-700 mb-12">Sản Phẩm Bán Chạy</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            <?php foreach ($products as $id => $product): ?>
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 border-2 border-dashed" style="border-color: #ec4899;">
                    <a href="detail-view.php?id=<?= $id ?>" class="block relative">
                        <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                            class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-300 ease-in-out">
                        <div class="absolute top-2 left-2 bg-pink-500 text-white text-xs px-3 py-1 rounded-full shadow">Bán chạy</div>
                    </a>
                    <div class="p-5 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="text-pink-600 font-bold text-xl mb-4"><?= number_format($product['price'], 0, ',', '.') ?>₫</p>
                        <a href="detail-view.php?id=<?= $id ?>"
                            class="inline-block bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-full text-sm font-semibold transition">Mua ngay</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 mt-12 text-center text-sm text-gray-500">
        <?php include_once "../layout/footer.php"; ?>
    </footer>

</body>

</html>