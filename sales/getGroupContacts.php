<?php
    
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
   
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the sales coordinators
     $query = "Select * FROM orgCustomers  WHERE fundGroupID='$vp' and repID='$id' ORDER BY last";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
    echo'<thead><tr>
				<th class="fn" title="title">Title</th>
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Relationship</th>
				<th class="actions" title="Actions">Actions</th>
			</tr></thead>';
     while($row = mysqli_fetch_assoc($result))
     {
       //echo '<option value="'.$row['customerID'].'">'.$row[first].' '.$row[last].' '.$row[loginid].'</option>';
       echo'<tr class="odd"><td>'.$row['title'].'</td><td>'.$row['first'].'</td><td>'.$row['last'].'</td><td>'.$row['workPhone'].'</td><td>'.$row['email'].'</td><td>'.$row['relationship'].'</td><td>
                                        <a href="editContact.php?mi='.$vp.'&id='.$row['customerID'].'"><input class="redbutton" type="button" value="Edit Contact" /></a>
					<a href="deleteCustomer.php?cust='.$row['customerID'].'"><input class="redbutton" type="button" value="Delete Contact" /></a>
					<a href="emails2.php"><input class="redbutton" type="button" value="Send Email" /></a>
	</td></tr>';
     }
   
     exit;
   }

?>