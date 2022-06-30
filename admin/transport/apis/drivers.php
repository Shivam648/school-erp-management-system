<?php
$find_drivers = "SELECT * FROM miscellaneous WHERE `category` = 'driver'";
$response = mysqli_query($conn, $find_drivers) or die(mysqli_errno($conn));
$drivers = mysqli_fetch_all($response, MYSQLI_ASSOC);