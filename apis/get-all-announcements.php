<?php
include("config.php");
$find_announcements = "SELECT * FROM announcements WHERE `active` = '1' ORDER BY `aid`";
$response = mysqli_query($conn, $find_announcements) or die(mysqli_errno($conn));
$announcements = mysqli_fetch_all($response, MYSQLI_ASSOC);
