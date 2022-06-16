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
                                <th> Payment Method: </th>
                                <th> Payment: </th>
                                <th> Details: </th>
                                <th> Accept Delivery: </th>
                                
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
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $payment = $row_order['payment'];
                                    
                                    $cancel = $row_order['cancel'];
                                    
                                    $review = $row_order['review'];
                                    
                                        if($order_status == 'In Transit' && $cancel == "NotCancel" && $review == "Reviewed"){
                                    
                                           
                                    
                                            $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                            $run_customer = mysqli_query($con,$get_customer);
                                    
                                            $row_customer = mysqli_fetch_array($run_customer);
                                    
                                            $customer_email = $row_customer['customer_email'];
                                    
                                            $customer_address = $row_customer['customer_address'];
                                            
                                            $city = $row_customer['customer_city'];
                                            
                                            $country = $row_customer['customer_country'];
                                    
                                            
                                    
                                            $order_date = $row_order['order_date'];
                                            $order_date = date('F j, Y', strtotime($order_date));
                                    
                                            $order_amount = $row_order['total_price'];
                                            
                                            $c_verify = $row_order['Customer_verify'];
                                            $r_verify = $row_order['Rider_verify'];
                                            $r_id = $row_order['rider_id'];
                                    
                                            $i++;
                                            if($r_id == NULL){
                                            
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $customer_address?> <?php echo $city?> <?php echo $country?></td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> ₱ <?php echo $order_amount; ?> </td>
                                <td> <?php echo $order_status; ?> </td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> <?php echo $payment; ?> </td>
                                <td>    
                                   
                                   <a href="index.php?order_details=<?php echo $invoice_no; ?>" target="_self">
                                    
                                        <i class="fa fa-eye"></i> View Details
                                    
                                    </a> 
                                
                                </td>
                                <td>    
                                   
                                   <a href="index.php?accept_order=<?php echo $invoice_no; ?>" target="_self">
                                    
                                        <i class="fa fa-check"></i> Accept
                                    
                                    </a> 
                                
                                </td>
                                
                                
                               
                                 
                            </tr>    <!--tr end-->
                            
                            <?php 
                                            }
                                            } 
                            
                                }
                            ?>
                            
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