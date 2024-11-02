<?php
session_start();

// Database connection
include 'db_connection.php';

// Check if course ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid course ID.");
}

$course_id = intval($_GET['id']);

// Fetch course details
$query = "SELECT * FROM courses WHERE id='$course_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$course = mysqli_fetch_assoc($result);

// Handle case where course data is not found
if (!$course) {
    die("Course not found.");
}

// Fetch course lessons
$query_lessons = "SELECT * FROM lessons WHERE course_id='$course_id'";
$result_lessons = mysqli_query($conn, $query_lessons);

if (!$result_lessons) {
    die("Query failed: " . mysqli_error($conn));
}

// Function to extract YouTube video ID from URL
function getYouTubeVideoId($url) {
    // Check for valid YouTube URL formats
    $patterns = [
        '/youtu\.be\/([a-zA-Z0-9_-]+)/', // Short URL format
        '/youtube\.com\/(?:embed|v|watch\?v=)([a-zA-Z0-9_-]+)/' // Long URL formats
    ];
    
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1]; // Return the video ID
        }
    }
    
    return false; // Invalid URL format
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - Course Details</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1e1e1e; /* Dark background */
            color: #eaeaea; /* Light text color */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4CAF50; /* Green navbar */
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

        .course-header {
            background-color: #333; /* Darker background for header */
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .course-header h1 {
            font-size: 36px;
            color: #4CAF50; /* Green heading */
            margin-bottom: 20px;
        }

        .course-header p {
            font-size: 18px;
            line-height: 1.6;
            color: #eaeaea;
        }

        .course-content {
            background-color: #2c2c2c;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            margin: 20px 0;
            text-align: center;
        }

        .course-content h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .course-content iframe {
            max-width: 100%;
           
            
            border: none;
            width: 85%; /* Increase the width to make the video larger */
            height: 500px; /* Set a fixed height for larger video display */
        }

        .course-content .download-pdf {
            display: inline-block;
            margin-top: 20px; /* Add more space between the video and PDF button */
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .course-content .download-pdf:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #1e1e1e;
            color: #a0a0a0;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
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
                <li><a href="courses_admin.php">Courses</a></li>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                <li><a href="admin_logout.php" class="logout-btn">Logout</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['role'] == 'admin') {
                        echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                    } else {
                        echo '<li><a href="student_dashboard.php">My Courses</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </nav>

    <!-- Course Detail Header -->
    <header class="course-header">
        <div class="container">
            <h1><?php echo htmlspecialchars($course['title']); ?></h1>
            <p><?php echo htmlspecialchars($course['description']); ?></p>
        </div>
    </header>

    <!-- Course YouTube Video and PDF -->
    <section class="course-content">
        <div class="container">
            <?php
            $youtube_url = htmlspecialchars($course['youtube_link']);
            $video_id = getYouTubeVideoId($youtube_url);

            if ($video_id) {
                echo '<h2>Watch the Course Video</h2>';
                echo '<iframe src="https://www.youtube.com/embed/' . $video_id . '" allowfullscreen></iframe>';
            } else {
                echo '<p>No video available or invalid YouTube URL format.</p>';
            }

            if (!empty($course['pdf_file'])) {
                echo '<a href="uploads/' . htmlspecialchars($course['pdf_file']) . '" class="download-pdf" download>Download Course PDF</a>';
            } else {
                echo '<p>No PDF file available for this course.</p>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 E-Learning Platform. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
