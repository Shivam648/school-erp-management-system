<!-- API to return all active subjects : verified -->
<?php
include("config.php");
$find_subjects = "SELECT * FROM subjects WHERE `active` = '1' ORDER BY `subject_id`";
$response = mysqli_query($conn, $find_subjects) or die(mysqli_errno($conn));
$subjects = mysqli_fetch_all($response, MYSQLI_ASSOC);
