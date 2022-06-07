<!-- Profile Page -->
<?php include("./apis/config.php"); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create | Admin</title>
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

        <?php
        if ($_SESSION["user_category"] == "admin") {
            $object = $_GET["object"];

            if ($object == "student") {
                echo "
                    <div class='card account custom-shadow mt-4 p-3'>
                        <h3 class='text-center'>Create {$object} account</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./apis/admin-add-daemon.php'>
                            <div class='form-group'>
                                <label for='name'>Full Name:</label>
                                <input type='text' class='form-control' name='name' placeholder='' required>
                            </div>

                            <div class='form-group'>
                                <label for='email'>Email:</label>
                                <input type='email' class='form-control' name='email' placeholder='' required>
                            </div>
                ";

                echo "
                    <div class='row'>
                    <div class='col'>
                        <div class='form-group'>
                            <label for='class'>Class:</label>
                            <select class='form-control' name='class_id' required>
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
                    </div>
                ";

                echo "
                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='gender'>Gender:</label>
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
                                        <label for='phone'>Phone:</label>
                                        <input type='number' class='form-control' name='phone' placeholder='' id='' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='dob'>D.O.B:</label>
                                        <input type='date' class='form-control' name='dob'>
                                    </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='address'>Address:</label>
                                        <textarea type='text' class='form-control' name='address' cols='6' rows='2' placeholder='' required></textarea>
                                    </div>
                                </div>
                                <div class='col'>
                                    <label for='password'>Password:</label>
                                    <input type='password' class='form-control' placeholder='' name='password' required>
                                </div>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_student' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            } elseif ($object == "teacher") {
                echo "
                    <div class='card account custom-shadow mt-4 p-3'>
                        <h3 class='text-center'>Create {$object} account</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./apis/admin-add-daemon.php'>
                            <div class='form-group'>
                                <label for='name'>Full Name:</label>
                                <input type='text' class='form-control' name='name' placeholder='' required>
                            </div>

                            <div class='form-group'>
                                <label for='email'>Email:</label>
                                <input type='email' class='form-control' name='email' placeholder='' required>
                            </div>
                ";

                echo "
                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label for=''>Subject:</label>
                                <select class='form-control' name='subject_id' required>
                ";

                include("./apis/get-all-subjects.php");
                foreach ($subjects as $key => $value) {
                    $subject_id = $value["subject_id"];
                    $code = $value["code"];
                    echo "
                        <option value='$subject_id'>$code</option>
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
                                        <label for='gender'>Gender:</label>
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
                                        <label for='phone'>Phone:</label>
                                        <input type='number' class='form-control' name='phone' placeholder='' id='' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='designation'>Designation:</label>
                                        <input type='designation' class='form-control' name='designation' placeholder='' required>
                                    </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='address'>Address:</label>
                                        <textarea type='text' class='form-control' name='address' cols='6' rows='2' placeholder='' required></textarea>
                                    </div>
                                </div>
                                <div class='col'>
                                    <label for='password'>Password:</label>
                                    <input type='password' class='form-control' placeholder='' name='password' required>
                                </div>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_teacher' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            } elseif ($object == "subject") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./apis/admin-add-daemon.php'>
                            <div class='form-group'>
                                <label for='name'>Subject Name:</label>
                                <input type='text' class='form-control' name='name' placeholder='' required>
                            </div>

                            <div class='form-group'>
                                <label for='descr'>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' placeholder='' required></textarea>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='code'>Code:</label>
                                        <input type='text' class='form-control' name='code' placeholder='' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label for='credit'>Credit:</label>
                                        <input type='number' class='form-control' name='credit' placeholder='' required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_subject' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            } elseif ($object == "class") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./apis/admin-add-daemon.php'>
                            <div class='form-group'>
                                <label for='standard'>Standard:</label>
                                <input type='text' class='form-control' name='standard' placeholder='' required>
                            </div>
                ";

                echo "
                    <div class='form-group'>
                    <label for=''>Subjects:</label> <br>
                ";

                include("./apis/get-all-subjects.php");
                foreach ($subjects as $key => $value) {
                    $subject_id = $value["subject_id"];
                    $code = $value["code"];
                    echo "
                        <label class='checkbox-inline pr-2'><input type='checkbox' name='subject_ids[]' value='$subject_id'>$code</label>
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
            } else if ($object == "announcement") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./apis/admin-add-daemon.php'>
                            <div class='form-group'>
                                <label for='name'>Announcement Title:</label>
                                <input type='text' class='form-control' name='title' placeholder='' required>
                            </div>

                            <div class='form-group'>
                                <label for='descr'>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' placeholder='' required></textarea>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_announcement' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            } else {
                include("./includes/page-not-found.php");
            }
        } else {
            include("./includes/page-not-found.php");
        }
        ?>
    </div>
</body>

</html>