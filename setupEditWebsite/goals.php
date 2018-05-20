<?
   session_start(); // session start
   ob_start();
   ini_set('display_errors', '1'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $group = $_GET['group'];
   if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
    $check = checkChainRep($userID,$group);
      if(!is_numeric($group) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }
   $table = "Dealers"; 
   
   if(isset($_POST['submit'])){
	  $groupName = mysqli_real_escape_string($link, $groupName);
	   $start = mysqli_real_escape_string($link, $_POST['fundStart']);
	   $ending = mysqli_real_escape_string($link, $_POST['fundEnd']);
	   $goal1 = mysqli_real_escape_string($link, $_POST['fundGoal1']);
	   $goal = mysqli_real_escape_string($link, $_POST['fundGoal']);
	   $group = mysqli_real_escape_string($link, $_POST['g']);
	   $query2 = "UPDATE $table SET
  				FundraiserGoal = '$goal1',
  				FundraiserStartDate = '$start',
  				FundraiserEndDate = '$ending',
  				goal2 = '$goal'
  				WHERE loginid = '$group'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	//update members under group
  	$query3 = "UPDATE $table SET
  				
  				FundraiserStartDate = '$start',
  				FundraiserEndDate = '$ending',
  				goal2 = '$goal'
  				WHERE setuppersonid = '$group'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2 && $result3){
  	    $redirect = "Location:information.php?group=$group";
  	    header("$redirect");
  	}
  	}
   
   $query = "SELECT * FROM $table WHERE loginid='$group'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $fundraiserid = $row['loginid'];
   $fgoal = $row['FundraiserGoal'];
   $gGoal = $row['goal2'];
   $fstart = $row['FundraiserStartDate'];
   $fend = $row['FundraiserEndDate'];
   $groupPic = $row['group_team_pic'];
   
   $howMany = "SELECT * FROM orgMembers WHERE fund_owner_id = '$group'";
   $memberResult = mysqli_query($link, $howMany)or die ("couldn't execute query members.".mysqli_error($link));
   $getMembers = mysqli_fetch_assoc($memberResult);
   $memberCount = mysqli_num_rows($memberResult);
   
   $queryB = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $resultB = mysqli_query($link, $queryB)or die ("couldn't execute query.".mysqli_error($link));
   $rowB = mysqli_fetch_assoc($resultB);
   $cn = $rowB['companyName'];
   $pic = $rowB['picPath'];
   
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Fundraiser Account | Goals & Achievements</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px;  
}
</style>
</head>
	
<body>
		<?php include 'header.inc.php' ; ?>
                <?php include 'sideLeftNav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
 <div class="page-header">
		    <h2 align="center">Fundraiser Goal</h2>
</div>
<div class="col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
		    <h3>Fundraising Goals</h3> 
    <hr style="border-color:#b8b8b8;">		
		    <div>
		          <form method="post" action="goals.php" enctype="multipart/form-data">
			          <br>
			          <input type="text" name="fundStart" value="<? echo $fstart; ?>">&nbsp;<label>Start Date</label>
			          <br>
			          <br>
			          <input type="text" name="fundEnd" value="<? echo $fend;?>">&nbsp;<label>End Date</label>
			          <br>
			          <br>
			          <input type="text" name="fundGoal1" value="<? echo $fgoal;?>">&nbsp;<label>Total Group Goal</label>
			          <br>
			          <br>
			          Your fundraiser has <? echo $memberCount; ?> members. Divide your group goal evenly.
			          <br>
			          <br>
			          <input type="text" name="fundGoal" value="<? echo $gGoal;?>">&nbsp;<label>Fundraiser Goal For Each Member</label>
			          <br>
			          <br>
			          <input type="hidden" name="g" value="<? echo $group;?>" />
			          <input type="submit" name="submit" class="redbutton" value="Save & Finish" />
		          </form>  
		     </div>
</div>	    
  </div> <!--end content -->
	    </div>
</div> <!--end container-->	
<br>  
     	 <?php include 'footer.php' ; ?>

</body>
</html>
<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
<?php
   ob_end_flush();
?>