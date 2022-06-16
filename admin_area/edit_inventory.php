<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php 

        if(isset($_GET['edit_inventory'])){
            
        $edit_inventory = $_GET['edit_inventory'];
        
        $edit_inventory = "select * from inventory where product_id='$edit_inventory'";
        
        $run_edit = mysqli_query($con,$edit_inventory);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $product_id = $row_edit['product_id'];
        
        $product_name = $row_edit['product_title'];
        
        $quantityinitial = $row_edit['qty_stock'];
        
        $product_img = $row_edit['product_img'];
        
        $stock_date = $row_edit['stock_in_date'];   
            
       
        
            
        }

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="updateheader">
              <h2 class="m-2 font-weight-bold text-primary"> <?php echo $product_name; ?></h2>
            </div>
              
              <h1><center><img width="200" height="200" src="product_images/<?php echo $product_img; ?>"></center></h1>
               
            <div class="card-body">

            <form role="form" method="post" >
              <input type="hidden" name="idd" value="asdf" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Id:
                </div>
                <div class="col-sm-9">
                  <p><?php echo $product_id; ?></p>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <p><?php echo $product_name; ?></p>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Remaining Stock:
                </div>
                <div class="col-sm-9">
                  <p><?php echo $quantityinitial; ?></p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                
                
                <div class="col-sm-3" style="padding-top: 5px;">
                 Add Stocks:
                </div>
                
                <center><h1><input value="1" name="quantity" type="number" class="form-control" min="0"></h1></center>
                <center><h1> <input value="Add Stock" name="update" type="submit" class="form-control btn btn-primary"></h1></center>
              </div>
              
              <hr>
               

                
                
              </form>  
            </div>
          </div></center>

<?php 

         if(isset($_POST['update'])){
             
            $quantity = $_POST['quantity'];
             
             $quantity = $quantity + $quantityinitial;
             
             
             $update_inventory = "update inventory set qty_stock='$quantity',stock_in_date=NOW() where product_id='$product_id'";
             
             $run_inventory = mysqli_query($con,$update_inventory);
             
             
             $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$product_id','$quantity',NOW())";
    
            $run_inventory_report = mysqli_query($con,$insert_inventory_report);
             
             if($run_inventory){
                 
                 echo "<script>alert('Your Inventory has been Updated')</script>";
                 
                 echo "<script>window.open('index.php?inventory','_self')</script>";
                 
             }
             
             
             
             
            
         }
            
             
            
             
         
?>



<?php } ?>