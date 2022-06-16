
       
<?php
       
        
       if(isset($_GET['return_item_approval'])){
            
            $refund_review_id = $_GET['return_item_approval'];
            
            $edit_refund = "select * from refund where refund_id='$refund_review_id'";
            
            $run_refund = mysqli_query($con,$edit_refund);
            
            $row_refund = mysqli_fetch_array($run_refund);
            
            $refund_id = $row_refund['refund_id'];
            
            $customer_id = $row_refund['customer_id'];
            
            $customer_name = $row_refund['customer_name'];
            
            $customer_email = $row_refund['customer_email'];
            
            $productservice_name = $row_refund['productservice_name'];
           
            $quantity = $row_refund['quantity'];
            
            $payment_method = $row_refund['payment_method'];
            
            $issue = $row_refund['issue'];
            
            $issue_img = $row_refund['issue_img'];
            
            $receipt = $row_refund['receipt'];
            
            $status = $row_refund['status'];
       }

?>
        <?php 

            $get_c_info = "select * from customers where customer_name='$customer_name'";
            
            $run_edit = mysqli_query($con,$get_c_info);
        
            $row_edit = mysqli_fetch_array($run_edit);
        
            $customer_id = $row_edit['customer_id'];


?>
        
        
        <?php 
         
                                $get_pro = "select * from products";
         
                                $run_pro = mysqli_query($con,$get_pro);
         
                                

?>
  
<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Return Item / Repair Service / Aprroval form
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
              
               
               <br>
               <h3 style="color:blue;"><center>Return/Repair Form</center></h3>
                
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Customer Name:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="customer_name" type="text" class="form-control" required autocomplete="off" value="<?php echo $customer_name;?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Customer Email:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="customer_email" type="text" class="form-control" required autocomplete="off" value="<?php echo $customer_email;?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Products name </label>
                            
                            <div class="form-group">    <!--form-group start-->
                             
                                   <select name="product" class="form-control" size="1" required style="width: 300px;" id="product">    <!--form-control start-->
                                   
                                 <option value="" selected style="display:none">Product Name</option>
                                   <?php
                                   while($row_pro=mysqli_fetch_array($run_pro)):
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    
                                   
                                    
                                    $pro_date = $row_pro['date'];
                                    
                                    
                                
                                       ?>
                                    
                                   
                                    
                                    <option value="<?php echo $row_pro[3];?>"><?php echo $row_pro[3];?></option>
                                    
                                    <?php endwhile; ?>
                                   
                                       
                                </select>    <!--form-control end-->
                </div>
                           <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Payment Method</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="payment_method" type="text" class="form-control" required autocomplete="off" value="<?php echo $payment_method?>" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                            
                        </div>    <!--form-group end-->
                       
                        <div class="form-group">    <!--form-group start-->
                           
                            
                            <label class="col-md-3 control-label"> Product Quantity/How Many? </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input value="<?php echo $quantity?>" name="quantity" type="number" class="form-control" min="0">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                         <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Estimated Delivery Date: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <?php $date_today = date('Y-m-d'); ?>    
                               <input name="date" type="date" class="form-control" min="<?php echo $date_today ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                       
                        
                        
                        
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Confirm Return Item" type="submit" class="btn btn-primary form-control" style="color:black; font-size:18px;">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                    </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['submit'])){
            
            $refund_status = "Settled";
            
            $customer_name = $_POST['customer_name'];
            
            $customer_email = $_POST['customer_email'];
            
            $product = $_POST['product'];
            
            $get_c_info = "select * from products where product_title='$product'";
            
            $run_edit = mysqli_query($con,$get_c_info);
        
            $row_edit = mysqli_fetch_array($run_edit);
            
             $product_id = $row_edit['product_id'];
            
            
            $payment_method = $_POST['payment_method'];
            
            $quantity = $_POST['quantity'];
            
            $delivery_d = $_POST['date'];
            
             $delivery_date = date('F j, Y', strtotime($delivery_d));
            
            $status = "On Process";

            $sub_total = 0;
            

            $payment = "Paid";

            $invoice_no = mt_rand();
        
            
            $update_inventory = "select * from inventory where product_title='$product'";
    
            $run_inventory = mysqli_query($con,$update_inventory);
   
            $row_inventory = mysqli_fetch_array($run_inventory);
            
            $ori_qty = $row_inventory['qty_stock'];
            
            $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,order_date,order_status,payment_method,payment) values ('$customer_id','$sub_total','$invoice_no','$quantity',NOW(),'$status','$payment_method','$payment')";
        
            $run_customer_order = mysqli_query($con,$insert_customer_order);
            
        
            $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status,payment_method,payment) values ('$customer_id','$invoice_no','$product_id','$quantity','$status','$payment_method','$payment')";
        
       
            $run_pending_order = mysqli_query($con,$insert_pending_order);
            
             $get_total = "select sum(due_amount) as total from customer_orders where invoice_no = '$invoice_no'";
                            
                                $run_total = mysqli_query($con,$get_total);
                                $row=mysqli_fetch_array($run_total);

                                    $total_price = $row['total'];

                
            


        $c_verify = 0;

        $r_verify = 0;

        $insert_order_summary = "insert into order_summary (customer_id,total_price,invoice_no,order_date,delivery_date,order_status,payment_method,payment,Customer_verify,Rider_verify) values ('$customer_id','$total_price','$invoice_no',NOW(),'$delivery_d','$status','$payment_method','$payment','$c_verify','$r_verify')";
        
       
        $run_order_summary = mysqli_query($con,$insert_order_summary);
            
            $update_refund = "update refund set status='$refund_status' where refund_id='$refund_review_id'";
              
            $run_refund = mysqli_query($con,$update_refund);
        
            $updated_stock = $ori_qty - $quantity;
            
            
            $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$product_id','$updated_stock',NOW())";
    
            $run_inventory_report = mysqli_query($con,$insert_inventory_report);
        
            $update_inventory = "update inventory set qty_stock='$updated_stock' where product_title='$product'";
              
            $run_inventory = mysqli_query($con,$update_inventory);
            
            if($run_inventory){
                
                $receiver = "$customer_email";
                $subject = "Return Item Approved";
                $body = "
                
                Good day Mr/Ms, $customer_name
                
                We apologize for inconvenience
                
                Your return product has been approved.

                Please wait for the item to be delivered.
                
                one of our employee will go back to your place to replace the order
                the estimated date of refund item will be on
                
                $delivery_date 
                
                you can also check the status of your item in our website mjjaluminumandglassworks.com
                thank you and have a great day.
                
                We hope for your kind consideration.
                Thank you for raising your concerns.
                
                Thank you 
                From MJJ Team
                ";
                
                
                
                $sender = "From: admin@mjjaluminumandglassworks.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "Email sent successfully to $receiver";
                }else{
                echo "Sorry, failed while sending mail!";
                }
                 
                 echo "<script>alert('The product has been deducted to inventory and place to customer orders and customer has been emailed')</script>";
                 
                 echo "<script>window.open('index.php?return_item','_self')</script>";
                
                
                 
             }
           
           
        
      
        }
    
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="js/select2.min.js"></script>
<script>
$("#product").select2( {
	placeholder: "Select product",
	allowClear: true
	} );
</script>

