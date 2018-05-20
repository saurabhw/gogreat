<?php
  
      session_start();
     if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      include("../includes/functions.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $group = $_SESSION['groupid'];
       
      $table = "Dealers";
      $table1 = "user_info";
      $table2 = "users";
      $table3 = "orgMembers";

	//$_SESSION['groupid'] = $_GET['group'];
        $query = "SELECT * FROM $table WHERE loginid = '$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
        $url = $row['website'];
        $twit = $row['twitter']; 
        $face = $row['facebook'];
        $user_name = $row['userName'];
        $user_pass = $row['firstPass'];
        $repID = $row['setuppersonid2'];
        $ab = $row['About'];
        $fgoal = $row['FundraiserGoal'];
        $myPic = $row['contact_pic'];
        $first_mail = $row['userName'];
        $banner = $row['banner_path'];
        $first_pass = $row['firstPass'];
       

       $goal = $row['goal2'];
       $so_far = getSoloSales($fundraiserid);
        
        //get member data
        $query1 = "SELECT * FROM $table1 WHERE email='$user_name'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row1 = mysqli_fetch_assoc($result1);
	$first_name = $row1['FName'];
	$last_name = $row1['LName'];
	$em = $row1['email'];
	$tel = $row1['homePhone'];
	$gender = $row1['gender'];
	$ttl = $row1['title'];
       if(isset($_SESSION['authenticated']))
	{
	    $g = $group;
	}
	else
	{ 
	    $g = $_GET['group'];
        }
        
        //get rep info
        $getRep = "SELECT * FROM user_info WHERE userInfoId = '$repID'";
        $repResult = mysqli_query($link, $getRep)or die("MySQL ERROR query get rep: ".mysqli_error($link));
        $repRow = mysqli_fetch_assoc($repResult);
        $repFirst = $repRow['FName'];
        $repLast = $repRow['LName'];
        $repPhone = $repRow['workPhone'];
        $repEmail = $repRow['email'];
        $repPic = $repRow['picPath'];
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Getting Started</title>
</head>

<body>
<div id="container">
	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>

 	<div id="contentSample">
 		<div id="column1b">
			<div id="graybackground">
				<h3>Contact GreatMoods Representative</h3>
				<div id="contactCard">
					<div class="pic">
						<img src="../<? echo $repPic; ?>" alt="Rep Picture">
					</div>
					<div class="info">
						<h1><? echo $repFirst.' '.$repLast;?></h1>
						<h2><? echo $repPhone;?></h2>
						<h2><? echo $repEmail;?></h2>
					</div>
				</div>
			
				<form action="contactRep.php" method="post" enctype="multipart/form-data">
					<table id="contactus">
						<tr>
							<td><label class="right">Name</label></td>
							<td><input id="frname" type="text" name="name" value="" placeholder="Your Organization or Name"></td>
						</tr>
						<tr>
							<td><label class="right">Email</label></td>
							<td><input id="loginemail" type="text" name="email" value="" placeholder="yourprimarycontact@email.com"></td>
						</tr>
						<tr>
							<td><label class="right">Comments<br>or Questions</label></td>
							<td><textarea id="comment" name="comment" cols="50" row="20" wrap="hard" placeholder="Hi, I just wanted to say thank-you for helping us setup our fundraiser! I do have a question about..." style="height:75px"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="hidden" name="referrer" value="<? echo $group;?>" />
							<input type="hidden" name="repmail" value="<? echo $repEmail;?>" />
							<input type="hidden" name="repfirst" value="<? echo $repFirst;?>" />
							<input type="hidden" name="replast" value="<? echo $replast;?>" />
							<input type="hidden" name="gn" value="<? echo $groupName;?>" />
							<input type="hidden" name="ct" value="<? echo $club_type;?>" />
						
							
								<input id="mailbutton" type="submit" name="submit" class="redbutton" value="Send Email" />
			
							</td>
						</tr>
						
					</table>
				</form>
			</div> <!-- end graybackground -->
		</div> <!--end column1b -->
	
	<div id="column2b">
		<br>
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>