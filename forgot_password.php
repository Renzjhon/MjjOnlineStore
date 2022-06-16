<?php 
    
    $active='Account';
    include("includes/header.php");
?>
 
   
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Forgot Password
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
                            
                            <h2> Forgot Password? </h2>
                            
                        </center>    <!--center end-->
                        <center>    <!--center start-->
                            
                            <h4 style="color:gray"> Don't worry! Just fill in you email and <br>we'll send you a code you will use to reset your password </h4>
                            
                        </center>    <!--center end-->
                        
                        <form action="" method="post" enctype="multipart/form-data"> <!--form start-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Enter your Email: </label>
                                
                                <input type="EMAIL" class="form-control" name="email" required placeholder="Your email">
                                
                            </div>    <!--form-group end-->
                            
                            <br>
                            <div class="text-center"> <!--text-center start-->
        
                                <button type="submit" name="submit" class="btn btn-primary"style="background-color:green">    <!--btn btn-primary start-->
            
                                <i class="fa fa-user-md"></i> Request password reset
            
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
    
    
        $code = mt_rand();
    
        $email = $_POST['email'];
    
    

        $check_email = "select * from customers where customer_email='$email'";
        
        $run_email = mysqli_query($con,$check_email);
        
        $check_e = mysqli_num_rows($run_email);
    
        if($check_e == 0) {
             echo "<script>alert('That email is not registered in our system')</script>";
        }
    else{
        
        $update_code = "update customers set reset_pass_code='$code' where customer_email='$email'";
    
        $run_customer = mysqli_query($con,$update_code);
             
        if($run_customer){
    
        $receiver = "$email";
                $subject = "Reset Password";
                $body = "
                Good Day Dear Customer,
                
                It seems you forgot your password
                
                Don't worry just use this code : $code 
                
                Enter that code to the form we provide and then you can reset your password
                please try not to forgot your password next time
                Have a good day.


                Thank You,
                From: MJJ Team.
            
            
            
            
            
            ";
                $sender = "From: Renzjohnbuizon@gmail.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "<script>alert('A code to reset your password has been sent')</script>";
                }else{
                echo "<script>alert('Failed sending email please try again')</script>";
                }
        
             echo "<script>window.open('reset_pass_code.php?c_email=$email','_self')</script>";
    
        }
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