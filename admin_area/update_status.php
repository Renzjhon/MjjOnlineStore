<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['update_status'])){
            
            $update_status_id = $_GET['update_status'];
            
            $get_p = "select * from order_summary where invoice_no='$update_status_id'";
            
            $run_edit = mysqli_query($con,$get_p);
            
            $row_order = mysqli_fetch_array($run_edit);
            
            $order_status = $row_order['order_status'];
            $invoice_no = $row_order['invoice_no'];
            
            if($order_status == "On Process"){
                
                $status = "Preparing to Ship";
            }
            if($order_status == "Preparing to Ship"){
                
                $status = "In Transit";
            }
            
            
            $update_status = "update pending_orders set order_status='$status' where invoice_no ='$invoice_no'";
             
             $run_status = mysqli_query($con,$update_status);
            $update_st = "update customer_orders set order_status='$status' where invoice_no ='$invoice_no'";
             
             $run_status = mysqli_query($con,$update_st);
            
            $update_s = "update order_summary set order_status='$status' where invoice_no ='$invoice_no'";
             
             $run_s = mysqli_query($con,$update_s);
             
             if($run_status){
                 
                 echo "<script>alert('The Order Status has been Updated')</script>";
                 
                 echo "<script>window.open('index.php?view_orders','_self')</script>";
                 
             }
            
            
        }
    
?>
<?php }?>