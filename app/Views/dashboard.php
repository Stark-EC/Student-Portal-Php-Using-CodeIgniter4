<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
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
