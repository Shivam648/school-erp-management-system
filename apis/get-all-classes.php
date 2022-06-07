<?php
include("config.php");
$find_classes = "SELECT * FROM classes WHERE `active` = '1'";
$response = mysqli_query($conn, $find_classes) or die(mysqli_errno($conn));
$classes = mysqli_fetch_all($response, MYSQLI_ASSOC);
