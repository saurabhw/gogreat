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
    <h3>New Trends in Fundraising</h3>
	<div id="column1">
      <p>Everyone has a cell phone and Internet access today. There is virtually not a single Child or Parent anywhere that has not shopped Online or ordered Online to make a purchase for the Holidays or for a Special Occasion Gift.</p>
      <p>Fundraising is about to change forever, from door to door sales of Candy, Cookie Dough and Gift Wrap, being the primary means to raise money to Online Fundraising. </p>
      <P>A good online Fundraising Program will ship all orders directly to the Customer or Recipient of the Fundraising Product. </p>
	  <P>Online ecommerce has been growing at a rate of 15% to 25% for over a decade and will continue. Online Fundraising is beginning a similar growth rate to that right Now! </p>
	<h5>Fundraising with the GreatMoods Online Program</h5>  
	  <p>Do you have a quality Online Fundraising Program and appropriate Product for Online Fundraising Sales? Can’t ship Cookie Dough, can’t ship one dollar Chocolate Bars, it would cost a fortune. Gift Baskets you can ship year round and is a perfect Online Fundraising Program for all Holidays and Special Events.</p>
	  <p>2 Major Online Fundraising Seasons can happen with one simple setup, with a continual revenue stream that could start as early as September and continue until April for everyone. </p>
	  <p>Cash is paid daily on every order directly into your PayPal account 24/7/365 days a year. </P>	
	  <p>Click on our <a href="fundraisingexamples.php">Fundraising Examples</a> to see the Future of Fundraising</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/cancerwalk.png" width="404" height="270" alt="Boyscouts">
	<img class="imgLeft" src="../../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
	<img class="imgRight" src="../../images/rep-pages/elementaryfundraiser.png" width="198" height="166" alt="Elementary School Children">
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