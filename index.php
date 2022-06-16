<?php 

    $active='Home';
    include("includes/header.php");

?>
          

        
      
    <div class="container" id="slider">    <!--container start-->
        
        <div class="col-md-12">    <!--col-md-12 start-->
            
            <div class="carousel slide" id="myCarousel" data-ride="carousel">    <!--carousel slide start-->
                
                <ol class="carousel-indicators">    <!--carousel-indicators start-->
                    
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    
                </ol>    <!--carousel-indicators end-->
                
                <div class="carousel-inner">    <!--carousel-inner start-->
                
                    <?php  
                    
                    $get_slides = "select * from slider LIMIT 0,1";
                    
                    $run_slides = mysqli_query($con,$get_slides);
                    
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        
                        echo "
                        
                        <div class='item active'>
                        
                        <img src='admin_area/slides_images/$slide_image'>
                        
                        </div>
                        
                        "; 

                        
                    }  
                    
                    $get_slides = "select * from slider LIMIT 1,3";
                    
                    $run_slides = mysqli_query($con,$get_slides);
                    
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        
                        echo "
                        
                        <div class='item'>
                        
                        <img src='admin_area/slides_images/$slide_image'>
                        
                        </div>
                        
                        "; 

                        
                    }
                    
                    ?>
       
                </div>    <!--carousel-inner end-->
                
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">    <!--left carousel-control start-->
                    
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    
                </a>    <!--left carousel-control end-->
                
                 <a href="#myCarousel" class="right carousel-control" data-slide="next">    <!--left carousel-control start-->
                    
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    
                </a>    <!--left carousel-control end-->
                
            </div>    <!--carousel slide end-->
            
        </div>    <!--col-md-12 end-->
        
    </div>    <!--container end-->
    
    <div id="advantages">    <!--advamtages start-->
        
        <div class="container">    <!--container start-->
                  
            <div class="same-height-row">    <!--same-height-row start-->
                
                <div class="col-sm-4">    <!--col-sm-4 start-->
                    
                    <div class="box same-height"> <!--same-height start-->
                        
                        <div class="icon">    <!--icon start-->
                            
                            <i class="fa fa-heart"></i>
                            
                        </div>    <!--icon end-->
                        
                        <h3><a href="#">Best Offer</a></h3>
                        <p>We have a strong passion for learning and improvement that extends in our highly skilled workforce, giving us a competitive edge to constantly expand our products and develop our services</p>
                        
                    </div>    <!--same-height end-->
                    
                </div>    <!--col-sm-4 end-->
                
                <div class="col-sm-4">    <!--col-sm-4 start-->
                    
                    <div class="box same-height"> <!--same-height start-->
                        
                        <div class="icon">    <!--icon start-->
                            
                            <i class="fa fa-tag"></i>
                            
                        </div>    <!--icon end-->
                        
                        <h3><a href="#">Best Prices</a></h3>
                        <p>We continually assess and look for the best value for money by sourcing superior quality materials at the best price, helping ensure our service and delivery is efficient, effective and economical.</p>
                        
                    </div>    <!--same-height end-->
                    
                </div>    <!--col-sm-4 end-->
                
                <div class="col-sm-4">    <!--col-sm-4 start-->
                    
                    <div class="box same-height"> <!--same-height start-->
                        
                        <div class="icon">    <!--icon start-->
                            
                            <i class="fa fa-thumbs-up"></i>
                            
                        </div>    <!--icon end-->
                        
                        <h3><a href="#">100% Original Products</a></h3>
                        <p>We believe that innovation is the key to our long-term success. We continually seek new products that meet the highest standards in the market, and create more effective process on existing services.</p>
                        
                    </div>    <!--same-height end-->
                    
                </div>    <!--col-sm-4 end-->
                
            </div>    <!--same-height-row end-->
            
        </div>    <!--container end-->
        
    </div>    <!--advamtages end-->
    
    <div id="hot">    <!--hot start-->
        
        <div class="box">    <!--box start-->
            
            <div class="container">    <!--container start-->
                
                <div class="col-md-12">    <!--col-md-12 start-->
                    
                    <h2>
                        Our Latest Product
                    </h2>
                    
                </div>    <!--col-md-12 end-->
                
            </div>    <!--container end-->
            
        </div>    <!--box end-->
        
    </div>    <!--hot end-->
    
    <div id="content" class="container">    <!--container start-->
        
        <div class="row">    <!--row start-->
           
           <?php 
            
            getPro();
            
            ?>
            
        </div>    <!--row end-->
        
    </div>    <!--container end-->
     
<!-------------------------------php--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    
    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>