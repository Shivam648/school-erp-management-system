<!-- Add Page -->
<?php include("../config.php"); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add | Create</title>
    <!-- Add core styles here -->
    <link rel="stylesheet" href="../assets/css/base-styles.css">
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
        <!-- Page accessible only to admin -->
        <?php
        if ($_SESSION["user_category"] == "admin") {
            include("../includes/header.php");
            $object = $_GET["object"];

            if ($object == "student") {
                echo "
                    <div class='card account custom-shadow mt-4 p-3'>
                        <h3 class='text-center'>Create {$object} account</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Full Name:</label>
                                <input type='text' class='form-control' name='name' required>
                            </div>

                            <div class='form-group'>
                                <label>Email:</label>
                                <input type='email' class='form-control' name='email' required>
                            </div>
                ";

                echo "
                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label>Class:</label>
                                <select class='form-control' name='class_id' required>
                ";

                // assign a class to the student
                include("../info/classes.php");
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
                    </div>
                ";

                echo "
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Gender:</label>
                                        <select class='form-control' name='gender' required>
                                            <option value='male'>Male</option>
                                            <option value='female'>Female</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Phone:</label>
                                        <input type='number' class='form-control' name='phone' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label>D.O.B:</label>
                                        <input type='date' class='form-control' name='dob'>
                                    </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Address:</label>
                                        <textarea type='text' class='form-control' name='address' cols='6' rows='2' required></textarea>
                                    </div>
                                </div>
                                <div class='col'>
                                    <label>Password:</label>
                                    <input type='password' class='form-control'name='password' required>
                                </div>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_student' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "teacher") {
                echo "
                    <div class='card account custom-shadow mt-4 p-3'>
                        <h3 class='text-center'>Create {$object} account</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Full Name:</label>
                                <input type='text' class='form-control' name='name' required>
                            </div>

                            <div class='form-group'>
                                <label>Email:</label>
                                <input type='email' class='form-control' name='email' required>
                            </div>
                ";

                echo "      <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Gender:</label>
                                        <select class='form-control' name='gender' required>
                                            <option value='male'>Male</option>
                                            <option value='female'>Female</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Phone:</label>
                                        <input type='number' class='form-control' name='phone' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Designation:</label>
                                        <input type='designation' class='form-control' name='designation' required>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Address:</label>
                                        <textarea type='text' class='form-control' name='address' cols='6' rows='2' required></textarea>
                                    </div>
                                </div>
                                <div class='col'>
                                    <label>Password:</label>
                                    <input type='password' class='form-control' name='password' required>
                                </div>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_teacher' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "subject") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Subject Name:</label>
                                <input type='text' class='form-control' name='name' required>
                            </div>

                            <div class='form-group'>
                                <label>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' required></textarea>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Code:</label>
                                        <input type='text' class='form-control' name='code' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Credit:</label>
                                        <input type='number' class='form-control' name='credit' required>
                                    </div>
                                </div>
                            </div>
                ";

                echo "
                    <div class='form-group'>
                        <label>Assign Teacher:</label>
                        <select class='form-control' name='teacher_id' required>
                ";

                include("../info/teachers.php");
                foreach ($teachers as $key => $value) {
                    $teacher_id = $value["teacher_id"];
                    $name = ucwords($value["name"]);
                    echo "
                        <option value='$teacher_id'>$name</option>
                    ";
                }


                echo "
                        </select>
                    </div>
                ";

                echo "
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_subject' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "class") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Standard:</label>
                                <input type='text' class='form-control' name='standard' required>
                            </div>
                ";

                echo "
                    <div class='form-group'>
                    <label>Add Subjects:</label> <br>
                ";

                // add subjects to be taught within the class
                include("../info/subjects.php");
                foreach ($subjects as $key => $value) {
                    $subject_id = $value["subject_id"];
                    $code = $value["code"];
                    echo "
                        <label class='checkbox-inline pr-2'><input type='checkbox' name='subject_ids[]' value=$subject_id>$code</label>
                    ";
                }

                echo "</div>";
                echo "
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_class' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "announcement") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Announcement Title:</label>
                                <input type='text' class='form-control' name='title' required>
                            </div>

                            <div class='form-group'>
                                <label>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' required></textarea>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_announcement' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }
        } else {
            include("../page-not-found.php");
        }
        ?>
    </div>
</body>


</html>