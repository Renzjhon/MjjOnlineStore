<?php 
error_reporting(E_ALL ^ E_WARNING); 
    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / Reports / Payment Method Reports
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Different payment methods
                    
                    
                </h3>    <!--panel-title end-->
                <h3 class="panel-title">    <!--panel-title start-->
                    <center><strong>
                   How many customers chose this payment method
                    </strong></center>
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover sortable sortable Descending" >    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Payment method </th>
                                <th> Payment Image: </th>
                                <th> Order Times </th>
<!--                                <th> Product Delete: </th>-->
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                                                            <!--for gcash-->
                                <tr>
                                 <?php 
                                    
                                    
                                    $count = 0;
                                
                                    $gcash = "Gcash";
                                    $get_sold = "select * from order_summary where payment_method = '$gcash'";
                                    
                                    
                                    
                                    $run_sold = mysqli_query($con,$get_sold);
                                    
                                    $count = mysqli_num_rows($run_sold);
                                    
            
                                   
                                    
                                    $i++;
                                    
                                    
                            
                            ?>
                                <td style="font-size:50px;"> <center><strong>Gcash</strong></center> </td>
                                <td> <center><img src="../images/gcash.png" width="200" height="60"> </center></td>
                                <td style="font-size:50px;"> <center><strong><?php echo $count; ?></strong></center> </td>
                                
                                </tr>
                                
                                
                                                    <!--for cod-->
                                <tr>
                                 <?php 
                                    
                                    
                                    $count = 0;
                                
                                    $method = "Cash on Delivery";
                                    $get_sold = "select * from order_summary where payment_method = '$method'";
                                    
                                    
                                    
                                    $run_sold = mysqli_query($con,$get_sold);
                                    
                                    $count = mysqli_num_rows($run_sold);
                                    
            
                                   
                                    
                                    
                                    
                                    $i++;
                                    
                                    
                            
                            ?>
                                <td style="font-size:40px;"> <center><strong>Cash On Delivery</strong></center> </td>
                                <td> <center><img src="../images/cod.png" width="200" height="60"> </center></td>
                                <td style="font-size:50px;"> <center><strong><?php echo $count; ?></strong></center> </td>
                                
                                </tr>
                                
                                
                                            <!--paypal-->
                                <tr>
                                 <?php 
                                    
                                    
                                    $count = 0;
                                
                                    $method = "Paypal";
                                    $get_sold = "select * from order_summary where payment_method = '$method'";
                                    
                                    
                                    
                                    $run_sold = mysqli_query($con,$get_sold);
                                    
                                    $count = mysqli_num_rows($run_sold);
                                    
            
                                    
                                    
                                    $i++;
                                    
                                    
                            
                            ?>
                                <td style="font-size:40px;"> <center><strong>Paypal</strong></center> </td>
                                <td> <center><img src="../images/paypal_img.png" width="200" height="60"> </center></td>
                                <td style="font-size:50px;"> <center><strong><?php echo $count; ?></strong></center> </td>
                                
                                </tr>
                            
                           
                            
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