<?php
 session_start();
 if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
 include '../includes/connection.inc.php';
 $link = connectTo();
 $userID = $_SESSION['userId'];
 $table = "Dealers";
 require_once("../phpgrid/phpGrid_Lite/conf.php");
 $dg = new C_DataGrid("SELECT
                       Dealer,
                       DealerDir,
                       Address1,
                       Address2,
                       City,
                       State,
                       Zip,
                       orgtype,
                       email,
                       website 
                       FROM $table");
 $dg -> set_query_filter("setuppersonid='$userID'");
 $dg -> enable_export('HTML');
 $dg -> enable_edit('FORM', 'CRU');

?>
<!DOCTYPE html>
<html>
	<head>
	<title>GreatMoods | Setup/Edit Website - Photos</title>
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
	<body id="photos">
<div id="container">
      <?php include 'header.inc.php' ; ?>
     <?php 
     //include 'leftNavSetupEditWebsite.php' ;
      ?>
      <div id="contentMain858">
    <div class="nav2">
          <ul id="setupNav">
        <li><a href="contacts.php" class="contactsnav"><<&nbsp;</a></li>
        <li><a href="selectFundraiser.php" class="infonav">Fundraiser Type</a></li>
        <li>|</li>
        <li><a href="disthome.php" class="editnav">Edit Account</a></li>
        <li>|</li>
        <li><a href="information.php?groupid=<?echo $fundraiserid;?>" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $fundraiserid;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li><a href="contacts.php?groupid=<?echo $fundraiserid;?>" class="contactsnav">Contacts</a></li>
        <li>|</li>
        <li id="current"><a href="photos.php" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?groupid=<?echo $fundraiserid;?>" class="goalsnav">Goals</a></li>
        <li><a href="goals.php">&nbsp;>> </a></li>
      </ul>
        </div>
    <!--end nav2-->
    
     <p style="font-size: 24px;">Setup/Edit Website</p>
    
 <? 
 
 $dg -> display();
?>
  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>