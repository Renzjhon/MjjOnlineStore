<?php


include("includes/db.php");

?>
<?php 


if(isset($_GET['gcash_submit'])){
    
    $customer_id = $_GET['gcash_submit'];
    
?>

<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Submit your screenshot of gcash payment here
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                    <div class="form-group">    <!--form-group start-->
                       
                       <h1 style="font-size:40px">
                        
                            <center>Submit the screenshot of payment here</center>
                        
                        </h1>
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Gcash Payment Screenshot
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                                <input type="file" name="screenshot" class="form-control" accept="image/*">

                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

 <?php 
                 $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
        
                $province = $row_customer['customer_country'];
                
                $select_province = "select * from delivery_fee where province_name='$province'";
                        
                $run_province = mysqli_query($con,$select_province);
                        
                $row_province = mysqli_fetch_array($run_province);
        
                $delivery_fee = $row_province['delivery_fee'];
                                            
                                        
                                        ?>

<?php 

        if(isset($_POST['submit'])){
            
            $review = "Unreviewed";
            
            $ss_proof = $_FILES['screenshot']['name'];
            
            $temp_name = $_FILES['screenshot']['tmp_name'];
            
            move_uploaded_file($temp_name,"../admin_area/gcash_proof/$ss_proof");
            
            

$ip_add = getRealIpUser();

$status = "On Process";

$payment_method = "Gcash";

$payment = "Paid";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);



while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    $update_inventory = "select * from inventory where product_id='$pro_id'";
    
    $run_inventory = mysqli_query($con,$update_inventory);
   
    $row_inventory = mysqli_fetch_array($run_inventory);
            
    $ori_qty = $row_inventory['qty_stock'];
    
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $updated_stock = 0;
        
        
        $sub_total = $row_products['product_price']*$pro_qty;
        $date_today = date('Y-m-d');
                
           
        $delivery_date = date('Y-m-d', strtotime($date_today. ' + 7 days'));
        
        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,order_date,delivery_date,order_status,payment_method,payment) values ('$customer_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$delivery_date','$status','$payment_method','$payment')";
        
        $run_customer_order = mysqli_query($con,$insert_customer_order);
        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status,payment_method,payment,review,ss_proof) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$status','$payment_method','$payment','$review','$ss_proof')";
        
       
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        
         $updated_stock = $ori_qty - $pro_qty;
        
         $update_inventory = "update inventory set qty_stock='$updated_stock' where product_id='$pro_id'";
              
         $run_inventory = mysqli_query($con,$update_inventory);
        
        $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$pro_id','$updated_stock',NOW())";
    
        $run_inventory_report = mysqli_query($con,$insert_inventory_report);
        
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);
    }}
        
        $get_sold = "select * from customer_orders where invoice_no='$invoice_no'";
                                    
                                    
                                    
        $run_sold = mysqli_query($con,$get_sold);
                                    
        $count = mysqli_num_rows($run_sold);

           $count1 = $delivery_fee/$count;
       
        while($row_sold=mysqli_fetch_array($run_sold)){
                                    
            $amount1 = $row_sold['due_amount'];
            $amount = $amount1 + $count1;
            
        $update_amount = "update customer_orders set due_amount='$amount' where due_amount='$amount1'";
              
         $run_inventory = mysqli_query($con,$update_amount);
            
            
            
            
            
            
            
            
            
            if($run_pending_order){
                echo "<script>alert('Your order is in review we will email you when you order has been processed or cancelled')</script>";
                
                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        
        
        
    }
}
            
            
            
            

 /*-------------------------this is for order summary table------------*/



             $get_total = "select sum(due_amount) as total from customer_orders where invoice_no = '$invoice_no'";
                            
                                $run_total = mysqli_query($con,$get_total);
                                $row=mysqli_fetch_array($run_total);

                                    $total_price = $row['total'];

            
            
         
            

        $c_verify = 0;

        $r_verify = 0;
            $date_today = date('Y-m-d');
                
           
        $delivery_date = date('Y-m-d', strtotime($date_today. ' + 7 days'));
        

        $insert_order_summary = "insert into order_summary (customer_id,total_price,invoice_no,order_date,delivery_date,order_status,payment_method,payment,Customer_verify,Rider_verify,review,ss_proof) values ('$customer_id','$total_price','$invoice_no',NOW(),'$delivery_date','$status','$payment_method','$payment','$c_verify','$r_verify','$review','$ss_proof')";
        
       
        $run_order_summary = mysqli_query($con,$insert_order_summary);
            
            
            
        }   
                
               
                
        }
                
                
                
        

?>









