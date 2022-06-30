<!-- API to delete a route using route id -->
<?php
include("../../../config.php");
$schedule_id = $_GET["schedule_id"];
$delete_schedule = "DELETE FROM vehicles_schedule WHERE schedule_id = '$schedule_id'";
$response = mysqli_query($conn, $delete_schedule) or die(mysqli_errno($conn));
header('Location: ../schedules.php?query=manage');