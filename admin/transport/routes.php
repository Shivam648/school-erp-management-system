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
							<h3 class='text-center'>Create Route</h3>
							<hr>
							<form class='card-body' method='POST' action='./apis/add-route.php'>
								<div class='form-group'>
									<label>Start:</label>
									<input type='text' class='form-control' name='start' required>
								</div>
								<div class='form-group'>
									<label>Destination:</label>
									<input type='text' class='form-control' name='finish' required>
								</div>
								<div class='form-group'>
									<label>Fair:</label>
									<input type='number' class='form-control' name='fair' required>
								</div>
								<br>
								<div class='text-center'>
									<button type='submit' name='add_route' class='btn btn-outline-primary w-50'>ADD</button>
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
                                        <th>Route Id</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Fair</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ";

					// drivers
					include("./apis/routes.php");

                    foreach ($routes as $key => $value) {
                        $route_id = $value["route_id"];
                        $start = ucwords($value["start"]);
                        $finish = ucwords($value["finish"]);
                        $fair = $value["fair"];
						$status = $value["active"] == 1 ? "Active" : "Inactive";

                        echo "
                            	<tr>
                                    <td>$route_id</td>
                                    <td>$start</td>
                                    <td>$finish</td>
                                    <td>$fair</td>
                                    <td>$status</td>
									<td>
										<a href='./apis/delete-route.php?route_id=$route_id' class='text-danger pr-2'>Delete</a>
										<a href='routes.php?query=update&route_id=$route_id' class='text-primary'>Update</a>
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
					$route_id = $_GET["route_id"];

					// fetch driver details using driver id
					include("apis/route.php");

					$route_id = $route["route_id"];
					$start = ucwords($route["start"]);
					$finish = ucwords($route["finish"]);
					$fair = $route["fair"];

					$status_dropdown = "<select class='form-control' name='status' required>";
					if ($route["active"] == "1") {
						$status_dropdown .= "<option value='1' selected>Active</option>";
						$status_dropdown .= "<option value='0'>Inactive</option>";
					}else {
						$status_dropdown .= "<option value='1'>Active</option>";
						$status_dropdown .= "<option value='0' selected>Inactive</option>";
					}
					$status_dropdown .= "</select>";

					echo "
						<div class='card account custom-shadow mt-4 p-3'>
							<h3 class='text-center'>Update Route</h3>
							<hr>
							<form class='card-body' method='POST' action='apis/update-route.php'>
								<div class='form-group'>
									<label>Start:</label>
									<input type='text' class='form-control' name='start' value='$start' required>
								</div>
								<div class='form-group'>
									<label>Finish:</label>
									<input type='text' class='form-control' name='finish' value='$finish' required>
								</div>
								<div class='form-group'>
									<label>Fair:</label>
									<input type='number' class='form-control' name='fair' value='$fair' required>
								</div>
                                <div class='form-group'>
                                    <label>Status:</label>
                                    $status_dropdown
                                </div>
                                <input type='hidden' class='form-control' name='route_id' value='$route_id' required>
								<br>
								<div class='text-center'>
									<button type='submit' name='update_route' class='btn btn-outline-primary w-50'>Update</button>
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