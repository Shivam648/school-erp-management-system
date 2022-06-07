<?php
include("config.php");
$count_students_query = "SELECT * FROM users WHERE `category` = 'student' and `active` = '1' ORDER BY `uid`";
$response = mysqli_query($conn, $count_students_query);
$students = mysqli_fetch_all($response, MYSQLI_ASSOC);
