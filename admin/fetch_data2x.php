<?php
    
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the sales coordinators
     $query = "Select * FROM distributors  WHERE setupID='$vp' and role='RP' ORDER BY LName";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<tr>
				
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Role</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>';
     while($row = mysqli_fetch_assoc($result))
     { 
       //populate table with data
       //echo '<option value="'.$row['loginid'].'">'.$row[FName].' '.$row[LName].' '.$row[loginid].'</option>';
       echo'<tr class="odd"><td align="center">'.$row[FName].'</td><td>'.$row[LName].'</td><td>'.$row[homePhone].'</td><td>'.$row[email].'</td><td>'.$row[role].'</td><td>
                                        <!--<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>-->
                                        <form action="editAccount.php" method="post">
                                        <input type="hidden" name="scid" value="'.$row[loginid].'" />
                                        <input type="submit" name="submit" class="redbutton" value="Edit Acctx" />
                                        </form>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a></td></tr>';
     }
   
     exit;
   }

?>