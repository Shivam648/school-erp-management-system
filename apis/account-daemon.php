<!-- write apis for account management -->
<?php
include("config.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $find_user = "SELECT * FROM users WHERE email = '$email' ";
    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            echo "Password cannnot be empty...,";
        } else {
            $user_details = mysqli_fetch_array($response, MYSQLI_ASSOC);
            $actual_password = $user_details["password"];
            $password = sha1($password);
            if ($password == $actual_password) {
                $_SESSION["user_category"] = $user_details["category"];
                if ($_SESSION["user_category"] == "admin") {
                    header('Location: ../dashboard.php');
                } else {
                    header('Location: ../index.php');
                }
            } else {
                echo "Password was incorrect...";
            }
        }
    } else {
        echo "There was some problem finding your account. Please talk to your account manager...";
    }
}
?>