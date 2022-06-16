<?php 

    if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{
?>


<?php 

        if(isset($_GET['accept_order'])){
            
            $invoice = $_GET['accept_order'];
            
            
            $rider_session = $_SESSION['rider_email'];

            $get_rider = "select * from riders where rider_email='$rider_session'";

            $run_rider = mysqli_query($con,$get_rider);

                $row_rider = mysqli_fetch_array($run_rider);

                $rider_id = $row_rider['rider_id'];
            
            
            
            
             $update_rider = "update customer_orders set rider_id='$rider_id' where invoice_no='$invoice'";
             
             $run_rider = mysqli_query($con,$update_rider);
            
            $update_r = "update order_summary set rider_id='$rider_id' where invoice_no='$invoice'";
             
             $run_r = mysqli_query($con,$update_r);
            
            if($run_r){
        
            echo "<script>alert('The order has been accepted check my_deliveries for more info')</script>";
        
            echo "<script>window.open('index.php?ongoing_deliveries','_self')</script>";
        
    }

            
            
        }

?>












<?php }?>