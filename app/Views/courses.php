<h1>Available Courses</h1>
<ul>
    <?php foreach ($courses as $course): ?>
        <li><?= $course['course_name'] ?> (<?= $course['course_code'] ?>)</li>
    <?php endforeach; ?>
</ul>
