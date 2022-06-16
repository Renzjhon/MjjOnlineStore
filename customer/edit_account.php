
<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>

<script>	
window.onload = function() {	

	// ---------------
	// basic usage
	// ---------------
	var $ = new City();
	$.showProvinces("#province");
	$.showCities("#city");

	// ------------------
	// additional methods 
	// -------------------

	// will return all provinces 
	console.log($.getProvinces());
	
	// will return all cities 
	console.log($.getAllCities());
	
	// will return all cities under specific province (e.g Batangas)
	console.log($.getCities("Batangas"));	
	
}
</script>

<h1 align="center"> Edit Your Account </h1>


<form action="" method="post" enctype="multipart/form-data">    <!--form start-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer Name: </label>
        
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
        
    </div>    <!--form-group end-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer Email: </label>
        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div>    <!--form-group end-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer Province: </label>
        
        <select id="province" class="form-control" name="c_country" required></select>	
        
    </div>    <!--form-group end-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer City: </label>
        
        <select id="city" class="form-control" name="c_city" required></select>	
        
    </div>    <!--form-group end-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer Contact: </label>
        
        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
        
    </div>    <!--form-group end-->
    
    <div class="form-group">    <!--form-group start-->
        
        <label> Customer Address: </label>
        
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div>    <!--form-group end-->
    
    <div class="form-group form-height-custom">    <!--form-group start-->
        
        <label> Customer Images: </label>
        
        <input type="file" name="c_image" class="form-control  form-height-custom" required accept="image/*">
        
        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Customer Image">
        
    </div>    <!--form-group end-->
    
    <div class="text-center"> <!--text-center start-->
        
        <button name="update" class="btn btn-primary">    <!--btn btn-primary start-->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button>    <!--btn btn-primary end-->
        
    </div>    <!--text-center end-->
    
</form>    <!--form end-->

<?php  

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process please relogin uwu ')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>


































