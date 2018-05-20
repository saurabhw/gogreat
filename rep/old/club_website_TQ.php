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
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br>Sample Website Not Found.<br>";
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
<title>Fundraising Example | GreatMoods</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
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
<script type="text/javascript" src="../../jquery/jquery-1.9.1.min.js"></script>
<!--  jCarousel library-->
<script type="text/javascript" src="../../jquery/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet-->
<link rel="stylesheet" type="text/css" href="../../css/skin.css" />

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
      wrap: 'circular'
    });
});
</script>

</head>
<body>
  <div id="container">
<?php include 'header_sample.php'; ?>

  <div id="leftSideBarSample">
    <ul id="sideNavSample">
      <li><a href="club_website_TQ.php?group=<?php echo $_GET['group']; ?>"><em>Fundraiser<br>Homepage</em></a></li>
      <li>About Our Fundraiser</li>
      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>
      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>"><em>View Sample Student Website</em></a></li>
    </ul>
  </div>

  <div id="contentSample">
    <div id="baskets">
    <h3 class="sample">Please Support Our <?php echo $title; ?> Fundraiser!</h3>
    <div class="slider">
      <ul id="mycarousel" class="jcarousel-skin-tango">
        <li><a href="funFashion.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store1_slide.jpg" alt="Fun Fashion Boutique" /></a></li>
        <li><a href="jewelryGlitz.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store2_slide.jpg" alt="Jewelry, Glitz and Glamour Store" /></a></li>
        <li><a href="springSummer.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store3_slide.jpg" alt="Spring Into Summer Shop" /></a></li>
        <li><a href="fitnessFun.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store4_slide.jpg" alt="Fitness & Fun" /></a></li>
        <!--<li><a href="trends.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store5_slide.jpg" alt="Trends" /></a></li>-->
        <li><a href="salonSpa.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store6_slide.jpg" alt="Luxury Salon and Spa" /></a></li>
        <li><a href="coffeeCafe.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store7_slide.jpg" alt="Coffee Cafe" /></a></li>
        <li><a href="sportsFitness.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store8_slide.jpg" alt="Varsity Sports and Fitness" /></a></li>
        <li><a href="manCave.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store9_slide.jpg" alt="The Man Cave" /></a></li>
        <li><a href="sweetBoutique.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store10_slide.jpg" alt="Romantically Sweet Boutique" /></a></li>
        <li><a href="pursesPocketbooks.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store11_slide.jpg" alt="Purses, Pocketbooks and Pouches" /></a></li>
        <li><a href="inspirational.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store12_slide.jpg" alt="Inspirational, Motivational and Success Treasures" /></a></li>
        <li><a href="funGames.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store13_slide.jpg" alt="Fun and Games Family Shop" /></a></li>
        <!--<li><a href="store.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store14_slide.jpg" alt="Baby & Toddler Treasures" /></a></li>-->
        <!--<li><a href="creativeKids.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store15_slide.jpg" alt="Creative Kids Corner" /></a></li>-->
        <li><a href="candyland.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store16_slide.jpg" alt="Candyland" /></a></li>
        <li><a href="customerClient.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store17_slide.jpg" alt="Customer and Client Concierge Club" /></a></li>
        <li><a href="chocolateFactory.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store18_slide.jpg" alt="Chocolate Factory" /></a></li>
        <li><a href="cookieJar.php?group=<?php echo $_GET['group']; ?>"><img src="../images/store19_slide.jpg" alt="Cookie Jar Bakery" /></a></li>
      </ul>
    </div>
    </div> <!--end baskets-->
    
    <!-- Begin right side navigation boxes -->
    <h3 class="mallHeader"><strong>The GreatMoods Shopping Mall Directory</strong></h3>
    <div class="mallLinks">
      <ul class="stumenu">
        <h5>Shop at Our Stores</h5>
	<?php include '../includes/mall_directory_sample.php'; ?>
	<br>
        <br>
        <br>
	<br>
    </div>
      <div class="shopDetails">
        <ul class="stumenu">
          <h5>Shopping Ideas For...</h5>
          <li><a href="">Mothers &amp; Grandmas</a></li>
          <li><a href="">Fathers &amp; Grandpas</a></li>
          <li><a href="">Boys &amp; Girls</a></li>
          <li><a href="">Teen Boys</a></li>
          <li><a href="">Teen Girls</a></li>
          <li><a href="">Men &amp; Women</a></li>
          <li><a href="">Special Friends</a></li>
          <li><a href="">Students Away at School</a></li>
          <li><a href="">Me Me Me (It's OK...)</a></li>
        </ul>
      </div>
      <div class="shopDetails">
        <ul class="stumenu">
          <h5>Shop By Price</h5>
          <li><a href="">$0.00-$19.99</a></li>
          <li><a href="">$20.00-$39.99</a></li>
          <li><a href="">$40.00-$59.99</a></li>
          <li><a href="">$60.00-$79.99</a></li>
          <li><a href="">$80.00-$99.99</a></li>
          <li><a href="">$100.00-$149.99</a></li>
          <li><a href="">$150.00 &amp; Up</a></li>
        </ul>
      </div>
      <div class="shopDept">
        <ul class="stumenu">
          <li><a href="">Special Gift Wrap Dept</a></li>
          <li><a href="">Shipping Dept</a></li>
        </ul>
      </div>
      <div class="contactinfobox">
        <h5 class="contactinfo1"><?php echo $title; ?> Fundraiser<br>Contact Information</h5>
        <img class="icons" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
        <img class "icons" src="../images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon">
        <p><?php echo str_replace(" ",".",$leader); ?>@email.com<br>
            <?php echo $phone; ?></p>
      </div>
      <!--end contactinfobox-->
    <div id="goals">
      <br>
      <p><strong>Individual<br>Goals</strong><br>
        $<?php echo $goal; ?></p><br>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div>
    <!--end goals--> 
      <div class="leader">
          <img src="../<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo">
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $position; ?></strong><br>
            <span class="leadername"><?php echo $leader; ?></span></p>
        </div>
      </div>
      <!--end leader-->    
      <div class="studentleader">
        <div class="studentleaderphoto">
          <img src="../<?php echo $student_photo;?>" width="106" height="106" alt="Leader">
        </div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br>
            <span class="leadername"><?php echo $student_leader_name; ?></span>
        </div>
      </div>
      <!--end studentleader-->
      <div class="imgright">
        <img src="../<?php echo $group_photo;?>" width="386" height="278" alt="placeholder for group photo" />
      </div>
      <div class="clear">
        <h5 id="reasons">Reasons for Our Fundraiser</h5>
        <?php
          echo '<div id ="reasoncontent">'; 
          $r_list = explode('.', $reasons);
          echo '<ul>';
          foreach ($r_list as $item){
            if ($item != ''){
               echo '<li>', trim($item), '</li>';
            }
          }
          echo '<?ul>';
          echo '</div>';
        ?>
      </div>
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