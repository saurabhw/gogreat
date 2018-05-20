<?php
   session_start();
   ob_start();
   include '../includes/functions.php';

   if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "EX")
    {
            header('Location: ../index.php');
            exit;
    }
   include "../includes/connection.inc.php";
   include "../includes/connection.inc2.php";
   //include('../samplewebsites/imageFunctions.inc.php');
   $id = $_SESSION['userId'];
   //$link = connectTo();
   $link2 = connectTo2();
   
?>
 <body>

<div id="container">
      <?php include 'header.inc.php' ; ?>
    
      <?php include 'sidenav.php' ; ?>

      <div id="content">
      <br>
      <!--<div class="col-lg-4">-->
      <h3>View Suppliers</h3>
      
      <table class="table table-bordered">
        <th>Supplier Name</th>
    	<th>Email</th>
    	<th>Supplier Code</th>
    	<th>Phone</th>
    	<th>Address</th>
    	<th>City</th>
    	<th>State</th>
    	<th>Zip Code</th>
    	<th>Password</th>
    	<th colspan="2">Edit</th>
      <?php
        $query = "SELECT * FROM users";
    	$result = mysqli_query($link2, $query)or die("MYSQL ERROR query 2: ".mysqli_error($link));
    	while($row = mysqli_fetch_assoc($result))
    	{
    	   echo "<tr>
    	    <td>".$row[userName]."</td>
    	    <td>".$row[userEmail]."</td>
    	    <td>".$row[supplyCode]."</td>
    	    <td>".$row[phone]."</td>
    	    <td>".$row[address]."</td>
    	    <td>".$row[city]."</td>
    	    <td>".$row[state]."</td>
    	    <td>".$row[zip]."</td>
    	    <td>".$row[rawPass]."</td>
    	    <td>";
    	    echo'
    	    <button type="button" name="edit" value="Edit" id="'.$row[userId].'" class="btn btn-info  btn-xs view_data" /><img src="../images/edit2.png" /></button></td><td>
    	    <button type="button" name="edit" value="Edit" id="'.$row[userId].'" class="btn btn-info" /><img src="../images/3trash.png" /></button>
    	    </td></tr>';
    	}
      ?>
      </table>
      <input type="button" class="btn btn-info" value="Add Supplier" onclick="location.href = 'addSupplier.php';">
     <br>
     <br>
     <br>
      <div>
        <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss"modal">&times;</button>
        <h4 class="modal-title">Edit Details</h4>
        <div class="modal-body" id="edit_detail"></div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        </div>
     </div>
     
      </div><!--content-->
      <?php include 'footer.php' ; ?>
      </div><!--container-->
      </body>
      </html>