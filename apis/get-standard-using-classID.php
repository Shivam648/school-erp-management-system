<!-- API to find standard using class ID -->
<?php
include("./apis/config.php");
$find_standard = "SELECT * FROM classes WHERE `class_id` = '$class_id' AND `active` = '1'";
$response = mysqli_query($conn, $find_standard) or die(mysqli_errno($conn));
$class = mysqli_fetch_array($response, MYSQLI_ASSOC);
$standard = ucwords($class["standard"]);
