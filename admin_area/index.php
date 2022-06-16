<?php 

session_start();
include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_pending_orders = "select * from pending_orders";
        
        $run_pending_orders =   mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJJ Online Store Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/select2.min.css" />
    
</head>
<body>

    <div id="wrapper">    <!--wrapper start-->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">    <!--page-wrapper start-->
            <div class="container-fluid">    <!--container-fluid start-->
               
                
                <?php
                if(isset($_GET['dashboard'])){
                    
                    include("dashboard.php");
                }
                if(isset($_GET['insert_product'])){
                    
                    include("insert_product.php");
                    
                }
                if(isset($_GET['view_products'])){
                    
                    include("view_products.php");
                    
                }
                if(isset($_GET['delete_product'])){
                    
                    include("delete_product.php");
                    
                }
                if(isset($_GET['edit_product'])){
                    
                    include("edit_product.php");
                    
                }
                if(isset($_GET['insert_p_cat'])){
                    
                    include("insert_p_cat.php");
                    
                }
                if(isset($_GET['view_p_cats'])){
                    
                    include("view_p_cats.php");
                    
                }
                if(isset($_GET['delete_p_cat'])){
                    
                    include("delete_p_cat.php");
                    
                }
                if(isset($_GET['edit_p_cat'])){
                    
                    include("edit_p_cat.php");
                    
                }
               
                if(isset($_GET['insert_slide'])){
                    
                    include("insert_slide.php");
                    
                }
                if(isset($_GET['view_slides'])){
                    
                    include("view_slides.php");
                    
                }
                if(isset($_GET['delete_slide'])){
                    
                    include("delete_slide.php");
                    
                }
                if(isset($_GET['edit_slide'])){
                    
                    include("edit_slide.php");
                    
                }
                if(isset($_GET['edit_service'])){
                    
                    include("edit_service.php");
                    
                }
                if(isset($_GET['inventory'])){
                    
                    include("inventory.php");
                    
                }
                if(isset($_GET['edit_inventory'])){
                    
                    include("edit_inventory.php");
                    
                }
                
                if(isset($_GET['view_customers'])){
                    
                    include("view_customers.php");
                    
                }
                if(isset($_GET['delete_customer'])){
                    
                    include("delete_customer.php");
                    
                }
                if(isset($_GET['view_orders'])){
                    
                    include("view_orders.php");
                    
                }
                if(isset($_GET['delete_order'])){
                    
                    include("delete_order.php");
                    
                }
                if(isset($_GET['view_payments'])){
                    
                    include("view_payments.php");
                    
                }
                if(isset($_GET['delete_payment'])){
                    
                    include("delete_payment.php");
                    
                }
                if(isset($_GET['view_users'])){
                    
                    include("view_users.php");
                    
                }
                if(isset($_GET['delete_user'])){
                    
                    include("delete_user.php");
                    
                }
                if(isset($_GET['delete_service'])){
                    
                    include("delete_service.php");
                    
                }
                if(isset($_GET['delete_quotation'])){
                    
                    include("delete_quotation.php");
                    
                }
                if(isset($_GET['insert_user'])){
                    
                    include("insert_user.php");
                    
                }
                if(isset($_GET['user_profile'])){
                    
                    include("user_profile.php");
                    
                }
                if(isset($_GET['confirm'])){
                    
                    include("confirm_paid.php");
                    
                }
                if(isset($_GET['reports'])){
                    
                    include("reports.php");
                    
                }
                if(isset($_GET['insert_service'])){
                    
                    include("insert_service.php");
                    
                }
                if(isset($_GET['view_services'])){
                    
                    include("view_services.php");
                    
                }
                if(isset($_GET['quotation_sent'])){
                    
                    include("quotation_sent.php");
                    
                }
                if(isset($_GET['insert_rider'])){
                    
                    include("insert_rider.php");
                    
                }
                if(isset($_GET['view_riders'])){
                    
                    include("view_riders.php");
                    
                }
                if(isset($_GET['edit_rider'])){
                    
                    include("edit_rider.php");
                    
                }
                if(isset($_GET['delete_rider'])){
                    
                    include("delete_rider.php");
                    
                }
                if(isset($_GET['insert_supplier'])){
                    
                    include("insert_supplier.php");
                    
                }
                if(isset($_GET['view_suppliers'])){
                    
                    include("view_suppliers.php");
                    
                }
                if(isset($_GET['edit_supplier'])){
                    
                    include("edit_supplier.php");
                    
                }
                if(isset($_GET['delete_supplier'])){
                    
                    include("delete_supplier.php");
                    
                }
                if(isset($_GET['sales_report'])){
                    
                    include("sales_report.php");
                    
                }
                
                
                if(isset($_GET['mostsolditem'])){
                    
                    include("mostsolditem.php");
                    
                }
                if(isset($_GET['gcash_order'])){
                    
                    include("gcash_order.php");
                    
                }
                if(isset($_GET['gcash_review'])){
                    
                    include("gcash_review.php");
                    
                }
                if(isset($_GET['gcash_cancel'])){
                    
                    include("gcash_cancel.php");
                    
                }
                if(isset($_GET['gcash_cancelled'])){
                    
                    include("gcash_cancelled_orders.php");
                    
                }
                if(isset($_GET['update_status'])){
                    
                    include("update_status.php");
                    
                }
                if(isset($_GET['customer_cancelled'])){
                    
                    include("customer_cancelled_orders.php");
                    
                }
                if(isset($_GET['return_item'])){
                    
                    include("return_item.php");
                    
                }
                if(isset($_GET['return_review'])){
                    
                    include("return_review.php");
                    
                }
                if(isset($_GET['refund_payment'])){
                    
                    include("refund_payment.php");
                    
                }
                if(isset($_GET['refund_payment_review'])){
                    
                    include("refund_payment_review.php");
                    
                }
                if(isset($_GET['daily_sales_report'])){
                    
                    include("daily_sales_report.php");
                    
                }
                if(isset($_GET['weekly_sales_report'])){
                    
                    include("weekly_sales_report.php");
                    
                }
                if(isset($_GET['monthly_sales_report'])){
                    
                    include("monthly_sales_report.php");
                    
                }
                if(isset($_GET['yearly_sales_report'])){
                    
                    include("yearly_sales_report.php");
                    
                }
                if(isset($_GET['inventory_report'])){
                    
                    include("inventory_report.php");
                    
                }
                if(isset($_GET['daily_inventory_report'])){
                    
                    include("daily_inventory_report.php");
                    
                }
                if(isset($_GET['weekly_inventory_report'])){
                    
                    include("weekly_inventory_report.php");
                    
                }
                if(isset($_GET['monthly_inventory_report'])){
                    
                    include("monthly_inventory_report.php");
                    
                }
                if(isset($_GET['yearly_inventory_report'])){
                    
                    include("yearly_inventory_report.php");
                    
                }
                if(isset($_GET['other_reports'])){
                    
                    include("other_reports.php");
                    
                }
                if(isset($_GET['return_approval'])){
                    
                    include("return_itemservice_choices.php");
                    
                }
                if(isset($_GET['return_item_approval'])){
                    
                    include("return_item_approval_form.php");
                    
                }
                if(isset($_GET['return_service_approval'])){
                    
                    include("return_service_approval_form.php");
                    
                }
                if(isset($_GET['quotation_settled'])){
                    
                    include("quotation_settled.php");
                    
                }
                if(isset($_GET['settled_services'])){
                    
                    include("settled_services.php");
                    
                }
                if(isset($_GET['return_item_records'])){
                    
                    include("return_item_records.php");
                    
                }
                if(isset($_GET['payment_method_reports'])){
                    
                    include("payment_method_report.php");
                    
                }
                if(isset($_GET['return_item_reports'])){
                    
                    include("return_item_reports.php");
                    
                }
                if(isset($_GET['daily_return_item_reports'])){
                    
                    include("daily_return_item_reports.php");
                    
                }
                if(isset($_GET['weekly_return_item_reports'])){
                    
                    include("weekly_return_item_reports.php");
                    
                }
                if(isset($_GET['monthly_return_item_reports'])){
                    
                    include("monthly_return_item_reports.php");
                    
                }
                if(isset($_GET['yearly_return_item_reports'])){
                    
                    include("yearly_return_item_reports.php");
                    
                }
                if(isset($_GET['cancelled_order_reports'])){
                    
                    include("cancelled_order_reports.php");
                    
                }
                if(isset($_GET['order_details'])){
                    
                    include("order_details.php");
                    
                }
                if(isset($_GET['ondelivery_orders'])){
                    
                    include("ondelivery_orders.php");
                    
                }
                if(isset($_GET['delivery_rider_report'])){
                    
                    include("delivery_rider_report.php");
                    
                }
                if(isset($_GET['daily_rider_report'])){
                    
                    include("daily_rider_report.php");
                    
                }
                if(isset($_GET['weekly_rider_report'])){
                    
                    include("weekly_rider_report.php");
                    
                }
                if(isset($_GET['monthly_rider_report'])){
                    
                    include("monthly_rider_report.php");
                    
                }
                if(isset($_GET['yearly_rider_report'])){
                    
                    include("yearly_rider_report.php");
                    
                }
                if(isset($_GET['daily_rider_order_details'])){
                    
                    include("daily_rider_order_details.php");
                    
                }
                if(isset($_GET['weekly_rider_order_details'])){
                    
                    include("weekly_rider_order_details.php");
                    
                }
                if(isset($_GET['monthly_rider_order_details'])){
                    
                    include("monthly_rider_order_details.php");
                    
                }
                if(isset($_GET['yearly_rider_order_details'])){
                    
                    include("yearly_rider_order_details.php");
                    
                }
                if(isset($_GET['item_reduced'])){
                    
                    include("item_reduced_reports.php");
                    
                }
                if(isset($_GET['daily_item_reduced_report'])){
                    
                    include("daily_item_reduced_report.php");
                    
                }
                if(isset($_GET['weekly_item_reduced_report'])){
                    
                    include("weekly_item_reduced_report.php");
                    
                }
                if(isset($_GET['monthly_item_reduced_report'])){
                    
                    include("monthly_item_reduced_report.php");
                    
                }
                if(isset($_GET['yearly_item_reduced_report'])){
                    
                    include("yearly_item_reduced_report.php");
                    
                }
                if(isset($_GET['order_reports'])){
                    
                    include("order_reports.php");
                    
                }
                if(isset($_GET['daily_order_reports'])){
                    
                    include("daily_order_reports.php");
                    
                }
                if(isset($_GET['weekly_order_reports'])){
                    
                    include("weekly_order_reports.php");
                    
                }
                if(isset($_GET['monthly_order_reports'])){
                    
                    include("monthly_order_reports.php");
                    
                }
                if(isset($_GET['yearly_order_reports'])){
                    
                    include("yearly_order_reports.php");
                    
                }
                if(isset($_GET['backup_and_restore'])){
                    
                    include("backup_and_restore.php");
                    
                }
                if(isset($_GET['restore'])){
                    
                    include("restore.php");
                    
                }
                if(isset($_GET['range_sales_report'])){
                    
                    include("range_sales_report.php");
                    
                }
                if(isset($_GET['range_order_report'])){
                    
                    include("range_order_report.php");
                    
                }
                if(isset($_GET['range_return_report'])){
                    
                    include("range_return_report.php");
                    
                }
                if(isset($_GET['range_rider_report'])){
                    
                    include("range_rider_report.php");
                    
                }
                if(isset($_GET['delivery_fee_list'])){
                    
                    include("delivery_fee_list.php");
                    
                }
                if(isset($_GET['delivery_fee_update'])){
                    
                    include("delivery_fee_update.php");
                    
                }
                if(isset($_GET['critical_inventory_report'])){
                    
                    include("critical_inventory_report.php");
                    
                }
                if(isset($_GET['insert_materials'])){
                    
                    include("insert_materials.php");
                    
                }
                if(isset($_GET['view_materials'])){
                    
                    include("view_materials.php");
                    
                }
                ?>
                
            </div>    <!--container-fluid end-->
        </div>    <!--page-wrapper end-->
    </div>    <!--wrapper end-->
    
    
    
    

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>


<?php 

}

?>
























