<!-- API to return driver details using his/her driver id -->
<?php
$find_driver = "SELECT * FROM miscellaneous WHERE miscellaneous_id = '$driver_id'";
$response = mysqli_query($conn, $find_driver) or die(mysqli_errno($conn));
$driver = mysqli_fetch_array($response, MYSQLI_ASSOC);