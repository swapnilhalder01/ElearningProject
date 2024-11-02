<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    

    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Dark background for the whole page */
            color: #fff; /* Light text color for readability */
        }
        
.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
}

h1, h2, h3 {
    color: #333;
    text-align: center;
}

        /* Header Styles */
        header {
            background-color: #333; /* Dark background for header */
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

        /* Main Content Styles */
        main {
            padding: 30px 20px;
        }

        .form-container {
            max-width: 400px; /* Maximum width for the form container */
            margin: 50px auto;
            background-color: #333; /* Dark background for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Shadow effect for depth */
        }

        .form-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff; /* White text for the header */
        }
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-size: 16px;
            color: #fff; /* White text for labels */
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 400px; /* Maximum width for input fields */
            background-color: #222; /* Dark background for input fields */
            color: #fff; /* White text for input fields */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        button {
            padding: 12px;
            background-color: #2ada13; /* Bright green button */
            color: #fff; /* White text for the button */
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            max-width: 400px; /* Maximum width for the button */
            width: 100%;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }


        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #1e90ff; /* Blue color for the link */
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline; /* Underline on hover */
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="courses_viewer.php">Courses</a></li>
                    <li><a href="login.php">Student Login</a></li>
                    <li><a href="register.php">Student Register</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="form-container">
            <h2>Register</h2>
            <form action="register_process.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Register</button>
            </form>
            <div class="form-footer">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </main>

 
</body>
</html>
