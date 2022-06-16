<?php

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo"<script>window.open('../checkout.php','_self)</script>";
    
}
else{


include("includes/db.php");
include("functions/functions.php"); 

if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJJ Online Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div id="top">    <!--Top Start-->
        <div class="container">    <!--Container Start-->
            <div class="col-md-6 offer">    <!--col-md-6 offer start-->
                <a href="#" class="btn btn-success btn-sm">
                
                    <?php  
                    
                    if(!isset($_SESSION['customer_email'])){
                        
                        echo "Welcome Guest";
                        
                    }
                    
                    else{
                        
                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }
                    
                    ?></a>
                <a href="../checkout.php"> <?php items(); ?> Items In Your Cart | Total Price: &#8369; <?php total_price(); ?> </a>
            </div>                          <!--col-md-6 offer End-->
            
            <div class="col-md-6">    <!--col-md-6 Start-->
                
                <ul class="menu">    <!--menu start-->
                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="../checkout.php"><?php 
                            
                                if(!isset($_SESSION['customer_email'])){
                        
                                    echo "<a href='../checkout.php'> Login </a>";
                        
                                }
                    
                                else{
                        
                                    echo "<a href='logout.php'> Log Out </a>";
                                }
                            
                            ?></a>
                    </li>
                </ul><!--menu End-->
                
            </div><!--col-md-6 End-->
            
        </div><!--Container End-->
    </div><!-- Top End-->
    
    <div id="navbar" class="navbar navbar-default">    <!--navbar navbar-default Start-->
       
        <div class="container">    <!--Container Start-->
           
            <div class="navbar-header">    <!--navbar-header Start-->
               
                <a href="../index.php" class="navbar-brand home">    <!--navbar-brand home Start-->
                   
                    <img src="images/MJJ%20LOGO%20big.png" alt="Mjj Online Store" class="hidden-xs">
                    
                    <img src="images/mjj%20logo%20small.png" alt="Mjj Online Store Mobile" class="visible-xs">
                    
                </a>                                              <!--navbar-brand home End-->
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                     
                      <span class="sr-only">Toggle Navigation</span>
                      
                      <i class="fa fa-align-justify"></i>          
                </button>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                     
                      <span class="sr-only">Toggle Search</span>
                      
                      <i class="fa fa-search"></i>          
                </button>
                
            </div><!--navbar-header End-->
            
            <div class="navbar-collapse collapse" id="navigation">    <!--navbar-collapse collapse start-->
                
                <div class="padding-nav">    <!--padding-nav start-->
                    
                    <ul class="nav navbar-nav left">    <!--nav navbar-nav left start-->
                        
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li  class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>
                        
                    </ul>    <!--nav navbar-nav left end-->
                    
                </div>    <!--padding-nav end-->
                <a href="../cart.php" class="btn navbar-btn btn-primary right">    <!--btn navbar-btn btn-primary right srart-->
                    
                    <i class="fa fa-shopping-cart"></i>
                    
                    <span> <?php items(); ?> Items In Your Cart | Total Price: &#8369; <?php total_price(); ?> </span>
                    
                </a>    <!--btn navbar-btn btn-primary right end-->
                
                <div class="navbar-collapse collapse right">    <!--navbar-collapse collapse right start-->
                    
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!--btn btn-primary navbar-btn start-->
                        
                        <span class="sr-only">Toggle Search</span>
                        
                        <i class="fa fa-search"></i>
                        
                    </button>    <!--btn btn-primary navbar-btn end-->
                    
                </div>    <!--navbar-collapse collapse right end-->
                
                <div class="collapse clearfix" id="search">    <!--collapse clearfix start-->
                    
                    <form method="get" action="results.php" class="navbar-form">    <!--navbar-form start-->
                        
                        <div class="input-group">    <!--input-group start-->
                            
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            
                            <span class="input-group-btn">    <!--input-group-btn start-->
                            
                            <button type="submit" name="search" value="Search" class="btn btn-primary">    <!--btn btn-primary start-->
                                
                                <i class="fa fa-search"></i>
                                
                            </button>    <!--btn btn-primary start-->
                            
                            </span>    <!--input-group-btn end-->
                            
                        </div>    <!--input-group end-->
                        
                    </form>    <!--navbar-form end-->
                    
                </div>    <!--collapse clearfix end-->
                
            </div>    <!--navbar-collapse collapse end-->
            
        </div><!--Container End-->
        
    </div> <!--navbar navbar-default End-->
    
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
    
 <?php 
    
    include("includes/sidebar.php");
    
    ?>          
            </div>    <!--col-md-3 end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
                
                <div class="box">    <!--box start-->
                    
                    <h1 align="center"> Please Confirm your Payment</h1>
                    
                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">    <!--form start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Invoice No: </label>
                            
                            <input type="text" class="form-control" name="invoice_no" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Amount Sent: </label>
                            
                            <input type="text" class="form-control" name="amount_sent" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Select Payment Mode </label>
                            
                            <select name="payment_mode" class="form-control">    <!--form-control start-->
                                
                                <option> Select Payment Mode </option>
                                <option> Cash </option>
                                <option> Paypal </option>
                                <option> Payoneer </option>
                                <option> Western Union </option>
                                
                            </select>    <!--form-control end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Transaction / Reference ID: </label>
                            
                            <input type="text" class="form-control" name="ref_no" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label>  Paypal / Payoneer / Wester Union: </label>
                            
                            <input type="text" class="form-control" name="code" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label> Payment Date: </label>
                            
                            <input type="text" class="form-control" name="date" required>
                            
                        </div>    <!--form-group end-->
                        
                        <div class="text-center">    <!--text-center start-->
                            
                            <button class="btn btn-primary btn-lg" name="confirm_payment">    <!--btn btn-primary btn-lg start-->
                                
                                <i class="fa fa-user-md"></i> Confirm Payment
                                
                            </button>    <!--btn btn-primary btn-lg end-->
                            
                        </div>    <!--text-center end-->
                        
                    </form>    <!--form end-->
                    
                    <?php 
                    
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank you for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
                    }
                    
                    ?>
                    
                </div>    <!--box end-->
                
            </div>    <!--col-md-9 end-->
            
        </div>    <!--container end-->
    </div>    <!--content end-->
   
  
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

<?php } ?>












