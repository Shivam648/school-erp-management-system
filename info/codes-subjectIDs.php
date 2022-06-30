<?php
$codes = array();

for ($i = 0; $i < sizeof($subject_ids); $i++) {
    $subject_id = $subject_ids[$i];

    include("code-subjectID.php");
    array_push($codes, $code);
}
