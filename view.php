<!-- Interface for registered data (accessible only to admin) -->
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
            <!-- Page accessible only to admin -->
            <?php
            if ($_SESSION["user_category"] == "admin") {
                $object = $_GET["object"];

                if ($object == "student") {
                    echo "
                        <div class='card account custom-shadow mt-4 p-1'>
                            <h3 class='text-center'>View {$object}</h3>
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
                                    <button type='submit' name='search_student' class='btn btn-outline-primary w-50'>SEARCH</button>
                                </div>
                            </form>
                        </div>
                    ";

                    if (isset($_POST["search_student"])) {
                        $class_id = $_POST["class_id"];

                        // get all students of a class
                        include("./apis/get-class-students.php");

                        if (mysqli_num_rows($response) > 0) {
                            echo "
                                <div class='table-responsive mt-3'>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Reg. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Standard</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>D.O.B</th>
                                                <th>D.O.J</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            ";

                            foreach ($students as $key => $value) {
                                $student_id = $value["student_id"];
                                $name = ucwords($value["name"]);
                                $email = $value["email"];
                                $class_id = $value["class_id"];
                                $phone = $value["phone"];
                                $gender = $value["gender"];
                                $address = ucwords($value["address"]);
                                $dob = $value["dob"];
                                $doj = $value["doj"];

                                // find standard using class id
                                include("./apis/get-standard-using-classID.php");

                                echo "
                                    <tr>
                                        <td>$student_id</td>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$standard</td>
                                        <td>$phone</td>
                                        <td>$gender</td>
                                        <td>$address</td>
                                        <td>$dob</td>
                                        <td>$doj</td>
                                    </tr>
                                ";
                            }


                            echo "      </tbody>
                                    </table>
                                </div>
                            ";
                        }
                    }
                } else if ($object == "teacher") {
                    echo "
                        <div class='table-responsive mt-3'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Reg. No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>D.O.J</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

                    include("./apis/get-all-teachers.php");
                    foreach ($teachers as $key => $value) {
                        $teacher_id = $value["teacher_id"];
                        $name = ucwords($value["name"]);
                        $email = $value["email"];
                        $designation = ucwords($value["designation"]);
                        $phone = $value["phone"];
                        $gender = $value["gender"];
                        $address = ucwords($value["address"]);
                        $doj = $value["doj"];

                        echo "
                            <tr>
                                <td>$teacher_id</td>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$designation</td>
                                <td>$phone</td>
                                <td>$gender</td>
                                <td>$address</td>
                                <td>$doj</td>
                            </tr>
                        ";
                    }

                    echo "  </tbody>
                        </table>
                    </div>
                    ";
                } else if ($object == "subject") {
                    echo "
                        <div class='table-responsive mt-3'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Subject Id</th>
                                        <th>Title</th>
                                        <th>Descr</th>
                                        <th>Code</th>
                                        <th>Credit</th>
                                        <th>Teacher</th>
                                        <th>Added On</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

                    include("./apis/get-all-subjects.php");
                    foreach ($subjects as $key => $value) {
                        $subject_id = $value["subject_id"];
                        $title = ucwords($value["title"]);
                        $descr = ucwords($value["descr"]);
                        $code = $value["code"];
                        $credit = $value["credit"];
                        $teacher_id = $value["teacher_id"];
                        $added_on = $value["added_on"];

                        // get teacher name using teacher id
                        include("./apis/get-teacher-name-using-teacherID.php");

                        echo "
                            <tr>
                                <td>$subject_id</td>
                                <td>$title</td>
                                <td>$descr</td>
                                <td>$code</td>
                                <td>$credit</td>
                                <td>$teacher_name</td>
                                <td>$added_on</td>
                            </tr>
                        ";
                    }

                    echo "      </tbody>
                            </table>
                        </div>
                    ";
                } else if ($object == "class") {
                    echo "
                        <div class='table-responsive mt-3'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Class Id</th>
                                        <th>Standard</th>
                                        <th>Subjects</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

                    include("./apis/get-all-classes.php");
                    foreach ($classes as $key => $value) {
                        $class_id = $value["class_id"];
                        $standard = ucwords($value["standard"]);
                        $subject_ids = json_decode($value["subject_ids"]);

                        $codes = array();
                        for ($i = 0; $i < sizeof($subject_ids); $i++) {
                            $subject_id = $subject_ids[$i];

                            // find subject code using subject id
                            include("./apis/get-code-using-subjectID.php");
                            array_push($codes, $code);
                        }
                        $codes = json_encode($codes);

                        echo "
                            <tr>
                                <td>$class_id</td>
                                <td>$standard</td>
                                <td>$codes</td>
                            </tr>
                        ";
                    }

                    echo "      </tbody>
                            </table>
                        </div>
                    ";
                } else if ($object == "announcement") {
                    echo "
                        <div class='table-responsive mt-3'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Announcement Id</th>
                                        <th>Title</th>
                                        <th>Descr</th>
                                        <th>Added On</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

                    include("./apis//get-all-announcements.php");
                    foreach ($announcements as $key => $value) {
                        $aid = $value["aid"];
                        $title = ucwords($value["title"]);
                        $descr = ucwords($value["descr"]);
                        $added_on = $value["added_on"];
                        $active = $value["active"];

                        echo "
                            <tr>
                                <td>$aid</td>
                                <td>$title</td>
                                <td>$descr</td>
                                <td>$added_on</td>
                                <td>$active</td>
                            </tr>
                        ";
                    }

                    echo "      </tbody>
                            </table>
                        </div>
                    ";
                } else {
                    include("./page-not-found.php");
                }
            } else {
                include("./page-not-found.php");
            }
            ?>
        </section>
    </div>
</body>

</html>