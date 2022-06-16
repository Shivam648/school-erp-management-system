<!-- Write apis for account management -->
<?php
include("config.php");

// api for logging a user : verified
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $category = $_POST["category"];

    // search user details as per category selected
    if ($category == "student" || $category == "teacher") {
        $find_user = "SELECT * FROM {$category}s WHERE email = '$email' and active = '1'";
    } else {
        $find_user = "SELECT * FROM miscellaneous WHERE email = '$email' and active = '1'";
    }

    $response = mysqli_query($conn, $find_user) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        $user_details = mysqli_fetch_array($response, MYSQLI_ASSOC);
        $actual_password = $user_details["password"];
        $password = sha1($password);

        if ($password == $actual_password) {
            $_SESSION["user_name"] = ucwords($user_details["name"]);
            $_SESSION["user_email"] = $user_details["email"];
            $_SESSION["user_category"] = $category;

            if ($category == "student" || $category == "teacher") {
                $_SESSION["user_id"] = $user_details["{$category}_id"];
            } else {
                $_SESSION["user_id"] = $user_details["miscellaneous_id"];
            }

            if ($_SESSION["user_category"] == "admin") {
                header('Location: ../admin.php');
            } else {
                header('Location: ../index.php');
            }
        } else {
            echo "Password was incorrect, please try with a different password.";
        }
    } else {
        echo "There was some problem finding your account, please talk to your account manager.";
    }
}

// api when student updates his/her profile : verified
if (isset($_POST["update_student"])) {
    $student_id = $_SESSION["user_id"];
    $name = strtolower($_POST["name"]);
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_student = "SELECT * FROM students WHERE `student_id` = '$student_id' AND `active` = '1'";
    $response = mysqli_query($conn, $find_student) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            $update_profile = "UPDATE students SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `dob` = '$dob', `address` = '$address' WHERE `student_id` = '$student_id' AND `active` = '1'";
        } else {
            $password = sha1($password);
            $update_profile = "UPDATE students SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `dob` = '$dob', `address` = '$address', `password` = '$password' WHERE `student_id` = '$student_id' AND `active` = '1'";
        }
        $response = mysqli_query($conn, $update_profile) or die(mysqli_error($conn));
        header('Location: ../logout.php');
    } else {
        echo "There was some problem finding your account, contact account manager...";
    }
}

// api when teacher updates his/her profile : verified
if (isset($_POST["update_teacher"])) {
    $teacher_id = $_SESSION["teacher_id"];
    $name = strtolower($_POST["name"]);
    $gender = strtolower($_POST["gender"]);
    $phone = $_POST["phone"];
    $address = strtolower($_POST["address"]);
    $password = $_POST["password"];


    $find_teacher = "SELECT * FROM teachers WHERE `teacher_id` = '$teacher_id' AND `active` = '1'";
    $response = mysqli_query($conn, $find_teacher) or die(mysqli_error($conn));
    if (mysqli_num_rows($response) == 1) {
        if ($password == NULL) {
            $update_profile = "UPDATE teachers SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `address` = '$address' WHERE `teacher_id` = '$teacher_id' AND `active` = '1'";
        } else {
            $password = sha1($password);
            $update_profile = "UPDATE teachers SET `name` = '$name', `gender` = '$gender', `phone` = '$phone', `address` = '$address', `password` = '$password' WHERE `teacher_id` = '$teacher_id' AND `active` = '1'";
        }
        $response = mysqli_query($conn, $update_profile) or die(mysqli_error($conn));
        header('Location: ../logout.php');
    } else {
        echo "There was some problem finding your account, contact account manager...";
    }
}
?>