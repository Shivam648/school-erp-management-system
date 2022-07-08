<?php include("./config.php") ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Timetable | ERP Model</title>
        <link rel="stylesheet" href="./assets/css/base-styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
    <div class="container-fluid">
        <?php include("./includes/header.php") ?>

        <?php
            if(!isset($_GET["standard"])){
                $classes_query = "SELECT standard FROM classes";
                $response = mysqli_query($conn, $classes_query) or die(mysqli_errno($conn));
                $classes_details = mysqli_fetch_all($response, MYSQLI_ASSOC);

                echo "
                    <div class='card account custom-shadow mt-5 mb-5 p-3'>
                        <h3 class='text-center'>Get Timetable</h3>
                        <hr>
                        <div class='form-group'>
                            <label>Select Standard:</label>
                            <select class='form-control' name='standard' onChange='document.getElementById('selectedValue').href = this.value;'>
                ";

                foreach ($classes_details as $key => $class_details) {
                    echo "<option value='{$class_details['standard']}'>{$class_details['standard']}</option>";
                }

                echo "
                            </select>
                        </div>
                        <br>
                        <div class='text-center'>
                            <a href='./timetable.php?standard=one' id='selectedValue' class='btn btn-outline-primary w-50'>Get Timetable</a>
                        </div>
                    </div>
                ";
            }

            if(isset($_GET["standard"])){
                $standard = $_GET['standard'];
                echo "
                    <section class='text-center' id='timetable'>
                        <embed class='timetable' src='./assets/vendor/timetable/standard-{$standard}.pdf' />
                    </section>
                ";
            }
            ?>
        </div>
        <?php include("./includes/footer.php") ?>
    </div>
    </div>

    </div>
</body>
<script>
    function getStandard() {
        const standard = document.getElementById("standard").value;
    }
</script>
</html>