<!-- API to find standard using class ID -->
<?php
include("./apis/config.php");
$find_standard = "SELECT * FROM classes WHERE `class_id` = '$class_id'";
$response = mysqli_query($conn, $find_standard) or die(mysqli_errno($conn));
$class = mysqli_fetch_array($response, MYSQLI_ASSOC);
$subject_ids = json_decode($class["subject_ids"]);
