<?php
$host = "localhost";
$user = "root";         
$password = "";         
$database = "student-course-instructor";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>