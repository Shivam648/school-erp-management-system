<?php
include("../../../config.php");
if (isset($_POST["update_driver"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $doj = $_POST["doj"];
    $status = $_POST["status"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_driver = "SELECT * FROM miscellaneous WHERE email = '$email' AND `category` = 'driver'";
    $response = mysqli_query($conn, $find_driver) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            $update_profile = "UPDATE miscellaneous SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `doj` = '$doj', `address` = '$address', `active` = '$status' WHERE `email` = '$email'";
        } else {
            $password = sha1($password);
            $update_profile = "UPDATE miscellaneous SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `dob` = '$dob', `address` = '$address', `password` = '$password', `active` = '$status' WHERE `email` = '$email'";
        }
        $response = mysqli_query($conn, $update_profile) or die(mysqli_error($conn));
        header('Location: ../../../admin/transport/drivers.php?query=manage');
    } else {
        echo "There was some problem finding your account, contact account manager...";
    }
}