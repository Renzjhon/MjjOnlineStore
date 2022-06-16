<?php 
    
    $active='Cart';
    include("includes/header.php");

?>
<?php 


if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    if($pro_img1 == NULL){
        $pro_img1 = "defaultproduct.png";
    }
    
    $pro_img2 = $row_product['product_img2'];
    
    if($pro_img2 == NULL){
        $pro_img2 = "defaultproduct.png";
    }
    
    $pro_img3 = $row_product['product_img3'];
    
    if($pro_img3 == NULL){
        $pro_img3 = "defaultproduct.png";
    }
    
    $pro_unit = $row_product['unit'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
    $get_inventory = "select * from inventory where product_id='$product_id'";
    
    $run_inventory = mysqli_query($con,$get_inventory);
    
    $row_inventory = mysqli_fetch_array($run_inventory);
    
    $stock = $row_inventory['qty_stock'];
    
}


?>
 
    
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                    </li>
                    <li>
                        <?php echo $pro_title; ?>
                    </li>
                    
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
    
 <?php 
    
    include("includes/sidebar.php");
    
    ?>          
            </div>    <!--col-md-3 end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
                <div id="productMain" class="row">    <!--row start-->
                    <div class="col-sm-6">    <!--col-sm-6 start-->
                        <div id="mainImage">    <!--mainImage start-->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">    <!--carousel slide start-->
                                <ol class="carousel-indicators">    <!--carousel-indicators start-->
                                    <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1"></center>
                                    </div>
                                </div>
                                
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">    <!--left carousel-control start-->
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>    <!--left carousel-control end-->
                                
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">    <!--right carousel-control start-->
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>    <!--right carousel-control end-->
                                
                            </div>    <!--carousel slide end-->    
                        </div>    <!--mainImage end-->
                    </div>    <!--col-sm-6 end-->
                    
                    <div class="col-sm-6">    <!--col-sm-6 start-->
                        <div class="box">    <!--box start-->
                           
                           
                           <p>Available stock : <strong><?php echo $stock; ?></strong></p>
                             
                              <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                             <?php add_cart(); ?>
                            
                            
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">    <!--form-horizontal start-->
                                <div class="form-group">    <!--form-group start-->
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>
                                    
                                    <div class="col-md-7">    <!--col-md-7 start-->
                                        
                                           <input type="number" id="" name="product_qty" value="0" min="1" max="<?php echo $stock; ?>">
                                        
                                    </div>    <!--col-md-7 end-->
                                    
                                </div>    <!--form-group end-->
                                
                                
                                
                                 <p class="price">₱ <?php echo $pro_price; ?> <small><small>per <?php echo $pro_unit; ?></small></small></p> 
                                 
                                 <?php 
                                    
                                    if($stock == 0){
                                        echo"<p class='text-center buttons'><button class='btn btn-primary i fa fa-shopping-cart' disabled> Sorry Out of Stock </button></p>";
                                        
                                    }
                                
                                    else{
                                        echo "<p class='text-center buttons'><button class='btn btn-primary i fa fa-shopping-cart'> Add to cart</button></p>";
                                    }
                                
                                ?>
                                

                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                            
                          
                        
                        
                        
                        <div class="row" id="thumbs"> <!--row start-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 2" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                        </div>    <!--row end-->
                        
                    </div>    <!--col-sm-6 end-->
                    
                </div>    <!--row end-->
                
                <div class="box" id="details" style="height:200px;">    <!--box start-->
                    
                    <h4><strong>Product Details</strong></h4>
                    
                    <p>
                    
                    <?php echo $pro_desc; ?>
                    
                    </p>
                    
                        
                    
                </div>    <!--box end-->
                
                <div id="same-heigh-row">    <!--same-height-row start-->
                    <div class="col-md-3 col-sm-6">    <!--col-md-3 col-sm-6 start-->
                        <div class="box same-height headline">    <!--box same-height headline start-->
                            <h3 class="text-center">Products You May Like</h3>
                        </div>    <!--box same-height headline end-->
                    </div>    <!--col-md-3 col-sm-6 end-->
                    
                    <?php 
                    
                        $get_products = "select * from products order by rand() LIMIT 0,3";
                    
                        $run_products = mysqli_query($con,$get_products);
                    
                        while($row_products=mysqli_fetch_array($run_products)){
                            
                            $pro_id = $row_products['product_id'];                            
                            
                            $pro_title = $row_products['product_title'];
                            
                            $pro_img1 = $row_products['product_img1'];                            
                            
                            $pro_price = $row_products['product_price'];
                            
                            
                            echo "
                            
                                <div class='col-md-3 col-sm-6 center-responsive'>
                                
                                    <div class='product same-height'>
                                    
                                        <a href='details.php?pro_id=$pro_id'>
                                        
                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                        
                                        </a>
                                        
                                        <div class='text'>
                                        
                                            <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                                    
                                            <p class='price'>  ₱ $pro_price </p>
                                            <p class='button'>
                           
                                                        <a href='details.php' class='btn btn-default'>View Details</a>

                                                            <a href='details.php' class='btn btn-primary'>

                                                                <i class='fa fa-shopping-cart'>
                                                                Add To Cart
                                                                </i>

                                                            </a>
                           
                                                    </p>
                                                    
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div>
                            
                            ";

                            
                        }
                    
                    ?>
                    
                </div>    <!--same-height-row end-->
                
            </div>  <!--col-md-9 end-->  
            
        </div>    <!--container end-->
    </div>    <!--content end-->
   
  
<!-------------------------------php--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    
    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>







