<!-- Interface for analyzing attendance (accessible only to students) -->
<?php include("../config.php"); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics | Student</title>
    <!-- Latest compiled and minified CSS & JS or JQuery -->
    <link rel="stylesheet" href="../assets/css/base-styles.css">
    <?php include("../core-styles-scripts.html") ?>
</head>

<body>
    <div class="container-fluid">
        <!-- Page accessible only to students -->
        <?php
        if ($_SESSION["user_category"] == "student") {
            include("../includes/header.php");

            $student_id = $_SESSION["user_id"];
            $find_student = "SELECT * FROM students WHERE `student_id` = '$student_id' AND `active` = '1'";
            $response = mysqli_query($conn, $find_student) or die(mysqli_error($conn));
            $student = mysqli_fetch_array($response, MYSQLI_ASSOC);
            $class_id = $student["class_id"];

            // get standard using class id
            include("../info/standard-classID.php");

            echo '
                <section class="content text-center align-items-center">
                    <div class="d-flex justify-content-around flex-column flex-md-row">
            ';

            // get subject ids using class id
            include("../info/subjects-classID.php");

            // get subject codes using subject ids
            include("../info/codes-subjectIDs.php");

            for ($i = 0; $i < sizeof($subject_ids); $i++) {
                $subject_id = $subject_ids[$i];
                $code = $codes[$i];

                $find_student_subject_attendance = "SELECT * FROM attendance WHERE `student_id` = '$student_id' AND `class_id` = '$class_id' AND `subject_id` = '$subject_id'";
                $response = mysqli_query($conn, $find_student_subject_attendance) or die(mysqli_error($conn));

                if (mysqli_num_rows($response) == 1) {
                    echo "
                        <div class='w-100 p-2'>
                            <div class='small-box bg-info text-white p-3'>
                                <div class='inner'>
                                    <h2>$standard <strong> $code </strong></h2>
                    ";

                    $attendance_details = mysqli_fetch_array($response, MYSQLI_ASSOC);
                    $present = $attendance_details["present"];

                    // get term grades
                    include("../info/term-grades.php");

                    echo "<p> Total classes you attended : $present </p>";
                    echo "<p> Mid Term 1 (25) : $mid_term_1 </p>";
                    echo "<p> Mid Term 2 (25) : $mid_term_2 </p>";
                    echo "<p> End Term (25) : $end_term </p>";
                    echo "<p> Vivas + Assignments (25) : $other </p>";

                    echo "
                                </div>
                                <a href='#!' class='btn text-white'>More info</a>
                            </div>
                        </div>
                    ";
                }
            }

            echo '
                </section>
            ';
        } else {
            include("../page-not-found.php");
        }
        ?>
    </div>
</body>

</html>