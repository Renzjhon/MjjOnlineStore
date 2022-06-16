<?php 

    if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

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
        
        <a href="index.php?dashboard" class="navbar-brand">Delivery Rider Area</a>
        
    </div>    <!--navbar-header end-->
    
    <ul class="nav navbar-right top-nav">    <!--nav navbar-right top-nav start-->
        
        <li class="dropdown">    <!--dropdown start-->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">    <!--dropdown-toggle start-->
                
                <i class="fa fa-user"></i> <?php echo $rider_name; ?> <b class="caret"></b>
                
            </a>    <!--dropdown-toggle end-->
            
            <ul class="dropdown-menu">    <!--dropdown-menu start-->
                <li>    <!--li start-->
                   
                    <a href="index.php?user_profile=<?php echo $rider_id; ?>">    <!--a start-->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
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
                   
                    <a href="index.php?edit_rider=<?php echo $rider_id; ?>">    <!--a start-->
                        
                        <i class="fa fa-fw fa-user"></i> Edit Profile
                        
                    </a>    <!--a end-->
                
                </li>    <!--li end-->
             <?php 
                            
                                $i=0;
        
                                $get_q = "select * from order_summary";
                            
                                $run_q = mysqli_query($con,$get_q);
        
                                while($row_q=mysqli_fetch_array($run_q)){
                                    
                                    $order_status = $row_q['order_status'];
                                    
                                    $cancel = $row_q['cancel'];
                                    
                                    $review = $row_q['review'];
                                    
                                   if($order_status == 'In Transit' && $cancel == "NotCancel" && $review == "Reviewed"){
                                    $r_id = $row_q['rider_id'];
                                    
                                         
                                            if($r_id == NULL){
                                    
                                    $i++;
                                            }
                                    }
                                }
                            ?>
            <li>    <!--li start-->
                <a href="index.php?ongoing_deliveries">    <!--a href start-->
                    <i class="fa fa-fw fa-check"></i>    Ongoing-Deliveries to accept&nbsp;&nbsp;&nbsp;
                    
                    <?php if($i <= 0){} else {?>
                    <span class="badge"><?php echo $i;?></span>
                    <?php }?> 
                </a>    <!--a href end-->
            </li>    <!--li end-->
               
                <?php 
                            
                                $a=0;
        
                                $get_q = "select * from order_summary";
                            
                                $run_q = mysqli_query($con,$get_q);
        
                                while($row_q=mysqli_fetch_array($run_q)){
                                    
                                    $order_status = $row_q['order_status'];
                                    
                                    $cancel = $row_q['cancel'];
                                    
                                    $review = $row_q['review'];
                                    
                                   if($order_status == 'In Transit' && $cancel == "NotCancel" && $review == "Reviewed"){
                                    $r_id = $row_q['rider_id'];
                                            
                                            
                                            
                                /*--------validation of only showing if you are the one who accepted this----------*/
                                            $rider_session = $_SESSION['rider_email'];

                                            $get_rider = "select * from riders where rider_email='$rider_session'";

                                            $run_rider = mysqli_query($con,$get_rider);

                                            $row_rider = mysqli_fetch_array($run_rider);

                                            $rider_id = $row_rider['rider_id'];
                                    
                                       
                                            if($r_id == $rider_id){
                                    
                                    $a++;
                                            }
                                    }
                                }
                            ?>
               <li>    <!--li start-->
                <a href="index.php?my_deliveries">    <!--a href start-->
                    <i class="fa fa-fw fa-check"></i>    My-Deliveries &nbsp;&nbsp;&nbsp;
                    
                    <?php if($a <= 0){} else {?>
                    <span class="badge"><?php echo $a;?></span>
                    <?php }?> 
                </a>    <!--a href end-->
            </li>    <!--li end-->
            <li>    <!--li start-->
               
                <a href="index.php?record"> 
                   <i class="fa fa-fw fa-book"></i> Delivery Records
                </a>
            </li>    <!--li end-->
            
            <li>    <!--li start-->
                <a href="#" data-toggle="collapse" data-target="#return">    <!--a start-->
                        
                        <i class="fa fa-fw fa-exclamation"></i> Return Items
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                    </a>    <!--a end-->
                    
                    <ul id="return" class="collapse">    <!--collapse start-->
                       
                        <li>    <!--li start-->
                            <a href="index.php?insert_return_item"> Add Return Item </a>
                        </li>    <!--li end-->
                        <li>     <!--li start--> 
                            <a href="index.php?view_return_item"> View Return Items </a>
                        </li>    <!--li end-->
                        
                    </ul>    <!--collapse end-->
            </li>    <!--li end-->
            
            
            
            
            <li>    <!--li start-->
                <a href="logout.php">    <!--a href start-->
                    <i class="fa fa-fw fa-power-off"></i>    Logout
                </a>    <!--a href end-->
            </li>    <!--li end-->
            
        </ul>    <!--nav navbar-nav side-nav end-->
    </div>    <!--collapse navbar-collapse navbar-ex1-collapse end-->
    
</nav>    <!--navbar navbar-inverse navbar-fixed-top end-->

<?php } ?>




















