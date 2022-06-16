<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
  </head>
  <body>
    
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Daily Item Reduced
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Daily Item Reduced
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            <?php
            $search_date = date('Y-m-d');
        
             $display_date = date('F j, Y', strtotime($search_date));
            ?>
            <h1><center>Pick A Day</center></h1>
            
            <form action="" class="form-horizontal" method="post"> 
             <center><input type='date' id='' name="date" placeholder="Select Month" max="<?php echo $search_date;?>" /></center><br>
             <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <center><input value="Search" name="update" type="submit" class="form-control btn btn-primary" style="background-color:green;"></center>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
            </form>
             <?php 
            if(isset($_POST['update'])){
            
            
        
            $raw_date = $_POST['date'];
                if($raw_date == NULL){
                    $search_date = date('Y-m-d');
                }
                else {
                    $search_date = $raw_date;
                }
            $display_date = date('F j, Y', strtotime($search_date));
                
                
            
            
            }
              
            
            
            ?>
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        <h3><center>Date: <strong><?php echo $display_date ?></strong></center></h3>
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Product ID: </th>
                                <th> Product Title: </th>
                                <th> Product Image: </th>
                                <th> Product Price: </th>
                                <th> Item Reduced in Inventory: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                $i=0;
         
                                $get_pro = "select * from products";
         
                                $run_pro = mysqli_query($con,$get_pro);
         
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    
                                 
                                    
                                    $get_sold = "select * from pending_orders where product_id='$pro_id'";
                                    
                                    
                                    
                                    $run_sold = mysqli_query($con,$get_sold);
                                    
                                    $count = mysqli_num_rows($run_sold);
                                    
            
                                    $row_qty = mysqli_fetch_array($run_sold);
                                    
                                    $qty = $row_qty['qty'];
                                    
                                    
                                    $count1 = $count * $qty;
                                    $get_date = "select * from customer_orders where order_date = '$search_date'";
                                    
                                    $run_date = mysqli_query($con,$get_date);
                                    
                                    $row_date = mysqli_fetch_array($run_date);
                                    
                                    if($row_date == NULL){}
                                    
                                    
                                    
                                    else{
                                    $i++;
                                    $date = $row_date['order_date'];
                                    
                                    if ($count <= 0){
                                        
                                    }
                                    else{
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $pro_id; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"> </td>
                                <td> ₱ <?php echo $pro_price; ?> </td>
                                <td style="font-size:40px;"> <strong><center><?php
                                    
                                        echo $count1;
                                    
                                     ?> </center></strong>
                                </td>
                                 
                            </tr>    <!--tr end-->
                            
                            
                            
                            
                            
                        </tbody>    <!--tbody end-->
                        
                        <?php } } }?>
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->








  </body>
</html>
















<?php 

        }

?>