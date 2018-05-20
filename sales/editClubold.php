<?php
session_start();
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
require_once('../includes/functions.php');
$link = connectTo();
 if(isset($_POST['submit1']))
       {
          $_SESSION['role'] = "SC";
          $_SESSION['home'] = "sales/viewReps.php";
       }
// if session variable not set, redirect to login page
if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }

   $userID = $_SESSION['userId'];

   $table = "Dealers";

   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
       
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
</head>

<body>
<div id="container">
      
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
	<h1>View Accounts</h1>
	<h3>Select An Account Below</h3>
	
          	<form>
          	
          	<select name='users' style='width: 220px;' onchange='showUser(this.value)'><option>Select Account Name</option>
			<?
			$query = "SELECT DISTINCT Dealer, Zip FROM $table WHERE setuppersonid ='$userID' ORDER BY Dealer";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysql_error()); 
		    			
                        while ($row = mysqli_fetch_assoc($result)){
                            $dealer = $row['Dealer'];
                            $idDealer = $row['loginid'];
                            echo '<option value="'.$dealer.','.$row[Zip].'">'.$row[Dealer] .' '.$row[City].' '.$row[State].'</option>';
                        }
						
                        echo "</select>";
                       
			?>
			<br>
		</form>
		<br>
		<div id="">
			<div id="txtHint"><b>Account Groups will display here.<b></div>
		</div>
		
	<p>&nbsp;</p>
	</div> <!--end content-->
  
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