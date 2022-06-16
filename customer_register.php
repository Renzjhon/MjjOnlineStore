<?php 
    
    $active='Account';
    include("includes/header.php");
?>
  <head>
       <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style></head>
    
    
<script>	
window.onload = function() {	

	// ---------------
	// basic usage
	// ---------------
	var $ = new City();
	$.showProvinces("#province");
	$.showCities("#city");

	// ------------------
	// additional methods 
	// -------------------

	// will return all provinces 
	console.log($.getProvinces());
	
	// will return all cities 
	console.log($.getAllCities());
	
	// will return all cities under specific province (e.g Batangas)
	console.log($.getCities("Batangas"));	
	
}
</script>
   
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
                            
                            <h2> Register new account</h2>
                            
                        </center>    <!--center end-->
                        
                        <form action="customer_register.php" method="post" enctype="multipart/form-data"> <!--form start-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Full Name:</label>
                                
                                <input type="text" class="form-control" name="c_name" required placeholder="Firstname, MI, Lastname">
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Email Addres:</label>
                                
                                <input type="EMAIL" class="form-control" name="c_email" required placeholder="xxx@xxx.com">
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Password:</label>
                                
                                <input type="password" class="form-control" name="c_pass" required title="Password must be atleast 8 characters including atleast 1 uppercase letter, 1 lowercase letter and numeric characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Confirm Password:</label>
                                
                                <input type="password" class="form-control" name="c_passConfirm" required title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters">
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Province:</label>
                                
                                <select id="province" class="form-control" name="province" required ></select>	
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>City:</label>
                                
                                <select id="city" class="form-control" name="c_city" required></select>	
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                                
                            <label>Street Address:</label>
                                
                                <input type="text" class="form-control" name="c_address" required placeholder="Street no., Street name">
                                
                            </div>    <!--form-group end-->
                            
                            <div class="form-group">    <!--form-group start-->
                               
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Contact Number:</label>
                                
                                <input type="number" class="form-control" name="c_contact" required placeholder="09xxxxxxxxx" step="0">
                                
                            </div>    <!--form-group end-->
                                
                            <label>Your Profile Picture:</label>
                                
                                <input type="file" class="form-control form-height-custom" name="c_image" accept="image/*">
                                
                            </div>    <!--form-group end-->
                               <div class="form-group">    <!--form-group start--> <center>
                                
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" required>
                                  <label for="vehicle1"> I accept <a href="termsandcondition.php" target="_blank"> Terms and condition </a></label><br>
                                </center>
                            </div>    <!--form-group end-->
                            
                            <div class="text-center">    <!--text-center start-->
                                
                                <button type="submit" name="register" class="btn btn-primary">
                                
                                <i class="fa fa-user-md"></i> Register
                                
                                </button>
                                
                            </div>    <!--text-center end-->
                            
                        </form>    <!--form end-->
                        
                    </div>    <!--box-header end-->
                    
                </div>    <!--box start-->
                
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



<?php 



$check_email="SELECT * FROM customers WHERE customer_email = '$_POST[c_email]'";

$rs = mysqli_query($con,$check_email);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 0) {
   echo "<script type='text/javascript'>alert('That email is already registered');</script>";
}

else
{

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_passConfirm = $_POST['c_passConfirm'];
    
    $encpass = password_hash($c_pass, PASSWORD_BCRYPT);
    
    $c_country = $_POST['province'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    
    
    $c_ip = getRealIpUser();
    
    $code = mt_rand();
    
    
    
    if($c_pass !== $c_passConfirm){
        
        echo "<script type='text/javascript'>alert('Your Password do not match');</script>";
    }
    
    else{
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,verification_code) values ('$c_name','$c_email','$encpass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$code')";
    
    
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        //pag nag register ng walang item sa cart ang customer
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Customer Account Successfully Created')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
        
    }
    else{
        
        //pag nag register ng may item sa cart ang customer
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Customer Account Successfully Created')</script>";
        
        echo "<script>window.open('verify_email.php','_self')</script>";
        
    }
        
       
        $receiver = "$c_email";
            $subject = "Confirm Your Email";
            $body = "
                Good Day Mr/Ms. $c_name,
                
                Welcome to MJJ Online Store!
                Thank you for register your email address $c_email.
                The website will asked to enter a confirmation code to verify your account registration.
                
                Note this code will only be usable for 2 mins!!
                This is your confirmation code: $code

                After you enter the code you may now proceed to check out our latest products and services.

                Thank you for visiting our website.
                For more information click here mjjaluminumandglasswork.com


                Thank You,
                From: MJJ Team.
            
            
            
            
            
            ";
        
        
        
        
        
        
        
        
            $sender = "From: renzjohnbuizon@gmail.com";
            if(mail($receiver, $subject, $body, $sender)){
            echo "Email sent successfully to $receiver";
            }else{
            echo "Sorry, failed while sending mail!";
            }
            
        
    }
}
    
    
}

?>


