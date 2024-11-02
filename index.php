<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            background-color: #333;
            padding: 10px 0;
            color: #fff;
            
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo a {
            color: #fff;
             text-decoration: none;
            font-size: 24px;
            font-weight: bold;
    
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            transition: background 0.3s, color 0.3s;
        }

        .nav-links a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Hero Section */
        .hero {
           
            padding: 60px 0;
            text-align: center;
            position: relative;
            color: #333;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 206, 27, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .hero .btn {
            background: #ff5722;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }

        .hero .btn:hover {
            background: #e64a19;
            color: #fff;
        }

        /* Features Section */
        .features {
            padding: 40px 0;
            text-align: center;
        }

        .features h2 {
            margin-bottom: 40px;
        }

        .feature-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .feature-item {
            width: 30%;
            margin-bottom: 20px;
            margin-right: 20px;
        }

        .feature-item img {
            max-width: 380px;
            margin-bottom: 20px;
            margin-right: 20px;
           
        }

        .feature-item h3 {
            margin-bottom: 10px;
        }

        .feature-item p {
            font-size: 16px;
            color: #666;
        }

        /* Call to Action Section */
        .cta {
            background: rgba(0, 206, 27, 0.5);
            color: #333;
            padding: 40px 0;
            text-align: center;
        }

        .cta h2 {
            margin-bottom: 20px;
        }

        .cta p {
            margin-bottom: 20px;
        }

        .cta .btn {
            background: #ff5722;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                text-align: center;
            }

            .nav-links li {
                margin-left: 0;
                margin-bottom: 10px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .feature-item {
                width: 100%;
            }

            .feature-list {
                flex-direction: column;
            }

            .cta h2 {
                font-size: 28px;
            }

            .cta p {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero .btn {
                padding: 8px 16px;
            }

            .cta h2 {
                font-size: 24px;
            }

            .cta p {
                font-size: 14px;
            }

            .cta .btn {
                padding: 8px 16px;
            }
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
                <li><a href="courses_viewer.php">Available Courses</a></li>
                
                <li><a href="login.php">Student Login</a></li>
                <li><a href="register.php">Student Register</a></li>
                <li><a href="admin_login.php">Admin Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Welcome to the NEUB E-Learning Platform</h1>
                <p>Your gateway to knowledge and online education. Explore courses, learn at your pace, and achieve your goals.</p>
                <a href="courses.php" class="btn">Browse Courses</a>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Platform Features</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <img src="images/feature4.jpg" alt="Courses">
                    <h3>Wide Range of Courses</h3>
                    <p>Explore various topics and fields with our extensive course catalog.</p>
                </div>
                <div class="feature-item">
                    <img src="images/feature2.jpg" alt="Learn Anytime">
                    <h3>Learn Anytime, Anywhere</h3>
                    <p>Access your courses on any device, at your convenience.</p>
                </div>
                <div class="feature-item">
                    <img src="images/feature3.jpg" alt="Expert Instructors">
                    <h3>Expert Instructors</h3>
                    <p>Learn from industry experts and experienced educators.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta">
        <div class="container">
            <h2>Start Learning Today</h2>
            <p>Join our community of learners and take the first step towards achieving your educational goals.</p>
            <a href="register.php" class="btn">Get Started</a>
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
