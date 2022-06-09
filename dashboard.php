<!-- Dashbord page (accessible only to admin) -->
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
        <?php
        if ($_SESSION["user_category"] == "admin") {
            include("./includes/header.php");

            echo '
                    <section class="content text-center align-items-center">
                        <div class="d-flex justify-content-around flex-column flex-md-row">
                ';

            echo '
                            <div class="w-100 p-2">
                                <div class="small-box bg-info text-white p-3">
                                    <div class="inner">
                ';

            include("./apis/get-all-students.php");
            $num_students = mysqli_num_rows($response);
            echo "<h3> $num_students </h3>";

            echo '
                                <p>Students Enrolled</p>
                            </div>
                            <a href="#!" class="btn text-white">More info</a>
                        </div>
                    </div>
                ';
            echo '
                            <div class="w-100 p-2">
                                <div class="small-box bg-success text-white p-3">
                                    <div class="inner">
                ';

            include("./apis/get-all-teachers.php");
            $num_teachers = mysqli_num_rows($response);
            echo "<h3> $num_teachers </h3>";

            echo '
                                <p>Teachers Registrations</p>
                            </div>
                            <a href="#!" class="btn text-white">More info</a>
                        </div>
                    </div>
                ';
            echo '
                            <div class="w-100 p-2">
                                <div class="small-box bg-danger text-white p-3">
                                    <div class="inner">
                ';

            include("./apis/get-all-subjects.php");
            $num_subjects = mysqli_num_rows($response);
            echo "<h3> $num_subjects </h3>";

            echo '
                                <p>Subjects Added</p>
                            </div>
                            <a href="#!" class="btn text-white">More info</a>
                        </div>
                    </div>
                ';
            echo '
                            <div class="w-100 p-2">
                                <div class="small-box bg-secondary text-white p-3">
                                    <div class="inner">
                ';

            include("./apis/get-all-announcements.php");
            $active_announcements = mysqli_num_rows($response);
            echo "<h3> $active_announcements </h3>";

            echo '
                                <p>Active Announcements</p>
                            </div>
                            <a href="#!" class="btn text-white">More info</a>
                        </div>
                    </div>
                ';
            echo '
                            <div class="w-100 p-2">
                                <div class="small-box bg-dark text-white p-3">
                                    <div class="inner">
                ';

            include("./apis/get-all-classes.php");
            $num_classes = mysqli_num_rows($response);
            echo "<h3> $num_classes </h3>";

            echo '
                                <p>Active Classes</p>
                            </div>
                            <a href="#!" class="btn text-white">More info</a>
                        </div>
                    </div>
                ';


            echo '
                        </div>
                    </section>
                ';
        } else {
            include("./page-not-found.php");
        }
        ?>
    </div>
</body>

</html>