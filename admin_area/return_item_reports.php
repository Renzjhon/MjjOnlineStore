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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Return Item Reports
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Return Item Reports
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
            
                
                
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                 Daily <br>Return Item Report
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/day.png" alt="day.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?daily_return_item_reports" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
                
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                Weekly Return Item Report
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/Week.png" alt="Week.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?weekly_return_item_reports" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                Monthly Return Item Report
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/month.png" alt="month.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?monthly_return_item_reports" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                Yearly <br> Return Item Report
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/year.png" alt="year.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?yearly_return_item_reports" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
                <div class="col-lg-3 col-md-3">    <!--col-lg-3 col-md-3 start-->
                    <div class="panel panel-primary">    <!--panel panel-primary start-->
                        <div class="panel-heading">    <!--panel-heading start-->
                            <h3 class="panel-title" align="center">    <!--panel-title start-->
                            
                                Range Return Item Report
                                
                            </h3>    <!--panel-title end-->
                        </div>    <!--panel-heading end-->
                        
                        <div class="panel-body">    <!--panel-body start-->
                            
                            <img src="icons/range.png" alt="year.png" class="img-responsive">
                            
                        </div>    <!--panel-body end-->
                        
                        <div class="panel-footer">    <!--panel-footer start-->
                            <center>    <!--center start-->
                                
                                
                                <a href="index.php?range_return_report" >
                                
                                    <i class="fa fa-eye"></i> View
                                    
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>    <!--center end-->
                        </div>    <!--panel-footer end-->
                        
                    </div>    <!--panel panel-primary end-->
                </div>    <!--col-lg-3 col-md-3 end-->
                
                <?php } ?>
            
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->


