<?php
   
session_start(); // session start
ob_start();
ini_set('display_errors', '0'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();
    $id = $_SESSION['userId'];
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
      //get info for selected rep
      $queryR = "SELECT * FROM user_info WHERE userInfoId = '$gp'";
      $resultR = mysqli_query($link, $queryR)or die("No rep query.".mysqli_error($link));
      $repRow = mysqli_fetch_assoc($resultR);
      $repName = $repRow['FName'];
      $repLast = $repRow['LName'];
      
     //get reps
     if($gp == 24503)
     {
        $query = "SELECT * FROM distributors WHERE vpID = '$id' AND setupID = 24503 AND role = 'RP'";
        $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
      
     if(mysqli_num_rows($result) < 1)
     { 
        //echo "Representatives under GreatMoods";
           echo'<br /><table class="table table-bordered table-striped">
           <thead>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Phone</th>
		<th>Role</th>
		<th>YTD Gross Sales</th>
		<th>Actions</th>
		</tr></thead>';
       //echo '<p>No Representatives Added</p>';
     }

     else
     {          
               
       //echo '<option value="0">Select Representative</option>';
         while($row = mysqli_fetch_assoc($result))
         {
    
           $query2 = "SELECT * FROM distributors WHERE setupID = '$gp' AND role = 'RP'";
           $result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
           echo '<br />';
           echo "Representatives under GreatMoods";
           echo'<br /><table class="table table-bordered table-striped">
           <thead>
		<tr>
	
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Phone</th>
		<th>Role</th>
		<th>YTD Gross Sales</th>
		<th>Actions</th>
		</tr></thead>';
           while($row2 = mysqli_fetch_assoc($result2))
           {
                $sales = getRepTotal($row2[loginid]);
		echo '<tr><td>'.$row2['FName'].' </td><td>'.$row2['LName'].'</td><td>'.$row2['email'].'</td><td>'.$row2['workPhone'].'</td><td>'.$row2[role].'</td><td>$'.$sales.'</td><td>
		<a href="editRep.php?coord='.$row2['loginid'].'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account"/></a>
		
	          <a href="#"><input class="redbutton" type="button" value="View Reports" title="View Reports"/></a>
		</td></tr>';
           }
         }
     }
   }
     else
     {
       $query = "SELECT * FROM distributors WHERE vpID = '$id' AND setupID  = '$gp' AND role = 'RP'";
     
     $result5 = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
      
     if(mysqli_num_rows($result5) < 1)
     {
       echo '<br>No representatives added under '.$repName.' '.$repLast;
     }

     else
     {         
                echo "<br>Representatives under ".$repName.' '.$repLast;
                echo'<table class="table table-bordered table-striped">
                <thead>
		<tr>
		<!--<th>Company Name</th>-->
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Phone</th>
		<th>Role</th>
		<th>Actions</th>
		</tr></thead>';
       //echo '<option value="0">Select Representative</option>';
         while($row = mysqli_fetch_assoc($result5))
         {
           echo '<tr><td>'.$row['FName'].' </td><td>'.$row['LName'].'</td><td>'.$row['email'].'</td><td>'.$row['workPhone'].'</td><td>'.$row['role'].'</td><td>
          <a href="editRep.php?rep='.$row['loginid'].'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account"/></a> 
          <a href="fundAccounts.php?page=1&rep='.$row['loginid'].'"><input class="redbutton" type="button" value="View Accounts" title="View Accounts" value="View Accounts"/></a>
                  
	          <a href="#"><input class="redbutton" type="button" value="View Reports" title="View Reports"/></a>
           </td></tr>';
         /*  echo '</table>';
           $query2 = "SELECT * FROM distributors WHERE setupID = '$gp' AND role = 'RP'";
           $result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
           echo "Representatives under ".$row['FName']." ".$row['LName'];
           echo'<br /><table>
		<tr>
		
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Phone</th>
		<th>Role</th>
		<th>YTD Gross Sales</th>
		<th>Actions</th>
		</tr>';*/
           while($row2 = mysqli_fetch_assoc($result2))
           {
                $sales = getRepTotal($row2['loginid']);
		echo '<tr><td>'.$row2['FName'].' </td><td>'.$row2['LName'].'</td><td>'.$row2['email'].'</td><td>'.$row2['workPhone'].'</td><td>'.$row2['role'].'</td><td>$'.$sales.'</td><td>
		  <a href="editRep.php?rep='.$row2['loginid'].'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account"/></a>
		  <a href="fundAccounts.php?rep='.$row2['loginid'].'"><input class="redbutton" type="button" value="View Fundraiser Accounts" title="View Accounts"/>View Acounts</a>
	          <a href="#"><input class="redbutton" type="button" value="View Reports" title="View Reports"/></a>
		</td></tr>';
           }
           
         }
     }
     }
     exit;
   }
?>