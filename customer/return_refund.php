
       
<?php
       $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email = '$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_id = $row_customer['customer_id'];
        
        $customer_name = $row_customer['customer_name'];
        
        $customer_email = $row_customer['customer_email'];

       
?>
  
<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Return Item / Repair Services
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
              
               <h3><center>Return/Exchanged Policy for Products</center></h3>
               <h3 style="color:green; font-size:15px;"><center><strong>“The company will accept return products within 7 days after the delivery date.”</strong></center></h3>
               <h3 style="color:green; font-size:15px;"><center><strong>“The cancelation and item exchanged will only be accepted before the item is in transit status.”</strong></center></h3>
                
                
                <h3><center>Repair/Refund Policy for Services</center></h3>
               <h3 style="color:green; font-size:15px;"><center><strong>“The company will accept repair services within 1month after the services started.” </strong></center></h3>
               <h3 style="color:green; font-size:15px;"><center><strong>“In the services the company will accept refund
if there are no services started”</strong></center></h3>
              
              <h3><center>Exchange Item Policy</center></h3>
               <h3 style="color:green; font-size:15px;"><center><strong>“Exchange Item will be process on the store.” </strong></center></h3>
               
               
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
                            
                            <label class="col-md-3 control-label"> Invoice No: <br>(Type Service if not a product)</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="invoice" type="text" class="form-control" required autocomplete="off" placeholder="type Service if not a product">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> What kind of product/services? </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="productservice_name" type="text" class="form-control" required autocomplete="off" size="5">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Quantity(Leave empty if service) </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input name="quantity" type="number" class="form-control" min="0" step="1" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                           <label class="col-md-3 control-label"> What is the payment method used?</label>
                            <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <select name="payment_method" class="form-control" size="1" required>    <!--form-control start-->
                                    
                                    <option selected disabled> Select the Payment </option>
                                    
                                    <option value="Cash On Delivery"> Cash On Delivery</option>
                                       
                                    <option value="Gcash"> Gcash </option>
                                       
                                    <option value="Paypal"> Paypal </option>
                                        
                                       
                                    
                                </select>    <!--form-control end-->
                            </div>
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> What is the issue? </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="issue" type="text" class="form-control" required autocomplete="off" size="5">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label" style="font-size:12px;"> Upload image of damaged service/product</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="issue_img" type="file" class="form-control" accept="image/*" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label">Upload Receipt / Leave empty if N/A</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="receipt" type="file" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        
                        
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Submit Refund Form" type="submit" class="btn btn-primary form-control" style="color:black; font-size:18px;">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                    </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['submit'])){
            
            
            $invoice = $_POST['invoice'];
            
            
            $customer_name = $_POST['customer_name'];
            
            $quantity = $_POST['quantity'];
            
            $customer_email = $_POST['customer_email'];
            
            $productservice_name = $_POST['productservice_name'];
            
            $payment_method = $_POST['payment_method'];
            
            $issue = $_POST['issue'];
        
            $status = "Delivered";
                                    /*validation of invoice if existing*/
            
            $get_invoice = "select * from customer_orders where invoice_no='$invoice' and order_status = '$status'";
        
            $run_invoice = mysqli_query($con,$get_invoice);
        
            $count = mysqli_num_rows($run_invoice);
        
            if($count==0 && $invoice != "Service" && $invoice != "service"){
                
                 echo "<script>alert('The invoice you input doesnt match any records')</script>";
                 
                 echo "<script>window.open('my_account.php?return_refund','_self')</script>";
            }
            else{
                
                $row_invoice = mysqli_fetch_array($run_invoice);
        
                $delivery_date = $row_invoice['delivery_date'];
                
                
            $d1 = date('Y-m-d');
                
            $d2 = date('Y-m-d', strtotime($d1. ' - 1 days'));
            $d3 = date('Y-m-d', strtotime($d1. ' - 2 days'));
            $d4 = date('Y-m-d', strtotime($d1. ' - 3 days'));
            $d5 = date('Y-m-d', strtotime($d1. ' - 4 days'));
            $d6 = date('Y-m-d', strtotime($d1. ' - 5 days'));
            $d7 = date('Y-m-d', strtotime($d1. ' - 6 days'));
                
                
        if($delivery_date == $d1 || $delivery_date == $d2 || $delivery_date == $d3 || $delivery_date == $d4 || $delivery_date == $d5 || $delivery_date == $d6 || $delivery_date == $d7 || $invoice == "Service" || $invoice == "service"){
            
            $issue_img = $_FILES['issue_img']['name'];
            
            $receipt = $_FILES['receipt']['name'];
    
            $temp_name1 = $_FILES['issue_img']['tmp_name'];
            $temp_name2 = $_FILES['receipt']['tmp_name'];
            
            move_uploaded_file($temp_name1,"../admin_area/refund_pics/$issue_img");
            move_uploaded_file($temp_name2,"../admin_area/refund_pics/$receipt");
            
            
            $insert_refund = "insert into refund (customer_id,customer_name,quantity,customer_email,productservice_name,payment_method,issue,issue_img,receipt,invoice_no) values ('$customer_id','$customer_name','$quantity','$customer_email','$productservice_name','$payment_method','$issue','$issue_img','$receipt','$invoice')";
             
             $run_refund = mysqli_query($con,$insert_refund);
             
             if($run_refund){
                
                
                  
                 echo "<script>alert('Your Refund Query has been Submitted wait for our reply in your email')</script>";
                 
                 echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                 
                 
                 
             }
        
      
        }
            else{
                
                echo "<script>alert('The order you are trying to enter is already pass the 7 days return policy')</script>";
                 
                 echo "<script>window.open('my_account.php?return_refund','_self')</script>";
            }
            
            
            
            
            }}
                              
?>


