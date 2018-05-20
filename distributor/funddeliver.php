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
	<h3>We Deliver! </h3>
    <div id="column1">
      <h5>How we Deliver</h5>
	  <p>Ordering and delivery is easy because any supporters of your Fundraiser just need to do 2 simple steps.  First be linked to the students/members Individually Personalized Fundraising Website.  Then second click and order the gift basket that they want for themselves or a friend or family member delivered anywhere.  </p>
      <h5>When GreatMoods can Deliver</h5>
	  <p>GreatMoods delivers all gift baskets a week before the holiday or special occasion.</p>
      <h5>Where GreatMoods can Deliver</h5>
	  <p>GreatMoods can deliver to any location around the world. GreatMoods knows a Fundraiser’s best customer doesn’t always live in their neighborhood, but that your extended family can be a great source of support. That’s another great feature of our GreatMoods program which allows you to Fundraise to anyone anywhere.</p>
      <h5>Who GreatMoods can Deliver to</h5>
	  <p>Thanks to the Internet and our Free Individually Personalized Fundraising Websites every student or member has the ability to solicit orders and deliver them to anyone across the country.  Fundraising is no longer limited to your neighbors next door. If you have friends or family across the country they can easily support you and your organization year round.  Great for any grandparents in Florida or Arizona.  </p>
	 
      </div>
      <!--end leadBox-->
      
      
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/kiwanis1.png" width="404" height="270" alt="Kiwanis Club">
	<img class="imgLeft" src="../../images/rep-pages/girlyoung2.png" width="198" height="166" alt="Young Girl">
	<img class="imgRight" src="../../images/rep-pages/kicks4kids.png" width="198" height="166" alt="Boy with School Fundraiser">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

      
    </div>
    <!--end column2--> 
    
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