<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn->query("DELETE FROM instructor WHERE Instructor_ID = $id");
header("Location: admin-instructor.php");
exit();
?>