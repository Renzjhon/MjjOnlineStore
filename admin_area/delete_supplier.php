<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>
<?php

         if(isset($_GET['delete_supplier'])){
             
             $delete_supplier_id = $_GET['delete_supplier'];
             
             $delete_supplier = "delete from suppliers where supplier_ID='$delete_supplier_id'";
             
             $run_delete = mysqli_query($con,$delete_supplier);
             
             if($run_delete){
                 
                 echo "<script>alert('One of your Supplier has been deleted')</script>";
                 
                 echo "<script>window.open('index.php?view_suppliers','_self')</script>";
                 
             }
             
         }
         
?>












<?php } ?>