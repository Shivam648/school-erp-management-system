<?php include("apis/config.php") ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Drivers | Admin</title>
		<!-- Add core styles here -->
		<link rel="stylesheet" href="transport.css">
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
				$query = $_GET["query"];

				include('sidebar.php');
				echo "
					<div id='content'>
						<span style='font-size:30px; cursor:pointer' onclick=openNav()>&#9776;</span>
					</div>
				";

				if($query == "add"){
					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Create Driver</h3>
							<hr>
							<form class='card-body' method='POST' action='apis/add-driver.php'>
								<div class='form-group'>
									<label>Full Name:</label>
									<input type='text' class='form-control' name='name' required>
								</div>

								<div class='form-group'>
									<label>Email:</label>
									<input type='email' class='form-control' name='email' required>
								</div>
					";

					echo "
						<div class='form-group'>
							<label>Gender:</label>
							<select class='form-control' name='gender' required>
								<option value='male'>Male</option>
								<option value='female'>Female</option>
								<option value='other'>Other</option>
							</select>
						</div>

						<div class='row'>
							<div class='col'>
								<div class='form-group'>
									<label>Phone:</label>
									<input type='number' class='form-control' name='phone' required>
								</div>
							</div>

							<div class='col'>
								<div class='form-group'>
									<label>D.O.J:</label>
									<input type='date' class='form-control' name='doj'>
								</div>
							</div>
						</div>

								<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Address:</label>
											<textarea type='text' class='form-control' name='address' cols='6' rows='2' required></textarea>
										</div>
									</div>
									<div class='col'>
										<label>Password:</label>
										<input type='password' class='form-control'name='password' required>
									</div>
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='add_driver' class='btn btn-outline-primary w-50'>ADD</button>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>D.O.J</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

					// drivers
					include("apis/drivers.php");

                    foreach ($drivers as $key => $value) {
                        $driver_id = $value["miscellaneous_id"];
                        $name = ucwords($value["name"]);
                        $email = $value["email"];
                        $phone = $value["phone"];
                        $gender = ucwords($value["gender"]);
                        $address = ucwords($value["address"]);
                        $doj = $value["doj"];
						$status = $value["active"] == 1 ? "Active" : "Inactive";

                        // find vehicle ids using driver id : TODO Feature
                        // include("./get-data/standard-classID.php");

                        echo "
                            	<tr>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$gender</td>
                                    <td>$address</td>
                                    <td>$doj</td>
                                    <td>$status</td>
									<td>
										<a href='apis/delete-driver.php?driver_id=$driver_id' class='text-danger pr-2'>Delete</a>
										<a href='drivers.php?query=update&driver_id=$driver_id' class='text-primary'>Update</a>
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
					$driver_id = $_GET["driver_id"];

					// fetch driver details using driver id
					include("apis/driver.php");

					$driver_id = $driver["miscellaneous_id"];
					$name = ucwords($driver["name"]);
					$email = $driver["email"];
					$phone = $driver["phone"];
					$address = ucwords($driver["address"]);
					$doj = $driver["doj"];
				
					$gender_dropdown = "<select class='form-control' name='gender' required>";
					if ($driver["gender"] == "male") {
						$gender_dropdown .= "<option value='male' selected>Male</option>";
						$gender_dropdown .= "<option value='female'>Female</option>";
						$gender_dropdown .= "<option value='other'>Other</option>";
					} else if ($driver["gender"] == "female") {
						$gender_dropdown .= "<option value='male'>Male</option>";
						$gender_dropdown .= "<option value='female' selected>Female</option>";
						$gender_dropdown .= "<option value='other'>Other</option>";
					} else {
						$gender_dropdown .= "<option value='male'>Male</option>";
						$gender_dropdown .= "<option value='female'>Female</option>";
						$gender_dropdown .= "<option value='other' selected>Other</option>";
					}
					$gender_dropdown .= "</select>";

					$status_dropdown = "<select class='form-control' name='status' required>";
					if ($driver["active"] == "1") {
						$status_dropdown .= "<option value='1' selected>Active</option>";
						$status_dropdown .= "<option value='0'>Inactive</option>";
					}else {
						$status_dropdown .= "<option value='1'>Active</option>";
						$status_dropdown .= "<option value='0' selected>Inactive</option>";
					}
					$status_dropdown .= "</select>";

					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Update Driver</h3>
							<hr>
							<form class='card-body' method='POST' action='apis/update-driver.php'>
								<div class='form-group'>
									<label>Full Name:</label>
									<input type='text' class='form-control' name='name' value='$name' required>
								</div>

								<div class='form-group'>
									<label>Email:</label>
									<input type='email' class='form-control' name='email' value='$email' readonly required>
								</div>
					";

					echo "
						<div class='row'>
							<div class='col'>
								<div class='form-group'>
									<label>Gender:</label>
									$gender_dropdown
								</div>
							</div>

							<div class='col'>
								<div class='form-group'>
									<label>Status:</label>
									$status_dropdown
								</div>
							</div>
						</div>

						<div class='row'>
							<div class='col'>
								<div class='form-group'>
									<label>Phone:</label>
									<input type='number' class='form-control' name='phone' value='$phone' required>
								</div>
							</div>

							<div class='col'>
								<div class='form-group'>
									<label>D.O.J:</label>
									<input type='date' class='form-control' value='$doj' name='doj'>
								</div>
							</div>
						</div>

								<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Address:</label>
											<textarea type='text' class='form-control' name='address' cols='6' rows='2' required>$address</textarea>
										</div>
									</div>
									<div class='col'>
										<label>New Password:</label>
										<input type='password' class='form-control'name='password'>
									</div>
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='update_driver' class='btn btn-outline-primary w-50'>Update</button>
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