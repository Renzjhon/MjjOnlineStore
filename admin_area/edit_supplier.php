<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['edit_supplier'])){
            
            $edit_supplier_id = $_GET['edit_supplier'];
            
            $edit_supplier_query = "select * from suppliers where supplier_ID='$edit_supplier_id'";
            
            $run_edit = mysqli_query($con,$edit_supplier_query);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $supplier_id = $row_edit['supplier_ID'];
            
            $supplier_name = $row_edit['supplier_name'];
            
            $supplier_address = $row_edit['address'];
            
            $supplier_contact = $row_edit['contact_number'];
            
            $supplier_email = $row_edit['email'];
            
            
        }

?>


<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Supplier
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-pencil fa-fw"></i> Edit Supplier
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <form action="" class="form-horizontal" method="post">    <!--form-horizontal start-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Supplier Name: 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value=" <?php echo $supplier_name; ?> " name="supplier_name" type="text" class="form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Supplier Address: 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value=" <?php echo $supplier_address; ?> " name="supplier_address" type="text" class="form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Supplier Contact Number: 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value=" <?php echo $supplier_contact; ?> " name="supplier_contact" type="text" class="form-control">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            Supplier Email: 
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input value=" <?php echo $supplier_email; ?> " name="supplier_email" type="text" class="form-control">
                        
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
             
             $supplier_name = $_POST['supplier_name'];
             
             $supplier_address = $_POST['supplier_address'];
             
             $supplier_contact = $_POST['supplier_contact'];
             
             $supplier_email = $_POST['supplier_email'];
             
             
             $update_supplier = "update suppliers set supplier_name='$supplier_name',address='$supplier_address',contact_number='$supplier_contact',email='$supplier_email' where supplier_ID='$supplier_id'";
             
             $run_supplier = mysqli_query($con,$update_supplier);
             
             if($run_supplier){
                 
                 echo "<script>alert('Your Supplier has been Updated')</script>";
                 
                 echo "<script>window.open('index.php?view_suppliers','_self')</script>";
                 
             }
             
         }

?>














<?php } ?>