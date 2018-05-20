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
	<title>Title |Members A to Z</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">
    <h1>Students or Members - A to Z </h1>
    
    <h3>Achieving Success for your Goal is our Goal... So Let’s Do It!!!</h3>

      		<h5>Student/ Member Step by Step Fundraising Checklist </h5>
      		<ul>
      		  <li> When working with students, tell them that Volunteering to be on Fundraising Leaders Team will be a Great College Application Reference </li>
      		  <li>Help the Fundraising Leaders Setup their Main Website  </li>
      		  <li>Setup your Personalized Fundraising Website </li>
      		  <li>Setup your Friends and Family Supporters List and add local Businesses </li>
      		  <li>Add a link to your Twitter and Facebook Page connecting it to your Fundraising Website </li>
      		  <li>Start the Email Campaign Kickoff  </li>   
      	        </ul>
      	        
      		<h5>Year Round Opportunity to Generate Funds </h5>
      		  <li>Holidays </li>
      		  <li>Apparel Seasons</li>		 
      		  
      		<h5>The GreatMoods Mall Products and Gifts </h5>
      		<h5>The Student Member Potential Prospects </h5>
      		  <li>Friends & Family   </li>
      		  <li>Local Businesses   </li>
                  <li>Meeting and Events   </li>
      		
                <h5>Fundraising Tools </h5>
                  <li>Video Training   </li>
      		  <li>Tablet or Laptop Presentation   </li>
                  <li>Forms at Events   </li>
                  <li>Contact Cards   </li>

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