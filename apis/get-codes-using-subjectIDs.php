<!-- API to find subject codes using subject IDs -->
<?php
include("./apis/config.php");
$codes = array();

for ($i = 0; $i < sizeof($subject_ids); $i++) {
    $subject_id = $subject_ids[$i];

    // find subject code using subject id
    include("get-code-using-subjectID.php");
    array_push($codes, $code);
}
