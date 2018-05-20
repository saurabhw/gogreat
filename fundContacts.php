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
     /* $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];*/
      
      
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
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
	<li><a href="index.php">GreatMoods <br/>Homepage</a></li>
	<li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
	<?if($_SESSION['LOGIN'] == "TRUE"){
	echo '<li><a href="'.$_SESSION['home'].'" />Log In<br>Home</a></li>';
	echo '<li><a href="fundMember/memberHome.php">Account<br>Home</a></li>';
	}?>
      </ul>
    </div>    <!--end mainNav--> 
  </div>  <!--end headerMain-->
  
<div id="leftSideBarSample">
  <ul id="sideNavSample">
  <!--<img src="<?php echo "../".$contact_pic;?>" width="128" height="150" alt="contact photo">-->
          <?
       if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member")
       {
         echo '
     	 <li><a href="fundMember/memberHome.php">My Account Home</a></li>
     	 ';
       }
     	?>
     	<?
       if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "fundOwner")
       {
         echo '
     	 <li><a href="editFundraiser/coordhome.php">Account Home</a></li>
     	 ';
       }
     	?>
	<li><a href="fundaboutus.php?group=<?php echo $_SESSION['groupid']; ?>">About Our Fundraiser</a></li>
    	<li><a href="fundContacts.php?group=<?php echo $_SESSION['groupid']; ?>">Fundraising Contacts</a></li>
    	<?php include 'includes/menu_fundraising_examples.php'; ?>
        <li><a href="" class="drop">GreatMoods<br>Mall Directory</a>   
       	<?
       if(isset($_SESSION['authenticated']))
       {
         echo '
		<li><a href="">Help<br>Training Tips,<br>Tools & Forms</a></li>
              ';
       }
     	?> 
  </ul>
</div>

 <div id="contentSample">
   <div>
      <h3><?php echo $title; ?> Fundraising Contacts</h3>

     <!-- <div class="leaderphoto"><img src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $leader_title; ?></strong><br />
            <span class="leadername"><?php echo $leader; ?></span><br />
            <?php echo $leader_email; ?><br />
            <?php echo $leader_phone; ?><br /><br><br><br></p>
        </div> <!--end contactinfo2-->
              
     <!-- <div>
        <div class="leaderphoto"><img src="<?php echo $student_photo;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername">J. Doe</span><br />
            jdoe@email.com<br />
        </div> <!--end contactinfo2--> 
      </div> <!--end studentleader-->

    <br>   
	<table>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone #</th>
        <th>Email Address</th>
        <?
        while( $row2 = mysqli_fetch_assoc($result2))
        {
          echo '<tr><td>'.$row2['orgFName'].'</td><td>'.$row2['orgLName'].'</td><td>'.$row2['orgPhone'].'</td><td>'.$row2['orgEmail'].'</td></tr>';
        }
        ?>
    </table>
        <div class="clearfloat">  </div>
  </div>
	

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>