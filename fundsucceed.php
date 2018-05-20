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
<h3>Daily Jobs & Goals</h3>
    
<div id="column1">
      <p>Online Fundraising is changing the Fundraising world forever, from door-to-door sales of Candy, Cookie Dough and Gift Wrap, to Online Fundraising. In order to succeed with GreatMoods just follow these quick and easy steps to successfully Fundraise online, and see how much money your team, club or organization can raise!</p>
	  <h5>Step 1:</h5><p>Have your Team Captains or Student Leaders Setup and Create your Fundraising Website.</p>
		<p>This process is simple for every student or member who knows how to navigate the Internet.  GreatMoods makes it simple to create your own website by adding a quick, simple message to your Fundraising supporters.  Also you can post multiple photos of your team, its members or organization for everyone to recognize.</p>
	  <h5>Step 2:</h5><p>Set up your Team, Club or Organization’s Individually Personalized Fundraising Member Websites. That would include setting up a post at their Facebook/Twitter pages </p>
		<p>Refer your team, club or organization to the team’s Fundraising page.  Then have each member create their own page and upload a picture of him or herself if they please.</p>
	  <h5>Step 3:</h5><p>Set up all of your Friends, Family, Neighbors, Business Customers and Clients E-mail addresses</p>
		<p>Create a personal message to send to all your e-mail contacts or select one of our many greetings requesting support for your cause.</p>
	  <h5>Step 4:</h5><p>After receiving your prospects Individually Personalized Free Fundraising Website from GreatMoods, contact your prospects and show them how easy fundraising with GreatMoods can be</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

     <p>Note if you would like to still go door-to-door we have an E-mail sign-up form. In addition we have an order form with photos of the gift baskets that you can use to write an order to your neighbors or at the back of a church. This allows you to show your neighbors a selection of gift baskets they can choose and how easy it is to order. </p>
     <p>PS. Have your friend, family, or neighbor order from your cell phone if your going door-to-door or in person. </p>
	 <p>If you or your supporters need any assistance with setting up the Fundraising sites or ordering from your Fundraiser please let us know and we will help you immediately.</p>
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