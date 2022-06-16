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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Rider
                
            </li>    <!--li end-->
        </ol>    <!--breadcrumb end-->
    </div>    <!--col-lg-12 end-->
</div>    <!--row end-->

<div class="row">    <!--row start-->
    <div class="col-lg-12">    <!--col-lg-12 start-->
        <div class="panel panel-defaults">    <!--pane panel-defaults start-->
            <div class="panel-heading">    <!--panel-heading start-->
                <h3 class="panel-title">    <!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> View Rider
                    
                </h3>    <!--panel-title end-->
            </div>    <!--panel-heading end-->
            
            <br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Riders.." title="Type in a name"></center>
            <div class="panel-body">    <!--panel-body start-->
                <div class="table-responsive">    <!--table-responsive start-->
                   <p><button onclick="sortTable()">Sort Alphabetically</button></p>
                    <table class="table table-striped table-bordered table-hover" id="myTable">    <!--table table-striped table-bordered table-hover start-->
                        
                        <thead>    <!--thead start-->
                            <tr>    <!--tr start-->
                                <th> No: </th>
                                <th> Rider Name: </th>
                                <th> Rider Image: </th>
                                <th> Rider E-mail: </th>
                                <th> Rider Contact: </th>
                                <th> Edit: </th>
                            </tr>    <!--tr end-->
                        </thead>    <!--thead end-->
                        
                        <tbody>    <!--tbody start-->
                            
                            <?php 
                                
                                $i=0;
         
                                $get_riders = "select * from riders";
         
                                $run_riders = mysqli_query($con,$get_riders);
         
                                while($row_riders=mysqli_fetch_array($run_riders)){
                                    
                                    $rider_id = $row_riders['rider_id'];
                                    
                                    $rider_name = $row_riders['rider_name'];
                                    
                                    $rider_img = $row_riders['rider_image'];
                                    
                                    $rider_email = $row_riders['rider_email'];
                                    
                                    $rider_contact = $row_riders['rider_contact'];
                                    
                                    $i++;
                                    
                                
                            
                            ?>
                            
                            <tr>    <!--tr start-->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $rider_name; ?> </td>
                                <td> <img src="../delivery_riders/rider_images/<?php echo $rider_img; ?>" width="60" height="60"> </td>
                                <td> <?php echo $rider_email; ?> </td>
                                <td> <?php echo $rider_contact; ?> </td>
                                <td> 
                                    <a href="index.php?edit_rider=<?php echo $rider_id; ?>">
                                    
                                        <i class="fa fa-pencil"></i> Edit
                                    
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



<script>
function delete_rider() {
  var txt;
  var r = confirm("Press a button!\nEither OK or Cancel.");
  if (r == true) {
    window.open('index.php?delete_rider=<?php echo $rider_id; ?>','_self')
  } else {
    window.open('index.php?view_riders','_self')
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


























<?php 

        }

?>