<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn->query("DELETE FROM enrollment WHERE Enrollment_ID = $id");
header("Location: admin-enrollment.php");
exit();
?>