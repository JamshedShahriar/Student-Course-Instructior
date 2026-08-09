<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard | Course Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    /* Unique Deep Emerald & Mint Accents */
    .navbar { background: #064e3b !important; box-shadow: 0 4px 15px rgba(6, 78, 59, 0.15); }
    .navbar-brand, .nav-link { color: #f3f4f6 !important; font-weight: 500; }
    .nav-link:hover { color: #34d399 !important; }
    .btn-logout { background-color: #dc2626; color: white !important; border-radius: 6px; }
    .btn-logout:hover { background-color: #b91c1c; }
    
    /* Modern Glassmorphism Accent for Cards */
    .card-custom { border: none; border-radius: 14px; box-shadow: 0 8px 20px rgba(0,0,0,0.03); background: #fff; transition: all 0.3s ease; }
    .card-custom:hover { transform: translateY(-4px); box-shadow: 0 12px 25px rgba(6, 78, 59, 0.08); }
    .card-header-custom { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: white; font-weight: 600; border-top-left-radius: 14px; border-top-right-radius: 14px; padding: 16px; border-bottom: 3px solid #10b981; }
    
    /* Unique Emerald Button */
    .btn-primary-custom { background: #059669; border: none; font-weight: 500; width: 100%; padding: 11px; border-radius: 8px; transition: background 0.2s; }
    .btn-primary-custom:hover { background: #047857; }
    .form-control:focus { border-color: #34d399; box-shadow: 0 0 0 0.25rem rgba(52, 211, 153, 0.25); }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="admin.php">🌿 UniAdmin Portal</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="php/admin-student.php">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="php/admin-course.php">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="php/admin-instructor.php">Instructors</a></li>
        <li class="nav-item"><a class="nav-link" href="php/admin-course_instructor.php">Allocations</a></li>
        <li class="nav-item"><a class="nav-link" href="php/admin-enrollment.php">Enrollments</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item me-2"><a class="nav-link btn btn-outline-light btn-sm px-3 mb-2 mb-lg-0" href="admin_change_password.php">Security</a></li>
        <li class="nav-item"><a class="nav-link btn btn-logout btn-sm px-3 text-white" href="admin_logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="row g-4">
    <!-- Student Form -->
    <div class="col-md-6 col-lg-4">
      <div class="card card-custom">
        <div class="card-header-custom text-center">Add New Student</div>
        <div class="card-body p-4">
          <form action="php/add_student.php" method="POST">
            <div class="mb-3"><input type="text" name="name" class="form-control" placeholder="Full Name" required /></div>
            <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email Address" required /></div>
            <div class="mb-3"><input type="tel" name="phone" class="form-control" placeholder="Phone Number" required /></div>
            <div class="mb-3"><input type="date" name="dob" class="form-control" required /></div>
            <div class="mb-3"><textarea name="address" class="form-control" placeholder="Current Address" rows="2"></textarea></div>
            <button type="submit" class="btn btn-primary-custom text-white">Add Student</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Course Form -->
    <div class="col-md-6 col-lg-4">
      <div class="card card-custom">
        <div class="card-header-custom text-center">Add New Course</div>
        <div class="card-body p-4">
          <form action="php/add_course.php" method="POST">
            <div class="mb-3"><input type="text" name="courseName" class="form-control" placeholder="Course Name" required /></div>
            <div class="mb-3"><input type="number" name="credits" class="form-control" placeholder="Credits" required /></div>
            <div class="mb-3"><input type="text" name="department" class="form-control" placeholder="Department" required /></div>
            <button type="submit" class="btn btn-primary-custom text-white">Add Course</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Instructor Form -->
    <div class="col-md-6 col-lg-4">
      <div class="card card-custom">
        <div class="card-header-custom text-center">Add New Instructor</div>
        <div class="card-body p-4">
          <form action="php/add_instructor.php" method="POST">
            <div class="mb-3"><input type="text" name="name" class="form-control" placeholder="Instructor Name" required /></div>
            <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required /></div>
            <div class="mb-3"><input type="tel" name="phone" class="form-control" placeholder="Phone" required /></div>
            <div class="mb-3"><input type="text" name="department" class="form-control" placeholder="Department" required /></div>
            <button type="submit" class="btn btn-primary-custom text-white">Add Instructor</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Enrollment Form -->
    <div class="col-md-6 col-lg-6">
      <div class="card card-custom">
        <div class="card-header-custom text-center">Add Student Enrollment</div>
        <div class="card-body p-4">
          <form action="php/add_enrollment.php" method="POST">
            <div class="mb-3"><input type="number" name="studentId" class="form-control" placeholder="Student ID" required /></div>
            <div class="mb-3"><input type="number" name="courseId" class="form-control" placeholder="Course ID" required /></div>
            <div class="mb-3"><input type="date" name="enrollmentDate" class="form-control" required /></div>
            <div class="mb-3"><input type="text" name="grade" class="form-control" placeholder="Grade (Optional)" /></div>
            <button type="submit" class="btn btn-primary-custom text-white">Add Enrollment</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Course Instructor Assignment Form -->
    <div class="col-md-12 col-lg-6">
      <div class="card card-custom">
        <div class="card-header-custom text-center">Assign Course Instructor</div>
        <div class="card-body p-4">
          <form action="php/add_course_instructor.php" method="POST">
            <div class="mb-3"><input type="number" name="courseId" class="form-control" placeholder="Course ID" required /></div>
            <div class="mb-3"><input type="number" name="instructorId" class="form-control" placeholder="Instructor ID" required /></div>
            <div class="mb-3"><input type="date" name="assignmentDate" class="form-control" required /></div>
            <button type="submit" class="btn btn-primary-custom text-white">Assign Instructor</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>