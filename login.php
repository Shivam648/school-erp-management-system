<?php
include("./apis/config.php");
$category = $_GET["category"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ERP</title>
    <!-- Add core styles here -->
    <link rel="stylesheet" href="./assets/css/base-styles.css">
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
        <!-- Header -->
        <?php include("./includes/header.php") ?>

        <div class='card account custom-shadow mt-5 pt-5'>
            <h3 class='text-center'>Login Form</h3>
            <hr>
            <form class='card-body' method='POST' action='./apis/account-daemon.php'>

                <div class='form-group'>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' name='email' placeholder='' required>
                </div>

                <div class='form-group'>
                    <label for='password'>Password:</label>
                    <input type='password' class='form-control' name='password' placeholder='' required>
                </div>
                <input type='hidden' class='form-control' name='category' value="<?php echo $category; ?>" placeholder=''>
                <br>
                <div class='text-center'>
                    <button type='submit' name='login' class='btn btn-outline-primary w-50'>ADD</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>