<?php
    
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the members
     $query = "SELECT * FROM orgMembers WHERE  fund_owner_id='$vp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<tr>
				
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>';
     while($row = mysqli_fetch_assoc($result))
     { 
       //populate table with data
       //echo '<option value="'.$row['loginid'].'">'.$row[Dealer].' '.$row[DealerDir].' '.$row[loginid].'</option>';
       echo'<tr class="odd"><td align="center">'.$row[orgFName].'</td><td>'.$row[orgLName].'</td><td>'.$row[orgEmail].'</td><td>
                                        <a href="#"><input class="redbutton" type="button" value="YTD Earnings" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Website" /></a>
					<!--<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>-->
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a></td></tr>';
     }
   
     exit;
   }

?>