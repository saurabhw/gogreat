<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       ob_start();

       include '../includes/connection.inc.php';
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       //$group = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$group'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       //$group = $row1['setuppersonid'];
       $groupPic = $row1['group_team_pic'];
       //$memberID = $_GET['group'];

      /*
       

       $rep = $_SESSION['userId'];

       
       
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$group'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $groupPic = $row1['group_team_pic'];
       
       */
   $userID = $_SESSION['userId'];
   $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
   $row = mysqli_fetch_assoc($result1);
  
   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member | Send Emails</title>
</head>
	
<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	      
      	<div id="content">
		<h1>Send Emails</h1>
		
		<h3>Send Emails to Family, Friends and Business Contacts</h3>
		<h5>Current Contacts</h5>
		<form id="sendemail" class="graybackground" method="post" action="email_personalised_form.php">
		<select class="" name="groupid" id="groupid" onChange="fetch_select2(this.value);" >
							<option>Select FR Account</option>
							<?php 
						$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID'";
						$result = mysqli_query($link, $getAccount)
						or die("MySQL ERROR om query 1: ".mysqli_error($link));
						while($row = mysqli_fetch_assoc($result))
						{
						  $dealerName = $row['Dealer'];
						  echo '
						  <option value="'.$row['loginid'].'">'.$dealerName.' '.$row[DealerDir].'</option>
						  ';
					        }
						?>
						</select>
						 <span id="ma"></span>
						<select class="" name="memberid" id="memberid" onChange="fetch_select3(this.value);">
						<option value="0">Select Member</option>

						</select>
    </select>

		
		
		<table id="contacts">
		         <tr>
		              <th><label for="FName">First Name</label></th>
		              <th><label for="LName">Last Name</label></th>
		              <th><label for="role">Role</label></th>
		              <th><label for="email">Email Address</label></th>
		              <th><label for="phone">Phone Number</label></th>
		         </tr>

		        <?php
		        $contact_query = "SELECT * FROM orgCustomers WHERE repID = '$user'";
		        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
		        if($contact_result){
		           while ($row = mysqli_fetch_assoc($contact_result)){
		              
		              echo '<tr>
		                  <td class="fn">'.$row['first'].'</td>
		                  <td class="ln">'.$row['last'].'</td>
		                  <td class="role">'.$row['relationship'].'</td>
		                  <td class="email">'.$row['email'].'</td>
		                  <td class="pph">'.$row['workPhone'].'</td>
		                  
		                  </tr>';
		                  
			   }// end while
			   	   
			}// end if
		        ?>

		</table>
    <h5>Send Emails</h5>
    <p>Personalize your email by selecting one or all recipients.<br>Then Select an editable prewritten greeting for the type of email you wish to send, or create your own.</p>
    
    <form id="sendemail" class="graybackground" method="post" action="email_personalised_form.php">
      <!--    <?php
              if (!$link){
                  die('Could not connect: ' . mysqli_error());
              }
              //$sql="SELECT * FROM orgCustomers WHERE fundMemberID ='$dealerID' AND fundGroupID = '$group'";
              $sql = "SELECT * FROM orgCustomers WHERE fundMemberID = '$memberID'";
              $result = mysqli_query($link, $sql) or die (mysqli_error());
              echo "<select name='logdropdown1' id='logdropdown1'>
                    <option>Select Contact</option>
                    <option value='Everyone'>Everyone</option>
                    ";
              while ($row = mysqli_fetch_array($result))
                  {
                  $customername = $row["first"].' '.$row["last"];
                  $customeremail = $row["email"];
                  echo "<option value='$customeremail'>$customername</option>";
                  }// end while
                  echo "</select>";
                  ?>-->
                  
                <!-- test code for dropdown checkbox function -->
		<div class="dropdown">
			<input type="checkbox" id="checkbox-toggle">
			<label for="checkbox-toggle">Select Contact <i class="fa fa-caret-down"></i></label>
			<ul>
				<li><input type="checkbox" id="">Select All</li>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
				<li><input type="checkbox" id="">Contact 3</li>
				<li><input type="checkbox" id="">Contact 4</li>
			</ul>
		</div>
                <!-- end test code -->
                  
                  <select name="logdropdown[]" id="logdropdown"  multiple>
                  	<option value="Everyone">Everyone</option>
                  	<option value="Everyone">Everyone</option>
                  	<option value="Everyone">Everyone</option>
                  	
                  </select>
                  
                  <script language="javascript" type="text/javascript">
			
			function change_input(strURL)
			{
			  var req;
			  
					// Opera 8.0+, Firefox, Safari
					req = new XMLHttpRequest();
				
			
					//function to be called when state is changed
					req.onreadystatechange = function()
					{
					  //when state is completed i.e 4
					  if (req.readyState == 4)
					  {
							// only if http status is "OK"
							if (req.status == 200)
							{
									document.getElementById('message').value=req.responseText;
							}
							else
							{
									alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
			
						   
					  }
					}
					req.open("GET", strURL, true);
					req.send(null);
			  
			}
			
			</script>
          <select name="logdropdown1" id="logdropdown1"  onchange="change_input('efind_ccode.php?logdropdown1='+this.value)">
        <option value="0">Select Type of E-mail</option>
        <option value="Announcement">Fundraiser Announcement</option>
        <option value="Reminder">Fundraiser Reminder</option>
        <option value="FinalEmail">End of Fundraiser</option>
        <option value="Personalized">Personalized E-mail</option>
      </select>
          <br>
          <br>
          <textarea name="message" id="message"rows="10" cols="100"></textarea>
          <br>
          <br>
         
          <input type="hidden" name="memid" id="memid" value=""/>
          <input type="submit" class="redbutton" value="Send Email"/>
        </form>
        <br>
  	</div> <!--end content -->
  	
      	<?php include 'footer.php' ; ?>
    	</div> <!--end container-->
	</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>