<?php
include("../../../config.php");
if (isset($_POST["update_vehicle"])) {
    $vehicle_id = $_POST["vehicle_id"];
    $vehicle_type = strtolower($_POST["type"]);
    $vehicle_number = strtolower($_POST["plate"]);
    $driver_id = $_POST["driver_id"];
    $status = $_POST["status"];

    $find_vehicle = "SELECT * FROM vehicles WHERE `vehicle_id` = '$vehicle_id'";
    $response = mysqli_query($conn, $find_vehicle) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        $update_vehicle = "UPDATE vehicles SET `vehicle_type` = '$vehicle_type', `vehicle_number` = '$vehicle_number', `driver_id` = '$driver_id', `active` = '$status' WHERE `vehicle_id` = '$vehicle_id'";
        $response = mysqli_query($conn, $update_vehicle) or die(mysqli_error($conn));
        header('Location: ../transport.php');
    } else {
        echo "There was some problem finding the vehicle, contact admin...";
    }
}