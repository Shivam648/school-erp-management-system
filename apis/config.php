<?php
$conn = mysqli_connect("localhost", "root", "", "school_erp_management_db") or die(mysqli_connect_error());
if ($conn) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["user_category"])) {
        $_SESSION["user_category"] = "guest";
    }
} else {
    echo "There was some problem connecting to organization database, report here at info@org.com ...";
}
