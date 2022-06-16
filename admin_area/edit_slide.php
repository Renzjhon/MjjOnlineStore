<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['edit_slide'])){
            
            $edit_slide_id = $_GET['edit_slide'];
            
            $edit_slide = "select * from slider where slide_id='$edit_slide_id'";
            
            $run_edit_slide = mysqli_query($con,$edit_slide);
            
            $row_edit_slide = mysqli_fetch_array($run_edit_slide);
            
            $slide_id = $row_edit_slide['slide_id'];
            
            $slide_name = $row_edit_slide['slide_name'];
            
            $slide_image_ori = $row_edit_slide['slide_image'];
            
        }

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slide
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Edit Slide
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Slide Name 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input name="slide_name" type="text" class="form-control" value="<?php echo $slide_name; ?>">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Slide Image
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                                <input type="file" name="slide_image" class="form-control" accept="image/*">
                                
                                <br/>
                                
                                <img src="slides_images/<?php echo $slide_image_ori; ?>" class="img-responsive">

                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['update'])){
            
            $slide_name = $_POST['slide_name'];
            
            $slide_image = $_FILES['slide_image']['name'];
            
            $temp_name = $_FILES['slide_image']['tmp_name'];
            
            move_uploaded_file($temp_name,"slides_images/$slide_image");
            
            // for null image//
            if(empty($slide_image)){
                $slide_image = $slide_image_ori;
            }
            
            $update_slide = "update slider set slide_name='$slide_name',slide_image='$slide_image' where slide_id='$slide_id'";
            
            $run_update_slide = mysqli_query($con,$update_slide);
            
            if($run_update_slide){
                
                echo "<script>alert('The Slide has been updated Successfully')</script>";
        
                echo "<script>window.open('index.php?view_slides','_self')</script>";
                
            }
            
        }

?>














<?php } ?>