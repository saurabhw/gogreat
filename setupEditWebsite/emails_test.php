<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       ob_start();

       include '../includes/connection.inc.php';
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $group = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$group'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       //$group = $row1['setuppersonid'];
       $groupPic = $row1['group_team_pic'];
       //$memberID = $_GET['group'];

      /*
       

       $rep = $_SESSION['userId'];

       
       
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$group'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $groupPic = $row1['group_team_pic'];
       
       */
   $userID = $_SESSION['userId'];
   $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
   $row = mysqli_fetch_assoc($result1);
  
   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member | Send Emails</title>
</head>
	
<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	      
      	<div id="content">
		<h1>Send Emails</h1>
                                   
                <!-- test code for dropdown checkbox function -->
		<div class="dropdown">
			<input type="checkbox" id="checkbox-toggle">
			<label for="checkbox-toggle">Select Contact</label>
			<ul>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
				<li><input type="checkbox" id="">Contact 3</li>
				<li><input type="checkbox" id="">Contact 4</li>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
				<li><input type="checkbox" id="">Contact 3</li>
				<li><input type="checkbox" id="">Contact 4</li>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
				<li><input type="checkbox" id="">Contact 3</li>
				<li><input type="checkbox" id="">Contact 4</li>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
				<li><input type="checkbox" id="">Contact 3</li>
				<li><input type="checkbox" id="">Contact 4</li>
				<li><input type="checkbox" id="">Contact 1</li>
				<li><input type="checkbox" id="">Contact 2</li>
			</ul>
		</div>
                <!-- end test code -->
                  
                 
  	</div> <!--end content -->
  	
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