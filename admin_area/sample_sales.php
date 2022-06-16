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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    
  </head>
  <body>
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Daily Sales
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->
<?php
        
            $search_date = date('Y-m-d');
        
             $display_date = date('F j, Y', strtotime($search_date));
            ?>
<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Daily Sales
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <h1><center>Pick A Day</center></h1>
            
            <form action="" class="form-horizontal" method="post"> 
             <center><input type='date' id='' name="date" placeholder="Select Date" max="<?php echo $search_date?>" /></center><br>
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
            <button id="daily_sales" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Download</button>
            <div class="panel-body" id="pdf">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover">    <!--table table-striped table-bordered table-hover start-->
                       <div style="display:block;text-align:left"><img align="left" src="icons/logo.png" border="0" width="100px" height="100px"><center><h2>Daily Sales Report <br> Date: <strong><?php echo $display_date;?></strong></h2></center></div>
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Invoice Number: </th>
                                <th> Amount Paid: </th>
                                <th> Order Type: </th>
                                
                                <th> Details: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        
<?php 
                                
                                $total = 0;
                                $i=0;
         
                                $get_payments = "select * from payments";
         
                                $run_payments = mysqli_query($con,$get_payments);
         
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['payment_id'];
                                    
                                    $invoice_no = $row_payments['invoice_no'];
                                    
                                    $amount = $row_payments['amount'];
                                    
                                    $order_type = $row_payments['order_type'];
                                    
                                    $date = $row_payments['payment_date'];
                                    
                                    $date = date('Y-m-d', strtotime($date));
                                    
                                    $table_date = date('F j, Y', strtotime($date));
                                    
                                    
                                    
                                    $i++;
                                    
                                
                            
                            ?>


                        <tbody>    <!--tbody start-->
                            
                            
                            
                            <?php         
                            if($search_date == $date){
                               if($amount == 0){}
                                else {
                            ?>
                            
                            <tr>    <!--tr start-->
                               <?php $total += $amount; ?>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $amount; ?> </td>
                                <td> <?php echo $order_type; ?> </td>
                                <td><a href="index.php?order_details=<?php echo $invoice_no; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                 
                            </tr>    <!--tr end-->
                            <?php }  }?>
                            
                            
                            
                        </tbody>    <!--tbody end-->
                        
 <?php  }?>
                        <tfoot>    <!--tfoot start-->
                                    
                                    <tr>
                                        
                                        <th colspan="2">Total Sales</th>
                                        <th colspan="1">₱ <?php echo $total; ?></th>
                                        
                                    </tr>
                                    
                                </tfoot>    <!--tfoot end-->
                             
                               
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                    
                    
                </div>    <!--table-responsive end-->
                <?php 
                
                $admin_email = $_SESSION['admin_email'];
                
                $get_admin = "select * from admins where admin_email = '$admin_email'";
         
                                $run_admin = mysqli_query($con,$get_admin);
         
                                $row_admin=mysqli_fetch_array($run_admin);
                                    
                                    $admin_name = $row_admin['admin_name'];
        
        
        
                                 date_default_timezone_set('Asia/Manila');
                                     
                                $date = date('Y-m-d H:i:s');
                               
                                $date_now = date('F j, Y ', strtotime($date));
                                $time_now = date('h:i A', strtotime($date));
        
        
                
                
                ?>
                
                <footer> <strong>
                    Generated by: <?php echo $admin_name; ?> <br>
                    Date: <?php echo $date_now;?> <br>
                    Time: <?php echo $time_now;?>
                    
                </strong></footer>
                
                
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->





<script>
      window.onload = function(){
    document.getElementById("daily_sales")
    .addEventListener("click",()=>{
        
        const pdf = this.document.getElementById("pdf");
        console.log(pdf);
        console.log(window); 
        var opt= {
            filename:       'Daily_Sales_Report.pdf',
            image:          { type: 'jpeg', quality: 0.98},
            
        };
        
        
        html2pdf().from(pdf).set(opt).save();
    })
    
          
          
          
}



</script>

 
  </body>
</html>







<?php 

        }

?>