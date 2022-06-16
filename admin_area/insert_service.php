<?php

if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{

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
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Add Services
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Add Services
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Name:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_name" type="text" class="form-control" required autocomplete="off" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Image 1:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img1" type="file" class="form-control" required accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Image 2:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img2" type="file" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Image 3:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_img3" type="file" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label">Base Material <br>(you can add more in services materials)</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="service_material" type="text" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <center><strong>Price Range</strong></center>
                        <br>
                       
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> From: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                                <span class="currency-code">₱</span>
                                
                                <input name="service_price_min" type="number" class="form-control" required min="0" step="0.01" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> To: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                                <span class="currency-code">₱</span>
                            
                                <input name="service_price_max" type="number" class="form-control" required min="0" step="0.01" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Service Description:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="service_desc" cols="19" rows="16" class="form-control"></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Insert service" type="submit" class="btn btn-primary form-control">
                                
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

if(isset($_POST['submit'])){
    
     
    
    $service_name = $_POST['service_name'];
    $service_price_min = $_POST['service_price_min'];
    $service_price_max = $_POST['service_price_max'];
    $service_desc = $_POST['service_desc'];
    
    $service_img1 = $_FILES['service_img1']['name'];
    $service_img2 = $_FILES['service_img2']['name'];
    $service_img3 = $_FILES['service_img3']['name'];
    
    $temp_name1 = $_FILES['service_img1']['tmp_name'];
    $temp_name2 = $_FILES['service_img2']['tmp_name'];
    $temp_name3 = $_FILES['service_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"service_images/$service_img1");
    move_uploaded_file($temp_name2,"service_images/$service_img2");
    move_uploaded_file($temp_name3,"service_images/$service_img3");
    
    $insert_service = "insert into services (service_name,service_desc,service_price_min,service_price_max,service_img1,service_img2,service_img3) values ('$service_name','$service_desc','$service_price_min','$service_price_max','$service_img1','$service_img2','$service_img3')";
    
    $run_service = mysqli_query($con,$insert_service);
    
    
    if($run_service){
        
        echo "<script>alert('New service has been added sucessfully')</script>";
        echo "<script>window.open('index.php?insert_service','_self')</script>";
        
    }
    
}

?>

<?php } ?>











































