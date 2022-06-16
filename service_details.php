<?php 
    
    $active='Services';
    include("includes/header.php");

?>
<?php 


if(isset($_GET['service_id'])){
    
    $service_id = $_GET['service_id'];
    
    $get_service = "select * from services where service_id='$service_id'";
    
    $run_service = mysqli_query($con,$get_service);
    
    $row_service = mysqli_fetch_array($run_service);
    
    $service_name = $row_service['service_name'];
    
    $service_desc = $row_service['service_desc'];
    
    $service_price_min = $row_service['service_price_min'];
    
    $service_price_max = $row_service['service_price_max'];
    

    $service_img1 = $row_service['service_img1'];
    
    $service_img2 = $row_service['service_img2'];
    
    $service_img3 = $row_service['service_img3'];
    
    
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
                        <a href="shop.php">Services</a>
                    </li>
                    <li>
                        <?php echo $service_name; ?>
                    </li>
                    
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->

    
 <?php 
    
    include("includes/sidebar_services.php");
    
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
                                        <center><img class="img-responsive" src="admin_area/service_images/<?php echo $service_img1; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/service_images/<?php echo $service_img2; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/service_images/<?php echo $service_img3; ?>" alt="Product 1"></center>
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
                         
                              <h1 class="text-center"> <?php echo $service_name; ?> </h1>
                              
                              <center><strong>Price Range</strong></center>
                         
                                <center>₱ <?php echo $service_price_min; ?> - ₱ <?php echo $service_price_max; ?></center>
                                 
                       </div><!-- box Finish -->
                            
                          
                        
                        
                        
                        <div class="row" id="thumbs"> <!--row start-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/service_images/<?php echo $service_img1; ?>" alt="Product 1" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/service_images/<?php echo $service_img2; ?>" alt="Product 2" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                            <div class="col-xs-4">    <!--col-xs-4 start-->
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">    <!--thumb start-->
                                    <img src="admin_area/service_images/<?php echo $service_img3; ?>" alt="Product 3" class="img-responsive"> 
                                </a>    <!--thumb end-->
                            </div>    <!--col-xs-4 end-->
                            
                            
                            
                        </div>    <!--row end-->
                        
                    </div>    <!--col-sm-6 end-->
                    <p class='text-center buttons' style="margin-top:340px;"><button class='btn btn-primary i fa fa-envelope' style="width: 250px;height: 50px;" onclick="location.href='free_quotation.php?service_id=<?php echo $service_id; ?>'"> Get Quotation</button></p>
                </div>    <!--row end-->
                
                <div class="box" id="details">    <!--box start-->
                    
                    <h4>Product Details</h4>
                    
                    <p>
                    
                    <?php echo $service_desc; ?>
                    
                    </p>
                    
                        <hr>
                    
                </div>    <!--box end-->
                
                <div id="same-heigh-row">    <!--same-height-row start-->
                    <div class="col-md-3 col-sm-6">    <!--col-md-3 col-sm-6 start-->
                        <div class="box same-height headline">    <!--box same-height headline start-->
                            <h3 class="text-center">Services You May Like</h3>
                        </div>    <!--box same-height headline end-->
                    </div>    <!--col-md-3 col-sm-6 end-->
                    
                    <?php 
                    
                        $get_services = "select * from services order by rand() LIMIT 0,3";
                    
                        $run_services = mysqli_query($con,$get_services);
                    
                        while($row_services=mysqli_fetch_array($run_services)){
                            
                            $service_id = $row_service['service_id'];                            
                            
                            $service_name = $row_service['service_name'];
                            
                            $service_img1 = $row_service['service_img1'];                            
                            
                            $service_price_min = $row_service['service_price_min'];
                            
                            $service_price_max = $row_service['service_price_max'];
                            
                            echo "
                            
                                <div class='col-md-3 col-sm-6 center-responsive'>
                                
                                    <div class='product same-height'>
                                    
                                        <a href='service_details.php?service_id=$service_id'>
                                        
                                            <img class='img-responsive' src='admin_area/service_images/$service_img1'>
                                        
                                        </a>
                                        
                                        <div class='text'>
                                        
                                            <h3> <a href='service_details.php?service_id=$service_id'> $service_name </a> </h3>
                                                    
                                            <p class='price'>  ₱ $service_price_min - ₱$service_price_max </p>
                                                    
                                        
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







