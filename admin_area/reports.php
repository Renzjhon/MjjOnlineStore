<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Reports
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Reports
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            <form method="get" action="reports_result.php" class="navbar-form">    <!--navbar-form start-->
                        
                        &nbsp;&nbsp;&nbsp;<div class="input-group">    <!--input-group start-->
                            
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            
                            <span class="input-group-btn">    <!--input-group-btn start-->
                            
                            <button type="submit" name="search" value="Search" class="btn btn-primary">    <!--btn btn-primary start-->
                                
                                <i class="fa fa-search">search</i>
                                
                            </button>    <!--btn btn-primary start-->
                            
                            </span>    <!--input-group-btn end-->
                            
                        </div>    <!--input-group end-->
                        
                    </form>    <!--navbar-form end-->
            <div class="panel-body">    <!--panel-body start-->
                                
                 <?php 
                                
                                
                               
         
                                $get_reports = "select * from reports";
         
                                $run_reports = mysqli_query($con,$get_reports);
         
                                while($row_reports=mysqli_fetch_array($run_reports)){
                                    
                                    $report_id = $row_reports['report_id'];
                                    $report_name = $row_reports['report_name'];
                                    $report_image = $row_reports['report_image'];
                                    $report_keyword = $row_reports['report_keyword'];
                                    
                    ?>
                
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                 <?php echo $report_name?>
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/<?php echo $report_image ?>" alt="sales.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?<?php echo $report_keyword?>" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
            
                
                
                <?php }} ?>
            
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->


