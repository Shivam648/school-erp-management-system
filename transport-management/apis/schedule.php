<!-- API to return route details using route id -->
<?php
$find_schedule = "SELECT * FROM vehicles_schedule WHERE schedule_id = '$schedule_id'";
$response = mysqli_query($conn, $find_schedule) or die(mysqli_errno($conn));
$schedule = mysqli_fetch_array($response, MYSQLI_ASSOC);