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
                
                <i class="fa fa-dashboard"></i> Dashboard / Cancelled Orders
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> This is the list of orders cancelled by customers
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Order No: </th>
                                <th> Invoice No: </th>
                                <th> Payment Method: </th>
                                <th> Customer ID: </th>
                                <th> Customer Name: </th>
                                <th> Customer Email: </th>
                                <th> Reason for Cancellation: </th>
                                <th> Additional Message from Customer/Optional </th>
                                <th> Details </th>
                                
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                
                                $i=0;
         
                                $get_orders = "select * from customer_cancelled_orders";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $cancel_id = $row_order['cancel_id'];
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $invoice = $row_order['invoice_no'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $customer_name = $row_order['customer_name'];
                                    
                                    $customer_email = $row_order['customer_email'];
                                    
                                    $reason = $row_order['reason'];
                                    
                                    $message = $row_order['message'];
                                    
                                    $i++;
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $cancel_id; ?> </td>
                                <td> <?php echo $order_id; ?> </td>
                                <td> <?php echo $invoice; ?> </td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> <?php echo $c_id; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $reason; ?> </td>
                                <td> <?php echo $message; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                
                                
                                 
                            </tr>    <!--tr end-->
                            
                            <?php } ?>
                            
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