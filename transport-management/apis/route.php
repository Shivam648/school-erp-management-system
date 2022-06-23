<!-- API to return route details using route id -->
<?php
$find_route = "SELECT * FROM routes WHERE route_id = '$route_id'";
$response = mysqli_query($conn, $find_route) or die(mysqli_errno($conn));
$route = mysqli_fetch_array($response, MYSQLI_ASSOC);