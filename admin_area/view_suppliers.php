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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Product Supplier
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Product Supplier
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            <br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Suppliers.." title="Type in a name"></center>
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                   <p><button onclick="sortTable()">Sort Alphabetically</button></p>
                    <table class="table table-hover table-striped table-bordered" id="myTable">    <!--table table-hover table-striped table-bordered start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Supplier ID </th>
                                <th> Supplier Name </th>
                                <th> Supplier Address </th>
                                <th> Supplier Contact Number </th>
                                <th> Supplier Email </th>
                                <th> Edit Supplier</th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                            
                                $i=0;
        
                                $get_supplier = "select * from suppliers";
                            
                                $run_supplier = mysqli_query($con,$get_supplier);
        
                                while($row_supplier=mysqli_fetch_array($run_supplier)){
                                    
                                    $supplier_id = $row_supplier['supplier_ID'];
                                    
                                    $supplier_name = $row_supplier['supplier_name'];
                                    
                                    $supplier_address = $row_supplier['address'];
                                    
                                    $supplier_contact = $row_supplier['contact_number'];
                                    
                                    $supplier_email = $row_supplier['email'];
                                    
                                    $i++;
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $supplier_name; ?></td>
                                <td> <?php echo $supplier_address; ?></td>
                                <td> <?php echo $supplier_contact; ?></td>
                                <td> <?php echo $supplier_email; ?></td>
                                
                                <td> 
                                    <a href="index.php?edit_supplier=<?php echo $supplier_id; ?>">
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

<?php ?>

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
function delete_supplier() {
  var txt;
  var r = confirm("Press a button!\nEither OK or Cancel.");
  if (r == true) {
    window.open('index.php?delete_supplier=<?php echo $supplier_id; ?>','_self')
  } else {
    window.open('index.php?view_suppliers','_self')
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