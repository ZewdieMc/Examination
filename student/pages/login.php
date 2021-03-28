<!--Body Starts Here-->
<style>
    body {
        background-image: url('../images/sched_back.jpg')
    }
</style>
<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card">
                <div class="card-body ">
                    <form method="post" action="">
                        <h2>Examinee | Log In</h2>
                        <?php
                        if (isset($_SESSION['invalid'])) {
                            echo $_SESSION['invalid'];
                            unset($_SESSION['invalid']);
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="true" />
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true" />
                        </div>
                        <div class="form-group">

                            <input type="submit" name="submit" value="Log In" class="btn btn-primary form-control" />
                        </div>
                        <div class="form-group">
                            <input type="reset" name="reset" value="Reset" class="btn btn-danger form-control" />
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        //echo "CLicked";
                        //Get Values from forms
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        //Check Login
                        $tbl_name = "tbl_student";
                        $where = "username='$username' && password='$password' && is_active='yes'";
                        $query = $obj->select_data($tbl_name, $where);
                        $res = $obj->execute_query($conn, $query);
                        $count_rows = $obj->num_rows($res);
                        if ($count_rows > 0) {
                            $_SESSION['student'] = $username;
                            $_SESSION['login'] = "<div class='alert alert-success'>Login Successful.</div>";
                            header('location:' . SITEURL . 'index.php?page=welcome');
                        } else {
                            $_SESSION['invalid'] = "<div class='alert alert-danger'>Username or Password is invalid.<br>Or Account not active</div>";
                            header('location:' . SITEURL . 'index.php?page=login');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Body Ends Here-->
        <div class="col">
            <div class="">
                <div class="">
                    <!-- ..... -->
                </div>
            </div>
        </div>
    </div>
</div>