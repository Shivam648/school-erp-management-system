<?php
include("../../../config.php");
if (isset($_POST["update_schedule"])) {
    $schedule_id = $_POST["schedule_id"];
    $vehicle_id = $_POST["vehicle_id"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $status = $_POST["status"];
    $route_id = $_POST["route_id"];

    $find_schedule = "SELECT * FROM vehicles_schedule WHERE `schedule_id` = '$schedule_id'";
    $response = mysqli_query($conn, $find_schedule) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        $update_schedule = "UPDATE vehicles_schedule SET `vehicle_id` = '$vehicle_id', `arrival` = '$arrival', `departure` = '$departure', `route_id` = '$route_id', `active` = '$status' WHERE `schedule_id` = '$schedule_id'";
        $response = mysqli_query($conn, $update_schedule) or die(mysqli_error($conn));
        header('Location: ../../../admin/transport/schedules.php?query=manage');
    } else {
        echo "There was some problem finding the vehicle, contact admin...";
    }
}