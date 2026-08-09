<?php
include 'db.php';
$course_id = $_GET['course_id'];
$instructor_id = $_GET['instructor_id'];
$result = $conn->query("SELECT * FROM course_instructor WHERE Course_ID = $course_id AND Instructor_ID = $instructor_id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Allocation</title>
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
    <div class="card-header-custom p-3 text-center">Modify Course Allocation</div>
    <div class="card-body p-4">
      <form action="update_course_instructor.php" method="POST">
        <input type="hidden" name="old_course_id" value="<?php echo $row['Course_ID']; ?>">
        <input type="hidden" name="old_instructor_id" value="<?php echo $row['Instructor_ID']; ?>">
        
        <div class="mb-3">
          <label class="form-label">Course ID</label>
          <input type="number" name="courseId" class="form-control" value="<?php echo $row['Course_ID']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Instructor ID</label>
          <input type="number" name="instructorId" class="form-control" value="<?php echo $row['Instructor_ID']; ?>" required>
        </div>
        <div class="mb-4">
          <label class="form-label">Assignment Date</label>
          <input type="date" name="assignmentDate" class="form-control" value="<?php echo $row['Assignment_Date']; ?>" required>
        </div>
        <button type="submit" class="btn w-100 py-2 text-white" style="background: #059669;">Apply Updates</button>
        <a href="admin-course_instructor.php" class="btn btn-light w-100 mt-2">Cancel</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>