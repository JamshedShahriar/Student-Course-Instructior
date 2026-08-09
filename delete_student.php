<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn->query("DELETE FROM student WHERE Student_ID = $id");
header("Location: admin-student.php");
exit();
?>