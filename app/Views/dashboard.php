<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
            padding: 20px; /* Padding around body */
        }

        /* Header Styling */
        header {
            background-color: #2c3e50; /* Dark blue background */
            padding: 10px 0; /* Vertical padding */
            margin-bottom: 20px; /* Space below header */
        }

        /* Navigation Bar Styling */
        nav ul {
            list-style: none; /* Remove bullet points */
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center items */
            gap: 20px; /* Space between items */
        }

        nav ul li {
            display: inline-block; /* Inline-block for list items */
        }

        nav ul li a {
            text-decoration: none; /* Remove underline */
            color: white; /* White text color */
            font-weight: bold; /* Bold text */
            font-size: 18px; /* Font size */
            transition: color 0.3s; /* Transition for hover effect */
        }

        nav ul li a:hover {
            color: #1abc9c; /* Change color on hover */
        }

        /* Main Content Styling */
        main {
            background-color: #ffffff; /* White background for main content */
            padding: 20px; /* Padding inside main */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            max-width: 600px; /* Max width for the main content */
            margin: 0 auto; /* Center the main content */
        }

        h1 {
            font-size: 36px; /* Font size */
            color: #34495e; /* Darker blue color */
            margin-bottom: 20px; /* Margin below heading */
        }

        p {
            font-size: 18px; /* Font size for paragraph */
            margin-bottom: 20px; /* Margin below paragraph */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= base_url('courses'); ?>">Register Courses</a></li>
                <li><a href="<?= base_url('registered-courses'); ?>">View Registered Courses</a></li>
                <li><a href="<?= base_url('profile'); ?>">Update Profile</a></li>
                <li><a href="<?= base_url('logout'); ?>">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to your Dashboard, <?= $username; ?>!</h1>
        <p>Select an option from the navigation menu above.</p>
    </main>
</body>
</html>
