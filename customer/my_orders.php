<center>    <!--center start-->
    
    <h1> My Ongoing Orders</h1>
    
    <p class="lead"> Your Order in One Place</p>
    
    <p>The Delivery date are 1 week or below after the ordering date. please prepare your payment by then</p>
    
    <p class="text-muted">
        
       If you have any questions<a href="../contact.php">Contact Us</a>. Our Customer Service are open <strong>24/7</strong>
        
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
                <th> Confirm <br/>Delivered: </th>
                <th> Cancel <br/>Order: </th>
                
                
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
                $delivery_date = $row_orders['delivery_date'];
                
                $order_date = date('F j, Y', strtotime($order_date));
                $delivery_date = date('F j, Y', strtotime($delivery_date));
                
                
               /*         -----------------------------------------------------------------------------------------*/
                
                $cancelori = $row_orders['cancel'];
                
                $review = $row_orders['review'];
                
                
                
                $order_status = $row_orders['order_status'];
                
                $payment_method = $row_orders['payment_method'];
                $c_verify = $row_orders['Customer_verify'];
                $r_verify = $row_orders['Rider_verify'];
                
                $rider = $row_orders['rider_id'];
                
                $total += $due_amount;
                
                $i++;
                
                
                
                if($order_status != "Delivered" && $cancelori =="NotCancel" && $review =="Reviewed"){
            
            ?>
            
            
            <tr>    <!--tr start-->
                
                <th> <?php echo $order_id; ?> </th>
                
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
               <td> <?php echo $delivery_date; ?> </td>
                <td> <?php echo $payment_method; ?> </td>
                <td  style="width: 100px;"> ₱ <?php echo $due_amount; ?> </td>
                <td><a href="my_account.php?order_details=<?php echo $invoice_no; ?>">
                            <i class='fa fa-eye'></i> View Details
                    </a>  </td>
                
                
                <?php if($order_status == "In Transit" && $rider != NULL ){ 
                    
                        if($c_verify == 1 && $r_verify == 0){ 
                        echo "<td><p style='color:gray;'> Waiting for Rider Confirmation</p></td>";
                        }
                        else{
                ?>
                        
                        
                <td>
                           
                    <a href="my_account.php?confirm_delivered=<?php echo $invoice_no; ?>">
                            <i class='fa fa-check'></i> Confirm
                    </a> 
                   
                </td>
                        
                
                
                <?php 
                    }
            
            }
                    
                else{
                    echo "<td></td>";
                    
                }
                ?>
                <td> <a href="my_account.php?cancel_order=<?php echo $invoice_no; ?>">
                            <i class="fa fa-trash-o"></i> Cancel
                    </a>  </td>
                 
                
            </tr>    <!--tr end-->
            
            
            
            
        </tbody>    <!--tbody end-->
         
        
                                <?php } ?>
        <?php }?>
       
    </table>    <!--table table-bordered table-hover end-->
    
</div>    <!--table-responsive end-->


























