<nav class="navbar navbar-expand-md">
    <!-- Logo -->
    <p class="text-primary"><a class="navbar-brand" href="../../index.php">Logo.</a></p>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <i class="fa fa-bars text-primary" aria-hidden="true"></i>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <!-- Customized Headers for different users -->
        <ul class="navbar-nav text-center">
            <li class="nav-item p-2">
                <a class="nav-link" href="../../admin/admin.php">Dashboard</a>
            </li>
            <li class="nav-item p-2">
                <a class="nav-link" href="../../admin/transport/transport.php">Transport</a>
            </li>
            <li class="nav-item p-2">
                <div class="dropdown" style="float:left;">
                    <button class="btn text-primary">Vehicles</button>
                    <div class="dropdown-content" style="left:0;">
                        <a href="../../admin/transport/vehicles.php?query=add">Add vehicle</a>
                        <a href="../../admin/transport/vehicles.php?query=manage">Manage Vehicles</a>
                    </div>
                </div>
            </li>
            <li class="nav-item p-2">
                <div class="dropdown" style="float:left;">
                    <button class="btn text-primary">Drivers</button>
                    <div class="dropdown-content" style="left:0;">
                        <a href="../../admin/transport/drivers.php?query=add">Add driver</a>
                        <a href="../../admin/transport/drivers.php?query=manage">Manage drivers</a>
                    </div>
                </div>
            </li>
            <li class="nav-item p-2">
                <div class="dropdown" style="float:left;">
                    <button class="btn text-primary">Routes</button>
                    <div class="dropdown-content" style="left:0;">
                        <a href="../../admin/transport/routes.php?query=add">Add route</a>
                        <a href="../../admin/transport/routes.php?query=manage">Manage routes</a>
                    </div>
                </div>
            </li>
            <li class="nav-item p-2">
                <div class="dropdown" style="float:left;">
                    <button class="btn text-primary">Schedules</button>
                    <div class="dropdown-content" style="left:0;">
                        <a href="../../admin/transport/schedules.php?query=add">Add schedule</a>
                        <a href="../../admin/transport/schedules.php?query=manage">Manage schedules</a>
                    </div>
                </div>
            </li>
            <li class="nav-item p-2">
                <a class="nav-link text-primary" href="../../logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>