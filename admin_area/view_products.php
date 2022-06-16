<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>


<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li class="active">    <!--li start-->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Products
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Products
                    
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
    <center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a name"></center>
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                   
                    <p><button onclick="sortTable()">Sort Alphabetically</button></p>
                    
                    <label>Sort by Category:</label>
                    <select name="" id="category" onchange="category()">
                        <option value="All" selected disabled>All</option>
                            <?php  
                                    
                                    $get_p_cats = "select * from product_categories";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo "
                                        
                                        <option value='$p_cat_title'> $p_cat_title </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                    </select>
                   
                      
                
                    <table class="table table-striped table-bordered table-hover " id="myTable" >    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Product ID: </th>
                                <th> Product Name: </th>
                                <th> Product Category: </th>
                                <th> Product Image: </th>
                                <th> Product Supplier: </th>
                                <th> Product Selling Price: </th>
                                <th> Product Sold: </th>
                                <th> Date Added: </th>
<!--                                <th> Product Delete: </th>-->
                                <th> Product Edit: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                
                                $i=0;
         
                                $get_pro = "select * from products";
         
                                $run_pro = mysqli_query($con,$get_pro);
         
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $p_id = $row_pro['p_cat_id'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    $supplier = $row_pro['supplier'];
                                    
                                   
                                    
                                    $pro_date = $row_pro['date'];
                                    $pro_date = date('F j, Y', strtotime($pro_date));
                                    
                                    $i++;
                                    
                                    
                                    $get_cat = "select * from product_categories where p_cat_id = '$p_id'";
         
                                    $run_cat = mysqli_query($con,$get_cat);
         
                                    $row_cat=mysqli_fetch_array($run_cat);
                                    
                                    $cat_title = $row_cat['p_cat_title'];
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"> </td>
                                <td> <?php echo $supplier; ?> </td>
                                <td> ₱ <?php echo $pro_price; ?> </td>
                                
                                <td> <?php
                                    
                                        $get_sold = "select * from pending_orders where product_id='$pro_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                    
                                        $count = mysqli_num_rows($run_sold);
                                    
                                        echo $count;
                                    
                                     ?> 
                                </td>
                                <td> <?php echo $pro_date; ?> </td>
<!--
                                <td> 
                                    <a href="index.php?delete_product=">
                                    
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                    </a> 
                                </td>
-->
                                <td> 
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                    
                                        <i class="fa fa-pencil"></i> edit
                                    
                                    </a> 
                                </td> 
                            </tr>    <!--tr end-->
                            
                            <?php } ?>
                            
                        </tbody>    <!--tbody end-->
                        
                    </table>    <!--table table-striped table-bordered table-hover end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--pane panel-defaults end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->


<!-----------script for category----------------->


<script>
    function category() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("category");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      }
        
        else {
        tr[i].style.display = "none";
      }
    }  
      
  }
}
</script>







<!-------------script for search --------------------->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>






















<?php 

        }

?>