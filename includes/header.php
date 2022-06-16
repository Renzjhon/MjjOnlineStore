    <?php

    session_start();

    include("includes/db.php");
    include("functions/functions.php"); 

    ?>
    

<?php 

    if(isset($_GET['pro_id'])){
        
        $product_id = $_GET['pro_id'];
        
        $get_product = "select * from products where product_id='$product_id'";
        
        $run_product = mysqli_query($con,$get_product);
        
        $row_product = mysqli_fetch_array($run_product);
        
        $p_cat_id = $row_product['p_cat_id'];
        
        $pro_title = $row_product['product_title'];        
        
        $pro_price = $row_product['product_price'];
        
        $pro_desc = $row_product['product_desc'];        
        
        $pro_img1 = $row_product['product_img1'];
        
        $pro_img2 = $row_product['product_img2'];        
        
        $pro_img3 = $row_product['product_img3'];
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
    
        
        
        
        $get_inventory = "select * from inventory where product_id='$product_id'";
        
        $run_inventory = mysqli_query($con,$get_inventory);
        
        $row_inventory = mysqli_fetch_array($run_inventory);
        
        $stock = $row_inventory['qty_stock'];
        
        
         
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
                at <strong> $email </strong> to verify it &nbsp;<a href='verify_email.php' style='color:black;'>Click here</a>
        
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
                    
                    ?>
                </a>
                <a href="checkout.php">  <?php items(); ?> Items In Your Cart  </a>
            </div>                          <!--col-md-6 offer End-->
            
            <div class="col-md-6">    <!--col-md-6 Start-->
                
                <ul class="menu">    <!--menu start-->
                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                        
                            <?php 
                            
                                if(!isset($_SESSION['customer_email'])){
                        
                                    echo "<a href='customer/customer_login.php'> Login </a>";
                        
                                }
                    
                                else{
                        
                                    echo "<a href='logout.php'> Log Out </a>";
                                }
                            
                            ?>
                        
                        </a>
                    </li>
                </ul><!--menu End-->
                
            </div><!--col-md-6 End-->
            
        </div><!--Container End-->
    </div><!-- Top End-->
    
    <div id="navbar" class="navbar navbar-default">    <!--navbar navbar-default Start-->
       
        <div class="container">    <!--Container Start-->
           
            <div class="navbar-header">    <!--navbar-header Start-->
               
                <a href="index.php" class="navbar-brand home">    <!--navbar-brand home Start-->
                   
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
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>">
                            <a href="shop.php">Products</a>
                        </li>
                        <li class="<?php if($active=='Services') echo"active"; ?>">
                            <a href="services.php">Services</a>
                        </li>
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            
                            <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                
                                
                                echo"<a href='customer_register.php'>My Account</a>";
                                
                            }
                            else{
                                
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                                
                            }
                            
                            ?>
                        
                        <li class="<?php if($active=='Cart') echo"active"; ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='termsandcondition') echo"active"; ?>">
                            <a href="termsandcondition.php">Terms and Condition</a>
                        </li>
                        <li class="<?php if($active=='about_us') echo"active"; ?>">
                            <a href="about_us.php">About Us</a>
                        </li>
                        
                    </ul>    <!--nav navbar-nav left end-->
                    
                </div>    <!--padding-nav end-->
               
                
                
                
                
                
            </div>    <!--navbar-collapse collapse end-->
            
        </div><!--Container End-->
        
    </div> <!--navbar navbar-default End-->
    