<?php
include("../../../config.php");
if (isset($_POST["update_route"])) {
    $route_id = $_POST["route_id"];
    $start = strtolower($_POST["start"]);
    $finish = strtolower($_POST["finish"]);
    $fair = $_POST["fair"];
    $status = $_POST["status"];


    $update_route = "UPDATE routes SET `start` = '$start', `finish` = '$finish', `fair` = '$fair', `active` = '$status' WHERE `route_id` = '$route_id'";
    $response = mysqli_query($conn, $update_route) or die(mysqli_error($conn));
    header('Location: ../../../admin/transport/routes.php?query=manage');
}