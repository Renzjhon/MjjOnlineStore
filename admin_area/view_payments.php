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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Payments
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Invoice Number: </th>
                                <th> Date Cash In: </th>
                                <th> Amount Paid: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                
                                $total = 0;
                                $i=0;
         
                                $get_payments = "select * from payments";
         
                                $run_payments = mysqli_query($con,$get_payments);
         
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['payment_id'];
                                    
                                    $invoice_no = $row_payments['invoice_no'];
                                    
                                    $amount = $row_payments['amount'];
                                    
                                    $date = $row_payments['payment_date'];
                                    
                                    $date = date('F j, Y   h:i A', strtotime($date));
                                    
                           
                                    
                                    $total += $amount;
                                    
                                    $i++;
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $date; ?> </td>
                                <td> <?php echo $amount; ?> </td>
                                 
                            </tr>    <!--tr end-->
                            
                            
                            <?php } ?>
                            
                        </tbody>    <!--tbody end-->
                        <tfoot>    <!--tfoot start-->
                                    
                                    <tr>
                                        
                                        <th colspan="3">Total Sales</th>
                                        <th colspan="1">₱ <?php echo $total; ?></th>
                                        
                                    </tr>
                                    
                                </tfoot>    <!--tfoot end-->
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->






























<?php 

        }

?>