<!-- write apis for account management -->
<?php
include("config.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $category = $_POST["category"];

    if ($category == "admin") {
        if ($email == "admin.org@gmail.com" && $password == "12345678") {
            $_SESSION["user_category"] == "admin";
            header('Location: ../x.php');
        } else {
            echo "There was some problem finding your account. Please talk to your account manager...";
        }
    } else {
        if ($category == "student") {
            $find_user = "SELECT * FROM students WHERE email = '$email' ";
        }
        if ($category == "teacher") {
            $find_user = "SELECT * FROM teachers WHERE email = '$email' ";
        }

        $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
        if (mysqli_num_rows($response) == 1) {
            if ($password == NULL) {
                echo "Password cannnot be empty...,";
            } else {
                $user_details = mysqli_fetch_array($response, MYSQLI_ASSOC);
                $actual_password = $user_details["password"];
                $password = sha1($password);
                if ($password == $actual_password) {
                    header('Location: ../x.php');
                } else {
                    echo "Password was incorrect...";
                }
            }
        } else {
            echo "There was some problem finding your account. Please talk to your account manager...";
        }
    }
}
?>