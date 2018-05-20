<?php
  
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      include("../includes/functions.php");
      $link = connectTo();
      $userID = $_SESSION['userId'];
      $groupID = $_GET['group'];
      $group = $_SESSION['groupid'];
        if(isset($_SESSION['authenticated']))
	{
	    $g = $group;
	}
	else
	{ 
	    $g = $_GET['group'];
        }
       $table = "Dealers";
      $table1 = "user_info";
      $table2 = "users";
      $table3 = "orgMembers";

	//$_SESSION['groupid'] = $_GET['group'];
        $query = "SELECT * FROM $table WHERE loginid = '$g'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
        $url = $row['website'];
        $twit = $row['twitter']; 
        $face = $row['facebook'];
        $user_name = $row['userName'];
        $user_pass = $row['firstPass'];
        $repID = $row['setuppersonid2'];
        $parent = $row['setuppersonid'];
        $ab = $row['About'];
        $fgoal = $row['FundraiserGoal'];
        $myPic = $row['contact_pic'];
        $first_mail = $row['userName'];
        $banner = $row['banner_path'];
        $first_pass = $row['firstPass'];
       

        //$goal = $row['goal2'];
        $so_far = getSoloSales($fundraiserid);
        //get parent info
        $getParent = "SELECT * FROM Dealers WHERE loginid = '$parent'";
        $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
        $pRow = mysqli_fetch_assoc($pResult);
        $goal = $pRow['goal2'];
        
        //get member data
        $query1 = "SELECT * FROM $table1 WHERE email='$user_name'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
	$row1 = mysqli_fetch_assoc($result1);
	$fn = $row1['FName'];
	$ln = $row1['LName'];
	$em = $row1['email'];
	$tel = $row1['homePhone'];
	$gender = $row1['gender'];
	$ttl = $row1['title'];
       
        
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

	<?php include 'header(1).php' ; ?>
	<?php if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member" || $_SESSION['role'] == "MemberLeader")
	{  
	   include 'memberSidebar_new.php';
	}
	else
	{
	  include 'memberSidebar2.php'; 
	}
	?>
<div id="container">
 	<div id="contentSample">
 		<div id="column1">
 			<h1>Get Started Today!</h1>
 			<br>
			<div class="graybackground">
				<div id="contactCard">
					<h3>Contact GreatMoods Representative</h3>
					<div class="info">
						<h1><? echo $repFirst.' '.$repLast;?></h1>
						<!--<h2><? echo $repPhone;?></h2>
						<h2><? echo $repEmail;?></h2>-->
						<br>
						<h1>Will Be Happy To Help You! <i class="fa fa-smile-o navicon"></i></h1>
					</div> <!-- end info -->
					<div class="pic">
					     <?
					       if($repPic == "")
					       {
						 echo '<img src="../images/profpic.png" alt="Rep Picture">';
					       }
					       else
					       {
					          echo'<img src="../'.$repPic.'" alt="Rep Picture">';
					       }
					       
					     ?>
					</div> <!-- end pic -->
			
					<form action="contactRep.php" method="post" enctype="multipart/form-data">
					<table id="">
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
							<td>
								<input type="hidden" name="referrer" value="<? echo $group;?>" />
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
				</div> <!-- end contactCard -->
			</div> <!-- end graybackground -->
		</div> <!--end column1 -->
	
		<div id="column2">
			<div class="shopDetails">
				<ul class="stumenu">
					<h5>Shopping Ideas For...</h5>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Mothers/c/18209955/offset=0&sort=priceAsc">Mothers</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandmas/c/18209956/offset=0&sort=priceAsc">Grandmas</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Fathers/c/18209957/offset=0&sort=priceAsc">Fathers</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandpas/c/18209958/offset=0&sort=priceAsc">Grandpas</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Girls/c/18209959/offset=0&sort=priceAsc">Teen Girls</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Boys/c/18209960/offset=0&sort=priceAsc">Teen Boys</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Girls/c/18209961/offset=0&sort=priceAsc">Girls</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Boys/c/18209962/offset=0&sort=priceAsc">Boys</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Love-&-Romance/c/18209963/offset=0&sort=priceAsc">Love &amp; Romance</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Special-Friends/c/18209964/offset=0&sort=priceAsc">Special Friends</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Students-Away-at-School/c/18209965/offset=0&sort=priceAsc">Students Away at School</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Customer-&-Clients/c/18209966/offset=0&sort=priceAsc">Customeres &amp; Clients</a></li>
					<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Me-Myself-&-I-Its-Okay/c/18209967/offset=0&sort=priceAsc">Me, Myself &amp; I</a></li>
					</ul>
			</div>

			<br>

			<div class="bestsellers">
				<h5>New Arrivals Daily!</h5>
				<img src="../images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
			</div> <!-- end new arrivals -->
		</div> <!--end column2--> 
	</div>  <!-- end contentSample -->

  <?php include 'footer(1).php' ; ?>
</div><!-- end container-->
</body>
</html>
<?php
   ob_end_flush();
?>