<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Student Dashboard' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar styling */
        .sidebar {
            width: 200px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: block;
        }

        .sidebar ul li a:hover {
            color: #1abc9c;
        }

        /* Main content styling */
        .content {
            flex: 1;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <ul>
        <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li><a href="<?= base_url('courses') ?>">Register Courses</a></li>
        <li><a href="<?= base_url('registered-courses') ?>">View Registered Courses</a></li>
        <li><a href="<?= base_url('profile') ?>">Update Profile</a></li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
    </ul>
</div>

<div class="content">
    <?= $this->renderSection('content') ?> <!-- This section will be replaced by view-specific content -->
</div>

</body>
</html>
