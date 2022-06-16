<div id="footer">    <!--footer start-->
    <div class="container">    <!--container start-->
        <div class="row">    <!--row start-->
            <div class="col-sm-6 col-md-3">    <!--col-sm-6 col-md-3 start-->
                
                <h4>Pages</h4>
                
                <ul>    <!--ul start-->                      
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>                    
                </ul>    <!--ul end-->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul>    <!--ul start--> 
                    
                    <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                
                                
                                echo"<a href='checkout.php'>Login</a>";
                                
                            }
                            else{
                                
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                                
                            }
                            
                            ?>
                    
                    <li>
                    
                         
                        <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                
                                
                                echo"<a href='../checkout.php'>Register</a>";
                                
                            }
                            else{
                                
                                echo"<a href='my_account.php?edit_account'>Edit Account</a>";
                                
                            }
                            
                            ?>
                    
                    </li>
                </ul>    <!--ul end-->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>    <!--col-sm-6 col-md-3 end-->
            
            <div class="com-sm-6 col-md-3">    <!--com-sm-6 col-md-3 start-->
                
                <h4>Top Products Categories</h4>
                
                <ul>    <!--ul start-->
                
                    <?php
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id =$row_p_cats['p_cat_id'];
                            
                            $p_cat_title =$row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                
                </ul>    <!--ul end-->
                
                <hr class="hidden-md hidden-lg">
                
            </div>    <!--com-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3">    <!--col-sm-6 col-md-3 start-->
                
                <h4>Find Us:</h4>
                
                <p>    <!--p start-->
                    
                    <strong>Mjj Aluminum and Glass Works</strong>
                    <br>
                    <br/>CALIFORNIA VILLAGE, 73 Katipunan
                    <br/>Ave, Novaliches, Quezon City
                    <br/>09399209230
                    <br/>mjjaluminumandglassworks@gmail.com
                    <br/><strong>Buizon Capstone&#8482;</strong>
                    
                </p>    <!--p end-->
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>    <!--col-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3">
  
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="https://www.facebook.com/MjjGlassAndAluminum" target="_blank" class="fa fa-facebook"></a>
                </p>
                
            </div>
            <div class="col-sm-6 col-md-3">
  
                
                <h4>Are you an Admin? <a href="admin_area/index.php?dashboard">Click here.</a></h4>
                
            </div>
            <br>
            <div class="col-sm-6 col-md-3">
  
                
                <h4>Are you a Delivery Rider? <a href="delivery_riders/index.php?dashboard">Click here.</a></h4>
                
            </div>
            
        </div>    <!--row start end-->
    </div>    <!--container end-->
</div>    <!--footer end-->


<div id="copyright">    <!--copyright start-->
    <div class="container">    <!--container start-->
        <div class="col-md-6">    <!--col-md-6 start-->
            
            <p class="pull-left">&copy; 2021 Mjj Online Store All Rights Reserved.</p>
            
        </div>    <!--col-md-6 end-->
       
        <div class="col-md-6">    <!--col-md-6 start-->
           
            <p class="pull-right">Tutorial by: <a href="#">MrGhie of M-Dev Media</a></p>
            
            
        </div>    <!--col-md-6 end-->
    </div>    <!--container start-->
</div>    <!--copyright end-->



































