<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>

    <?php
    include_once "../Layout/header.php";
    ?>
    <?php
    // Mở kết nối
    include_once "../../Connection/open.php";
    // Viết và thực thi truy vấn
    $sql = "SELECT products.*, brands.name AS brand_name, types.name AS type_name 
        FROM products 
        INNER JOIN brands ON brands.id = products.brand_id 
        INNER JOIN types ON types.id = products.type_id";
    $products = mysqli_query($connection, $sql);
    // Đóng kết nối
    include_once "../../Connection/close.php";
    ?>

    <div class="container w-40 my-1">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh Sách Sản Phẩm</h2>
            <a href="create.php" class="btn btn-success">Thêm Sản Phẩm</a>
        </div>
    </div>
    <table class="table table-bordered table-light align-center">
        <tr>
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Chất liệu</th>
            <th>Màu sắc</th>
            <th>Số lượng hoa</th>
            <th>Mô tả</th>
            <th>Thương hiệu</th>
            <th>Kiểu loại</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        foreach ($products as $product) {
        ?>
            <tr>
                <td>
                    <?php echo $product['id']; ?>
                </td>
                <td>
                    <?php echo $product['name']; ?>
                </td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="path_to_image/<?= $product['image']; ?>" alt="product image">
                    <?php else: ?>
                        <p>Không có hình ảnh sản phẩm</p>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $product['quantity']; ?>
                </td>
                <td>
                    <?php echo $product['price']; ?>
                </td>
                <td>
                    <?php echo $product['material']; ?>
                </td>
                <td>
                    <?php echo $product['color']; ?>
                </td>
                <td>
                    <?php echo $product['number_of_flower']; ?>
                </td>
                <td>
                    <?php echo $product['description']; ?>
                </td>
                <td>
                    <?php echo $product['brand_name']; ?>
                </td>
                <td>
                    <?php echo $product['type_name']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>