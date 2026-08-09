<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM enrollment WHERE Enrollment_ID = $id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Enrollment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .card-custom { border: none; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
    .card-header-custom { background: #064e3b; color: white; font-weight: 600; border-top-left-radius: 12px; border-top-right-radius: 12px; }
  </style>
</head>
<body>
<div class="container my-5" style="max-width: 500px;">
  <div class="card card-custom">
    <div class="card-header-custom p-3 text-center">Modify Enrollment & Grade</div>
    <div class="card-body p-4">
      <form action="update_enrollment.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['Enrollment_ID']; ?>">
        <div class="mb-3">
          <label class="form-label">Student ID</label>
          <input type="number" name="studentId" class="form-control" value="<?php echo $row['Student_ID']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Course ID</label>
          <input type="number" name="courseId" class="form-control" value="<?php echo $row['Course_ID']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Enrollment Date</label>
          <input type="date" name="enrollmentDate" class="form-control" value="<?php echo $row['Enrollment_Date']; ?>" required>
        </div>
        <div class="mb-4">
          <label class="form-label">Final Grade</label>
          <input type="text" name="grade" class="form-control" value="<?php echo $row['Grade']; ?>">
        </div>
        <button type="submit" class="btn w-100 py-2 text-white" style="background: #059669;">Apply Updates</button>
        <a href="admin-enrollment.php" class="btn btn-light w-100 mt-2">Cancel</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>