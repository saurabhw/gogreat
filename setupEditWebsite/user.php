<?php
  //if(!isset($_SESSION['authenticated']))
     //  {
     //       header('Location: ../index.php');
     //       exit;
     //  }
   include '../includes/autoload.php';
   $table = "Dealers"; 
 
   $group = $_GET["groupid"];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE loginid='$group' AND setuppersonid='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $fundraiserid = $row['loginid'];
   $u_n = $row['username'];
   
   
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Goals</title>
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
	</head>
	<body id="reasons">
<div id="container">
       <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      <div id="contentMain858">
    <div class="nav2">
          <ul id="setupNav">
        <li><a href="photos.php" class="photosnav"><<&nbsp;</a></li>
        <li><a href="selectFundraiser.php" class="infonav">Add New Fundraiser</a></li>
        <li>|</li>
        <li><a href="rephome.php" class="editnav">Edit Current Accounts</a></li>
        <li>|</li>
        <li><a href="information.php?groupid=<?echo $group;?>" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $group;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li><a href="contacts.php?groupid=<?echo $group;?>" class="contactsnav">Contacts</a></li>
        <li>|</li>
        <li><a href="photos.php?groupid=<?echo $group;?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li id="current"><a href="goals.php" class="goalsnav">Goals</a></li>
        <li>&nbsp;>> </li>
      </ul>
        </div>
    <!--end nav2-->
    
    <p style="font-size: 24px;">Setup/Edit Website</p>
    <div class="setupLeft">
          <h3>User Name</h3> 
          <p>Set username and password for this account.</p>  

      <div id="leadBox">
        <div id="infoText">
          <div>
          <form method="post" action="editUserName.php" enctype="multipart/form-data">
          
          <br />
          <input type="text" name="email" value="" />&nbsp;Email Address
          <br />
          <br />
          <input type="text" name="pass" value="" />&nbsp;Password
          <br />
          <br />
          <input type="hidden" name="gp" value="<? echo $group;?>" />
          <input type="hidden" name="un" value="<? echo $u_n;?>" />
          </table>
          <input type="submit" name="submit" value="Save & Finish" />
          </form>  
          </div>
          <!--end redBar1-->

        </div>
        <!--end infoText-->
      </div>
      <!--end leadBox-->
    </div>
    <!--end setupLeft-->
    
      </div>
      <!--end contentMain858-->
     <?php include '../includes/footer.php' ; ?>
    </div>
<!--end container-->

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