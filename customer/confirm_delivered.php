
<?php 

        if(isset($_GET['confirm_delivered'])){
            
        $order_id = $_GET['confirm_delivered'];
        
        $invoice_query = "select * from order_summary where invoice_no='$order_id'";
        
        $run_edit = mysqli_query($con,$invoice_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
            
        $customer_verify = $row_edit['Customer_verify'];
            
        $rider_verify = $row_edit['Rider_verify'];
        
        
            
        }
?>
     


<?php 
                    
                   
                        
                        $customer_v = 1;
                        
                                        
                        
                        $update_order = "update customer_orders set Customer_verify='$customer_v' where invoice_no='$order_id'";
                        
                        $run_order = mysqli_query($con,$update_order);


                        $update_order = "update order_summary set Customer_verify='$customer_v' where invoice_no='$order_id'";
                        
                        $run_order = mysqli_query($con,$update_order);
                        
                        
                        if($run_order){
                            
                        }
                        
                        
                        
                        
                        if($customer_v == 1 && $rider_verify == 1){
                            
                            $status = "Delivered";
                        }
                        else {
                            $status = "In Transit";
                        }
                        
                        
                        
                        
                        $update_order = "update customer_orders set order_status='$status' where invoice_no='$order_id'";
              
                        $run_order = mysqli_query($con,$update_order);

                        $update_order_summary = "update order_summary set order_status='$status' where invoice_no='$order_id'";
              
                        $run_order = mysqli_query($con,$update_order_summary);
                        
                        $update_p_order = "update pending_orders set order_status='$status' where invoice_no='$order_id'";
              
                        $run_p_order = mysqli_query($con,$update_p_order);
                        
                        if($run_p_order){
                            
                            
                            
                            
                            echo "<script>alert('Customer Item Receive Succesfully ')</script>";
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                            
                            
                        }
                        
                    
                    
                    ?>


<?php ?>
