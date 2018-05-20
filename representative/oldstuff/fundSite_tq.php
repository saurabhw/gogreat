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
      if (isset($_SESSION['authenticated'])){
          $groupID = $_SESSION['groupid'];
      }else{
      	$groupID = $_GET['groupid'];
        }    
      //$groupID = '379';
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
      $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
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
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
      $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
      
      
      
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo "../".$banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
     <?php include 'includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul id="menu">
        <li><a href="basketsproducts_fund.php?groupid=<?php echo $groupID; ?>">Gift Baskets<br>& Products</a></li>
        <li><a href="editFundraiser/gettingstarted.php?group=<?php echo $groupID;?>">Getting<br>Started</a></li>
        <?php
         if(isset($_SESSION['authenticated']))
        {
        ?>
           
          <li><a href="editFundraiser/information.php?groupid=<?php echo $fundraiserid;?>">Setup/Edit<br/>
          Website</a></li>
          <li><a href="editFundraiser/members.php?groupid=<?php echo $fundraiserid;?>">Setup/Edit<br/>
          Members</a></li>
          <li><a href="editFundraiser/emails.php?groupid=<?php echo $fundraiserid;?>">Setup/Edit<br/>
          Emails</a></li>
         
        <?php }?>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <ul id="sideNavSample">
       <?
       if(isset($_SESSION['authenticated']))
       {
         echo '
    	 <li><b>Fundraiser<br>Homepage</b></li>
     	 <li><a href="editFundraiser/coordhome.php">My Account</a></li>
     	 ';
       }
     	?>
     	<li><a href="basketsproducts_fund.php?groupid=<?php echo $groupID; ?>">Gift Baskets<br>& Products<br>Order Now!</a></li>   
	<li><a href="fundaboutus.php?groupid=<?php echo $groupID; ?>">About Our Fundraiser</a></li>
    	<li><a href="fundContacts.php?groupid=<?php echo $groupID; ?>">Fundraising Contacts</a></li>
       	<?
       if(isset($_SESSION['authenticated']))
       {
         echo '
		<li><a href="">Help<br>Training Tips,<br>Tools & Forms</a></li>
       ';
       }
     	?> 
  </ul>
</div>

 <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support Our <?php echo $title; ?> Fundraiser!</h3>
      <table id="basketphotos">
        <tr>
          <td><a href="product.php?prodid=32&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/atthecabin_sm.png" width="124" height="120" alt="At the Cabin Gift Basket"></a><br />
            At the Cabin</td>
          <td><a href="product.php?prodid=29&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/celebrate_sm.png" width="124" height="120" alt="Celebrate Gift Basket"></a><br />
            Celebrate</td>
          <td><a href="product.php?prodid=26&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/morningexpress_sm.png" width="124" height="120" alt="Morning Express Goodie Bag"></a><br />Morning Express</td>
          <td><a href="product.php?prodid=25&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/earlytorise_sm.png" width="124" height="120" alt="Early to Rise Gift Basket"></a><br />
            Early to Rise</td>
          <td><a href="product.php?prodid=12&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/hoppingintoeaster_sm.png" width="124" height="120" alt="Hopping into Easter Goodie Bag"></a><br />Hopping into Easter</td>
          <td><a href="product.php?prodid=11&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/happyeaster_sm.png" width="124" height="120" alt="Happy Easter Gift Basket"></a><br />Happy Easter</td>
        </tr>
        <tr>
          <td><a href="product.php?prodid=24&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/kiddinaround_sm.png" width="124" height="120" alt="Kiddin Around Gift Basket"></a><br />
            Kiddin Around</td>
          <td><a href="product.php?prodid=28&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/movietime_sm.png" width="124" height="120" alt="Movie Time Gift Basket"></a><br />
            Movie Time</td>
          <td><a href="product.php?prodid=30&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/sportsspectacular_sm.png" width="124" height="120" alt="Sports Spectacular Gift Basket"></a><br />
            Sports Spectacular</td>
          <td><a href="product.php?prodid=23&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/sweetstreats_sm.png" width="124" height="120" alt="Sweets and Treats Goodie Bag"></a><br />Sweets & Treats</td>
          <td><a href="product.php?prodid=34&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/whimsicallyfun_sm.png" width="124" height="120" alt="Whimsically Fun Scarves"></a><br />
            Whimsically Fun</td>
          <td><a href="product.php?prodid=33&groupid=<? echo $groupID;?>"><img src="images/sample_website_baskets/Spring2013/designercollection_sm.png" width="124" height="120" alt="Designer Scarf Collection"></a><br />Designer Collection</td>
        </tr>
      </table>
    </div>
    <!--end baskets-->
    
    <div id="goals">
      <p><strong>My Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end my goal-->
    
    <div id="goals">
      <p><strong>Group Goal</strong><br>
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br>
        So Far</strong><br>
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end group goal-->
    
    <div class="clearfloat">
    <br>
    </div>
    <div id="col1">
    <img class="mainphoto" src="<?php echo $contact_pic;?>" width="138" height="184" alt="contact photo">
    <br>
      <h5 class="contactinfo1"><?php echo $title; ?> Fundraiser<br>Contact Information</h5>
      <div class="contactinfobox">
	      <a href="http://<? echo $face;?>" /><img id="icons" src="images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon"></a>
	      <a href="http://<? echo $twit;?>" /><img src="images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon"></a>
	      <a href="#" /><img src="images/icons/googleplus_icon.png" width="22" height="22" alt="google plus icon"></a>
        	<div>
          		<p class="contactinfo1"><?php echo $group_email; ?><br><?php echo $phone; ?></p>
      		</div>
      </div> <!--end contactinfobox--> 
      <br>
      <div class="leader">
        <div class="leaderphoto"><img src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $leader_title; ?></strong><br />
            <span class="leadername"><?php echo $leader; ?></span><br />
            <?php echo $leader_email; ?><br />
            <?php echo $leader_phone; ?><br />
            <img src="images/icons/video_icon.png" width="41" height="51" alt="play video icon"> </p>
        </div>
        <!--end contactinfo2-->
      </div>
      <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="<?php echo $student_photo;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername">J. Doe</span><br />
            jdoe@email.com<br />
        </div>
        <!--end contactinfo2--> 
      </div>
      <!--end studentleader--> 
      
    </div>
    <!--end col1-->
    
    <div id="col2">
      <h5 id="reasons">Reasons for Our Fundraiser</h5>
      <?php
         echo '<div id ="reasoncontent">'; 
         $r_list = explode('.', $reasons);
         echo '<ul>';
         foreach ($r_list as $item){
            
echo '<li>', trim($item), '</li>';
         }
         echo '</ul>';
         echo '</div>';
      ?>
      
      <br />
      <img src="<?php echo $group_photo;?>" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
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