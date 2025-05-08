<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm quản trị viên</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php
    include_once "../Layout/header.PHP";
    ?>
    <form method="post" action="store.php" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name: </label><input type="text" name="name" id="name" class="form-control"><br>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email: </label><input type="text" name="email" id="email" class="form-control"><br>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password: </label><input type="password" name="password" id="password" class="form-control"><br>
        </div>
        <div class="mb-3">
            <label for="role">Role: </label>
            <select name="role" id="role">
                <option value="admin" <?php if ($admin['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select><br>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone: </label><input type="text" name="phone" id="phone" class="form-control"><br>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address: </label><input type="text" name="address" id="address" class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</body>
<footer>
    <?php
    include_once "../Layout/footer.php";
    ?>
</footer>

</html>