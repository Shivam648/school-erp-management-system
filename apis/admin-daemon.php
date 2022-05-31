<!-- Write here all the api requests for admin -->
<?php
include("config.php");

if (isset($_POST["add_student"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $class = $_POST["class"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM students WHERE email = '$email' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Student already registered...";
    } else {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $password = sha1($password);
            $add_student = "INSERT INTO students (`name`,`email`,`class`,`gender`,`phone`,`dob`,`address`,`password`) VALUES ('$name','$email','$class','$gender','$phone','$dob','$address','$password') ";
            $response = mysqli_query($conn, $add_student) or die(mysqli_error($conn));
            header('Location: ../admin.php');
        }
    }
}

if (isset($_POST["add_teacher"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $code = $_POST["code"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $designation = strtolower($_POST["designation"]);
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM teachers WHERE email = '$email' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Teacher already registered...";
    } else {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $password = sha1($password);
            $date = date('Y-m-d');
            $add_teacher = "INSERT INTO teachers (`name`,`email`,`subjects`,`gender`,`phone`,`designation`,`address`,`joining_date`,`password`) VALUES ('$name','$email','$code','$gender','$phone','$designation','$address','$date','$password') ";
            $response = mysqli_query($conn, $add_teacher) or die(mysqli_error($conn));
            header('Location: ../admin.php');
        }
    }
}

if (isset($_POST["add_subject"])) {
    $name = strtolower($_POST["name"]);
    $descr = strtolower($_POST["descr"]);
    $code = strtoupper($_POST["code"]);
    $credit = $_POST["credit"];

    $find_subject = "SELECT * FROM subjects WHERE code = '$code' ";
    $response = mysqli_query($conn, $find_subject) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Subject already registered...";
    } else {
        $date = date('Y-m-d');
        $add_subject = "INSERT INTO subjects (`title`,`descr`,`code`,`credit`,`added_on`) VALUES ('$name','$descr','$code','$credit','$date') ";
        $response = mysqli_query($conn, $add_subject) or die(mysqli_error($conn));
        header('Location: ../admin.php');
    }
}
?>