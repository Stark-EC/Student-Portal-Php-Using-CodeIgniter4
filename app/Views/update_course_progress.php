<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        label, input {
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Update Course Progress</h2>

<form action="<?= base_url('updateProgress/' . $courseId) ?>" method="post">
    <?= csrf_field() ?>
    <label for="progress_percentage">Progress Percentage:</label>
    <input type="number" name="progress_percentage" id="progress_percentage" min="0" max="100" required>

    <button type="submit">Update Progress</button>
</form>

</body>
</html>
