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
	<title> GreatMoods Sales Representative Training Program Overview - A to Z </title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">
        
        <h1>Training Program Overview - A to Z</h1> 
        <h3>GreatMoods Sales Representative </h3>     
	<div id>
      		<p>Welcome! GreatMoods is completely committed to developing a long term, successful relationship with you and your future fundraising customers, period. Achieving Success for your Goals is our Goal. Exciting, fun, challenging and rewarding are all words to describe your New Career with GreatMoods. </p>
      		<p>Think about it, what you get to do, every day of the week, is help people accomplish their goals, dreams and missions within your Community and Region. Pretty neat, huh? </p>
   		<p>Making a very good long term financial living from our Online Fundraising Program is obviously another great benefit of GreatMoods. Online Fundraising is the future, door to door sales will soon be the past. Social networking is going through the roof with today’s smart phone, tablet and laptop generation.  </p>
	<p>The GreatMoods Free Online Fundraising Program is the solution that all the Schools, Churches and Community Organizations will love once you sign them up and get them started. Begin your future today by following our step by step fundraising success program!  </p>
	
	<h5>First Step:</h5>
	<p>To begin as a GreatMoods Representative Review the “Program Features” at www.GreatMoods.com </p>
<ul>	
	<ol>1)	Start by clicking on and reviewing each left navigation button on the Homepage at www.GreatMoods.com, to understand the primary features of 		the GreatMoods Fundraising Program.<br><br>
	2)      Review various selections in the Fundraising Examples (via the top red menu bar) to see what your Future Accounts will look like. <br><br>
	3)	To view the Fundraiser Account Setup Screens your Fundraising Account Leaders will use, select "3 Steps to Fundraising $uccess!".  Steps 1 & 		2 illustrate the information that is setup or edited for their account and Students or Members.<br><br>
	4)	Step 3 illustrates the Student / Member Setup Screens to understand what they will see to setup and edit their personal website and to setup 		their Friends and Family Supporters.<br><br>
	5)	View and Use the Income Calculator to set Fundraising Goals. <br><br>
 </ol>
 </ul>
 
 <h5>Second Step:</h5>
<p> Read the other topics on the left menu bar you’re viewing:
<ul>
<ol>
1)	Understand your Responsibilities to your Accounts, their Success makes your $uccess!<br><br>
2)	Study your Prospective Account Opportunities.<br><br>
3)	Define the Prospects in your Region who you would like to call on, using our Prospect Forms. <br><br>
4)	Prioritize those Prospects into a top 10 to 20 list that you want to focus on first.<br>Click on one of the links to see an example of the High School Prospect List:  
   	                <a href="../forms/V16.0 High School Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 High School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a> <br><br>
      5)Send in that list to your GreatMoods Contact so we can create the Banners and you can start to research those Prospect Accounts for Contact Information, Pictures, Phone Numbers etc. <br><br>
6)	Get those Prospect Accounts Website Banners setup (to use as a selling tool).<br><br> 
</ol>
</ul>

	
	</div> <!--end column1-->
    
<!--	<div id="column2">
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