<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
         
          
      }
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
  <div id="headerMain"> <img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
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
                include('../includes/logout.inc.php');
              }
         ?>
    </div>
    <!--end login-->
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php">Homepage</a><li>
		<li><a href="basketsproducts.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <li><a href="setupEditWebsite/fundtype.php">Setup/Edit<br/>
          Website</a></li>
        <li><a href="">Setup/Edit<br/>
          Members</a></li>
        <li><a href="">Setup/Edit<br/>
          Emails</a></li>
        <li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <?php include 'leftSidebarNavFundraiser.php'; ?>

  <div id="content">
    		</br>
    		<h3>The Greatmoods Program</h3>
			    <div id="column1">
<p>1)	Every Student, or Member of every Team, Club, Church or Organization gets their own Free Individually Personalized Fundraising Website</p>
<p>2)	Any person of any age is a potential Gift Basket recipient year-round, multiple times a year</p>
<p>3)	All of the GreatMoods Fundraising orders are processed online using PayPal, the most trusted and fraud proof online ordering system for the consumer market today</p>
<p>4)	Cash is distributed next day to your PayPal Account on every order 24/7, 365 days a year</p>
<p>5)	2 Major Income-Generating Fundraisers a year with one simple setup in the Fall and Spring</p>
<p>6)	Selling door-to-door really isn’t required because all of your Fundraising can be done online with friends, family and neighbors from all over the country</p>
<p>7)	We Deliver!!! You don’t touch the product, because it is delivered straight to the designated customer/recipient</p>
<p>8)	It’s Free, Now & Forever, No cost of anything to anyone, EVER</p>
<p>9)	Now & Forever your websites are free and all you have to do is maintain new members and delete old ones a couple times a year</p>
<p>10)	New, absolutely! Facebook is new, Texting is new, Personalized Fundraising Websites are new, being new and online is certainly a good thing for all your members and customers</p>
<p>11)	New to technology; never worry about that with today’s kids and family members this Fundraising program can be setup in no time at all</p>
<p>12)	Sign up Today, and lets get started <br>
Here’s How (3 simple steps)
</p>

    
    </div>
    <!--end column1-->
    
    <div id="column2">
    <img src="../../images/rep-pages/3baskets.png" width="347" height="270">
    

      <!--end leadBox--> 
    </div>
    <!--end column2-->
    
<!--    <p>[“Next” Button] – links to What is the Greatmoods Product Line			[“Back to MainPage”]
												Button
</p>-->
 
        </div><!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>