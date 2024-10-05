<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Courses</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
</head>
<body>
    <h1>Your Registered Courses</h1>

    <?php if (count($registered_courses) > 0): ?>
        <ul>
            <?php foreach ($registered_courses as $course): ?>
                <li><?= $course['course_name']; ?> (<?= $course['course_code']; ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You have not registered for any courses yet.</p>
    <?php endif; ?>

    <a href="<?= base_url('dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
