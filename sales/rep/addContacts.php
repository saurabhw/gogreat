<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
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
		
  	    $redirect = "Location:sendEmail.php?groupid=$groupid";
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
<head>
<meta charset="UTF-8">
<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css">
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css">
<link href="../../css/header_styles.css" rel="stylesheet" type="text/css">
<link href="../../css/sidebar_styles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico">

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
</head>

<body>
<div id="container">
      	<?php include 'header.inc.php' ; ?>
	<?php include 'acct_sidenav.php' ; ?>
	       	
    <div id="content">
    <h1>Add Fundraising Leader Contacts</h1>
        <h3><?php echo $fund_name; ?> Fundraiser</h3>
    <p>Enter contact information for the <?php echo $fund_name; ?> fundraiser leaders. (Required Fields<span class="required">*</span>)</p>
    
    <div id="bannertable">
        <form id="graybackground5" action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" >
			<div id="row"> 
				<span id="fname">First<span class="required">*</span></span>
	          		<span id="lname">Last<span class="required">*</span></span>
	         		<span id="title">Position Title</span>
				<span id="loginemail">Email</span>
				<span id="phone">Phone</span>
				<!--<span>Contact Photo</label></span>-->
		        </div> <!-- end row -->
			<div id="row">
				<input id="fname" type="text" name="fname[]" title="First Name"/>
				<input id="lname" type="text" name="lname[]" title="Last Name"/>
				<input id="title" type="text" name="title[]" title="Position Title"/>
				<input id="loginemail" type="text" name="email[]" title="Email Address"/>
				<input id="phone" type="text" name="phone[]" title="Phone Number"/>
				<!--<input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</div> <!-- end row -->
			
			<div id="row"> 
				<span id="fname">First<span class="required">*</span></span>
	          		<span id="lname">Last<span class="required">*</span></span>
	         		<span id="title">Position Title</span>
				<span id="loginemail">Email</span>
				<span id="phone">Phone</span>
				<!--<span>Contact Photo</label></span>-->
		        </div> <!-- end row -->
			<div id="row">
				<input id="fname" type="text" name="fname[]" title="First Name"/>
				<input id="lname" type="text" name="lname[]" title="Last Name"/>
				<input id="title" type="text" name="title[]" title="Position Title"/>
				<input id="loginemail" type="text" name="email[]" title="Email Address"/>
				<input id="phone" type="text" name="phone[]" title="Phone Number"/>
				<!--<input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</div> <!-- end row -->
			
			<div id="row"> 
				<span id="fname">First<span class="required">*</span></span>
	          		<span id="lname">Last<span class="required">*</span></span>
	         		<span id="title">Position Title</span>
				<span id="loginemail">Email</span>
				<span id="phone">Phone</span>
				<!--<span>Contact Photo</label></span>-->
		        </div> <!-- end row -->
			<div id="row">
				<input id="fname" type="text" name="fname[]" title="First Name"/>
				<input id="lname" type="text" name="lname[]" title="Last Name"/>
				<input id="title" type="text" name="title[]" title="Position Title"/>
				<input id="loginemail" type="text" name="email[]" title="Email Address"/>
				<input id="phone" type="text" name="phone[]" title="Phone Number"/>
				<!--<input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</div> <!-- end row -->
			
			<div id="row"> 
				<span id="fname">First<span class="required">*</span></span>
	          		<span id="lname">Last<span class="required">*</span></span>
	         		<span id="title">Position Title</span>
				<span id="loginemail">Email</span>
				<span id="phone">Phone</span>
				<!--<span>Contact Photo</label></span>-->
		        </div> <!-- end row -->
			<div id="row">
				<input id="fname" type="text" name="fname[]" title="First Name"/>
				<input id="lname" type="text" name="lname[]" title="Last Name"/>
				<input id="title" type="text" name="title[]" title="Position Title"/>
				<input id="loginemail" type="text" name="email[]" title="Email Address"/>
				<input id="phone" type="text" name="phone[]" title="Phone Number"/>
				<!--<input id="addcontactphoto" name="AddContactPhoto" type="file"/>
				<input name="RemoveContactPhoto" type="checkbox" id="RemoveContactPhoto" value="RemoveContactPhoto">
				<label for="RemoveContactPhoto">Remove Current Photo</label>
				</td>-->
			</div> <!-- end row -->

	        <div id="row">
		          <input type="hidden" name="group" value="<?php echo $group;?>"/>
		          <input type="hidden" name="fund" value="<?php echo $fund;?>"/>
		          <input id="redbutton" type="submit" name="submit" value="Save New Leader Contacts" />
		          <a id="redbutton" href="contacts.php?groupid=<? echo $_GET['groupid']; ?>">Back to Contacts</a>
	        </div> <!-- end row -->
        </form>
      </div> <!-- end commissiontable -->
        <br>
        
        <?php echo '<p style="color:blue;">'.$message.'</p>'; ?>

  </div> <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>

<?php
   ob_end_flush();
?>