<!-- API to return all routes -->
<?php
$find_schedules = "SELECT * FROM vehicles_schedule";
$response = mysqli_query($conn, $find_schedules) or die(mysqli_errno($conn));
$schedules = mysqli_fetch_all($response, MYSQLI_ASSOC);