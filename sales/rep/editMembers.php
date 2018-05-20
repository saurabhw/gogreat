<?php
	session_start();
	if(!isset($_SESSION['authenticated'])){                                                                                                                                                  
		header('Location: ../../index.php');
		exit;
    		}
	ob_start();

	
	include'../../includes/connection.inc.php';
	
	//$type = mysql_real_escape_string($_POST['fundtype']);$userrepid=$useridrow['loginid'];
	$link = connectTo();
	        $group = $_GET['groupid'];
		$userID = $_SESSION['userId'];                                        
		$user_email = $_SESSION['email'];
		$table = "orgMembers";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 20;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('loginid') FROM $table where fund_owner_id='$group'";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysql_error()); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM $table WHERE fund_owner_id='$group'  ORDER BY orgLName ASC LIMIT $start_from, $per_page";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
		//$row = mysqli_fetch_assoc($result);
		/*
		// $total_records = $row[0];
		// $total_pages = ceil($total_records / 20);
		*/

?>
<!DOCTYPE html>
<head>
<title>View Members | Sales Coordinator</title>
<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="container">
		<?php include 'header.inc.php' ; ?>
      		<?php include 'acct_sidenav.php' ; ?>
      
		<div id="content">
			
			<h1>View Members</h1>
			<div> <!--no closing tag?-->
  
			         <h3>Current Account Group Members</h3>
			         <!--<a href="editClub.php"><input id="" type="button" name="button" value="Choose New Account" /></a>--><br>
				<div id="bannertable">
					<div id="graybackground5">
						<div id="row">
							<span id="fname">First</span>
							<span id="lname">Last</span>
							<span id="loginemail">Email</span>
						</div> <!-- end row -->
						<? 
						while ($row = mysqli_fetch_assoc($result))
						{
							$site = $row['fundraiserID'];
							$credSet = $row['userNameSet'];
							$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
		                                        $resultz = mysqli_query($link, $queryz)or die ("couldn't execute query contacts query.".mysql_error());
							echo'<div id="row">
								<input id="fname" name="" type="text" value="'.$row['orgFName'].'" readonly="readonly" title="First Name">
								<input id="lname" name="" type="text" value="'.$row['orgLName'].'" readonly="readonly" title="Last Name">
								<input id="loginemail" name="" type="text" value="'.$row['orgEmail'].'" readonly="readonly" title="Email Address">
								<!--<input id="dhname" name="" type="text" value="" readonly="readonly" >
								<input id="dhname" name="" type="text" value="" readonly="readonly" >-->
								<!--<input id="dhytd" name="" type="text" value="" readonly="readonly" >-->
								<a href="editMember.php?groupid='.$site.'"><input id="redbutton" type="button" value="Edit Acct" title="Edit Account Details"/></a>
								<a href="memberContacts.php?groupid='.$site.'"><input id="redbutton" type="button" value="Friends & Family" title="View or Add Contacts"/></a>
								<a href="../../membersite.php?group='.$site.'"><input id="redbutton" type="button" name="submit" value="View Site" title="View Fundraising Website"/></a>';
								//if(mysqli_num_rows($resultz) > 0)
								if($credSet == 1){
								      
									echo'<form method="post" action="custEmail.php">
										<input type="hidden" name="to" value="'.$row['email'].'" /> 
										<input type="hidden" name="from" value="'.$user_email.'" />
										<input type="hidden" name="clubidemail" value="'.$row['loginid'].'" />
										<input id="redbutton" type="submit" name="submit1" value="Send Email" />
										</form>';
								}
								else{
									echo' ';
								}    
								echo'<span><form method="post" action="deleteMember.php">
									<input type="hidden" name="clubid" value="'.$site.'" />
									<input type="hidden" name="clubid_top" value="'.$_GET['groupid'].'" />
									<input id="redbutton" type="submit" name="submit2" value="X" title="Delete Account" />
									</form></span>
								
								<!--<a href="user.php?groupid='.$site.'"><input id="redbutton" type="submit" name="submit2" value="Edit Login" /></a>-->
								';
								echo'</div>';		
									$x++;
							}
						?>			
					
					<!--<?
						if($pages >= 1 && $page <= $pages){
							for($x = 1; $x <= $pages; $x++){
							echo'<a href="?page='.$x.'">'.$x.'</a> ';
							}
						}
					?>-->
				</div> <!-- end graybackground5 -->	
				<br />	
                                <a href="members.php?groupid=<? echo $group; ?>" /><input id="redbutton" type="button" value="Add Members" /></a>
				</div> <!-- end table -->
			
		</div> <!--end content-->
	</div> <!--end container-->
	<?php include 'footer.php' ; ?>
</body>