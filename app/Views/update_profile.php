<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
</head>
<body>
    <h1>Update Profile</h1>

    <form action="<?= base_url('dashboard/processUpdateProfile'); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= $student['username']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $student['email']; ?>">

        <button type="submit">Update</button>
    </form>

    <a href="<?= base_url('dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
