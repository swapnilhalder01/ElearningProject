<?php
// Include database connection
include 'db_connection.php'; // Adjust path if needed

// Initialize variables
$student_id = 1; // Replace with dynamic session or user-specific ID

// Fetch enrolled courses for the student
$sql = "SELECT courses.id, courses.title, courses.description
        FROM enrollments
        JOIN courses ON enrollments.course_id = courses.id
        WHERE enrollments.student_id = ?";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $student_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    die("Failed to prepare SQL statement: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo"><a href="index.php">E-Learning</a></div>
                <ul class="nav-links">
                    <li><a href="courses.php">My Courses</a></li>
                    <li><a href="student_logout.php" class="logout-btn">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Student Dashboard</h1>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <ul class="course-list">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <li>
                            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                            <a href="course_detail.php?course_id=<?php echo $row['id']; ?>">View Details</a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>Here You Can Learn Everything You Want.</p>
            <?php endif; ?>
            <?php
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
