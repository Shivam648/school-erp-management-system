<!-- Interface for updating attendance (accessible only to teacher) -->
<?php include("./apis/config.php"); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage | Admin</title>
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
        <!-- Header -->
        <?php include("./includes/header.php") ?>

        <section class="content align-items-center">
            <!-- Page accessible only to teacher -->
            <?php
            if ($_SESSION["user_category"] == "teacher") {

                if (!isset($_POST["class_id"])) {
                    echo "
                        <div class='card account custom-shadow mt-4 p-1'>
                            <h3 class='text-center'>Update Atendance</h3>
                            <hr>
                            <form class='card-body' method='POST' action='#!'>
                    ";

                    echo "
                        <div class='form-group'>
                            <label for=''>Standard:</label>
                            <select class='form-control' name='class_id'>
                    ";

                    include("./apis/get-all-classes.php");
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
                } else if (!isset($_POST["subject_id"])) {
                    $class_id = $_POST["class_id"];

                    echo "
                        <div class='card account custom-shadow mt-4 p-1'>
                            <h3 class='text-center'>Update Atendance</h3>
                            <hr>
                            <form class='card-body' method='POST' action='#!'>
                    ";

                    // get standard using class id
                    include("./apis/get-standard-using-classID.php");
                    echo "
                        <div class='form-group'>
                            <label for=''>Standard:</label>
                            <input type='text' class='form-control' name='standard' value='$standard' readonly required>
                            <input type='number' class='form-control' name='class_id' value='$class_id' readonly hidden>
                        </div>
                    ";

                    // get subject ids using class id
                    include("./apis/get-subjectIDs-using-classID.php");

                    // get subject codes using subject ids
                    include("./apis/get-codes-using-subjectIDs.php");

                    echo "
                        <div class='form-group'>
                            <label for=''>Subjects:</label>
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
                } else {
                    $class_id = $_POST["class_id"];
                    $subject_id = $_POST["subject_id"];

                    echo "
                        <div class='card account custom-shadow mt-4 p-1'>
                            <h3 class='text-center'>Update Atendance</h3>
                            <hr>
                            <form class='card-body' method='POST' action='#!'>
                    ";

                    // get standard using class id
                    include("./apis/get-standard-using-classID.php");
                    echo "
                        <div class='form-group'>
                            <label for=''>Standard:</label>
                            <input type='text' class='form-control' name='standard' value='$standard' readonly required>
                        </div>
                    ";

                    // get code using subject id
                    include("./apis/get-code-using-subjectID.php");

                    echo "
                        <div class='form-group'>
                            <label for=''>Subject:</label>
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
                    include("./apis/get-class-students.php");

                    if (sizeof($students) > 0) {
                        echo "
                            <form class='card-body' method='POST' action='./apis/update-attendance.php'>
                                <input type='number' class='form-control' name='class_id' value='$class_id' hidden>
                                <input type='number' class='form-control' name='subject_id' value='$subject_id' hidden>
                                <div class='table-responsive mt-5'>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Reg. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>D.O.J</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        ";

                        foreach ($students as $key => $value) {
                            $student_id = $value["student_id"];
                            $name = ucwords($value["name"]);
                            $email = $value["email"];
                            $phone = $value["phone"];
                            $address = ucwords($value["address"]);
                            $doj = $value["doj"];

                            echo "
                                <tr>
                                    <td>$student_id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$address</td>
                                    <td>$doj</td>
                                    <td>
                                        <label class='radio-inline pr-2'><input type='radio' name='attendance[$student_id]' value='1' required>Present</label>
                                        <label class='radio-inline pr-2'><input type='radio' name='attendance[$student_id]' value='0' required>Absent</label>
                                    </td>
                                </tr>
                            ";
                        }

                        echo "          </tbody>
                                    </table>
                                </div>
                                <div class='text-center mt-5'>
                                    <button type='submit' name='submit_attendance' class='btn btn-success w-50'>Submit Attendance</button>
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
            } else {
                include("./page-not-found.php");
            }
            ?>
        </section>
    </div>
</body>

</html>