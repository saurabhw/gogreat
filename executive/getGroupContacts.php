<?php
    session_start();
    require_once("../includes/connection.inc.php");
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the sales coordinators
     $query = "Select * FROM orgCustomers  WHERE fundGroupID='$vp' and repID='$id' ORDER BY last";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<tr>
				
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Relationship</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>';
     while($row = mysqli_fetch_assoc($result))
     {
       //echo '<tr><td>'.$row[first].'</td><td>'.$row[last].'</td><td></td><td>'.$row[workPhone].'</td><td></td><td>'.$row[email].'</td><td></td><td>'.$row[relationship].'</td><td>';
       echo'<tr class="odd"><td>'.$row[FName].'</td><td>'.$row[LName].'</td><td>'.$row[homePhone].'</td><td>'.$row[email].'</td><td>'.$row[role].'</td><td>
                                        <a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<!--<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>-->
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a></td></tr>';
     }
   
     exit;
   }

?>