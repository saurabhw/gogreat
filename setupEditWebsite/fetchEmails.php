<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
    
    $member = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {  
      echo "<br />";
   
     
     //get the leaders
     $query2 = "SELECT * FROM orgMembers WHERE fund_owner_id ='$member' AND isLeader = 1 ORDER BY orgFName asc";
     $result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
     
     if(mysqli_num_rows($result2) <= 0)
     { 
       echo '<label>Select Sender</label>
       <select name="leader" id="leader" required>';
       	     $getGroup = "SELECT * FROM Dealers WHERE loginid = '$member'";
       	     $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query 3: ".mysqli_error($link)); 
       	     $g_row = mysqli_fetch_assoc($groupResult);
       	     
       	     echo'
       	     <option value="">Select Group</option>
       	     <option value="'.$g_row['Dealer'].'">'.$g_row['Dealer'].'</option>
       	     </select><br><br>';
       	     echo'
       	     <label><b>Leaders</b></label>
       	     <table class="table table-bordered table-striped">
       	     <thead>
	       		<tr>
	  			<th class="checkbox"></th>
	  			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
	  		</tr></thead>
	       		<tr><td colspan="6">-- No Leaders Added --</td></tr>
       	     </table> <br>';
       	     
     }
     else
     { 
        echo 'Select Sender <select name="leader" id="leader" required>
				<option value="">Select Sender</option>';
        $queryY = "SELECT * FROM orgMembers WHERE fund_owner_id ='$member' AND isLeader = 1 ORDER BY orgLName";
        $resultY = mysqli_query($link, $queryY)or die("MySQL ERROR on query Y: ".mysqli_error($link));
        while($rowY = mysqli_fetch_assoc($resultY))
        {
          echo '
				  <option value="'.$rowY['orgFName'].' '.$rowY['orgLName'].'">'.$rowY['orgFName'].' '.$rowY['orgLName'].'</option>
				  ';
        }
         echo '</select><br /><br />';
        echo'	<label><b>Leaders</b></label>
        	<a href="javascript:setCheckboxes1(1);" class="redbutton">Check All</a>
		<a href="javascript:setCheckboxes1(0);" class="redbutton">Uncheck All</a>
		<a href="javascript:setCheckboxes1(2);" class="redbutton">Invert Selection</a>
        ';
        echo' <table class="table table-bordered table-striped">
        <thead>
          		<tr>
          			<th class="checkbox"></th>
          			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
          		</tr>
          		</thead>
          ';
        while($row2 = mysqli_fetch_assoc($result2)) {
          echo '
          		<tr>
          			<td class="checkbox"><input type="checkbox" class="leaders" name="recipients[]" value="'.$row2['orgEmail'].'" checked></td>
          			<td class="title">'.$row2['Title'].'</td>
          			<td class="fname">'.$row2['orgFName'].'</td>
          			<td class="lname">'.$row2['orgLName'].'</td>
          			<td class="email">'.$row2['orgEmail'].'</td>
          			<td class="phone">'.$row2['orgPhone'].'</td>
          		</tr>
          ';
        }
        echo' </table> <br>';
     }
   
     //get the members
     $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$member' AND isLeader = 0 ORDER BY orgLName";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
      if(mysqli_num_rows($result) <= 0)
      { 
        echo '
        	<label><b>Members</b></label>
        	<table class="table table-bordered table-striped">
        	<thead>
	       		<tr>
	  			<th class="checkbox"></th>
	  			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
	  		</tr></thead>
	  		<tr><td colspan="6">-- No Members Added --</td></tr>
  		</table> <br>';
      }
      else
      {
        echo'	<label><b>Members</b></label>
        	<a href="javascript:setCheckboxes2(1);" class="redbutton">Check All</a>
		<a href="javascript:setCheckboxes2(0);" class="redbutton">Uncheck All</a>
		<a href="javascript:setCheckboxes2(2);" class="redbutton">Invert Selection</a>
        ';
        echo' <table class="table table-bordered table-striped">
        <thead>
          		<tr>
          			<th class="checkbox"></th>
          			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
          		</tr></thead>
          ';
        while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>
          		<td class="checkbox"><input type="checkbox" class="members" name="recipients[]" value="'.$row['orgEmail'].'" checked></td>
          		<td class="title">'.$row['Title'].'</td>
          		<td class="fname">'.$row['orgFName'].'</td>
          		<td class="lname">'.$row['orgLName'].'</td>
          		<td class="email">'.$row['orgEmail'].'</td>
          		<td class="phone">'.$row['orgPhone'].'</td>
          	</tr>
          ';
        }
        echo' </table> <br>';
      }
     
      //get the customers
     $query3 = "SELECT * FROM orgCustomers WHERE fundGroupID ='$member' ORDER BY last";
     $result3 = mysqli_query($link, $query3)or die("MySQL ERROR on query c: ".mysqli_error($link));
     if(mysqli_num_rows($result3) <= 0)
      { 
        echo '	<label><b>Contacts</b></label>
        	<table class="table table-bordered table-striped">
        	<thead>
	       		<tr>
	  			<th class="checkbox"></th>
	  			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
	  		</tr></thead>
	  		<tr><td colspan="6">-- No Contacts Added --</td></tr>
  		</table> ';
      }
     else
     {
        echo'	<label><b>Contacts</b></label>	
        	<a href="javascript:setCheckboxes3(1);" class="redbutton">Check All</a>
		<a href="javascript:setCheckboxes3(0);" class="redbutton">Uncheck All</a>
		<a href="javascript:setCheckboxes3(2);" class="redbutton">Invert Selection</a>
	';
        echo' <table class="table table-bordered table-striped">
        <thead>
          		<tr>
          			<th class="checkbox"></th>
          			<th class="title">Title</th>
	  			<th class="fname">First</th>
	  			<th class="lname">Last</th>
	  			<th class="email">Email</th>
	  			<th class="phone">Phone</th>
          		</tr></thead>
          ';
        while($row3 = mysqli_fetch_assoc($result3)) {
          echo ' <tr>
          		<td class="checkbox"><input type="checkbox" class="contacts" name="recipients[]" value="'.$row3['email'].'" checked></td>
          		<td class="title">'.$row3['title'].'</td>
          		<td class="fname">'.$row3['first'].'</td>
          		<td class="lname">'.$row3['last'].'</td>
          		<td class="email">'.$row3['email'].'</td>
          		<td class="phone">'.$row3['workPhone'].'</td>
          	</tr>
          ';
        }
        echo' </table> ';
     }
    
     exit;
   }

?>