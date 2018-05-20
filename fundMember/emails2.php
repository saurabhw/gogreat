<?php
      session_start();
      if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }

       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
       $userName = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
?>
<!DOCTYPE html>
<head>
	<title>Send Emails | GreatMoods Member</title>
</head>
	
<body onload="checkCookies()">
<div id="container">
	<?php include 'header(1).php' ; ?>
      <?php include 'memberSidebar_new.php' ; ?>
	      
      	<div class="container" id="fundmemberHome">
      	    <div class="row-fluid row-flex">
      	
	
		<div class="col-md-12 col-lg-11 col-lg-push-1">
		<h3>Send Emails to Family, Friends and Business Contacts</h3>
		<span id="emessage" style="color: green; font-size: 20px;">
    </span>
		<p>Personalize your email by selecting one or all recipients.<br>Then Select an editable prewritten greeting for the type of email you wish to send, or create your own.</p>
		<form id="sendemail" class="graybackground" method="get" action="newEmail.php">
                 <label><b>Current Contacts</b></label><br><br> 
                 <a href="javascript:setCheckboxes3(1);" class="redbutton">Check All</a>
		 <a href="javascript:setCheckboxes3(0);" class="redbutton">Uncheck All</a>
		 <a href="javascript:setCheckboxes3(2);" class="redbutton">Invert Selection</a>
		<br>
		<br>
		<table class="table table-bordered table-striped">
		         <thead><tr> 
		         	<th class="checkbox">Send To</th>
		                <th><label class="title">Title</label></th>
		                <th><label class="fname">First Name</label></th>
		                <th><label class="lname">Last Name</label></th>
		                <!--<th><label class="cname">Company Name</label></th>-->
		                <th><label class="role">Relation</label></th>
		                <th><label class="email">Email Address</label></th>
		                <th><label class="phone">Phone Number</label></th>
		         </tr></thead>
                      <?php
		        $contact_query = "SELECT * FROM orgCustomers WHERE fundMemberID = '$dealerID'";
		        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
		        if($contact_result){
		           while ($row = mysqli_fetch_assoc($contact_result)){
		              
		              echo '<tr>
		              	  <td><input type="checkbox" class="contacts" name="recipients[]" value="'.$row['email'].'" checked></td>
		                  <td class="title">'.$row['title'].'</td>
		                  <td class="fname">'.$row['first'].'</td>
		                  <td class="lname">'.$row['last'].'</td>
		                 <!-- <td class="cname">'.$row['companyname'].'</td>-->
		                  <td class="role">'.$row['relationship'].'</td>
		                  <td class="email">'.$row['email'].'</td>
		                  <td class="phone">'.$row['workPhone'].'</td>
		                  </tr>';        
			   }// end while 	   
			}// end if
		        ?>
		</table>
 
                  
                  <script language="javascript">
			
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
			<br />
          <select name="logdropdown1" id="logdropdown1"  onchange="change_input('efind_ccode.php?logdropdown1='+this.value)" required>
	        <option value="">Select Type of E-mail</option>
	        <option value="Announcement">Fundraiser Announcement</option>
	        <option value="Reminder">Fundraiser Reminder</option>
	        <option value="FinalEmail">End of Fundraiser</option>
	        <option value="Personalized">Personalized E-mail</option>
	        <option value="Monthly Message">Seasonal Message</option>
	      </select>
          <br>
          <br>
          <textarea name="message" id="message" rows="10" cols="100"></textarea>
          <br>
          <br>
         
          <input type="hidden" name="memid" id="memid" value=""/>
          <input type="submit" class="redbutton" name="submit" value="Send Email"/>
        </form>
        <br>
        </div><!--end form area-->
        </div>
  	</div> <!--end container -->
  	
      	<?php include 'footer(1).php' ; ?>
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