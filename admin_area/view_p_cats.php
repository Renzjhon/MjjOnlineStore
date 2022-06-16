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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Product Category
                
            </li>
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--1st row end-->



<div class="row">    <!--2nd row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-default">    <!--panel panel-default start-->  
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                   
                    <i class="fa fa-tags fa-fw"></i> View Product Categories
                
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
                                <th> Product Category ID </th>
                                <th> Product Category Title </th>
                                <th> Product Category Desc </th>
                                <th> Edit Product Category </th>
                                <th> Delete Product Category </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                            
                                $i=0;
        
                                $get_p_cats = "select * from product_categories";
                            
                                $run_p_cats = mysqli_query($con,$get_p_cats);
        
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    
                                    $p_cat_desc = $row_p_cats['p_cat_desc'];
                                    
                                    $i++;
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $p_cat_title; ?></td>
                                <td width="300"> <?php echo $p_cat_desc; ?></td>
                                <td> 
                                    <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td> 
                                       <button onclick="delete_pcat()"> <i class="fa fa-trash"></i> Delete</button>
                                       
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