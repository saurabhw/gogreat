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
<title>GreatMoods | Product Setup</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" >

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>Sportswear Setup</h1>
    
    <div id="column1">
    <form>
	    <h3>Product Information</h3>
	    <div class="graybackground">
	    	<div><span id="prodinput1">Vendor:</span> <select id="prodvendor" name="vendor">
			<option value="vendor1">Vendor Name 1</option>
			<option value="vendor2">Vendor Name 2</option>
			<option value="vendor3">Vendor Name 3</option>
			<option value="vendor4">Vendor Name 4</option>
			<option value="vendor5">Vendor Name 5</option>
			<option value="vendor6">Vendor Name 6</option>
			<option value="vendor7">Vendor Name 7</option>
			<option value="vendor8">Vendor Name 8</option>
			<option value="vendor9">Vendor Name 9</option>
			<option value="vendor10">Vendor Name 10</option>
			</select></div>
		    <div><span id="prodinput1">Item No:</span> <input id="proditem" type="text" name="item">
		    <span id="prodinput2">UPC:</span> <input id="produpc" type="text" name="upc"></div>
		    <div></div>
		    <div><span id="prodinput1">Name:</span> <input id="prodname" type="text" name="name"></div>
		    <div><span id="prodinput1">Description:</span> <input id="proddescription" type="text" name="description"></div>
		    <div><span id="prodinput1">Contents:</span> <input id="prodcontents" type="text" name="contents"></div>
		    <div><span id="prodinput1">Dimensions:</span> <input id="proddimensions" type="text" name="dimensions">
		    <span id="prodinput3">Weight:</span> <input id="prodweight" type="text" name="weight"></div>
		    <div></div> 
	    </div>
	    <br>
	    
	    <h3>Product Price Options</h3>
	    <div class="graybackground">
	    	<div id=""><b>Shipping:</b>
		    <br>Standard: $<input id="shipping" type="text" name="shipping">
		    XXL: $<input id="shipping" type="text" name="shipping" value="1.00">
		    XXXL: $<input id="shipping" type="text" name="shipping" value="2.00"></div>
		    <br>
	    	<div id=""><b>Starting Product:</b>
	    	    <br>Wholesale Cost: $<input id="prodwholesale" type="text" name="wholesale">
		    Retail Price: $<input id="prodretail" type="text" name="retail"></div>
		</div>
		<br><b>Gift Wrapping:</b>
		<div class="graybackground">
		    <div id=""><b>Standard:</b>
		    <br>Wholesale Cost: $<input id="prodwholesale" type="text" name="standardwholesale">
		    Retail Price: $<input id="prodretail" type="text" name="standardretail"></div>
		    <br>
		    <div id=""><b>Deluxe:</b>
		    <br>Wholesale Cost: $<input id="prodwholesale" type="text" name="deluxewholesale">
		    Retail Price: $<input id="prodretail" type="text" name="deluxeretail"></div>
		</div>
		<br><b>Clothing Personalization:</b>
		<div class="graybackground">
		    <div id=""><b>Screenprinting:</b>
		    <br>Wholesale Cost: $<input id="prodwholesale" type="text" name="screenwholesale">
		    Retail Price: $<input id="prodretail" type="text" name="screenretail"></div>
		    <br>
		    <div id=""><b>Embroidery:</b>
		    <br>Wholesale Cost: $<input id="prodwholesale" type="text" name="embroiderywholesale">
		    Retail Price: $<input id="prodretail" type="text" name="embroideryretail"></div>
	    </div>
	    <br>
	    
	    <h3>Upload Photos</h3>
	    <div class="graybackground">
		    <label for="">Upload Small Photo</label>
		    <br><input type="file" name="file" id="file">
		    <br><br>
		    <label for="">Upload Medium Photo</label>
		    <br><input type="file" name="file" id="file">
		    <br><br>
		    <label for="">Upload Large Photo</label> 
		    <br><input type="file" name="file" id="file">
	    </div>
	    <br>
	    
	    <h3>Photo Locations</h3>
	    	<b>Product Photos</b>
	    <div class="graybackground">
		    <span id="photopath">Small Photo Path:</span> <input id="photopath2" type="text" name="smphoto" value="">
		    <br>
		    <span id="photopath">Medium Photo Path:</span> <input id="photopath2" type="text" name="medphoto" value="images/">
		    <br>
		    <span id="photopath">Large Photo Path:</span> <input id="photopath2" type="text" name="lgphoto" value="images/products/">
	    </div>
	    <br>
	    <b>Slider Photos</b>
	    <div class="graybackground">
		    <span id="photopath">Slider 1 Photo Path:</span> <input id="photopath2" type="text" name="smphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 2 Photo Path:</span> <input id="photopath2" type="text" name="medphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 3 Photo Path:</span> <input id="photopath2" type="text" name="lgphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 4 Photo Path:</span> <input id="photopath2" type="text" name="smphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 5 Photo Path:</span> <input id="photopath2" type="text" name="medphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 6 Photo Path:</span> <input id="photopath2" type="text" name="lgphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 7 Photo Path:</span> <input id="photopath2" type="text" name="smphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 8 Photo Path:</span> <input id="photopath2" type="text" name="medphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 9 Photo Path:</span> <input id="photopath2" type="text" name="lgphoto" value="images/">
		    <br>
		    <span id="photopath">Slider 10 Photo Path:</span> <input id="photopath2" type="text" name="lgphoto" value="images/">
	    </div>
	    <br>
	
    </form>
    </div>
    
    <div id="column2"> 
    <form>
	<h3>Sorting Options</h3>
		<b>Stores & Categories:</b>
	    	<div class="graybackground">
	    		<div id="sortstore"><input type="checkbox" name="VarsitySportsandFitness" value="VarsitySportsandFitness">Varsity Sports & Fitness</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Game Day Sports">Game Day Sports</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="Silly Sports">Silly Sports</div>
	    			<div id="sortcategory"><input type="checkbox" name="" value="The Locker Room">The Locker Room</div>
    		</div>
    		<br>
    	<div class="graybackground">
	    	<em>Coming 2014</em>
    		<div id="sortstore"><input type="checkbox" name="TheManCave" value="TheManCave">The Man Cave</div>
    		<!--<div id="sortstore"><input type="checkbox" name="CookieandChocolateFactory" value="CookieandChocolateFactory">Cookie and Chocolate Factory</div>
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
    		<div id="sortstore"><input type="checkbox" name="TheChocolateFactory" value="TheChocolateFactory">The Chocolate Factory</div>-->
    	</div>
    	<br>
	    <b>Colors:</b><br>
	    	<div class="graybackground">
	    		<div id="sortcolor"><input type="checkbox" name="all" value="all">Select All</div>
	    		<div id="sortcolor"><input type="checkbox" name="black" value="black">black</div>
	    		<div id="sortcolor"><input type="checkbox" name="blue" value="blue">blue</div>
	    		<div id="sortcolor"><input type="checkbox" name="brown" value="brown">brown</div>
	    		<div id="sortcolor"><input type="checkbox" name="gold" value="gold">gold</div>
	    		<div id="sortcolor"><input type="checkbox" name="gray" value="gray">gray</div>
	    		<div id="sortcolor"><input type="checkbox" name="green" value="green">green</div>
	    		<div id="sortcolor"><input type="checkbox" name="white" value="white">white</div>
	    		<div id="sortcolor"><input type="checkbox" name="multi" value="multi">multi<br></div>
	    		<div id="sortcolor"><input type="checkbox" name="orange" value="orange">orange</div>
	    		<div id="sortcolor"><input type="checkbox" name="pink" value="pink">pink</div>
	    		<div id="sortcolor"><input type="checkbox" name="purple" value="purple">purple<br></div>
	    		<div id="sortcolor"><input type="checkbox" name="red" value="red">red<br></div>
	    		<div id="sortcolor"><input type="checkbox" name="silver" value="silver">silver</div>
	    		<div id="sortcolor"><input type="checkbox" name="tan/beige" value="tanbeige">tan/beige</div>
	    		<div id="sortcolor"><input type="checkbox" name="ivory/cream" value="ivorycream">Ivory/Cream</div>
	    		<div id="sortcolor"><input type="checkbox" name="yellow" value="yellow">yellow</div>
	    	</div>
	    <br>
	    <b>Fabrics:</b><br>
	    	<div class="graybackground">
	    		<div id="sortfabric"><input type="checkbox" name="acrylic" value="acrylic">Acrylic</div>
	    		<div id="sortfabric"><input type="checkbox" name="blend" value="blend">Blend</div>
	    		<div id="sortfabric"><input type="checkbox" name="cashmere" value="cashmere">Cashmere</div>
	    		<div id="sortfabric"><input type="checkbox" name="cotton" value="cotton">Cotton</div>
	    		<div id="sortfabric"><input type="checkbox" name="faux fur" value="fauxfur">Faux Fur</div>
	    		<div id="sortfabric"><input type="checkbox" name="fleece" value="fleece">Fleece</div>
	    		<div id="sortfabric"><input type="checkbox" name="leather" value="leather">Leather</div>
	    		<div id="sortfabric"><input type="checkbox" name="linen" value="linen">Linen</div>
	    		<div id="sortfabric"><input type="checkbox" name="modal" value="modal">Modal</div>
	    		<div id="sortfabric"><input type="checkbox" name="nylon" value="nylon">Nylon<br></div>
	    		<div id="sortfabric"><input type="checkbox" name="polyester" value="polyester">Polyester</div>
	    		<div id="sortfabric"><input type="checkbox" name="rayon" value="rayon">Rayon</div>
	    		<div id="sortfabric"><input type="checkbox" name="satin" value="satin">Satin<br></div>
	    		<div id="sortfabric"><input type="checkbox" name="silk" value="silk">Silk<br></div>
	    		<div id="sortfabric"><input type="checkbox" name="suede" value="suede">Suede</div>
	    		<div id="sortfabric"><input type="checkbox" name="wool/wool blend" value="wool">Wool/Wool Blend</div>
	    	</div>
	    <br>
	    <b>Sizes:</b><br>
	    	<div class="graybackground">
	    		<div id="sortsize"><input type="checkbox" name="aone" value="aone">Adult One Size</div>
	    		<div id="sortsize"><input type="checkbox" name="axxsm" value="axxsm">Adult XXSm</div>
	    		<div id="sortsize"><input type="checkbox" name="axsm" value="axsm">Adult XSm</div>
	    		<div id="sortsize"><input type="checkbox" name="asm" value="asm">Adult Sm</div>
	    		<div id="sortsize"><input type="checkbox" name="amed" value="amed">Adult Med</div>
	    		<div id="sortsize"><input type="checkbox" name="alg" value="alg">Adult Lg</div>
	    		<div id="sortsize"><input type="checkbox" name="axlg" value="axlg">Adult XLg</div>
	    		<div id="sortsize"><input type="checkbox" name="axxlg" value="axxlg">Adult XXLg</div>
	    		<div id="sortsize"><input type="checkbox" name="axxxlg" value="axxxlg">Adult XXXLg<br></div>
	    	</div>
	    <br>
	    	<div class="graybackground">
	    		<div id="sortsize"><input type="checkbox" name="yone" value="yone">Youth One Size</div>
	    		<div id="sortsize"><input type="checkbox" name="yxsm" value="yxsm">Youth XSm</div>
	    		<div id="sortsize"><input type="checkbox" name="ysm" value="ysm">Youth Sm</div>
	    		<div id="sortsize"><input type="checkbox" name="ymed" value="ymed">Youth Med</div>
	    		<div id="sortsize"><input type="checkbox" name="ylg" value="ylg">Youth Lg</div>
	    		<div id="sortsize"><input type="checkbox" name="yxlg" value="yxlg">Youth XLg</div>
	    	</div>
	    <br>
	    <b>Ages:</b><br>
	    	<div class="graybackground">
	    		<div id="sortage"><input type="checkbox" name="0-3" value="0-3">0-3yrs</div>
	    		<div id="sortage"><input type="checkbox" name="4-7" value="4-7">4-7yrs</div>
	    		<div id="sortage"><input type="checkbox" name="8-10" value="8-10">8-10yrs</div>
	    		<div id="sortage"><input type="checkbox" name="11-13" value="11-13">11-13yrs</div>
	    		<div id="sortage"><input type="checkbox" name="14-17" value="14-17">14-17yrs</div><br>
	    		<div id="sortage"><input type="checkbox" name="young adult" value="young adult">Young Adult</div>
	    		<div id="sortage"><input type="checkbox" name="adult" value="adult">Adult</div>
	    		<div id="sortage"><input type="checkbox" name="senior" value="senior">Senior</div>
	    	</div>
	    <br>
	    <b>Gender:</b><br>
	    	<div class="graybackground">
	    		<div id="sortgender"><input type="checkbox" name="male" value="male">Male</div>
	    		<div id="sortgender"><input type="checkbox" name="female" value="female">Female</div>
	    		<div id="sortgender"><input type="checkbox" name="unisex" value="unisex">Unisex</div>
	    	</div>
	    <br>	
	    <div id="redbutton"><input type="submit" value="Add Product"></div>
    </form> 
    </div>

  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>