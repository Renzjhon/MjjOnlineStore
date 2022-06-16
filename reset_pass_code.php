<?php 
    
    $active='Account';
    include("includes/header.php");
?>

 <?php 

        if(isset($_GET['c_email'])){
            
            $email = $_GET['c_email'];
            $get_code = "select * from customers where customer_email='$email'";
            
            $run_code = mysqli_query($con,$get_code);
            
            $row_code = mysqli_fetch_array($run_code);
            
            $code = $row_code['reset_pass_code'];
          
            
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
                        Reset Password Request
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
                            
                            <h2> Enter Code to Reset Password </h2>
                            
                        </center>    <!--center end-->
                        
                        <form action="" method="post" enctype="multipart/form-data"> <!--form start-->
                            
                            
                            
                            <div class="form-group">    <!--form-group start-->
                                
                                <label>Enter Code: </label>
                                
                                <input type="text" class="form-control" name="code" required placeholder="Enter code ">
                                
                            </div>    <!--form-group end-->
                            
                            
                            <div class="text-center"> <!--text-center start-->
        
                                <button type="submit" name="submit" class="btn btn-primary"style="background-color:green">    <!--btn btn-primary start-->
            
                                <i class="fa fa-user-md"></i> Confirm
            
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
    
    
    
    
    
    $entered_code = $_POST['code'];
    
    if($code == $entered_code){
        echo "<script>window.open('reset_password.php?c_email=$email','_self')</script>";
    }
    else {
         echo "<script>alert('The code is wrong')</script>";
         echo "<script>window.open('reset_pass_code.php?c_email=$email','_self')</script>";
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