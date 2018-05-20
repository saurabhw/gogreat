<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['groupid'];
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
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
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
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
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
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
        <li><a href="basketsproducts_fund.php?groupid=<?php echo $groupID; ?>">Gift Baskets<br>& Products</a></li>
        <li><a href="editFundraiser/gettingstarted.php?group=<? echo $groupID;?>">Getting<br>Started</a></li>
        <?
         <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
          <li><a href="editFundraiser/fndsitehlp">Help</a></li>
        
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <ul id="sideNavSample">
    	<li><b>Fundraiser<br>Homepage</b></li>
     	<li><a href="editFundraiser/coordhome.php">My Account</a></li>
     	<li><a href="basketsproducts_fund.php?groupid=<?php echo $groupID; ?>">Gift Baskets<br>& Products<br>Order Now!</a></li>   
	<li><a href="editFundraiser/about.php?goupid=<?php echo $groupID; ?>">About Our Fundraiser</a></li>
    	<li><a href="editFundraiser/fundContacts.php?goupid=<?php echo $groupID; ?>">Fundraising Contacts</a></li>
       	<li><a href="">Help<br>Training Tips,<br>Tools & Forms</a></li>
  </ul>
</div>

 <div id="contentSample">
    
      <h3 class="sample">Please Support Our <?php echo $title; ?> Fundraiser!</h3>
      
    </div>
    <!--end baskets-->
    
    <div id="goals">
      <p><strong>My Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end my goal-->
    
    <div id="goals">
      <p><strong>Group Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end group goal-->
    
    <div class="clearfloat">
    <br>
    </div>
    <div id="col1">
    <img class="mainphoto" src="<?php echo $leader_photo;?>" width="138" height="184" alt="contact photo">
    <br>
      <h5 class="contactinfo1">Our Contact<br>Information</h5>
      <div class="contactinfobox">
	      <img id="icons" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
	      <img src="../images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon">
	      <img src="../images/icons/googleplus_icon.png" width="22" height="22" alt="google plus icon">
        	<div>
          		<p class="contactinfo1"><?php echo $group_email; ?><br><?php echo $phone; ?></p>
      		</div>
      </div> <!--end contactinfobox--> 
      <br>
      <div class="leader">
        <div class="leaderphoto"><img src="<?php echo $contact_pic;?>" width="106" height="106" alt="Leader photo"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $leader_title; ?></strong><br />
            <span class="leadername"><?php echo $leader; ?></span><br />
            <?php echo $leader_email; ?><br />
            <?php echo $leader_phone; ?><br />
            <img src="../images/icons/video_icon.png" width="41" height="51" alt="play video icon"> </p>
        </div>
        <!--end contactinfo2-->
      </div>
      <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="<?php echo $student_photo;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername">J. Doe</span><br />
            jdoe@email.com<br />
        </div>
        <!--end contactinfo2--> 
      </div>
      <!--end studentleader--> 
      <!--about fundraiser-->
           <p><? echo $about;?></p>

    </div>
    <!--end col1-->
    
    <div id="col2">
      <h5 id="reasons">Reasons for Our Fundraiser</h5>
      <?php
         echo '<div id ="reasoncontent">'; 
         $r_list = explode('.', $reasons);
         echo '<ul>';
         foreach ($r_list as $item){
             echo '<li>', trim($item), '</li>';
         }
         echo '</ul>';
         echo '</div>';
      ?>
      
      <br />
      <img src="<?php echo $group_photo;?>" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>