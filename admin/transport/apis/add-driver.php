<?php
include("../../../config.php");
if (isset($_POST["add_driver"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $doj = $_POST["doj"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];

    $find_driver = "SELECT * FROM miscellaneous WHERE email = '$email' AND `category` = 'driver' AND `active` = '1'";
    $response = mysqli_query($conn, $find_driver) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Driver already registered...";
    } else {
        $password = sha1($password);
        $add_driver = "INSERT INTO miscellaneous (`name`,`email`,`gender`,`phone`,`category`,`address`,`password`,`doj`,`active`) VALUES ('$name','$email','$gender','$phone','driver','$address','$password','$doj','1') ";
        $response = mysqli_query($conn, $add_driver) or die(mysqli_error($conn));
        header('Location: ../transport.php');
    }
}