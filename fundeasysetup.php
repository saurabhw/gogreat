<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
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
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
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
        <li><a href="index.php">GreatMoods </br> Homepage</a><li>
		<li><a href="basketsproducts.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <?php include 'navigation/leftSidebarNavFundraiser.php'; ?>

  <div id="content">
    </br>
	<h3>3 Steps to Fundraising Success</h3>
    <div id="column1">
	<p><br>Setting up Fundraisers has never been so easy with the our Easy 3 Step process which is simple for you and your organization.  The GreatMoods Program allows all of the Fundraising to take place online which makes this Fundraiser quick and easy.  </p>
	<h3>The 3 simple steps are:</h3>	  
	<h5>Step 1) <a href="setupeditclub.php">Setup/Edit Website</a></h5>
	All you need to do is fill in the basic fields that are relevant to your organization.  Such as name of the organization and message or purpose for the Fundraiser.<br>
	<h5>Step 2) <a href="setupeditmembers.php">Setup/Edit Members</a></h5>
	Each student/member creates their own Free Individually Personalized Fundraising Website that will be used for their supporters.  Anyone who has setup a Facebook page can setup the entire member list depending on its size in an evening.<br>
	<h5>Step 3) <a href="setupeditemails.php">Setup/Edit E-Mails</a></h5> 
	Each student/member retrieves and enters in the e-mail addresses for his or hers friends, family, and neighbors. Then a personal e-mail or one of our standard e-mails can go out to this e-mail list requesting the support for their Fundraiser. 
	<p>If you or your organization ever need <a href="help.php">Help</a> along the way just click on our <a href="help.php">Help</a> button or contact your GreatMoods Representative.</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/crosscountry1.png" width="404" height="270" alt="Cross Country Runners">
	<img class="imgLeft" src="../../images/rep-pages/girlyoung1.png" width="198" height="166" alt="Elementary School Girl">
	<img class="imgRight" src="../../images/rep-pages/americanheartassociation1.png" width="198" height="166" alt="American Heart Association">
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