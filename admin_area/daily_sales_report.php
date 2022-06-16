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
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" >
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
                
                $admin_email = $_SESSION['admin_email'];
                
                $get_admin = "select * from admins where admin_email = '$admin_email'";
         
                                $run_admin = mysqli_query($con,$get_admin);
         
                                $row_admin=mysqli_fetch_array($run_admin);
                                    
                                    $admin_name = $row_admin['admin_name'];
        ?>


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
            
            <button id="daily_sales" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Download</button><form action="" class="form-horizontal" method="post"> 
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
            
            <br>
            <div class="panel-body" id="pdf">    <!--panel-body start-->
             <div class="header"  style="display:block;text-align:left; background:black; height:90px">
             <center><h2 style="font-size:60px; color:white"><strong>MJJ</strong> Aluminum and Glass Works <br></h2></center>
             
             </div>
             <div class="header"  style="display:block;text-align:left; background:#D3D3D3; height:150px">
             
            <div style="width: 80%; float:left; ">
            <table>
                <tr>
                    <td style="font-size:23px; color:black;padding: 10px;border: 5px solid #D3D3D3;border-collapse: collapse;">
                        <strong>EMAIL:</strong> mjjaluminumandglassworks@gmail.com
                    </td>
                </tr>
                <tr>
                    <td style="font-size:20px; color:black;padding: 10px;border: 5px solid #D3D3D3;border-collapse: collapse;">
                        <strong>ADDRESS:</strong> CALIFORNIA VILLAGE, 73 Katipunan
Ave, Novaliches, Quezon City
                    </td>
                </tr>
                
            </table>
            
            </div>

           
           
           
           
            <div style="width: 18%; float:right">
          
               <img align="left" src="icons/logo.png" border="0" width="140px" height="200px">
           
               <br>
               <br>
               <br>
          

               
            </div>
             
     
             </div>
             
              <div style="display:block;text-align:left; background:#565656; height:80px">
              <center>
                  <h2 style="font-size:50px; color:white">Daily Sales Report <br></h2>
                 
      
                </center>
                
                
                </div>
                <br>
                 <center><h3>For <strong><?php echo $display_date;?></strong></h3></center>
              <br>
              
               <div class="row">
                           
                            
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_customers; ?></h2>
                                                <span>Customers</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
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
                                    
                                    
                                    
                                  
                                    
                                
                          

                            
                           

                            if($search_date == $date){
                               if($amount == 0){}
                                else {
                                    $i++;
                                }
                            }
                                }
                            ?>
                                                <h2><?php echo $i;?></h2>
                                                <span>orders done</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                               
                                               <?php 
                                
                                $total = 0;
                                $a=0;
         
                                $get_payments = "select * from customer_orders";
         
                                $run_payments = mysqli_query($con,$get_payments);
         
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['order_id'];
                                    
                                    $invoice_no = $row_payments['invoice_no'];
                                    
                                    $amount = $row_payments['due_amount'];
                                    
                                   
                                    
                                    $date = $row_payments['order_date'];
                                    
                                    $date = date('Y-m-d', strtotime($date));
                                    
                                    $table_date = date('F j, Y', strtotime($date));
                                    
                                    
                                
                                    
                                 
                           
                          

                            if($search_date == $date){
                               if($amount == 0){}
                                else {
                                    $a++;
                                }
                            }
                                }
                            ?>
                                                <h2><?php echo $a;?></h2>
                                                <span>Items Sold</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
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
                                    
                                    
                                    
                                  
                                    
                                
                          

                           

                            if($search_date == $date){
                               if($amount == 0){}
                                else {
                                    $i++;
                                    $total += $amount; 
                                }
                            }
                                }
                            ?>
                                                <h2>₱<?php echo number_format((float)$total, 2, '.', ''); ?></h2>
                                                <span>Total Sales</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">recent reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                     <?php 
                                
                                $total = 0;
                                $a=0;
                                $b=0;
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
                                    
                                    
                            if($search_date == $date){
                                        if($amount == 0){}
                                        else {
                                            $a++;
                                            }
                                    }
                                }
                            $get_paymentsa = "select * from payments where order_type = 'product'";
         
                                $run_paymentsa = mysqli_query($con,$get_paymentsa);
         
                                while($row_paymentsa=mysqli_fetch_array($run_paymentsa)){
                                    
                                   
                                    
                                    $order_type = $row_paymentsa['order_type'];
                                    
                                    $date = $row_paymentsa['payment_date'];
                                    
                                    $date = date('Y-m-d', strtotime($date));
                                    
                                    $table_date = date('F j, Y', strtotime($date));
                                    
                                    
                            if($search_date == $date){
                                        if($amount == 0){}
                                        else {
                                            $b++;
                                            }
                                    }
                                }
                                    
                                if($b == 0){
                                    $b = 1;
                                }
                                if($a == 0){
                                    $a = 1;
                                }
                                $b = $b/$a;
                                $product = $b*100;
        
                                $service = 100 - $product;
                                
                            
                            ?>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i><div class="product"><?php echo $product?>%</div></span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i><?php echo $service?>%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="table-responsive">    <!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover table-striped table-earning" style="color:black;">    <!--table table-striped table-bordered table-hover start-->
                       
                        
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


                        <tbody style="color:black;">    <!--tbody start-->
                            
                            
                            
                            <?php         
                            if($search_date == $date){
                               if($amount == 0){}
                                else {
                            ?>
                            
                            <tr style="color:black;">    <!--tr start-->
                               <?php $total += $amount; ?>
                                <td style="color:black;"> <?php echo $i; ?> </td>
                                <td  style="color:black;"> <?php echo $invoice_no; ?> </td>
                                <td  style="color:black;"> <?php echo $amount; ?> </td>
                                <td  style="color:black;"> <?php echo $order_type; ?> </td>
                                <?php 
                                if($order_type = "Services"){}
                                    else{
                                
                                ?>
                                <td  style="color:black;"><a href="index.php?order_details=<?php echo $invoice_no; ?>">
                                <i class='fa fa-eye'></i> View Details
                                    </a>  </td>
                                 <?php }?>
                            </tr>    <!--tr end-->
                            <?php }  }?>
                            
                            
                            
                        </tbody>    <!--tbody end-->
                        
 <?php  }?>
                        <tfoot>    <!--tfoot start-->
                                    
                                    <tr>
                                        
                                        <th colspan="2">Total Sales</th>
                                        <th colspan="1">₱ <?php echo number_format((float)$total, 2, '.', ''); ?></th>
                                        
                                    </tr>
                                    
                                </tfoot>    <!--tfoot end-->
                             
                               
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                    
                    
                </div>    <!--table-responsive end-->
                <br>
                <br>
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
            html2canvas: {scale: 2, logging: true, dpi: 192, letterSpacing: true},
            jsPDF: {unit: 'mm', format: 'a3', orientation: 'portrait'}
        };
        
        
        html2pdf().from(pdf).set(opt).save();
    })
    
          
          
          
}



</script>

 
  </body>
</html>

<script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
   
    
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

   
<script>

(function ($) {
  // USE STRICT
  "use strict";

  try {
    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          type: 'line',
          datasets: [{
            data: [78, 81, 80, 45, 34, 12, 40],
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 3
    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [65, 59, 84, 84, 51, 55],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
      

    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
      ctx.height = 115;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: "My First dataset",
              data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "rgba(255,255,255,.3)"
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }

    // Recent Report
    const brandProduct = 'rgba(0,181,233,0.8)'
    const brandService = 'rgba(0,173,95,0.8)'

    var elements = 10
    var data1 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
    var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

    var ctx = document.getElementById("recent-rep-chart");
    if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService,
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data1

            },
            {
              label: 'My Second dataset',
              backgroundColor: brandProduct,
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data2

            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            }
          }


        }
      });
    }

    // Percent Chart
    var ctx = document.getElementById("percent-chart");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [<?php echo $product?>, <?php echo $service ?>],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Products',
            'Services'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }


  try {

    // polar chart
    var ctx = document.getElementById("polarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          datasets: [{
            data: [15, 18, 9, 6, 19],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.8)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0,0,0,0.2)",
              "rgba(0, 123, 255,0.5)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
          datasets: [
            {
              label: "My First dataset",
              data: [40, 55, 75, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);
</script>
<?php 

        }

?>