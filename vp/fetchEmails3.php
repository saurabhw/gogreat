<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
   
    $member = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {  
      echo "<br />";
     //get the members of password
     $query2 = "SELECT * FROM orgMembers WHERE fund_owner_id ='$member' AND passSent = 0 ORDER BY orgLName";
     $result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
     
     if(mysqli_num_rows($result2) <= 0)
     { 
       echo ' <p>All Current Members Have Been Sent Their Password.</p>
       	      <br>';
     }
     else
     { 
       
       
        echo' <table class="emailcontacts">
          		<tr>
          			
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
          		</tr>
          ';
        while($row2 = mysqli_fetch_assoc($result2)) {
          echo '
          	<tr>
          			<td class="fname">'.$row2['orgFName'].'</td>
          			<td class="lname">'.$row2['orgLName'].'</td>
          			<td class="email"><input type="text" name="recipients[]" value="'.$row2[orgEmail].'" readonly="readonly"</td>
          		</tr>
          ';
        }
        echo' </table> <br>';
     }
   
     
     exit;
   }

?>