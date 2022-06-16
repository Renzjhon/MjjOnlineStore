<?php

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo"<script>window.open('../checkout.php','_self)</script>";
    
}
else{
$active='Account';

include("includes/db.php");
include("functions/functions.php"); 
    error_reporting(E_ERROR | E_PARSE);

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
    
    <script src="includes/city.js"></script>	
</head>
<body>
    
    <div id="top">    <!--Top Start-->
       <?php
            if(!isset($_SESSION['customer_email'])){
                
            }
            else {
                
                $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
        
                $name = $row_customer['customer_name'];
        
                $email = $row_customer['customer_email'];

                $verified = $row_customer['verified'];
                
            if($verified == 0){
                echo "
                
                <div class='alert alert-warning'>
       
                
                You are still not verified Sign-in to your email account and click on the verification link we just emailed you
                at <strong> $email </strong> to verify it &nbsp;<a href='../verify_email.php' style='color:black;'>Click here</a>
        
                </div>
                
                ";
            }
        
            else{
                
            }
            }
        ?>
        <div class="container">    <!--Container Start-->
            <div class="col-md-6 offer">    <!--col-md-6 offer start-->
                <a href="#" class="btn btn-success btn-sm">
                
                    <?php  
                    
                    if(!isset($_SESSION['customer_email'])){
                        
                        echo "Welcome Guest";
                        
                    }
                    
                    else{
                        
                        echo "Welcome: " . $name . "";
                    }
                    
                    ?></a>
                <a href="checkout.php"> <?php items(); ?> Items In Your Cart  </a>
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
                        
                        <li class="<?php if($active=='Home') echo"active"; ?>">
                            <a href="../index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>">
                            <a href="../shop.php">Products</a>
                        </li>
                        <li class="<?php if($active=='Services') echo"active"; ?>">
                            <a href="../services.php">Services</a>
                        </li>
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            
                            <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                
                                
                                echo"<a href='../customer_register.php'>My Account</a>";
                                
                            }
                            else{
                                
                                echo"<a href='my_account.php?my_orders'>My Account</a>";
                                
                            }
                            
                            ?>
                        
                        <li class="<?php if($active=='Cart') echo"active"; ?>">
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='termsandcondition') echo"active"; ?>">
                            <a href="../termsandcondition.php">Terms and Condition</a>
                        </li>
                        <li class="<?php if($active=='about_us') echo"active"; ?>">
                            <a href="../about_us.php">About Us</a>
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
                    
                    <?php
                    
                    if (isset($_GET['my_orders'])){
                        include("my_orders.php");
                    }
                    if (isset($_GET['completed_orders'])){
                        include("completed_orders.php");
                    }
                    
                    ?>
                    
                    <?php
                    
                    if (isset($_GET['pay_offline'])){
                        include("pay_offline.php");
                    }
                    
                    ?>
                    
                    <?php
                    
                    if (isset($_GET['edit_account'])){
                        include("edit_account.php");
                    }
                    
                    ?>
                    
                    <?php
                    
                    if (isset($_GET['change_pass'])){
                        include("change_pass.php");
                    }
                    
                    ?>
                    
                    <?php
                    
                    if (isset($_GET['delete_account'])){
                        include("delete_account.php");
                    }
                    
                    ?>
                    <?php
                    
                    if (isset($_GET['confirm_delivered'])){
                        include("confirm_delivered.php");
                    }
                    
                    ?>
                    <?php
                    
                    if (isset($_GET['cancel_order'])){
                        include("cancel_order.php");
                    }
                    ?>
                    <?php
                    
                    if (isset($_GET['gcash'])){
                        include("gcash.php");
                    }
                    if (isset($_GET['gcash_submit'])){
                        include("gcash_submit.php");
                    }
    
                    if (isset($_GET['order_inreview'])){
                        include("order_inreview.php");
                    }
    
                    if (isset($_GET['return_refund'])){
                        include("return_refund.php");
                    }
                    if (isset($_GET['order_details'])){
                        include("order_details.php");
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















