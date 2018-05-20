<?php
      include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $group = $_SESSION['groupid'];
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
   $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='SC'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
   $row = mysqli_fetch_assoc($result1);
  
   $myPic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member | Send Emails</title>
</head>
	
<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	      
      	<div id="content">
		<h1>Send Emails</h1>
		
		<h3>Send Emails to Family, Friends and Business Contacts</h3>

		<form id="sendemail" class="graybackground" method="post" action="email_personalised_form.php">
		<select name="repid" id="repid" onchange="fetch_select(this.value);">
      		<option value="">Select Representaive</option>
      		<?php 
      		$getReps = "SELECT * FROM representatives WHERE setupID='$userID'";
      		$repResult = mysqli_query($link, $getReps);
      		
      		while($repRow = mysqli_fetch_assoc($repResult))
      		{
      		   echo'<option value="'.$repRow[loginid].'">'.$repRow[FName].' '.$repRow[LName].'</value>';
      		}
      		
      		?>
      		
      		</select>
      		
		<select class="" name="new_select" id="new_select" onchange="fetch_select2(this.value);">
			
		</select>
		<select class="" name="new_select2" id="new_select2">

		</select>

		<br><br>
		<label><b>Current Contacts</b></label>	
        	<a href="javascript:setCheckboxes3(1);" class="redbutton">Check All</a>
		<a href="javascript:setCheckboxes3(0);" class="redbutton">Uncheck All</a>
		<a href="javascript:setCheckboxes3(2);" class="redbutton">Invert Selection</a>
		
		<table class="emailcontacts_sc">
		         <tr>
		              <th class="checkbox"></th>
          		      <th class="title">Title</th>
		              <th class="fname">First Name</th>
		              <th class="lname">Last Name</th>
		              <th class="role">Role</th>
		              <th class="email">Email Address</th>
		              <th class="phone">Phone Number</th>
		         </tr>

		        <?php
		        $contact_query = "SELECT * FROM orgCustomers WHERE fundGroupID = '$group'";
		        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
		        if($contact_result){
		           while ($row = mysqli_fetch_assoc($contact_result)){
		              
		              echo '<tr>
		                  <td class="checkbox"><input type="checkbox" class="contacts" name="recipients[]" value="'.$row['orgEmail'].'" checked></td>
          			  <td class="title">'.$row[Title].'</td>
		                  <td class="fname">'.$row['first'].'</td>
		                  <td class="lname">'.$row['last'].'</td>
		                  <td class="role">'.$row['relationship'].'</td>
		                  <td class="email">'.$row['email'].'</td>
		                  <td class="phone">'.$row['workPhone'].'</td>
		                  
		                  </tr>';
		                  
			   }// end while
			   	   
			}// end if
		        ?>

		</table>
    <h5>Send Emails</h5>
    <p>Personalize your email by selecting one or all recipients.<br>Then Select an editable prewritten greeting for the type of email you wish to send, or create your own.</p>
    
    <form id="sendemail" class="graybackground" method="post" action="email_personalised_form2.php">
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
                  
                  <select name="logdropdown" id="logdropdown">
                  	<option value="">Select Contact</option>
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
  	
      	<?php include '../includes/footer.php' ; ?>
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