<!-- API to return all active teachers : verified -->
<?php
include("config.php");
$count_teachers_query = "SELECT * FROM teachers WHERE `active` = '1' ORDER BY `teacher_id`";
$response = mysqli_query($conn, $count_teachers_query);
$teachers = mysqli_fetch_all($response, MYSQLI_ASSOC);
