<?php
	session_start();
/*	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/
	ob_start();
?>
<!DOCTYPE HTML>
<title>GreatMoods | Vendor Setup</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" >

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>Vendor Setup</h1>
    
    <div id="column1">
    <form>
	    <h3>Vendor Information</h3>
	    <div class="graybackground">
		    <div><span id="prodinput4">Vendor No:</span><input id="vendorno" type="text" name=""><span id="prodinput5">Name:</span><input id="vendorname" type="text" name=""></div>
		    <br>
		    <div><span id="prodinput4">Website:</span><input id="vendorwebsite" type="text" name=""></div>
		    <div><span id="prodinput4">Username:</span><input id="vendoruser" type="text" name=""><span id="prodinput6">Password:</span><input id="vendorpswd" type="text" name=""></div>
		    <br>
		    <div><span id="prodinput4">Address:</span><input id="vendoraddress" type="text" name=""></div>
		    <div><span id="prodinput4">City:</span><input id="vendorcity" type="text" name=""></div>
		    <div><span id="prodinput6">State:</span>
		    	<select id="vendorstate">
				<option value="Alabama">Alabama</option>
				<option value="Alaska">Alaska</option>
				<option value="Arizona">Arizona</option>
				<option value="Arkansas">Arkansas</option>
				<option value="California">California</option>
				<option value="Colorado">Colorado</option>
				<option value="Connecticut">Connecticut</option>
				<option value="Delaware">Delaware</option>
				<option value="Florida">Florida</option>
				<option value="Georgia">Georgia</option>
				<option value="Hawaii">Hawaii</option>
				<option value="Idaho">Idaho</option>
				<option value="Illinois">Illinois</option>
				<option value="Indiana">Indiana</option>
				<option value="Iowa">Iowa</option>
				<option value="Kansas">Kansas</option>
				<option value="Kentucky">Kentucky</option>
				<option value="Louisiana">Louisiana</option>
				<option value="Maine">Maine</option>
				<option value="Maryland">Maryland</option>
				<option value="Massachusetts">Massachusetts</option>
				<option value="Michigan">Michigan</option>
				<option value="Minnesota">Minnesota</option>
				<option value="Mississippi">Mississippi</option>
				<option value="Missouri">Missouri</option>
				<option value="Montana">Montana</option>
				<option value="Nebraska">Nebraska</option>
				<option value="Nevada">Nevada</option>
				<option value="New Hampshire">New Hampshire</option>
				<option value="New Jersey">New Jersey</option>
				<option value="New Mexico">New Mexico</option>
				<option value="New York">New York</option>
				<option value="North Carolina">North Carolina</option>
				<option value="North Dakota">North Dakota</option>
				<option value="Ohio">Ohio</option>
				<option value="Oklahoma">Oklahoma</option>
				<option value="Oregon">Oregon</option>
				<option value="Pennsylvania">Pennsylvania</option>
				<option value="Rhode Island">Rhode Island</option>
				<option value="South Carolina">South Carolina</option>
				<option value="South Dakota">South Dakota</option>
				<option value="Tennessee">Tennessee</option>
				<option value="Texas">Texas</option>
				<option value="Utah">Utah</option>
				<option value="Vermont">Vermont</option>
				<option value="Virginia">Virginia</option>
				<option value="Washington">Washington</option>
				<option value="West Virginia">West Virginia</option>
				<option value="Wisconsin">Wisconsin</option>
				<option value="Wyoming">Wyoming</option>
			</select>
		    <span id="prodinput8">Zip:</span><input id="vendorzip" type="text" name=""></div>
		   <br>
		   <div><span id="prodinput4">Phone 1:</span><input id="vendorphone" type="text" name=""><span id="prodinput7">Phone 2:</span><input id="vendorphone" type="text" name=""></div>
		    <div><span id="prodinput4">Email:</span><input id="vendoremail" type="text" name=""></div>
		    <br>
		    <div><span id="prodinput4">Show:</span><input id="vendorshow" type="text" name=""><span id="prodinput4">Showroom:</span><input id="vendorroom" type="text" name=""></div>
	    </div>
	    <br>
	    
	    <h3>Contact Information</h3>
	    <div class="graybackground">
	    	<b>Contact 1:</b><br>
		    <div><span id="prodinput5">Title:</span><input id="vendortitle" type="text" name=""><span id="prodinput5">Name:</span><input id="vendorname2" type="text" name=""></div>
		    <div><span id="prodinput5">Email:</span><input id="vendoremail2" type="text" name=""></div>
		    <div><span id="prodinput5">Cell:</span><input id="vendorphone" type="text" name="">
		    <span id="prodinput5">Office:</span><input id="vendorphone" type="text" name="">Ext: <input id="vendorext" type="text" name=""></div>
		 <br>
		<b>Contact 2:</b><br>
		    <div><span id="prodinput5">Title:</span><input id="vendortitle" type="text" name=""><span id="prodinput5">Name:</span><input id="vendorname2" type="text" name=""></div>
		    <div><span id="prodinput5">Email:</span><input id="vendoremail2" type="text" name=""></div>
		    <div><span id="prodinput5">Cell:</span><input id="vendorphone" type="text" name="">
		    <span id="prodinput5">Office:</span><input id="vendorphone" type="text" name="">Ext: <input id="vendorext" type="text" name=""></div>
		 <br>
		<b>Contact 3:</b><br>
		    <div><span id="prodinput5">Title:</span><input id="vendortitle" type="text" name=""><span id="prodinput5">Name:</span><input id="vendorname2" type="text" name=""></div>
		    <div><span id="prodinput5">Email:</span><input id="vendoremail2" type="text" name=""></div>
		    <div><span id="prodinput5">Cell:</span><input id="vendorphone" type="text" name="">
		    <span id="prodinput5">Office:</span><input id="vendorphone" type="text" name="">Ext: <input id="vendorext" type="text" name=""></div>
	    </div>
    </form>
    </div>
    
    <div id="column2"> 
    <form>
	<h3>Sorting Options</h3>
	   <b>Products in These Stores & Categories:</b><br>
	    	<div class="graybackground">
	    		<div id="sortstore"><input type="checkbox" name="FunFashionBoutique" value="FunFashionBoutique">Fun Fashion Boutique</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Scarves, Scarves, Scarves">Scarves, Scarves, Scarves</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Designer Work Wear">Designer Work Wear</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Evening Collections">Evening Collections</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Out & About">Out & About</div>
	    		<div id="sortstore"><input type="checkbox" name="JewelryGlitzandGlamourStore" value="JewelryGlitzandGlamourStore">Jewelry, Glitz & Glamour Store</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Necklace & Earring Sets">Necklace & Earring Sets</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Bracelets">Bracelets</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Christian Corner">Christian Corner</div>	    	
	    		<div id="sortstore"><input type="checkbox" name="LuxurySalonandSpa" value="LuxurySalonandSpa">Luxury Salon & Spa</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Spa Salon Selections">Spa Salon Selections</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Hair & Nail Salon">Hair & Nail Salon</div>
	    		<div id="sortstore"><input type="checkbox" name="CoffeeCafe" value="CoffeeCafe">Coffee Cafe</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Coffee Cafe Gifts">Coffee Cafe Gifts</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Coffee Cafe Express">Coffee Cafe Express</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Cider & Cocoa Concoctions">Cider & Cocoa Concoctions</div>
	    		<div id="sortstore"><input type="checkbox" name="VarsitySportsandFitness" value="VarsitySportsandFitness">Varsity Sports & Fitness</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Game Day Sports">Game Day Sports</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Silly Sports">Silly Sports</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="The Locker Room">The Locker Room</div>
	    		<div id="sortstore"><input type="checkbox" name="FunandGamesFamilyShop" value="FunandGamesFamilyShop">Fun & Games Family Shop</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Fun & Games">Fun & Games</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Silly Sports">Silly Sports</div>
	    		<div id="sortstore"><input type="checkbox" name="GoingBananasZoo" value="GoingBananasZoo">Going Bananas Zoo</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Enter Zoo">Enter Zoo</div>
	    		<div id="sortstore"><input type="checkbox" name="CreativeKidsMulti-MediaCenter" value="CreativeKidsMulti-MediaCenter">Creative Kids Multi-Media Center</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Early Learning Arts & Crafts">Early Learning Arts & Crafts</div>
	    		<div id="sortstore"><input type="checkbox" name="Candyland" value="Candyland">Candyland</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="The Candy Counter">The Candy Counter</div>
	    		<div id="sortstore"><input type="checkbox" name="BarneysPetShop" value="BarneysPetShop">Barney's Pet Shop</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Biscuits, Bones & Playtime Fun">Biscuits, Bones & Playtime Fun</div>
    		</div>
    		<br>
    	<div class="graybackground">
	    	<em>Coming 2014</em>
    		<div id="sortstore"><input type="checkbox" name="TheManCave" value="TheManCave">The Man Cave</div>
    		<div id="sortstore"><input type="checkbox" name="CookieandChocolateFactory" value="CookieandChocolateFactory">Cookie and Chocolate Factory</div>
    		<div id="sortstore"><input type="checkbox" name="SantasWorkshop" value="SantasWorkshop">Santa's Workshop</div>
    		<div id="sortstore"><input type="checkbox" name="RomanticallySweetBoutique" value="RomanticallySweetBoutique">Romantically Sweet Boutique</div>
    		<div id="sortstore"><input type="checkbox" name="InspirationalMotivationalandSuccessTreasures" value="InspirationalMotivationalandSuccessTreasures">Inspirational, Motivational & Success Treasures</div>
    		<div id="sortstore"><input type="checkbox" name="CustomerandClientConciergeClub" value="CustomerandClientConciergeClub">Customer & Client Concierge Club</div>
    		<div id="sortstore"><input type="checkbox" name="ChildrensCorner" value="ChildrensCorner">Children's Corner</div>
    		<div id="sortstore"><input type="checkbox" name="BagsGalore" value="BagsGalore">Bags Galore</div>
    		<div id="sortstore"><input type="checkbox" name="TheHealthyandHappyShop" value="TheHealthyandHappyShop">The Healthy &amp; Happy Shop</div>
    		<div id="sortstore"><input type="checkbox" name="HappyHardy-PartySuperstore" value="HappyHardy-PartySuperstore">Happy, Hardy-Party Superstore</div>
    		<div id="sortstore"><input type="checkbox" name="CarePackageswithLove" value="CarePackageswithLove">Care Packages with Love</div>
    		<div id="sortstore"><input type="checkbox" name="TheHolidayHomeStore" value="TheHolidayHomeStore">The Holiday Home Store</div>
    		<div id="sortstore"><input type="checkbox" name="CookieJarBakery" value="CookieJarBakery">Cookie Jar Bakery</div>
    		<div id="sortstore"><input type="checkbox" name="TheChocolateFactory" value="TheChocolateFactory">The Chocolate Factory</div>
    	</div>
	    	<br>
	    	
	    <div id="redbutton"><input type="submit" value="Add Vendor"></div>
    </form> 
    </div>

  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>