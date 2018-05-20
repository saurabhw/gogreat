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
<title>GreatMoods | Vendors</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" >

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>Vendors</h1>
    
	    <h3>View Vendors</h3>
	    <div class="sorting">		
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
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name&ensp;</span>
			<span id="titlerowright">
				<a href="editVendor.php"><input id="redbutton" type="button" value="Edit"></a>
				<input id="redbutton" type="button" value="Turn Off">
				<input id="redbutton" type="button" value="Delete">
			</span>
	    	</div>
	    	
	    	<div class="graybackground">	    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Website</span> 
					<span class="prodcell">Username</span>
					<span class="prodcell">Password</span>
					<span class="prodcell">Address</span>
					<span class="prodcell">City</span>
					<span class="prodcell">State</span>
					<span class="prodcell">Zip</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell"><a href="#">vendorwebsite.com</a></span>
					<span class="prodcell">username</span>
					<span class="prodcell">password</span>
					<span class="prodcell">1234 address</span>
					<span class="prodcell">city</span>
					<span class="prodcell">MN</span>
					<span class="prodcell">12345</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Email</span> 
					<span class="prodcell">Phone 1</span>
					<span class="prodcell">Phone 2</span>
					<span class="prodcell">Show</span>
					<span class="prodcell">Showroom</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">vendor@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">Show Name</span>
					<span class="prodcell">ABC###</span>
				</div>
				<br>
				<p><em>Contacts</em></p>
				<div class="prodrow1">
					<span class="prodcell">Title</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">Email</span>
					<span class="prodcell">Cell Phone</span>
					<span class="prodcell">Office Phone</span>
					<span class="prodcell">Ext</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
			</div> <!-- end vendor table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	<br>
	
	<div class="result">
	    <hr>
	    	<div id="sortresults">
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name</span>
			<span id="titlerowright">
				<a href="editVendor.php"><input id="redbutton" type="button" value="Edit"></a>
				<input id="redbutton" type="button" value="Turn Off">
				<input id="redbutton" type="button" value="Delete">
			</span>
	    	</div>
	    	
	    	<div class="graybackground">	    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Website</span> 
					<span class="prodcell">Username</span>
					<span class="prodcell">Password</span>
					<span class="prodcell">Address</span>
					<span class="prodcell">City</span>
					<span class="prodcell">State</span>
					<span class="prodcell">Zip</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell"><a href="#">vendorwebsite.com</a></span>
					<span class="prodcell">username</span>
					<span class="prodcell">password</span>
					<span class="prodcell">1234 address</span>
					<span class="prodcell">city</span>
					<span class="prodcell">MN</span>
					<span class="prodcell">12345</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Email</span> 
					<span class="prodcell">Phone 1</span>
					<span class="prodcell">Phone 2</span>
					<span class="prodcell">Show</span>
					<span class="prodcell">Showroom</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">vendor@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">Show Name</span>
					<span class="prodcell">ABC###</span>
				</div>
				<br>
				<p><em>Contacts</em></p>
				<div class="prodrow1">
					<span class="prodcell">Title</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">Email</span>
					<span class="prodcell">Cell Phone</span>
					<span class="prodcell">Office Phone</span>
					<span class="prodcell">Ext</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
			</div> <!-- end vendor table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	    <br>
	    
	    <div class="result">
	    <hr>
	    	<div id="sortresults">
	    		<span id="titlerowleft">Vendor ID No.&ensp;|&ensp;Vendor Name&ensp;</span>
			<span id="titlerowright">
				<a href="editVendor.php"><input id="redbutton" type="button" value="Edit"></a>
				<input id="redbutton" type="button" value="Turn Off">
				<input id="redbutton" type="button" value="Delete">
			</span>
	    	</div>
	    	
	    	<div class="graybackground">	    	
		    	<div id="prodtable"> 
		    		<div class="prodrow1">
					<span class="prodcell">Website</span> 
					<span class="prodcell">Username</span>
					<span class="prodcell">Password</span>
					<span class="prodcell">Email</span> 
					<span class="prodcell">Phone 1</span>
					<span class="prodcell">Phone 2</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell"><a href="#">vendorwebsite.com</a></span>
					<span class="prodcell">username</span>
					<span class="prodcell">password</span>
					<span class="prodcell">vendor@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
				</div>
				<br>
				<div class="prodrow1">
					<span class="prodcell">Address</span>
					<span class="prodcell">City</span>
					<span class="prodcell">State</span>
					<span class="prodcell">Zip</span>
					<span class="prodcell">Show</span>
					<span class="prodcell">Showroom</span>
				</div>
				<div class="prodrow2">

					<span class="prodcell">1234 address</span>
					<span class="prodcell">city</span>
					<span class="prodcell">MN</span>
					<span class="prodcell">12345</span>
					<span class="prodcell">Show Name</span>
					<span class="prodcell">ABC###</span>
				</div>
				<br>
				<p><em>Contacts</em></p>
				<div class="prodrow1">
					<span class="prodcell">Title</span>
					<span class="prodcell">Name</span>
					<span class="prodcell">Email</span>
					<span class="prodcell">Cell Phone</span>
					<span class="prodcell">Office Phone</span>
					<span class="prodcell">Ext</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
				<div class="prodrow2">
					<span class="prodcell">Title</span>
					<span class="prodcell">First Last</span>
					<span class="prodcell">email@email.com</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">###-###-####</span>
					<span class="prodcell">####</span>
				</div>
			</div> <!-- end vendor table -->
		</div> <!-- end gray background -->
	    </div> <!-- end result -->
	    
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>