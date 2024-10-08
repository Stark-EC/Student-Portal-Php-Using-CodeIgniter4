<!-- app/Views/register_course.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Course</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #34495e;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #1abc9c;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Register for a Course</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul class="error">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form action="<?= base_url('courses/register') ?>" method="post">
        <?= csrf_field() ?>
        
        <label for="course_id">Select a Course:</label>
        <select name="course_id" id="course_id" required>
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id'] ?>"><?= esc($course['course_name']) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Register</button>
    </form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Course</title>
</head>
<body>
    <h1>Register for a Course</h1>

    <!-- Display validation errors -->
    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <!-- Success message -->
    <?php if (session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>

    <form action="<?= base_url('courses/register') ?>" method="post">
        <?= csrf_field() ?>

        <label for="course_id">Select a course:</label>
        <select name="course_id" id="course_id">
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id'] ?>"><?= $course['course_name'] ?> - <?= $course['course_description'] ?></option>
            <?php endforeach ?>
        </select>

        <button type="submit">Register</button>
    </form>
</body>
</html>
