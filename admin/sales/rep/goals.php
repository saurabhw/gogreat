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
  				WHERE loginid = '$gp';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:information.php?groupid=$gp";
  	    header("$redirect");
  	}
  	}
   $group = $_GET["groupid"];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE loginid='$group' AND setuppersonid='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $fundraiserid = $row['loginid'];
   $fgoal = $row['FundraiserGoal'];
   $fstart = $row['FundraiserStartDate'];
   $fend = $row['FundraiserEndDate'];
   
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
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="reasons">
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="contentMain858">
    <div class="nav2">
          <ul id="setupNav">
        <li><a href="photos.php" class="photosnav"><<&nbsp;</a></li>
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
          <h3>Fundraising Goals</h3> 
         <!-- <p>Plan your fundraiser according to funds needed. Select a fundraiser event, enter start date and end date.
          Use the calculator to determine individual and group goals.</p>-->   

      <div id="leadBox">
        <div id="infoText">
          <div>
          <form method="post" action="goals.php" enctype="multipart/form-data">
          
          <br />
          <input type="text" name="fundStart" value="<? echo $fstart; ?>" />&nbsp;Start Date
          <br />
          <br />
          <input type="text" name="fundEnd" value="<? echo $fend;?>" />&nbsp;End Date
          <br />
          <br />
          <input type="text" name="fundGoal" value="<? echo $fgoal;?>" />&nbsp;Fundraiser Goal
          <br />
          <br />
          <!--<table class="goals" width="330px">
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            </tr>
          
            <td></td>
              <td></td>
            </tr>
          </table>-->
          <?
        $gn = $_SESSION['groupName'];	
        $a1 = $_SESSION['address1'];			
        $a2 = $_SESSION['address2'];		
        $ct = $_SESSION['city'];
        $st = $_SESSION['state'];
        $zip = $_SESSION['zip' ];
        $url = $_SESSION['url'];
        $tw = $_SESSION['tw'];
        $fb = $_SESSION['fc'];
        $pal = $_SESSION['pp'];
        $about = $_SESSION['ab'];
        $goal = $_SESSION['goal'];
        $start = $_SESSION['startDate'];
        $end = $_SESSION['endDate'];
     
          ?>
         <!-- <input type="hidden" name="group" value="<? echo $gn; ?>" />
          <input type="hidden" name="address1" value="<? echo $a1; ?>" />
          <input type="hidden" name="address2" value="<? echo $a2; ?>" />
          <input type="hidden" name="city" value="<? echo $ct; ?>" />
          <input type="hidden" name="state" value="<? echo $st; ?>" />
          <input type="hidden" name="zip" value="<? echo $zip; ?>" />
          <input type="hidden" name="url" value="<? echo $url; ?>" />
          <input type="hidden" name="twitter" value="<? echo $tw; ?>" />
          <input type="hidden" name="face" value="<? echo $fb; ?>" />
          <input type="hidden" name="about" value="<? echo $about; ?>" />
          <input type="hidden" name="goal" value="<? echo $goal; ?>" />
          <input type="hidden" name="start" value="<? echo $start; ?>" />
          <input type="hidden" name="end" value="<? echo $end; ?>" />
          <input type="hidden" name="pp" value="<? echo $pal; ?>" />
          <input type="hidden" name="id" value="<? echo $fundraiserid; ?>" />-->
          <input type="hidden" name="gp" value="<?echo $fundraiserid; ?>" />
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
     <?php include '../footer.php' ; ?>
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