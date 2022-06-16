<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['monthly_rider_order_details'])){
            
                                error_reporting(E_ERROR | E_PARSE);
            
            $edit_rider = $_GET['monthly_rider_order_details'];
            
            $date = $_GET['date'];
            
            $get_rider = "select * from order_summary where rider_id='$edit_rider'";
            
            $run_rider = mysqli_query($con,$get_rider);
            
            $row_rider = mysqli_fetch_array($run_rider);
            
            $rider_id = $row_rider['rider_id'];
            
            
        }

?>

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / Delivery Rider Orders Details
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Delivery Rider Orders Details
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Customer Address: </th>
                                <th> Invoice Number: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Payment Method: </th>
                                <th> Payment: </th>
                                <th> Status: </th>
                                <th> Details: </th>
                                
                                
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                error_reporting(E_ERROR | E_PARSE);
                                
                                $i=0;
         
                                $get_orders = "select * from order_summary where rider_id ='$rider_id' and DATE_FORMAT(delivery_date, '%Y-%m') = '$date'";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $payment = $row_order['payment'];
                                    
                                    $cancel = $row_order['cancel'];
                                    
                                    $review = $row_order['review'];
                                    
                                    $rider_id = $row_order['rider_id'];
                                    
                                    if($cancel == "NotCancel" && $review == "Reviewed" && $order_status == "Delivered" ){
                                    
                                    
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $customer_address = $row_customer['customer_address'];
                                    
                                   
                                    
                                    $order_date = $row_order['order_date'];
                                        $order_date = date('F j, Y', strtotime($order_date));
                                    
                                    $order_amount = $row_order['total_price'];
                                        
                                    $r_verify = $row_order['Rider_verify'];
                                    $c_verify = $row_order['Customer_verify'];
                                        
                                    
                                        
                                     
                                    $i++;
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $customer_address; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> ₱ <?php echo $order_amount; ?> </td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> <?php echo $payment; ?> </td>
                                <td> <?php echo $order_status; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice_no; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                               
                                
                                 
                            </tr>    <!--tr end-->
                            
                            <?php }} ?>
                            
                        </tbody>    <!--tbody end-->
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->






























<?php 

        }

?>