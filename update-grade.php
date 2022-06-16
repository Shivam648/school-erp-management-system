<!-- Interface for updating grade (accessible only to teacher) -->
<?php include("./apis/config.php"); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade | Teacher</title>
    <!-- Add core styles here -->
    <link rel="stylesheet" href="./assets/css/base-styles.css">
    <!-- Latest compiled and minified CSS & JS or JQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Page accessible only to teacher -->
        <?php
        if ($_SESSION["user_category"] == "teacher") {
            include("./includes/header.php");

            echo '
                <section class="content align-items-center">
            ';

            if (!isset($_POST["class_id"])) {
                echo "
                    <div class='card account custom-shadow mt-4 p-1'>
                        <h3 class='text-center'>Update Grade</h3>
                        <hr>
                        <form class='card-body' method='POST' action='#!'>
                ";

                echo "
                    <div class='form-group'>
                        <label>Standard:</label>
                        <select class='form-control' name='class_id'>
                ";

                // select a standard
                include("./get-data/classes.php");
                foreach ($classes as $key => $value) {
                    $class_id = $value["class_id"];
                    $standard = ucwords($value["standard"]);
                    echo "
                        <option value='$class_id'>$standard</option>
                    ";
                }

                echo "
                        </select>
                    </div>
                ";

                echo "
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='search_subjects' class='btn btn-outline-primary w-50'>Search Subjects</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if (isset($_POST["class_id"]) && !isset($_POST["subject_id"])) {
                $class_id = $_POST["class_id"];

                echo "
                        <div class='card account custom-shadow mt-4 p-1'>
                            <h3 class='text-center'>Update Grade</h3>
                            <hr>
                            <form class='card-body' method='POST' action='#!'>
                    ";

                // get standard using class id
                include("./get-data/standard-classID.php");
                echo "
                        <div class='form-group'>
                            <label>Standard:</label>
                            <input type='text' class='form-control' name='standard' value='$standard' readonly required>
                            <input type='number' class='form-control' name='class_id' value='$class_id' readonly hidden>
                        </div>
                    ";

                // get subject ids using class id
                include("./get-data/subjects-classID.php");

                // filter subject ids to which access is given
                $teacher_id = $_SESSION["user_id"];
                $iters = sizeof($subject_ids);
                $filtered = array();
                for ($i = 0; $i < $iters; $i++) {
                    $subject_id = $subject_ids[$i];
                    $find = "SELECT * FROM subjects WHERE `subject_id` = '$subject_id' AND `teacher_id` = '$teacher_id'";
                    $response = mysqli_query($conn, $find) or die(mysqli_error($conn));
                    if (mysqli_num_rows($response) == 1) {
                        array_push($filtered, $subject_id);
                    }
                }
                $subject_ids = $filtered;

                if (sizeof($subject_ids) == 0) {
                    echo "
                            <div class='text-center mt-4'>
                                <h3>No subjects assigned to you.</h3>
                            </div>
                        ";
                } else {
                    // get subject codes using subject ids
                    include("./get-data/codes-subjectIDs.php");

                    echo "
                        <div class='form-group'>
                            <label>Subjects assigned to you:</label>
                            <select class='form-control' name='subject_id'>
                    ";

                    for ($i = 0; $i < sizeof($codes); $i++) {
                        $subject_id = $subject_ids[$i];
                        $subject_code = $codes[$i];

                        echo "
                            <option value='$subject_id'>$subject_code</option>
                        ";
                    }

                    echo "
                            </select>
                        </div>
                    ";

                    echo "
                            <div class='text-center'>
                                <button type='submit' name='search_students' class='btn btn-outline-primary w-50'>Search Students</button>
                            </div>
                            </form>
                        </div>
                    ";
                }
            }

            if (isset($_POST["class_id"]) && isset($_POST["subject_id"])) {
                $class_id = $_POST["class_id"];
                $subject_id = $_POST["subject_id"];

                echo "
                    <div class='card account custom-shadow mt-4 p-1'>
                        <h3 class='text-center'>Update Grade</h3>
                        <hr>
                        <form class='card-body' method='POST' action='#!'>
                ";

                // get standard using class id
                include("./get-data/standard-classID.php");
                echo "
                    <div class='form-group'>
                        <label>Standard:</label>
                        <input type='text' class='form-control' name='standard' value='$standard' readonly required>
                    </div>
                ";

                // get code using subject id
                include("./get-data/code-subjectID.php");

                echo "
                    <div class='form-group'>
                        <label>Subject:</label>
                        <input type='text' class='form-control' name='code' value='$code' readonly required>
                    </div>
                ";

                echo "
                        <div class='text-center'>
                            <button type='submit' name='search_students' class='btn btn-outline-primary w-50' disabled>Search Students</button>
                        </div>
                    </form>
                </div>
                ";

                // get all students of a class using class id
                include("./get-data/students-classID.php");
                $total_students = sizeof($students);
                if ($total_students > 0) {
                    echo "
                            <form class='card-body' method='POST' action='./apis/update-grade.php'>
                                <input type='number' class='form-control' name='class_id' value='$class_id' hidden>
                                <input type='number' class='form-control' name='subject_id' value='$subject_id' hidden>
                                <div class='table-responsive mt-5'>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Reg. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mid Term 1 Marks</th>
                                                <th>Mid Term 2 Marks</th>
                                                <th>End Term Marks</th>
                                                <th>Other (Viva + Assignments) Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        ";

                    foreach ($students as $key => $value) {
                        $student_id = $value["student_id"];
                        $name = ucwords($value["name"]);
                        $email = $value["email"];

                        // get term marks previously added
                        include("./get-data/term-grades.php");

                        echo "
                                <tr>
                                    <td>$student_id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td><input type='number' name='mid_term_1[$student_id]' min='0' value='$mid_term_1'></td>
                                    <td><input type='number' name='mid_term_2[$student_id]' min='0' value='$mid_term_2'></td>
                                    <td><input type='number' name='end_term[$student_id]' min='0' value='$end_term'></td>
                                    <td><input type='number' name='other[$student_id]' min='0' value='$other'></td>
                                </tr>
                            ";
                    }

                    echo "          </tbody>
                                    </table>
                                </div>
                                <div class='text-center mt-5'>
                                    <button type='submit' name='submit_grade' class='btn btn-success w-50'>Submit Grade</button>
                                </div>
                            </form>
                        ";
                } else {
                    echo "
                            <div class='text-center mt-4'>
                                <h3>No students registered yet.</h3>
                            </div>
                        ";
                }
            }

            echo '
                </section>
            ';
        } else {
            include("page-not-found.php");
        }
        ?>
    </div>
</body>

</html>