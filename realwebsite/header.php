<link href="../css/headerStyles.css" rel="stylesheet" type="text/css">
<link href="../css/form.css" rel="stylesheet" type="text/css">
<link href="../css/mainNavStyles.css" rel="stylesheet" type="text/css">


        <div id="headerMain">
               <div id="headerArc">
                  <a href="../index.php"><img src="../images/GMlogo6.png" id="GMlogo" alt="GM Logo"   /></a> 
                     <?php
					if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
						echo '<span style="position: relative; top: 30px;">';
						echo '<form id="log" action="logInUser.php" method="post">';
						echo '<label id="user">email: </label><input type="text" name="email" id="user" value=""><br />';
                        echo '<label id="user">password: </label><input type="password" name="password" value="" ><br />';
                        echo '<input id="user" type="submit" value="login" />';
                        echo '<p class="user"><a href="">Forgot Password?</a>  <a href="">Register</a></p>';
                       echo '</form></span>';
					} elseif($_SESSION['LOGIN'] == "TRUE") {
						echo "<span style='position:absolute; top: 160px; left: 40px;'><form action='logout.php' method='LINK'>";
						echo "<input type='submit' value='Logout' /></form></span>";
					}
					?>
              	</div><!--end headerArc-->
                   
                     <ul id="menu">
 	<li><a href="../index.php"> Welcome</a></li>
    <li><a href="#" class="drop">Sample Website<br/>Fundraisers</a><!-- Begin 4 columns Item -->
		<div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
                <h3><a class="lead" href="">High School</a></h3>
                   <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
                    	<ul>
                            <li><a href="#">Band</a></li>
                            <li><a href="#">BPA</a></li>
                           <li><a href="#">Book Club</a></li>
                           <li><a href="#">Booster Club</a></li>
                        <li><a href="#">Chess club</a></li>
                        <li><a href="#">Choir</a></li>
                       <li><a href="#">Class Trips</a></li>
                       <li><a href="#">Debate</a></li>
                        <li><a href="#">FBLA</a></li>
                        <li><a href="#">Language Club</a></li>
                        <li><a href="#">Library</a></li>
                       <li><a href="#">National Art HS</a></li>
                       <li><a href="#">National Honor Society</a></li>
                       <li><a href="#">Prom Committee</a></li>
                         <li><a href="#">PTA/PTO</a></li>
                        <li><a href="#">Scholars Bowl</a></li>
                       <li><a href="#">Scholarship Counseling</a></li>
                       <li><a href="#">School Counseling</a></li>
                        <li><a href="#">Science &amp; Math Club</a></li>
                        <li><a href="#">Student Council</a></li>
                       <li><a href="#">Theatre</a></li>
                       <li><a href="#">Yearbook News Broadcasting</a></li>
                        </ul>
                
               
           
            </div>
			<div class="col_1">
				<h3><a class="subHead" href="">Athletics</a></h3>
                <ul>
                        <li><a href="#">Baseball</a></li>
                        <li><a href="#">Basketball</a><a href="">Boys</a><a href="">Girls</a></li>
                        <li><a href="#">Bowling</a></li>
                        <li><a href="#">Cheerleading</a></li>
                        <li><a href="#">Cross Country</a></li>
                        <li><a href="#">Danceline</a></li>
                        <li><a href="#">Football</a></li>
                        <li><a href="#">Field Hockey</a></li>
                    	<li><a href="#">Golf</a></li>
                  		<li><a href="#">Gymnastics</a></li>
						<li><a href="#">Ice Hockey</a></li>
                        <li><a href="#">Lacrosse</a></li>
                        <li><a href="#">Power Lifting</a></li>
                    	<li><a href="#">Ski Club</a></li>
                  		<li><a href="#">Soccer</a></li>
						<li><a href="#">Softball</a></li>
                        <li><a href="#">Swimming &amp; Diving</li>
                    	<li><a href="#">Tennis</a></li>
                  		<li><a href="#">Track &amp; Field</a></li>
						<li><a href="#">Volleyball</a></li>
					
                 </ul>
			</div>
            <div class="col_1">
				<h3><a class="lead" href="">Middle Schools</a></h3>
                 	<h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
                 		<ul>
                        <li><a href="#">Band</a></li>
                        <li><a href="#">Book Club</a></li>
                        <li><a href="#">Booster Club</a></li>
                        <li><a href="#">Chess Club</a></li>
                        <li><a href="#">Choir</a></li>
                        <li><a href="#">Class Trips</a></li>
                        <li><a href="#">Debate</a></li>
                        <li><a href="#">Library</a></li>
                    	<li><a href="#">PTA/PTO</a></li>
                  		<li><a href="#">School Counseling</a></li>
						<li><a href="#">Science Club</a></li>
                       	<li><a href="#">Math Club</a></li>
                            
                         </ul>
                         <br />   
                    <h3><a class="subHead" href="#">Activities</a></h3>
                 			<ul>
                               <li><a href="#">Baseball</a></li>
                                <li><a href="#">Basketball</a></li>
                                <li><a href="#">Bowling</a></li>
                                <li><a href="#">Cheerleading</a></li>
                                <li><a href="#">Cross Country</a></li>
                                <li><a href="#">Football</li>
                                <li><a href="#">Field Hockey</a></li>
                                <li><a href="#">Golf</a></li>
                                <li><a href="#">Gymnastics</a></li>
                                 <li><a href="#">Ice Hockey</a></li>
                                <li><a href="#">Lacrosse</a></li>
                                <li><a href="#">Ski Club</a></li>
                                <li><a href="#">Soccer</a></li>
                                <li><a href="#">Softball</a></li>
                                <li><a href="#">Swimming</li>
                                <li><a href="#">Tennis</a></li>
                                <li><a href="#">Track &amp; Field</a></li>
                                <li><a href="#">Volleyball</a></li>   
                         </ul>   
   				</div>
            <div class="col_1">
				 <h3><a class="lead" href="">Elementary</a></h3>
                    <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
                 		<ul>
                               <li><a href="">Afterschool Programs</a></li>
                            <li><a href="">Band</a></li>
                            <li><a href="">Booster Club</a></li>
                            <li><a href="">School Carnival</a></li>
                            <li><a href="">Choir</a></li>
                            <li><a href="">Class Field Trip</a></li>
                            <li><a href="">Library</a></li>
                            <li><a href="">PTA/PTO</a></li>
                            <li><a href="">School Counseling</a></li>
                            <li><a href="">Science Club</a></li>
                       		<li><a href="">Math Club</a></li>
                       </ul>   
             		
                    <h3><a class="subHead" href="">Activities</a></h3>
                         <ul>
                                <li><a href="#">Athletic Equipment Fundraiser</a></li>
                                <li><a href="#">Field &amp; Equipment Fundraiser</a></li>
                                <li><a href="#">General Fundraiser</li>
                                <li><a href="#">Playground Equipment Fundraiser</a></li>
                           </ul>   
                    </div>
			
			
			
			<div class="col_1">
						<h3><a class="lead" href="">Religions</a></h3>
                        <ul>
                            <li><a href="#">Church</a></li>
                            <li><a href="#">Mosque</a></li>
                            <li><a href="#">Synagogue</a></li>
                        </ul>   
               	   <h3><a class="lead" href="">Community Organizations</a></h3>
                        <ul>
                            <li><a href="#">Fire</a></li>
                            <li><a href="#">Police</a></li>
                            <li><a href="#">Lion's Club</a></li>
                            <li><a href="#">Jaysees</a></li>
                            <li><a href="#">Rotary</a></li>
                        	<li><a href="#">Knights of Columbus</a></li>
                        </ul>    
           		 <h3><a class="lead" href="">Youth &amp; Sports</a></h3>
                        <ul>
                            <li><a href="#">Boy Scouts</a></li>
                            <li><a href="#">Girl Scouts</a></li>
                            <li><a href="#">YMCA</a></li>
                            <li><a href="#">Athletic Associations</a></li>
                            <li><a href="#">Big Brothers/Big Sisters</a></li>
                        </ul>
                
            </div>
            <div class="col_1">
            	<h3><a class="lead" href="">Local &amp National Charities </a></h3>
         			 <ul>
                        <li><a href="#">Humane Society</a></li>
                        <li><a href="#">Breast Cancer Research</a></li>
                        <li><a href="#">Alzheimers</a></li>
                        <li><a href="#">Parkinsons</a></li>
                        <li><a href="#"></a></li>
					</ul> 
            	<h3><a class="lead" href="">Causes</a></h3>
         			 <ul>
                        <li><a href="#">Vets</a></li>
                        <li><a href="#">Personal</a></li>
                        <li><a href="#">Memorial Fund</a></li>
                        <li><a href="#">Hospital</a></li>
                        <li><a href="#">Local Benefit</a></li>
					</ul> 
            </div>
</div><!-- End 4 columns container -->
<li><a href="../programs.php">GreatMoods<br/>Programs</a></li>
<li><a href="../giftBaskets.php">Gift Basket<br/>Opportunities</a></li>    
<li><a href="../gettingStarted.php">Getting<br/>Started</a></li> 
<li><a href="../setupEditMainWebsite/index.php">Setup/Edit<br/>Website</a></li>     
<li><a href="../trainingSalesRep/index.php">Training Tips,<br/>Tools &amp; Forms </a></li>        
    </li><!-- End 4 columns Item -->
</ul>
       <div id="menuWrapper">
                     </div>    		
                
    			
  </div> <!--end headerMain-->          
