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
    <h3>The GreatMoods Product Line</h3>
    <div id="column1">
      <p>GreatMoods has a wonderful variety of Gift Baskets and products for every special occasion. This makes for a perfect year-round revenue-generating Fundraiser because customers can send them as gifts to friends, family members, business customers and clients. There are 3 to 4 major Gift Basket seasons each year, starting with the Fall Holidays.</p>
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h4>Gift Baskets Make Great Gifts Year-Round</h4>
          </div>
          <!--end redBar1-->
          <ul>
          <li><a href="fallbaskets.php">Fall & Holiday Gift Baskets</a><br>(Thanksgiving, Hanukkah, Christmas)</li>
<li><a href="newyearbaskets.php">Start the New Year with…</a><br>(Valentine’s Day, Easter, Mother’s Day,<br>Father’s Day & Graduation)</li>
<li><a href="themebaskets.php">Themes</a><br>(Coffee, Spa, Christian, Children’s &<br>Our New Fun Fashion Boutique)</li>
<li><a href="seasonalbaskets.php">Seasonal</a><br>(Picnic, Friend & Family Game Night<br>& Sports Themed)</li>
<li><a href="businessbaskets.php">Business Gift Baskets</a></li>
<li><a href="specialbaskets.php">Special Occasions</a><br>(Birthday, Anniversary, Baby & Wedding Showers)</li>
	</ul>
        </div>
        <!--end infoText--> 
      </div>
      <!--end leadBox-->
      <p>&nbsp;</p>
      <img id="basket1Left" src="../../images/rep-pages/3bags.png" width="404" height="270" alt="Christmas Gift Basket"> 
      <div id="pcaption">GreatMoods offers Gift Baskets in many different themes for any occasion. </div>
    </div>
    <!--end column1-->
    
    <div id="column2"> <img src="../../images/rep-pages/holidaybaskets.png" width="389" height="306">
      <p><br>Gift Baskets are a great Fundraising Product with price points for everyone and can be shipped year round. Online Shopping/Fundraising is going through the roof with double-digit annual growth and is perfect for the cell phone and Facebook generation. This is a great way to raise funds for your organization and take care of your gift list at the same time.</p>
      <p>Online year-round fundraising is the future with our Individually Personalized Fundraising Websites and our great gift basket product line.</p>
      <p>GreatMoods delivers every Gift Basket to the address of the customer indicated, so there is no handling of the product by you or your organization.</p>
      <p>All ordering is done online at the Student/Member’s Individually Personalized Fundraising Website using PayPal. All Cash is distributed next day, 24/7/365 days a year. Online Fundraising just can’t get any better than with our GreatMoods Gift Basket Program.</p>
    </div>
    <!--end column2--> 
    <!--<p>[“Next” Button] – links to Who Are Targeted Customers				[“Back to MainPage”]
												Button
</p>--> 
    
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