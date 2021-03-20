<?php
#global variables
#session_destroy();
#echo $_SESSION['sn'];
$myfile = fopen("testfile.txt", "w");
$_SESSION['res'] = null;

if (!isset($_SESSION['prev_disabled'])) {
    $_SESSION['prev_disabled'] = "disabled";
}
if (!isset($_SESSION['next_disabled'])) {
    $_SESSION['next_disabled'] = "";
}

if (!isset($_SESSION['question_id'])) {
    $_SESSION['question_id'] = 1;
}

if (!isset($_SESSION['next'])) {
    $_SESSION['next'] = 'ON';
}

#end of global variables
$table_name = "tbl_student";
$where = "username='tadese'";
$result = $obj->execute_query($conn, $obj->select_data($table_name, $where));
if ($result) {
    $row = $obj->fetch_data($result);
    $student_id = $row['student_id'];
    $full_name = $row['first_name'] . " " . $row['last_name'];
    $_SESSION['department'] = $row['faculty'];
    $faculty = $row['faculty'];
}

//get the questions and questions numbers department wise. 
$tbl_name_qns = 'tbl_faculty';
$where_qns = "faculty_id='$_SESSION[department]'";
$query_qns = $obj->select_data($tbl_name_qns, $where_qns);
$res_qns = $obj->execute_query($conn, $query_qns);
if ($res_qns == true) {
    $row_qns = $obj->fetch_data($res_qns);
    $faculty_name = $row_qns['faculty_name'];
    $_SESSION['facultyName'] = $faculty_name;
    $time_duration = $row_qns['time_duration'];
    $totalTime = $time_duration * 60;
    $qns_per_page = $row_qns['qns_per_set'];
    $total_english = $row_qns['total_english'];

    //echo $total_english;die();
}
if (!isset($_SESSION['strt_time'])) {
    $_SESSION['strt_time'] = date('h:i:s A');
}
if (!isset($_SESSION['end_time'])) {
    $_SESSION['end_time'] = date('h:i:s A', strtotime("+" . $time_duration . " minutes"));
}

?>
<!-- Body starts here -->
<div class="container">
    <!-- upper part..which contains information about the exam and time -->
    <div class="row well alert alert-primary" style="margin-top: 10px">
        Examinee: <span class="heavy"><?php echo $full_name; ?></span>&nbsp;&nbsp;
        Department: <span class="heavy"><?php echo $faculty_name; ?></span>&nbsp;&nbsp;
        Start Time: <span class="heavy"><?php echo $_SESSION['strt_time']; ?></span>&nbsp;&nbsp;
        End Time: <span class="heavy"><?php echo $_SESSION['end_time']; ?></span>&nbsp;&nbsp;
        <?php
        //Getting Time Difference
        $startTime = strtotime($_SESSION['end_time']);
        $currentTime = strtotime(date('h:i:s A'));
        $timeDifference = $startTime - $currentTime;

        ?>
        <span class=" badge-warning timer" style="border-radius: 5px;" data-seconds-left=<?php echo $timeDifference; ?>></span>
    </div>
    <!-- middle part which contains information about question and it's answer options -->
    <form method="post">
        <div class="row" id="question">
            <!-- question -->
            <div class="col">
                <?php
                if (!isset($_SESSION['all_qns'])) {
                    $_SESSION['all_qns'] = 0;
                }

                $tbl_name = "tbl_question";
                if ($_SESSION['next'] == "ON") {
                    $where = "is_active='yes' && category='Math' && faculty='" . $faculty . "' && question_id NOT IN (" . $_SESSION['all_qns'] . ")";
                } else {
                    $where = "is_active='yes' && category='Math' && faculty='" . $faculty . "' && question_id < '" . $_SESSION['question_id'] . "'order by question_id desc";
                }

                $limit = 1;
                $query = $obj->select_random_row($tbl_name, $where, $limit);
                $res = $obj->execute_query($conn, $query);
                if ($res == true) {
                    $count_rows = $obj->num_rows($res);
                    if ($count_rows > 0) {
                        $row = $obj->fetch_data($res);
                        $_SESSION['question_id'] = $row['question_id'];
                        $question = $row['question'];
                        $first_answer = $row['first_answer'];
                        $second_answer = $row['second_answer'];
                        $third_answer = $row['third_answer'];
                        $fourth_answer = $row['fourth_answer'];
                        $fifth_answer = $row['fifth_answer'];
                        $answer = $row['answer'];
                        $marks = $row['marks'];
                        $image_name = $row['image_name'];
                    } else {
                        //echo "Error";
                        header('location:' . SITEURL . 'index.php?page=endSession');
                    }
                }

                ?>
                <!-- question number -->
                <span class="badge badge-primary" style="border-radius: 5%; padding: 8px;">Question <?php echo $_SESSION['question_id'] ?></span>
                <!-- the question -->
                <?php echo $question; ?><br />

                <?php
                if ($image_name != "") {
                ?>
                    <img src="<?php echo SITEURL; ?>images/questions/<?php echo $image_name; ?>" alt="Supplementary Image" />
                <?php
                }
                ?>
            </div>
            <!-- answer options -->
            <div class="col">
                <input type="radio" name="answer" value="1" required="true" /> <span class="radio-ans"><?php echo $first_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="2" required="true" /> <span class="radio-ans"><?php echo $second_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="3" required="true" /> <span class="radio-ans"><?php echo $third_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="4" required="true" /> <span class="radio-ans"><?php echo $fourth_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="5" required="true" /> <span class="radio-ans"><?php echo $fifth_answer; ?>
                    <hr /><br />&nbsp;
                    <input type="hidden" name="question_id" id='id' value="<?php echo $_SESSION['question_id']; ?>" />
                    <input type="hidden" name="right_answer" value="<?php echo $answer; ?>" />
                    <input type="hidden" name="marks" value="<?php echo $marks; ?>" />
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px">
            <div class="col"><button id="prev" <?php echo $_SESSION['prev_disabled']; ?> onclick='getPrevious((' #id').value)' name="previous" class="btn btn-lg btn-success" formnovalidate>&laquo; Previous</button></div>
            <div class="col"><button <?php echo $_SESSION['next_disabled']; ?> name="next" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp; &raquo; </button></div>
            <div class="col">
                <a href="<?php echo SITEURL; ?>index.php?page=logout">
                    <button type="button" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure you want to Quit?')">&nbsp; Quit &nbsp;</button>
                </a>
            </div>
        </div>
    </form>
    <script>
        function getPrevious(str) {
            if (str == '') {
                document.getElementById('question').innerHTML = '';
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("question").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "view_question.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <?php
    if (isset($_POST['next'])) {
        #save the values into db and getback to the page....
        $question_id = $_POST['question_id'];

        //Submitting Answers to the database
        if (isset($_POST['answer'])) {
            $user_answer = $obj->sanitize($conn, $_POST['answer']);
        } else {
            $user_answer = 0;
        }
        $right_answer = $obj->sanitize($conn, $_POST['right_answer']);
        $question_id = $obj->sanitize($conn, $_POST['question_id']);
        $username = $_SESSION['student'];
        $marks = $_POST['marks'];
        //Get User ID from username
        $tbl_name = "tbl_student";
        $student_id = $obj->get_userid($tbl_name, $username, $conn);
        $added_date = date('Y-m-d');
        //Now Adding Data to Database
        $tbl_name = "tbl_result";
        $data = "
                                student_id='$student_id',
                                question_id='$question_id',
                                user_answer='$user_answer',
                                right_answer='$right_answer',
                                added_date='$added_date'
                                ";
        //CHeck if the total score is set or not
        if (isset($_SESSION['totalScore'])) {
            $totalScore = $_SESSION['totalScore'];
        } else {
            $totalScore = 0;
        }

        //Check if the full marks is set or not
        if (isset($_SESSION['full_marks'])) {
            $full_marks = $_SESSION['full_marks'];
        } else {
            $full_marks = 0;
        }

        if ($user_answer == $right_answer) {
            $_SESSION['totalScore'] = $totalScore + $marks;
            $_SESSION['full_marks'] = $full_marks + $marks;
        } else {
            $_SESSION['totalScore'] = $totalScore + 0;
            $_SESSION['full_marks'] = $full_marks + $marks;
        }
        $query = $obj->insert_data($tbl_name, $data);
        //$res=true;
        $res = $obj->execute_query($conn, $query);
        if ($res === true) {

            include('pages/timeCheck.php');
            if (isset($_SESSION['all_qns'])) {
                $_SESSION['all_qns'] = $_SESSION['all_qns'] . ',' . $_SESSION['question_id'];
            } else {
                $_SESSION['all_qns'] = 0;
            }
            //Save the answer for result
            if (isset($_SESSION['sn'])) {
                $_SESSION['sn'] = $_SESSION['sn'] + 1;
            } else {
                $_SESSION['sn'] = 1;
            }

            #$_SESSION['qns']=$question_id;
            if ($_SESSION['prev_disabled'] != "") {
                $_SESSION['prev_disabled'] = "";
            }
            if ($_SESSION['next'] != "ON") {
                $_SESSION['next'] = "ON";
            }
            //Redirect to the question page
            header('location:' . SITEURL . 'index.php?page=Questions');
        } else {
            echo "Error";
        }
    } elseif (isset($_POST['previous'])) {
        if ($_SESSION['next'] != 'OFF') {
            $_SESSION['next'] = 'OFF';
        }
        header('location:' . SITEURL . 'index.php?page=Questions');
    }
    ?>
</div>