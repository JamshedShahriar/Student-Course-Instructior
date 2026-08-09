<?php
include 'php/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome | Student Course Management Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    /* Unique Aurora-Gradient Hero Section */
    .hero-section { background: linear-gradient(135deg, #064e3b 0%, #111827 100%); color: white; padding: 90px 0; text-align: center; border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; box-shadow: 0 10px 30px rgba(6, 78, 59, 0.1); }
    
    .card-dashboard { border: none; border-radius: 16px; background: #fff; box-shadow: 0 10px 25px rgba(0,0,0,0.02); transition: all 0.3s ease; border-left: 4px solid #059669; }
    .card-dashboard:hover { transform: translateY(-6px); box-shadow: 0 15px 35px rgba(6, 78, 59, 0.1); border-left: 4px solid #34d399; }
    
    .btn-portal { background: #059669; border: none; color: white; border-radius: 8px; padding: 10px 22px; font-weight: 500; text-decoration: none; display: inline-block; transition: background 0.2s; }
    .btn-portal:hover { background: #047857; color: white; }
    
    .admin-link { background: rgba(255, 255, 255, 0.1); color: #34d399; font-weight: 600; border-radius: 8px; padding: 12px 26px; text-decoration: none; backdrop-filter: blur(5px); border: 1px solid rgba(52, 211, 153, 0.3); transition: all 0.2s; }
    .admin-link:hover { background: #34d399; color: #064e3b; }
    .section-title { font-weight: 700; color: #1f2937; position: relative; display: inline-block; }
    .section-title::after { content: ''; display: block; width: 50px; height: 3px; background: #059669; margin: 8px auto 0 auto; border-radius: 2px; }
  </style>
</head>
<body>

<div class="hero-section">
  <div class="container">
    <h1 class="display-4 font-weight-bold mb-3">University Course Management Portal</h1>
    <p class="lead text-white-50 max-width-600 mx-auto mb-5">Easily browse and view student details, instructor information, curriculum programs, and grade logs.</p>
    <a href="admin_login.php" class="admin-link">🔒 Admin Control Panel</a>
  </div>
</div>

<div class="container my-5">
  <div class="text-center mb-5">
    <h3 class="section-title">Quick View Panels</h3>
  </div>
  <div class="row g-4 justify-content-center">
    
    <div class="col-md-6 col-lg-4">
      <div class="card card-dashboard p-4 text-center">
        <h4 class="font-weight-bold mb-2" style="color: #064e3b;">Students Registry</h4>
        <p class="text-muted mb-4">Access details and addresses of all registered university students.</p>
        <a href="php/admin-student.php" class="btn-portal">Open Records</a>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card card-dashboard p-4 text-center">
        <h4 class="font-weight-bold mb-2" style="color: #064e3b;">Course Catalog</h4>
        <p class="text-muted mb-4">Explore credit architectures and faculties across standard departments.</p>
        <a href="php/admin-course.php" class="btn-portal">Open Records</a>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card card-dashboard p-4 text-center">
        <h4 class="font-weight-bold mb-2" style="color: #064e3b;">Instructors Directory</h4>
        <p class="text-muted mb-4">Review assigned institutional teachers and their respective phone logs.</p>
        <a href="php/admin-instructor.php" class="btn-portal">Open Records</a>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card card-dashboard p-4 text-center">
        <h4 class="font-weight-bold mb-2" style="color: #064e3b;">Faculty Assignments</h4>
        <p class="text-muted mb-4">Track which instructors are leading specific program classes dynamically.</p>
        <a href="php/admin-course_instructor.php" class="btn-portal">Open Records</a>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card card-dashboard p-4 text-center">
        <h4 class="font-weight-bold mb-2" style="color: #064e3b;">Enrollment Logs</h4>
        <p class="text-muted mb-4">Monitor historical student registration pipelines alongside system final grades.</p>
        <a href="php/admin-enrollment.php" class="btn-portal">Open Records</a>
      </div>
    </div>

  </div>
</div>

</body>
</html>