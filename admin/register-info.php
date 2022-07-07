

            if ($object == "subject") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Subject Name:</label>
                                <input type='text' class='form-control' name='name' required>
                            </div>

                            <div class='form-group'>
                                <label>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' required></textarea>
                            </div>

                            <div class='row'>
                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Code:</label>
                                        <input type='text' class='form-control' name='code' required>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='form-group'>
                                        <label>Credit:</label>
                                        <input type='number' class='form-control' name='credit' required>
                                    </div>
                                </div>
                            </div>
                ";

                echo "
                    <div class='form-group'>
                        <label>Assign Teacher:</label>
                        <select class='form-control' name='teacher_id' required>
                ";

                include("../info/teachers.php");
                foreach ($teachers as $key => $value) {
                    $teacher_id = $value["teacher_id"];
                    $name = ucwords($value["name"]);
                    echo "
                        <option value='$teacher_id'>$name</option>
                    ";
                }


                echo "
                        </select>
                    </div>
                ";

                echo "
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_subject' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "class") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Standard:</label>
                                <input type='text' class='form-control' name='standard' required>
                            </div>
                ";

                echo "
                    <div class='form-group'>
                    <label>Add Subjects:</label> <br>
                ";

                // add subjects to be taught within the class
                include("../info/subjects.php");
                foreach ($subjects as $key => $value) {
                    $subject_id = $value["subject_id"];
                    $code = $value["code"];
                    echo "
                        <label class='checkbox-inline pr-2'><input type='checkbox' name='subject_ids[]' value=$subject_id>$code</label>
                    ";
                }

                echo "</div>";
                echo "
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_class' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }

            if ($object == "announcement") {
                echo "
                    <div class='card account custom-shadow mt-5 p-3'>
                        <h3 class='text-center'>Create {$object}</h3>
                        <hr>
                        <form class='card-body' method='POST' action='./admin-manage.php'>
                            <div class='form-group'>
                                <label>Announcement Title:</label>
                                <input type='text' class='form-control' name='title' required>
                            </div>

                            <div class='form-group'>
                                <label>Description:</label>
                                <textarea type='text' class='form-control' name='descr' cols='6' rows='2' required></textarea>
                            </div>
                            <br>
                            <div class='text-center'>
                                <button type='submit' name='add_announcement' class='btn btn-outline-primary w-50'>ADD</button>
                            </div>
                        </form>
                    </div>
                ";
            }
        } else {
            include("../page-not-found.php");
        }
        ?>
    </div>
</body>


</html>