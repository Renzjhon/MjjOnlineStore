<?php 

    if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{
?>

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Deliveries
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Deliveries
                    
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
                                <th> Status: </th>
                                <th> Rider Name: </th>
                                
                                <th> Details: </th>
                                
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                
                                $i=0;
         
                                $get_orders = "select * from order_summary";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                     $cancel = $row_order['cancel'];
                                    
                                    if($order_status == 'Delivered' && $cancel == "NotCancel"){
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $customer_address = $row_customer['customer_address'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_amount = $row_order['total_price'];
                                        
                                    $rider_id = $row_order['rider_id'];
                                        
                                    $get_rider = "select * from riders where rider_id='$rider_id'";
                                    
                                    $run_rider = mysqli_query($con,$get_rider);
                                    
                                    $row_rider = mysqli_fetch_array($run_rider);
                                    
                                    $rider_name = $row_rider['rider_name'];
                                        
                                    
                                    $order_date = date('F j, Y', strtotime($order_date));
                                    
                                    $i++;
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $customer_address; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> ₱ <?php echo $order_amount; ?> </td>
                                <td> <?php echo $order_status; ?> </td>
                                
                                <td> <?php echo $rider_name; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice_no; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                
                                 
                            </tr>    <!--tr end-->
                            
                            <?php }
                                }?>
                            
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