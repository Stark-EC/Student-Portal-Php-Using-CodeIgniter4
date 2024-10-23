<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Progress</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 25px;
        }

        .progress-bar-fill {
            height: 20px;
            background-color: #4caf50;
            border-radius: 25px;
        }
    </style>
</head>
<body>

< ?= $this->extend('/dashboard_layout') ?>

< ?= $this->section('content') ?>
    <h1>Your Course Progress</h1>

    <table>
        <tr>
            <th>Course</th>
            <th>Progress</th>
        </tr>
        < ?php foreach ($progressData as $progress): ?>
            <tr>
                <td>< ?= esc($progress['course_id']) // You can join this with course name later ?></td>
                <td>
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: < ?= esc($progress['progress_percentage']) ?>%;"></div>
                    </div>
                    < ?= esc($progress['progress_percentage']) ?>%
                </td>
            </tr>
        < ?php endforeach; ?>
    </table>

    <p><a href="/courses">Back to Courses</a></p>
    < ?= $this->endSection() ?>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 5px;
        }

        .progress-bar-fill {
            display: block;
            height: 20px;
            background-color: #4CAF50;
            width: 0%;
        }
    </style>
</head>
<body>


<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
<h2>Your Course Progress</h2>


<?php if (!empty($progressData)): ?>
    <table>
        <tr>
            <th>Course ID</th>
            <th>Progress</th>
        </tr>
        <?php foreach ($progressData as $progress): ?>
            <tr>
                <td><?= esc($progress['course_id']) // You can join this with course name later ?></td>
                <td>
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: <?= esc($progress['progress_percentage']) ?>%;"></div>
                    </div>
                    <?= esc($progress['progress_percentage']) ?>%
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No progress found for your courses.</p>
<?php endif; ?>

<p><a href="/courses">Back to Courses</a></p>

<?= $this->endSection() ?>


</body>
</html>
