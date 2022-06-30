<!-- API to delete a route using route id -->
<?php
include("../../../config.php");
$vehicle_id = $_GET["vehicle_id"];
$delete_vehicle = "DELETE FROM vehicles WHERE vehicle_id = '$vehicle_id'";
$response = mysqli_query($conn, $delete_vehicle) or die(mysqli_errno($conn));
header('Location: ../vehicles.php?query=manage');