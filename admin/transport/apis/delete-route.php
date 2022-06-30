<!-- API to delete a route using route id -->
<?php
include("config.php");
$route_id = $_GET["route_id"];
$delete_route = "DELETE FROM routes WHERE route_id = '$route_id'";
$response = mysqli_query($conn, $delete_route) or die(mysqli_errno($conn));
header('Location: ../routes.php?query=manage');