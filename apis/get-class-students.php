<!-- API to return all students of a class : verified -->
<?php
include("config.php");
$find_students = "SELECT * FROM students WHERE `class_id` = '$class_id' and `active` = '1' ORDER BY `student_id`";
$response = mysqli_query($conn, $find_students);
$students = mysqli_fetch_all($response, MYSQLI_ASSOC);
