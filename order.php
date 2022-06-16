<?php

session_start();

include("includes/db.php");
include("functions/functions.php"); 

?>

<script>alert('Your order has been submitted thank you.')</script>



 <?php 
                 $select_customer = "select * from customers where customer_email='$_SESSION[customer_email]'";
                        
                $run_customer = mysqli_query($con,$select_customer);
                        
                $row_customer = mysqli_fetch_array($run_customer);
        
                $province = $row_customer['customer_country'];
                
                $select_province = "select * from delivery_fee where province_name='$province'";
                        
                $run_province = mysqli_query($con,$select_province);
                        
                $row_province = mysqli_fetch_array($run_province);
        
                $delivery_fee = $row_province['delivery_fee'];
                                            
                                        
                                        ?>








<?php 


if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    
}

$ip_add = getRealIpUser();

$status = "On Process";

$payment_method = "Cash On Delivery";

$payment = "Unpaid";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);


while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    $update_inventory = "select * from inventory where product_id='$pro_id'";
    
    $run_inventory = mysqli_query($con,$update_inventory);
   
    $row_inventory = mysqli_fetch_array($run_inventory);
            
    $ori_qty = $row_inventory['qty_stock'];
    
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $updated_stock = 0;
        
        $sub_total = $row_products['product_price']*$pro_qty;
        
        
        $date_today = date('Y-m-d');
                
           
        $delivery_date = date('Y-m-d', strtotime($date_today. ' + 7 days'));
        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,order_date,delivery_date,order_status,payment_method,payment) values ('$customer_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$delivery_date','$status','$payment_method','$payment')";
        
        $run_customer_order = mysqli_query($con,$insert_customer_order);
        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status,payment_method,payment) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$status','$payment_method','$payment')";
        
       
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        
         $updated_stock = $ori_qty - $pro_qty;
        
         $update_inventory = "update inventory set qty_stock='$updated_stock' where product_id='$pro_id'";
              
         $run_inventory = mysqli_query($con,$update_inventory);
        
        $insert_inventory_report = "insert into inventory_report (product_id,stock,date) values ('$pro_id','$updated_stock',NOW())";
    
            $run_inventory_report = mysqli_query($con,$insert_inventory_report);
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        
        
    }
} 
        $get_sold = "select * from customer_orders where invoice_no='$invoice_no'";
                                    
                                    
                                    
        $run_sold = mysqli_query($con,$get_sold);
                                    
        $count = mysqli_num_rows($run_sold);

           $count1 = $delivery_fee/$count;
       
        while($row_sold=mysqli_fetch_array($run_sold)){
                                    
            $amount1 = $row_sold['due_amount'];
            $amount = $amount1 + $count1;
            
            $update_amount = "update customer_orders set due_amount='$amount' where due_amount='$amount1'";
              
            $run_inventory = mysqli_query($con,$update_amount);
            
            
        }


        
        
        
    


?>
<?php 
        if(isset($_GET['c_id'])){
            
        $customer_id = $_GET['c_id'];
            
        $get_c_info = "select * from customers where customer_id='$customer_id'";
            
        $run_edit = mysqli_query($con,$get_c_info);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $province = $row_edit['customer_country'];
            
        $city = $row_edit['customer_city'];
        
        $street = $row_edit['customer_address'];    
        
            
            
        
        $get_order = "select * from customer_orders where order_id=(select max(order_id) from customer_orders)";
        
        $run_edit = mysqli_query($con,$get_order);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $invoice = $row_edit['invoice_no'];
            
        $total_amount = $row_edit['due_amount'];
        
        $date_ori = $row_edit['order_date'];
            
        $delivery_datemin = date('M-d-Y', strtotime($date_ori. ' + 7 days'));
        
        $delivery_datemax = date('M-d-Y', strtotime($date_ori. ' + 12 days'));
        
        }



?>
<?php
           /*-------------------------this is for totalling------------*/
        $get_p_cats = "select sum(due_amount) as total from customer_orders where invoice_no = '$invoice_no'";
                            
                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                $row=mysqli_fetch_array($run_p_cats);

                                    $total = $row['total'];
                                    
                                    $price = $total - $delivery_fee;





 /*-------------------------this is for order summary table------------*/



             $get_total = "select sum(due_amount) as total from customer_orders where invoice_no = '$invoice_no'";
                            
                                $run_total = mysqli_query($con,$get_total);
                                $row=mysqli_fetch_array($run_total);

                                    $total_price = $row['total'];

                
            
            
                
                
                
            


        $c_verify = 0;

        $r_verify = 0;
        $date_today = date('Y-m-d');
                
           
        $delivery_date = date('Y-m-d', strtotime($date_today. ' + 7 days'));

        $insert_order_summary = "insert into order_summary (customer_id,total_price,invoice_no,order_date,delivery_date,order_status,payment_method,payment,Customer_verify,Rider_verify) values ('$customer_id','$total_price','$invoice_no',NOW(),'$delivery_date','$status','$payment_method','$payment','$c_verify','$r_verify')";
        
       
        $run_order_summary = mysqli_query($con,$insert_order_summary);
        





           


                                            


?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#000000;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Will be paid Cash On Delivery </h2>
                                    </td>
                                </tr>
                                   <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> We will process your order as soon as possible. please ready the amount in the delivery day. Thank you very much.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Invoice Number: </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> <?php echo $invoice; ?></td>
                                            </tr>
                                            <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> SUB-TOTAL </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₱ <?php echo $price; ?>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                            
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Shipping + Handling </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> ₱ <?php echo $delivery_fee?> </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Sales Tax </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> ₱ 0.00 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> ₱ <?php echo $total; ?>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Address</p>
                                                        <p><?php echo $street; echo" "; echo $city; echo" "; echo $province; ?> </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Estimated Delivery Date</p>
                                                        <p><?php echo $delivery_datemin; ?>  -  <?php echo $delivery_datemax; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #ADD8E6;" bgcolor="#ADD8E6">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                
                                <tr>
                                    <td align="center" style="padding: 25px 0 15px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"> <a href="shop.php" target="_self" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: 	#32cd32; padding: 15px 30px; border: 1px solid #ADD8E6; display: block;">Shop Again</a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>

</html>













