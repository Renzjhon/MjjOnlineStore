<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }
    else{
?>



<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Inventory
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Inventory
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end--> <br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for inventory.." title="Type in a name"></center>
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
                   
                   
                    <table class="table table-hover table-striped table-bordered" id="myTable">    <!--table table-hover table-striped table-bordered start-->
                        
                        <thead style="border: 2px solid #000000;">    <!--thead start-->
                            <tr >    <!--tr start-->
                                <th> Product Id: </th>
                                <th> Product Name: </th>
                                <th> Product Category: </th>
                                <th> Product Image: </th>
                                <th> Remaining Stock: </th>
                                <th> Inventory Level: </th>
                                <th> Latest Stock In date: </th>
                                <th> Edit: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody >    <!--tbody start-->
                            
                            <?php 
                            
                                $i=0;
        
                                $get_inventory = "select * from inventory";
                            
                                $run_inventory = mysqli_query($con,$get_inventory);
        
                                while($row_inventory=mysqli_fetch_array($run_inventory)){
                                    
                                    $product_id = $row_inventory['product_id'];
                                    
                                $get_products = "select * from products where product_id = '$product_id'";
                            
                                $run_products = mysqli_query($con,$get_products);
        
                                $row_products = mysqli_fetch_array($run_products);
                                    
                                    $category_id = $row_products['p_cat_id'];
                                    
                                    $product_title = $row_inventory['product_title'];
                                    
                                    $product_img = $row_inventory['product_img'];
                                    
                                    $product_qty = $row_inventory['qty_stock'];
                                    
                                    $critical_level = $row_inventory['critical_level'];
                                    
                                    $stock_in_date = $row_inventory['stock_in_date'];
                                    
                                    $low_level = $critical_level * 1.5;
                                    
                                    $i++;
                                    $get_category = "select * from product_categories where p_cat_id = '$category_id'";
                            
                                $run_category = mysqli_query($con,$get_category);
        
                                $row_category=mysqli_fetch_array($run_category);
                                    
                                    $category = $row_category['p_cat_title'];
                                    
                            ?>
                            
                            
                            
                            
                            <tr style="border: 2px solid #000000;">    <!--tr start-->
                                <?php
                                
                                if($product_qty <= $critical_level){
                                ?>    
                                    
                                    <script type='text/javascript'>alert('your product named <?php echo $product_title ?> are in critical level!');</script>
                                    
                                <?php
                                }
                                
                                ?>
                                <td> <?php echo $product_id; ?></td>
                                <td style="text-align:center;vertical-align:middle;font-size: 20px;"> <?php echo $product_title; ?></td>
                                <td> <img src="product_images/<?php echo $product_img; ?>" width="60" height="60"> </td>
                                <td style="text-align:center;vertical-align:middle;font-size: 20px;"> <?php echo $category?></td>
                                <td style="text-align:center;vertical-align:middle;font-size: 20px;"> <?php echo $product_qty; ?></td>
                                <td
                                
                                    <?php 
                                     
                                        if($product_qty <= $critical_level){
                                            
                                            echo"bgcolor=#FF7F7F";
                                            
                                        }
                                        elseif($product_qty <= $low_level){
                                            
                                            echo"bgcolor=#FFFF66";
                                            
                                        }
                                        else{
                                            
                                            echo"bgcolor=#90EE90";
                                        }
                                    
                                    ?>
                                
                                 style="text-align:center;vertical-align:middle;font-size: 20px;"><strong>
                                    <?php 
                                     
                                        if($product_qty <$critical_level){
                                            
                                            echo"Critical Level";
                                            
                                        }
                                        elseif($product_qty <= $low_level){
                                            
                                            echo"Low Level";
                                            
                                        }
                                        else{
                                            
                                            echo"Stable Stock";
                                        }
                                    
                                    ?>
                                
                                </strong></td>
                                <td> <?php echo $stock_in_date; ?></td>
                                <td> 
                                    <a href="index.php?edit_inventory=<?php echo $product_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                
                            </tr>    <!--tr end-->
                            
                            <?php  } ?>
                            
                        </tbody>    <!--tbody end-->
                    </table>    <!--table table-hover table-striped table-bordered end-->
                </div>    <!--table-responsive end-->
            </div>    <!--panel-body end-->
            
        </div>    <!--panel panel-default end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--2nd row end-->





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





<?php } ?>