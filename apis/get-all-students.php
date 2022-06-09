<!-- API to return all active students : verified -->
<?php
include("config.php");
$find_students = "SELECT * FROM students WHERE `active` = '1' ORDER BY `student_id`";
$response = mysqli_query($conn, $find_students);
$students = mysqli_fetch_all($response, MYSQLI_ASSOC);
