<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $password_file = 'admin_password.txt';
    $saved_password = 'admin123'; // Default

    if (file_exists($password_file)) {
        $saved_password = trim(file_get_contents($password_file));
    }

    if ($current_password !== $saved_password) {
        $error = "Current password is incorrect!";
    } elseif ($new_password !== $confirm_password) {
        $error = "New passwords do not match!";
    } else {
        file_put_contents($password_file, $new_password);
        $success = "Password updated successfully!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body { 
      font-family: 'Poppins', sans-serif; 
      background: linear-gradient(135deg, #064e3b 0%, #111827 100%); 
      height: 100vh; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
    }
    .password-card { 
      border: none; 
      border-radius: 16px; 
      box-shadow: 0 15px 35px rgba(0,0,0,0.3); 
      background: #ffffff; 
      max-width: 420px; 
      width: 100%; 
      padding: 35px; 
    }
    .btn-update { 
      background: #059669; 
      border: none; 
      color: white; 
      font-weight: 500; 
      padding: 12px; 
      border-radius: 8px; 
      transition: background 0.2s; 
    }
    .btn-update:hover { 
      background: #047857; 
      color: white; 
    }
    .form-control:focus { 
      border-color: #34d399; 
      box-shadow: 0 0 0 0.25rem rgba(52, 211, 153, 0.25); 
    }
  </style>
</head>
<body>

<div class="password-card">
  <div class="text-center mb-4">
    <h3 class="fw-bold text-dark">Change Password</h3>
    <p class="text-muted small">Update your admin account security</p>
  </div>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger py-2 small text-center" role="alert">
      <?php echo $error; ?>
    </div>
  <?php endif; ?>

  <?php if (isset($success)): ?>
    <div class="alert alert-success py-2 small text-center" role="alert">
      <?php echo $success; ?>
    </div>
  <?php endif; ?>

  <form action="admin_change_password.php" method="POST">
    <div class="mb-3">
      <label class="form-label small fw-medium text-secondary">Current Password</label>
      <input type="password" name="current_password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label small fw-medium text-secondary">New Password</label>
      <input type="password" name="new_password" class="form-control" required>
    </div>
    <div class="mb-4">
      <label class="form-label small fw-medium text-secondary">Confirm New Password</label>
      <input type="password" name="confirm_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-update w-100">Update Password</button>
  </form>
  
  <div class="text-center mt-4">
    <a href="admin.php" class="text-decoration-none small" style="color: #059669;">← Back to Admin Home</a>
  </div>
</div>

</body>
</html>