<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ - Shop Bloom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../../fontend/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <!-- Header -->
  <header>
    <?php include_once "../layout/header.php"; ?>
  </header>

  <!-- Giới thiệu -->
  <div>
    <?php include_once "../layout/giothieu.php"; ?>
  </div>

  <!-- Danh sách sản phẩm nổi bật -->
  <main class="container my-5" data-aos="zoom-in">
    <?php
    include_once "../../Connection/open.php";

    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql);

    include_once "../../Connection/close.php";
    ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <h2 class="text-4xl font-extrabold text-left text-pink-700 mb-12">Sản Phẩm Bán Chạy</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
          <div
            class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 border-2 border-dashed"
            style="border-color: #FCEFF8;" data-aos="fade-up">
            <a href="detail-view.php?id=<?= $product['id'] ?>" class="block relative">
              <img
                src="../../admin/images/<?= !empty($product['image']) ? $product['image'] : 'default-image.jpg' ?>"
                alt="<?= $product['name'] ?>"
                class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-300 ease-in-out">
                <div class="absolute top-2 left-2 bg-pink-500 text-white text-xs px-3 py-1 rounded-full shadow">Bán chạy</div>
            </a>
            <div class="p-5 text-center">
              <h3 class="text-lg font-semibold text-gray-800 mb-1 overflow-hidden whitespace-nowrap text-ellipsis" style="max-width: 120%;">
                <?= $product['name'] ?>
              </h3>
              <p class="text-pink-600 font-bold text-xl mb-4">
                <?= number_format($product['price'], 0, ',', '.') ?>₫
              </p>
              <a href="detail-view.php?id=<?= $product['id'] ?>"
                class="inline-block bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-full text-sm font-semibold transition">
                Mua ngay
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </main>
  </main>

  <!-- Footer -->
  <footer class="mt-5">
    <?php include_once "../layout/footer.php"; ?>
  </footer>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="../../../fontend/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>