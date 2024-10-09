<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General reset for margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            color: #333; /* Dark text color */
            text-align: center; /* Center-align text */
            padding: 20px; /* Padding around body */
        }

        /* Heading Styling */
        h1 {
            font-size: 36px; /* Font size */
            color: #34495e; /* Darker blue color */
            margin-bottom: 20px; /* Margin below heading */
        }

        /* Form Styling */
        form {
            background-color: #ffffff; /* White background for form */
            padding: 20px; /* Padding around form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            max-width: 400px; /* Max width for the form */
            margin: 0 auto; /* Center the form */
        }

        label {
            display: block; /* Display labels as block */
            margin: 10px 0 5px; /* Margin around labels */
            text-align: left; /* Align text to the left */
        }

        input[type="text"], input[type="password"] {
            width: 100%; /* Full width inputs */
            padding: 10px; /* Padding inside inputs */
            margin-bottom: 15px; /* Space below inputs */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px; /* Rounded corners */
        }

        button {
            background-color: #2c3e50; /* Dark blue button */
            color: white; /* White text */
            padding: 10px 15px; /* Padding inside button */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s; /* Transition for background color */
        }

        button:hover {
            background-color: #1abc9c; /* Light green on hover */
        }

        /* Error Message Styling */
        p {
            color: red; /* Red color for error messages */
            margin-bottom: 20px; /* Margin below error message */
        }
    </style>
</head>
<body>
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif ?>

    <form action="<?= base_url('login/authenticate') ?>" method="post">
    <?= csrf_field() ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>
</form>

</body>
</html>
