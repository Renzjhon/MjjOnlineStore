<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{
?>

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / Gcash Order Review
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Gcash Order Review
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Customer Name: </th>
                                <th> Customer Email: </th>
                                <th> Invoice Number: </th>
                                <th> Screenshot Proof: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Details: </th>
                                <th> Review: </th>
                                
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
                                    
                                    
                                    
                                    $ss_proof = $row_order['ss_proof'];
                                    
                                    
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $payment = $row_order['payment'];
                                    
                                    $cancel = $row_order['cancel'];
                                    
                                    $review = $row_order['review'];
                                    
                                        if($cancel == "NotCancel" && $review == "Unreviewed"){
                                    
                                    
                                            $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                            $run_customer = mysqli_query($con,$get_customer);
                                    
                                            $row_customer = mysqli_fetch_array($run_customer);
                                    
                                            
                                            $customer_name = $row_customer['customer_name'];
                                            
                                            $customer_email = $row_customer['customer_email'];
                                    
                                            $customer_address = $row_customer['customer_address'];
                                    
                                            $order_date = $row_order['order_date'];
                                            
                                            $order_date = date('F j, Y', strtotime($order_date));
                                    
                                            $order_amount = $row_order['total_price'];
                                    
                                            $i++;
                                            
                                            if($payment_method == "Gcash"){
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <center><img src="gcash_proof/<?php echo $ss_proof; ?>" width="60" height="60">  </center></td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> ₱ <?php echo $order_amount; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice_no; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                
                                <td> 
                                    <a href="index.php?gcash_review=<?php echo $invoice_no; ?>">
                                    
                                        <i class="fa fa-book"></i> Review Order
                                    
                                    </a> 
                                </td>
                                 
                            </tr>    <!--tr end-->
                            
                            <?php } 
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