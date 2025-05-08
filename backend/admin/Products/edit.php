<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập sản phẩm</title>
</head>
<body>
    <?php
        include_once "../layout/header.php";
    ?>
    <?php
        //Lấy id
        $id = $_GET['id'];
        //Kết nối db
        include_once "../../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM products WHERE id = '$id'";
        //Chạy sql
        $products = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../../Connection/close.php";
        //Hiển thị dữ liệu lấy được
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($products as $products) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $products['id']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $products['name']; ?>"><br>
            <label for="quantity">Quantity: </label><input type="text" name="quantity" id="quantity" value="<?php echo $products['quantity']; ?>"><br>
            <label for="price">Price: </label><input type="text" name="price" id="price" value="<?php echo $products['price']; ?>"><br>
            <label for="material">Material: </label><input type="text" name="material" id="material" value="<?php echo $products['material']; ?>"><br>
            <label for="color">Color: </label><input type="text" name="color" id="color" value="<?php echo $products['color']; ?>"><br>
            <label for="number_of_flower">Number of flower: </label><input type="text" name="number_of_flower" id="number_of_flower" value="<?php echo $products['number_of_flower']; ?>"><br>
            <label for="description">Description: </label><input type="text" name="description" id="description" value="<?php echo $products['description']; ?>"><br>
            <label for="brand_id">Brand: </label><input type="text" name="brand_id" id="brand_id" readonly value="<?php echo $products['brand_id']; ?>"><br>
            <label for="type_id">Type: </label><input type="text" name="type_id" id="type_id" readonly value="<?php echo $products['type_id']; ?>"><br>
        <?php
            }
        ?>
        <button>Cập nhập</button>
    </form>
    <footer>
    <?php
        include_once "../Layout/footer.php";
    ?>
    </footer>
</body>
</html>