<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Courses</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto; /* Allows horizontal scrolling for small screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1.1em;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            white-space: nowrap; /* Prevents text wrapping for better readability on small screens */
        }

        th {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        tr {
            border-bottom: 1px solid #dddddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.2s ease-in;
        }

        .no-courses {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
        }

        /* Add horizontal scrolling for smaller screens */
        @media (max-width: 768px) {
            .table-container {
                margin-top: 20px;
                border: 1px solid #ddd;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<?= $this->extend('/dashboard_layout') ?>

<?= $this->section('content') ?>
    <div class="main-content">
    
    <h1>Your Registered Courses</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif ?>

    <?php if (!empty($registeredCourses)): ?>
        <div class="table-container">
            <table id="coursesTable">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Course Code &#9650;</th>
                        <th onclick="sortTable(1)">Course Name &#9650;</th>
                        <th onclick="sortTable(2)">Course Description &#9650;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registeredCourses as $course): ?>
                        <tr>
                            <td><?= esc($course['course_code']) ?></td>
                            <td><?= esc($course['course_name']) ?></td>
                            <td><?= esc($course['course_description']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-courses">You have not registered for any courses yet.</p>
    <?php endif ?>
 
    </div>

<?= $this->endSection() ?>

<script>
    // Simple table sorting function
    function sortTable(columnIndex) {
        var table = document.getElementById("coursesTable");
        var rows = Array.from(table.rows).slice(1); // Skip the header row
        var isAscending = table.getAttribute('data-sort-asc') === 'true';  // Toggle the sorting order

        rows.sort(function(rowA, rowB) {
            var cellA = rowA.cells[columnIndex].innerText.toLowerCase();
            var cellB = rowB.cells[columnIndex].innerText.toLowerCase();

            if (cellA < cellB) return isAscending ? -1 : 1;
            if (cellA > cellB) return isAscending ? 1 : -1;
            return 0;
        });

        rows.forEach(function(row) {
            table.tBodies[0].appendChild(row); // Reorder the rows
        });

        // Toggle the sorting order for the next click
        table.setAttribute('data-sort-asc', !isAscending);
    }
</script>

</body>
</html>
