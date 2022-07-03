<?php include("../config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <!-- Latest compiled and minified CSS & JS or JQuery -->
    <link rel="stylesheet" href="../assets/css/base-styles.css">
    <?php include("../core-styles-scripts.html") ?>
</head>

<body>
    <div class="container-fluid">
        <?php
        if ($_SESSION["user_category"] == "admin") {
            include("../includes/header.php");

            echo '
                <section class="content text-center align-items-center">
                    <div class="d-flex justify-content-around flex-column flex-md-row">
            ';

            echo '
                <div class="w-100 p-2">
                    <div class="small-box bg-info text-white p-3">
                        <div class="inner">
            ';

            include("../info/students.php");
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

            include("../info/teachers.php");
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

            include("../info/subjects.php");
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

            include("../info/announcements.php");
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

            include("../info/classes.php");
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
            include("../page-not-found.php");
        }
        ?>
    </div>
</body>

</html>