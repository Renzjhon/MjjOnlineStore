
       
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
            
            $method = $row_refund['payment_method'];
            
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
            $customer_number = $row_edit['customer_contact'];

            $customer_province = $row_edit['customer_country'];
            $customer_city = $row_edit['customer_city'];
            $customer_address = $row_edit['customer_address'];

            $get_refund_info = "select * from refund where refund_id='$refund_id'";
            
            $run_refund = mysqli_query($con,$get_refund_info);
        
            $row_refund = mysqli_fetch_array($run_refund);
        
            $method = $row_refund['payment_method'];


?>
        
        
        <?php 
         
                                $get_pro = "select * from services";
         
                                $run_pro = mysqli_query($con,$get_pro);
         
                                

?>
  
<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Return Item / Repair Service / Approval form
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
              
               
               <br>
               <h3 style="color:blue;"><center>Repair/Refund Form</center></h3>
                
                
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
                            
                            <label class="col-md-3 control-label"> Customer Contact Number:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="customer_number" type="text" class="form-control" required autocomplete="off" value="<?php echo $customer_number;?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Customer Full Address:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="customer_address" type="text" class="form-control" required autocomplete="off" value="<?php echo $customer_address;?>, <?php echo $customer_city;?>, ">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                           <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Payment Method</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="payment_method" type="text" class="form-control" required autocomplete="off" value="<?php echo $method;?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                           
                            
                            <label class="col-md-3 control-label"> Project name </label>
                            
                            <div class="form-group">    <!--form-group start-->
                             
                                   <select name="service_name" class="form-control" size="1" required style="width: 300px;" id="product">    <!--form-control start-->
                                   
                                 <option value="" selected style="display:none">Project Name</option>
                                   <?php
                                   while($row_pro=mysqli_fetch_array($run_pro)):
                                    
                                    $service_id = $row_pro['service_id'];
                                    
                                    $service_name = $row_pro['service_name'];
                                    
                                    $service_desc = $row_pro['service_desc'];
                                    
                                    
                                    
                                    
                                
                                       ?>
                                    
                                   
                                    
                                    <option value="<?php echo $row_pro[1];?>"><?php echo $row_pro[1];?></option>
                                    
                                    <?php endwhile; ?>
                                   
                                       
                                </select>    <!--form-control end-->
                        </div>
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
            
                $delivery_date = $_POST['date'];
            
                $delivery_date = date('F j, Y', strtotime($delivery_date));
            
                $fullname = $_POST['customer_name'];
             
                $email = $_POST['customer_email'];
             
                $number = $_POST['customer_number'];
                
                $address = $_POST['customer_address'];
            
                $service_name = $_POST['service_name'];
            
            
                $update_refund = "update refund set status='$refund_status' where refund_id='$refund_id'";
              
                $run_refund = mysqli_query($con,$update_refund);
        
            
            
            
                $get_s_info = "select * from services where service_name='$service_name'";
            
                $run_edit = mysqli_query($con,$get_s_info);
        
                $row_edit = mysqli_fetch_array($run_edit);
        
                $service_price_min = $row_edit['service_price_min'];
                $service_price_max = $row_edit['service_price_max'];
            
                $pricerange = "$service_price_min - $service_price_max";
                
                $budget = 0;
                
                
                $message = "This is a refund service";
                    
             
                $insert_quotation = "insert into quotation_sent (customer_name,customer_email,customer_number,address,pricerange,customer_budget,service_name,additional_message) values ('$fullname','$email','$number','$address','$pricerange','$budget','$service_name','$message')";
             
                $run_quotation = mysqli_query($con,$insert_quotation);
             
                if($run_quotation){
                
                    
                $receiver = "$customer_email";
                $subject = "Return Services Approved";
                $body = "
                
                Good day Mr/Ms, $customer_name
                
                We apologize for inconvenience
                
                Your return services has been approved.

                Please wait for the item to be delivered.
                
                one of our employee will go back to your place to repair the services and
                the estimated date of repair will be on
                
                $delivery_date 
                
                you can also check the status of your service in our website mjjaluminumandglassworks.com
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

