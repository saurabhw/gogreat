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
	<title> Income $uccess Potential </title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
     
      
    <div id="content">
    <h1>Income $uccess Potential </h1>
    <h3>Accomplishing your Life’s Goals and Dreams </h3>

	<div id>
      		<p>Look at how easy the GreatMoods Fundraising Program is to set up and how much it can accomplish for both your Account as well as you.  The annual and longterm earning potential for everyone is just awesome. Who is ever going to turn off a Free Fundraising Website that does all the work and generates Funds for them year round?</p>
      		<p>The average professional Fundraising Representative has about 150 Fundraisers a year (mostly in the Fall) and in a lot of cases they have been doing the exact same fundraiser with them for over 20 years. Could you set up even half of that? If you can, you will be doing extremely well for yourself for the next 20 to 30 years. </p>
   		<p>“To Good to Be True”, and “This is a No Brainer” is what we have heard again and again. You do the numbers using our Income Calculator and see for yourself that this is not only real but that it can start today.</p>
   		<p>Achieving Success, means Setting Goals, so begin with “Meaningful Specifics”. Review again the Fundraising Examples section and Prospect Opportunities to understand your Possibilities. Define your initial Account Territory / Region, Account Base and Account Goals with either our Prospect Forms or Templates. </p>
   		<p>Enter your Prospect Account Goal estimates in to our Income Calculator. If it’s like most people you will probably be very, very happy and upbeat about the prospect of a very bright Future for yourself! Now, Let’s make it happen!</p>
   		<p>Proceed to our <a href="repCalculator.php">Income Calculator</a> to determine your income potential. </p>
   		
   	</div>  <!--end content-->

 


  
     
  	 
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