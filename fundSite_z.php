<?php
      session_start();
     /* if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/
      ob_start();
      
      include("includes/connection.inc.php");
      $link = connectTo();
      /*
      if (isset($_SESSION['authenticated'])){
          // logging in user
          $groupID = $_SESSION['groupid'];
      }else{
        // customer from a link(not logged in)
      	$groupID = $_GET['group'];
        } 
        */
      $groupID = $_GET['group']; 
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = '$groupID'";
      $result1 = mysqli_query($link, $query1) or die("couldn't execute query 1.".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $club_name = $row['Dealer'];
      $club_type = $row['DealerDir'];
      $goal = $row['FundraiserGoal'];
      //$reasons = $row['FundraiserReasons'];
      $about = $row['About'];
      $so_far = '0';
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      $location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $banner_path = $row['banner_path'];
      $_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      $start = $row['FundraiserStartDate'];
      $end = $row['FundraiserEndDate'];
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysql_error());
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
      $result2 = mysqli_query($link, $query2) or die("couldn't execute query 2.".mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
        $cap = "Select * FROM captions WHERE fundid = '$groupID'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysql_error());
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];  
        
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $owner = $row3['orgFName'].' '.$row3['orgLName'];
      $owner_email = $row3['orgEmail'];
      $owner_phone = $row3['orgPhone'];  
      
     
   
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>Group Fundraising Website | GreatMoods</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link type="text/css" rel="stylesheet" href="../css/global_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">
</head>

<body>
<div id="container">
  <div id="headerMain"> 
  	<div id="bannerwrap"><a href="http://greatmoods.com"><img id="logo2" src="images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="<?php echo $banner_path;?>" width="1175" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->

      <ul class="nav">
			<li><a href="#">My Account</a>
		    		<div class="newlogin">
				        <?php
				            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
				                echo '<form id="newlogin" action="../logInUser.php" method="post">';
				                echo '<label class="userlogin">Username:</label>
				                      <input id="loginemail" type="text" name="email" value="">';
				                echo '<br>';
				                echo '<label class="userlogin">Password:</label>
				                      <input id="loginpassword" type="password" name="password" value="" >';
				                echo '<br>';
				                echo '<input id="redbutton" class="user" name="login" type="submit" value="Login" />';
				                echo '</form>';
				                
				            } elseif($_SESSION['LOGIN'] == "TRUE") {
				                echo '<div class="mallmenu">
				         		<div class="nav-column">';
				                echo '<h4><a href="index.php">GreatMoods Homepage</a></h4>';
				         	echo '<h4><a href="editFundraiser/leaderLogin.php" />Login Home</a></h4>';
				         	echo '<h4><a href="editFundraiser/coordhome.php" />Account Home</a></h4>';
				         	include('includes/logout.inc.php');
				         	echo '</div>
				         		</div>';
				              }
				         ?>
			    
		      		</div> <!--end login-->
		    	</li>
			<!-- <li><a href="index.php">GreatMoods Homepage</a></li> -->
		    
		<li><a href="#">Women</a>
	        <?php include 'includes/menu_women.php'; ?>
		    </li>
		    <li><a href="#">Accessories</a>
		        <?php include 'includes/menu_accessories.php'; ?>
		    </li>
		    <li><a href="#">Men</a>
		        <?php include 'includes/menu_men.php'; ?>
		    </li>
		    <li><a href="#">Juniors</a>
		        <?php include 'includes/menu_juniors.php'; ?>
		    </li>
		    <li><a href="#">Kids</a>
		        <?php include 'includes/menu_kids.php'; ?>
		    </li>
		    <li><a href="#">Baby</a>
		        <?php include 'includes/menu_baby.php'; ?>
		    </li>
		    <li><a href="#">Fitness</a>
		        <?php include 'includes/menu_fitness.php'; ?>
		    </li>
		    <li><a href="#">Food</a>
		        <?php include 'includes/menu_food.php'; ?>
		    </li>
		    <li><a href="#">Entertainment</a>
		        <?php include 'includes/menu_entertainment.php'; ?>
		    </li>
		    <li><a href="#">Housewares</a>
		        <?php include 'includes/menu_housewares.php'; ?>
		    </li>
		    <li><a href="#">Health</a>
		        <?php include 'includes/menu_health.php'; ?>
		    </li>
		    <li><a href="#">Inspirational</a>
		        <?php include 'includes/menu_inspirational.php'; ?>
		    </li>
		    <li><a href="#">Holiday</a>
		        <?php include 'includes/menu_holiday.php'; ?>
		    </li>
		    <li><a href="#">Business</a>
		        <?php include 'includes/menu_business.php'; ?>
		    </li>
		   <li><a href="#">Education Examples</a>
		    	<?php include 'includes/menu_education_examples.php'; ?>
		    </li>
		    <li><a href="#">Organizations</a>
		    	<?php include 'includes/menu_organization_examples.php'; ?>
		    </li>
	</ul>
  </div> <!--end headerMain-->
  
  

<div id="leftSideBar">
	<ul id="sideNav">
          	<div class="profileimgcrop"><img src="<?php echo $group_photo; ?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
          	
          	<ul id="sideNavSample">
		      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
		      <li><a href="gm_programoverview.php">GreatMoods Program Overview</a></li>
		      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">About GreatMoods</a></li>
		      <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Getting Started</a></li>
		</ul>
          	
		<? 
		if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "fundOwner") {
			echo '
	  	<br>
		
		<h4>Program Overview</h4>
	       	<ul id="sideNav">
	             <li><a href="editFundraiser/gm_mission.php" title="">Mission</a></li>
	             <li><a href="editFundraiser/gm_program.php" title="">GreatMoods Program</a></li> 
	             <li><a href="editFundraiser/gm_getStarted.php" title="">Get Started Today!</a></li> 
	      	</ul>
	      	
	      	<br>
	      	
	      	<!-- collapsible menu -->
		<!--<h4>Training & Tutorials</h4> 
		<ul id="sideNav"> 
			<li><a href="#"></a></li>                                           
		</ul> 
		
		<br>-->
		
		<h4>Account Administration</h4>
	       	<ul id="sideNav">
	       		
	             <li><a href="editFundraiser/goals.php" title="">Goals & Achievements</a></li>
	             <li><a href="editFundraiser/fundTools.php" title="">Fundraising Tools</a></li>
	             <li><a href="editFundraiser/coordhome.php" title="Account Home">View Team & Accounts</a></li> 
	             <li><a href="editFundraiser/contacts.php" title="">View Fundraiser Contacts</a></li>
	             <li><a href="editFundraiser/emails.php">Send Emails</a></li>
		     <li><a href="editFundraiser/viewReports.php">$ales Reports</a></li>
		     <li><a href="editFundraiser/memberReports.php">Member Reports</a></li>
	             <!--<li><a href="editFundraiser/addFundGroup.php" title="">Add Fundraiser Group</a></li>-->
	             <li><a href="editFundraiser/addFundLeader.php" title="">Add Fundraiser Leader</a></li>
	             <li><a href="editFundraiser/members.php" title="">Add Fundraiser Member</a></li> 
	             <li><a href="editFundraiser/addFriendFamily.php" title="">Add Friend & Family</a></li> 
	             <li><a href="editFundraiser/addBusinessSupporter.php" title="">Add Business Supporter</a></li> 
	             <li><a href="editFundraiser/addBusinessAssociate.php" title="">Add Business Associate</a></li> 
	             <li><a href="editFundraiser/information.php" title="">Edit My Account</a></li>
		     <li><a href="editFundraiser/reasons.php">Edit Fundraiser Description</a></li>
		     <li><a href="editFundraiser/photos.php">Change Photos</a></li><li><a href="fundSite.php?group= '.$_GET['group'].'">View My Website</a></li> 
		    <!-- <li><a href="editFundraiser/leaderLogin.php" />Login Home</a></li>-->
	      	</ul>
	      	';
	       	} 
	       	?>
	       	
	       	<ul id="sideNav">
			
		</ul>
	</ul> <!-- end sidenav -->
</div> <!-- end leftSideBarSample -->

<div id="contentSample">
  	<div id="column1">
  		<h3 class="sample">Please Support Our <? echo $club_type; ?> Fundraiser!</h3>
  		
  		<div class="grpcollage">
  			<img src="<?php echo $group_photo;?>" height="258" alt="UPLOAD YOUR GROUP PICTURE HERE!">
  		</div>
  		
  		<div class="reasonsbox">
	  		<h5 id="reasons">About Our Fundraiser</h5>
	  		<?php 
	  			echo "<p>";
	  			echo $about;
	  			echo "</p>";
	  		?>
		        
		        <h5 id="reasons">Reasons for Our Fundraiser</h5>
		        <?php
		        
		        $query5 = "SELECT * FROM fund_reasons WHERE fundID = '$groupID '";
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
		      ?>
		      <table>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r1;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r2;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r3;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r4;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r5;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r6;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r7;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r8;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r9;?></td></tr>
			      <tr><td><i class="fa fa-circle"></i><?php echo $r10;?></td></tr>
		      </table>
	      </div>

	      <div id="goals">
	      <br />
	      <p><strong>Group<br>Goal</strong><br>
	        $<?php echo $goal; ?></p><br/>
	      <p><strong>Raised<br />
	        So Far</strong><br />
	        $<?php echo $so_far; ?>.00</p>
	    </div>    <!--end goals--> 
	    
	    <div class="leader">
	          <img src="<?php echo $leader_photo;?>" alt="UPLOAD YOUR LEADER PICTURE HERE!">
	        <div class="contactinfo2">
	          <span><strong><? echo $club_type; ?> Leader</strong></span>
	          <br>
	            <span class="leadername"><?php echo $a1; ?>&nbsp;<?php echo $a1n; ?></span>
	        </div>
	      </div>      <!--end leader-->    
	      
	      <div class="studentleader">
	        <div class="studentleaderphoto">
	          <img src="<?php echo $student_photo;?>" alt="UPLOAD ANY PICTURE HERE!">
	        </div>
	        <div class="contactinfo2">
	         <!-- <span><strong>Student Leader</strong></span>
	          <br>
	            <span class="leadername"><?php echo $a3; ?>&nbsp;<?php echo $a3n; ?></span>-->
	        </div>
	      </div>      <!--end studentleader-->
	      
	      
	      
  	</div> <!-- end column1 -->
  	
  	<div id="column2">
  		<!--<div class="shopDetails">
	        <ul class="stumenu">
	          <h5>Shopping Ideas For...</h5>
	          <li><a href="">Mothers &amp; Grandmas</a></li>
	          <li><a href="">Fathers &amp; Grandpas</a></li>
	          <li><a href="">Boys &amp; Girls</a></li>
	          <li><a href="">Teen Boys</a></li>
	          <li><a href="">Teen Girls</a></li>
	          <li><a href="">Men &amp; Women</a></li>
	          <li><a href="">Special Friends</a></li>
	          <li><a href="">Students Away at School</a></li>
	          <li><a href="">Me Me Me (It's OK...)</a></li>
	        </ul>
	      </div>
	      
	      <br>
  		
  		<div class="bestsellers">
	      	<h5>Best Sellers</h5>
			<img src="images/sanmar_LSW289.jpg" width="190" height="" alt="bestsellers">
	      </div>-->
  	</div> <!-- end column2 -->  
</div> <!--end content-->

  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>