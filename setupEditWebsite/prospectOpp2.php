<?php
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../repSignup.php');
            exit;
       }
       ob_start();
?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title> Getting Started Representative Signup  </title> 
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../images/favicon.ico">
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
     
    <div id="content">
    <h1>Prospect Opportunities</h1>
    <h3>Understanding Fundraising Prospects in Your Community and Region</h3>

	<div id>
      		<p>Fundraising Account Opportunities abound everywhere in the United States! Nearly every Small Town or Large City in the United States has Schools, Churches, Community Organizations, Sports Leagues, Scouting, Charitable Causes and individual needs. The need for Fundraising will never end and the great thing is you can help them with the GreatMoods Free Online Fundraising Program.</p>
      		<p>Visit the "Example Websites" to view what your Prospective Individual Websites will look like. Once you get a sense of the Prospects in your Region it will be time to move on to the next step and setup the Prospects you want to go after.</p>
   		<p>Prospect Categories and Accounts Listed below:</p>
   		<p>Schools
•	High Schools (50 to 60 Individual Fundraising Opportunities in one location) 
1.	Clubs and Organizations
2.	Athletic Teams
3.	PTO/PTA
•	Middle Schools (40 to 50 Individual Fundraising Opportunities in one location)
1.	Clubs and Organizations
2.	Athletic Teams
3.	PTO/PTA
•	Elementary Schools (Excellent Prospects to upgrade to Online Fundraising)
1.	Clubs and Organizations
2.	Athletic Teams
3.	PTO/PTA
•	Colleges & Universities (Completely understand Social Networking)
1.	Clubs and Organizations
2.	Athletic Teams
</p>
   		<p>Religious Organizations
•	Churches 
1.	Ministries
2.	Choir
3.	General Fund
4.	Bible Camp & Youth Retreats
5.	Scout Troops with Church
•	Religious Organizations
1.	Synagogues
2.	Mosques
3.	Other
</p>
   		<p>Community Organizations
•	Firemen & Police
•	Community Clubs
1.	Jaycees
2.	Lions Club
3.	Rotary
4.	Kiwanis
5.	VFW
6.	American Legion Post
7.	Other
</p>
   		<p>Youth and Sports Organizations
•	Youth Organizations
1.	Boy Scouts
2.	Girl Scouts
3.	Boys & Girls Club
4.	Dance Studios
5.	Other
•	Youth Athletic Groups
1.	Athletic Associations
2.	Individual Sports Teams
3.	Intramural Sports
</p>
   		<p>Local and National Charities
•	National Organizations
1.	Breast Cancer Society
2.	Special Olympics
3.	MDA 
4.	Other
•	Individual Chapters
1.	Animal Humane Society
2.	Other
</p>
   		<p>Local Causes and Memorial
•	Local Causes
1.	Vets
2.	Special Medical Bills
3.	Special Needs
•	Memorials
1.	Individuals
</p>
   		   		
	</div> <!--end column1-->
    
	<div id="column2">
	    <div>
	    	<img src="" width="404" height="270" alt="">
		<img class="imgLeft" src="" width="198" height="166" alt="">
		<img class="imgRight" src="" width="198" height="166" alt="">
	    </div>

	</div>    <!--end column2--> 
      </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>