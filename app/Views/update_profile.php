<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            text-align: center;
            padding: 20px;
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
        input[type="password"], input[type="text"], input[type="file"] {
            width: calc(90% - 10px);
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
    </style>
</head>
<body>
 
<!-- app/Views/student/update_profile.php -->
<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <h1>Authenticate Yourself</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <p class="error"><?= implode('<br>', session()->getFlashdata('errors')) ?></p>
    <?php endif ?>

    <form action="<?= base_url('student/updateProfile') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= esc($student['phone']) ?>">
        </div>

        <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" value="<?= esc($student['address']) ?>" required>
    </div>

    <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" name="date_of_birth" value="<?= esc($student['date_of_birth']) ?>" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="male" <?= $student['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $student['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= $student['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
        </select>
    </div>

        <div class="form-group updated-details">
        <label for="bio">Bio</label>
        <textarea name="bio" rows="4"><?= esc($student['bio']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="social_links">Social Links (JSON)</label>
        <input type="text" name="social_links" value="<?= esc(json_encode($student['social_links'])) ?>">
    </div>

        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password">
        </div>

        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>

        <div  class=" form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control">
        </div><br>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
 
   <!-- Display updated details -->

   <style>

    /* Styles for the Updated Details Section */
.updated-details {
    margin-top: 30px;
    padding: 15px;
    background-color: #ffffff; /* White background */
    border-radius: 8px;
    /* text-align: center;
    border: 1rem solid #088; */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

.updated-detailz {
    margin-top: 30px;
    padding: 15px;
    background-color: #ffffff; /* White background */
    border-radius: 8px;
    text-align: center;
    border: 1rem solid #088;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

.updated-details h2 {
    color: #333; /* Darker text for headings */
    border-bottom: 2px solid #4CAF50; /* Green underline */
    padding-bottom: 10px; /* Space below the heading */
}

.updated-details p {
    font-size: 16px; /* Slightly larger font size */
    line-height: 1.6; /* Improved line spacing */
    /* border: 1rem solid #088; */
    margin: 10px 0; /* Margin for spacing between paragraphs */
}

.updated-details img {
    border-radius: 8px; /* Rounded corners for the image */
    border: 2px solid #4CAF50; /* Green border around the image */
    margin-top: 10px; /* Space above the image */
}

   </style>
<!-- <div class="updated-details">
    <h2>Updated Details:</h2>
    <p><strong>Phone:</strong> < ?= esc($student['phone']) ?></p>
    < ?php if (!empty($student['profile_picture'])): ?>
        <p><strong>Profile Picture:</strong></p>
        <img src="< ?= base_url('uploads/' . esc($student['profile_picture'])) ?>" alt="Profile Picture" style="max-width: 200px; max-height: 200px;">
    < ?php endif; ?>
</div> -->
<div class="updated-detailz">
<h2>Updated Details:</h2>
<p><strong>Phone:</strong> <?= esc($student['phone']) ?></p>
<p><strong>Date of Birth:</strong> <?= esc($student['date_of_birth']) ?></p>
<p><strong>Address:</strong> <?= esc($student['address']) ?></p>
<p><strong>Gender:</strong> <?= esc($student['gender']) ?></p>
<p><strong>Bio:</strong> <?= esc($student['bio']) ?></p>

<?php if (!empty($student['profile_picture'])): ?>
    <p><strong>Profile Picture:</strong></p>
    <img src="<?= base_url('uploads/' . esc($student['profile_picture'])) ?>" alt="" style="max-width: 200px; max-height: 200px;">
<?php endif; ?>

<?php if (!empty($student['social_links'])): ?>
    <p><strong>Social Links:</strong> <?= esc(json_encode($student['social_links'])) ?></p>
<?php endif; ?>

</div>


<?= $this->endSection() ?>
</body>
</html>
