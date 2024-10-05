<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form action="<?= base_url('register/store') ?>" method="post">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?= old('username') ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
