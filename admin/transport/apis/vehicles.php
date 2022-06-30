<!-- API to return all vehicles -->
<?php
$find_vehicles = "SELECT * FROM vehicles";
$response = mysqli_query($conn, $find_vehicles) or die(mysqli_errno($conn));
$vehicles = mysqli_fetch_all($response, MYSQLI_ASSOC);