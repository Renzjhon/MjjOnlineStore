<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['gcash_cancel'])){
            
            $gcash_id = $_GET['gcash_cancel'];
            
            $edit_gcash = "select * from order_summary where invoice_no='$gcash_id'";
            
            $run_gcash = mysqli_query($con,$edit_gcash);
            
            $row_gcash = mysqli_fetch_array($run_gcash);
            
            
            $c_id = $row_gcash['customer_id'];
            
            $ss_proof = $row_gcash['ss_proof'];
            
            $get_customer = "select * from customers where customer_id='$c_id'";
                                    
            $run_customer = mysqli_query($con,$get_customer);
                                    
            $row_customer = mysqli_fetch_array($run_customer);
                                    
                                            
            $customer_name = $row_customer['customer_name'];
                                            
            $customer_email = $row_customer['customer_email'];
            
                                    
            $order_date = $row_gcash['order_date'];
            
           
                $order_date = date('F j, Y', strtotime($order_date));
        }
        

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Cancel Order
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


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
                
                <h3><small><center>Date of payment: <strong><?php echo $order_date;?></strong></center></small></h3>
                
                <h3><center>This will be sent to customer email</center></h3>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                   <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> What is the reason for <br>cancellation? &nbsp;&nbsp;&emsp;</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="reason" class="form-control" size="1" required>    <!--form-control start-->
                                    
                                    <option selected disabled> Select the Reason </option>
                                    
                                    <option value="Fake Screenshot/edited"> Invalid Screenshot </option>
                                       
                                    <option value="Payment not received by system"> Payment not received by system </option>
                                       
                                    <option value="Invalid Picture/Not screenshot of gcash"> Invalid Picture/Not screenshot of gcash </option>
                                        
                                       
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                       
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Additional Message for Customer:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="message" cols="19" rows="9" class="form-control" required></textarea>
                                
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
            
            $review = "Reviewed";
      
            $update_order = "update pending_orders set cancel='$cancel',review='$review' where invoice_no='$gcash_id'";
             
            $run_order= mysqli_query($con,$update_order);
            $update_or = "update order_summary set cancel='$cancel',review='$review' where invoice_no='$gcash_id'";
             
            $run_order= mysqli_query($con,$update_or);
            
            $insert_cancelled = "insert into gcash_cancelled_orders (customer_id,customer_name,customer_email,ss_proof,reason,message) values ('$c_id','$customer_name','$customer_email','$ss_proof','$reason','$message')";
             
             $run_cancel = mysqli_query($con,$insert_cancelled);
             
             if($run_cancel){
                
                $receiver = "$customer_email";
                $subject = " Gcash Payment Cancelled.";
                $body = "
                
                Good Day Mr/Ms $customer_name
                
                We apologize for inconvenience
                
                Your order using Gcash payment has been cancelled.

                Your order has been disapproved for the reason of:
                
                $reason
                
                Additional message from admin:
                
                $message
                
                

                Thank You,

                From: MJJ Teams
                
                
                
                ";
                $sender = "From: Renzjohnbuizon@gmail.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "Email sent successfully to $receiver";
                }else{
                echo "Sorry, failed while sending mail!";
                }
                  
                 echo "<script>alert('The Order has been cancelled and have been email to customer')</script>";
                 
                 echo "<script>window.open('index.php?gcash_order','_self')</script>";
                 
                 
                 
             }
        
      
        }
?>














<?php } ?>