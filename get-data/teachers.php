<!-- API to return all active teachers : verified -->
<?php
$find_teachers = "SELECT * FROM teachers WHERE `active` = '1' ORDER BY `teacher_id`";
$response = mysqli_query($conn, $find_teachers);
$teachers = mysqli_fetch_all($response, MYSQLI_ASSOC);
