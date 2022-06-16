<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['gcash_review'])){
            
            $gcash_id = $_GET['gcash_review'];
            
            $edit_gcash = "select * from order_summary where invoice_no='$gcash_id'";
            
            $run_gcash = mysqli_query($con,$edit_gcash);
            
            $row_gcash = mysqli_fetch_array($run_gcash);
            
            $order_id = $row_gcash['order_id'];
            
            $c_id = $row_gcash['customer_id'];
            
            
            $ss_proof = $row_gcash['ss_proof'];
            
            $get_customer = "select * from customers where customer_id='$c_id'";
                                    
            $run_customer = mysqli_query($con,$get_customer);
                                    
            $row_customer = mysqli_fetch_array($run_customer);
                                    
                                            
            $customer_name = $row_customer['customer_name'];
                                            
            $customer_email = $row_customer['customer_email'];
            
                                    
            $order_date = $row_gcash['order_date'];
            
            $amount = $row_gcash['total_price'];
            
            
                $order_date = date('F j, Y', strtotime($order_date));
            
        }

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Review Order
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Review Order
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
               
               <h3><center>Customer name: <strong><?php echo $customer_name;?></strong></center></h3>
               
               <h3><center>Order purchase amount: ₱<strong><?php echo $amount;?></strong></center></h3>
               
                <h3><small><center>Date of payment: <strong><?php echo $order_date;?></strong></center></small></h3>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                    
                    <div class="form-group">    <!--form-group start-->
                       <center>
                       
                                <br>
                                <center>Payment Screenshot Proof</center>
                                
                                <img src="gcash_proof/<?php echo $ss_proof; ?>" class="img-responsive" >

             
                        </center>
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input type="submit" name="update" value="Confirm Order" class="btn btn-primary form-control" style="background-color: green">
                            <br>
                            <br>
                            <input type="submit" name="cancel" value="Cancel/Not Legit Proof" class="btn btn-primary form-control" style="background-color: red">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['update'])){
            
            $review = "Reviewed";
            
            $update_order = "update pending_orders set review='$review' where invoice_no='$gcash_id'";
            
            $run_order = mysqli_query($con,$update_order);
            
            $update_order = "update order_summary set review='$review' where invoice_no='$gcash_id'";
            
            $run_order = mysqli_query($con,$update_order);
            
             $payment = "Paid";
                        
            $insert_payment = "insert into payments (invoice_no,amount,payment_date) values ('$gcash_id','$amount',NOW())";
                      
            $run_payment = mysqli_query($con,$insert_payment);    
            
            
            if($run_order){
                
                $receiver = "$customer_email";
                $subject = "Gcash Payment Approved";
                $body = "
                
                Good Day Mr/Ms. $customer_name,
                
                Your order using Gcash payment has been approved.
                
                Thank you for buying our items.

                For more latest products and services continue to visit are website at mjjaluminumandglassworks.com



                Thank You,

                From: MJJ Teams
                
                ";
                $sender = "From: admin@mjjaluminumandglassworks.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "Email sent successfully to $receiver";
                }else{
                echo "Sorry, failed while sending mail!";
                }
                  
                
                echo "<script>alert('The Order has reviewed succesfully')</script>";
        
                echo "<script>window.open('index.php?gcash_order','_self')</script>";
                
            }
            
        }
        if(isset($_POST['cancel'])){
            
           
                
               
        
                echo "<script>window.open('index.php?gcash_cancel=$gcash_id','_self')</script>";
                
            
        }

?>














<?php } ?>