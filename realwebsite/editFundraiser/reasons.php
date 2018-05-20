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
        require_once("../includes/connection.inc.php");
        include('../samplewebsites/imageFunctions.inc.php');
        include '../includes/functions.php';
        $link = connectTo();
        $userID = $_SESSION['userId'];
        $group = $_SESSION["groupid"];
	//update DB
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $group = mysqli_real_escape_string($link, $_POST['group']);
	   $about = mysqli_real_escape_string($link, $_POST['description']);
	   
	   $reason1 = mysqli_real_escape_string($link, $_POST['reasons1']);
	   $reason2 = mysqli_real_escape_string($link, $_POST['reasons2']);
	   $reason3 = mysqli_real_escape_string($link, $_POST['reasons3']);
	   $reason4 = mysqli_real_escape_string($link, $_POST['reasons4']);
	   $reason5 = mysqli_real_escape_string($link, $_POST['reasons5']);
	   $reason6 = mysqli_real_escape_string($link, $_POST['reasons6']);
	   $reason7 = mysqli_real_escape_string($link, $_POST['reasons7']);
	   $reason8 = mysqli_real_escape_string($link, $_POST['reasons8']);
	   $reason9 = mysqli_real_escape_string($link, $_POST['reasons9']);
	   $reason10 = mysqli_real_escape_string($link, $_POST['reasons10']);
	   
	   /*$initialreason = $_POST['reasons'];
	    for ($i = 0; $i < count($initialreason); $i++) 
		{
                  if($i+1!=count($initialreason))
		     {
			if($initialreason[$i] !=''){
				$Reason=$Reason.$initialreason[$i].'. ';
			}
		     }
		  else
		     {
		     if($initialreason[$i] !=''){
			$Reason=$Reason.'and '.$initialreason[$i].'.';
			$Reason = ucfirst(strtolower($Reason));
			$Reason = rtrim($reason, ".");
			}
		     }
    		}
    		*/
	   $query2 = "UPDATE Dealers SET
  				About = '$about',
  				FundraiserReasons = '$Reason'
  				WHERE loginid = '$group';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link));
  	
  	 $query6 = "UPDATE fund_reasons SET
  				fundID = '$group',
  				r1 = '$reason1',
  				r2 = '$reason2',
  				r3 = '$reason3',
  				r4 = '$reason4',
  				r5 = '$reason5',
  				r6 = '$reason6',
  				r7 = '$reason7',
  				r8 = '$reason8',
  				r9 = '$reason9',
  				r10 = '$reason10'
  				WHERE fundID = '$group';";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR: ".mysqli_error($link));
  	
  	/*
  	$query3 = "UPDATE Dealers SET
  				FundraiserReasons = '$Reason'
  				WHERE setuppersonid = '$group';";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	*/ 
  	if($result2 && $result6){
  	    $redirect = "Location:contacts.php?group=$group";
  	    header("$redirect");
  	}
  	}
  	
  	
        
	$query = "SELECT * FROM Dealers WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$about = $row['About'];
	$club_type = $row['DealerDir'];
	$fundraiserid = $row['loginid'];	
	$groupPic = $row['location_pic'];
	$groupName = $row['Dealer'];
        $club_type = $row['DealerDir'];
        $salesTotal = getGroupSales($group);
        $banner_path = $row['banner_path'];
        $salesGoal = $row['FundraiserGoal'];
        $fb = $row['facebook'];
        $tw = $row['twitter'];
	
	//get saved reasons
      $query7 = "SELECT * FROM fund_reasons WHERE fundID = '$group'";
      $result7 = mysqli_query($link, $query7) or die(mysqli_error());
      $row7 = mysqli_fetch_assoc($result7);
      $re1 = $row7['r1'];
      $re2 = $row7['r2'];
      $re3 = $row7['r3'];
      $re4 = $row7['r4'];
      $re5 = $row7['r5'];
      $re6 = $row7['r6'];
      $re7 = $row7['r7'];
      $re8 = $row7['r8'];
      $re9 = $row7['r9'];
      $re10 = $row7['r10'];
	
	
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Setup/Edit Website - Reasons for Fundraiser</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
</style>
</head>

<body>
	<?php include 'header.php' ; ?>
      	<?php include 'fundSidebar.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">
 <div class="page-header">
    <h1>Edit About</h1>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
   <div id="border">
    <h3>About Your Fundraiser:</h3>
    <hr style="border-color:#b8b8b8;"><br>
   
    <p>General description and information about your fundraiser:</p>
    <form action="reasons.php" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
    <textarea name="description" cols="50" rows="5" id="description" style="padding-left:10px;padding-top:5px;"><? echo $about;?></textarea>

    <br><br>
</div>
<hr>
<div id="border">
   <h3>Reasons for Raising Money:</h3>
    <hr style="border-color:#b8b8b8;"><br>
    <p>Please select one or more purposes for your fundraiser.</p>
    <?php
    /*
      $query5 = "SELECT * FROM reasons WHERE clubType = '$club_type'";
      $result5 = mysqli_query($link, $query5) or die(mysqli_error());
      $row5 = mysqli_fetch_assoc($result5);
      $r1 = $row5['r1'];
      $r2 = $row5['r2'];
      $r3 = $row5['r3'];
      $r4 = $row5['r4'];
      $r5 = $row5['r5'];
      $r6 = $row5['r6'];
      $r7 = $row5['r7'];
      $r8 = $row5['r8'];
      $r9 = $row5['r9'];
      $r10 = $row5['r10'];
      */
      ?>
      
      Suggested reasons  
      <table>
	      <tr><td><? echo $re1;?></td><tr>
	      <tr><td><? echo $re2;?></td><tr>
	      <tr><td><? echo $re3;?></td><tr>
	      <tr><td><? echo $re4;?><td><tr>
	      <tr><td><? echo $re5;?><td><tr>
	      <tr><td><? echo $re6;?><td><tr>
	      <tr><td><? echo $re7;?></td><tr>
	      <tr><td><? echo $re8;?></td><tr>
	      <tr><td><? echo $re9;?></td><tr>
	      <tr><td><? echo $re10;?></td><tr>
      </table>
      
      <div id="graybackground">
        <div id="setupreasons" class="reasoncolumns">
          	<label><input type="text" name="reasons1" value="<?php echo $re1; ?>"></label>
              <br>
              <label><input name="reasons2" value="<?php echo $re2; ?>" type="text"></label>
              <br>
              <label><input type="text" id="reasons_2" name="reasons3" value="<?php echo $re3; ?>"></label>
              <br>
              <label><input type="text" id="reasons_3" name="reasons4" value="<?php echo $re4; ?>"></label>
              <br>
              <label><input type="text" id="reasons_4" name="reasons5" value="<?php echo $re5; ?>"></label>
              <br>
              <label><input type="text" id="reasons_5" name="reasons6" value="<?php echo $re6; ?>"></label>
              <br>
              <label><input type="text" id="reasons_6" name="reasons7" value="<?php echo $re7; ?>"></label>
              <br>
              <label><input type="text" id="reasons_7" name="reasons8" value="<?php echo $re8; ?>"></label>
              <br>
            <label><input type="text" id="reasons_8" name="reasons9" value="<?php echo $re9; ?>"></label>
              <br>
              <label><input type="text" id="reasons_9" name="reasons10" value="<?php echo $re10; ?>"></label>
          </div> <!-- end reason columns -->
 </div>         
          <br>
          
          <input name="group" type="hidden" value="<?php echo $group; ?>">   
          <input name="submit" type="submit" class="redbutton" value="Save and Continue">
          </div> <!-- end graybackground -->
          
        <p class="clearfloat"></p>
      </form>
          </div> <!--end content -->
 	    </div>
</div>
</div>
  
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