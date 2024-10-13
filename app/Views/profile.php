<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?= $this->extend('/dashboard_layout') ?>

    <h1>Your Profile</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <!-- Add form or profile details here -->

    <p><a href="<?= base_url('logout') ?>">Logout</a></p>
</body>
</html>
