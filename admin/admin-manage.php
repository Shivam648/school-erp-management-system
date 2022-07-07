<?php


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