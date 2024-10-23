<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <h1>Update Course Progress</h1>
    <form action="<?= base_url('course-progress/update') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" required>
        </div>
        <div class="form-group">
            <label for="progress_percentage">Progress Percentage</label>
            <input type="number" name="progress_percentage" min="0" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Progress</button>
    </form>
</div>
<?= $this->endSection() ?>
