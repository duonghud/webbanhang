<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập khách hàng</title>
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
        $sql = "SELECT * FROM customers WHERE id = '$id'";
        //Chạy sql
        $customers = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../../Connection/close.php";
        //Hiển thị dữ liệu lấy được
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($customers as $customers) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $customers['id']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $customers['name']; ?>"><br>
            <label for="email">Email: </label><input type="text" name="email" id="email" value="<?php echo $customers['email']; ?>"><br>
            <label for="password">Password: </label><input type="password" name="password" id="password" value="<?php echo $customers['password']; ?>"><br>
            <label for="phone">Phone: </label><input type="text" name="phone" id="phone" value="<?php echo $customers['phone']; ?>"><br>
            <label for="address">Address: </label><input type="text" name="address" id="address" value="<?php echo $customers['address']; ?>"><br>
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