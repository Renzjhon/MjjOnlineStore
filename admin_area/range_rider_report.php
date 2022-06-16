<?php 
error_reporting(E_ALL ^ E_WARNING); 
    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / Reports / Daily Rider Reports
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Daily Rider Reports
                    
                    
                </h3>    <!--panel-title end-->
                <h3 class="panel-title">    <!--panel-title start-->
                    <center><strong>
                   How many orders the riders delivered
                    </strong></center>
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
             <?php
         $search_date_min = date('Y-m-d');
            $search_date_max = date('Y-m-d');
        
             $display_date_min = date('F j, Y', strtotime($search_date_min));
             $display_date_max = date('F j, Y', strtotime($search_date_max));
            ?>
            <h1><center>Pick A Range</center></h1>
            
            <form action="" class="form-horizontal" method="post"> 
             <center><strong style=" font-size: 20px;">From: </strong><input type='date' id='' name="date_min" placeholder="Select Date" max="<?php echo $search_date_min?>" /></center><br>
            <center><strong style=" font-size: 20px;">To: </strong><input type='date' id='' name="date_max" placeholder="Select Date" max="<?php echo $search_date_max?>" /></center><br>
             <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <center><input value="Search" name="update" type="submit" class="form-control btn btn-primary" style="background-color:green;"></center>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
            </form>
             <?php 
            if(isset($_POST['update'])){
            
           
            
            $raw_date_min = $_POST['date_min'];
            $raw_date_max = $_POST['date_max'];
                if($raw_date_min == NULL && $raw_date_max != NULL){
                    $search_date_min = date('Y-m-d');
                    $search_date_max = $raw_date_max;
                }
                elseif($raw_date_max == NULL && $raw_date_min != NULL){
                    $search_date_max = date('Y-m-d');
                     $search_date_min = $raw_date_min;
                }
                
                elseif($raw_date_max == NULL && $raw_date_min == NULL){
                    $search_date_min = date('Y-m-d');
                    $search_date_max = date('Y-m-d');
                }
                else {
                    $search_date_min = $raw_date_min;
                    $search_date_max = $raw_date_max;
                }
            
            $display_date_min = date('F j, Y', strtotime($search_date_min));
            $display_date_max = date('F j, Y', strtotime($search_date_max));
                
                if($search_date_min > $search_date_max){
                    echo "<script>alert('The from date cannot be ahead of to date')</script>";
                    echo "<script>window.open('index.php?range_sales_report','_self')</script>";
                }
            
            }
            ?>
            
               <button id="download" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Download</button>
            <div class="panel-body" id="pdf">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover" >    <!--table table-striped table-bordered table-hover start-->
                        <div style="display:block;text-align:left"><img align="left" src="icons/logo.png" border="0" width="100px" height="100px"><center><h2>Rider Report <br> From: <strong><?php echo $display_date_min;?></strong> - <strong><?php echo $display_date_max;?></strong></h2></center></div>
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Rider Name </th>
                                <th> Rider Email: </th>
                                <th> Rider Contact: </th>
                                <th> Orders Delivered: </th>
                                <th> Details: </th>
<!--                                <th> Product Delete: </th>-->
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                                                            <!--for gcash-->
                                <?php 
                                $get_riders = "select * from riders ";
         
                                $run_riders = mysqli_query($con,$get_riders);
         
                                while($row_riders=mysqli_fetch_array($run_riders)){
                                    
                                $r_id = $row_riders['rider_id'];
                                $r_name = $row_riders['rider_name'];
                                $r_email = $row_riders['rider_email'];
                                $r_contact = $row_riders['rider_contact'];
                                    $i = 0;
                                    $search_date_max = date('Y-m-d', strtotime($search_date_max. ' + 1 days'));
                                $get_orders = "select * from order_summary where rider_id='$r_id' and delivery_date BETWEEN '$search_date_min' AND '$search_date_max'";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_orders=mysqli_fetch_array($run_orders)){
                                    $i++;
                                
                                }
                            ?>
                           <tr>
                               <td><?php echo $r_name; ?></td>
                               <td><?php echo $r_email; ?></td>
                               <td><?php echo $r_contact; ?></td>
                               <td style="font-size:20px;"><center><strong><?php echo $i; ?></strong></center></td>
                               <td><a href="index.php?daily_rider_order_details=<?php echo $r_id; ?>&date=<?php echo $search_date?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                           </tr>
                            <?php }?>
                        </tbody>    <!--tbody end-->
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
                <?php 
                
                $admin_email = $_SESSION['admin_email'];
                
                $get_admin = "select * from admins where admin_email = '$admin_email'";
         
                                $run_admin = mysqli_query($con,$get_admin);
         
                                $row_admin=mysqli_fetch_array($run_admin);
                                    
                                    $admin_name = $row_admin['admin_name'];
        
        
        
                                 date_default_timezone_set('Asia/Manila');
                                     
                                $date = date('Y-m-d H:i:s');
                               
                                $date_now = date('F j, Y ', strtotime($date));
                                $time_now = date('h:i A', strtotime($date));
        
        
                
                
                ?>
                
                <footer> <strong>
                    Generated by: <?php echo $admin_name; ?> <br>
                    Date: <?php echo $date_now;?> <br>
                    Time: <?php echo $time_now;?>
                    
                </strong></footer>
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->






<script>
    
      window.onload = function(){
    document.getElementById("download")
    .addEventListener("click",()=>{
        
        const pdf = this.document.getElementById("pdf");
        console.log(pdf);
        console.log(window); 
        var opt= {
            filename:       'Daily_Rider_Reports.pdf',
            image:          { type: 'jpeg', quality: 0.98},
        };
        
        
        html2pdf().from(pdf).set(opt).save();
    })
    
}



</script>







<?php 

        }

?>