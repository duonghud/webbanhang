<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            background-image: url('https://ocafe.net/wp-content/uploads/2024/10/hinh-nen-may-tinh-dep-4k-9.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 30px 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            flex: 1;
        }

        button[type="submit"] {
            background-color: #4f46e5;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }

        .reset-button {
            background-color: #6b7280;
            color: white;
        }

        .reset-button:hover {
            background-color: #4b5563;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #c7d2fe;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    
        
    <div class="register-container">
        <h2>Đăng Ký</h2>
        <form method="post" action="register-process.php">
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>

            <label for="phone">Số điện thoại:</label>
            <input type="text" name="phone" id="phone" required>

            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" id="address" required>

            <div class="button-group">
                <button type="submit">Đăng ký</button>
                <button type="reset" class="reset-button">Reset</button>
            </div>

            <p>
                Đã có tài khoản?
                <a href="index.php">Đăng nhập</a>
            </p>
        </form>
    </div>
</body>

</html>