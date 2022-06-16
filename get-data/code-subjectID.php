<!-- API to find a subject code using subject ID -->
<?php
$find_subject = "SELECT * FROM subjects WHERE `subject_id` = '$subject_id' AND `active` = '1'";
$response = mysqli_query($conn, $find_subject) or die(mysqli_errno($conn));
$subject = mysqli_fetch_array($response, MYSQLI_ASSOC);
$code = $subject["code"];
