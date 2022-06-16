<?php 

session_start();
include("includes/db.php");

    if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{
        
        $rider_session = $_SESSION['rider_email'];
        
        $get_rider = "select * from riders where rider_email='$rider_session'";
        
        $run_rider = mysqli_query($con,$get_rider);
        
        $row_rider = mysqli_fetch_array($run_rider);
        
        $rider_id = $row_rider['rider_id'];
        
        $rider_name = $row_rider['rider_name'];
        
        $rider_email = $row_rider['rider_email'];
        
        $rider_image = $row_rider['rider_image'];
        
        $rider_contact = $row_rider['rider_contact'];
        
        $get_pending_orders = "select * from pending_orders";
        
        $run_pending_orders =   mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJJ Online Store Delivery Rider Panel</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper">    <!--wrapper start-->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">    <!--page-wrapper start-->
            <div class="container-fluid">    <!--container-fluid start-->
                
                <?php
                if(isset($_GET['dashboard'])){
                    
                    include("dashboard.php");
                }
                
                if(isset($_GET['rider_login'])){
                    
                    include("rider_login.php");
                }
                if(isset($_GET['ongoing_deliveries'])){
                    
                    include("ongoing_deliveries.php");
                }
                if(isset($_GET['edit_rider'])){
                    
                    include("edit_rider.php");
                }
                if(isset($_GET['confirm'])){
                    
                    include("confirm_paid.php");
                }
                if(isset($_GET['record'])){
                    
                    include("delivery_records.php");
                }
                if(isset($_GET['cancelled'])){
                    
                    include("cancelled_orders.php");
                }
                
                if(isset($_GET['insert_return_item'])){
                    
                    include("insert_return_item.php");
                }
                if(isset($_GET['view_return_item'])){
                    
                    include("view_return_items.php");
                }
                if(isset($_GET['my_deliveries'])){
                    
                    include("my_deliveries.php");
                }
                if(isset($_GET['order_details'])){
                    
                    include("order_details.php");
                }
                if(isset($_GET['accept_order'])){
                    
                    include("accept_order.php");
                }
                if(isset($_GET['confirm_d'])){
                    
                    include("confirm_d.php");
                }
        
        
        
        
                ?>
                
            </div>    <!--container-fluid end-->
        </div>    <!--page-wrapper end-->
    </div>    <!--wrapper end-->
    
    
    
    
    
    
    

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>


<?php 

}

?>
























