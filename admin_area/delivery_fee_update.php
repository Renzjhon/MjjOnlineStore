<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['delivery_fee_update'])){
            
        $edit_inventory = $_GET['delivery_fee_update'];
        
        $edit_inventory = "select * from delivery_fee where province_id='$edit_inventory'";
        
        $run_edit = mysqli_query($con,$edit_inventory);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $province_id = $row_edit['province_id'];
        
        $province_name = $row_edit['province_name'];
        
        $delivery_fee = $row_edit['delivery_fee'];
        
       
        
            
        }

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="updateheader">
              <h2 class="m-2 font-weight-bold text-primary"> <?php echo $province_name; ?></h2>
            </div>
              
            
            <div class="card-body">

            <form role="form" method="post" >
             <input type="hidden" name="idd" value="asdf" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Province Id:
                </div>
                <div class="col-sm-9">
                  <p><?php echo $province_id; ?></p>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Province Name:
                </div>
                <div class="col-sm-9">
                  <p><?php echo $province_name; ?></p>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Delivery Fee:
                </div>
                <div class="col-sm-9">
                  <p> ₱ <?php echo $delivery_fee; ?></p>
                </div>
                
                <br>
                <br>
                <br>
                <br>
                <br>
                
                
                <div class="col-sm-3" style="padding-top: 5px;">
                Update Delivery Fee:
                </div>
                
                <center><h1>  <input value="<?php echo $delivery_fee ?>" name="delivery_fee" type="number" class="form-control" min="0" step="0.01"></h1></center>
                <center><h1> <input value="Update Delivery Fee" name="update" type="submit" class="form-control btn btn-primary"></h1></center>
              </div>
              
              <hr>
               

                
                
              </form>  
            </div>
          </div></center>

<?php 

         if(isset($_POST['update'])){
             
            $delivery_fee = $_POST['delivery_fee'];
             
            
             
             
             $update_inventory = "update delivery_fee set delivery_fee='$delivery_fee' where province_id='$province_id'";
             
             $run_inventory = mysqli_query($con,$update_inventory);
             
             
            
             
             if($run_inventory){
                 
                 echo "<script>alert('Your Delivery Fee has been Updated')</script>";
                 
                 echo "<script>window.open('index.php?delivery_fee_list','_self')</script>";
                 
             }
             
             
             
             
            
         }
            
             
            
             
         
?>



<?php } ?>