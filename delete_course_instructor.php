<?php
include 'db.php';
$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$instructor_id = isset($_GET['instructor_id']) ? (int)$_GET['instructor_id'] : 0;

$query = "DELETE FROM course_instructor WHERE Course_ID = ? AND Instructor_ID = ?";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->bind_param("ii", $course_id, $instructor_id);
    $stmt->execute();
    $stmt->close();
}
header("Location: admin-course_instructor.php");
exit();
?>