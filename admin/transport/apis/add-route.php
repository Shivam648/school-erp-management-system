<?php
include("../../../config.php");
if (isset($_POST["add_route"])) {
    $start = strtolower($_POST["start"]);
    $finish = strtolower($_POST["finish"]);
    $fair = $_POST["fair"];

    $find_route = "SELECT * FROM routes WHERE `start` = '$start' AND `finish` = '$finish'";
    $response = mysqli_query($conn, $find_route) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Route already added...";
    } else {
        $add_route = "INSERT INTO routes (`start`,`finish`,`fair`,`active`) VALUES ('$start','$finish','$fair','1') ";
        $response = mysqli_query($conn, $add_route) or die(mysqli_error($conn));
        header('Location: ../../../admin/transport/routes.php?query=manage');
    }
}