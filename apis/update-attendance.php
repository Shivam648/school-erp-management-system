<?php
include("config.php");

// api to update attendance : verified
if (isset($_POST["submit_attendance"])) {
    $class_id = $_POST["class_id"];
    $subject_id = $_POST["subject_id"];
    $student_id_status = $_POST["attendance"];

    foreach ($student_id_status as $student_id => $status) {
        $attendance = "SELECT * FROM attendance WHERE `student_id` = '$student_id' AND `class_id` = '$class_id' AND `subject_id` = '$subject_id'";
        $response = mysqli_query($conn, $attendance) or die(mysqli_error($conn));
        $attendance_details = mysqli_fetch_array($response, MYSQLI_ASSOC);

        if (mysqli_num_rows($response) == 0) {
            if ($status == 1) {
                $insert = "INSERT INTO attendance (`student_id`, `class_id`, `subject_id`, `present`, `absent`, `total`) VALUES ('$student_id', '$class_id', '$subject_id', '1','0','1')";
            } else {
                $insert = "INSERT INTO attendance (`student_id`, `class_id`, `subject_id`, `present`, `absent`, `total`) VALUES ('$student_id', '$class_id', '$subject_id', '0','1','1')";
            }
            $response = mysqli_query($conn, $insert) or die(mysqli_error($conn));
        } else {
            $total = $attendance_details["total"] + 1;

            if ($status == 1) {
                $present = $attendance_details["present"] + 1;
                $update = "UPDATE attendance SET `present` = '$present', `total` = '$total' WHERE `student_id` = '$student_id' AND `class_id` = '$class_id' AND `subject_id` = '$subject_id'";
            } else {
                $absent = $attendance_details["absent"] + 1;
                $update = "UPDATE attendance SET `absent` = '$absent', `total` = '$total' WHERE `student_id` = '$student_id' AND `class_id` = '$class_id' AND `subject_id` = '$subject_id'";
            }
            $response = mysqli_query($conn, $update) or die(mysqli_error($conn));
        }
    }
    header('Location: ../index.php');
}
