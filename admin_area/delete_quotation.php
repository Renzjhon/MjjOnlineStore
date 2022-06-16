<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php

         if(isset($_GET['delete_quotation'])){
             
             $delete_quotation_id = $_GET['delete_quotation'];
             
             $delete_quotation = "delete from quotation_sent where quotation_id='$delete_quotation_id'";
             
             $run_delete = mysqli_query($con,$delete_quotation);
             
             if($run_delete){
                 
                 echo "<script>alert('One of your quotation has been deleted')</script>";
                 
                 echo "<script>window.open('index.php?view_services','_self')</script>";
                 
             }
             
         }
         
?>












<?php } ?>