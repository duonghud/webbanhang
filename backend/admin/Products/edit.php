<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập sản phẩm</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once "../layout/header.php"; ?>

    <?php
    // Mở kết nối
    include_once "../../Connection/open.php";
    // Viết sql lấy dữ liệu ở bảng brands
    $sqlBrand = "SELECT * FROM brands";
    $brands = mysqli_query($connection, $sqlBrand);
    // Viết sql lấy dữ liệu ở bảng types
    $sqlType = "SELECT * FROM types";
    $types = mysqli_query($connection, $sqlType);
    // Lấy id của bản ghi cần sửa
    $id = $_GET["id"];
    $sqlProduct = "SELECT * FROM products WHERE id = '$id'";
    $products = mysqli_query($connection, $sqlProduct);
    // Đóng kết nối
    include_once "../../Connection/close.php";
?>


    <div class="container my-5">
        <h2 class="mb-4">Cập nhật sản phẩm</h2>
        <form method="post" action="update.php" enctype="multipart/form-data" class="row g-3">
            <?php foreach ($products as $product) { ?>
                <div class="col-md-6">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" readonly value="<?= $product['id']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="<?= $product['name']; ?>" class="form-control">
                </div>
                
                <label for="image" class="form-label">Image: <img src="../image/<?php echo $product["image"]?>" class="form-control"> </label>
                <input type="file" name="image" id="image"><br>

                <div class="col-md-6">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" name="quantity" id="quantity" value="<?= $product['quantity']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" value="<?= $product['price']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="material" class="form-label">Material</label>
                    <input type="text" name="material" id="material" value="<?= $product['material']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" value="<?= $product['color']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="number_of_flower" class="form-label">Number of flower</label>
                    <input type="text" name="number_of_flower" id="number_of_flower" value="<?= $product['number_of_flower']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" id="description" value="<?= $product['description']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="brand_id" class="form-label">Brand</label>
                    <input type="text" name="brand_id" id="brand_id" readonly value="<?= $product['brand_id']; ?>" class="form-control">
                </div>
                <select id="brand_id" name="brand_id">
                <?php
                foreach ($brands as $brand) {
                    ?>
                    <option value="<?php echo $brand["id"]; ?>"
                        <?php
                            if($brand["id"] == $product["brand_id"]){
                        ?>
                            selected="selected"
                        <?php
                            }
                        ?>
                    >
                        <?php echo $brand["name"]; ?>
                    </option>
                    <?php
                }
                ?>
            </select><br>
                <div class="col-md-6">
                    <label for="type_id" class="form-label">Type</label>
                    <input type="text" name="type_id" id="type_id" readonly value="<?= $product['type_id']; ?>" class="form-control">
                </div>
                <select id="type_id" name="type_id">
                <?php
                foreach ($types as $type) {
                    ?>
                    <option value="<?php echo $type["id"]; ?>"
                        <?php
                            if($type["id"] == $product["type_id"]){
                        ?>
                            selected="selected"
                        <?php
                            }
                        ?>
                    >
                        <?php echo $brand["name"]; ?>
                    </option>
                    <?php
                }
                ?>
            </select><br>

            <?php 
                } 
            ?>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
