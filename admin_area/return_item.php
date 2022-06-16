<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / Refund / Return Item Requests
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Refund / Return Item Requests
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Refund ID: </th>
                                <th> Customer ID: </th>
                                <th> Customer Name: </th>
                                <th> Customer Email: </th>
                                <th> Product / Service Name: </th>
                                <th> Invoice: </th>
                                <th> Payment Method: </th>
                                <th> Issue: </th>
                                <th style="font-size:12px;"> Image of Damaged Service / Product: </th>
                                <th> Receipt Image: </th>
                                <th> Review </th>
                                
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
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
                                    
                                    $invoice = $row_order['invoice_no'];
                                    
                                    
                                    
                                    $i++;
                                    if($status == "NotSettled"){
                                        
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                
                                <td> <?php echo $refund_id ?> </td>
                                <td> <?php echo $customer_id ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $productservice_name; ?> </td>
                                <td> <?php echo $invoice; ?> </td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> <?php echo $issue; ?> </td>
                                <td> <center><img src="refund_pics/<?php echo $issue_img; ?>" width="60" height="60">  </center></td>
                                
                                <td> <center><img src="refund_pics/<?php echo $receipt; ?>" width="60" height="60">  </center></td>
                                <td> 
                                    <a href="index.php?return_review=<?php echo $refund_id; ?>">
                                    
                                        <center><i class="fa fa-eye"></i> </center>Review
                                    
                                    </a> 
                                </td> 
                                
                                
                                 
                            </tr>    <!--tr end-->
                            
                            <?php }} ?>
                            
                        </tbody>    <!--tbody end-->
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->






























<?php 

        }

?>