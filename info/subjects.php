<?php
$find_subjects = "SELECT * FROM subjects WHERE `active` = '1' ORDER BY `code` ASC";
$response = mysqli_query($conn, $find_subjects) or die(mysqli_errno($conn));
$subjects = mysqli_fetch_all($response, MYSQLI_ASSOC);
