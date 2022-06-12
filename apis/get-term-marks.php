<!-- API to find term marks using studentID, classID and subjectID -->
<?php
include("./apis/config.php");
$find_marks = "SELECT * FROM grades WHERE `student_id` = '$student_id' AND `class_id` = '$class_id' AND `subject_id` = '$subject_id'";
$response = mysqli_query($conn, $find_marks) or die(mysqli_errno($conn));
if (mysqli_num_rows($response) == 0) {
    $mid_term_1 = $mid_term_2 = $end_term = $other = 0;
} else {
    $marks = mysqli_fetch_array($response, MYSQLI_ASSOC);
    $mid_term_1 = $marks["mid_term_1"];
    $mid_term_2 = $marks["mid_term_2"];
    $end_term = $marks["end_term"];
    $other = $marks["other"];
}
