<?php 
    $active='Cart';
    include("includes/header.php");

?>
     <?php 

                if(!isset($_SESSION['customer_email'])){
                    $delivery_fee = number_format((float)0, 2, '.', ''); 
                
            }
            else {
                 $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
            
                
                if($row_customer == NULL){
                    $delivery_fee = number_format((float)0, 2, '.', ''); 
                
                }
                else{

                $province = $row_customer['customer_country'];
                
                
                
                $select_province = "select * from delivery_fee where province_name='$province'";
                        
                $run_province = mysqli_query($con,$select_province);
                        
                $row_province = mysqli_fetch_array($run_province);
        
                $delivery_fee = $row_province['delivery_fee'];
                }
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
                        Cart
                    </li>
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div id="cart" class="col-md-9">    <!--col-md-9 start-->
                
                <div class="box">    <!--box start-->
                    
                    <form action="cart.php" method="post" enctype="multipart/form-data">    <!--form start-->
                        
                        <h1>Shopping Cart</h1>   
                        
                        <?php  
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($con,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                        
                        ?>
                                                          
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        
                        <div class="table-responsive">    <!--table-responsive start-->
                            
                            <table class="table">    <!--table start-->
                                
                                <thead>    <!--thead start-->
                                    
                                    <tr>    <!--tr start-->
                                        
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                        
                                    </tr>    <!--tr end-->
                                    
                                </thead>    <!--thead end-->
                                
                                <tbody>    <!--tbody start-->
                                   
                                   <?php 
                                    
                                    $total = 0;
                                    
                                    while($row_cart = mysqli_fetch_array($run_cart)){
                                        
                                        
                                        $pro_id = $row_cart['p_id'];
                                        
                                        $pro_qty = $row_cart['qty'];
                                        
                                        
                                        $inventory = "select * from inventory where product_id='$pro_id'";
        
                                        $run_inventory = mysqli_query($con,$inventory);
        
                                        $row_inventory = mysqli_fetch_array($run_inventory);

                                        $stock = $row_inventory['qty_stock'];
                                        
                                        
                                        
                                        
                                        $get_products = "select * from products where product_id='$pro_id'";
                                        
                                        $run_products = mysqli_query($con,$get_products);
                                        
                                        
                                        
                                        
                                        while($row_products = mysqli_fetch_array($run_products)){
                                            
                                            $product_title = $row_products['product_title'];
                                            
                                            $product_img1 = $row_products['product_img1'];
                                            
                                            $only_price = $row_products['product_price'];
                                            
                                            $sub_total = $row_products['product_price']*$pro_qty;
                                            
                                            
                                            $total += $sub_total;
                                            
                                            
                                            
                                            
                                        
                                        
                                    ?>
                                    
                                    <tr>    <!--tr start-->
                                      
                                        
                                        <td>
                                            
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1">
                                            
                                        </td>
                                        
                                        <td>
                                            
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                            
                                        </td>
                                        
                                        <td>
                                            
                                            <input name="qty" type="number" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $stock ?>" style="width: 4em">
                                            
                                        </td>
                                           
                                        <td>
                                            
                                            <?php echo $stock ?>
                                            
                                        </td>
                                        
                                        <td>
                                            
                                            <?php echo $only_price; ?>
                                            
                                        </td>
                                        
                                        <td>
                                            
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                            
                                        </td>
                                        
                                          <td>
                                          ₱ <?php echo number_format((float)$sub_total, 2, '.', ''); ?>
                                           
                                          
                                             
                                        </td>
                                        
                                    </tr>    <!--tr end-->
                                    
                                    <?php } }?>
                                    
                                </tbody> <!--tbody end-->
                                
                                <tfoot>    <!--tfoot start-->
                                    <?php $total = $total + $delivery_fee;?>
                                      <?php 
        
                                            $ip_add = getRealIpUser();

                                            $select_cart = "select * from cart where ip_add='$ip_add'";
        
                                            $run_cart = mysqli_query($con,$select_cart);
        
                                            $check_cart = mysqli_num_rows($run_cart);

                                           if($check_cart == 0){
            
                                               
                                           }
                                        else {

                                            ?>
                                       <tr>
                                        
                                        
                                        
                                        <th colspan="6">Shipping fee</th>
                                        <th colspan="2">₱ <?php echo $delivery_fee?></th>
                                        </tr>
                                        <tr>
                                        
                                        <th colspan="6">Total</th>
                                        <th colspan="2">₱ <?php echo number_format((float)$total, 2, '.', ''); ?></th>
                                        
                                        </tr>
                                        <?php 
                                           
                                        }
                                           
                                           ?>
                                    
                                       
                                    
                                </tfoot>    <!--tfoot end-->
                                
                            </table>    <!--table end-->
                            
                        </div>    <!--table-responsive end-->
                        
                        <div class="box-footer">    <!--box-footer start-->
                            
                            <div class="pull-left">    <!--pull-left start-->
                                
                                <a href="index.php" class="btn btn-default">    <!--btn btn-default start-->
                                    
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                    
                                </a>    <!--btn btn-default end-->
                                
                            </div>    <!--pull-left end-->
                            
                            <div class="pull-right">    <!--pull-right start-->
                                
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">    <!--btn btn-default start-->
                                    
                                    <i class="fa fa-refresh"></i> Update Cart
                                    
                                </button>    <!--btn btn-default end-->
                                <button type="submit" name="check-out" value="Checkout" class="btn btn-primary">    <!--btn btn-default start-->
                                    
                                    <i class="fa fa-chevron-right"></i> Proceed to Checkout
                                    
                                </button>    <!--btn btn-default end-->
                                
                            </div>    <!--pull-right end-->
                            
                        </div>    <!--box-footer end-->
                        
                    </form>    <!--form end-->
                    
                </div>    <!--box end-->
                
                <?php 
                    function update_cart(){
                    
                    global $con;
                        
                    if(isset($_POST['update'])){
                        
                        
                        $qty = $_POST['qty']; 
                        
                        $update_qty = "update cart set qty='$qty'";
    
                        $run_product = mysqli_query($con,$update_qty);
                        echo "<script>window.open('cart.php','_self')</script>";
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                    }
                    }
                    
                
                echo @$up_cart = update_cart();
                
                ?>
                <?php 
                   
                        
                    if(isset($_POST['check-out'])){
                        
                        
                        $qty = $_POST['qty']; 
                        
                        $update_qty = "update cart set qty='$qty'";
    
                        $run_product = mysqli_query($con,$update_qty);
                        echo "<script>window.open('checkout.php','_self')</script>";
                        
                    }
                ?>
                
                <div id="same-height-row">    <!--same-height-row start-->
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
                        
                        $pro_price = $row_products['product_price'];
                        
                        $pro_img1 = $row_products['product_img1'];
                        
                        echo "
                        
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>  <!--col-md-3 col-sm-6 center-responsive start-->  
                        <div class='product same-height'>    <!--product same-height start-->
                            <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Product 1'>
                            </a>
                            
                            <div class='text'>    <!--text start-->
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                
                                <p class='price'>₱ $pro_price</p>
                                
                            </div>    <!--text end-->
                            
                        </div>    <!--product same-height end-->
                    </div>    <!--col-md-3 col-sm-6 center-responsive end-->  
                       
                        ";
                        
                    }
                    
                    ?>
                    
                </div>    <!--same-height-row end-->
                
            </div>    <!--col-md-9 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
                
                <div id="order-summary" class="box">    <!--box start-->
                    
                    <div class="box-header">    <!--box-header start-->
                        
                        <h3>Order Summary</h3>
                        
                    </div>    <!--box-header end-->
                    
                    <p class="text-muted">    <!--text-muted start-->
                        
                        Shipping and additional costs are calculated based on value you have entered.
                        
                    </p>    <!--text-muted end-->
                    
                    <div class="table-responsive">    <!--table-responsive start-->
                        
                        <table class="table">    <!--table start-->
                            
                            <tbody>    <!--tbody start-->
                                
                                <tr>    <!--tr start-->
                                    
                                    <td> Order Sub-Total</td>
                                    
                                    
                                    <th style="font-size:13px">
                                   
                                      <?php 
        
                                            $ip_add = getRealIpUser();

                                            $select_cart = "select * from cart where ip_add='$ip_add'";
        
                                            $run_cart = mysqli_query($con,$select_cart);
        
                                            $check_cart = mysqli_num_rows($run_cart);

                                           if($check_cart == 0){
            
                                               $total = 0;
                                           }
                                        else {

                                            ?>
                                    <?php 
                                        $price = 0;
                                            $price = $total - $delivery_fee;
                                        
                                        
                                        ?>
                                    ₱<?php echo number_format((float)$price, 2, '.', ''); ?>
                                    
                                    <?php }?>
                                    
                                    </th>
                                    
                                </tr>    <!--tr end-->
                                
                                <tr>    <!--tr start-->
                                    
                                    <td> Shipping and Handling </td>
                                    <th style="font-size:13px">₱<?php echo $delivery_fee ?></th>
                                    
                                </tr>    <!--tr end-->
                                
                                <tr>    <!--tr start-->
                                    
                                    <td> Tax </td>
                                    <td> P0.00 </td>
                                    
                                </tr>    <!--tr end-->
                                
                                <tr class="total">    <!--tr start-->
                                    
                                   
                                    <td> Total &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;₱    </td>
                                    <td> <?php echo number_format((float)$total, 2, '.', ''); ?>
                                    
                                    
                                    
                                    
                                    </td>
                                    
                                </tr>    <!--tr end-->
                                
                            </tbody>    <!--tbody end-->
                            
                        </table>    <!--table end-->
                        
                    </div>    <!--table-responsive end-->
                    
                </div>    <!--box end-->
                
            </div>    <!--col-md-3 end-->
            
        </div>    <!--container end-->
    </div>    <!--content end-->
   
  
  
  
  
  
  
  
  
  
  
  
  
  
<!-------------------------------footer--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

            
           
          
         
        
       