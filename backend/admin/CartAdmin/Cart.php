<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form method="post" action="updateCartDB.php">
        <table border="1px" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
            <?php
            include_once "../../Connection/open.php";
            //Lấy id của tài khoản đang đăng nhập
            $customer_id = $_SESSION['customer_id'];
            //sql
            $sql = "SELECT cart_details.product_id, cart_details.quantity, products.name, products.image, products.price 
                    FROM carts
                    INNER JOIN cart_details ON carts.id = cart_details.cart_id
                    INNER JOIN products ON products.id = cart_idetails.product_id
                    WHERE carts.customer_id = '$customer_id'";
            //Chạy sql
            $carts = mysqli_query($connection, $sql);
            //Hiển thị
            foreach ($carts as $cart) {
            ?>
                <tr>
                    <td>
                        <?php echo $cart['product_id']; ?>
                    </td>
                    <td>
                        <?php echo $cart['name']; ?>
                    </td>
                    <td>
                        <img src="../image/<?php echo $cart['image']; ?>" width="100px" height="100px" alt="Image">
                    </td>
                    <td>
                        <a href="updateProductDB.php?id=<?php echo $cart['product_id'] ?>&&operation=minus&&quantity=<?php echo $cart['quantity']; ?>"> - </a>
                        <input type="text" name="cart[<?php echo $cart['product_id'] ?>]" value="<?php echo $cart['quantity']; ?>">
                        <a href="updateProductDB.php?id=<?php echo $cart['product_id'] ?>&&operation=plus&&quantity=<?php echo $cart['quantity']; ?>"> + </a>
                    </td>
                    <td>
                        <?php echo $cart['price']; ?>
                    </td>
                    <td>
                        <a href="deleteProductDB.php?id=<?php echo $cart['product_id'] ?>">Delete product</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="4">
                    <button>Update Cart</button>
                </td>
                <td colspan="3">
                    <a href="deleteCartDB.php">Delete Cart</a>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <a href="checkOutDB.php">Check out</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
</body>

</html>