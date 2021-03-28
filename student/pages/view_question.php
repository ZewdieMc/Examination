<?php
if (isset($_REQUEST['id'])) {
    $id  = $_REQUEST['id']; #question_id
} else {
    $id = 1; #the first question
}
$tbl_name = "tbl_question";
$where = "is_active='yes' && category='Math' && question_id <" . $id . " order by question_id desc;";
$limit = 1;
$result = $obj->execute_query($conn, $obj->select_random_row($tbl_name, $where, $limit));
$row = null;
if ($result == true && $obj->num_rows($result) > 0) {
    $row = $obj->fetch_data($res);
    echo "<div class='col'>";
    echo "<span class ='badge badge-primary'>Question" . $row['question_id'] . "</span>";
    echo $row['question'] . "<br>";
    if ($row['image_name'] != '') {
        echo "<img src ='" . SITEURL . "/images/questions/" . $row['image_name'] . "' alt='Supplementary Image'/>";
    }
    echo "</div>";
    echo "<div class='col'>";
    echo "<input type = 'radio' name = 'answer' value = '1' required='true'/><span class ='radio-ans'>" . $row['first_answer'] . "</span>";
    echo "<input type = 'radio' name = 'answer' value = '2' required='true'/><span class ='radio-ans'>" . $row['second_answer'] . "</span>";
    echo "<input type = 'radio' name = 'answer' value = '3' required='true'/><span class ='radio-ans'>" . $row['third_answer'] . "</span>";
    echo "<input type = 'radio' name = 'answer' value = '4' required='true'/><span class ='radio-ans'>" . $row['fourth_answer'] . "</span>";
    echo "<input type = 'radio' name = 'answer' value = '5' required='true'/><span class ='radio-ans'>" . $row['fifth_answer'] . "</span>";
    echo "<input type = 'radio' name = 'question_id' value = '" . $row['question_id'] . "'/>";
    echo "<input type = 'radio' name = 'right_answer' value = '" . $row['answer'] . "'/>";
    echo "<input type = 'radio' name = 'marks' value = '" . $row['marks'] . "'/>";
    echo "</div>";
} else {
    echo "No previous question.";
}

?>
<!-- question -->