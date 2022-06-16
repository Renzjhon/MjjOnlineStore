<!--    This is for cash on delivery-->
   

   <?php 
    
    $active='Account';
    include("includes/header.php");

?>    
   <?php 


if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    
}


?>
   <?php 
                 $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
        
                $province = $row_customer['customer_country'];
                
                $select_province = "select * from delivery_fee where province_name='$province'";
                        
                $run_province = mysqli_query($con,$select_province);
                        
                $row_province = mysqli_fetch_array($run_province);
        
                $delivery_fee = $row_province['delivery_fee'];
                                            
                                        
                                        ?>
   
   <?php  
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($con,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
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
                                            
                                            
                                        }}
                                            $total = $total + $delivery_fee;
                                            
                                            $total = number_format((float)$total, 2, '.', ''); 
                                            
                        ?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <div id="content">    <!--content start-->
        <div class="container">    <!--container start-->
            <div class="col-md-12">    <!--col-md-12 start-->
                
                <ul class="breadcrumb">    <!--breadcrumb start-->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                       Payment Options
                    </li>
                    <li>
                       Cash On Delivery
                    </li>
                </ul>     <!--breadcrumb end-->
                
            </div>    <!--col-md-12 end-->
            
            <div class="col-md-3">    <!--col-md-3 start-->
            
           
    
 <?php 
    
    include("includes/sidebar.php");
    
    ?>          
            
            </div>    <!--col-md-3 end-->
            
            
            
            
            
            
    <table border="0" cellpadding="0" cellspacing="0" width="800px">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" >
                            <h1 style="font-size: 30px; font-weight: 400; margin: 2;">Thank you!</h1> 
                            <h3>Verify your Order</h3><img src="admin_area/icons/itemreduced.png" width="125" height="90" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                           <p style="margin: 0;"><center><strong>You are about to order using Cash On Delivery</strong></center></p>
                            <p style="margin: 0;"><center><strong>The total price is ₱<?php echo $total?></strong></center></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="order.php?c_id=<?php echo $customer_id ?>" target="_self" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Confirm Order</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    
                </table>
            </td>
        </tr>
        
        
    </table>
  
<!-------------------------------php--------------------------->
   
    <?php 
    
    include("includes/footer.php");
    
    ?> 
    
    
    
    
    
    
    
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>