<?php
include("../config.php");

// api to add student : verified
if (isset($_POST["add_student"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $class_id = $_POST["class_id"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];

    $find_user = "SELECT * FROM students WHERE email = '$email' AND `active` = '1'";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Student already registered...";
    } else {
        $password = sha1($password);
        $date = date('Y-m-d');
        $add_student = "INSERT INTO students (`name`,`email`,`class_id`,`gender`,`phone`,`dob`,`address`,`password`,`doj`,`active`) VALUES ('$name','$email','$class_id','$gender','$phone','$dob','$address','$password','$date','1') ";
        $response = mysqli_query($conn, $add_student) or die(mysqli_error($conn));
        header('Location: admin.php');
    }
}


// api to add teacher : verified
if (isset($_POST["add_teacher"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $designation = strtolower($_POST["designation"]);
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM teachers WHERE `email` = '$email' AND `active` = '1'";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Teacher already registered...";
    } else {
        $password = sha1($password);
        $date = date('Y-m-d');
        $add_teacher = "INSERT INTO teachers (`name`,`email`,`gender`,`phone`,`designation`,`address`,`doj`,`password`,`active`) VALUES ('$name','$email','$gender','$phone','$designation','$address','$date','$password','1') ";
        $response = mysqli_query($conn, $add_teacher) or die(mysqli_error($conn));
        header('Location: admin.php');
    }
}


// api to add subject : verified
if (isset($_POST["add_subject"])) {
    $name = strtolower($_POST["name"]);
    $descr = strtolower($_POST["descr"]);
    $code = strtoupper($_POST["code"]);
    $credit = $_POST["credit"];
    $teacher_id = $_POST["teacher_id"];

    $find_subject = "SELECT * FROM subjects WHERE code = '$code' AND `active` = '1'";
    $response = mysqli_query($conn, $find_subject) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Subject already registered...";
    } else {
        $date = date('Y-m-d');
        $add_subject = "INSERT INTO subjects (`title`,`descr`,`code`,`credit`,`teacher_id`,`added_on`,`active`) VALUES ('$name','$descr','$code','$credit','$teacher_id','$date','1') ";
        $response = mysqli_query($conn, $add_subject) or die(mysqli_error($conn));
        header('Location: admin.php');
    }
}


// api to add announcement : verified
if (isset($_POST["add_announcement"])) {
    $name = strtolower($_POST["title"]);
    $descr = strtolower($_POST["descr"]);

    $find_announcement = "SELECT * FROM announcements WHERE title = '$name' AND `active` = '1'";
    $response = mysqli_query($conn, $find_announcement) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Announcement already announced...";
    } else {
        $date = date('Y-m-d');
        $add_announcement = "INSERT INTO announcements(`title`,`descr`,`added_on`,`active`) VALUES ('$name','$descr','$date','1') ";
        $response = mysqli_query($conn, $add_announcement) or die(mysqli_error($conn));
        header('Location: admin.php');
    }
}

// api to add class : verified
if (isset($_POST["add_class"])) {
    $standard = strtolower($_POST["standard"]);
    $subject_IDs = json_encode($_POST["subject_ids"]);

    $find_class = "SELECT * FROM classes WHERE `standard` = '$standard' ";
    $response = mysqli_query($conn, $find_class) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Class already added...";
    } else {
        $add_class = "INSERT INTO classes (`standard`,`subject_ids`,`active`) VALUES ('$standard', '$subject_IDs','1') ";
        $response = mysqli_query($conn, $add_class) or die(mysqli_error($conn));
        header('Location: admin.php');
    }
}
?>