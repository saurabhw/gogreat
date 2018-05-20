<?php
   include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
     $userID = $_SESSION['userId'];
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>


<!DOCTYPE html>
<head>
	<title> Prospect Opportunities </title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
     
    <div id="content">
    <h1>Prospect Opportunities</h1>
    <h3>Understanding Fundraising Prospects in Your Community and Region</h3>

	<div id>
      		<p>Fundraising Account Opportunities abound everywhere in the United States! Nearly every Small Town or Large City in the United States has Schools, Churches, Community Organizations, Sports Leagues, Scouting, Charitable Causes and individual needs. The need for Fundraising will never end and the great thing is you can help them with the GreatMoods Free Online Fundraising Program.</p>
      		<p>Visit the "Example Websites" to view what your Prospective Individual Websites will look like. Once you get a sense of the Prospects in your Region it will be time to move on to the next step and setup the Prospects you want to go after.</p>
   		<p>Prospect Categories and Accounts Listed below:</p>
   <div id="column1">
		
   	<div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Schools </h3>
          </div> <!--end redBar1-->
          <ul>
                <h5> High Schools </h5> 
                 <p> 50 to 60 Individual Fundraising Opportunities in one location </p>      
		<li> Clubs and Organizations (30+)</li>
		<li> Athletic Teams (30+) </li>
	 </ul>	
	 <ul>
                <h5>Middle Schools </h5>
                <p> 40 to 50 Individual Fundraising Opportunities in one location </p>
		<li> Clubs and Organizations (25+)</li>
		<li> Athletic Teams (20+)</li>
		<li> PTO/PTA</li>
	 </ul>	
	 <ul>
	        <h5> Elementary Schools </h5>
	        <p> Excellent Fundraising Prospects to upgrade from cookie dough, giftwrap and $1 chocolate bars, to Online Fundraising </p> 
	 	<li> Clubs and Organizations (10+)  </li> 
	 	<li>PTO/PTA</li>
	 </ul>
        </div> <!--end infoText--> 
	</div> <!--end leadBox-->
	
	
	<div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Religious Organizations</h3>
          </div> <!--end redBar1-->
          <ul>
                <h5>Churches</h5>  
		<li> Church Ministries</li>
		<li> Choir</li>
		<li> General Fund</li>
		<li> Bible Camp & Youth Retreats</li>
		<li> Scout Troops within Churches</li>
		<h5>Synagogues</h5>
		<h5>Mosques</h5>
	</ul>	
	     </div> <!--end infoText--> 
	     </div> <!--end leadBox-->
                 
        <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Local and National Charities</h3>
          </div> <!--end redBar1-->
          <ul>
     
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
          <div id="redBar1">
            <h3>Youth and Sports Organizations </h3>
          </div> <!--end redBar1-->
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
	<br></br>
      
          <div id="leadBox">
         <div id="infoText">
          <div id="redBar1">
            <h3>Community Organizations</h3>
          </div> <!--end redBar1-->
          <ul>
               <li>Firemen & Police</li>  
		<li>Community Clubs</li>
		<li>American Legion Post</li>
		<li>Jaycees</li>
		<li>Kiwanis</li>
		<li>Lions Club</li>
		<li>Rotary</li>
		<li>VFW</li>
	   </ul>
           <ul>
               <li>Youth Athletic Groups</li>  
		<li>Athletic Associations</li>
		<li>Individual Sports Teams</li>
		<li>Intramural Sports</li>
	   </ul>
	   </div> <!--end infoText--> 
	  </div> <!--end leadBox-->
	  <br></br>
	  
	   <div id="leadBox">
         <div id="infoText">
          <div id="redBar1">
            <h3>Local Causes and Memorial</h3>
          </div> <!--end redBar1-->
          <ul>
              <li>Local Causes </li>
              <li>Veterans </li>
              <li>Special Medical Bills </li>
              <li>Special Needs </li>
              <li>Memorials for Individuals </li>
          </div> <!--end infoText--> 
	  </div> <!--end leadBox-->    
           <br></br>    
	  </div> 
	  </div> <!-- end of column2-->
	  
	  <p>&nbsp;</p> <!-- white space -->
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