<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn->query("DELETE FROM course WHERE Course_ID = $id");
header("Location: admin-course.php");
exit();
?>