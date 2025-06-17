<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../Layout/header.php"); ?>


    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="mb-0">
            <a href="../product/list.php" class="text-dark">Trang chủ</a>
            <span class="mx-1 text-muted">></span>
            <a href="index.php" class="text-dark">Giỏ Hàng</a>
        </p>
    </div>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Giỏ hàng</h2>
        <form method="post" action="updateCart.php">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        include_once "../../Connection/open.php";
                        if (isset($_SESSION['cart'])) {
                            $carts = $_SESSION['cart'];
                            foreach ($carts as $id => $quantity) {
                                $sql = "SELECT * FROM products WHERE id = '$id'";
                                $products = mysqli_query($connection, $sql);
                                foreach ($products as $product) {
                        ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><img src="../../Admin/images/<?php echo $product['image']; ?>" width="100" height="100" class="img-thumbnail"></td>
                                        <td><?php echo number_format($product['price'], 0, ',', '.'); ?> ₫</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <a href="updateProduct.php?id=<?php echo $id ?>&operation=minus" class="btn btn-sm btn-outline-secondary">-</a>
                                                <input type="text" name="quantity[<?php echo $id ?>]" value="<?php echo $quantity; ?>" class="form-control text-center" style="width: 60px;">
                                                <a href="updateProduct.php?id=<?php echo $id ?>&operation=plus" class="btn btn-sm btn-outline-secondary">+</a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $itemTotal = $product['price'] * $quantity;
                                            echo number_format($itemTotal, 0, ',', '.'); ?> ₫
                                        </td>
                                        <td>
                                            <a href="deleteProduct.php?id=<?php echo $id ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                            <?php
                                    $total += $itemTotal;
                                }
                            }
                            ?>
                            <tr class="fw-bold">
                                <td colspan="5" class="text-end">Total:</td>
                                <td colspan="2"><?php echo number_format($total, 0, ',', '.'); ?> ₫</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="submit" class="btn btn-primary">Update Cart</button>
                                </td>
                                <td colspan="3" class="text-end">
                                    <a href="../Oder/checkOut.php" class="btn btn-success">Đặt hàng ngay</a>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center text-danger">Your cart is empty.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <footer>
        <?php include_once "../layout/footer.php"; ?>
    </footer>
</body>

</html>