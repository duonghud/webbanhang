<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập hình ảnh</title>
    <link rel="stylesheet" href="../../../style.css">
</head>
<body>
    <?php
        include_once "../Layout/header.PHP";
    ?>
    <?php
        //Lấy id
        $id = $_GET['id'];
        //Kết nối db
        include_once "../../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM images WHERE id = '$id'";
        //Chạy sql
        $images = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../../Connection/close.php";
        //Hiển thị dữ liệu lấy được
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($images as $images) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $images['id']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $images['name']; ?>"><br>
            <label for="product_id">Product id: </label><input type="text" name="product_id" id="product_id" value="<?php echo $images['product_id']; ?>"><br>
        <?php
            }
        ?>
        <button>Cập nhập</button>
    </form>
</body>
<footer>
    <?php
        include_once "../Layout/footer.php";
    ?>
</footer>
</html>