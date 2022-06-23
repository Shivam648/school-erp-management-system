<!-- API to return all routes -->
<?php
$find_routes = "SELECT * FROM routes";
$response = mysqli_query($conn, $find_routes) or die(mysqli_errno($conn));
$routes = mysqli_fetch_all($response, MYSQLI_ASSOC);