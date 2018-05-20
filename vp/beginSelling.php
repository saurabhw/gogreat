<?php
     include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
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
     $pic = $row['picPath'];
?>

<!DOCTYPE html>
<head>
	<title>Let the Fundraising Begin!</title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
    <h1> Let the Fundraising Begin!</h1>
    <h3>Calling & Presenting the Program or Setting up an Appointment (In Person, On the Phone or Both) </h3>

	<div id>
      		<h5>Be Prepared! </h5>
      		<p>Before presenting our program to your prospects, familiarize yourself with our GreatMoods Program and Marketing Tools. The Presentation Packet is targeted towards the Fundraising Leader(s) and can be handed out &/or emailed to Prospects.</p>
      		
   		<h5>Components of your Sales Presentation: </h5>
 	        <p>The Presentation Packet (leave behind as a handout): 
 	        <a href="../forms/greatmoods_marketing_packet_v2.docx" target="_blank" title="Click to download file">DOC</a> |
   		<a href="../forms/ad_brainstormingtemplate_v1.0_July22.pdf" target="_blank" title="Click to download file">PDF</a>
   		</p>	 
   		  	
	        <p>The Prospect Account’s Custom Sample Website </p>

     		<p>The Presentation Components are located either Online or as a Printout and include: </p>
     		<ul>
		        <li> Welcome Cover Page </li>
		        <li> GreatMoods Overview </li>
		        <li> 10 Reasons </li>
		        <li> Student Fundraising Website Example </li>
		        <li> The GreatMoods Mall </li>
		        <li> A Retail Store </li>
		        <li> Product Page </li>
		       <!-- <li> Checkout </li>  -->
		       <!-- <li> Get Started Today </li>  -->
	       </ul>

<!--Email link-->
</p>
   		<h5>Presenting the GreatMoods Fundraising Program over the Phone or In-Person  </h5>
   	<p>The first step to setting up a Fundraising Account is to have the Sample Website created and the Presentation Packet together.  The second is getting a hold of the decision making Contact for the Prospect Organization.  A “Contact” refers to a Coach, Director, Church Minister, Etc.  There are typically two main ways to go about doing this.</p>
   	<p>1) Online. Finding the number of a Contact will either be really easy or somewhat difficult depending on the Organization you’re dealing with. Some Organizations will have a list of all the Directors, Coaches, Advisors, Etc. with all their numbers and email addresses online. If that’s the case, awesome, get ready to call. </p>
        <p>2) Via the Phone. If you can’t find the information online, call the Organization’s main contact number and ask specifically for whomever it is you may be looking for. </p>
      <p> If you’re having a hard time getting a hold of possible clients, email peter@GreatMoods.com for assistance. </p>	
   	
   	<h5> You should have your Sales Presentation Packet and Custom Sample Website together in advance of the first call </h5> <p> There is a chance you call at a time they're not busy & they have time to go over the Fundraising Program right then, so be ready to present it. The other thing that could happen from the initial call is you will set up an appointment with your Prospect.  Be ready for it!  You could also suggest to your contact that they invite other club leaders to the meeting who would also like to raise money for their clubs.</p> 	

<p> Many middle & high schools have athletic and activity directors who can meet during the day, but be aware that frequently the coaches aren’t teachers at the same school.  You will need to take school hours into consideration when contacting or scheduling meeting. </p>

<p>When you do the presentation, the Prospect can either follow along at the GreatMoods Website or with a Presentation Document that you have brought to the Appointment.  It’s a good idea to always have a printed Presentation Document with you.  If they’re having unexpected internet problems, you can still do the presentation and leaving behind a document that is customized for them is a good sales technique. </p>

<p>If, during the presentation they say “Yes”, they can proceed to the Fundraiser Setup. 
The Prospect Leader can begin by announcing the GreatMoods Program to the Students or Members and letting them know how to get started.  

</p>
   	   
   		
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