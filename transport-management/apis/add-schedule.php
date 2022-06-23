<?php
include("config.php");
if (isset($_POST["add_schedule"])) {
    $vehicle_id = $_POST["vehicle_id"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $route_id = $_POST["route_id"];

    $find_schedule = "SELECT * FROM vehicles_schedule WHERE `vehicle_id` = '$vehicle_id' AND `arrival` = '$arrival' AND `departure` = '$departure' AND `route_id` = '$route_id'";
    $response = mysqli_query($conn, $find_schedule) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Schedule already added...";
    } else {
        $add_schedule = "INSERT INTO vehicles_schedule (`vehicle_id`,`arrival`,`departure`,`route_id`,`active`) VALUES ('$vehicle_id','$arrival','$departure','$route_id','1') ";
        $response = mysqli_query($conn, $add_schedule) or die(mysqli_error($conn));
        header('Location: ../transport.php');
    }
}