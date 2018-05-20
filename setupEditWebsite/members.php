<?
include '../includes/autoload.php';
 if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }


// check if form has been submitted
if(isset($_POST['submit'])){
$message = '';
$table1 = "user_info";
$table2 = "users";
$salt = time();
$bannerx = $_SESSION['banner'];
function isUniqueEmail($link, $table1, $emails) {
		$query = "SELECT * FROM $table1 WHERE email='$emails'";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) >= 1) {
			$message .= "We're sorry, that email address is already being used, please use another one. <br />";
			return false;
		} else {
			return true;
		}
	}
	
function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}// end check_email_address

$loginname=$_SESSION['username'];
$groupid = $_GET['group'];

$repid=$_SESSION['userId'];
if (!$link)
  {
  die('Could not connect: ' . mysqli_error($link));
  }
$sql="SELECT * FROM Dealers where loginid='$groupid' AND setuppersonid='$repid'";
$result=mysqli_query($link, $sql)or die(mysql_error());
$resultrow=mysqli_fetch_array($result);
$dealer = $resultrow["Dealer"];
$dealerDir = $resultrow["DealerDir"];
$about = $resultrow['About'];
$f_r = $resultrow['FundraiserReasons'];
$go = $resultrow['FundraiserGoal'];
$start = $resultrow['FundraiserStartDate'];
$ending = $resultrow['FundraiserEndDate'];
$ad1 = $resultrow['Address1'];
$ad2 = $resultrow['Address2'];
$pay = $resultrow['PaypalEmail'];
$ct = $resultrow['City'];
$st = $resultrow['State'];
$zp = $resultrow['Zip'];
$banner  = $resultrow['banner_path'];
$leaderpic = $resultrow['leader_pic'];
$locationpic = $resultrow['location_pic'];
$groupteampic = $resultrow['group_team_pic'];
$contactpic = $resultrow['contact_pic'];
$repid=$_SESSION['userId'];
$fnames = $_POST['fnames'];
$lnames = $_POST['lnames'];
$emails = $_POST['emails'];
$rel    = $_POST['relation'];
$phone  = $_POST['phone'];
$landingpage = "fundMember/memberLogin.php";
$x=0;
$arraycount=count($emails);

while($arraycount>$x){

    if($lnames[$x]!=null && $emails[$x]!=null){
        if(isUniqueEmail($link, $table1, $emails[$x])){
		$query1 = "INSERT INTO $table1 (FName, LName, email, homePhone, salesPerson, role)";
		$query1 .= " VALUES('$fnames[$x]', '$lnames[$x]', '$emails[$x]', '$phone[$x]', '$groupid','Member')";

		mysqli_query($link, "start transaction;");
		
		// insert data into users_info table
		$res1 = mysqli_query($link, $query1);
		
		
		// get user_info ID for initial password
		$idquery = "SELECT * FROM $table1 WHERE email = '$emails[$x]'";
		$res2 = mysqli_query($link, $idquery);
		$resultrow=mysqli_fetch_array($res2);
		$user_infoID = $resultrow['userInfoID'];
		if($user_infoID == null){
			$res1 = false;
			echo $idquery.'<br />';
			
		}

		$loginPass = trim($lnames[$x]);		
		$loginPass = $loginPass.$user_infoID;
		$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
		
		$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
		$query3 .= "VALUES('$emails[$x]','$loginPass','3','$landingpage','$salt', now(), now(), 'Member')";
		// insert data into users table
		$res3 = mysqli_query($link, $query3);
		
		// insert member into the Dealers table 
	        $firstPass = $lnames[$x].$user_infoID;
		$query4 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal, FundraiserStartDate, FundraiserEndDate,  Address1, Address2, City, State, Zip, PaypalEmail, setuppersonid, email, userName, banner_path, leader_pic, location_pic, group_team_pic, contact_pic, firstPass)";
		$query4 .= "VALUES('$dealer', '$dealerDir', '$about', '$f_r', '$go', '$start', '$ending',  '$a1', '$a2', '$ct', '$st', '$zp', '$pay', '$groupid', '$emails[$x]', '$emails[$x]', '$bannerx', '$leaderpic', '$locationpic', '$groupteampic', '$contactpic', '$firstPass')";
		$res4 = mysqli_query($link, $query4)or die(mysqli_error($link));
		
		$idquery2 = "SELECT * FROM Dealers WHERE userName = '$emails[$x]'";
		$resX = mysqli_query($link, $idquery2);
		$resultrowX =mysqli_fetch_array($resX);
		$user_infoIDX = $resultrowX['loginid'];
		
		// insert into orgMembers
		$emailsql = "SELECT * FROM orgMembers WHERE fund_owner_id ='$repid' AND orgEmail='$emails[$x]' AND fundraiserID = '$groupid';";
            
                $emailresult = mysqli_query($link, $emailsql) or die(mysqli_error($link));
                if(mysqli_num_rows($emailresult) < 1){
           
                   $insert_result= mysqli_query($link, "INSERT INTO orgMembers (orgFName, orgLName, orgEmail, orgRel, orgPhone, fundraiserID,
               			    fund_owner_id, org_member_created,repID)
                                    VALUES('$fnames[$x]', '$lnames[$x]', '$emails[$x]', '$rel[$x]', '$phone[$x]',
                                    '$user_infoIDX', '$groupid', 'now()' '$repid') or die(mysqli_error());
                                      
                           
	         }
	      
		if( $res1 && $res2 && $insert_result && $res4){
			mysqli_query($link, "commit;");
			$message .= $fnames[$x].' '.$lnames[$x].' is now a member!<br />';
			$groupid = $_GET['group'];
			header( 'Location: editMembers.php?group='.$groupid ) ;
			
		} else{
                        mysqli_query($link, "rollback;");
			$message .= "We're sorry, there was a problem saving ".$fnames[$x]." ".$lnames[$x].".<br />"; 
			}
	}else
	{
		//$message .= $emails[$x].' already exists on Greatmoods.com';
		$query4 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal, FundraiserStartDate, FundraiserEndDate,  Address1, Address2, City, State, Zip, PaypalEmail, setuppersonid, email, userName, banner_path, leader_pic, location_pic, group_team_pic, contact_pic, firstPass)";
		$query4 .= "VALUES('$dealer', '$dealerDir', '$about', '$f_r', '$go', '$start', '$ending',  '$a1', '$a2', '$ct', '$st', '$zp', '$pay', '$groupid', '$emails[$x]', '$emails[$x]', '$bannerx', '$leaderpic', '$locationpic', '$groupteampic', '$contactpic', '$firstPass')";
		$res4 = mysqli_query($link, $query4)or die(mysqli_error($link));
		
	}
    }
    ++$x;
}// while
}// end if(isset($_POST['submit']))

$group = $_SESSION['groupid'];
$rep = $_SESSION['userId'];

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Add Members | Fundraising Group</title>
<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../css/contacts_styles.css" rel="stylesheet" type="text/css" />
<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">
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
	<?php include 'leftNavSetupEditWebsite.php' ; ?>
      		
      <div id="content">
   	<h1>Add Members</h1>
   
   <!-- <h3>Current Members</h3>-->
   <!--  <div class="distributor1">
     <table id="contacts">
      <tr>
          <td><label for="FName1"><b>First Name</b></label></td>
          <td><label for="LName1"><b>Last Name</b></label></td>
          <td><label for="title1"><b>Position Title</b></label></td>
          <td><label for="email1"><b>Email Address</b></label></td>
          <td><label for="phone1"><b>Phone Number</b></label></td>
          <td><label for="photo1"><b>Contact Photo</b></label></td>
        </tr>
      <?/*
        $group_id = $_SESSION['groupid'];
        $member_query = "SELECT * FROM orgMembers WHERE fund_owner_id = '$group_id'";
        $member_result = mysqli_query($link, $member_query) or die(mysqli_error($link));
        if($member_result){
           while ($row = mysqli_fetch_assoc($member_result)){
              
              echo '<tr>
                  <td><input type="text" name="fname" value="'.$row['orgFName'].'" /></td>
                  <td><input type="text" name="lname" value="'.$row['orgLName'].'" /></td>
                  <td><input type="text" name="title" value="'.$row['Title'].'" /></td>
                  <td><input type="text" name="email" value="'.$row['orgEmail'].'" /></td>
                  <td><input type="text" name="phone" value="'.$row['orgPhone'].'" /></td>
                  <td></td>
                  
                  <td>
                   <form action="" method="post">
                     <input type="hidden" name="delete_id" value="'.$row['orgContactID'].'" />
                    
                    
                  
                  </td>
                  </form>
                  </tr>';
       }}*/ ?>

        </table>
        </div>-->
    
    <h3>Please enter contact information for your fundraising members.</h3>
    <p>Required fields are marked with <span class="required">*</span></p>
    
    <form action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="fm_accts2">
          	<tr>
          		<th class="fn">First<span class="required">*</span></th>
          		<th class="ln">Last<span class="required">*</span></th>
          		<th class="relation">Relation</th>
          		<th class="pph">Phone</th>
          		<th class="email">Email<span class="required">*</span></th>
          	</tr>
          	<tr>
          		<td class="fn"><input type="text" name="fnames[]"></td>
          		<td class="ln"><input type="text" name="lnames[]"></td>
          		<td class="relation"><input type="text" name="relation[]"></td>
          		<td class="pph"><input type="text" name="phone[]"></td>
          		<td class="email"><input type="text" name="emails[]"></td>
          	</tr>

          	<tr>
          		<td class="fn"><input type="text" name="fnames[]"></td>
          		<td class="ln"><input type="text" name="lnames[]"></td>
          		<td class="relation"><input type="text" name="relation[]"></td>
          		<td class="pph"><input type="text" name="phone[]"></td>
          		<td class="email"><input type="text" name="emails[]"></td>
          	</tr>
          	
          	<tr>
          		<td class="fn"><input type="text" name="fnames[]"></td>
          		<td class="ln"><input type="text" name="lnames[]"></td>
          		<td class="relation"><input type="text" name="relation[]"></td>
          		<td class="pph"><input type="text" name="phone[]"></td>
          		<td class="email"><input type="text" name="emails[]"></td>
          	</tr>

          	<tr>
          		<td class="fn"><input type="text" name="fnames[]"></td>
          		<td class="ln"><input type="text" name="lnames[]"></td>
          		<td class="relation"><input type="text" name="relation[]"></td>
          		<td class="pph"><input type="text" name="phone[]"></td>
          		<td class="email"><input type="text" name="emails[]"></td>
          	</tr>
          </table>
          
          <br>
          
          <input name="group" type="hidden" value="<?php echo $group; ?>">
          <input class="redbutton" type="submit" name="submit" value="Save New Member(s)" />
         <!--<input type="submit" name="submit" value="Save" />-->
        </form>
    <?php echo '<p style="color:blue;">'.$message.'</p>'; ?>
   
    
   
        
  </div>      <!--end contentMain858-->
  
      <?php include '../includes/footer.php' ; ?>
    </div><!--end container-->
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