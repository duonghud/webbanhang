<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm hình ảnh</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php
    include_once "../Layout/header.PHP";
    ?>
    <form method="post" action="store.php">
        <label for="name">Name: </label><input type="text" name="name" id="name"><br>
        <label for="product_id">Product id: </label><input type="text" name="product_id" id="product_id"><br>
        <label for="image_url">Image URL: </label><input type="text" name="image_url" id="image_url"><br>
        <button type="submit">Thêm</button>
    </form>

</body>
<footer>
    <?php
    include_once "../Layout/footer.php";
    ?>
</footer>

</html>