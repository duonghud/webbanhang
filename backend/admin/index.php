<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow:0 6px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button,
        .link-button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
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

        .home-button {
            background-color: #6b7280;
            color: white;
        }

        .home-button:hover {
            background-color: #4b5563;
        }
    </style>
</head>

<body style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg'); background-size: cover; background-position: center;">
    <?php
    session_start();
    if (isset($_SESSION['admin_email'])) {
        header('Location:index.php');
        exit;
    }
    ?>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post" action="login-process.php">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <div class="button-group">
                <button type="submit">Login</button>
                <button type="reset" class="reset-button">Reset</button>
            </div>
        </form>
    </div>
</body>


</html>