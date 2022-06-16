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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Weekly Item Reduced
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Weekly Item Reduced
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            <?php
        error_reporting(E_ALL ^ E_WARNING); 
            $date_today = date('Y-m-d');
                $week = date("W", strtotime("$date_today"));
                $year = date('Y');
                $week = "$year-W$week";
            $search_date = date("Y-m-d", strtotime("$week"));
        
             $display_date = date('F j, Y', strtotime($search_date));
            $d1 = $search_date;
                
           
            $d2 = date('Y-m-d', strtotime($display_date. ' + 1 days'));
            $d3 = date('Y-m-d', strtotime($display_date. ' + 2 days'));
            $d4 = date('Y-m-d', strtotime($display_date. ' + 3 days'));
            $d5 = date('Y-m-d', strtotime($display_date. ' + 4 days'));
            $d6 = date('Y-m-d', strtotime($display_date. ' + 5 days'));
            $d7 = date('Y-m-d', strtotime($display_date. ' + 6 days'));
            
            $display_date_last = date('F j, Y', strtotime($d7));
            ?>
            <h1><center>Pick A Week</center></h1>
            
            <form action="" class="form-horizontal" method="post"> 
             <center><input type='week' id='' name="week" placeholder="Select Week" max="<?php echo $week;?>" /></center>
     
             <br>
             
             <div class="form-group">    <!--form-group start-->
                            
                            <label class="col-md-3 control-label"></label>
                            
                            <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <center><input value="Search" name="update" type="submit" class="form-control btn btn-primary" style="background-color:green;"></center>
                                
                            </div>    <!--col-md-6 end-->
                            
                        </div>    <!--form-group end-->
            </form>
             <?php 
            if(isset($_POST['update'])){
            
            
        $raw_date = $_POST['week'];
                
                if($raw_date == NULL){
                    
                    $week = date("W", strtotime("$date_today"));
                    $year = date('Y');
                    $search_date = "$year-W$week";
                }
                else {
                    $search_date = $raw_date;
                }
            
            $search_date = date("Y-m-d", strtotime("$search_date"));
         
            $display_date = date('F j, Y', strtotime($search_date));
            
            $d1 = $search_date;
                
           
            $d2 = date('Y-m-d', strtotime($display_date. ' + 1 days'));
            $d3 = date('Y-m-d', strtotime($display_date. ' + 2 days'));
            $d4 = date('Y-m-d', strtotime($display_date. ' + 3 days'));
            $d5 = date('Y-m-d', strtotime($display_date. ' + 4 days'));
            $d6 = date('Y-m-d', strtotime($display_date. ' + 5 days'));
            $d7 = date('Y-m-d', strtotime($display_date. ' + 6 days'));
            
            $display_date_last = date('F j, Y', strtotime($d7));
            }
            ?>
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        <h3><center>Date: <strong><?php echo $display_date ?> - <?php echo $display_date_last ?></strong></center></h3>
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
                                    
                                    while($row_qty=mysqli_fetch_array($run_sold)){
                                    
                                    $qty = $row_qty['qty'];
                                        $invoice = $row_qty['invoice_no'];
                                    
                                    
                                    $count1 = $count * $qty;
                                    $get_date = "select * from customer_orders where invoice_no='$invoice'";
                                    
                                    $run_date = mysqli_query($con,$get_date);
                                    
                                    $row_date = mysqli_fetch_array($run_date);
                                    
                                    $date = $row_date['order_date'];
                                    
                                    
                                    $i++;
                                    }
                                    
                                    if ($count <= 0){
                                        
                                    }
                                    else{
                            
                            ?>
                            <?php 
                            if($d1 == $date || $d2 == $date || $d3 == $date || $d4 == $date || $d5 == $date || $d6 == $date || $d7 == $date){
                            
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
                            
                            
                            
                            <?php } }}?>
                            
                        </tbody>    <!--tbody end-->
                        
                        
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