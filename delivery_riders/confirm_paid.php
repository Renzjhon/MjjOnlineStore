<?php 

    if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{
?>
  


<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Confirm Paid
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> Confirm Paid
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
               
<?php 

        if(isset($_GET['confirm'])){
            
        $edit_order_id = $_GET['confirm'];
        
        $edit_order_query = "select * from order_summary where invoice_no='$edit_order_id'";
        
        $run_edit = mysqli_query($con,$edit_order_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        $invoice = $row_edit['invoice_no'];
        
        $amount = $row_edit['total_price'];
            
        $status = $row_edit['order_status'];
            
        $customer_verify = $row_edit['Customer_verify'];
            
        $rider_verify = $row_edit['Rider_verify'];
        
        
            
        }

?>
     

                
                <div class="box">    <!--box start-->
                    
                    <h1 align="center"> Please Confirm the Payment</h1>
                    
                    <form  method="post">    <!--form start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Invoice No: </label>
                            
                            <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice; ?>" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Amount Receive: </label>
                            
                            <input type="text" class="form-control" name="amount_sent" value="<?php echo $amount; ?>" required>
                            
                        </div>    <!--form-group end-->
                        
                        
                        <div class="text-center">    <!--text-center start-->
                            
                            <input name="submit" value="Confirm Payment" type="submit" class="btn btn-primary form-control">
                            
                        </div>    <!--text-center end-->
                        
                    </form>    <!--form end-->
                    
                 
                    
                </div>    <!--box end-->
                
            </div>    <!--col-md-9 end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->


<?php 
                    
                    if(isset($_POST['submit'])){
                        
                        
                        
                        $rider_v = 1;
                        
                        
                        
                        $update_order = "update customer_orders set Rider_verify='$rider_v' where invoice_no='$edit_order_id'";
                        
                        $run_order = mysqli_query($con,$update_order);
                        
                        
                        $update_o = "update order_summary set Rider_verify='$rider_v' where invoice_no='$edit_order_id'";
                        
                        $run_o = mysqli_query($con,$update_o);
                        
                        if($run_order){
                            
                        }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        $edit_order_query = "select * from order_summary where invoice_no='$invoice'";
        
                        $run_edit = mysqli_query($con,$edit_order_query);
        
                        $row_edit = mysqli_fetch_array($run_edit);
                        $customer_verify = $row_edit['Customer_verify'];
                        $rider_v = $row_edit['Rider_verify'];
                        
                        
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        
                        if($customer_verify == 1){
                            
                            $status = "Delivered";
                        }
                        else {
                            $status = "In Transit";
                        }
                        
                        
                        $payment = "Paid";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_date) values ('$invoice_no','$amount',NOW())";
                      
                        $run_payment = mysqli_query($con,$insert_payment);                 
                        
                        $update_order = "update customer_orders set order_status='$status',payment='$payment',delivery_date = NOW() where invoice_no='$edit_order_id'";
              
                        $run_order = mysqli_query($con,$update_order);
                        
                        
                        $update_or = "update order_summary set order_status='$status',payment='$payment',delivery_date = NOW() where invoice_no='$edit_order_id'";
              
                        $run_or = mysqli_query($con,$update_or);
                        
                        $update_p_order = "update pending_orders set order_status='$status',payment='$payment' where invoice_no='$edit_order_id'";
              
                        $run_p_order = mysqli_query($con,$update_p_order);
                        
                        if($run_payment){
                            
                            
                            
                            
                            echo "<script>alert('The Payment have been recorded to sales')</script>";
                            
                            echo "<script>window.open('index.php?dashboard','_self')</script>";
                            
                            
                        }
                        
                    }
                    
                    ?>


<?php ?>








<?php } ?>