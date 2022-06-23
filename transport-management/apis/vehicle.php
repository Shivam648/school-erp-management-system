<!-- API to return driver details using his/her driver id -->
<?php
$find_vehicle = "SELECT * FROM vehicles WHERE vehicle_id = '$vehicle_id'";
$response = mysqli_query($conn, $find_vehicle) or die(mysqli_errno($conn));
$vehicle = mysqli_fetch_array($response, MYSQLI_ASSOC);