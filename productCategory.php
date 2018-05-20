<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
/*      $table = "sample_websites";
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
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }  
      }*/
?>

<!DOCTYPE html>
<html>
<head>
<title>GreatMoods | Product List</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include 'includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="" class="drop">Fundraising<br>Examples</a>
          <?php include 'includes/menu_fundraising_examples.php'; ?>
        <li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          <?php include 'includes/menu_mall_directory.php'; ?>
        <!-- <li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li> -->
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>-->
        <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <!--<li><a href="fundhelp.php?group=<?php echo $_GET['group']; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
  

<div id="leftSideBarSample">
  <img src="<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="fundMember/memberHome.php">My Account</a></li>
          ';
        } 
     ?>   
      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>"><em>Fundraiser <br />Homepage</em></a></li>
      <li>About Our Fundraiser</li>
      <li>GreatMoods<br>Mall Directory</li>
      <li>Fundraising Contacts</li>
      <li>Getting Started<br>Training Tips,<br>Tools &amp; Forms</li>
      <li>Contact Me</li>
    
    <!--<hr>
    <li class="red">GreatMoods<br>Mall Directory</li>
    <hr>-->
    <!--***Turn into dropdown***-->
   <!-- <li><a href="coffeeCafe.php">Coffee Cafe</a></li>
    <li><a href="funFashion.php?group=<?php echo $_GET['group']; ?>">Fun Fashion Boutique<a/></li>
    <li><a href="jewelryGlitz.php?group=<?php echo $_GET['group']; ?>">Jewelry, Glitz<br>&amp; Glamour Store</a></li>
    <li><a href="salonSpa.php?group=<?php echo $_GET['group']; ?>">Luxury Salon &amp; Spa</a></li>
    <li><a href="sportsFitness.php?group=<?php echo $_GET['group']; ?>">Varsity Sports<br>&amp; Fitness</a></li>
    <li><a href="healthyHappy.php?group=<?php echo $_GET['group']; ?>">The Healthy &amp; Happy Shop</a></li>
    <li><a href="funGames.php?group=<?php echo $_GET['group']; ?>">Fun &amp; Games Family Shop</a></li>
    <li><a href="bananasZoo.php?group=<?php echo $_GET['group']; ?>">Going<br>Bananas Zoo</a></li>
    <li><a href="creativeKids.php?group=<?php echo $_GET['group']; ?>">Creative Kids<br>Multi-Media Center</a></li>
    <li><a href="cookieJar.php?group=<?php echo $_GET['group']; ?>">Cookie Jar Bakery</a></li>
    <li><a href="chocolateFactory.php?group=<?php echo $_GET['group']; ?>">The Chocolate Factory</a></li>
    <li><a href="candyland.php?group=<?php echo $_GET['group']; ?>">Candyland</a></li>
    <li><a href="barneysPet.php?group=<?php echo $_GET['group']; ?>">Barney's Pet Shop</a></li>
    <li><a href="holidayHome.php?group=<?php echo $_GET['group']; ?>">The Holiday<br>Home Store</a></li>
    <li><a href="santasWorkshop.php?group=<?php echo $_GET['group']; ?>">Santa's Workshop</a></li>
    <li><a href="customerClient.php?group=<?php echo $_GET['group']; ?>">Customer &amp; Client Concierge Club</a></li>
    <li><a href="carePackages.php?group=<?php echo $_GET['group']; ?>">Care Packages with Love</a></li>
    <li><a href="sweetBoutique.php?group=<?php echo $_GET['group']; ?>">Romantically<br>Sweet Boutique</a></li>
    <li><a href="inspirational.php?group=<?php echo $_GET['group']; ?>">Inspirational, Motivational &amp; Success Treasures</a></li>
    <li><a href="hardyParty.php?group=<?php echo $_GET['group']; ?>">Happy, Hardy-Party Superstore</a></li>-->
  
  <!--***********************************-->
  <!--***Placeholder Box for Gift List***-->
  <!--***********************************-->
  <div id="giftlist_placeholder">  </div>
  
  </ul>
</div> <!--end side navigation-->

  <div id="contentSample">
   <h3>[Store Title] | <em>[Category Title]</em></h3>
    <div class="sorting">
    	<div class="whitebackground" id="colors">
		<span id="black"><input type="checkbox" name="black" value="black" title="Black"></span>
		<span id="blue"><input type="checkbox" name="blue" value="blue" title="Blue"></span>
		<span id="brown"><input type="checkbox" name="brown" value="brown" title="Brown"></span>
		<span id="gold"><input type="checkbox" name="gold" value="gold" title="Gold"></span>
		<span id="gray"><input type="checkbox" name="gray" value="gray" title="Gray"></span>
		<span id="green"><input type="checkbox" name="green" value="green" title="Green"></span>
		<span id="white"><input type="checkbox" name="white" value="white" title="White"></span>
		<span id="multi"><input type="checkbox" name="multi" value="multi" title="Multi"></span>
		<span id="orange"><input type="checkbox" name="orange" value="orange" title="orange"></span>
		<span id="pink"><input type="checkbox" name="pink" value="pink" title="pink"></span>
		<span id="purple"><input type="checkbox" name="purple" value="purple" title="Purple"></span>
		<span id="red"><input type="checkbox" name="red" value="red" title="Red"></span>
		<span id="silver"><input type="checkbox" name="silver" value="silver" title="Silver"></span>
		<span id="tanbeige"><input type="checkbox" name="tan/beige" value="tanbeige" title="Tan/Beige"></span>
		<span id="ivorycream"><input type="checkbox" name="ivory/cream" value="ivorycream" title="Ivory/Cream"></span>
		<span id="yellow"><input type="checkbox" name="yellow" value="yellow" title="Yellow"></span>
		<span id="all"><input type="checkbox" name="all" value="all" title="Select All">All</span>
	</div>
		
	<div id="fabrics">
		<select>
			<option>Acrylic</option>
			<option>Blend</option>
			<option>Cashmere</option>
			<option>Cotton</option>
			<option>Faux Fur</option>
			<option>Fleece</option>
			<option>Leather</option>
			<option>Linen</option>
			<option>Modal</option>
			<option>Nylon</option>
			<option>Polyester</option>
			<option>Rayon</option>
			<option>Satin</option>
			<option>Silk</option>
			<option>Suede</option>
			<option>Wool/Wool Blend</option>
		</select>
	</div>
	
	<div id="sizes">
		<select>
			<option>Adult One Size</option>
			<option>Adult XXS</option>
			<option>Adult XS</option>
			<option>Adult Sm</option>
			<option>Adult Med</option>
			<option>Adult Lg</option>
			<option>Adult XL</option>
			<option>Adult XXL</option>
			<option>Adult XXXL</option>
		</select>
	</div>
	
    </div>
    
    <div id="prodlistcol1">
    	<div id="prodlisttable"> <!-- populates depending on sorting options -->
    		<div class="prodlistrow"> 
    			<div class="prodlistcell">
    				<a href="product.php?prodid=71&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item1.jpg"></a>
    				<br><p>[Zainy's Zoo]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href="product.php?prodid=72&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item2.jpg"></a>
    				<br><p>[Deano's Dinosaurs]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href="product.php?prodid=73&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item3.jpg"></a>
    				<br><p>[Sunny's Sea Sensations]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    		</div>
    		<div class="prodlistrow">
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    		</div>
    		<div class="prodlistrow">
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    			<div class="prodlistcell">
    				<a href=""><img src=""></a>
    				<br><p>[Product Name]<br>$[0.00]</p>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div id="storelistcol2">
      <h3 class="mallHeader2">[Store Title]</h3>
      <div class="prodmallLinks">
	      <ul class="stumenu">
		      <li><a href="">Category 1</a></li>
		      <li><a href="">Category 2</a></li>
		      <li><a href="">Category 3</a></li>
		      <li><a href="">Category 4</a></li>
	      </ul>
      <br>
    	<h3 class="mallHeader2">GreatMoods Mall Directory</h3>
	    <div class="prodmallLinks">
	      <ul class="stumenu">
	        <?php include 'includes/mall_directory_sample.php'; ?>
	      </ul>
	    </div>
    </div>
    
   <!-- <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=71&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item1.jpg" /></a>
      </div>
      <p>Zainy's Zoo</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=72&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item2.jpg" /></a>
      </div>
      <p>Deano's Dinosaurs</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=73&group=<?php echo $_GET['group']; ?>"><img src="images/zoo_item3.jpg" /></a>
      </div>
      <p>Sunny's Sea Sensations</p>
    </div> -->
    
  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>