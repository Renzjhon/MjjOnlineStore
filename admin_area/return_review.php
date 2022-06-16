<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['return_review'])){
            
            $refund_review_id = $_GET['return_review'];
            
            $edit_refund = "select * from refund where refund_id='$refund_review_id'";
            
            $run_refund = mysqli_query($con,$edit_refund);
            
            $row_refund = mysqli_fetch_array($run_refund);
            
            $refund_id = $row_refund['refund_id'];
            
            $customer_id = $row_refund['customer_id'];
            
            $customer_name = $row_refund['customer_name'];
            
            $customer_email = $row_refund['customer_email'];
            
            $productservice_name = $row_refund['productservice_name'];
            
            $payment_method = $row_refund['payment_method'];
            
            $issue = $row_refund['issue'];
            
            $issue_img = $row_refund['issue_img'];
            
            $receipt = $row_refund['receipt'];
            
            $status = $row_refund['status'];
            
            
            
        }

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Review Refund/Return Item Requests
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->


<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-money fa-fw"></i> Review Refund / Return Item Requests
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <div class="panel-body">    <!--panel-body start-->
               
               <h3><center>Customer name: <strong><?php echo $customer_name;?></strong></center></h3>
               <h3><center>Customer email: <strong><?php echo $customer_email;?></strong></center></h3>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">    <!--form-horizontal start-->
                    
                    <div class="form-group">    <!--form-group start-->
                       <center>
                       
                                <br>
                                <h3 style="color:black;"><center>Product/Service Name: <strong style="color:green;"><?php echo $productservice_name;?></strong></center></h3>
                                <h3 style="color:black;"><center>Payment Method: <strong style="color:green;"><?php echo $payment_method;?></strong></center></h3>
                                <h3 style="color:black;"><center>Issue: <strong style="color:green;"><?php echo $issue;?></strong></center></h3>
                                <br><br>
                                <center>Photo of damaged product / service</center>
                                <img src="refund_pics/<?php echo $issue_img; ?>" class="img-responsive" >

                                 <br><br>
                                <center>Receipt</center>
                                <img src="refund_pics/<?php echo $receipt; ?>" class="img-responsive" >
                        </center>
                    </div>    <!--form-group end-->
                    <div class="form-group">    <!--form-group start-->
                       
                        <label for="" class="control-label col-md-3">     <!--control-label col-md-3 start-->
                        
                            
                        
                        </label>    <!--control-label col-md-3 end-->
                        
                        <div class="col-md-6">    <!--col-md-6 start-->
                            
                            <input type="submit" name="update" value="Approved Return" class="btn btn-primary form-control" style="background-color: green">
                            <br>
                            <br>
                            <input type="submit" name="cancel" value="Back" class="btn btn-primary form-control" style="background-color: red">
                        
                        </div>    <!--col-md-6 end-->
                        
                    </div>    <!--form-group end-->
                </form>    <!--form-horizontal end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->

<?php 

        if(isset($_POST['update'])){
                
                
               
        
                echo "<script>window.open('index.php?return_approval=$refund_id','_self')</script>";
                
            
            
        }
        if(isset($_POST['cancel'])){
            
           
                
               
        
                echo "<script>window.open('index.php?refund','_self')</script>";
                
            
        }

?>














<?php } ?>