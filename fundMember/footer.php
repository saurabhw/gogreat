<div id="footer">
  <a href="#"><img id="footer_logo" src="../images/footer_logo.png" alt="GreatMoods Logo" width="253" height="83"/></a>
	<div id="footer_info">
	
		<ul class="footerMenu">
		 <?
		     if(isset($_SESSION['authenticated']))
		     {
		        echo'
                        <li><a href="memberHome.php">Account Homepage</a></li>
                        ';
                     }
                  ?>
                        <li><a href="membersite.php?group=<?php echo $_SESSION['groupid'];?>">Fundraiser Homepage</a></li>
                        <li><a href="fundgettingstarted11.php?group=<?php echo $_SESSION['groupid'];?>">GreatMoods Program Overview</a></li>
                        <li><a href="fundgettingstarted9.php?group=<?php echo $_SESSION['groupid'];?>">Getting Started</a></li>
                      	<!--<li><a href="">Privacy &amp; Warranties</a></li>-->
		</ul>
		
		<br><br><br>
		
		<ul class="footerMenu">
			<li>Copyright &copy; <?php echo date('Y'); ?> Greatmoods.com, LLC. All Rights Reserved</li>
		</ul>  
	</div>
</div>