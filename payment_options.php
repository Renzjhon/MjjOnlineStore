
  <div class="box">    <!--box start-->
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
        
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
      
    $customer_brgy = $row_customer['customer_address'];
    
    $customer_city = $row_customer['customer_city'];
    
    $customer_country = $row_customer['customer_country'];
    
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
    <h1 class="text-center">Payment Options For You</h1>
    <br>
    <p class="lead text-center">    <!--lead text-center start-->
        
        <a href="cod_confirm.php?c_id=<?php echo $customer_id ?>"> <img width="150" height="70" src="images/cod.png"> </a>
        
    </p>    <!--lead text-center end-->
    
            

    <p class="lead text-center">    <!--lead text-center start-->
        
       or
        
    </p>    <!--lead text-center end-->
    
    <p class="lead text-center">    <!--lead text-center start-->
       
        <a href="customer/my_account.php?gcash=<?php echo $customer_id ?>"><img width="150" height="50" src="images/gcash.png"></a>

       
        
    </p>    <!--lead text-center end-->
    <p class="lead text-center">    <!--lead text-center start-->
        
        or
        
    </p>    <!--lead text-center end-->
    
    
    <center>
    <div id="paypal-payment-button" style="width:100px; margin-right:100px;">
   
    
  </div></center>
    
</div>    <!--box start-->






 <?php  
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($con,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                        
                        ?>
 <?php 
                                    
                                    $total = 0;
                                    
                                    while($row_cart = mysqli_fetch_array($run_cart)){
                                        
                                        
                                        $pro_id = $row_cart['p_id'];
                                        
                                        $pro_qty = $row_cart['qty'];
                                        
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
                                    ?>














<script src="https://www.paypal.com/sdk/js?client-id=AYQmIoWudT60gd92hICkhKzX0Y2lPtsfKQ3hZD-b1B-SyItFRlrpGD9mrI6b1w8DqN2HCTxPbFMrT8KK&disable-funding=credit,card&currency=PHP"></script>
 <script>paypal.Buttons({
    
    style:{
        color:'blue',
        shape:'pill'
    },
    createOrder:function(data,actions){
        return actions.order.create({
            purchase_units: [{
                amount:{
                    currency: "PHP",
                    value:'<?php echo $total;?>'
                }
            }],
            application_context: {
              shipping_preference: 'NO_SHIPPING'
            }
        });
    },
    onApprove:function(data,actions){
        return actions.order.capture().then(function (details){
            console.log(details)
            window.location.href = "paypal_invoice.php?c_id=<?php echo $customer_id ?>";
           
    })
    }
    
}).render('#paypal-payment-button');</script>