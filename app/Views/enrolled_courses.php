<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 20px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 20px;
            color: white;
        }
    </style>
</head>
<body>

<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
    <h1>Enrolled Courses</h1>
    <table>
        <tr>
            <th>Course Name</th>
            <th>Progress</th>
        </tr>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= esc($course['course_name']) ?></td>
                <td>
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: <?= esc($course['progress']) ?>%;">
                            <?= esc($course['progress']) ?>%
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $this->section('content') ?>

</body>
</html>
