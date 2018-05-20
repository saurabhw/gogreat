<?php
   include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../repSignup.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
  
   $userID = $_SESSION['userId'];
   $myQuery = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error());
   $myRow = mysqli_fetch_assoc($myResult);
  
   $myPic = $myRow['picPath'];
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>View Contacts | Representative</title>
<link rel="stylesheet" type="text/css" href="../css/layout_styles.css">
<link href="../css/contacts_styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../css/sidebar_nav.css">
<link rel="shortcut icon" href="../images/favicon.ico">

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
      <?php include 'sidenav.php' ; ?>
	       	
    <div id="content">
	<h1>Fundraising Contacts</h1>
	<br />
    	<h3>Current Contacts</h3>
     	
     	
      	<div id="graybackground">
      	<select class="" name="rpid" onchange="fetch_select6(this.value);" required>
      		<option value="">Select Representative</option>
      		
      		<?
      		$sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
		$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysql_error());
	
		while($row2 = mysqli_fetch_assoc($result2))
		{
                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
	        }
	        ?>
      		</select>
						<select class="" name="groupid" id="groupid" onchange="fetch_select7(this.value);" required>
							<option value="">Select Fundraiser Account</option>
						</select>
						<select class="role4" name="memberid" id="memberid" onchange="fetch_select10(this.value);"required>
						<option value="">Select Member</option>
						</select>			
	     <!--   <div id="row">
	          <span id="fname">First</span>
	          <span id="lname">Last</span>
	          <span id="title">Relationship</span>
	          <span id="loginemail">Email</span>
	          <span id="phone">Phone</span>
	          <span id="">Contact Photo</span>
	        </div>--> <!-- end row -->
    
      <!-- <?php
        $contact_query = "SELECT * FROM orgCustomers WHERE repID = '$userID'";
        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
        if($contact_result){
           while ($row = mysqli_fetch_assoc($contact_result)){
              
              echo '<div id="row">
                  <input id="fname" type="text" name="" value="'.$row['first'].'" title="First Name"/>
                  <input id="lname" type="text" name="" value="'.$row['last'].'" title="Last Name"/>
                  <input id="title" type="text" name="" value="'.$row['relationship'].'" title="Title"/>
                  <input id="loginemail" type="text" name="" value="'.$row['email'].'" title="Email Address"/>
                  <input id="phone" type="text" name="" value="'.$row['workPhone'].'" title="Phone Number"/>
                  <a href="editContact.php?gp='.$row['fundMemberID'].'&id='.$row['customerID'].'"><input type="button" name="Edit" class="redbutton" value="Edit" title="Edit Contact Information"/></a>

                   <span><form action="" method="post">
                     <input type="hidden" name="delete_id" value="'.$row['orgContactID'].'" />
                     <a href="destroyUser.php?gp='.$_GET["group"].'&conid='.$row['orgContactID'].'"><input type="button" name="delete" class="redbutton" value="Delete" title="Delete Contact"/></a>
                  </form></span>
                  </div>';
                  
	   }// end while
	   	   
	}// end if
      ?>--> 
      <table id="memberContacts">
     
      </table>
        </div>
       
        <br>
       <!-- <p><a href="addContacts.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Add Contacts" title="Add Contacts"/></a>-->
       <!-- <a href="editMembers.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Continue to Members" title="Continue to Members"/></a></p>-->
        </div>
        </div> <!--end content-->
          
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>