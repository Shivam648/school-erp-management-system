<!-- API to return all drivers -->
<?php
$find_drivers = "SELECT * FROM miscellaneous WHERE active = '1'";
$response = mysqli_query($conn, $find_drivers) or die(mysqli_errno($conn));
$drivers = mysqli_fetch_all($response, MYSQLI_ASSOC);