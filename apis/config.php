<?php
$conn = mysqli_connect("localhost", "root", "", "school_erp_management_db") or die(mysqli_connect_error());
if ($conn) {
    echo "Loading page, please wwait...";
} else {
    echo "There was some problem connecting to organization database, report here at info@org.com ...";
}
