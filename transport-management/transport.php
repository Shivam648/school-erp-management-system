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
		<title>Transport | ERP</title>
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
				include('sidebar.php');

				echo "
					<div id='content'>
						<span style='font-size:30px; cursor:pointer' onclick=openNav()>&#9776;</span>
					</div>
				";
			}else{
				include("page-not-found.php");
			}
		?>
    </div>
</body>
<script src="transport.js"></script>
</html>