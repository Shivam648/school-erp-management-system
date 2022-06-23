<!-- API to delete a driver his/her driver id -->
<?php
include("config.php");
$driver_id = $_GET["driver_id"];
$delete_driver = "DELETE FROM miscellaneous WHERE miscellaneous_id = '$driver_id'";
$response = mysqli_query($conn, $delete_driver) or die(mysqli_errno($conn));
header('Location: ../drivers.php?query=manage');