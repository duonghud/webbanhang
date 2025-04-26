<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a brand</title>
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <form method="post" action="store.php">
        <label for="name">ID: </label><input type="text" name="id" id="id"><br>
        <label for="country">Name: </label><input type="text" name="name" id="name"><br>
        <button>Add</button>
    </form>
</body>
</html>