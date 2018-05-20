<?php
    
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the groups
     $query = "Select * FROM Dealers  WHERE setuppersonid='$vp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<tr>
				
				<th class="fn" title="GroupName">Organization</th>
				<th class="ln" title="Last Name">Group Type</th>
				<th class="pph" title="address1">Address</th>
				<th class="email" title="Email Address">City</th>
				<th class="role" title="Sales Role">State</th>
				<th class="actions" title="Actions">Zip Code</th>
			</tr>';
     while($row = mysqli_fetch_assoc($result))
     { 
       //populate table with data
       //echo '<option value="'.$row['loginid'].'">'.$row[Dealer].' '.$row[DealerDir].' '.$row[loginid].'</option>';
       echo'<tr class="odd"><td align="center">'.$row[Dealer].'</td><td>'.$row[DealerDir].'</td><td>'.$row[Address1].'</td><td>'.$row[City].'</td><td>'.$row[State].'</td><td>'.$row[Zip].'</td><td>
                                        <a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<!--<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>-->
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a></td></tr>';
     }
   
     exit;
   }

?>