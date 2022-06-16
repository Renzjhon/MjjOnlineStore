<?php 
    
    $active='Account';
    include("includes/header.php");
?>
 
   <?php 

        if(isset($_GET['c_email'])){
            
            $email = $_GET['c_email'];
            
          
            
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
                        Reset Password
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
                    
                    <div class="box-header">    <!--box-header start-->
                        
                        <center>    <!--center start-->
                            
                            <h2> Reset your Password </h2>
                            
                        </center>    <!--center end-->
                        
                        <form action="" method="post" enctype="multipart/form-data"> <!--form start-->
                            
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>New Password: </label>
                                
                                <input type="password" class="form-control" name="password" required title="Password must be atleast 8 characters including atleast 1 uppercase letter, 1 lowercase letter and numeric characters" placeholder="Password must be atleast 8 characters including atleast 1 uppercase letter, 1 lowercase letter and numeric characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                
                            </div>    <!--form-group end-->
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Re-enter New Password: </label>
                                
                                <input type="password" class="form-control" name="re_enter" required placeholder="Re-enter New Password">
                                
                            </div>    <!--form-group end-->
                            
                            
                            <div class="text-center"> <!--text-center start-->
        
                                <button type="submit" name="submit" class="btn btn-primary"style="background-color:green">    <!--btn btn-primary start-->
            
                                <i class="fa fa-user-md"></i> Update New Password
            
                                </button>    <!--btn btn-primary end-->
        
                            </div>    <!--text-center end-->
                            
                            
                            
                            
                        </form>    <!--form end-->
                        
                    </div>    <!--box-header end-->
                    
                </div>    <!--box start-->
                
            </div>    <!--col-md-9 end-->
            
        </div>    <!--container end-->
    </div>    <!--content end-->
    
    
<?php  

if(isset($_POST['submit'])){
    
    
    
    
    
    $password = $_POST['password'];
    $re_pass = $_POST['re_enter'];
    
    
    if($password == $re_pass){
        
        $encpass = password_hash($password, PASSWORD_BCRYPT);
    
        $update_password = "update customers set customer_pass='$encpass' where customer_email='$email'";
             
        $run_password = mysqli_query($con,$update_password);
             
        if($run_password){
                 
        echo "<script>alert('Your Password has been updated use your new password to login')</script>";
                 
        echo "<script>window.open('customer/customer_login.php','_self')</script>";
                 
             }
    }
    
    else{
        echo "<script>alert('The passwords do not match. please try again')</script>";
                 
        echo "<script>window.open('reset_password.php?c_email=$email','_self')</script>";
        
    }
    
    
    
}

?>


  
<!-------------------------------php--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    

    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>