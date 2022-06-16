<div class="panel panel-default sidebar-menu">    <!--panel panel-default sidebar-menu start-->
    
    <div class="panel-heading"> <!--panel-heading start-->
       
       <?php 
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email = '$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_image'];
        
        if($customer_image == NULL){
            $customer_image = "defaultimg.png";
        }
        
        $customer_name = $row_customer['customer_name'];
        
        if(!isset($_SESSION['customer_email'])){
            
        }
        else{
            
            ?>
            
                <center>
                
                    <img src="customer_images/<?php echo $customer_image?>" class="img-responsive">
                
                </center>
                
                <br>
                
                <h3 class="panel-title" align="center">
                
                    Name: <?php echo $customer_name ?>
                
                </h3>
            
         
            <?php 
        }
        
        ?>
        
    </div>    <!--panel-heading end-->
    
    <div class="panel-body"> <!--panel-body start-->
        
        <ul class="nav-pills nav-stacked nav">    <!--nav-pills nav-stacked nav start-->  
            
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> My Ongoing-Orders                    
                </a>
                
            </li>  
            <li class="<?php if(isset($_GET['completed_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?completed_orders">
                    
                    <i class="fa fa-list"></i> Completed Orders                    
                </a>
                
            </li>  
            <li class="<?php if(isset($_GET['order_inreview'])){ echo "active"; } ?>">
                
                <a href="my_account.php?order_inreview">
                    
                    <i class="fa fa-list"></i> Orders Inreview  
                </a>
                
            </li>  
            
            <li class="<?php if(isset($_GET['return_refund'])){ echo "active"; } ?>">
                
                <a href="my_account.php?return_refund">
                    
                    <i class="fa fa-bolt"></i> Return / Refund               
                </a>
                
            </li>  
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Edit Account                    
                </a>
                
            </li>  
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Change Password                   
                </a>
                
            </li>  
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-pencil"></i> Delete Account                    
                </a>
                
            </li>  
            
            <li>
                
                <a href="logout.php">
                    
                    <i class="fa fa-sign-out"></i> Log Out                 
                </a>
                
            </li>
            
        </ul>    <!--nav-pills nav-stacked nav end-->
        
    </div>    <!--panel-body end-->
    
</div>    <!--panel panel-default sidebar-menu end-->