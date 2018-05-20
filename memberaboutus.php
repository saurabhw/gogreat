<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = '$groupID'";
      $result1 = mysqli_query($link, $query1) or die(mysqli_error());
      $row = mysqli_fetch_assoc($result1);
      $club_name = $row['Dealer'];
      $club_type = $row['DealerDir'];
      $goal = $row['FundraiserGoal'];
      $reasons = $row['FundraiserReasons'];
      $about = $row['About'];
      $a1 = $row['Address1'];
      $a2 = $row['Address2'];
      $ct = $row['City'];
      $st = $row['State'];
      $zp = $row['Zip'];
      $start = $row['FundraiserStartDate'];
      $end = $row['FundraiserEndDate'];
      
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
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
      $result2 = mysqli_query($link, $query2) or die(mysqli_error());
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      
      
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>About Our Fundraiser | Member</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo "../".$banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
     <div id="login">
      <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="includes/logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
                echo '<a href="">Register Now</a></p>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('includes/logout.inc.php');
              }
         ?>
    </div>
    <!--end login--> 
    
    <div id="mainNav">
      <ul id="menu">
	<li><a href="index.php">GreatMoods<br>Homepage</a></li>
	<li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
		<?php include 'includes/menu_mall_directory_site.php'; ?>
	<?if($_SESSION['LOGIN'] == "TRUE"){
	echo '<li><a href="'.$_SESSION['home'].'" />Log In<br>Home</a></li>';
	echo '<li><a href="fundMember/memberHome.php">Account<br>Home</a></li>';
	}?>
      </ul>
    </div>    <!--end mainNav--> 
  </div>  <!--end headerMain-->
  
<div id="leftSideBarSample">
  <ul id="sideNavSample">
	  <li><a href="index.php">GreatMoods <br/>Homepage</a></li>
	  <li><a href="fundaboutus.php?group=<?php echo $_SESSION['groupid']; ?>">About Our<br>Fundraiser</a></li>
	  <hr>
          <? if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member"){
         echo '<li><a href="fundMember/memberHome.php">Account<br>Home</a></li>';
       }?>
     	<? if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "fundOwner"){
         echo '<li><a href="editFundraiser/coordhome.php">Account<br>Home</a></li>';
       }?>
  </ul>
</div>

 <div id="contentSample">
    
      <h3>About Our <?php echo $title; ?> Fundraiser</h3>
      	<div id="col1">
      	<div>
    		<div class="leaderphoto"><img src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        	<div class="contactinfo2">
          		<p class="contactinfo2"><strong><?php echo $leader_title; ?></strong><br>
            		<span class="leadername"><?php echo $leader; ?></span><br>
            		<?php echo $leader_email; ?><br>
            		<?php echo $leader_phone; ?><br><br><br><br></p>
        	</div> <!--end contactinfo2-->
              
	<div>
        	<div class="leaderphoto"><img src="<?php echo $student_photo;?>" width="106" height="106" alt="Leader"></div>
        	<div class="contactinfo2">
          		<p class="contactinfo2"><strong>Student Leader</strong><br>
            		<span class="leadername">J. Doe</span><br>
        	</div> <!--end contactinfo2--> 
      	</div> <!--end studentleader-->
    		
    	<?echo $about;?> 
	</div> <!--end about-->
	
	<div>
		<h5>Goals</h5>
		Starting Date: <?php echo $start; ?> <br>
		Ending Date: <?php echo $end; ?><br>
		Our Goal: $<?php echo $goal; ?> <br>
		Raised So Far: $<?php echo $so_far; ?>
	</div> <!--end group goal-->
	
    <div>
    	<br>
    	<h5>Reasons for Our Fundraiser</h5>
      <?php
         echo '<div>'; 
         $r_list = explode(',', $reasons);
         echo '<ul>';
           foreach ($r_list as $item){
             if ($item != ''){
               echo '<li>', trim($item), '</li>';
            }
           }
         echo '</ul>';
         echo '</div>';
      ?>
      </div> <!--end reasons-->
    </div> <!--end col1-->
    
    <div id="col2">
    <h5>Our Contact Information</h5>
    <p><?php echo $club_name; ?><br>
    <?php echo $a1; ?><br>
    <?php echo $ct; ?>, <?php echo $st; ?> <?php echo $zp; ?><br>
    Email:&nbsp; <?php echo $email; ?><br>
    Phone:&nbsp; <?php echo $phone; ?>
    </p>
    <img src="<?php echo $group_photo;?>" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
  </div>
  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>