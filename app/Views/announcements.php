<!-- app/Views/announcements.php -->
<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
<h2>Course Announcements</h2>

<?php if (!empty($announcements)): ?>
    <ul>
        <?php foreach ($announcements as $announcement): ?>
            <li>
                <?= esc($announcement['message']) ?> (Posted on: <?= esc($announcement['created_at']) ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No announcements for this course.</p>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
    </div>
<?php endif; ?>

<!-- Loop through announcements -->
<?php foreach ($announcements as $announcement): ?>
    <div class="announcement">
        <p><?= esc($announcement['message']) ?></p>
        <small>Posted on <?= esc($announcement['created_at']) ?></small>
    </div>
<?php endforeach; ?>


<!-- Add announcement form (for admins or instructors) -->
<form action="<?= base_url('/announcements/add') ?>" method="post">
    <input type="hidden" name="course_id" value="<?= $courseId ?>"> <!-- Ensure this value is not empty -->
    <textarea name="message" required></textarea>
    <button type="submit">Add Announcement</button>
</form>


<?= $this->endSection() ?>
