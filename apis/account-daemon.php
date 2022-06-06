<!-- write apis for account management -->
<?php
include("config.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $find_user = "SELECT * FROM users WHERE email = '$email' and active = '1'";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $user_details = mysqli_fetch_array($response, MYSQLI_ASSOC);
            $actual_password = $user_details["password"];
            $password = sha1($password);
            if ($password == $actual_password) {
                $_SESSION["user_category"] = $user_details["category"];
                $_SESSION["user_id"] = $user_details["uid"];
                if ($_SESSION["user_category"] == "admin") {
                    header('Location: ../dashboard.php');
                } else {
                    header('Location: ../index.php');
                }
            } else {
                echo "Password was incorrect...";
            }
        }
    } else {
        echo "There was some problem finding your account. Please talk to your account manager...";
    }
}

if (isset($_POST["update_student"])) {
    $uid = $_SESSION["user_id"];
    $name = strtolower($_POST["name"]);
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM users WHERE `uid` = '$uid' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            $update_student = "UPDATE users SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `dob` = '$dob', `address` = '$address' WHERE `uid` = '$uid'";
        } else {
            $password = sha1($password);
            $update_student = "UPDATE users SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `dob` = '$dob', `address` = '$address', `password` = '$password' WHERE `uid` = '$uid'";
        }
        $response = mysqli_query($conn, $update_student) or die(mysqli_error($conn));
        header('Location: ../logout.php');
    } else {
        echo "There was some problem finding your account, contact account manager...";
    }
}

if (isset($_POST["update_teacher"])) {
    $uid = $_SESSION["user_id"];
    $name = strtolower($_POST["name"]);
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM users WHERE `uid` = '$uid' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            $update_student = "UPDATE users SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `address` = '$address' WHERE `uid` = '$uid'";
        } else {
            $password = sha1($password);
            $update_student = "UPDATE users SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `address` = '$address', `password` = '$password' WHERE `uid` = '$uid'";
        }
        $response = mysqli_query($conn, $update_student) or die(mysqli_error($conn));
        header('Location: ../logout.php');
    } else {
        echo "There was some problem finding your account, contact account manager...";
    }
}
?>