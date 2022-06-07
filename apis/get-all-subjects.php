<?php
include("config.php");
$find_subjects = "SELECT * FROM subjects WHERE `active` = '1'";
$response = mysqli_query($conn, $find_subjects) or die(mysqli_errno($conn));
$subjects = mysqli_fetch_all($response, MYSQLI_ASSOC);
