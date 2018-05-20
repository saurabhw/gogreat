<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header_homepage2.php' ; ?>
  <?php include 'leftSidebarNavHomepage.php' ; ?>
  <div id="mainboxtopnav">

	<span class="style3">Gift Baskets</span>

	<hr class="header">
	<br />

	<table width="80%" cellpadding="0px;" cellspacing="0px;">

			<td><a href="/holidays<t/?id=<? echo $dir ?>"><span class="giftbasketordering">Holidays</span></a></td>
		</tr>
		
		<tr>
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=695"><img border="0px;" src="/Images/products/gb/merrychristmas.png" /></a>
				<br />
				<strong>Classic Comforts</strong>
				
			</td>
			
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=689"><img border="0px;" src="/Images/products/gb/frostytreats.jpg" /></a>
				<br />
				<strong>Frosty Treats</strong>
				
			</td>
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=684"><img border="0px;" src="/Images/products/gb/atthecabin.jpg" /></a>
				<br />
				<strong>At the Cabin</strong>
				
			</td>
					
		</tr>
		
	<tr valign="bottom">	
		
				<td height="50" colspan="3"><a href="/coffee/?id=<? echo $dir ?>"><span class="giftbasketordering">Coffee &amp; Treats</span></a></td>
		</tr>
		
<!--ROW TWO-->
		<tr>
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=818"><img border="0px;" src="/Images/products/gb/earlytorise.jpg" /></a>
				<br />
				<strong>Early to Rise</strong>
				
			</td>
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=832"><img border="0px;" src="/Images/products/gb/cupofjoe.jpg" /></a>
				<br />
				<strong>Coffee Time</strong>
				
			</td>
		
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=672"><img border="0px;" src="/Images/products/gb/coffeebreak.jpg" /></a>
				<br />
				<strong>Coffee Break</strong>
				
			</td>	
		<tr>

		<tr valign="bottom">
		
			<td height="50" colspan="3"><a href="/holidays/?id=<? echo $dir ?>"><span class="giftbasketordering">Gifts</span></a></td>
		</tr>
						
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=701"><img border="0px;" src="/Images/products/gb/sportsspectacular.jpg" /></a>
				<br />
				<strong>Sports Spectacular</strong>
				
			</td>
					
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=697"><img border="0px;" src="/Images/products/gb/movietime.jpg" /></a>
				<br />
				<strong>Movie Time</strong>
				
			</td>
		</tr>


		<tr valign="bottom">	
		
				<td height="50" colspan="3"><a href="/coffee/?id=<? echo $dir ?>"><span class="giftbasketordering">For the Kids</span></a></td>
		</tr>
		
<!--ROW SIX-->
		<tr>
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=693"><img border="0px;" src="/Images/products/gb/kiddinaround.jpg" /></a>
				<br />
				<strong>Kiddin Around</strong>
				
			</td>
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=686"><img border="0px;" src="/Images/products/gb/celebration.jpg" /></a>
				<br />
				<strong>Celebration</strong>
				
			</td>
			
		</tr>

		<tr valign="bottom">

		<td height="50" colspan="3"><a href="/coffee/?id=<? echo $dir ?>"><span class="giftbasketordering">Scarves</span></a></td>
		</tr>
		
		<tr>
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=833"><img border="0px;" src="/Images/products/gb/timelessclassic.jpg" /></a>
				<br />
				
				
			</td>
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=834"><img border="0px;" src="/Images/products/gb/moderndaytraditional.jpg" /></a>
				<br />
				
				
			</td>
		
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=835"><img border="0px;" src="/Images/products/gb/contemporaryelegance.jpg" /></a>
				<br />
				
				
			</td>	
		<tr>

		<tr valign="bottom">
	
		
		</tr>
		
		<tr>
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=836"><img border="0px;" src="/Images/products/gb/sophisticatedelegance.jpg" /></a>
				<br />
				
				
			</td>
			
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=837"><img border="0px;" src="/Images/products/gb/vibrantsophisticate.jpg" /></a>
				<br />
				
				
			</td>
		
			<td align="center">
				<a href="/product.php?id=<?php echo $dir; ?>&bid=838"><img border="0px;" src="/Images/products/gb/thenewtraditional.jpg" /></a>
				<br />
				
				
			</td>	
		<tr>

		<tr valign="bottom">
		

	</table>

</div>

<!--end mainboxtopnav-->

<!--END CONTENT-->
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>
