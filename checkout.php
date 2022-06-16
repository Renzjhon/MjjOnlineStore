<!--    This is for cash on delivery-->
   

   <?php 
    
    $active='Account';
    include("includes/header.php");

?>
<?php 
        
        $ip_add = getRealIpUser();

        $select_cart = "select * from cart where ip_add='$ip_add'";
        
        $run_cart = mysqli_query($con,$select_cart);
        
        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart == 0){
            
            echo "<script>alert('The Cart is empty')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
        }
        else {

?>
<?php
            if(!isset($_SESSION['customer_email'])){
                
                echo "<script>alert('Sorry please login your account first to continue')</script>";
        
                echo "<script>window.open('customer/customer_login.php','_self')</script>";
            }
            else {
                ?>
                
                        
<?php 
                                
     $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
     $run_customer = mysqli_query($con,$select_customer);
                        
     $row_customer = mysqli_fetch_array($run_customer);
        
     $name = $row_customer['customer_name'];
        
     $email = $row_customer['customer_email'];

     $verified = $row_customer['verified'];
                        
     if($verified == 0){
                                
      echo "<script>alert('Sorry please verify your account first to be able to checkout')</script>";
        
        echo "<script>window.open('verify_email.php','_self')</script>";
                                }
        
        else{
                                        
        }
                                
       ?>
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Register
                    </li>
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
            
           
    
 <?php 
    
    include("includes/sidebar.php");
    
    ?>          
            
            </div>    <!--col-md-3 end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
            
            <?php 
            
            if(!isset($_SESSION['customer_email'])){
                
                include("customer/customer_login.php");
            }
            else{
                
                include("payment_options.php");
                
            }
            
            ?>
            
            </div>    <!--col-md-9 end-->
            
        </div>    <!--container end-->
    </div>    <!--content end-->
   
  
<!-------------------------------php--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    
    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

 <?php } }?>