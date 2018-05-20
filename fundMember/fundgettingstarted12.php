<?php
       session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       if(!isset($_SESSION['authenticated']) )
       {
            $groupID = $_GET['group'];
       }
       else
       {
           $groupID = $_SESSION['groupid'];
       }
       //$groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $club_type = $row1['DealerDir']; 
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$banner = $row1['Banner'];
       $so_far = getSoloSales($groupID);
      
       $banner = $row1['banner_path'];
     
     
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $fn = $row3['orgFName'];
      $ln = $row3['orgLName'];
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | Online Fundraising</title>
</head>

<body>
<div id="container">
	<?php include 'header.php'; ?>
	<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
    <div id="column1b">
	<h1>GreatMoods Online Fundraising</h1>
    	<h3>New Trends in Fundraising</h3>
    
      <p>Everyone has a cell phone and Internet access today. It would be very hard to find anyone who has not shopped Online or ordered Online to make a purchase for the Holidays or for a Special Occasion Gift.</p>
      <p>Fundraising is about to change forever, from door to door sales of Candy, Cookie Dough and Gift Wrap being the primary means to raise money, to Online Fundraising. </p>
      <p>A good online Fundraising Program will ship all products ordered directly to the Customer or Recipient.</p>
	  <p>Online e-commerce has been growing at a rate of 15% to 25% for over a decade and will continue at that growth rate for decades to come. Online Fundraising is beginning a similar growth rate to that right now! </p>
	<h3>Online Fundraising with GreatMoods</h3>  
	  <p>Do you have a quality Online Fundraising Program and appropriate Product for Online Fundraising Sales? Can’t ship Cookie Dough, can’t ship one dollar Chocolate Bars, it would cost a fortune.</p>
	  <p>Products and Gifts from the GreatMoods Mall can be shipped Spring, Summer, Winter or Fall. GreatMoods Fundraising delivers it all.</p>
	  <p>This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
	  <p>Cash is Deposited Weekly on every order directly into your Group's PayPal Account 24/7/365 days a year.</p>	
	  <p>Browse our Fundraising Examples from the navigation bar above and see the Future of Fundraising.</p>
	</div>
    <!--end column1b-->
    
    <div id="column2b">
    <div><br>
    	<img src="../../images/rep-pages/oline.png" width="404" height="270" alt="Boyscouts">
	<img class="imgLeft" src="../../images/rep-pages/orchestracamp.png" width="198" height="166" alt="Stuents Playing Dodgeball">
	<img class="imgRight" src="../../images/rep-pages/kindergartenfieldtrip.png" width="198" height="166" alt="Elementary School Children">
    </div>
		
     <!--<h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div> -->
    </div> <!--end column2b--> 
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>