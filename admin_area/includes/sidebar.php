<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

   

   <nav class="navbar navbar-inverse navbar-fixed-top">    <!--navbar navbar-inverse navbar-fixed-top start-->
    <div class="navbar-header">    <!--navbar-header start-->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">    <!--navbar-toggle start-->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>    <!--navbar-toggle end-->
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
    </div>    <!--navbar-header end-->
    
    <ul class="nav navbar-right top-nav">    <!--nav navbar-right top-nav start-->
        
        <li class="dropdown">    <!--dropdown start-->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">    <!--dropdown-toggle start-->
                
                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>
                
            </a>    <!--dropdown-toggle end-->
            
            <ul class="dropdown-menu">    <!--dropdown-menu start-->
                <li>    <!--li start-->
                   
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">    <!--a start-->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
                <li>    <!--li start-->
                   
                    <a href="index.php?view_products">    <!--a start-->
                        
                        <i class="fa fa-fw fa-envelope"></i> Products
                        
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
                <li>    <!--li start-->
                   
                    <a href="index.php?view_customers">    <!--a start-->
                        
                        <i class="fa fa-fw fa-users"></i> Customers
                        
                        <span class="badge"><?php echo $count_customers; ?></span>
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
                <li>    <!--li start-->
                   
                    <a href="index.php?view_cats">    <!--a start-->
                        
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
                
                
                <li class="divider"></li>
                
                <li>    <!--li start-->
                   
                    <a href="logout.php">    <!--a start-->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
            </ul>    <!--dropdown-menu end-->
            
        </li>    <!--dropdown end-->
        
    </ul>    <!--nav navbar-right top-nav end-->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">    <!--collapse navbar-collapse navbar-ex1-collapse start-->
        <ul class="nav navbar-nav side-nav">   <!--nav navbar-nav side-nav start--> 
            <li>    <!--li start-->
                <a href="index.php?dashboard">    <!--a start-->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                    </a>    <!--a end-->
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#p_cat">    <!--a start-->
                        
                        <i class="fa fa-fw fa-edit"></i> Product Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="p_cat" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_p_cat"> Add Product Category </a>
                        </li>    <!--li end-->
                        <li>     <!--li start-->
                            <a href="index.php?view_p_cats"> View Product Categories </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
                    
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#supplier">    <!--a start-->
                        
                        <i class="fa fa-fw fa-book"></i> Supplier
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="supplier" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_supplier"> Add Supplier </a>
                        </li>    <!--li end-->
                        <li>     <!--li start--> 
                            <a href="index.php?view_suppliers"> View Supplier </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#products">    <!--a start-->
                        
                        <i class="fa fa-fw fa-tag"></i> Products
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="products" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_product"> Add Product </a>
                        </li>    <!--li end-->
                        <li>     <!--li start-->
                            <a href="index.php?view_products"> View Product </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
                    
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#services">    <!--a start-->
                        
                        <i class="fa fa-fw fa-wrench"></i> Services
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="services" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_service"> Add Services </a>
                        </li>    <!--li end-->
                        <li>     <!--li start-->
                            <a href="index.php?view_services"> View Services </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
                    
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#materials">    <!--a start-->
                        
                        <i class="fa fa-fw fa-wrench"></i> Services Materials
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="materials" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_materials"> Add Materials </a>
                        </li>    <!--li end-->
                        <li>     <!--li start-->
                            <a href="index.php?view_materials"> View Materials </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
                    
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#slides">    <!--a start-->
                        
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="slides" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_slide"> Add Slide </a>
                        </li>    <!--li end-->
                        <li>     <!--li start--> 
                            <a href="index.php?view_slides"> View Slides </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
               <?php 
                            
                                $i=0;
        
                                $get_inventory = "select * from inventory";
                            
                                $run_inventory = mysqli_query($con,$get_inventory);
        
                                while($row_inventory=mysqli_fetch_array($run_inventory)){
                                    
                                    
                                    $product_qty = $row_inventory['qty_stock'];
                                    
                                    $critical_level = $row_inventory['critical_level'];
                                    
                                    
                                    $low_level = $critical_level * 1.5;
                                    if($product_qty <= $critical_level){
                                    $i++;
                                    }}
                            ?>
                <li>    <!--li start-->
                <a href="index.php?inventory">    <!--a href start-->
                    <i class="fa fa-fw fa-list"></i>    Inventory&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?>
                </a>    <!--a href end-->
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="index.php?view_customers">    <!--a href start-->
                    <i class="fa fa-fw fa-users"></i>    View Customers
                </a>    <!--a href end-->
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#rider">    <!--a start-->
                        
                        <i class="fa fa-fw fa-bicycle"></i> Delivery Rider
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="rider" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_rider"> Add Rider </a>
                        </li>    <!--li end-->
                        <li>     <!--li start--> 
                            <a href="index.php?view_riders"> View Riders </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="index.php?delivery_fee_list">    <!--a href start-->
                    <i class="fa fa-fw fa-money"></i>    Delivery Fee
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <?php
         
            $i =0;
         
            $get_orders = "select * from order_summary";
         
            $run_orders = mysqli_query($con,$get_orders);
         
            while($row_order=mysqli_fetch_array($run_orders)){
                                    
                $order_id = $row_order['order_id'];
                                    
                $c_id = $row_order['customer_id'];
                                    
                $invoice_no = $row_order['invoice_no'];
                                    
                                    
                                    
                $order_status = $row_order['order_status'];
                                    
                $payment_method = $row_order['payment_method'];
                                    
                $payment = $row_order['payment'];
                                    
                $cancel = $row_order['cancel'];
                                    
                $review = $row_order['review'];
                
                
                                    
                if($cancel == "NotCancel" && $review == "Reviewed" && $order_status != "In Transit" && $order_status != "Delivered" ){
                               
                                    
                                            $r_verify = $row_order['Rider_verify'];
                                    
                                            $c_verify = $row_order['Customer_verify'];
                                    if($c_verify == 1 || $r_verify == 1){}
                                    else{
                    
                    
                    
                    $i++;
                                    }
                    
                }
            }
                    ?>
            <li>    <!--li start-->
                <a href="index.php?view_orders">    <!--a href start-->
                    <i class="fa fa-fw fa-users"></i>    Orders to Review before Delivery&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?>
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <?php
         
            $i =0;
         
            $get_orders = "select * from order_summary";
         
            $run_orders = mysqli_query($con,$get_orders);
         
            while($row_order=mysqli_fetch_array($run_orders)){
                                    
                $order_id = $row_order['order_id'];
                                    
                $c_id = $row_order['customer_id'];
                                    
                $invoice_no = $row_order['invoice_no'];
                                    
                                    
                                    
                $order_status = $row_order['order_status'];
                                    
                $payment_method = $row_order['payment_method'];
                                    
                $payment = $row_order['payment'];
                                    
                $cancel = $row_order['cancel'];
                                    
                $review = $row_order['review'];
                $rider_id = $row_order['rider_id'];
                
                
                                    
                if($cancel == "NotCancel" && $review == "Reviewed" && $order_status == "In Transit" && $order_status != "Delivered"){
                               
                                    
                                            $r_verify = $row_order['Rider_verify'];
                                    
                                            $c_verify = $row_order['Customer_verify'];
                                    if($c_verify == 1 || $r_verify == 1){}
                                    else{
                    
                    
                    
                    $i++;
                                    }
                    
                }
            }
                    ?>
            <li>    <!--li start-->
                <a href="index.php?ondelivery_orders">    <!--a href start-->
                    <i class="fa fa-fw fa-users"></i>    Orders on Delivery&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?>
                </a>    <!--a href end-->
            </li>    <!--li end-->
           <?php 
                                
                                $i=0;
         
                                $get_orders = "select * from order_summary";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    
                                    $ss_proof = $row_order['ss_proof'];
                                    
                                    
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $payment = $row_order['payment'];
                                    
                                    $cancel = $row_order['cancel'];
                                    
                                    $review = $row_order['review'];
                                    
                                        if($cancel == "NotCancel" && $review == "Unreviewed"){
                                    
                                    
                                            $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                            $run_customer = mysqli_query($con,$get_customer);
                                    
                                            $row_customer = mysqli_fetch_array($run_customer);
                                    
                                            
                                            $customer_name = $row_customer['customer_name'];
                                            
                                            $customer_email = $row_customer['customer_email'];
                                    
                                            $customer_address = $row_customer['customer_address'];
                                    
                                            $order_date = $row_order['order_date'];
                                    
                                            
                                            
                                            if($payment_method == "Gcash"){
                                                
                                                
                                            $i++;
                                            }
                                        }
                                }
                            
                            ?>
             <li>    <!--li start-->
                <a href="index.php?gcash_order">    <!--a href start-->
                    <i class="fa fa-fw fa-check"></i>    Gcash orders to review&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?>
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <?php 
                                
                                $a=0;
         
                                $get_orders = "select * from refund";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $refund_id = $row_order['refund_id'];
                                    
                                    $customer_id = $row_order['customer_id'];
                                    
                                    $customer_name = $row_order['customer_name'];
                                    
                                    $customer_email = $row_order['customer_email'];
                                    
                                    $productservice_name = $row_order['productservice_name'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $issue = $row_order['issue'];
                                    
                                    $issue_img = $row_order['issue_img'];
                                    
                                    $receipt = $row_order['receipt'];
                                    
                                    $status = $row_order['status'];
                                    
                                    
                                    
                                    if($status == "NotSettled"){
                                        
                                    $a++;
                                        
                                    }}
         
                                    $get_orders = "select * from customer_cancelled_orders";
         
                                    $run_orders = mysqli_query($con,$get_orders);
         
                                    while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $cancel_id = $row_order['cancel_id'];
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $invoice = $row_order['invoice_no'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $customer_name = $row_order['customer_name'];
                                    
                                    $customer_email = $row_order['customer_email'];
                                    
                                    $reason = $row_order['reason'];
                                    
                                    $message = $row_order['message'];
                                    
                                    $ss_payment = $row_order['ss_payment'];
                                    
                                    $status = $row_order['status'];
                                    
                                    
                                    
                                    if($payment_method == "Gcash" || $payment_method == "Paypal"){
                                        if($status == "UnSettled"){
                                            $a++;
                                        }
                                    
                                
                            
                          
                                    }
                                }
                                
                            
                            ?>
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#refund">    <!--a start-->
                        
                        <i class="fa fa-fw fa-exclamation"></i>Exchange/Return Item Requests&nbsp;&nbsp;&nbsp;
                    
                    <?php if($a <= 0){} else {?>
                        <i class="fa fa-fw fa-caret-down"></i>
                        <span class="badge"><?php echo $a;?></span>
                    <?php }?> 
                    </a>    <!--a end-->
                    
                    <ul id="refund" class="collapse">    <!--collapse start-->
                       
                       <?php 
                                
                                $i=0;
         
                                $get_orders = "select * from refund";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $refund_id = $row_order['refund_id'];
                                    
                                    $customer_id = $row_order['customer_id'];
                                    
                                    $customer_name = $row_order['customer_name'];
                                    
                                    $customer_email = $row_order['customer_email'];
                                    
                                    $productservice_name = $row_order['productservice_name'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $issue = $row_order['issue'];
                                    
                                    $issue_img = $row_order['issue_img'];
                                    
                                    $receipt = $row_order['receipt'];
                                    
                                    $status = $row_order['status'];
                                    
                                    
                                    
                                    if($status == "NotSettled"){
                                        
                                    $i++;
                                    }
                                }
                                
                            
                            ?>
                        <li>    <!--li start-->
                            <a href="index.php?return_item"> Return Item&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?> </a>
                        </li>    <!--li end-->
                        
                        <?php 
                                
                                $i=0;
         
                                $get_orders = "select * from customer_cancelled_orders";
         
                                $run_orders = mysqli_query($con,$get_orders);
         
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $cancel_id = $row_order['cancel_id'];
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $invoice = $row_order['invoice_no'];
                                    
                                    $payment_method = $row_order['payment_method'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $customer_name = $row_order['customer_name'];
                                    
                                    $customer_email = $row_order['customer_email'];
                                    
                                    $reason = $row_order['reason'];
                                    
                                    $message = $row_order['message'];
                                    
                                    $ss_payment = $row_order['ss_payment'];
                                    
                                    $status = $row_order['status'];
                                    
                                    
                                    
                                    if($payment_method == "Gcash" || $payment_method == "Paypal"){
                                        if($status == "UnSettled"){
                                            $i++;
                                        }
                                    }
                                }
                            
                            ?>
                        <li>     <!--li start--> 
                            <a href="index.php?refund_payment"> Exchange Item Request&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?> </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#cancel">    <!--a start-->
                        
                        <i class="fa fa-fw fa-exclamation"></i> Cancelled Orders
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="cancel" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?gcash_cancelled"> Admin Cancelled Orders </a>
                        </li>    <!--li end-->
                        <li>     <!--li start--> 
                            <a href="index.php?customer_cancelled"> Customer Cancelled Orders </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
            
            <?php 
                            
                                $i=0;
        
                                $get_q = "select * from quotation_sent";
                            
                                $run_q = mysqli_query($con,$get_q);
        
                                while($row_q=mysqli_fetch_array($run_q)){
                                    
                                    $quotation_id = $row_q['quotation_id'];
                                    
                                    $customer_name = $row_q['customer_name'];
                                    
                                    $customer_email = $row_q['customer_email'];
                                    
                                    $customer_number = $row_q['customer_number'];
                                    
                                    $address = $row_q['address'];
                                    
                                    $service_name = $row_q['service_name'];
                                    
                                    $price_range= $row_q['pricerange'];
                                    
                                    $customer_budget = $row_q['customer_budget'];
                                    
                                    $additional_message = $row_q['additional_message'];
                                    
                                    
                                    $status = $row_q['status'];
                                    
                                    if($status == "Not_Settled"){
                                    
                                    
                                    $i++;
                                    }
                                }
                            ?>
            <li>    <!--li start-->
                <a href="index.php?quotation_sent">    <!--a href start-->
                    <i class="fa fa-fw fa-check"></i>    Quotation Sent&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?> 
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="index.php?settled_services">    <!--a href start-->
                    <i class="fa fa-fw fa-wrench"></i>    Settled Services
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <li>    <!--li start-->
                <a href="index.php?return_item_records">    <!--a href start-->
                    <i class="fa fa-fw fa-book"></i>    Return Item Records
                </a>    <!--a href end-->
            </li>    <!--li end-->
            
            
            
            
            
            <li>    <!--li start-->
                <a href="index.php?reports">    <!--a href start-->
                    <i class="fa fa-fw fa-book"></i>   View Reports
                </a>    <!--a href end-->
            </li>    <!--li end-->
            
            
            
            <?php 
            
                if($admin_id == 1 || $admin_id ==2){
                    
                    echo "
                    
                        <li>  
                        <a href='#' data-toggle='collapse' data-target='#users'>  
                        
                            <i class='fa fa-fw fa-users'></i> Users
                            <i class='fa fa-fw fa-caret-down'></i>
                        
                        </a>    
                    
                    
                    
                    <ul id='users' class='collapse'>    
                      
                         <li>   
                             <a href='index.php?insert_user'> Insert User </a>
                         </li>    
                         <li>     
                             <a href='index.php?view_users'> View Users </a>
                         </li>    
                            
                    </ul>    
                </li> 
                    
                    ";
                    
                }   
                else{
                    echo"
                    
                     
                    
                    ";
                }
         
            ?>
            
            <li>    <!--li start-->
                <a href="index.php?backup_and_restore">    <!--a href start-->
                    <i class="fa fa-fw fa-check"></i> Backup and Restore
                     
                </a>    <!--a href end-->
               
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="logout.php">    <!--a href start-->
                    <i class="fa fa-fw fa-power-off"></i>    Logout
                     
                </a>    <!--a href end-->
                <br><br><br> <br><br><br> <br><br><br>
            </li>    <!--li end-->
           
        </ul>    <!--nav navbar-nav side-nav end-->
    </div>    <!--collapse navbar-collapse navbar-ex1-collapse end-->
    
</nav>    <!--navbar navbar-inverse navbar-fixed-top end-->

<?php } ?>




















