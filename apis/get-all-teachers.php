<?php
include("config.php");
$count_teachers_query = "SELECT * FROM users WHERE `category` = 'teacher' and `active` = '1' ";
$response = mysqli_query($conn, $count_teachers_query);
$teachers = mysqli_fetch_all($response, MYSQLI_ASSOC);
