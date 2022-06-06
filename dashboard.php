<?php include("./apis/config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
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

        <!-- card views -->
        <section class="content text-center align-items-center">
            <div class="d-flex justify-content-around flex-column flex-md-row">

                <div class="w-100 p-2">
                    <div class="small-box bg-info text-white p-3">
                        <div class="inner">
                            <h3>
                                <?php
                                $count_students_query = "SELECT * FROM users WHERE `category` = 'student' and `active` = '1' ";
                                $response = mysqli_query($conn, $count_students_query);
                                echo mysqli_num_rows($response);
                                ?>
                            </h3>
                            <p>Students Registrations</p>
                        </div>
                        <a href="#!" class="btn text-white">More info</a>
                    </div>
                </div>

                <div class="w-100 p-2">
                    <div class="small-box bg-success text-white p-3">
                        <div class="inner">
                            <h3>
                                <?php
                                $count_teachers_query = "SELECT * FROM users WHERE `category` = 'teacher'  and `active` = '1' ";
                                $response = mysqli_query($conn, $count_teachers_query);
                                echo mysqli_num_rows($response);
                                ?>
                            </h3>
                            <p>Teachers Registrations</p>
                        </div>
                        <a href="#!" class="btn text-white">More info</a>
                    </div>
                </div>

                <div class="w-100 p-2">
                    <div class="small-box bg-danger text-white p-3">
                        <div class="inner">
                            <h3>
                                <?php
                                $count_subjects_query = "SELECT * FROM subjects WHERE `active` = '1' ";
                                $response = mysqli_query($conn, $count_subjects_query);
                                echo mysqli_num_rows($response);
                                ?>
                            </h3>
                            <p>Subjects Added</p>
                        </div>
                        <a href="#!" class="btn text-white">More info</a>
                    </div>
                </div>

                <div class="w-100 p-2">
                    <div class="small-box bg-dark text-white p-3">
                        <div class="inner">
                            <h3>
                                <?php
                                $count_announcements_query = "SELECT * FROM announcements WHERE active = '1' ";
                                $response = mysqli_query($conn, $count_announcements_query);
                                echo mysqli_num_rows($response);
                                ?>
                            </h3>
                            <p>Active Announcements</p>
                        </div>
                        <a href="#!" class="btn text-white">More info</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
</body>
<!-- Add base scripts here -->
<script src="./assets/js/admin-script.js"></script>

</html>