<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Default Credentials
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Portal</title>
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
    .login-card { 
      border: none; 
      border-radius: 16px; 
      box-shadow: 0 15px 35px rgba(0,0,0,0.3); 
      background: #ffffff; 
      max-width: 400px; 
      width: 100%; 
      padding: 35px; 
    }
    .btn-login { 
      background: #059669; 
      border: none; 
      color: white; 
      font-weight: 500; 
      padding: 12px; 
      border-radius: 8px; 
      transition: background 0.2s; 
    }
    .btn-login:hover { 
      background: #047857; 
      color: white; 
    }
    .form-control:focus { 
      border-color: #34d399; 
      box-shadow: 0 0 0 0.25rem rgba(52, 211, 153, 0.25); 
    }
    .brand-icon {
      color: #059669;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="login-card">
  <div class="text-center mb-4">
    <div class="brand-icon">🌿</div>
    <h4 class="fw-bold text-dark">Admin Portal</h4>
    <p class="text-muted small">Sign in to manage your system</p>
  </div>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger py-2 small text-center" role="alert">
      <?php echo $error; ?>
    </div>
  <?php endif; ?>

  <form action="admin_login.php" method="POST">
    <div class="mb-3">
      <label class="form-label small fw-medium text-secondary">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter username" required>
    </div>
    <div class="mb-4">
      <label class="form-label small fw-medium text-secondary">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-login w-100">Sign In</button>
  </form>
  
  <div class="text-center mt-4">
    <a href="index.php" class="text-decoration-none small" style="color: #059669;">← Back to Home</a>
  </div>
</div>

</body>
</html>