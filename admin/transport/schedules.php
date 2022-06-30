<?php include("../../config.php") ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Schedules | Admin</title>
		<!-- Add core styles here -->
		<link rel="stylesheet" href="../../assets/css/base-styles.css">
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
			if($_SESSION["user_category"] == "admin"){
				include('./t-header.php');

				$query = $_GET["query"];
				if($query == "add"){
					include("./apis/vehicles.php");

					$vehicles_dropdown = "<select class='form-control' name='vehicle_id' required>";
					foreach ($vehicles as $key => $value) {
						$vehicle_id = $value["vehicle_id"];
						$vehicle_number = ucwords($value["vehicle_number"]);
						$vehicles_dropdown .= "<option value='$vehicle_id'>$vehicle_number</option>";
					}
					$vehicles_dropdown .="</select>";

					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Create Schedule</h3>
							<hr>
							<form class='card-body' method='POST' action='./apis/add-schedule.php'>
								<div class='form-group'>
									<label>Select Vehicle:</label>
									$vehicles_dropdown
								</div>

								<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Departure time:</label>
											<input type='time' class='form-control' name='departure' required>
										</div>
									</div>

									<div class='col'>
										<div class='form-group'>
											<label>Arrival time:</label>
											<input type='time' class='form-control' name='arrival' required>
										</div>
									</div>
								</div>
					";

					include("./apis/routes.php");
					$routes_dropdown = "<select class='form-control' name='route_id' required>";
					foreach ($routes as $key => $value) {
						$route_id = $value["route_id"];
						$start = ucwords($value["start"]);
						$finish = ucwords($value["finish"]);
						$routes_dropdown .= "<option value='$route_id'>From $start to $finish</option>";
					}
					$routes_dropdown .="</select>";

					echo "
								<div class='form-group'>
									<label>Select Round Trip:</label>
									$routes_dropdown
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='add_schedule' class='btn btn-outline-primary w-50'>ADD</button>
								</div>
							</form>
						</div>
					";
				}

				if($query == "manage"){
					echo "
                        <div class='table-responsive mt-3'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Schedule Id</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Arrival Time</th>
                                        <th>Departure Time</th>
                                        <th>Route</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

					include("./apis/schedules.php");

                    foreach ($schedules as $key => $value) {
                        $schedule_id = $value["schedule_id"];
                        $arrival = $value["arrival"];
                        $departure = $value["departure"];

                        $vehicle_id = $value["vehicle_id"];
                        $route_id = $value["route_id"];
						$status = $value["active"] == 1 ? "Active" : "Inactive";

						include("./apis/vehicle.php");
						$vehicle_type = ucwords($vehicle["vehicle_type"]);
						$vehicle_number = ucwords($vehicle["vehicle_number"]);

						include("./apis/route.php");
						$start = ucwords($route["start"]);
						$finish = ucwords($route["finish"]);
						$route_value = "From ". $start . " to ". $finish;

                        echo "
                            	<tr>
                                    <td>$schedule_id</td>
                                    <td>$vehicle_type</td>
                                    <td>$vehicle_number</td>
                                    <td>$arrival</td>
                                    <td>$departure</td>
                                    <td>$route_value</td>
                                    <td>$status</td>
									<td>
										<a href='apis/delete-schedule.php?schedule_id=$schedule_id' class='text-danger pr-2'>Delete</a>
										<a href='schedules.php?query=update&schedule_id=$schedule_id' class='text-primary'>Update</a>
									</td>
                                </tr>
                            ";
                    }

                    echo "      	</tbody>
                                </table>
                            </div>
                    ";
				}

				if($query == "update"){
					$schedule_id = $_GET["schedule_id"];

					// fetch driver details using driver id
					include("./apis/schedule.php");

					$schedule_id = $schedule["schedule_id"];
					$arrival = $schedule["arrival"];
					$departure = $schedule["departure"];

					$status_dropdown = "<select class='form-control' name='status' required>";
					if ($schedule["active"] == "1") {
						$status_dropdown .= "<option value='1' selected>Active</option>";
						$status_dropdown .= "<option value='0'>Inactive</option>";
					}else {
						$status_dropdown .= "<option value='1'>Active</option>";
						$status_dropdown .= "<option value='0' selected>Inactive</option>";
					}
					$status_dropdown .= "</select>";

					$selected_vehicle_id = $schedule["vehicle_id"];
					include("./apis/vehicles.php");
					$vehicles_dropdown = "<select class='form-control' name='vehicle_id' required>";
					foreach ($vehicles as $key => $vehicle) {
						$vehicle_id = $vehicle["vehicle_id"];
						$vehicle_number = ucwords($vehicle["vehicle_number"]);
						if($vehicle_id == $selected_vehicle_id){
							$vehicles_dropdown .= "<option value='$vehicle_id' selected>$vehicle_number</option>";
						}else{
							$vehicles_dropdown .= "<option value='$vehicle_id'>$vehicle_number</option>";
						}
					}
					$vehicles_dropdown .= "</select>";

					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Update Schedule</h3>
							<hr>
							<form class='card-body' method='POST' action='./apis/update-schedule.php'>
								<input type='hidden' class='form-control' name='schedule_id' value='$schedule_id' >
								<div class='form-group'>
									<label>Select Vehicle:</label>
									$vehicles_dropdown
								</div>

								<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Departure time:</label>
											<input type='time' class='form-control' name='departure' value='$departure' required>
										</div>
									</div>

									<div class='col'>
										<div class='form-group'>
											<label>Arrival time:</label>
											<input type='time' class='form-control' name='arrival' value='$arrival' required>
										</div>
									</div>
								</div>
					";

					$selected_route_id = $schedule["route_id"];
					include("./apis/routes.php");
					$routes_dropdown = "<select class='form-control' name='route_id' required>";
					foreach ($routes as $key => $value) {
						$route_id = $value["route_id"];
						$start = ucwords($value["start"]);
						$finish = ucwords($value["finish"]);
						if($route_id == $selected_route_id){
							$routes_dropdown .= "<option value='$route_id' selected>From $start to $finish</option>";
						}else{
							$routes_dropdown .= "<option value='$route_id'>From $start to $finish</option>";
						}
					}
					$routes_dropdown .="</select>";

					echo "
								<div class='form-group'>
									<label>Select Round Trip:</label>
									$routes_dropdown
								</div>
								<div class='form-group'>
									<label>Status:</label>
									$status_dropdown
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='update_schedule' class='btn btn-outline-primary w-50'>Update</button>
								</div>
							</form>
						</div>
					";
				}
			}else{
				include("page-not-found.php");
			}
		?>
    </div>
</body>
<script src="transport.js"></script>
</html>