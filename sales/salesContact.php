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
	<title>Contact Sales Coordinator</title>
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
<?php include 'sidenav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<br>
 <div class="page-header">
				<h2 align="center">Contact Sales Coordinator</h2>
</div>
<br>
 <div class=" col-md-7 col-md-push-2">
<div id="border">
				<div id="contactCard">
 <div class=" col-md-7 col-md-push-3 col-md-offset-1">

				<div class="pic">
				<img style="margin-top:40px;float:left;" class="img-responsive" src="../<? echo $scPic; ?>" alt="Rep Picture">
					</div>
</center>
				</div>
 <div class=" col-md-7 col-md-push-3">
					<div class="info">
						<h1><? echo $scFirst.' '.$scLast;?></h1>
    					<hr style="border-color:#b8b8b8;"><br>
						<!--<h2><? echo $scPhone;?></h2>
						<h2><? echo $scEmail;?></h2>-->
					</div>
				</div>

				<form action="contactRep.php" method="post" enctype="multipart/form-data">
					<table id="contactus">
						<tr style="line-height:35px;">
							<td style="padding-bottom:15px;"><label class="right">Name</label></td>
							<td style="padding-bottom:15px;"><input style="padding-left:5px;" id="frname" type="text" name="name" value="<? echo $_SESSION['firstName'].' '.$_SESSION['lastname'];?>" placeholder="Your Organization or Name"></td>
						</tr>
						<tr style="line-height:35px;">
							<td style="padding-bottom:15px;"><label class="right">Email</label></td>
							<td style="padding-bottom:15px;"><input style="padding-left:5px;" id="loginemail" type="text" name="email" value="<? echo $_SESSION['email'];?>" placeholder="<? echo $_SESSION['email'];?>"></td>
						</tr>
						<tr>
							<td><label class="right" style="padding-right:15px;">Comments<br>or Questions</label></td>
							<td><textarea style="padding-left:5px;" id="comment" name="comment" cols="20" row="60" wrap="hard" placeholder="Hi, I just wanted to say thank-you for helping us setup our fundraiser! I do have a question about..." style="height:75px"></textarea></td>
						</tr>
						<tr style="line-height:35px;">
							<td></td>
							<td><input type="hidden" name="referrer" value="<? echo $group;?>" />
							<input type="hidden" name="repmail" value="<? echo $scEmail;?>" />
							<input type="hidden" name="repfirst" value="<? echo $scFirst;?>" />
							<input type="hidden" name="replast" value="<? echo $scLast;?>" />
							<input type="hidden" name="gn" value="<? echo $groupName;?>" />
							<input type="hidden" name="ct" value="<? echo $club_type;?>" />
						<br>
							
								<input id="mailbutton" type="submit" name="submit" class="redbutton" value="Send Email" />
			
							</td>
						</tr>
						
					</table>
				</form>

			</div>
	</div>
	<!--<div id="column2b">
		<br>
	</div>--> <!--end column2b-->
  </div> <!--end content -->
</div> <!--end container-->	
</div>	
<br>
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
   ob_end_flush();
?>