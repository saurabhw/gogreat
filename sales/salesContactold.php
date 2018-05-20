<?php
  
      include '../includes/autoload.php';
      //$groupID = $_GET['group'];
      $userID = $_SESSION['userId'];
      $email = $_SESSION['email'];
        if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../repSignup.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       //get rep info
      $getRep = "SELECT * FROM user_info WHERE userInfoId = '$userID'";
      $repResult = mysqli_query($link, $getRep)or die("MySQL ERROR query get rep: ".mysqli_error($link));
      $repRow = mysqli_fetch_assoc($repResult);
      $myPic = $repRow['picPath'];
      
      $getRep1 = "SELECT * FROM distributors WHERE email = '$email' AND role = 'SC'";
      $repResult1 = mysqli_query($link, $getRep1)or die("MySQL ERROR query get rep: ".mysqli_error($link));
      $row = mysqli_fetch_assoc($repResult1);
      $sc = $row['vpID'];
      
      $getSC = "SELECT * FROM user_info WHERE userInfoId = '$sc'";
      $scResult = mysqli_query($link, $getSC) or die("Could not get SC info".mysqli_error($link));
      $scRow = mysqli_fetch_assoc($scResult);
      $scFirst = $scRow['FName'];
      $scLast = $scRow['LName'];
      $scPhone = $scRow['workPhone'];
      $scEmail = $scRow['email'];
      $scPic = $scRow['picPath'];
    
      
      
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Getting Started</title>
</head>

<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
 	<div id="contentSample">
 		<div id="column1b">
			<div id="graybackground">
				<h3>Contact GreatMoods Sales Coordinator</h3>
				<div id="contactCard">
					<div class="pic">
						  <?
					       if($scPic == "")
					       {
						 echo '<img src="../images/profpic.png" alt="Rep Picture">';
					       }
					       else
					       {
					          echo'<img src="../'.$scPic.'" alt="Rep Picture">';
					       }
					       
					     ?>
					</div>
					<div class="info">
						<h1><? echo $scFirst.' '.$scLast;?></h1>
						<!--<h2><? echo $scPhone;?></h2>
						<h2><? echo $scEmail;?></h2>-->
					</div>
				</div>
			
				<form action="contactRep.php" method="post" enctype="multipart/form-data">
					<table id="contactus">
						<tr>
							<td><label class="right">Name</label></td>
							<td><input id="frname" type="text" name="name" value="<? echo $_SESSION['firstName'].' '.$_SESSION['lastname'];?>" placeholder="Your Organization or Name"></td>
						</tr>
						<tr>
							<td><label class="right">Email</label></td>
							<td><input id="loginemail" type="text" name="email" value="<? echo $_SESSION['email'];?>" placeholder="<? echo $_SESSION['email'];?>"></td>
						</tr>
						<tr>
							<td><label class="right">Comments<br>or Questions</label></td>
							<td><textarea id="comment" name="comment" cols="50" row="20" wrap="hard" placeholder="Hi, I just wanted to say thank-you for helping us setup our fundraiser! I do have a question about..." style="height:75px"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="hidden" name="referrer" value="<? echo $group;?>" />
							<input type="hidden" name="repmail" value="<? echo $scEmail;?>" />
							<input type="hidden" name="repfirst" value="<? echo $scFirst;?>" />
							<input type="hidden" name="replast" value="<? echo $scLast;?>" />
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