<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        /* General reset for margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            color: #333; /* Dark text color */
            text-align: center; /* Center-align text */
        }

        /* Navigation Bar Styling */
        nav {
            background-color: #2c3e50; /* Dark blue background */
            padding: 10px 0; /* Vertical padding */
        }

        nav ul {
            list-style: none; /* Remove bullets */
            display: flex; /* Use flexbox for horizontal layout */
            justify-content: center; /* Center the nav items */
            gap: 20px; /* Space between items */
        }

        nav ul li {
            display: inline; /* Display items inline */
        }

        nav ul li a {
            text-decoration: none; /* Remove underline */
            color: white; /* White text color */
            font-weight: bold; /* Bold text */
            padding: 10px 15px; /* Padding around links */
            transition: background-color 0.3s; /* Transition for background color */
        }

        nav ul li a:hover {
            background-color: #1abc9c; /* Light green on hover */
            border-radius: 5px; /* Rounded corners */
        }

        /* Heading Styling */
        h1 {
            margin-top: 20px; /* Margin above heading */
            font-size: 36px; /* Font size */
            color: #34495e; /* Darker blue color */
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?= base_url('register') ?>">Register</a></li>
            <li><a href="<?= base_url('login') ?>">Login</a></li>
        </ul>
    </nav>

    <h1>Welcome to the Student Portal</h1>
</body>
</html>
