<!-- Write all api requests for admin -->
<?php
include("config.php");

// api to add a new student
if (isset($_POST["add_student"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $class_id = $_POST["class_id"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];

    $find_user = "SELECT * FROM users WHERE email = '$email' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "User already registered...";
    } else {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $password = sha1($password);
            $date = date('Y-m-d');
            $add_student = "INSERT INTO users (`name`,`email`,`class_id`,`gender`,`phone`,`category`,`dob`,`address`,`password`,`joining_date`) VALUES ('$name','$email','$class_id','$gender','$phone','student','$dob','$address','$password','$date') ";
            $response = mysqli_query($conn, $add_student) or die(mysqli_error($conn));
            header('Location: ../dashboard.php');
        }
    }
}


// api to add a new teacher
if (isset($_POST["add_teacher"])) {
    $name = strtolower($_POST["name"]);
    $email = $_POST["email"];
    $subject_id = $_POST["subject_id"];
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $designation = strtolower($_POST["designation"]);
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_user = "SELECT * FROM users WHERE email = '$email' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Teacher already registered...";
    } else {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $password = sha1($password);
            $date = date('Y-m-d');
            $add_teacher = "INSERT INTO users (`name`,`email`,`subject_id`,`gender`,`phone`,`category`,`designation`,`address`,`joining_date`,`password`) VALUES ('$name','$email','$subject_id','$gender','$phone','teacher','$designation','$address','$date','$password') ";
            $response = mysqli_query($conn, $add_teacher) or die(mysqli_error($conn));
            header('Location: ../dashboard.php');
        }
    }
}


// api to add a new subject
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
        header('Location: ../dashboard.php');
    }
}


// api to add a new announcement
if (isset($_POST["add_announcement"])) {
    $name = strtolower($_POST["title"]);
    $descr = strtolower($_POST["descr"]);

    $find_announcement = "SELECT * FROM announcements WHERE title = '$name' ";
    $response = mysqli_query($conn, $find_announcement) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Announcement already announced...";
    } else {
        $date = date('Y-m-d');
        $add_announcement = "INSERT INTO announcements(`title`,`descr`,`added_on`) VALUES ('$name','$descr','$date') ";
        $response = mysqli_query($conn, $add_announcement) or die(mysqli_error($conn));
        header('Location: ../dashboard.php');
    }
}

// api to add a new class
if (isset($_POST["add_class"])) {
    $standard = strtolower($_POST["standard"]);
    $subject_IDs = json_encode($_POST["subject_ids"]);

    $find_class = "SELECT * FROM classes WHERE `standard` = '$standard' ";
    $response = mysqli_query($conn, $find_class) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        echo "Class already announced...";
    } else {
        $add_class = "INSERT INTO classes (`standard`,`subject_ids`) VALUES ('$standard', '$subject_IDs') ";
        $response = mysqli_query($conn, $add_class) or die(mysqli_error($conn));
        header('Location: ../dashboard.php');
    }
}
?>