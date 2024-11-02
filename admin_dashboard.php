<?php
session_start();
// Redirect to login if not logged in as admin
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to your CSS file -->
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

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #2c2c2c;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 32px;
        }

        p {
            color: #a0a0a0;
            font-size: 18px;
            margin-bottom: 40px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e1e;
            color: #a0a0a0;
            font-size: 14px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo"><a href="admin_dashboard.php">Admin Dashboard</a></div>
            <ul class="nav-links">
            <li><a href="courses_admin.php">Courses</a></li>
                <li><a href="add_course.php">Add Course</a></li>
                <li><a href="manage_courses.php">Manage Courses</a></li>
                <li><a href="admin_logout.php" class="logout-btn">Logout</a></li> <!-- Logout Button -->
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Welcome, Admin</h1>
        <p>Here is your admin dashboard. You can manage courses and view platform statistics.</p>
        <!-- Admin-specific content can be added here -->
    </div>

    <footer>
        <p>&copy; 2024 E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
