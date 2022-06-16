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
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Add Materials
                    
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
                            
                            <label class="col-md-3 control-label"> Service Name </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="service" class="form-control">    <!--form-control start-->
                                    
                                    <option selected disabled> Select The Service Name </option>
                                    
                                    <?php  
                                    
                                    $get_services = "select * from services";
                                    $run_services = mysqli_query($con,$get_services);
                                    
                                    while($row_services=mysqli_fetch_array($run_services)){
                                        
                                        $service_id = $row_services['service_id'];
                                        $service_name = $row_services['service_name'];

                                        echo "
                                        
                                        <option value='$service_id'> $service_name </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> New Materials(made of)</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="material" type="text" class="form-control" required>
                                
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
    
     
    
    $service_id = $_POST['service'];
    $material = $_POST['material'];
    
    
    
    $insert_service = "insert into services_materials (service_id,material) values ('$service_id','$material')";
    
    $run_service = mysqli_query($con,$insert_service);
    
    
    if($run_service){
        
        echo "<script>alert('New material has been added sucessfully')</script>";
        echo "<script>window.open('index.php?insert_materials','_self')</script>";
        
    }
    
}

?>

<?php } ?>











































