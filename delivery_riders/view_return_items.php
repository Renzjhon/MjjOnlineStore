<?php

if(!isset($_SESSION['rider_email'])){

        echo "<script>window.open('rider_login.php','_self')</script>";

    }
    else{

?>

<div class="row">    <!--1st row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <ol class="breadcrumb">    <!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Return Items
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Return Items
                
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            <br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search product category.." title="Type in a name"></center>
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                    <p><button onclick="sortTable()">Sort Alphabetically</button></p>
                    <table class="table table-hover table-striped table-bordered" id="myTable">    <!--table table-hover table-striped table-bordered start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> Return Item ID </th>
                                <th> Product Name </th>
                                <th> Product Quantity </th>
                                <th> Issue </th>
                                
                                <th> Date </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                            
                                $i=0;
        
                                $get_p_cats = "select * from return_items";
                            
                                $run_p_cats = mysqli_query($con,$get_p_cats);
        
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $id = $row_p_cats['return_item_id'];
                                    
                                    $name = $row_p_cats['product_name'];
                                    
                                    $qty = $row_p_cats['qty'];
                                    
                                    $issue = $row_p_cats['issue'];
                                    
                                    $date = $row_p_cats['date'];
                                    $date = date('F j, Y', strtotime($date));
                                    
                                    $i++;
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $id; ?></td>
                                <td> <?php echo $name; ?></td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $issue; ?></td>
                                <td> <?php echo $date; ?></td>
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
function delete_pcat() {
  var txt;
  var r = confirm("Press a button!\nEither OK or Cancel.\nThe button you pressed will be displayed in the result window.");
  if (r == true) {
    window.open('index.php?delete_p_cat=<?php echo $p_cat_id; ?>','_self')
  } else {
    window.open('index.php?view_p_cats','_self')
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