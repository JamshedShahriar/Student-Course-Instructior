<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><title>Process Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
<div class="card p-4 text-center shadow-sm" style="max-width: 450px; width:100%; border-radius:12px;">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseId = (int)$_POST['courseId'];
    $instructorId = (int)$_POST['instructorId'];
    $date = $conn->real_escape_string($_POST['assignmentDate']);

    $sql = "INSERT INTO course_instructor (Course_ID, Instructor_ID, Assignment_Date) VALUES ('$courseId', '$instructorId', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "<h4 class='text-success font-weight-bold mb-3'>Allocated!</h4><p class='text-muted'>Instructor module distribution generated.</p>";
    } else {
        echo "<h4 class='text-danger mb-3'>Execution Failed</h4><p class='text-muted'>".$conn->error."</p>";
    }
    $conn->close();
}
?>
<a href="../admin.php" class="btn btn-primary mt-3 py-2 w-100">Return to Dashboard</a>
</div>
</body>
</html>