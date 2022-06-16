<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['refund_payment_review'])){
            
            $refund_payment_review_id = $_GET['refund_payment_review'];
            
            $edit_refund = "select * from customer_cancelled_orders where cancel_id='$refund_payment_review_id'";
            
            $run_refund = mysqli_query($con,$edit_refund);
            
            $row_refund = mysqli_fetch_array($run_refund);
            
            $cancel_id = $row_refund['cancel_id'];
            
            $order_id = $row_refund['order_id'];
            
            $invoice = $row_refund['invoice_no'];
            
            $payment_method = $row_refund['payment_method'];
            
            $customer_id = $row_refund['customer_id'];
            
            $customer_name = $row_refund['customer_name'];
            
            $customer_email = $row_refund['customer_email'];
            
            $reason = $row_refund['reason'];
            
            $message = $row_refund['message'];
            
            
            
            $ss_payment = $row_refund['ss_payment'];
            
            $status = $row_refund['status'];
            
            
            
        }

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Review Refund Payment
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Review Refund / Refund Payment
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
               
               <h3><center>Customer name: <strong><?php echo $customer_name;?></strong></center></h3>
               <h3><center>Customer email: <strong><?php echo $customer_email;?></strong></center></h3>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                    
                    <div class="form-group">    <!--form-group start-->
                       <center>
                       
                                <br>
                                <h3 style="color:black;"><center>Reason for cancellation: <strong style="color:green;"><?php echo $reason;?></strong></center></h3>
                                <h3 style="color:black;"><center>Additional Message <strong style="color:green;"><?php echo $message;?></strong></center></h3>
                               
                                <br><br>
                                <center>Screenshot proof of payment</center>
                                <img src="refund_pics/<?php echo $ss_payment; ?>" class="img-responsive" >

                                 
                        </center>
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input type="submit" name="update" value="Confirm Settled" class="btn btn-primary form-control" style="background-color: green">
                            <br>
                            
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['update'])){
            
            $status = "Settled";
            
            $update_order = "update customer_cancelled_orders set status='$status' where cancel_id='$cancel_id'";
            
            $run_order = mysqli_query($con,$update_order);
            
            if($run_order){
                
                
                
                echo "<script>alert('The query has been recorded as settled')</script>";
        
                echo "<script>window.open('index.php?refund_payment','_self')</script>";
                
            }
            
        }
        if(isset($_POST['cancel'])){
            
           
                
               
        
                echo "<script>window.open('index.php?refund','_self')</script>";
                
            
        }

?>














<?php } ?>