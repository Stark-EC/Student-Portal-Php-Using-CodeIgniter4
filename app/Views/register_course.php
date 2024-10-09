<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Courses</title>

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

        form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 30px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            color: green;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
        }

        img {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Search and Register Courses</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="error"><?= session()->getFlashdata('error') ?></p>
    <?php endif ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>

    <!-- Course Search Form -->
    <form action="<?= base_url('courses/search') ?>" method="post">
        <?= csrf_field() ?>
        <label for="course_code">Search Course by Code:</label>
        <input type="text" name="course_code" id="course_code" placeholder="Enter course code, e.g. MATH101" required>
        
        <!-- Search Icon Button -->
        <button type="submit">
            <img src="<?= base_url('public/search_icon.png'); ?>" alt="" style="width: 20px;"> Search
        </button>
    </form>

    <!-- If a course is found, display the course details and registration button -->
    <?php if (isset($course)): ?>
        <h2>Course Found: <?= esc($course['course_name']) ?></h2>
        <p>Description: <?= esc($course['course_description']) ?></p>
        
        <form action="<?= base_url('courses/register') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
            <button type="submit">Register for this Course</button>
        </form>
    <?php endif ?>

    <!-- View Registered Courses Link -->
    <p><a href="<?= base_url('registered-courses') ?>">View Registered Courses</a></p>

</body>
</html>
