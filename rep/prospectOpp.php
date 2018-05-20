<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>
  
  <div id="content">
    	<h1>Prospect Opportunities</h1>
		<h3>Understanding Fundraising Prospects in Your Community and Region</h3>
	
		<p>Fundraising Account Opportunities abound everywhere in the United States! Nearly every Small Town or Large City in the United States has Schools, Churches, Community Organizations, Sports Leagues, Scouting, Charitable Causes and individual needs. The need for Fundraising will never end and the great thing is you can help them with the GreatMoods Free Online Fundraising Program.</p>
		
		<p>Visit the "Example Websites" to view what your Prospective Individual Websites will look like. Once you get a sense of the Prospects in your Region it will be time to move on to the next step and setup the Prospects you want to go after.</p>
		
		<p>Prospect Categories and Accounts Listed below:</p>
	
		<div id="column1">
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Schools </h3></div> <!--end redBar1-->
					<h5> High Schools </h5> 
					<p> 50 to 60 Individual Fundraising Opportunities in one location </p>
					<ul>
						<li> Clubs and Organizations (30+)</li>
						<li> Athletic Teams (30+) </li>
					</ul>
					
					<h5>Middle Schools </h5>
					<p>40 to 50 Individual Fundraising Opportunities in one location </p>
					<ul>
						<li>Clubs and Organizations (25+)</li>
						<li>Athletic Teams (20+)</li>
						<li>PTA/PTO/PTC</li>
					</ul>
					
					<h5> Elementary Schools </h5>
					<p> Excellent Fundraising Prospects to upgrade from cookie dough, giftwrap and $1 chocolate bars, to Online Fundraising </p> 
					<ul>
						<li> Clubs and Organizations (10+)  </li> 
						<li>PTA/PTO/PTC</li>
					</ul>
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->
			
			<br><br>
			
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Faith Based Organizations</h3></div> <!--end redBar1-->
					<h5>Churches</h5>  
					<ul>
						<li> Church Ministries</li>
						<li> Choir</li>
						<li> General Fund</li>
						<li> Bible Camp & Youth Retreats</li>
						<li> Scout Troops within Churches</li>
					</ul>	
					<h5>Synagogues</h5>
					<h5>Mosques</h5>
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->
			
			<br><br>
			
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Local and National Charities</h3></div> <!--end redBar1-->
					<ul>
						<li>American Humane Society </li>
						<li>Breast Cancer Society </li>
						<li>Special Olympics</li>
						<li>MDA</li>
						<li>Other</li>
					</ul>	
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->
		</div> <!--end column1-->
	
	
		<div id="column2">
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Youth and Sports Organizations </h3></div> <!--end redBar1-->
					<ul>
						<li>Youth Organizations</li>  
						<li>Boy Scouts</li>
						<li>Girl Scouts</li>
						<li>Boys & Girls Club</li>
						<li>Dance Studios</li>
						<li>Other</li>
					</ul>
					
					<ul>
						<li>Youth Athletic Groups</li>  
						<li>Athletic Associations</li>
						<li>Individual Sports Teams</li>
						<li>Intramural Sports</li>
					</ul>
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->
	
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Community Organizations</h3></div> <!--end redBar1-->
					<ul>
						<li>Firemen & Police</li>  
						<li>Community Clubs</li>
						<li>Animal Shelters</li>
						<li>Local Food Shelves</li>
						<li>Local Homeless Shelters</li>
					</ul>
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->
	
			<div id="leadBox">
				<div id="infoText">
					<div id="redBar1"><h3>Local and National Organizations</h3></div> <!--end redBar1-->
					<ul>
						<!--<li>Local Causes </li>
						<li>Veterans </li>
						<li>Special Medical Bills </li>
						<li>Special Needs </li>
						<li>Memorials for Individuals </li>-->
						<li>Jaycees</li>
						<li>Kiwanis</li>
						<li>Knights of Columbus</li>
						<li>Lions Club International (LCI)</li>
						<li>The American Legion</li>
						<li>Veterans of Foreign Wars (VFW)</li>
					</ul>
				</div> <!--end infoText--> 
			</div> <!--end leadBox-->    
		</div> <!-- end of column2-->
      </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>