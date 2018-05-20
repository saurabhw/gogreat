<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
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
    $group = $_POST['group'];
    
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
	        VALUES('$title[$x]', '$fname[$x]', '$lname[$x]', '$email[$x]', '$phone[$x]','$group', '$userID', now())";
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
<html>
	<head>
	<meta charset="UTF-8" />
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
	</head>
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
						<li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          						<?php include '../includes/menu_mall_directory_site.php'; ?>
						 <?php
					         if(isset($_SESSION['authenticated']))
					        {
					        ?>
					          <!--<li><a href="gettingstarted.php?group=<? echo $_SESSION['fundid'];?>">Getting<br>Started</a></li>-->
					          <li><a href="memberHome.php?group=<? echo $_SESSION['fundid'];?>">Setup/Edit<br>Website</a></li>
					          <li><a href="contacts.php?group=<? echo $_SESSION['fundid'];?>">Setup/Edit<br>Contacts</a></li>
					          <li><a href="emails.php?group=<? echo $_SESSION['fundid'];?>">Setup/Edit<br>Emails</a></li>
					          <!--<li><a href="fundsitehelp.php?group=<? echo $_SESSION['fundid'];?>">Help</a></li>-->
					        <?php }?>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
      		<br>
      		<br>
       		<?php include 'memberSidebar.php' ; ?>
       
      <div id="contentMain858">
    <div class="nav2">
        <ul id="setupNav">
        <li><a href="memberHome.php?group=<?echo $group;?>" class="infonav">Account Home</a></li>
        <li>|</li>
        <li><b>Contacts</b></li>
        <li>|</li>
        <li><a href="emails.php?group=<?echo $group;?>" class="goalsnav">Send Emails</a></li>
      </ul>
        </div>
    <!--end nav2-->
    
    <h3>My Family, Friends and Business Contacts</h3>
    
    <h5>Current <?php echo $fund_name; ?> Contacts</h5>
     <div class="distributor1">
	<table id="contacts">
		         <tr>
		              <td><label for="FName">First Name</label></td>
		              <td><label for="LName">Last Name</label></td>
		              <td><label for="rel">Relationship</label></td>
		              <td><label for="email">Email Address</label></td>
		              <td><label for="phone">Phone Number</label></td>
		         </tr>

		        <?php
		        $contact_query = "SELECT * FROM orgCustomers WHERE fundraiserID = '$group'";
		        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
		        if($contact_result){
		           while ($row = mysqli_fetch_assoc($contact_result)){
		              
		              echo '<tr>
		                  <td>'.$row['orgFName'].'</td>
		                  <td>'.$row['orgLName'].'</td>
		                  <td>'.$row['orgRel'].'</td>
		                  <td>'.$row['orgEmail'].'</td>
		                  <td>'.$row['orgPhone'].'</td>
		                  
		                  </tr>';
		                  
			   }// end while
			   	   
			}// end if
		        ?>

		</table>
        </div>
        <br />
        <h5>Add New Contacts</h5>
    <p>Please enter contact information for your fundraising groups.</p>
    <p>Required fields are marked with <span class="required">*</span></p>
        <form class="distributor1" action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" >
        
        <table>
        <tr>
          <td><label for="FName2">First Name<span class="required">*</span></label></td>
          <td><label for="LName2">Last Name<span class="required">*</span></label></td>
          <td><label for="title2">Relationship</label></td>
          <td><label for="email2">Email Address<span class="required">*</span></label></td>
          <td><label for="phone2">Phone Number</label></td>
        </tr>
        <tr>
          <td><label>
            <input type="text" size="132" maxlength="30" id="FName1" name="fname[]" style="width:100px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="LName1" name="lname[]" style="width:150px;"/>
          </label></td>
         <td><label>
          <input type="text" size="132" maxlength="30" id="title1" name="title[]" style="width:110px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="email1" name="email[]" style="width:200px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="phone1" name="phone[]" style="width:90px;"/>
          </label></td>
          
        </tr>
        <tr>
          <td><label for="FName2">First Name<span class="required">*</span></label></td>
          <td><label for="LName2">Last Name<span class="required">*</span></label></td>
          <td><label for="title2">Relationship</label></td>
          <td><label for="email2">Email Address<span class="required">*</span></label></td>
          <td><label for="phone2">Phone Number</label></td>
        </tr>
        <tr>
          <td><label>
            <input type="text" size="132" maxlength="30" id="FName1" name="fname[]" style="width:100px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="LName1" name="lname[]" style="width:150px;"/>
          </label></td>
         <td><label>
          <input type="text" size="132" maxlength="30" id="title1" name="title[]" style="width:110px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="email1" name="email[]" style="width:200px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="phone1" name="phone[]" style="width:90px;"/>
          </label></td>
          
        </tr>
        <tr>
          <td><label for="FName2">First Name<span class="required">*</span></label></td>
          <td><label for="LName2">Last Name<span class="required">*</span></label></td>
          <td><label for="title2">Relationship</label></td>
          <td><label for="email2">Email Address<span class="required">*</span></label></td>
          <td><label for="phone2">Phone Number</label></td>
        </tr>
        <tr>
          <td><label>
            <input type="text" size="132" maxlength="30" id="FName1" name="fname[]" style="width:100px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="LName1" name="lname[]" style="width:150px;"/>
          </label></td>
         <td><label>
          <input type="text" size="132" maxlength="30" id="title1" name="title[]" style="width:110px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="email1" name="email[]" style="width:200px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="phone1" name="phone[]" style="width:90px;"/>
          </label></td>
          
        </tr>
        <tr>
          <td><label for="FName2">First Name<span class="required">*</span></label></td>
          <td><label for="LName2">Last Name<span class="required">*</span></label></td>
          <td><label for="title2">Relationship</label></td>
          <td><label for="email2">Email Address<span class="required">*</span></label></td>
          <td><label for="phone2">Phone Number</label></td>
        </tr>
        <tr>
          <td><label>
            <input type="text" size="132" maxlength="30" id="FName1" name="fname[]" style="width:100px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="LName1" name="lname[]" style="width:150px;"/>
          </label></td>
         <td><label>
          <input type="text" size="132" maxlength="30" id="title1" name="title[]" style="width:110px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="email1" name="email[]" style="width:200px;"/>
          </label></td>
          <td><label>
            <input type="text" size="132" maxlength="30" id="phone1" name="phone[]" style="width:90px;"/>
          </label></td>
          
        </tr>
        </table>
        <table>
        <tr>
          <td><input type="hidden" name="group" value="<?php echo $group;?>"/>
          <input type="hidden" name="fund" value="<?php echo $fund;?>"/>
              <input type="submit" name="submit" value="Add New Contacts" />
          </td>
        </tr>
        </table>
        </form>
        <br />
        
        <?php echo '<p style="color:blue;">'.$message.'</p>'; ?>
    
      
    <p>&nbsp;</p>
    <div class="nav3">
      <ul class="setupNav">
        <li><a href="reasons.php"><<&nbsp;Previous</a></li>
        <li>|</li>
        <li><a href="photos.php">Next&nbsp;>></a></li></ul>
    <p>&nbsp;</p>
    </div>
    <!--end nav3--> 
  </div>
      <!--end contentMain858-->
      <?php include '../includes/footer.php' ; ?>
    </div>
<!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>