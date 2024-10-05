<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Courses</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
</head>
<body>
    <h1>Register for Courses</h1>

    <form action="<?= base_url('dashboard/processRegisterCourses'); ?>" method="post">
        <label for="course">Select Course:</label>
        <select name="course_id" id="course">
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id']; ?>"><?= $course['course_name']; ?> (<?= $course['course_code']; ?>)</option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Register</button>
    </form>

    <a href="<?= base_url('dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
