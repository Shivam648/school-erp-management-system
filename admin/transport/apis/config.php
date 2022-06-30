<!-- Establish connection with the database & initialize session -->
<?php
$conn = mysqli_connect("localhost", "root", "", "school_erp_management") or die(mysqli_connect_error());
if ($conn) {
    $_SESSION["user_category"] = "admin";
}else{
    echo "There was some problem connecting to organization's database, report here at info@org.com ...";
}