<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Courses</title>
</head>
<body>
    <h1>Your Registered Courses</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if (!empty($registeredCourses)): ?>
        <ul>
            <?php foreach ($registeredCourses as $course): ?>
                <li><?= esc($course['course_name']) ?> - <?= esc($course['course_description']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You have not registered for any courses yet.</p>
    <?php endif; ?>

</body>
</html>
