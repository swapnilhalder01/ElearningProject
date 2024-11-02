<?php
session_start();
include 'db_connection.php'; // Include database connection

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple login logic
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ensure this path is correct -->

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1e1e1e;
            color: #eaeaea;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4CAF50;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo a {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .navbar .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar .nav-links li {
            margin-left: 20px;
        }

        .navbar .nav-links li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-links li a:hover {
            color: #c8e6c9;
        }

        .navbar .logout-btn {
            background-color: #f44336;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar .logout-btn:hover {
            background-color: #e57373;
        }

        /* Login Container Styles */
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Heading Styles */
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-size: 16px;
            color: #fff;
        }

        input[type="text"],
        input[type="password"] {
            padding: 4px;
            font-size: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 100%;
            background-color: #222;
            color: #fff;
        }

        button {
            padding: 12px;
            background-color: #2ada13;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e8a1e;
        }

        /* Error Message Styles */
        .error-message {
            color: #f00;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php">E-Learning</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                
                
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Admin Login</h1>

        <?php if ($error): ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="admin_login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
