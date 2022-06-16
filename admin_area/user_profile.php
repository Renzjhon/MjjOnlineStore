<?php

if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{

?>

<?php 

        if(isset($_GET['user_profile'])){
            
            $edit_user = $_GET['user_profile'];
            
            $get_user = "select * from admins where admin_id='$edit_user'";
            
            $run_user = mysqli_query($con,$get_user);
            
            $row_user = mysqli_fetch_array($run_user);
            
            $user_id = $row_user['admin_id'];
            
            $user_name = $row_user['admin_name'];
            
            $user_pass = $row_user['admin_pass'];
            
            $user_email = $row_user['admin_email'];
            
            $user_image1 = $row_user['admin_image'];
            
            $user_country = $row_user['admin_country'];
            
            $user_about = $row_user['admin_about'];
            
            $user_contact = $row_user['admin_contact'];
            
            $user_job = $row_user['admin_job'];
            
        }

?>


<body>
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <ol class="breadcrumb">    <!--breadcrumb start-->
                
                <li class="active">
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Edit User
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Edit User
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Username </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Email </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                               <input  value="<?php echo $user_email; ?>" name="admin_email" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Password </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                              
                               <input  value="<?php echo $user_pass; ?>" name="admin_pass" type="Password" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Country </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input  value="<?php echo $user_country; ?>" name="admin_country" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Contact </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input  value="<?php echo $user_contact; ?>" name="admin_contact" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Job </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input  value="<?php echo $user_job; ?>" name="admin_job" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Image </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="admin_image" type="file" class="form-control" >
                                
                                <img src="admin_images/<?php echo $user_image1; ?>" width="200" height="200">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> About </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <textarea name="admin_about" class="form-control" rows="3"><?php echo $user_about; ?></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                         
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="update" value="Update User" type="submit" class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                    </form>    <!--form-horizontal end-->
                    
                </div>    <!--panel-body end-->
                
            </div>    <!--panel panel-default end-->
            
        </div>    <!--col-lg-12 end-->
        
    </div>    <!--row end-->
    



<?php  

if(isset($_POST['update'])){
    
    $user_name = $_POST['admin_name'];
    $user_email = $_POST['admin_email'];
    $user_pass = $_POST['admin_pass'];
    $user_country = $_POST['admin_country'];
    $user_contact = $_POST['admin_contact'];
    $user_job = $_POST['admin_job'];
    $user_about = $_POST['admin_about'];
    
    
    
    $user_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    
    // for null image//
    if(empty($user_image)){
        $user_image = $user_image1;
    }
    
    
    move_uploaded_file($temp_admin_image,"admin_images/$user_image");
    
    $insert_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_country='$user_country',admin_contact='$user_contact',admin_job='$user_job',admin_about='$user_about',admin_image='$user_image' where admin_id='$user_id'";
    
    $run_user = mysqli_query($con,$insert_user);
    
    if($run_user){
        
        echo "<script>alert('The user has been updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
        
    }
    
}

?>

<?php } ?>











































