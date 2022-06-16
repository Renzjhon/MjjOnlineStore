<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
  </head>
  <body>
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Order Reports
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->
<?php
        
            $search_date_min = date('Y-m-d');
            $search_date_max = date('Y-m-d');
        
             $display_date_min = date('F j, Y', strtotime($search_date_min));
             $display_date_max = date('F j, Y', strtotime($search_date_max));
            ?>
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Order Reports
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
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
              <button id="daily_order" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Download</button>
            <div class="panel-body" id="pdf">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover"  style=' width: 100%; height: auto;font-size: 11.5px;font-family: sans-serif, Arial, Helvetica; border-collapse: collapse;'>    <!--table table-striped table-bordered table-hover start-->
                       <div style="display:block;text-align:left"><img align="left" src="icons/logo.png" border="0" width="100px" height="100px">
                       <center><h2>Order Report <br> From: <strong><?php echo $display_date_min;?></strong> - <strong><?php echo $display_date_max;?></strong></h2></center>
                       </div>
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Invoice Number: </th>
                                <th> Customer Name: </th>
                                <th> Customer Email: </th>
                                <th> Order Amount: </th>
                                <th> Order Date: </th>
                                <th> Delivery Date: </th>
                                <th> Order Status: </th>
                                <th> Payment Method: </th>
                                
                                <th>  Delivery Rider Name: </th>
                                
                                <th> Details: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        
<?php 
                                
                                $total = 0;
                                $i=0;
         $search_date_max = date('Y-m-d', strtotime($search_date_max. ' + 1 days'));
                                $get_orders = "select * from order_summary WHERE delivery_date BETWEEN '$search_date_min' AND '$search_date_max'";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_orders=mysqli_fetch_array($run_orders)){
                                    
                                    $c_id = $row_orders['customer_id'];
                                    
                                    $total_price = $row_orders['total_price'];
                                    
                                    $invoice = $row_orders['invoice_no'];
                                    
                                    $cancel = $row_orders['cancel'];
                                    
                                    $order_date = $row_orders['order_date'];
                                    
                                    $delivery_date = $row_orders['delivery_date'];
                                    $status = $row_orders['order_status'];
                                    
                                    $payment_method = $row_orders['payment_method'];
                                    $rider_id = $row_orders['rider_id'];
                                    
                                    $get_customers = "select * from customers where customer_id = '$c_id'";
         
                                    $run_customers = mysqli_query($con,$get_customers);
         
                                    $row_customers=mysqli_fetch_array($run_customers);
                                    
                                    $c_name = $row_customers['customer_name'];
                                    
                                    $c_email = $row_customers['customer_email'];
                                    
                                    $get_rider = "select * from riders where rider_id = '$rider_id'";
         
                                    $run_rider = mysqli_query($con,$get_rider);
         
                                    $row_rider =mysqli_fetch_array($run_rider);
                                    if($row_rider == NULL){
                                        $r_name = "No one accept it yet";
                                    }
                                    else{
                                    $r_name = $row_rider['rider_name'];
                                    }
                                    
                                    $order_d_date = date('F j, Y', strtotime($order_date));
                                    $delivery_date = date('F j, Y', strtotime($delivery_date));
                                    
                                    
                                 
                                    
                                
                            
                            ?>


                        <tbody>    <!--tbody start-->
                            
                            
                            
                            <?php         
                                if($cancel != "Cancelled"){
                               $i++;
                            ?>
                            
                            <tr>    <!--tr start-->
                             
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $invoice; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> ₱ <?php echo $total_price; ?> </td>
                                <td> <?php echo $order_d_date; ?> </td>
                                <td> <?php echo $delivery_date; ?> </td>
                                <td> <?php echo $status; ?> </td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> <?php echo $r_name; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                 
                            </tr>    <!--tr end-->
                            <?php }?>
                            
                        </tbody>    <!--tbody end-->
                        
 <?php } ?>
                       
                        
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
    document.getElementById("daily_order")
    .addEventListener("click",()=>{
        
        const pdf = this.document.getElementById("pdf");
        console.log(pdf);
        console.log(window); 
        var opt= {
            filename:       'Daily_Order_Reports.pdf',
            image:          { type: 'jpeg', quality: 0.98},
        };
        
        
        html2pdf().from(pdf).set(opt).save();
    })
    
}



</script>




 
  </body>
</html>




<?php 

        }

?>