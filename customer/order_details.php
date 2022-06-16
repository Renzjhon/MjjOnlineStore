<?php 

        if(isset($_GET['order_details'])){
            
            $invoice = $_GET['order_details'];
            $get_order = "select * from order_summary where invoice_no='$invoice'";
            
            $run_order = mysqli_query($con,$get_order);
            
            $row_edit = mysqli_fetch_array($run_order);
            
            $customer_id = $row_edit['customer_id'];
            
            $get_customer = "select * from customers where customer_id='$customer_id'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $name = $row_customer['customer_name'];
            $email = $row_customer['customer_email'];
            $street = $row_customer['customer_address'];
            $city = $row_customer['customer_city'];
            $province = $row_customer['customer_country'];
            $contact = $row_customer['customer_contact'];
            
            $get_summary = "select * from order_summary where invoice_no='$invoice'";
                            
                                $run_summary = mysqli_query($con,$get_summary);
        
                                $row_summary=mysqli_fetch_array($run_summary);
                                    
                                $total_amount = $row_summary['total_price'];
            
            
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

               <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Order Details
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="panel-body">    <!--panel-body start-->
               
               <h3><center>Invoice Number: <strong><?php echo $invoice;?></strong></center></h3>
               <h3><center>Customer name: <strong><?php echo $name;?></strong></center></h3>
               <h3><center>Customer email: <strong><?php echo $email;?></strong></center></h3>
               <h3><center>Customer address: <strong><?php echo $street;?> <?php echo $city;?> <?php echo $province;?></strong></center></h3>
               <h3><center>Customer Contact Number: <strong><?php echo $contact;?></strong></center></h3>
               <h3><center>Shipping Fee:<strong> ₱<?php echo $delivery_fee ?></strong></center></h3>
               <h3><center>Total Amount: <strong> ₱<?php echo $total_amount;?></strong></center></h3>
               <br><br>
                -------------------------------------------------------------------------------------------------------------------------------------------------------
                <br>
                <?php 
                            
                                $i=0;
        
                                $get_p_cats = "select * from pending_orders where invoice_no='$invoice'";
                            
                                $run_p_cats = mysqli_query($con,$get_p_cats);
        
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $p_id = $row_p_cats['product_id'];
                                    
                                    $qty = $row_p_cats['qty'];
                                    
                                    $o_id = $row_p_cats['order_id'];
                                    
                                    $get_product = "select * from products where product_id='$p_id'";
            
                                    $run_product = mysqli_query($con,$get_product);
            
                                    $row_product = mysqli_fetch_array($run_product);
            
                                    $p_name = $row_product['product_title'];
                                    $p_img = $row_product['product_img1'];
                                    $raw_price = $row_product['product_price'];
                                    
                                    $price = $raw_price * $qty;
                                    $get_order = "select * from customer_orders where order_id='$o_id'";
            
                                    $run_order = mysqli_query($con,$get_order);
            
                                    $row_edit = mysqli_fetch_array($run_order);
            
                                    
                                    
                                    $i++;
                            ?>
                <h5><center>Item number <strong><?php echo $i;?></strong></center></h5>
                <h4><center>Product name: <strong><?php echo $p_name;?></strong></center></h4>
                <h4><center>Product Quantity: <strong><?php echo $qty;?></strong></center></h4>
                <h4><center> Price: <strong> ₱ <?php echo number_format((float)$price, 2, '.', ''); ?></strong></center></h4>
               <center><img src="../admin_area/product_images/<?php echo $p_img; ?>" width="70" height="70"></center>
                <br><br><br>
                <?php   }?>
                <br>
                <center><button type="button"><a href="javascript:history.back()">Go back</a></button></center>
                
            </div>    <!--panel-body end-->
            </div>    <!--panel-body end-->
            