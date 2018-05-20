<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
      $result1 = mysqli_query($link, $query1) or die("couldn't execute query 1.".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $club_name = $row['Dealer'];
      $club_type = $row['DealerDir'];
      $goal = $row['FundraiserGoal'];
      $reasons = $row['FundraiserReasons'];
      $about = $row['About'];
      $so_far = '0';
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      $location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $banner_path = $row['banner_path'];
      $_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
      $result2 = mysqli_query($link, $query2) or die("couldn't execute query 2.".mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
        $cap = "Select * FROM captions WHERE fundid = '$groupID'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysql_error());
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];  
        
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysql_error());
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Organization Website</title>
	<link href="../css/global_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/allforms_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo "../".$banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
     <?php include 'includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul class="nav"> 
      <li><a href="index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="#">GreatMoods<br>Mall Directory</a>
          <?php include 'includes/menu_mall_directory_site.php'; ?></li>
        <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li class="divider"><a href="'.$_SESSION['home'].'" />Account<br>Home</a></li>';}?>
      </ul>
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
  
  

<div id="leftSideBarSample">
  <ul id="sideNavSample">
  	<div class="profileimgcrop"><img src="<?php echo $contact_photo;?>" class="profilepic" alt="student photo"></div>
	
	<ul id="sideNavSample">
	      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
	      <li><a href="#">GreatMoods Program Overview</a></li>
	      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">About GreatMoods</a></li>
	      <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Getting Started</a></li>
	       <?
	       if(isset($_SESSION['authenticated'])) {
	         echo ' 
	         	<hr>
	         	<li><a href="setupEditWebsite/rephome.php">Account Home</a></li> 
	         ';
	       }
	     	?>  
  </ul>
</div>

 <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support Our <? echo $club_type; ?> Fundraiser!</h3>
      <div class="slider">
      <ul id="mycarousel" class="jcarousel-skin-tango">
        <li><a href="funFashion.php?group=<?php echo $_GET['group']; ?>"><img src="images/store1_slide.jpg" alt="Fun Fashion Boutique" /></a></li>
        <li><a href="jewelryGlitz.php?group=<?php echo $_GET['group']; ?>"><img src="images/store2_slide.jpg" alt="Jewelry, Glitz and Glamour Store" /></a></li>
        <li><a href="springSummer.php?group=<?php echo $_GET['group']; ?>"><img src="images/store3_slide.jpg" alt="Spring Into Summer Shop" /></a></li>
        <li><a href="fitnessFun.php?group=<?php echo $_GET['group']; ?>"><img src="images/store4_slide.jpg" alt="Fitness & Fun" /></a></li>
        <!--<li><a href="trends.php?group=<?php echo $_GET['group']; ?>"><img src="images/store5_slide.jpg" alt="Trends" /></a></li>-->
        <li><a href="salonSpa.php?group=<?php echo $_GET['group']; ?>"><img src="images/store6_slide.jpg" alt="Luxury Salon and Spa" /></a></li>
        <li><a href="coffeeCafe.php?group=<?php echo $_GET['group']; ?>"><img src="images/store7_slide.jpg" alt="Coffee Cafe" /></a></li>
        <li><a href="sportsFitness.php?group=<?php echo $_GET['group']; ?>"><img src="images/store8_slide.jpg" alt="Varsity Sports and Fitness" /></a></li>
        <li><a href="manCave.php?group=<?php echo $_GET['group']; ?>"><img src="images/store9_slide.jpg" alt="The Man Cave" /></a></li>
        <li><a href="sweetBoutique.php?group=<?php echo $_GET['group']; ?>"><img src="images/store10_slide.jpg" alt="Romantically Sweet Boutique" /></a></li>
        <li><a href="pursesPocketbooks.php?group=<?php echo $_GET['group']; ?>"><img src="images/store11_slide.jpg" alt="Purses, Pocketbooks and Pouches" /></a></li>
        <li><a href="inspirational.php?group=<?php echo $_GET['group']; ?>"><img src="images/store12_slide.jpg" alt="Inspirational, Motivational and Success Treasures" /></a></li>
        <li><a href="funGames.php?group=<?php echo $_GET['group']; ?>"><img src="images/store13_slide.jpg" alt="Fun and Games Family Shop" /></a></li>
        <!--<li><a href="store.php?group=<?php echo $_GET['group']; ?>"><img src="images/store14_slide.jpg" alt="Baby & Toddler Treasures" /></a></li>-->
        <!--<li><a href="creativeKids.php?group=<?php echo $_GET['group']; ?>"><img src="images/store15_slide.jpg" alt="Creative Kids Corner" /></a></li>-->
        <li><a href="candyland.php?group=<?php echo $_GET['group']; ?>"><img src="images/store16_slide.jpg" alt="Candyland" /></a></li>
        <li><a href="customerClient.php?group=<?php echo $_GET['group']; ?>"><img src="images/store17_slide.jpg" alt="Customer and Client Concierge Club" /></a></li>
      </ul>
    </div>
    </div> <!--end baskets-->
    
    <!-- Begin right side navigation boxes -->
    <h3 class="mallHeader"><strong>The GreatMoods Shopping Mall Directory</strong></h3>
    <div class="mallLinks">
      <ul class="stumenu">
        <h5>Shop at Our Stores</h5>
        <?php include 'includes/mall_directory_site.php'; ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </ul>
    </div>
      <div class="shopDetails">
        <ul class="stumenu">
          <h5>Shopping Ideas For...</h5>
          <li><a href="">Mothers &amp; Grandmas</a></li>
          <li><a href="">Fathers &amp; Grandpas</a></li>
          <li><a href="">Baby &amp; Toddlers</a></li>
          <li><a href="">Boys &amp; Girls (2-4)</a></li>
          <li><a href="">Boys &amp; Girls (9-12)</a></li>
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
	  <!-- end right side navigation boxes -->
	
     <div class="contactinfobox">
     	<h5 class="contactinfo1"><? echo $club_type; ?> Fundraiser<br>Contact Information</h5>
	 <a href="http://<? echo $face;?>" /><img src="images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon"></a>
	 <a href="http://<? echo $twit;?>" /><img src="images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon"></a>
	 <!--<?php echo $a1; ?>&nbsp;<?php echo $a1n; ?>-->
         <p class="contactinfo1"><? echo $email; ?><br><? echo $phone; ?></p>
      </div> <!--end contactinfobox--> 
    
   <!-- <div id="goals">
      <p><strong>My Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $amount; ?>.00</p>
    </div>--> <!--end my goal-->
    
    <div id="goals">
    	<br>
      <p><strong>Group Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end group goal-->
    
    <div class="leader">
        <div class="leaderphoto"><img src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $a1; ?></strong><br />
            <span class="leadername"><?php echo $a1n; ?></span></p>
        </div>  <!--end contactinfo2-->
      </div>  <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="<?php echo $contact_pic;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $a3; ?></strong><br>
          <span class="leadername"><?php echo $a3n; ?></span></p>
        </div> <!--end contactinfo2--> 
      </div> <!--end studentleader--> 
    
    <div class="imgright">
    <br>
    <img src="<?php echo $group_photo;?>" width="386" height="278" alt="placeholder for group photo">
    </div> <!--end group photo--> 

    <div class="clear">
     <h5 id="reasons">Reasons for Our Fundraiser</h5>
      <?php
         echo '<div>'; 
         $r_list = explode('.', $reasons);
         echo '<ul>';
           foreach ($r_list as $item){
             if ($item != ''){
               echo '<li>', trim($item), '</li>';
            }
           }
         echo '</ul>';
         echo '</div>';
      ?>
	</div> <!--end reasons-->
	  
  </div> <!--end content-->
  
  <div class="clearfloat">  </div>
  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>