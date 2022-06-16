<?php

if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{

?>


<body>
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <ol class="breadcrumb">    <!--breadcrumb start-->
                
                <li class="active">
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Rider
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Insert Rider
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Username </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="rider_name" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Email </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                               <input name="rider_email" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Password </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                              
                               <input name="rider_pass" type="Password" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Image </label>
                            
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="rider_image" type="file" class="form-control" required accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Contact </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input name="rider_contact" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        
                        
                        
                        
                        
                         
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Insert User" type="submit" class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                    </form>    <!--form-horizontal end-->
                    
                </div>    <!--panel-body end-->
                
            </div>    <!--panel panel-default end-->
            
        </div>    <!--col-lg-12 end-->
        
    </div>    <!--row end-->
    



<?php  

if(isset($_POST['submit'])){
    
    $rider_name = $_POST['rider_name'];
    $rider_email = $_POST['rider_email'];
    $rider_pass = $_POST['rider_pass'];
    $rider_contact = $_POST['rider_contact'];
    
    $rider_image = $_FILES['rider_image']['name'];
    $temp_admin_image = $_FILES['rider_image']['tmp_name'];
    
    
    
    move_uploaded_file($temp_admin_image,"../delivery_riders/rider_images/$rider_image");
    
    $insert_rider = "insert into riders (rider_name,rider_email,rider_pass,rider_contact,rider_image) values ('$rider_name','$rider_email','$rider_pass','$rider_contact','$rider_image')";
    
    $run_rider = mysqli_query($con,$insert_rider);
    
    if($run_rider){
        
        echo "<script>alert('New rider has been added sucessfully')</script>";
        echo "<script>window.open('index.php?view_riders','_self')</script>";
        
    }
    
}

?>

<?php } ?>











































