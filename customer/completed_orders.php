<center>    <!--center start-->
    
    <h1> My Past Orders</h1>
    
    <p class="lead"> Your Completed  Orders in One Place</p>
    
    
    
    <p class="text-muted">
        
       If you have any questions<a href="../contact.php"> Contact Us</a>. Our Customer Service are open <strong>24/7</strong>
        
    </p>
    
</center>    <!--center end-->


<hr>


<div class="table-responsive"> <!--table-responsive start-->
    
    <table class="table table-bordered table-hover">    <!--table table-bordered table-hover end-->
        
        <thead>    <!--thead start-->
            
            <tr>    <!--tr start-->
                
                <th> On: </th>
                
                <th> Invoice No:</th>
                <th> Order Date: </th>
                
                <th> Status: </th>
                <th> Delivery Date: </th>
                <th> Payment Method: </th>
                <th> Amount: </th>
                <th> Details: </th>
                <th> Receipt: </th>
                
                
            </tr>    <!--tr end-->
            
        </thead>    <!--thead end-->
        
        <tbody>    <!--tbody start-->
           
           <?php 
            
            $total = 0;
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from order_summary where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['total_price'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $order_date = $row_orders['order_date'];
                
                
                $display_date = date('F j, Y', strtotime($order_date));
                
                $delivery_date = $row_orders['delivery_date'];
                
                $delivery_date = date('F j, Y', strtotime($delivery_date));
                
                
                
                
                
                
                
                $order_status = $row_orders['order_status'];
                
                $payment_method = $row_orders['payment_method'];
                
                $total += $due_amount;
                
                $i++;
                
                if($order_status == "Delivered"){
            
            ?>
            
            
            <tr>    <!--tr start-->
                
                <th> <?php echo $i; ?> </th>
                
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $display_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
               <td> <?php echo $delivery_date; ?> </td>
                <td> <?php echo $payment_method; ?> </td>
                <td> ₱ <?php echo $due_amount; ?> </td>
                 <td><a href="my_account.php?order_details=<?php echo $invoice_no; ?>">
                            <i class='fa fa-eye'></i> View Details
                    </a>  </td>
                     <td><a href="order_receipt.php?invoice_no=<?php echo $invoice_no; ?>">
                            <i class='fa fa-eye'></i> View Receipt
                    </a>  </td>
                
            </tr>    <!--tr end-->
            
            

            
        </tbody>    <!--tbody end-->
                <?php } ?>
                 <?php } ?>
        
       
    </table>    <!--table table-bordered table-hover end-->
    
</div>    <!--table-responsive end-->


































