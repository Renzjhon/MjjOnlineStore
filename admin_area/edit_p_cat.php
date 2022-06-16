<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['edit_p_cat'])){
            
            $edit_p_cat_id = $_GET['edit_p_cat'];
            
            $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
            
            $run_edit = mysqli_query($con,$edit_p_cat_query);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $p_cat_id = $row_edit['p_cat_id'];
            
            $p_cat_title = $row_edit['p_cat_title'];
            
            $p_cat_desc = $row_edit['p_cat_desc'];
            
        }

?>


<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-pencil fa-fw"></i> Edit Product Category
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <form action="" class="form-horizontal" method="post">    <!--form-horizontal start-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Product Category Title 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value=" <?php echo $p_cat_title; ?> " name="p_cat_title" type="text" class="form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Product Category Description 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <textarea type='text' name="p_cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $p_cat_desc; ?></textarea>
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

         if(isset($_POST['update'])){
             
             $p_cat_title = $_POST['p_cat_title'];
             
             $p_cat_desc = $_POST['p_cat_desc'];
             
             $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
             
             $run_p_cat = mysqli_query($con,$update_p_cat);
             
             if($run_p_cat){
                 
                 echo "<script>alert('Your Product Category has been Updated')</script>";
                 
                 echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                 
             }
             
         }

?>














<?php } ?>