<?php
$id = 1;
if (!isset($_SESSION['question_id']))
    $_SESSION['question_id'] = 1;
$id = $_SESSION['question_id'];
echo $id;
?>
<div id="question">

</div>

<div class="container">
    <div class="row">
        <br><br>
        <div class="col"><button onclick='getPrevious()' name="previous" class="btn btn-lg btn-success" formnovalidate>&laquo; Previous</button></div>
        <div class="col"><button name="next" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp; &raquo; </button></div>
    </div>
</div>
<script>
    function getPrevious() {
        if (str == '') {
            document.getElementById('question').innerHTML = '';
            alert("Empty parameter passed.");
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("question").innerHTML = this.responseText;
                } else {
                    alert("Server doesn't respond!");
                }
            };
            xmlhttp.open("GET", "view_question.php?id=" + <?php echo $id; ?>, true);
            xmlhttp.send();
        }
    }
</script>
