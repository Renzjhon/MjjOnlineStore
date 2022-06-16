<?php

if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{

?>

<?php 

        if(isset($_GET['edit_product'])){
            
            $edit_id = $_GET['edit_product'];
            
            $get_p = "select * from products where product_id='$edit_id'";
            
            $run_edit = mysqli_query($con,$get_p);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $p_id = $row_edit['product_id'];
            
            $p_title = $row_edit['product_title'];
            
            $p_cat = $row_edit['p_cat_id'];
            
            $cat = $row_edit['cat_id'];
            
            $p_image1 = $row_edit['product_img1'];
            
            $p_image2 = $row_edit['product_img2'];
            
            $p_image3 = $row_edit['product_img3'];
            
            $supplier = $row_edit['supplier'];
            
            $p_price = $row_edit['product_price'];
            $p_unit = $row_edit['unit'];
            
            $p_desc = $row_edit['product_desc'];
            
        }
        
            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        
            $run_p_cat = mysqli_query($con,$get_p_cat);
        
            $row_p_cat = mysqli_fetch_array($run_p_cat);
        
            $p_cat_title = $row_p_cat['p_cat_title'];
        
           
        
            
        
            
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
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Edit Product
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Title</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Category </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="product_cat" class="form-control">    <!--form-control start-->
                                    
                                    <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title ?> </option>
                                    
                                    <?php  
                                    
                                    $get_p_cats = "select * from product_categories";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo "
                                        
                                        <option value='$p_cat_id'> $p_cat_title </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 1</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img1" type="file" class="form-control" accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 2</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img2" type="file" class="form-control" accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 3</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img3" type="file" class="form-control" accept="image/*">
                                
                                <br>
                                
                                <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Supplier: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="supplier" class="form-control" >    <!--form-control start-->
                                    
                                    <option selected value="<?php echo $supplier?>"> <?php echo $supplier?> </option>
                                    
                                    <?php  
                                    
                                    $get_p_cats = "select * from suppliers";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $id = $row_p_cats['supplier_ID'];
                                        $s_name = $row_p_cats['supplier_name'];
                                        if($s_name == $supplier){}
                                        else{
                                        echo "
                                        
                                        <option value='$s_name'> $s_name </option>
                                        
                                        ";
                                        }   
                                    }
                                    
                                    ?>
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Selling Price </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_price" type="number" class="form-control" required value="<?php echo $p_price; ?>" required min="0" step="0.01" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            
                            <label class="col-md-3 control-label"> Product Unit/ how many pcs per product:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                <input name="product_unit" type="text" class="form-control" required autocomplete="off" placeholder="eg. 100pcs / Kilogram / 1 square foot" value="<?php echo $p_unit; ?>">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Desc </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="product_desc" cols="19" rows="16" class="form-control"><?php echo $p_desc; ?></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <center>
                        <div class="form-group">    <!--form-group start-->
                            
                            
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        </center>
                    </form>    <!--form-horizontal end-->
                    
                </div>    <!--panel-body end-->
                
            </div>    <!--panel panel-default end-->
            
        </div>    <!--col-lg-12 end-->
        
    </div>    <!--row end-->
</body>
</html>


<?php  
        

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $supplier = $_POST['supplier'];
    $product_price = $_POST['product_price'];
    $product_unit = $_POST['product_unit'];
    $product_desc = $_POST['product_desc'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    // for null image//
    if(empty($product_img1)){
        $product_img1 = $p_image1;
    }
    if(empty($product_img2)){
        $product_img2 = $p_image2;
    }
    if(empty($product_img3)){
        $product_img3 = $p_image3;
    }
    
    $update_product = "update products set p_cat_id='$product_cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_desc='$product_desc',supplier='$supplier',product_price='$product_price',unit='$product_unit' where product_id='$p_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
        echo "<script>alert('Your product has been update Successfully')</script>";
        
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
    }
    
    
    
}

?>

<?php } ?>











































