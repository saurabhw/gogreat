<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '1'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
       

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
          <h1>GreatMoods Program</h1>
          <h3>10 Good Reasons To Do Fundraising Online With GreatMoods</h3>

	<div id="column1">
		<p><b>1.</b> Every Student, or Member of every Team, Club, Church or Organization gets their own Free Individually Personalized Fundraising Website.</p>
		<p><b>2.</b> The GreatMoods Shopping Mall offers a great selection of over 20,000+ fundraising products designed for all age groups.  Everyone is a potential customer or recipient of our products for every season, reason or occasion.</p>
		<p><b>3.</b> PayPal, the most trusted and fraud proof online order processing system, for the consumer market today, is used to process every order. </p>
		<p><b>4.</b> Cash is Deposited Weekly for every product sold directly into your groups’ PayPal account 24/7/ 365 days a year, forever!</p>
		<p><b>5.</b> Spring, Summer, Winter or Fall GreatMoods Fundraising delivers it all.  This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
		<p><b>6.</b> Selling door-to-door really isn’t required because all of your Fundraising can be done online with Friends, Family and Neighbors from anywhere in the country.</p>
		<p><b>7.</b> We Deliver! Everything! Everywhere! You don’t touch the product, because it is delivered straight to the designated recipient (even when it’s for you)!</p>
		<p><b>8.</b> It’s Free, Now and Forever, No cost of anything to anyone, EVER. All you have to do is maintain new members and delete old ones a couple times a year.</p>
		<p><b>9.</b> New, absolutely! Facebook is new, Twitter is new and Texting is new. Personalized Fundraising Websites by GreatMoods are new, and being new and online is certainly a good thing for all your Students, Members and potential Supporters.</p>
		<p><b>10.</b> New to technology? Never worry about that.  With today’s tech savvy kids and family members, the Fundraising Program can be setup in no time. It's as easy to maintain as a Facebook or Twitter Account.</p>
	</div> <!--end column1-->
	
	<div id="column2">
		<br>
		<img src="../images/rep-pages/scarfgrouping.png" width="404" height="270" alt="5 Scarves">
		<img class="imgLeft" src="../images/rep-pages/boycomputer.png" width="198" height="166" alt="Student at Computer">
		<img class="imgRight" src="../images/rep-pages/teachercomputer.png" width="198" height="166" alt="Teacher at Computer Desk">
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more.</div>
	
		<!-- <h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
	</div> <!--end column2-->
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>