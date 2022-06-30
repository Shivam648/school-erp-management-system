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
		<title>Routes | Admin</title>
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
					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Add Vehicle</h3>
							<hr>
							<form class='card-body' method='POST' action='./apis/add-vehicle.php'>
								<div class='form-group'>
									<label>Vehicle Type:</label>
									<input type='text' class='form-control' name='type' required>
								</div>
								<div class='form-group'>
									<label>Vehicle Number:</label>
									<input type='text' class='form-control' name='plate' required>
								</div>
					";

					include("./apis/active-drivers.php");
					$drivers_dropdown = "<select class='form-control' name='driver_id' required>";
					foreach ($drivers as $key => $value) {
						$driver_id = $value["miscellaneous_id"];
						$name = ucwords($value["name"]);
						$drivers_dropdown .= "<option value='$driver_id' selected>$name</option>";
					}
					$drivers_dropdown .= "</select>";

					echo "
								<div class='form-group'>
									<label>Select an active driver:</label>
									$drivers_dropdown
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='add_vehicle' class='btn btn-outline-primary w-50'>ADD</button>
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
                                        <th>Vehicle Id</th>
                                        <th>Type</th>
                                        <th>Number</th>
                                        <th>Assigned to</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

					// drivers
					include("./apis/vehicles.php");

                    foreach ($vehicles as $key => $value) {
                        $vehicle_id = $value["vehicle_id"];
                        $driver_id = $value["driver_id"];
                        $vehicle_type = ucwords($value["vehicle_type"]);
                        $vehicle_number = ucwords($value["vehicle_number"]);
						$status = $value["active"] == 1 ? "Active" : "Inactive";

						// get driver name
						include("./apis/driver.php");
						$name = ucwords($driver["name"]);

                        echo "
                            	<tr>
                                    <td>$vehicle_id</td>
                                    <td>$vehicle_type</td>
                                    <td>$vehicle_number</td>
                                    <td>$name</td>
                                    <td>$status</td>
									<td>
										<a href='./apis/delete-vehicle.php?vehicle_id=$vehicle_id' class='text-danger pr-2'>Delete</a>
										<a href='vehicles.php?query=update&vehicle_id=$vehicle_id' class='text-primary'>Update</a>
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
					$vehicle_id = $_GET["vehicle_id"];

					// fetch driver details using driver id
					include("./apis/vehicle.php");

					$vehicle_id = $vehicle["vehicle_id"];
					$vehicle_type = ucwords($vehicle["vehicle_type"]);
					$vehicle_number = ucwords($vehicle["vehicle_number"]);

					$status_dropdown = "<select class='form-control' name='status' required>";
					if ($vehicle["active"] == "1") {
						$status_dropdown .= "<option value='1' selected>Active</option>";
						$status_dropdown .= "<option value='0'>Inactive</option>";
					}else {
						$status_dropdown .= "<option value='1'>Active</option>";
						$status_dropdown .= "<option value='0' selected>Inactive</option>";
					}
					$status_dropdown .= "</select>";

					$selected_driver_id = $vehicle["driver_id"];
					include("./apis/drivers.php");
					$drivers_dropdown = "<select class='form-control' name='driver_id' required>";
					foreach ($drivers as $key => $value) {
						$driver_id = $value["miscellaneous_id"];
						$name = ucwords($value["name"]);

						if($driver_id == $selected_driver_id){
							$drivers_dropdown .= "<option value='$driver_id' selected>$name</option>";
						}else{
							$drivers_dropdown .= "<option value='$driver_id'>$name</option>";
						}
					}
					$drivers_dropdown .= "</select>";

					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Update Driver</h3>
							<hr>
							<form class='card-body' method='POST' action='./apis/update-vehicle.php'>
								<div class='form-group'>
									<label>Vehicle Type:</label>
									<input type='text' class='form-control' name='type' value='$vehicle_type' required>
								</div>
								<div class='form-group'>
									<label>Vehicle Number:</label>
									<input type='text' class='form-control' name='plate' value='$vehicle_number' required>
								</div>

								<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Status:</label>
											$status_dropdown
										</div>
									</div>
									<div class='col'>
										<div class='form-group'>
											<label>Driver:</label>
											$drivers_dropdown
										</div>
									</div>
									
								</div>
                                
                                <input type='hidden' class='form-control' name='vehicle_id' value='$vehicle_id' required>
								<br>
								<div class='text-center'>
									<button type='submit' name='update_vehicle' class='btn btn-outline-primary w-50'>Update</button>
								</div>
							</form>
						</div>
					";
				}
			}else{
				include("../../page-not-found.php");
			}
		?>
    </div>
</body>
<script src="transport.js"></script>
</html>