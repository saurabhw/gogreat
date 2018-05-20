<?
   session_start();
   include '../../includes/connection.inc.php';
   $link = connectTo();
   $table = "Dealers"; 
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $gp = mysqli_real_escape_string($link, $_POST['gp']);
	   $start = mysqli_real_escape_string($link, $_POST['fundStart']);
	   $ending = mysqli_real_escape_string($link, $_POST['fundEnd']);
	   $goal = mysqli_real_escape_string($link, $_POST['fundGoal']);
	   $query2 = "UPDATE $table SET
  				FundraiserGoal = '$goal',
  				FundraiserStartDate = '$start',
  				FundraiserEndDate = '$ending'
  				WHERE loginid = '$gp'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:contacts.php?groupid=$gp";
  	    header("$redirect");
  	}
  	}
   $groupid = $_GET['groupid'];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE loginid='$groupid'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $fundraiserid = $row['loginid'];
   $fgoal = $row['FundraiserGoal'];
   $fstart = $row['FundraiserStartDate'];
   $fend = $row['FundraiserEndDate'];
   
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Goals | Edit Account | Sales Coordinator</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
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
      <div id="contentMain858">
    
    <h1>Edit Goals</h1>
    <h3>Fundraising Goals</h3> 
         <!-- <p>Plan your fundraiser according to funds needed. Select a fundraiser event, enter start date and end date.
          Use the calculator to determine individual and group goals.</p>-->   

          <form id="graybackground4" method="post" action="goals.php" enctype="multipart/form-data">
          	<div id="table">
          		<div id="row">
          			<span id="date">Start Date</span>
          			<input id="date" type="text" name="fundStart" value="<? echo $fstart; ?>" />
          		</div> <!-- end row -->
          		
          		<div id="row">
          			<span id="date">End Date</span>
          			<input id="date" type="text" name="fundEnd" value="<? echo $fend;?>" />
          		</div> <!-- end row -->
          		
          		<div id="row">
          			<span id="goal">Fundraiser Goal</span>
          			<input id="goal" type="text" name="fundGoal" value="<? echo $fgoal;?>" />
          		</div> <!-- end row -->
          		<br>
          
          <input type="hidden" name="id" value="<? echo $fundraiserid; ?>" />
          <input type="hidden" name="gp" value="<?echo $groupid; ?>" />
          <input id="redbutton" type="submit" name="submit" value="Save & Continue to Leader Contacts" />
          </form>  
	</div> <!-- end table -->
      </div>  <!--end content-->
      
     <?php include '../footer.php' ; ?>
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