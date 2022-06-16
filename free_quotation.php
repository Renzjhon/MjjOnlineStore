   <?php

    session_start();

    include("includes/db.php");
    include("functions/functions.php"); 

    ?>
    
  <?php  
                    
                    if(!isset($_SESSION['customer_email'])){
                        
                        echo "<script>alert('Sorry login your account first before you can access this part')</script>";
        
                        echo "<script>window.open('customer/customer_login.php','_self')</script>";
                        
                        
                    }
                    
                    else{
                        
                       
                    
                    
                    ?>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJJ Online Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="quotation_style.css">
</head>
  <form action="" method="post">
   <div class="container card-0 justify-content-center ">
    <div class="card-body px-sm-4 px-0">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col">
                <h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Request a Quote </h3>
                <p class="mt-md-4 ml-md-0 ml-2 text-center text-sm-left" style="font-size: 23px"> Please fill up the form and press submit after that we will try to contact you to the contact information you have given as soon as possible so that we can communicate about the service you want to afford. </p>
            </div>
        </div>
        
        <div class="row justify-content-center round">
           <?php
               $_SESSION['customer_email'];
                
           
                
                
                        
                $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
        
                $name = $row_customer['customer_name'];
        
                $email = $row_customer['customer_email'];
            
                $number = $row_customer['customer_contact'];
            
                $province = $row_customer['customer_country'];
                
                $city = $row_customer['customer_city'];
                
                $street = $row_customer['customer_address'];
                
                $verified = $row_customer['verified'];
            
                $service_id = $_GET['service_id'];
        
                $select_service = "select * from services where service_id='$service_id'";
                        
                $run_service = mysqli_query($con,$select_service);
                        
                $row_service = mysqli_fetch_array($run_service);
            
                $service_name = $row_service['service_name'];
            
                $price_min = $row_service['service_price_min'];
            
                $price_max = $row_service['service_price_max'];
            
                $service_img = $row_service['service_img1'];
                
            
?>
       <?php 
            
            if($verified == 0){
                echo "<script>alert('Sorry please verify your account first to be able to access this part')</script>";
        
                echo "<script>window.open('verify_email.php','_self')</script>";
            }
            else
            {
            
            
            
            ?>       
            
<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #000000;
  padding: 10px;
    background: solid #ffffff;
}
            </style>
            <div class="col-lg-10 col-md-12 ">
                <div class="card shadow-lg card-1" style="background:#D3D3D3">
                    <div class="card-body inner-card" >
                       <div class="center">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                               <div class="form-group"> <strong><label for="fullname">Full name:</label></strong>
                                
                                <input type="text" class="form-control" id="fullname" placeholder="Type your Name" value="<?php echo $name; ?>" required name="fullname" style="font-size:24px; width: 450px;"> </div>
                                <br>
                                
                                <div class="form-group"> <strong><label for="Mobile-Number">Mobile Number</label></strong>
                                 <input type="text" class="form-control" id="Mobile-Number" value="<?php echo $number; ?>" required name="number"  style="font-size:24px; width: 450px;"> </div>
                                
                                <br>
                                <div class="form-group"> <strong><label for="inputEmail4">Complete Address</label></strong>
                                        <input type="text" class="form-control" id="Mobile-Number" value="<?php echo $street; ?> <?php echo $city; ?> <?php echo $province; ?>" required name="address"  style="font-size:24px;  width: 450px;">
                                 </div>
                                 <br>
                                 
                                <div class="form-group"> <strong><label for="time">Price Range (not final)</label></strong> 
                                 <input type="text" class="form-control" id="time" placeholder="" value="₱<?php echo $price_min;?> - ₱<?php echo $price_max;?>" readonly name="pricerange"  style="font-size:24px;  width: 450px;"> </div>
                                
                                <br>
                                <div class="form-group"> <strong><label for="skill">How much is your budget? (value on peso)</label> </strong><input type="number" class="form-control" id="skill" placeholder="" required name="budget"  style="font-size:24px;  width: 450px;"> </div>
                                <br>
                                <div class="form-group"> <strong><label for="skill">Material(made of?)</label> </strong>
                                
                                <div class="col-md-6">    <!--col-md-6 start-->
                                
                                <select name="material" class="form-control" style="font-size:24px;  width: 450px;">    <!--form-control start-->
                                    
                                    <option selected disabled> Select a Material </option>
                                    
                                    <?php  
                                    
                                    $get_material = "select * from services_materials where service_id = '$service_id'";
                                    $run_material = mysqli_query($con,$get_material);
                                    
                                    while($row_material=mysqli_fetch_array($run_material)){
                                        
                                        $material = $row_material['material'];

                                        echo "
                                        
                                        <option value='$material'> $material </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    
                                </select>    <!--form-control end-->
                                
                            </div>    <!--col-md-6 end-->
                                
                                 
                                   </div>
                                <br>
                                <div class="form-group"> <strong><label for="skill">Estimated size of project(optional)</label> </strong><input type="text" class="form-control" id="skill" placeholder=""  name="size"  style="font-size:24px;  width: 450px;"> </div><br>
                                <div class="form-group"> <strong><label for="skill">Prefer Color(Optional)</label> </strong><input type="text" class="form-control" id="skill" placeholder=""  name="color"  style="font-size:24px;  width: 450px;"> </div>
                 
                            <br>
                            
                                
                                <div class="form-group"> <strong><label for="phone">Email</label></strong> <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" required name="email"  style="font-size:24px;  width: 450px;"> </div>
                                <br>
                                <div class="form-group"> <strong><label for="Evaluate Budget">Project Name</label> </strong><input type="text" class="form-control" id="Evaluate Budget" placeholder="" value="<?php echo $service_name; ?>" readonly required name="service_name"  style="font-size:24px;  width: 450px;"> </div>
                                
                                
                            </div>
                        </div>
                        </div>
                        <br>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-10 col-12">
                                <div class="form-group files"> <center><strong><label class="my-auto">Project sample image</label> </strong></center>
                                <br>
                                <center>
                                <img width="600" height="500" src="admin_area/service_images/<?php echo $service_img ?>" alt="<?php echo $service_img; ?>">
                                </center>
                                </div>
                                
                                <br><br>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-10 col-12">
                                <div class="form-group"> <strong><label for="exampleFormControlTextarea2">Additional Message:</label> </strong><textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="10" required name="message"></textarea></div>
                                
                                <div class="mb-2 mt-4">
                                    <div class="text-right"><input value="Submit" name="submit" type="submit" class="form-control btn btn-primary"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</form>


<?php 
 
          

         if(isset($_POST['submit'])){
             

                $fullname = $_POST['fullname'];
             
                $email = $_POST['email'];
             
                $number = $_POST['number'];
                
                $address = $_POST['address'];
                
                $pricerange = $_POST['pricerange'];
                
                $budget = $_POST['budget'];
             
                $size = $_POST['size'];
                $color = $_POST['color'];
                $material = $_POST['material'];
                
                
                
                $service_name = $_POST['service_name'];
                
                $message = $_POST['message'];
                
             
                $insert_quotation = "insert into quotation_sent (customer_name,customer_email,customer_number,address,pricerange,customer_budget,service_name,additional_message,size,color,material) values ('$fullname','$email','$number','$address','$pricerange','$budget','$service_name','$message','$size','$color','$material')";
             
                $run_quotation = mysqli_query($con,$insert_quotation);
             
                if($run_quotation){
                    
                $receiver = "mjjaluminumandglassworks@gmail.com";
                $subject = "Customer Quotation";
                $body = "
                
                Good Day MJJ Team!
                
                You have recieved a quotation for one of your services from customer: $fullname.
                
                Service name: $service_name
                Default price range: $pricerange
                Customer Budget: ₱ $budget
                
                Estimated Size: $size
                Prefer Color: $color
                
                ---------------------Customer Information---------------------
                
                Customer full name: $fullname
                Customer address: $address
                Customer Contact number: $number
                Customer email address: $email
                Customer additional message:
                
                $message.
                
                Please reply to the customer as soon as possible to explain the details and get additional info about the service they are trying to get. Thank you.
                
                
                
                ";
                    
                    
                $sender = "From: Renzjohnbuizon@gmail.com";
                if(mail("mjjaluminumandglassworks@gmail.com", $subject, $body, $sender)){
                echo "Email sent successfully to the company";
                }else{
                echo "Sorry, failed while sending mail!";
                }    
                    
                    
                
                 
                 echo "<script>alert('Your form has been submitted please wait for our response in the email you have given')</script>";
                 
                 echo "<script>window.open('index.php','_self')</script>";
                    
                    
                
                 
             }
                 
             
             
         }
         

?>

<?php } }?>


