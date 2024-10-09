<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 10px 0;
        }

        .success {
            color: green;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Your Registered Courses</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>

    <?php if (!empty($registeredCourses)): ?>
        <ul>
            <?php foreach ($registeredCourses as $course): ?>
                <li><?= esc($course['course_name']) ?> - <?= esc($course['course_description']) ?></li>
            <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p>You have not registered for any courses yet.</p>
    <?php endif ?>
</body>
</html>
