<?php

if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{

?>

<?php 

        if(isset($_GET['edit_service'])){
            
            $edit_id = $_GET['edit_service'];
            
            $get_service = "select * from services where service_id='$edit_id'";
            
            $run_edit = mysqli_query($con,$get_service);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $service_id = $row_edit['service_id'];
            
            $service_name = $row_edit['service_name'];
            
            $service_desc = $row_edit['service_desc'];
            
            $service_price_min = $row_edit['service_price_min'];
            
            $service_price_max = $row_edit['service_price_max'];
            
            $service_img1_ori = $row_edit['service_img1'];
            
            $service_img2_ori = $row_edit['service_img2'];
            
            $service_img3_ori = $row_edit['service_img3'];
            
            
        }
        
        
            
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Product</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
</head>
<body>
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <ol class="breadcrumb">    <!--breadcrumb start-->
                
                <li class="active">
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Service
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Edit Service
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Name</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_name" type="text" class="form-control" required value="<?php echo $service_name; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Description </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="service_desc" cols="19" rows="5" class="form-control"><?php echo $service_desc; ?>
                                </textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                           
                            <center><strong>Price Range</strong></center>
                            
                            <br>
                       
                            <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> From: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                                <span class="currency-code">₱</span>
                                
                                <input name="service_price_min" type="number" class="form-control" required min="0" step="0.01" value="<?php echo $service_price_min; ?>" >
                                
                            </div>    <!--col-md-6 end-->
                            
                            </div>    <!--form-group end-->
                            <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> To: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                                <span class="currency-code">₱</span>
                            
                                <input name="service_price_max" type="number" class="form-control" required min="0" step="0.01" value="<?php echo $service_price_max; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                            </div>    <!--form-group end-->
                            
                            
                           
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Image 1</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img1" type="file" class="form-control"  accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="service_images/<?php echo $service_img1_ori; ?>" alt="<?php echo $service_img1; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 2</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img2" type="file" class="form-control" accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="service_images/<?php echo $service_img2_ori; ?>" alt="<?php echo $service_img2; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 3</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img3" type="file" class="form-control" accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="service_images/<?php echo $service_img3_ori; ?>" alt="<?php echo $service_img3; ?>">
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="update" value="Update Service" type="submit" class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                    </form>    <!--form-horizontal end-->
                    
                </div>    <!--panel-body end-->
                
            </div>    <!--panel panel-default end-->
            
        </div>    <!--col-lg-12 end-->
        
    </div>    <!--row end-->
    
</body>
</html>


<?php  
        

if(isset($_POST['update'])){
    
    $service_name = $_POST['service_name'];
    $service_desc = $_POST['service_desc'];
    $service_price_min = $_POST['service_price_min'];
    $service_price_max = $_POST['service_price_max'];
    
    
    $service_img1 = $_FILES['service_img1']['name'];
    $service_img2 = $_FILES['service_img2']['name'];
    $service_img3 = $_FILES['service_img3']['name'];
    
    $temp_name1 = $_FILES['service_img1']['tmp_name'];
    $temp_name2 = $_FILES['service_img2']['tmp_name'];
    $temp_name3 = $_FILES['service_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"service_images/$service_img1");
    move_uploaded_file($temp_name2,"service_images/$service_img2");
    move_uploaded_file($temp_name3,"service_images/$service_img3");
    

    if(empty($service_img1)){
        $service_img1 = $service_img1_ori;
    }
    if(empty($service_img2)){
        $service_img2 = $service_img2_ori;
    }
    if(empty($service_img3)){
        $service_img3 = $service_img3_ori;
    }
    
    $update_service = "update services set service_name='$service_name',service_desc='$service_desc',service_price_min='$service_price_min',service_price_max='$service_price_max',service_img1='$service_img1',service_img2='$service_img2',service_img3='$service_img3' where service_id='$service_id'";
    
    $run_service = mysqli_query($con,$update_service);
    
    if($run_service){
        
        echo "<script>alert('Your service has been updated successfully')</script>";
        
        echo "<script>window.open('index.php?view_services','_self')</script>";
        
    }
    
    
    
}

?>

<?php } ?>











































