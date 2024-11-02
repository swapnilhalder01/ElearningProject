<?php
// Connect to the database
include 'db_connection.php'; // Ensure this file contains your database connection

// Fetch courses from the database
$sql = "SELECT * FROM courses"; // Adjust this query based on your table structure
$result = mysqli_query($conn, $sql);

// Check if there are courses
if (mysqli_num_rows($result) > 0) {
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $courses = [];
}

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ensure this path is correct -->
    <style>body {
    font-family: 'Arial', sans-serif;
    background-color: #1e1e1e;
    color: #eaeaea;
    margin: 0;
    padding: 0;
}

.navbar {
    background-color: #4CAF50; /* Green color for the navbar */
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
    color: #4CAF50; /* Green color for the heading */
    margin-bottom: 20px;
    font-size: 32px;
}

.course-item {
    margin-bottom: 20px;
    background-color: #333; /* Dark background for course items */
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.course-item h2 {
    font-size: 24px;
    margin: 0 0 10px;
    color: #eaeaea; /* Light text color for course titles */
}

.course-item p {
    font-size: 18px;
    margin: 0 0 15px;
    color: #a0a0a0; /* Light gray for course descriptions */
}

.course-item .btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #4CAF50; /* Green color similar to navbar */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.course-item .btn:hover {
    background-color: #45a049; /* Slightly darker green on hover */
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
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="index.php">E-Learning</a>
                </div>
                <ul class="nav-links">
                    <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                  
                    <li><a href="admin_logout.php" class="logout-btn">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Available Courses</h1>
            <div class="course-list">
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <div class="course-item">
                            <h2><?php echo htmlspecialchars($course['title']); ?></h2>
                            <p><?php echo htmlspecialchars($course['description']); ?></p>
                            <a href="course_detail_admin.php?id=<?php echo $course['id']; ?>" class="btn">View Details</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No courses available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
        <p>&copy; 2024 E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
