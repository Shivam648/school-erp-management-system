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
        <?php
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
                                <a href="#!">Manage Student</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Teachers</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=teacher">Add Teacher</a>
                                <a href="#!">Manage Teacher</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Subjects</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=subject">Add Subject</a>
                                <a href="#!">Manage Subject</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Classes</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=class">Add Class</a>
                                <a href="#!">Manage Class</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown" style="float:left;">
                            <button class="btn text-primary">Announcements</button>
                            <div class="dropdown-content" style="left:0;">
                                <a href="./add.php?object=announcement">Add Announcements</a>
                                <a href="#!">Manage Announcements</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link text-primary" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        } else if ($_SESSION["user_category"] == "student") {
            echo '
                <ul class="navbar-nav text-center">
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Students</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Assignment</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Attendance</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Grades</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./profile.php">Profile</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        } else if ($_SESSION["user_category"] == "teacher") {
            echo '
                <ul class="navbar-nav text-center">
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Teachers</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Works</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Attendance</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#!">Grades</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./profile.php">Profile</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            ';
        } else {
            echo '
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="./login.php">Login</a>
                    </li>
                </ul>
            ';
        }
        ?>
    </div>
</nav>