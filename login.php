<!-- Login page for all users -->
<?php
include("./config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ERP Model</title>
    <!-- Latest compiled and minified CSS & JS or JQuery -->
    <link rel="stylesheet" href="./assets/css/base-styles.css">
    <?php include("./core-styles-scripts.html") ?>
</head>

<body>
    <div class="container-fluid p-5">
        <div class='card account custom-shadow mt-5 pt-3'>
            <h3 class='text-center'>Login Form</h3>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eligendi!</p>
            <hr>
            <form class='card-body' method='POST' action='account-api.php'>
                <div class='form-group'>
                    <label>Category:</label>
                    <select class='form-control' name='category' required>
                        <option value='student' selected>student</option>
                        <option value='teacher'>teacher</option>
                        <option value='accountant'>accountant</option>
                        <option value='admin'>admin</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label>Email:</label>
                    <input type='email' class='form-control' name='email' required>
                </div>
                <div class='form-group'>
                    <label>Password:</label>
                    <input type='password' class='form-control' name='password' required>
                </div>
                <br>
                <div class='text-center'>
                    <button type='submit' name='login' class='btn btn-primary w-50'>SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>