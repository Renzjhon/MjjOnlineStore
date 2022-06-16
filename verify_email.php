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
                
                <div class="box">    <!--box start-->
                    
                    <div class="box-header">    <!--box-header start-->
                        
                        <center>    <!--center start-->
                            
                            <h2> Verify your email </h2>
                            
                        </center>    <!--center end-->
                        
                        <form action="" method="post" enctype="multipart/form-data"> <!--form start-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Code: </label>
                                
                                <input type="text" class="form-control" name="code" required placeholder="Code form email">
                                
                            </div>    <!--form-group end-->
                            <div class="text-center"> <!--text-center start-->
                            
                            
                                <button type="update" id="myBtn" name="update "class="btnDisable"  disabled >To resend code please wait...<div id="myTimer"></div></button>
        
                                
        
                            </div>    <!--text-center end-->
                            <br><br>
                            <div class="text-center"> <!--text-center start-->
        
                                <button type="submit" name="submit" class="btn btn-primary"style="background-color:green">    <!--btn btn-primary start-->
            
                                <i class="fa fa-user-md"></i> Verify
            
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
    
    
    
    
    
    $code = $_POST['code'];
    
    
    $verified = 1;
    
    $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
    $run_customer = mysqli_query($con,$select_customer);
                        
    $row_customer = mysqli_fetch_array($run_customer);
        
    $realcode = $row_customer['verification_code'];
    
    $otp_time = $row_customer['otp_time_generated'];
    
    
    
             
    
    if($realcode == $code){
        
        if(strtotime($otp_time) > strtotime("-2 minutes")) {
 
    
            $update_code = "update customers set verified='$verified' where customer_email='$_SESSION[customer_email]'";
             
        $run_code = mysqli_query($con,$update_code);
             
        if($run_code){
                 
        echo "<script>alert('Your Account has been Verified you can checkout products now')</script>";
                 
        echo "<script>window.open('index.php','_self')</script>";
                 
             }
        }
        else{
            
            echo "<script>alert('That Code is past the 5 minutes expiration time please try to resend again')</script>";
                 
            echo "<script>window.open('verify_email.php','_self')</script>";
        }
    
        
    }
    
    else{
        echo "<script>alert('Sorry your code does not match please try again')</script>";
                 
        echo "<script>window.open('verify_email.php','_self')</script>";
        
    }
    
    
    
}

?>

  
  
<!--      Script for timer in resending verification code-->
   <script>

var sec = 60;
var myTimer = document.getElementById('myTimer');
var myBtn = document.getElementById('myBtn');
window.onload = countDown;

function countDown() {
  if (sec < 10) {
    myTimer.innerHTML = "0" + sec;
  } else {
    myTimer.innerHTML = sec;
  }
  if (sec <= 0) {
    
    $("#myTimer").fadeTo(2500, 0);
    myBtn.innerHTML = "<button type='update' name='update' class='btn btn-primary' formnovalidate><i class='fa fa-envelope'></i> Resend Verification Code</button>";
    return;
  }
  sec -= 1;
  window.setTimeout(countDown, 1000);
}
    </script>
  
  
  
  
  
<!--  php for resending verification code-->

<?php  

if(isset($_POST['update'])){
    
        $code = mt_rand();
        
        $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
        $run_customer = mysqli_query($con,$select_customer);
                        
        $row_customer = mysqli_fetch_array($run_customer);
    
        $c_id = $row_customer['customer_id'];
             
        $c_name = $row_customer['customer_name'];
        $c_email = $row_customer['customer_email'];
    
        $today = date("Y-m-d H:i:s");    
        
             
        $update_code = "update customers set verification_code='$code',otp_time_generated='$today' where customer_id='$c_id'";
             
        $run_customer = mysqli_query($con,$update_code);
             
             if($run_customer){
                 
                $receiver = "$c_email";
                $subject = "Resend Verification";
                $body = "
                Good Day Mr/Ms. $c_name,
                
                Thank you for waiting!
                
                You register your email address $c_email.
                The website will asked to enter a confirmation code to verify your account registration.

                Note this code will only be usable for 2 mins!!
                This is your resend confirmation code: $code

                After you enter the code you may now proceed to check out our latest products and services.

                Thank you for visiting our website.
                For more information click here mjjaluminumandglasswork.com


                Thank You,
                From: MJJ Team.
            
            
            
            
            
            ";
                $sender = "From: Renzjohnbuizon@gmail.com";
                if(mail($receiver, $subject, $body, $sender)){
                echo "<script>alert('A new verification code has been sent to your email')</script>";
                }else{
                echo "<script>alert('Failed sending email please try again')</script>";
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