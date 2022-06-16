<?php 
    
    $active='Account';
    include("includes/header.php");

?>
   <div class="box">    <!--box start-->
    
    <div class="box-header">    <!--box-header start-->
        
        <center>    <!--center start-->
            
            <h1> Login </h1>
            
            <p class="lead"> Already have an account? </p>
            
            <p class="text-muted"> Enter your email address and password here.</p>
            
        </center>    <!--center end-->
        
    </div>    <!--box-header end-->
    
    <form method="post" action="#">    <!--form start-->
        
        <div class="form-group">    <!--form-group start-->
            
            <label> Email: </label>
            
            <input name="c_email" type="EMAIL" class="form-control" required>
            
        </div>    <!--form-group end-->
        
        <div class="form-group">    <!--form-group start-->
            
            <label> Password: </label>
            
            <input name="c_pass" type="password" class="form-control" required>
            
        </div>    <!--form-group end-->
        
        <div class="text-center">    <!--text-center start-->
            
            <button name="login" value="login" class="btn btn-primary">
                
                <i class="fa fa-sign-in"></i> Login
                
            </button>
            
        </div>    <!--text-center end-->
          
    </form>    <!--form end-->
    
    <center>    <!--center start-->
        
        <a href="../customer_register.php">
            
            <h3> Don't have an account? Sign up here</h3>
            
        </a>
        
    </center>    <!--center end--> 
    <center>    <!--center start-->
        
        <a href="../forgot_password.php" style="color:green">
            
            <h3> Forgot password? click here</h3>
            
        </a>
        
    </center>    <!--center end-->
    
</div>    <!--box end-->

<?php 

    if(isset($_POST['login'])){
        
        $customer_email = $_POST['c_email'];
        
        $customer_pass = $_POST['c_pass'];
        
        
        
        $select_customer = "select * from customers where customer_email='$customer_email' ";
        
        
        
        $run_customer = mysqli_query($con,$select_customer);
        
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $hash = $row_customer['customer_pass'];
        
        $verify = password_verify($customer_pass, $hash);
        
        if($verify){
        $get_ip = getRealIpUser();
        
        $check_customer = mysqli_num_rows($run_customer);
        
        $select_cart = "select * from cart where ip_add='$get_ip'";
        
        $run_cart = mysqli_query($con,$select_cart);
        
        $check_cart = mysqli_num_rows($run_cart);
        
        if($check_customer==0){
            
            echo "<script>alert('Your email or password is wrong')</script>";
            
            exit();
            
        }
        
        if($check_customer==1 AND $check_cart==0){
            
            $_SESSION['customer_email']=$customer_email;
            
            echo "<script>alert('You are logged in')</script>";
            
            echo "<script>window.open('../index.php','_self')</script>";
            
        }
        else{
            
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('../checkout.php','_self')</script>";
            
            
            
        }
        }
        else{
            echo "<script>alert('Your email or password is wrong')</script>";
            
            exit();
        }
        
    }

?>






















