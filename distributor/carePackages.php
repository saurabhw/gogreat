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
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include '../includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="" class="drop">Fundraising<br>Examples</a>
          <?php include '../includes/menu_fundraising_examples.php'; ?>
        <li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          <?php include '../includes/menu_mall_directory.php'; ?>
        <!-- <li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li> -->
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting<br>Started</a></li>-->
        <li><a href="fundwebsite.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Website</a></li>
        <li><a href="fundmembers.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Members</a></li>
        <li><a href="fundemails.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Emails</a></li>
        <!--<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
 
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
<div id="leftSideBarSample">
  <img src="../<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="../fundMember/memberHome.php">My Account</a></li>
          ';
        } 
     ?>   
      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser<br>Homepage</a></li>
      <li>About Our Fundraiser</li>
    <hr>
  </ul>
</div> <!--end side navigation-->

  <div id="contentSample">
    <img src="../images/store17.jpg" />
    <div class="categories">
    <h5>Care Packages with Love Categories</h5>
    <ul class="categoriesul">
      <!--<li><a href="carePackages_familyProduct.php?group=<?php echo $groupID; ?>">Family &amp; Friends</a></li> -->
      <li><a href="carePackages_militaryProduct.php?group=<?php echo $groupID; ?>">Overseas/Military</a></li>
      <li><a href="carePackages_collegeProduct.php?group=<?php echo $groupID; ?>">College Starter Kits</a></li>
      <li><a href="carePackages_schoolProduct.php?group=<?php echo $groupID; ?>">Study Care Packages</a></li>
    </ul>
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