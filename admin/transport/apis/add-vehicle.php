<?php
include("config.php");
if (isset($_POST["add_vehicle"])) {
    $vehicle_type = strtolower($_POST["type"]);
    $vehicle_number = $_POST["plate"];
    $driver_id = $_POST["driver_id"];

    $find_vehicle = "SELECT * FROM vehicles WHERE `vehicle_number` = '$vehicle_number'";
    $response = mysqli_query($conn, $find_vehicle) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Vehicle already added...";
    } else {
        $add_vehicle = "INSERT INTO vehicles (`vehicle_type`,`vehicle_number`,`driver_id`,`active`) VALUES ('$vehicle_type','$vehicle_number','$driver_id','1') ";
        $response = mysqli_query($conn, $add_vehicle) or die(mysqli_error($conn));
        header('Location: ../transport.php');
    }
}