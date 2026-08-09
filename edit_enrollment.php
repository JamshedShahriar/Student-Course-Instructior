<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id === 0) { die("Target pipeline context missing."); }

$result = $conn->query("SELECT * FROM enrollment WHERE Enrollment_ID = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = (int)$_POST['Student_ID'];
    $course_id = (int)$_POST['Course_ID'];
    $enrollment_date = $conn->real_escape_string($_POST['Enrollment_Date']);
    $grade = $conn->real_escape_string($_POST['Grade']);

    $update = "UPDATE enrollment SET Student_ID='$student_id', Course_ID='$course_id', Enrollment_Date='$enrollment_date', Grade='$grade' WHERE Enrollment_ID=$id";
    if ($conn->query($update)) {
        header("Location: admin-enrollment.php");
        exit();
    } else {
        echo "Pipeline update failed: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><title>Update System Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container" style="max-width: 550px;">
  <div class="card p-4 border-0 shadow-sm" style="border-radius:12px;">
    <h4 class="mb-4 font-weight-bold text-center">Modify Registration Profile Log</h4>
    <form method="POST">
      <div class="mb-3"><label class="form-label">Student Reference ID</label><input type="text" name="Student_ID" value="<?= htmlspecialchars($row['Student_ID']) ?>" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Course Identity Code ID</label><input type="text" name="Course_ID" value="<?= htmlspecialchars($row['Course_ID']) ?>" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Registration Track Date</label><input type="date" name="Enrollment_Date" value="<?= htmlspecialchars($row['Enrollment_Date']) ?>" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">System Performance Grade</label><input type="text" name="Grade" value="<?= htmlspecialchars($row['Grade']) ?>" class="form-control"></div>
      <button type="submit" class="btn btn-primary w-100 py-2">Apply System Log Changes</button>
    </form>
    <div class="text-center mt-3"><a href="admin-enrollment.php" class="text-decoration-none text-muted">Discard Parameter Set</a></div>
  </div>
</div>
</body>
</html>