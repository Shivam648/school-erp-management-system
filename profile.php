<!-- Profile Page -->
<?php include('./apis/config.php'); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | ICT Commercial</title>
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
        <?php include('./includes/header.php') ?>
        <?php
        if ($_SESSION["user_category"] != "guest") {
            $uid = $_SESSION['user_id'];

            $get_user_details = "SELECT * FROM users WHERE uid ='$uid' ";
            $response = mysqli_query($conn, $get_user_details) or die(mysqli_error($conn));
            $user_details = mysqli_fetch_array($response, MYSQLI_ASSOC);

            $name = ucwords($user_details["name"]);
            $email = $user_details["email"];
            $category = $user_details["category"];
            $phone = $user_details["phone"];
            $address = ucwords($user_details["address"]);
            $gender_dropdown = "<select class='form-control' name='gender' required>";
            if ($user_details["gender"] == "male") {
                $gender_dropdown .= "<option value='male' selected>Male</option>";
                $gender_dropdown .= "<option value='female'>Female</option>";
                $gender_dropdown .= "<option value='other'>Other</option>";
            } else if ($user_details["gender"] == "female") {
                $gender_dropdown .= "<option value='male'>Male</option>";
                $gender_dropdown .= "<option value='female' selected>Female</option>";
                $gender_dropdown .= "<option value='other'>Other</option>";
            } else {
                $gender_dropdown .= "<option value='male'>Male</option>";
                $gender_dropdown .= "<option value='female'>Female</option>";
                $gender_dropdown .= "<option value='other' selected>Other</option>";
            }
            $gender_dropdown .= "</select>";

            echo "
                <div class='card account custom-shadow mt-4 p-3'>
                    <h3 class='text-center'>Edit Profile</h3> 
                    <hr>
                    <form class='card-body' method='POST' action='./apis/account-daemon.php'>
                        <div class='form-group'>
                            <label for='name'>Name:</label>
                            <input type='text' class='form-control' name='name' value='$name' required>
                        </div>

                        <div class='form-group'>
                            <label for='email'>Email:</label>
                            <input type='email' class='form-control' name='email' value='$email' readonly required>
                        </div>
            ";

            if ($category == "student") {
                $dob = $user_details["dob"];
                $class = $user_details["class"];
                echo "
                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label for='class'>Class:</label>
                                <input type='number' class='form-control' name='class' value='$class' readonly required>
                            </div>
                        </div>

                        <div class='col'>
                            <div class='form-group'>
                                <label for='gender'>Gender:</label>
                                $gender_dropdown
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label for='phone'>Phone:</label>
                                <input type='number' class='form-control' name='phone' value='$phone' required>
                            </div>
                        </div>

                        <div class='col'>
                            <div class='form-group'>
                                <label for='dob'>D.O.B:</label>
                                <input type='date' class='form-control' name='dob' value='$dob' required>
                            </div>
                        </div>
                    </div>
                ";
            }

            if ($category == "teacher") {
                $subjects = $user_details["subjects"];
                $designation = ucwords($user_details["designation"]);
                $doj = $user_details["joining_date"];
                echo "
                    <div class='form-group'>
                        <label for=''>Designation:</label>
                        <input type='text' class='form-control' name='designation' value='$designation' readonly required>
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label for=''>Subjects:</label>
                                <input type='text' class='form-control' name='subjects' value='$subjects' readonly>
                            </div>
                        </div>

                        <div class='col'>
                            <div class='form-group'>
                                <label for='gender'>Gender:</label>
                                $gender_dropdown
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <div class='form-group'>
                                <label for='phone'>Phone:</label>
                                <input type='number' class='form-control' name='phone' value='$phone' required>
                            </div>
                        </div>

                        <div class='col'>
                            <div class='form-group'>
                                <label for=''>D.O.J:</label>
                                <input type='date' class='form-control' name='doj' value='$doj' readonly>
                            </div>
                        </div>
                     </div>
                ";
            }

            echo "
                    <div class='row'>
                    <div class='col'>
                        <div class='form-group'>
                            <label for='address'>Address:</label>
                            <textarea type='text' class='form-control' name='address' cols='6' rows='2' required>$address</textarea>
                        </div>
                    </div>
                    <div class='col'>
                        <label for='password'>Password:</label>
                        <input type='password' class='form-control' placeholder='' name='password'>
                    </div>
                </div>
                
                        <br>
                        <div class='text-center'>
                            <button type='submit' name='update_$category' class='btn btn-outline-primary w-50'>UPDATE</button>
                        </div>
                    </form>
                </div>
            ";
        } else {
            include('./page-not-found.php');
        }
        ?>
    </div>
</body>

</html>