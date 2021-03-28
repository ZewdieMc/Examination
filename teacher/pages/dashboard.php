<!--Body Starts Here-->
        <div class="main">
            <div class="content">
                <div class="report">
                    <h2>Control Panel</h2>
                    
                    <?php 
                        if(isset($_SESSION['success']))
                        {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                        if(isset($_SESSION['fail']))
                        {
                            echo $_SESSION['fail'];
                            unset($_SESSION['fail']);
                        }
                    ?>
                    
                    <div class="clearfix">
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=students">
                            <div class="dash-tile bg-success">
                                
                                <h1><?php echo $obj->get_total_rows('tbl_student',$conn); ?></h1>
                                <span>Students</span>
                            </div>
                        </a>
                        
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=faculties">
                            <div class="dash-tile bg-primary">
                                <h1><?php echo $obj->get_total_rows('tbl_faculty',$conn); ?></h1>
                                <span>Department</span>
                            </div>
                        </a>
                        
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=questions">
                            <div class="dash-tile" style="background-color: black">
                                <h1><?php echo $obj->get_total_rows('tbl_question',$conn); ?></h1>
                                <span>Questions</span>
                            </div>
                        </a>
                        
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=results">
                            <div class="dash-tile bg-danger">
                                <h1><?php echo $obj->get_total_rows('tbl_result_summary',$conn); ?></h1>
                                <span>Results</span>
                            </div>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!--Body Ends Here-->