<?php
session_start();
if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member' || $_SESSION['role'] == 'fundOwner') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
$link = connectTo();

$table3 = "Dealers";
$table4 = "orgContacts";
$userID = $_SESSION['userId'];
$userEmail = $_SESSION['email'];
$home = $_SESSION['home'];

// Remove contact from fundraiser
if(isset($_POST['delete_id'])){
    
   $message = '';
   $c_id = $_POST['delete_id'];
   $removeSQL = "DELETE FROM $table4 WHERE orgContactID = '$c_id'";
   $remove_result = mysqli_query($link, $removeSQL);
   if($remove_result){
       $message .= "Contact has been removed. <br />";
   }
   
}// end Remove contact from fundraiser



if(isset($_POST['submit'])){
    $message = '';
    $groupid = $_POST['group'];
    
    if (!$link){
       die('Could not connect: ' . mysql_error());
    }
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $fund = $_POST['fund'];
    
    $x = 0;
    $arraycount=count($email);

    while($arraycount>$x){
        if($lname[$x] != null && $email[$x] != null){
	    $sql = "INSERT INTO orgContacts (Title, orgFName, orgLName, orgEmail, orgPhone, fundraiserID, fund_owner_id, org_contact_created)
	        VALUES('$title[$x]', '$fname[$x]', '$lname[$x]', '$email[$x]', '$phone[$x]','$groupid', '$userID', now())";
	    $insert_result = mysqli_query($link, $sql) or die(mysqli_error($link));
	    if( $insert_result ){
		$message .= $fname[$x].' '.$lname[$x].' is a new contact!<br />';
		
  	    $redirect = "Location:contacts.php?group=$groupid";
  	    header("$redirect");
		
	    } else{
		$message .= "We're sorry, there was a problem saving ".$fname[$x]." ".$lname[$x].".<br />"; 
	  }// end else
        }// end if
        ++$x;
    }// end while 
     $uq = "UPDATE Dealers SET
           userNameSet='1'
           WHERE loginid='$groupid'";
   $uq_result = mysqli_query($link, $uq)or die("MySQL ERROR on update: ".mysqli_error($link));       
	    
}// end if(isset($_POST['submit']))	
$group = $_GET['group'];
// Get fundraiser name
$fund_query = "SELECT * FROM $table3 WHERE loginid = '$group'";
$fund_result = mysqli_query($link, $fund_query) or die(mysqli_error($link));
if($fund_result){
    $row = mysqli_fetch_assoc($fund_result);
    $fund_name = $row['Dealer']." ".$row['DealerDir'];
    $fund = $row['Dealer'];
}        
	
?>

<!DOCTYPE html>
<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
<script type="text/javascript">
function validate(form) {
	var pass1 = form['loginPass'].value;
	var pass2 = form['confirmPass'].value;
	if(pass1 == "" || pass1 == null) {
		alert("please enter a valid password");
		return false;
	}
	if(pass1 != pass2) {
		alert("passwords do not match");
		return false;
	}
	return true;
}
</script>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<body id="contacts">
	<div id="container">
      		<div id="headerMain"> <img id="banner" src="../<?php echo $_SESSION['banner'];?>" width="1024" height="150" alt="banner placeholder" /> 
				<div id="menuWrapper"> </div>
				<div id="login">
					<?php
						if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
							echo '<form id="log" action="../includes/logInUser.php" method="post">';
							echo '<label class="user" id="user">Username: </label>
								<input type="text" name="email" id="user" value="">';
							echo '<label class="user" id="user"> Password: </label>
								<input type="password" name="password" id="password" value="" >';
							echo '<input class="user" id="user" name="login" type="submit" value="login" />';
							echo '</form>';
							echo '<div id="register">';
							echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
							echo '<a href="">Register Now</a></p>';
							echo '</div>';   
						} 
						elseif($_SESSION['LOGIN'] == "TRUE") {
							include('../includes/logout.inc.php');
						}
					?>
				</div> <!--end login--> 
				<div id="mainNav">
					<ul id="menuSample">
						<li><a href="../index.php">GreatMoods <br/>Homepage</a></li>
						 <?php
					         if(isset($_SESSION['authenticated']))
					        {
					        ?>
					        <li><a href="../membersite.php?group=<? echo $_SESSION['fundid'];?>">View<br>My Website</a></li>
					        <!--<li><a href="gettingstarted.php?group=<? echo $_SESSION['fundid'];?>">Getting<br>Started</a></li>-->
					          <li><a href="memberHome.php?group=<? echo $_SESSION['fundid'];?>">Account<br>Home</a></li>
					          <li><a href="contacts.php?group=<? echo $_SESSION['fundid'];?>">View<br>Contacts</a></li>
					          <li><a href="emails.php?group=<? echo $_SESSION['fundid'];?>">Send<br>Emails</a></li>
					          <!--<li><a href="fundsitehelp.php?group=<? echo $_SESSION['fundid'];?>">Help</a></li>-->
					        <?php }?>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
			
		<br><br>
	       	<?php include 'memberSidebar.php' ; ?>
	       	
      	<div id="contentMain858">

	      	<!--<div class="nav2">
			<ul id="setupNav">
				<li><a href="memberHome.php?group=<?echo $group;?>" class="goalsnav">Account Home</a></li>
				<li>|</li>
				<li><a href="contacts.php?group=<?echo $group;?>" class="goalsnav">Contacts</a></li>
				<li>|</li>
				<li><a href="emails.php?group=<?echo $group;?>" class="goalsnav">Send Emails</a></li>
			</ul>
		</div>-->
    
    <h1>Add Contacts</h1>
        <h3 style="font-size: 20px;">Create Your Contacts for the <?php echo $fund_name; ?> Fundraiser</h3>
    <p style="line-height: 10px;">Please enter contact information for your fundraising leaders. (Required fields are marked with <span class="required">*</span>)</p>
        <form class="distributor1" action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" >
        	<table class="leadercontact1">
			<tr> 
				<td style="white-space:nowrap"><label for="lcFname">First Name<span class="required">*</span></label></td>
	          		<td style="white-space:nowrap"><label for="lcLname">Last Name<span class="required">*</span></label></td>
	         		<td style="white-space:nowrap"><label for="lctitle">Position Title</label></td>
				<td style="white-space:nowrap"><label for="lcemail">Email Address</label></td>
				<td style="white-space:nowrap"><label for="lcphone">Phone Number</label></td>
				<!--<td style="white-space:nowrap"><label for="addcontactphoto">Contact Photo</label></td>-->
		        </tr>
			<tr>
				<td><input id="lcFname" type="text" name="fname[]"/></td>
				<td><input id="lcLname" type="text" name="lname[]"/></td>
				<td><input id="lctitle" type="text" name="title[]"/></td>
				<td><input id="lcemail" type="text" name="email[]"/></td>
				<td><input id="lcphone" type="text" name="phone[]" maxlength="12"/></td>
				<!--<td><input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</tr>
			<tr>
				<td style="white-space:nowrap"><label for="lcFname">First Name<span class="required">*</span></label></td>
	          		<td style="white-space:nowrap"><label for="lcLname">Last Name<span class="required">*</span></label></td>
	         		<td style="white-space:nowrap"><label for="lctitle">Position Title</label></td>
				<td style="white-space:nowrap"><label for="lcemail">Email Address</label></td>
				<td style="white-space:nowrap"><label for="lcphone">Phone Number</label></td>
				<!--<td style="white-space:nowrap"><label for="addcontactphoto">Contact Photo</label></td>-->
		        </tr>
			<tr>
				<td><input id="lcFname" type="text" name="fname[]"/></td>
				<td><input id="lcLname" type="text" name="lname[]"/></td>
				<td><input id="lctitle" type="text" name="title[]"/></td>
				<td><input id="lcemail" type="text" name="email[]"/></td>
				<td><input id="lcphone" type="text" name="phone[]" maxlength="12"/></td>
				<!--<td><input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</tr>
			<tr>
				<td style="white-space:nowrap"><label for="lcFname">First Name<span class="required">*</span></label></td>
	          		<td style="white-space:nowrap"><label for="lcLname">Last Name<span class="required">*</span></label></td>
	         		<td style="white-space:nowrap"><label for="lctitle">Position Title</label></td>
				<td style="white-space:nowrap"><label for="lcemail">Email Address</label></td>
				<td style="white-space:nowrap"><label for="lcphone">Phone Number</label></td>
				<!--<td style="white-space:nowrap"><label for="addcontactphoto">Contact Photo</label></td>-->
		        </tr>
			<tr>
				<td><input id="lcFname" type="text" name="fname[]"/></td>
				<td><input id="lcLname" type="text" name="lname[]"/></td>
				<td><input id="lctitle" type="text" name="title[]"/></td>
				<td><input id="lcemail" type="text" name="email[]"/></td>
				<td><input id="lcphone" type="text" name="phone[]" maxlength="12"/></td>
				<!--<td><input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</tr>
			<tr>
				<td style="white-space:nowrap"><label for="lcFname">First Name<span class="required">*</span></label></td>
	          		<td style="white-space:nowrap"><label for="lcLname">Last Name<span class="required">*</span></label></td>
	         		<td style="white-space:nowrap"><label for="lctitle">Position Title</label></td>
				<td style="white-space:nowrap"><label for="lcemail">Email Address</label></td>
				<td style="white-space:nowrap"><label for="lcphone">Phone Number</label></td>
				<!--<td style="white-space:nowrap"><label for="addcontactphoto">Contact Photo</label></td>-->
		        </tr>
			<tr>
				<td><input id="lcFname" type="text" name="fname[]"/></td>
				<td><input id="lcLname" type="text" name="lname[]"/></td>
				<td><input id="lctitle" type="text" name="title[]"/></td>
				<td><input id="lcemail" type="text" name="email[]"/></td>
				<td><input id="lcphone" type="text" name="phone[]" maxlength="12"/></td>
				<!--<td><input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</tr>
	       </table>
	        <table class="leadercontact2">
		        <tr>
		          <td>
		          <input type="hidden" name="group" value="<?php echo $group;?>"/>
		          <input type="hidden" name="fund" value="<?php echo $fund;?>"/>
		          <input type="submit" name="submit" value="Add More Contacts" />
		          </td>
		          <td><input type="submit" name="submit" value="Save and Continue" /></td>
		        </tr>
	        </table>
        </form>
        <br>
        
        <?php echo '<p style="color:blue;">'.$message.'</p>'; ?>

  </div> <!--end contentMain858-->
      <?php include '../includes/footer.php' ; ?>
    </div> <!--end container-->

</body>

<?php
   ob_end_flush();
?>