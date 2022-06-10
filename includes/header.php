<?php include("./apis/config.php") ?>
<nav class="navbar navbar-expand-md">
    <!-- Logo -->
    <p class="text-primary"><a class="navbar-brand" href="../index.php">Logo.</a></p>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <i class="fa fa-bars text-primary" aria-hidden="true"></i>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <!-- Customized Headers for different users -->
        <?php

        if ($_SESSION["user_category"] == "guest") {
            echo '
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="./login.php">Login</a>
                    </li>
                </ul>
            ';
        }

        if ($_SESSION["user_category"] == "admin") {
            echo '
                <ul class="navbar-nav text-center">
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Students</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=student">Add Student</a>
                                <a href="./view.php?object=student">Manage Student</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Teachers</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=teacher">Add Teacher</a>
                                <a href="./view.php?object=teacher">Manage Teacher</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Subjects</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=subject">Add Subject</a>
                                <a href="./view.php?object=subject">Manage Subject</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Classes</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=class">Add Class</a>
                                <a href="./view.php?object=class">Manage Class</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Announcements</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=announcement">Add Announcements</a>
                                <a href="./view.php?object=announcement">Manage Announcements</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link text-primary" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        }

        if ($_SESSION["user_category"] == "student") {
            echo '
                <ul class="navbar-nav text-center">
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./view_attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./profile.php">Profile</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        }

        if ($_SESSION["user_category"] == "teacher") {
            echo '
                <ul class="navbar-nav text-center">
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./profile.php">Profile</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        }
        ?>
    </div>
</nav>