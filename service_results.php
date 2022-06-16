<?php 

        if(isset($_GET['user_query'])){
            
        $search = $_GET['user_query'];
        
        
          
            
        }
            ?>
            
      <?php 
    
    $active='Services';
    include("includes/header.php");

?>
    
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Services
                    </li>
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
    
           <?php 
    
    include("includes/sidebar_services.php");
    
    ?>  
            </div>    <!--col-md-3 end-->
            
            <div class="col-md-9">    <!--col-md-9 start-->
            <form method="get" action="service_results.php" class="navbar-form">    <!--navbar-form start-->
                        
                        <div class="input-group">    <!--input-group start-->
                            
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            
                            <span class="input-group-btn">    <!--input-group-btn start-->
                            
                            <button type="submit" name="search" value="Search" class="btn btn-primary">    <!--btn btn-primary start-->
                                
                                <i class="fa fa-search"></i>
                                
                            </button>    <!--btn btn-primary start-->
                            
                            </span>    <!--input-group-btn end-->
                            
                        </div>    <!--input-group end-->
                        
                    </form>    <!--navbar-form end-->
             
                 <div class='box'>    <!--box start-->
                      <h1>Services</h1>
                            <p>
                                    Mjj Aluminum and Glass Works ensure you that everything that we sell and created are in their top most quality
                            </p>

                            </div>    <!--box end-->

                          
                
                <div class="row">    <!--row start-->
                  
                  <?php

                       

                       
                            
                            $per_page=6;
                            
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                    
                                    $page=1;
                                    
                                }
                            
                                $start_from = ($page-1) * $per_page;
                                
                                $get_services = "select * from services WHERE service_name LIKE '%$search%' order by 1 DESC LIMIT $start_from,$per_page";
                                
                                $run_services = mysqli_query($con,$get_services);
                                
                                while($row_services=mysqli_fetch_array($run_services)){
                                    
                                    $service_id = $row_services['service_id'];

                                    $service_name = $row_services['service_name'];

                                    $service_price_min = $row_services['service_price_min'];

                                    $service_price_max = $row_services['service_price_max'];
                                    
                                    $service_img1 = $row_services['service_img1'];
                                    
                                    
                                    
                                    echo"
                                    
                                        <div class='col-md-4 col-sm-6 center-responsive' width='200' height='200'>
                                        
                                            <div class='product'>
                                            
                                                <a href='service_details.php?service_id=$service_id'>
                                                
                                                    <img width='250' height='200' class='img-responsive' src='admin_area/service_images/$service_img1'>
                                                    
                                                    
                                                
                                                </a>
                                                
                                                <div class='text'>
                                                
                                                    <h3>
                                                    
                                                        <a href='service_details.php?service_id=$service_id'> $service_name </a>
                                                    
                                                    </h3>
                                                    <center> price range </center>
                                                    
                                                    <p class='pricerange'><center>
                                                    
                                                        ₱ $service_price_min - ₱ $service_price_max
                                                    
                                                    </center></p>
                                                    
                                                    
                                                
                                                </div>
                                            
                                            </div>
                                            
                                        
                                        </div>
                                    
                                    ";
                                
                            }
                            
                 ?>
                    
                </div>    <!--row end-->
                
                <center>
                    <ul class="pagination"><!-- pagination Begin -->
					 <?php
                             
                    $query = "select * from services";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='services.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='services.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='services.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
					 
					 ?> 
                       
                   </ul><!-- pagination Finish -->
                </center>
                
            </div>    <!--col-md-9 end-->
            
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







