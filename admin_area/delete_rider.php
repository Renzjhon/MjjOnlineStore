<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>

<?php

         if(isset($_GET['delete_rider'])){
             
             $delete_rider_id = $_GET['delete_rider'];
             
             $delete_rider = "delete from riders where rider_id='$delete_rider_id'";
             
             $run_delete = mysqli_query($con,$delete_rider);
             
             if($run_delete){
                 
                 echo "<script>alert('One of your rider has been deleted')</script>";
                 
                 echo "<script>window.open('index.php?view_riders','_self')</script>";
                 
             }
             
         }
         
?>












<?php } ?>