<?php
     include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
     $userID = $_SESSION['userId'];
    
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>

<!DOCTYPE html>
<head>
	<title>Your Fundraising Presentation</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
    <h1> Your Fundraising Presentation</h1>
    <h5>In-Person Sales Presentation Appointments </h5>

	<div id>
      		<p>You’re just about ready to start setting up fundraisers, but before you do that, you should always make sure you have the various necessities needed for a call or appointment. Here’s what you’ll need to do:  </p>
      		
   		<h5>In-Person Appointment Presentation Checklist </h5>
   		
 	        
     		<p>
	        <li>  	Have the sales Presentation Documents and Custom Website URL ready to show them. </li>
	        <li> 	Setup up the date, time and specific location in the building to meet. </li>
	        <li> 	Get Everyone you can at the appointment that are decision makers or potential Fundraising Leaders. </li>
	        <li> 	Introduce yourself to the prospects in a friendly way to develop a long term relationship. </li>
	        <li> 	Ask the prospect about their current Fundraising status, if any, and discuss their Goals. </li>
	        <li> 	Get a sense of their Fundraising needs. </li>
	        <li> 	Explain the GreatMoods Fundraising Program and how it will address their needs. </li>
	        <li> 	When they say Yes, fill out the ‘Sign Up and Start Today’ page. This page can be found by clicking on the link entitled ‘$ign Up and $tart Today’ on the homepage of the GreatMoods website. You’ll need to print this out. Who will be the Fundraising Leaders you should work with, etc. </li>
	        <li> 	Bring a hard copy of an example Fundraiser website. Just in case the person you’re presenting to doesn’t have internet access. This will be a series of 5 sheets of paper that you’ll have to print out and staple together. </li>
	        <li> 	Lastly, always bring the basics. A notebook, pen, business card (or a sheet of paper with your basic information on it). </li>
                    </p>
          

   		<p>* By the time you’re done with your appointment, you should leave behind the Presentation Packet you put together. That way the client has something to look back at once you’ve left. </p>
                <p>*  It’s up to you whether or not you leave the (The Example Fundraiser Packet) with your client. You can either take it or leave it. If they want it, leave it. If you feel it would be beneficial to leave it behind, leave it. </p>

   		<h5>Over the Phone Sales Presentation Appointments </h5>
   	  	 <p>
   	  	 <li> 	Be in front of a computer, have the sales packet in front of you so you can walk them thru the presentation. </li> 
   	  	 <li>   Introduce yourself to the prospect(s). </li>
   	  	 <li> 	Ask the prospect about their current fundraising status, if any, and discuss their goals.  </li>
   	  	 <li> 	Get a sense of their fundraising needs. </li>
   	  	 <li> 	Explain the GreatMoods Fundraising Program and how it will address their needs.  </li> 
   		 <li> 	When they say Yes, fill out the ‘Sign Up and Start Today’ page at their Custom Website to get them started. Who will be the leaders you should work with, etc. </li> 
   		
	</div> <!--end column1-->
    
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