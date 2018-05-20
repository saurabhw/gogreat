<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
include '../../includes/connection.inc.php';
$link = connectTo();

$table3 = "Dealers";
$table4 = "orgContacts";
$userID = $_SESSION['userId']; 
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
	    } else{
		$message .= "We're sorry, there was a problem saving ".$fname[$x]." ".$lname[$x].".<br />"; 
	  }// end else
        }// end if
        ++$x;
    }// end while    
	    
}// end if(isset($_POST['submit']))	
$group = $_GET['groupid'];
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
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="../../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<body id="contacts">
	<div id="container">
      		<?php include 'header.inc.php' ; ?>
	       	<?php include '../sidenav.php' ; ?>
      	<div id="contentMain858">
      
    <div class="nav2">
        <ul id="setupNav">
        <li><a href="information.php?groupid=<?echo $group;?>" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $group;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li id="current"><b>Contacts</b></li>
        <li>|</li>
        <li><a href="photos.php?groupid=<?echo $group;?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?groupid=<?echo $group;?>" class="goalsnav">Goals</a></li>
      </ul>
        </div>
    <!--end nav2-->
    
    <h5 style="line-height: 10px; font-size: 24px;">Edit Account</h5>
    
    <h3 style="font-size: 20px;">Current <?php echo $fund_name; ?> Contacts</h3>
     <div class="distributor1">
      <table id="contacts">
        <tr>
          <td><label for="FName1"><b>First Name</b></label></td>
          <td><label for="LName1"><b>Last Name</b></label></td>
          <td><label for="title1"><b>Position Title</b></label></td>
          <td><label for="email1"><b>Email Address</b></label></td>
          <td><label for="phone1"><b>Phone Number</b></label></td>
          <!--<td><label for="photo1"><b>Contact Photo</b></label></td>-->
        </tr>
        
        <?php
        $contact_query = "SELECT * FROM $table4 WHERE fundraiserID = '$group'";
        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
        if($contact_result){
           while ($row = mysqli_fetch_assoc($contact_result)){
              
              echo '<tr>
                  <td>'.$row['orgFName'].'</td>
                  <td>'.$row['orgLName'].'</td>
                  <td>'.$row['Title'].'</td>
                  <td>'.$row['orgEmail'].'</td>
                  <td>'.$row['orgPhone'].'</td>
                  <td></td>
                  
                  <td>
                   <form action="" method="post">
                     <input type="hidden" name="delete_id" value="'.$row['orgContactID'].'" />
                     <input id="dhbutton" type="submit" name="delete" value="Delete" />
                  
                  </td>
                  </form>
                  </tr>';
                  
	   }// end while
	   	   
	}// end if
        ?>
        
        </table>
        </div>
        <br />
        <h3 style="font-size: 20px;">Create Your Contacts for the <?php echo $fund_name; ?> Fundraiser</h3>
    <p style="line-height: 10px;">Please enter contact information for your fundraising leaders. (Required fields are marked with <span class="required">*</span>)</p>
        <form class="distributor1" action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" >
        	<table class="leadercontact1">
			<tr> 
				<td style="white-space:nowrap"><label for="lcFname">First Name<span class="required">*</span></label></td>
	          		<td style="white-space:nowrap"><label for="lcLname">Last Name<span class="required">*</span></label></td>
	         		<td style="white-space:nowrap"><label for="lctitle">Position Title</label></td>
				<td style="white-space:nowrap"><label for="lcemail">Email Address<span class="required">*</span></label></td>
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
				<td style="white-space:nowrap"><label for="lcemail">Email Address<span class="required">*</span></label></td>
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
				<td style="white-space:nowrap"><label for="lcemail">Email Address<span class="required">*</span></label></td>
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
				<td style="white-space:nowrap"><label for="lcemail">Email Address<span class="required">*</span></label></td>
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