<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Settled Services
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> Settled Services
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-hover table-striped table-bordered">    <!--table table-hover table-striped table-bordered start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Quotation ID </th>
                                <th> Customer Name </th>
                                <th> Customer Email </th>
                                <th> Customer Contact Number </th>
                                <th> Customer Address </th>
                                <th> Customer Service Name </th>
                                <th> Service Price Range </th>
                                <th> Customer Budget </th>
                                <th> Size: </th>
                                <th> Color: </th>
                                <th> Addtional Message </th>
                                
                                
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
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
                                    $size = $row_q['size'];
                                    $color = $row_q['color'];
                                    
                                    $status = $row_q['status'];
                                    
                                    
                                    
                                    
                                    $i++;
                            ?>
                            <?php 
                                    if($status == "Settled"){
                            
                            
                            ?>
                            
                            
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $customer_name; ?></td>
                                <td> <?php echo $customer_email; ?></td>
                                <td> <?php echo $customer_number; ?></td>
                                <td> <?php echo $address; ?></td>
                                <td> <?php echo $service_name; ?></td>
                                <td> <?php echo $price_range; ?></td>
                                <td> <?php echo $customer_budget; ?></td>
                                <td> <?php echo $size; ?></td>
                                <td> <?php echo $color; ?></td>
                                <td> <?php echo $additional_message; ?></td>
                                
                                
                            </tr>    <!--tr end-->
                            
                            <?php  } }?>
                            
                        </tbody>    <!--tbody end-->
                    </table>    <!--table table-hover table-striped table-bordered end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php ?>







<?php } ?>