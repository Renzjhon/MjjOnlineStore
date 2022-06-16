<?php 
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Reports / Weekly Rider Reports
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Weekly Rider Reports
                 
                    
                </h3>    <!--panel-title end-->
                <h3 class="panel-title">    <!--panel-title start-->
                    <center><strong>
                   How many orders the riders delivered
                    </strong></center>
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
             <?php
        
        error_reporting(E_ALL ^ E_WARNING); 
       
                
                $date_today = date('Y-m-d');
                $week = date("W", strtotime("$date_today"));
                $year = date('Y');
                $week = "$year-W$week";
        
                $search_date = date("Y-m-d", strtotime("$week"));
           
        
             $display_date = date('F j, Y', strtotime($search_date));
            $d1 = $search_date;
                
           
            $d2 = date('Y-m-d', strtotime($display_date. ' + 1 days'));
            $d3 = date('Y-m-d', strtotime($display_date. ' + 2 days'));
            $d4 = date('Y-m-d', strtotime($display_date. ' + 3 days'));
            $d5 = date('Y-m-d', strtotime($display_date. ' + 4 days'));
            $d6 = date('Y-m-d', strtotime($display_date. ' + 5 days'));
            $d7 = date('Y-m-d', strtotime($display_date. ' + 6 days'));
            
            $display_date_last = date('F j, Y', strtotime($d7));
            ?>
            <h1><center>Pick A Week</center></h1>
            
            <form action="" class="form-horizontal" method="post"> 
             <center><input type='week' id='' name="week" placeholder="Select Week" /></center><br>
             <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <center><input value="Search" name="update" type="submit" class="form-control btn btn-primary" style="background-color:green;"></center>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
            </form>
             <?php 
            if(isset($_POST['update'])){
             $raw_date = $_POST['week'];
                
                if($raw_date == NULL){
                    
                    $week = date("W", strtotime("$date_today"));
                    $year = date('Y');
                    $search_date = "$year-W$week";
                }
                else {
                    $search_date = $raw_date;
                }
            
            $search_date = date("Y-m-d", strtotime("$search_date"));
         
            $display_date = date('F j, Y', strtotime($search_date));
            
            $d1 = $search_date;
                
           
            $d2 = date('Y-m-d', strtotime($display_date. ' + 1 days'));
            $d3 = date('Y-m-d', strtotime($display_date. ' + 2 days'));
            $d4 = date('Y-m-d', strtotime($display_date. ' + 3 days'));
            $d5 = date('Y-m-d', strtotime($display_date. ' + 4 days'));
            $d6 = date('Y-m-d', strtotime($display_date. ' + 5 days'));
            $d7 = date('Y-m-d', strtotime($display_date. ' + 6 days'));
            
            $display_date_last = date('F j, Y', strtotime($d7));
            
            }
            ?>
            
             <button id="download" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Download</button>
            <div class="panel-body" id="pdf">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover" >    <!--table table-striped table-bordered table-hover start-->
                       <div style="display:block;text-align:left"><img align="left" src="icons/logo.png" border="0" width="100px" height="100px"><center><h2>Weekly Rider Report <br> Date: <strong><?php echo $display_date;?> - <?php echo $display_date_last;?></strong></h2></center></div>
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
                                $get_riders = "select * from riders";
         
                                $run_riders = mysqli_query($con,$get_riders);
         
                                while($row_riders=mysqli_fetch_array($run_riders)){
                                    
                                $r_id = $row_riders['rider_id'];
                                $r_name = $row_riders['rider_name'];
                                $r_email = $row_riders['rider_email'];
                                $r_contact = $row_riders['rider_contact'];
                                    $i = 0;
                                $get_orders = "select * from order_summary where rider_id='$r_id'";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_orders=mysqli_fetch_array($run_orders)){
                                    
                                    $date = $row_orders['delivery_date'];
                                    
                                    if($d1 == $date || $d2 == $date || $d3 == $date || $d4 == $date || $d5 == $date || $d6 == $date || $d7 == $date){
                                    $i++;
                                    }
                                
                                }
                            ?>
                           <tr>
                               <td><?php echo $r_name; ?></td>
                               <td><?php echo $r_email; ?></td>
                               <td><?php echo $r_contact; ?></td>
                               <td style="font-size:20px;"><center><strong><?php echo $i; ?></strong></center></td>
                               <td><a href="index.php?weekly_rider_order_details=<?php echo $r_id; ?>&date=<?php echo $d1?>">
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
            filename:       'Weekly_Rider_Reports.pdf',
            image:          { type: 'jpeg', quality: 0.98},
        };
        
        
        html2pdf().from(pdf).set(opt).save();
    })
    
}



</script>





<?php 

        }

?>