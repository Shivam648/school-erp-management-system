<?php include("../config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .row.content {
            height: 100vh
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">ERP Model</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="./admin.php">Dashboard</a></li>
                    <li><a href="./transport/schedules.php?query=manage">Transport</a></li>
                    <li><a href="./register-info.php?object=student">Add Student</a></li>
                    <li><a href="./registered-datasets.php?object=student">Manage Student</a></li>
                    <li><a href="./register-info.php?object=teacher">Add Teacher</a></li>
                    <li><a href="./registered-datasets.php?object=teacher">Manage Teacher</a></li>
                    <li><a href="./register-info.php?object=subject">Add Subject</a></li>
                    <li><a href="./registered-datasets.php?object=subject">Manage Subject</a></li>
                    <li><a href="./register-info.php?object=class">Add Class</a></li>
                    <li><a href="./registered-datasets.php?object=class">Manage Class</a></li>
                    <li><a href="./register-info.php?object=announcement">Add Annoucements</a></li>
                    <li><a href="./registered-datasets.php?object=announcement">Manage Annoucements</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav hidden-xs">
                <h4>ERP Model.</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="./admin.php">Dashboard</a></li>
                    <li><a href="./transport/schedules.php?query=manage">Transport</a></li>
                    <li><a href="./students.php?query=add">Add Student</a></li>
                    <li><a href="./students.php?query=manage">Manage Student</a></li>
                    <li><a href="./teachers.php?query=add">Add Teacher</a></li>
                    <li><a href="./teachers.php?query=manage">Manage Teacher</a></li>
                    <li><a href="./announcements.php?query=add">Add Announcements</a></li>
                    <li><a href="./announcements.php?query=manage">Manage Announcements</a></li>
                    <li><a href="./subjects.php?query=add">Add Subject</a></li>
                    <li><a href="./subjects.php?query=manage">Manage Subject</a></li>
                    <li><a href="./classes.php?query=add">Add Class</a></li>
                    <li><a href="./classes.php?query=manage">Manage Class</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-10">
                <div class="well">
                    <h4>Dashboard</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, laudantium. Hic suscipit modi, molestiae a veniam tenetur officiis nostrum. Doloribus praesentium dolorum culpa corporis qui quas magnam corrupti enim fugiat.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well">
                            <h4>Ongoing Academic Year</h4>
                            <p>01-06-22 to 01-06-23</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, eaque!</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h4>Ongoing Financial Year</h4>
                            <p>01-06-22 to 01-06-23</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, sequi!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Registered Students</h4>
                            <?php
                            include("../info/students.php");
                            $num_students = mysqli_num_rows($response);
                            echo "<p>$num_students</p>"
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Registered Teachers</h4>
                            <?php
                            include("../info/teachers.php");
                            $num_teachers = mysqli_num_rows($response);
                            echo "<p>$num_teachers</p>"
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Active Announcements</h4>
                            <?php
                            include("../info/announcements.php");
                            $num_announcements = mysqli_num_rows($response);
                            echo "<p>$num_announcements</p>"
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Active Drivers</h4>
                            <?php
                            include("./transport/apis/drivers.php");
                            $num_drivers = mysqli_num_rows($response);
                            echo "<p>$num_drivers</p>"
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Ongoing Sessions</h4>
                            <?php
                            include("../info/classes.php");
                            $num_classes = mysqli_num_rows($response);
                            echo "<p>$num_classes</p>"
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Transport Schedules</h4>
                            <p>2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>