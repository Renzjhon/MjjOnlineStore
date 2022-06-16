<?php 

session_start();
include("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJJ Online Store Rider Panel</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="container">    <!--container start-->
       <form action="" class="form-login" method="post">    <!--form start-->
          
           <h2 class="form-login-heading"> Delivery Rider Login</h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="rider_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="rider_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="rider_login" >    <!--btn btn-lg btn-primary btn-block start-->
               
               Login
               
           </button>    <!--btn btn-lg btn-primary btn-block end-->
       
       </form>    <!--form end-->
   </div>    <!--container end-->
    </body>
</html>

<?php 

    if(isset($_POST['rider_login'])){
        
        $rider_email = mysqli_real_escape_string($con,$_POST['rider_email']);
        
        $rider_pass = mysqli_real_escape_string($con,$_POST['rider_pass']);
        
        $get_rider = "select * from riders where rider_email='$rider_email' AND rider_pass='$rider_pass'";
        
        $run_rider = mysqli_query($con,$get_rider);
        
        $count = mysqli_num_rows($run_rider);
        
        if($count==1){
            
            $_SESSION['rider_email']=$rider_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }
        else{
            
            echo "<script>alert('Email or Password is Wrong')</script>";
            
        }
        
    }

?>
















