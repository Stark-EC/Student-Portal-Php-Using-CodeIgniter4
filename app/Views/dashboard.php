<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px 20px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #1abc9c;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px; /* Matches sidebar width */
            padding: 20px;
            flex-grow: 1;
        }

        /* Header Styling */
        .header {
            background-color: #34495e;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            margin: 0;
        }

        /* Dashboard Content */
        .dashboard-content {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #34495e;
        }

        p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #34495e;
            color: white;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px); /* Adjust width to fit with sidebar */
        }
    </style>
</head>
<body>
<?= $this->extend('/dashboard_layout') ?>

    <!-- Sidebar -->
    
    <?= $this->section('content') ?>
 
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Welcome, <?= session()->get('username'); ?>!</h1>
            <p>Student Dashboard</p>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h2>Dashboard Overview</h2>
            <p>Select an option from the sidebar to navigate through your dashboard features. This is your central hub for all academic activities. Access your courses, 
view important announcements, and track your progress all in one place! Check out the latest announcements and updates from your instructors. 
Stay informed about important deadlines and upcoming events! Keep your information up to date. 
Update your profile details and change your password to ensure your account is secure. 
Explore a variety of learning materials and resources to enhance your skills. From tutorials to study guides, everything you need is right here!</p>
        </div>
    </div> <br>

     <!-- Quick Links -->
      <style>
         .card {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            padding: 15px;
        }

        .card p {
            margin: 5px 0;
        }

        .card h3 {
            margin-top: 0;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        </style>
     <div class="card">
        <h3>Quick Links</h3>
        <a href="#" class="button">Exam Results</a>
        <a href="#" class="button">View Grades</a>
        <a href="#" class="button">Assessment</a>
    </div>

<?= $this->endSection() ?>


    <!-- Footer -->
   

</body>
</html>
