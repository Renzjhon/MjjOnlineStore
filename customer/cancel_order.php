<?php 

     if(isset($_GET['cancel_order'])){
             
        $order_cancel_id = $_GET['cancel_order'];
         
        
            
            $edit_order = "select * from order_summary where invoice_no='$order_cancel_id'";
            
            $run_order = mysqli_query($con,$edit_order);
            
            $row_order = mysqli_fetch_array($run_order);
            
            $order_id = $row_order['order_id'];
            
            $invoice = $row_order['invoice_no'];
            
            $status = $row_order['order_status'];
            
            $payment_method = $row_order['payment_method'];
         
            $c_id = $row_order['customer_id'];
         
            $edit_customer = "select * from customers where customer_id='$c_id'";
            
            $run_customer = mysqli_query($con,$edit_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_email = $row_customer['customer_email'];
            
            
            
        }
         
      ?>
<?php 
        
        if($status == "In Transit" || $status == "Delivered"){
             
        echo "<script>alert('Sorry the order is in delivery already so you cant cancel it')</script>";
                 
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        }

    else{
    
   
    


?>
  
<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Cancel Order
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
              
               <h3><center>Customer name: <strong><?php echo $customer_name;?></strong></center></h3>
               <h3><center>Payment Method: <strong><?php echo $payment_method;?></strong></center></h3>
                
                <h3><small><center>Invoice Number: <strong><?php echo $invoice;?></strong></center></small></h3>
                
                <h3><center><small>This will be emailed to the store</small></center></h3>
                <?php 
                    if($payment_method == "Cash On Delivery"){
                        
                    }
                    else{
                        ?>
                        
                        
                        <h3><center><small>The order you want to cancel is already paid. <br> Our policy for paid cancelled orders <br> is only exchanged item through walk-in. Please upload <br>Screeshot of your receipt to verify your exchanged item request <br> <a href="../termsandcondition.php" target="_blank">Click here for more information</a></small></center></h3>
                        
                        
                        <?php
                    }

                    
                
                ?>
                
                
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                   <div class="form-group">    <!--form-group start-->
                            <br>
                            <label class="col-md-3 control-label"> What is the reason for <br>cancellation? &nbsp;&emsp;</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="reason" class="form-control" size="1" required>    <!--form-control start-->
                                    
                                    <option selected disabled> Select the Reason </option>
                                    
                                    <option value="Change of mind"> Change of mind</option>
                                       
                                    <option value="Too Expensive"> Too Expensive </option>
                                       
                                    <option value="Others"> Others </option>
                                        
                                       
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <?php 
                            if($payment_method == "Gcash" || $payment_method == "Paypal"){
                    ?>
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Upload the ss of your payment proof:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                <br>
                                <input name="ss_payment" type="file" class="form-control" accept="image/*" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <?php }?>
                        <br>
                       
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Additional Message/optional</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="message" cols="19" rows="9" class="form-control" ></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                   <br>
                    <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" type="submit" value="Send Email and Cancel Order"  class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['submit'])){
            
            
            
            $reason = $_POST['reason'];
            
            $message = $_POST['message'];
            
            $cancel = "Cancelled";
            
            $ss_payment = "NotAvailable";
            
            if($payment_method == "Gcash" || $payment_method == "Paypal"){
            
            
            $ss_payment = $_FILES['ss_payment']['name'];
    
            $temp_name1 = $_FILES['ss_payment']['tmp_name'];
           
    
            move_uploaded_file($temp_name1,"../admin_area/refund_pics/$ss_payment");
              }
            else{
                $ss_payment = "NotAvailable";
            }
      
            $update_order = "update pending_orders set cancel='$cancel' where invoice_no='$invoice'";
             
            $run_order= mysqli_query($con,$update_order);
            
            $update_s = "update order_summary set cancel='$cancel' where invoice_no='$invoice'";
             
            $run_order= mysqli_query($con,$update_s);
            
            
            
           /* ------------------------for updating inventory and inventory report-----------------------------------*/
            
            $get_order = "select * from pending_orders where invoice_no = '$invoice'";
                            
                                $run_order = mysqli_query($con,$get_order);
        
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $p_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $get_inventory = "select * from inventory where product_id = '$p_id'";
                                    
                                    $run_inventory = mysqli_query($con,$get_inventory);
        
                                    $row_inventory=mysqli_fetch_array($run_inventory);
                                    
                                    $initial_stock = $row_inventory['qty_stock'];
                                    
                                    $updated_stock = $initial_stock + $qty;
                                    
                                    $update_inventory = "update inventory set qty_stock='$updated_stock' where product_id='$p_id'";
             
                                    $run_inventory= mysqli_query($con,$update_inventory);
                                    
                                    $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$p_id','$updated_stock',NOW())";
    
                                    $run_inventory_report = mysqli_query($con,$insert_inventory_report);
                                    
                                }
            
            
            $insert_cancelled = "insert into customer_cancelled_orders (order_id,invoice_no,payment_method,customer_id,customer_name,customer_email,reason,message,ss_payment) values ('$order_id','$invoice','$payment_method','$c_id','$customer_name','$customer_email','$reason','$message','$ss_payment')";
             
             $run_cancel = mysqli_query($con,$insert_cancelled);
             
             
                
                $receiver = "mjjaluminumandglassworks@gmail.com";
                $subject = "Customer Cancellation";
                $body = "
                
                Good Day MJJ Team!
                
                A customer cancelled his/her order.
                
                
                ---------------------Customer Cancellation Information---------------------
                
                Customer name: $customer_name
                
                Order Invoice No: $invoice
                
                Customer reason for cancellation: $reason.
                
                Customer additional message:
                
                $message.
                
                
                
                
                
                ";
                $sender = "From: admin@mjjaluminumandglassworks.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "Email sent successfully to $receiver";
                }else{
                echo "Sorry, failed while sending mail!";
                }
                  
                 echo "<script>alert('The Order has been cancelled and have been emailed to store')</script>";
                 
                 echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                 
                 
                 
             
        
      
        }
    }
?>


