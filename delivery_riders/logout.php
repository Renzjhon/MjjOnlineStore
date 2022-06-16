<?php 

session_start();
session_destroy();

echo "<script>window.open('rider_login.php','_self')</script>";

?>