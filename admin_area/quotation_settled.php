<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>
  


<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Service Settled Confirm
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> Confirm Settled Service
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
               
<?php 

        if(isset($_GET['quotation_settled'])){
            
        $edit_order_id = $_GET['quotation_settled'];
        
        $edit_order_query = "select * from quotation_sent where quotation_id='$edit_order_id'";
        
        $run_edit = mysqli_query($con,$edit_order_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $q_id = $row_edit['quotation_id'];
                                    
        $c_name = $row_edit['customer_name'];
                                    
         $c_email = $row_edit['customer_email'];
                                    
         $c_number = $row_edit['customer_number'];
                                    
         $c_address = $row_edit['address'];
                                    
         $pricerange = $row_edit['pricerange'];
                                    
          $c_budget = $row_edit['customer_budget'];
                                    
          $s_name = $row_edit['service_name'];
                                    
          $message = $row_edit['additional_message'];
                                    
          $status = $row_edit['status'];
        
        
            
        }

?>
     

                
                <div class="box">    <!--box start-->
                    
                    <h1 align="center"> Please Confirm Service Payment</h1>
                    
                    <form  method="post">    <!--form start-->
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Amount Receive: </label>
                            
                            <input name="amount_sent" type="number" class="form-control" required min="0" step="0.01" >
                            
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
                        
                        $order_type = "Services";
                        
                        $invoice_no = mt_rand();
                        
                        $status = "Settled";
                        
                        $amount = $_POST['amount_sent'];
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_date,order_type) values ('$invoice_no','$amount',NOW(),'$order_type')";
                      
                        $run_payment = mysqli_query($con,$insert_payment);                 
                        
                        $update_quotation = "update quotation_sent set status='$status' where quotation_id='$edit_order_id'";
              
                        $run_order = mysqli_query($con,$update_quotation);
                        
                        
                        
                        if($run_payment){
                            
                            
                            
                            
                            echo "<script>alert('The Payment have been recorded to sales')</script>";
                            
                            echo "<script>window.open('index.php?dashboard','_self')</script>";
                            
                            
                        }
                        
                    }
                    
                    ?>


<?php ?>








<?php } ?>