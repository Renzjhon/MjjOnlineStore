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
                    
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                    
                </li>
                
            </ol>    <!--breadcrumb end-->
            
        </div>    <!--col-lg-12 end-->
                
    </div>    <!--row end-->
    
    <div class="row">    <!--row start-->
        
        <div class="col-lg-12">    <!--col-lg-12 start-->
            
            <div class="panel panel-default"> <!--panel panel-start-->
                
                <div class="panel-heading">    <!--panel-heading start-->
                    
                    <h3 class="panel-title">    <!--panel-title start-->
                        
                        <i class="fa fa fa-money fa-fw"></i> Insert Product
                        
                    </h3>    <!--panel-title end-->
                    
                </div>    <!--panel-heading end-->
                
                <div class="panel-body">    <!--panel-body start-->
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">    <!--form-horizontal start-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Name:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_title" type="text" class="form-control" required autocomplete="off" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Category: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="product_cat" class="form-control">    <!--form-control start-->
                                    
                                    <option selected disabled> Select a Category Product </option>
                                    
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
                            
                            <label class="col-md-3 control-label"> Product Image 1:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img1" type="file" class="form-control" required accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end--> 
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 2:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img2" type="file" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Image 3:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="product_img3" type="file" class="form-control" accept="image/*">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Supplier: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="supplier" class="form-control">    <!--form-control start-->
                                    
                                    <option selected disabled> Select a Supplier </option>
                                    
                                    <?php  
                                    
                                    $get_p_cats = "select * from suppliers";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $id = $row_p_cats['supplier_ID'];
                                        $s_name = $row_p_cats['supplier_name'];

                                        echo "
                                        
                                        <option value='$s_name'> $s_name </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Selling Price:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                               
                                <span class="currency-code">₱</span>
                                
                                <input name="product_price" type="number" class="form-control" required min="0" step="0.01" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            
                            <label class="col-md-3 control-label"> Product Unit/ how many pcs per product:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                <input name="product_unit" type="text" class="form-control" required autocomplete="off" placeholder="eg. 100pcs / Kilogram / 1 square foot" >
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Initial Stock: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="initial_stock" type="number" class="form-control" required min="0">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> What is the critical level for stock?: </label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="critical_level" type="number" class="form-control" required min="0">
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"> Product Desc:</label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <textarea name="product_desc" cols="19" rows="16" class="form-control"></textarea>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
                        
                        <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                                
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
    
     
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $supplier = $_POST['supplier'];
    $product_unit = $_POST['product_unit'];
    $initial_stock = $_POST['initial_stock'];
    $critical_level = $_POST['critical_level'];
    $product_desc = $_POST['product_desc'];
    
    $a = 0;
    
    $get_p = "select * from products where product_title='$product_title'";
            
            
            $run_edit = mysqli_query($con,$get_p);
            while($row_edit = mysqli_fetch_array($run_edit)){
                $a++;
            }
            
           if($a > 0){
                echo "<script>alert('This name is already inside the database')</script>";
               
           }
    else
    {
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    
    
    
    
    
    
    
    $insert_product = "insert into products (p_cat_id,date,product_title,product_img1,product_img2,product_img3,unit,product_price,supplier,product_desc) values ('$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_unit','$product_price','$supplier','$product_desc')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    
    $get_p = "select * from products where product_title='$product_title'";
            
            $run_edit = mysqli_query($con,$get_p);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $p_id = $row_edit['product_id'];
    
    
    $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$p_id','$initial_stock',NOW())";
    
    $run_inventory_report = mysqli_query($con,$insert_inventory_report);
    
    if($run_product){
        
        
        $insert_inventory = "insert into inventory (product_title,qty_stock,critical_level,product_img,stock_in_date) values ('$product_title','$initial_stock','$critical_level','$product_img1',NOW())";
    
        $run_product_inventory = mysqli_query($con,$insert_inventory);
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
    }
        else{
            echo "<script>alert('The inputted data cannot contain apostrophe please try again')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
        }
    }
    
}

?>

<?php } ?>










































