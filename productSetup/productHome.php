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
<title>GreatMoods | Product Setup Home</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" >

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>Product Setup Home</h1>
    
	    <h3>View Products</h3>
	    <div class="sorting">
	    <select name="vendor"> <!-- take from vendor setup -->
	    	<option value="all">All Vendors</option>
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
		</select>
		
		<select name="type"> <!-- based off setup pages -->
		<option value="all">All Types</option>
		<option value="scarf">Scarves</option>
		<option value="jewelry">Jewelry</option>
		<option value="sportswear">Sportswear</option>
		<option value="wrap">Wraps</option>
		<option value="tie">Ties</option>
		<option value="giftbasket">Gift Baskets</option>
		<option value="general">General</option>
		</select>
		
		<select name="store"> <!-- all stores -->
		<option value="all">All Stores</option>
		<option value="store1">Fun Fashion Boutique</option>
		<option value="store2">Jewelry&sbquo; Glitz &amp; Glamour Store</option>
		<option value="store3">Luxury Salon &amp; Spa</option>
		<option value="store4">Coffee Cafe</option>
		<option value="store5">Varsity Sports &amp; Fitness</option>
		<option value="store6">Fun &amp; Games Family Shop</option>
		<option value="store7">Going Bananas Zoo</option>
		<option value="store8">Creative Kids Multi-Media Center</option>
		<option value="store9">Candyland</option>
		<option value="store10">Barney&lsquo;s Pet Shop</option>
		<option value="store11">The Man Cave</option>
		<option value="store12">Cookie &amp; Chocolate Factory</option>
		<option value="store13">Santa&lsquo;s Workshop</option>
		<option value="store14">Romantically Sweet Boutique</option>
		<option value="store15">Inspirational&sbquo; Motivational &amp; Success Treasures</option>
		<option value="store16">Customer &amp; Client Concierge Club</option>
		<option value="store17">Children&lsquo;s Corner</option>
		<option value="store18">Bags Galore</option>
		<option value="store19">The Healthy &amp; Happy Shop</option>
		<option value="store20">Happy&sbquo; Hardy-Party Superstore</option>
		<option value="store21">Care Packages with Love</option>
		<option value="store22">The Holiday Home Store</option>
		<option value="store23">Cookie Jar Bakery</option>
		<option value="store24">The Chocolate Factory</option>
		</select>

		<!-- category shown depends on store selected -->
		<select name="fashioncategory">
		<option value="all">All Fashion Categories</option>
		<option value="category1">Scarves, Scarves, Scarves</option>
		<option value="category2">Designer Work Wear</option>
		<option value="category3">Evening Collections</option>
		<option value="category4">Out & About</option>
		</select>
		
		<select name="jewelrycategory">
		<option value="all">All Jewelry Categories</option>
		<option value="category1">Necklace & Earring Sets</option>
		<option value="category2">Bracelets</option>
		<option value="category3">Christian Corner</option>
		</select>
		
		<select name="spacategory">
		<option value="all">All Spa Categories</option>
		<option value="category1">Spa Salon Selections</option>
		<option value="category2">Hair & Nail Salon</option>
		</select>

		<select name="coffeecategory">
		<option value="all">All Coffee Categories</option>
		<option value="category1">Coffee Cafe Gifts</option>
		<option value="category2">Coffee Cafe Express</option>
		<option value="category3">Cider & Cocoa Concoctions</option>
		</select>
		
		<select name="sportscategory">
		<option value="all">All Sports Categories</option>
		<option value="category1">Game Day Sports</option>
		<option value="category2">Silly Sports</option>
		<option value="category3">The Locker Room</option>
		</select>
		
		<select name="familycategory">
		<option value="all">All Family Categories</option>
		<option value="category1">Fun & Games</option>
		<option value="category2">Silly Sports</option>
		</select>
		
		<select name="zoocategory">
		<option value="all">All Zoo Categories</option>
		<option value="category1">Enter Zoo</option>
		</select>
		
		<select name="kidscategory">
		<option value="all">All Kids Categories</option>
		<option value="category1">Early Learning Arts & Crafts</option>
		</select>
		
		<select name="candycategory">
		<option value="all">All Candy Categories</option>
		<option value="category1">The Candy Counter</option>
		</select>
		
		<select name="petcategory">
		<option value="all">All Pet Categories</option>
		<option value="category1">Biscuits, Bones & Playtime Fun</option>
		</select>
		
		</div> <!-- end sorting -->
	<br>
		<!-- results shown depend on sorting and setup -->
	    <div class="result">
	    <hr>
	    	<div id="sortresults">
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name&ensp;|&ensp;Store&ensp;|&ensp;Category</span>
			<span id="titlerowright"><input id="redbutton" type="button" value="Edit"><input id="redbutton" type="button" value="Turn Off"><input id="redbutton" type="button" value="Delete"></span>
	    	</div>
	    	
	    	<div class="graybackground">
		    	<div id="prodphoto">
		    		<img src="" alt="preview photo" height="115" width="115"/>
		    	</div> <!-- end product photo -->
		    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Prod ID</span> 
					<span class="prodcell">Product Name</span>
					<span class="prodcell">UPC</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">Dimensions</span>
					<span class="prodcell">Weight</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">#####</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">############</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">## x ## x ##</span>
					<span class="prodcell">## lbs, ## oz</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Shipping</span>
					<span class="prodcell">Whsle</span>
					<span class="prodcell">Retail</span>
					<span class="prodcell">Standard Whsle</span>
					<span class="prodcell">Standard Retail</span>
					<span class="prodcell">Deluxe Whsle</span>
					<span class="prodcell">Deluxe Retail</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
				</div>
			</div> <!-- end product table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	<br>
	
	<div class="result">
	<hr>
	    	<div id="sortresults">
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name&ensp;|&ensp;Store&ensp;|&ensp;Category</span>
			<span id="titlerowright"><input id="redbutton" type="button" value="Edit"><input id="redbutton" type="button" value="Turn Off"><input id="redbutton" type="button" value="Delete"></span>
	    	</div>
	    	
	    	<div class="graybackground">
	    	<div id="prodphoto">
	    		<img src="" alt="preview photo" height="115" width="115"/>
	    	</div> <!-- end product photo -->
	    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Prod ID</span> 
					<span class="prodcell">Product Name</span>
					<span class="prodcell">UPC</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">Dimensions</span>
					<span class="prodcell">Weight</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">#####</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">############</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">## x ## x ##</span>
					<span class="prodcell">## lbs, ## oz</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Shipping</span>
					<span class="prodcell">Whsle</span>
					<span class="prodcell">Retail</span>
					<span class="prodcell">Standard Whsle</span>
					<span class="prodcell">Standard Retail</span>
					<span class="prodcell">Deluxe Whsle</span>
					<span class="prodcell">Deluxe Retail</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
				</div>
			</div> <!-- end product table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	    <br>
	    
	    <div class="result">
	    <hr>
	    	<div id="sortresults">
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name&ensp;|&ensp;Store&ensp;|&ensp;Category</span>
			<span id="titlerowright"><input id="redbutton" type="button" value="Edit"><input id="redbutton" type="button" value="Turn Off"><input id="redbutton" type="button" value="Delete"></span>
	    	</div>
	    	
	    	<div class="graybackground">
	    	<span id="prodphoto">
	    		<img src="" alt="preview photo" height="115" width="115"/>
	    	</span> <!-- end product photo -->
	    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Prod ID</span> 
					<span class="prodcell">Product Name</span>
					<span class="prodcell">UPC</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">Dimensions</span>
					<span class="prodcell">Weight</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">#####</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">############</span>
					<span class="prodcell">Description</span>
					<span class="prodcell">Contents</span>
					<span class="prodcell">## x ## x ##</span>
					<span class="prodcell">## lbs, ## oz</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Shipping</span>
					<span class="prodcell">Whsle</span>
					<span class="prodcell">Retail</span>
					<span class="prodcell">Standard Whsle</span>
					<span class="prodcell">Standard Retail</span>
					<span class="prodcell">Deluxe Whsle</span>
					<span class="prodcell">Deluxe Retail</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
					<span class="prodcell">$0.00</span>
				</div>
			</div> <!-- end product table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	    
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>