<?php 
    


    if(isset($_GET['gcash'])){
    
        $customer_id = $_GET['gcash'];
    

    }


?>
<?php  
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($con,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                        
                        ?>


 <?php 
    
        
    $select_customer = "select * from customers where customer_id='$customer_id'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
      
   
    
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
                                            
                                            
                                        }
                                    }
                                        $total = $total + $delivery_fee;
                                        
                                    ?>


<h1 align="center"> <img src="../images/gcash.png" alt="" width="160" height="40"> </h1>



    
    <div class="form-group">    <!--form-group start-->
        
        <center><p style="font-size: 25px">This is the qr for our gcash account scan it and kindly pay ₱<?php echo $total; ?> <br>we will review your payment asap then process your order after that. <br>save the screenshot of payment to submit in the next form</p></center>
        
        <center><img src="../images/gcash_qr.png" alt="" width="300" height="400"></center>
        
    </div>    <!--form-group end-->
    
   
    
    <div class="text-center"> <!--text-center start-->
        <a href="my_account.php?gcash_submit=<?php echo $customer_id ?>">
        
        <button class="btn btn-primary form-control">
        
            
            <i class="fa fa-user-md"></i> Click here to continue..
        
        </button>
        </a>
    </div>    <!--text-center end-->
    

 



































