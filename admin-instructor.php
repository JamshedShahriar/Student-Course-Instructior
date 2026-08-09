<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Instructors | University System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .header-panel { background: #064e3b; color: white; padding: 25px 0; box-shadow: 0 4px 15px rgba(6, 78, 59, 0.15); }
    .table-container { background: white; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.02); padding: 25px; margin-top: 40px; border-top: 4px solid #10b981; }
    .table th { background-color: #f3f4f6; color: #1f2937; font-weight: 600; }
    .btn-outline-primary { color: #059669; border-color: #059669; }
    .btn-outline-primary:hover { background-color: #059669; color: white; border-color: #059669; }
  </style>
</head>
<body>

<div class="header-panel">
  <div class="container d-flex justify-content-between align-items-center">
    <h2 class="m-0 font-weight-bold">🌿 Instructors Roster</h2>
    <div>
      <a href="../admin.php" class="btn btn-outline-light btn-sm me-2">Dashboard Home</a>
      <a href="../index.php" class="btn btn-light btn-sm" style="color: #064e3b;">Public Home</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="table-container">
    <h5 class="mb-3 font-weight-bold text-dark">Faculty Members</h5>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Instructor ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Connection</th>
            <th>Department Base</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $conn->query("SELECT * FROM instructor");
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td><strong>#{$row['Instructor_ID']}</strong></td>
                      <td>{$row['Name']}</td>
                      <td>{$row['Email']}</td>
                      <td>{$row['Phone']}</td>
                      <td>{$row['Department']}</td>
                      <td class='text-center'>
                        <a href='edit_instructor.php?id={$row['Instructor_ID']}' class='btn btn-sm btn-outline-primary me-1'>Edit</a>
                        <a href='delete_instructor.php?id={$row['Instructor_ID']}' class='btn btn-sm btn-outline-danger' onclick=\"return confirm('Are you sure?');\">Delete</a>
                      </td>
                    </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>