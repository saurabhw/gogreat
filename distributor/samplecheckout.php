<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      $link = connectTo();
      
      $groupID = $_GET['group'];
      $productid = $_GET['prodid'];
$table = "products";
$query = "SELECT * FROM $table WHERE productID = $productid";
$result = mysqli_query($link, $query) or die(mysqli_error());
$row_count = mysqli_num_rows($result);
$banner = $_SESSION['banner'];

$row = mysqli_fetch_assoc($result);
$productName = $row['productName'];
$productID = $row['productID'];
$description = $row['description'];
$Contents = $row['Contents'];
$retailPrice = $row['retailPrice'];
$wholesalePrice = $row['wholesalePrice'];
$dimensions = $row['dimensions'];
$weight_lbs = $row['weight_lbs'];
$productLrgPicPath = $row['productLrgPicPath'];

$query2 = "SELECT * FROM Dealers WHERE loginid = '$groupid'";
$result2 = mysqli_query($link, $query2) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result2);
$setup_person = $row1['setuppersonid'];

$repNum = $setup_person;
$return_cancel = 'http://www.greatmoods.com/product.php?prodid='.$productid.'&groupid='.$groupid;

      $table1 = "sample_websites";
      $query = "SELECT * FROM $table1 WHERE samplewebID = $groupID";
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
         $student_leader_name = $row['student_leader'];
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
      }
     
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Sample Checkout | GreatMoods</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>

<!--  jQuery library-->
<script type="text/javascript" src="../jquery/jquery-1.9.1.min.js"></script>
<!--  jCarousel library-->
<script type="text/javascript" src="../jquery/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet-->
<link rel="stylesheet" type="text/css" href="../css/skin.css" />

<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  // <![CDATA[
        
  $(document).ready(function () {
    $('#menudetails').tabify();
  });
          
  // ]]>
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 2
    });
});
</script>

</head>
<body>
<div id="container">
<?php include 'header_sample.php'; ?>
 
<div id="leftSideBarSample">
  <img src="../<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
    <li><a href="index.php">GreatMoods Homepage</a></li>   
    <li><a href="../samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
    <li>About Our Fundraiser</li>
  </ul>
</div> <!--end side navigation-->

    <!-- Content -->
    <div class="contentp">
      <ul id="menudetails">
        <!--<li><a href="#tab1">Gift Packaging</a></li>-->
        <li class="active"><a href="#tab2">Send To</a></li>
        <li><a href="#tab3">Personal Message</a></li>
        <li><a href="#tab4">Review Order</a></li>
      </ul>
      
      <!--<div class="sampletab" id="tab1"><img id="sampleimage" src="../images/sample_giftpackagingtab.PNG" width="843" height="496" alt="Gift Packaging"><br>
      <div><a href="#tab2-tab"><input type="button" value="Continue"/></a> <a href="product.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Continue Shopping"/></a></div>
      </div>-->
      
      <div class="sampletab" id="tab2"><img id="sampleimage" src="../images/sample_sendtotab.PNG" width="842" height="390" alt="Send To"><br>
      <div><a href="#tab3-tab"><input type="button" value="To Personal Message"/></a> <a href="product.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Continue Shopping"/></a></div>
      </div>
      
      <div class="sampletab" id="tab3"><img id="sampleimage" src="../images/sample_personalmessagetab.PNG" width="843" height="270" alt="Personal Message"><br>
      <div><a href="#tab4-tab"><input type="button" value="Review Order"/></a> <a href="product.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Continue Shopping"/></a></div>
      </div>
      
      <div class="sampletab" id="tab4"><img id="sampleimage" src="../images/sample_reviewordertab.PNG" width="853" height="384" alt="Review Order"><br>
      <a href="product.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Continue Shopping"/></a>
      </div>
     
    </div><!-- End Content-->

<div class="clearfloat"><br></div>
<?php include 'footer.php' ; ?>
</div>  <!-- End Container-->

</body>
</html>
<?php
ob_end_flush();
?>