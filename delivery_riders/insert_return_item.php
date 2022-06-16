<?php

if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{

?>
<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Return Item
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Insert Return Item
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <form action="" class="form-horizontal" method="post">    <!--form-horizontal start-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Product Name
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input name="p_name" type="text" class="form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Product Quantity
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input name="qty" type="number" class="form-control" required min="0">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    
                    <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Issue:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="p_issue" cols="19" rows="8" class="form-control"></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                   
                    <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Submit" type="submit" class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

         if(isset($_POST['submit'])){
             
             $name = $_POST['p_name'];
             
             $qty = $_POST['qty'];
             
             $issue = $_POST['p_issue'];
             
             $insert_p_cat = "insert into return_items (product_name,qty,issue,date) values ('$name','$qty','$issue',NOW())";
             
             $run_p_cat = mysqli_query($con,$insert_p_cat);
             
             if($run_p_cat){
                 
                 echo "<script>alert('Item Return Has Been Inserted')</script>";
                 
                 echo "<script>window.open('index.php?view_return_item','_self')</script>";
                 
             }
             
         }

?>

<?php }?>




