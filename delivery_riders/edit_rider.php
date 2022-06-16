<?php

if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{

?>

<?php 

        if(isset($_GET['edit_rider'])){
            
            $edit_rider = $_GET['edit_rider'];
            
            $get_rider = "select * from riders where rider_id='$edit_rider'";
            
            $run_rider = mysqli_query($con,$get_rider);
            
            $row_rider = mysqli_fetch_array($run_rider);
            
            $rider_id = $row_rider['rider_id'];
            
            $rider_name = $row_rider['rider_name'];
            
            $rider_pass = $row_rider['rider_pass'];
            
            $rider_email = $row_rider['rider_email'];
            
            $rider_image_ori = $row_rider['rider_image'];
           
            $rider_contact = $row_rider['rider_contact'];
            
        }

?>


<body>
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <ol class="breadcrumb">    <!--breadcrumb start-->
                
                <li class="active">
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Rider
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Edit Rider
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Username </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input value="<?php echo $rider_name; ?>" name="rider_name" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Email </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                               <input  value="<?php echo $rider_email; ?>" name="rider_email" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Password </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                              
                               <input  value="<?php echo $rider_pass; ?>" name="rider_pass" type="Password" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Contact </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                               <input  value="<?php echo $rider_contact; ?>" name="rider_contact" type="text" class="form-control" required>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Image </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="rider_image" type="file" class="form-control" >
                                
                                <img src="../delivery_riders/rider_images/<?php echo $rider_image_ori; ?>" width="200" height="200">
                                
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
    
    $rider_name = $_POST['rider_name'];
    $rider_email = $_POST['rider_email'];
    $rider_pass = $_POST['rider_pass'];
    $rider_contact = $_POST['rider_contact'];
    
    $rider_image = $_FILES['rider_image']['name'];
    $temp_admin_image = $_FILES['rider_image']['tmp_name'];
    
    // for null image//
    if(empty($rider_image)){
        $rider_image = $rider_image_ori;
    }
    
    
    
    move_uploaded_file($temp_admin_image,"../delivery_riders/rider_images/$rider_image");
    
    $insert_rider = "update riders set rider_name='$rider_name',rider_email='$rider_email',rider_pass='$rider_pass',rider_contact='$rider_contact',rider_image='$rider_image' where rider_id='$rider_id'";
    
    $run_rider = mysqli_query($con,$insert_rider);
    
    if($run_rider){
        
        echo "<script>alert('The rider has been updated sucessfully')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
        
    }
    
}

?>

<?php } ?>











































