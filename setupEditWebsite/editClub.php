<?php
   session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
   if(isset($_POST['submit1']))
       {
          $_SESSION['role'] = "RP";
          $_SESSION['home'] = "setupEditWebsite/editClub.php";
       }
   if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
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
	<?php include 'sideLeftNav.php' ; ?>
	
      
    <div id="content">
   
	<h2 align="center">View Accounts</h2>
	<h3>Select An Account Below</h3>
	
          	<form>
          	
          	<select name='users' style='width: 220px;' onchange='showUser(this.value)'><option>Select Account Name</option>
			<?
			//$query = "SELECT DISTINCT  Dealer, Zip FROM $table WHERE setuppersonid ='$userID' ORDER BY Dealer";
			$query = "SELECT * FROM $table WHERE setuppersonid ='$userID' AND isMainGroup = 1 ORDER BY Dealer asc";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		    			
                        while ($row = mysqli_fetch_assoc($result)){
                            $dealer = $row['Dealer'];
                           $idDealer = $row['loginid'];
                           /* 
                 echo '<option value="'.$idDealer.'">'.stripslashes($row[Dealer]) .' '.$row[City].' '.$row[State].'</option>';
                 */
                 echo '<option value="'.$dealer.','.$row['Zip'].','.$idDealer.'">'.stripslashes($row['Dealer']) .' '.$row['City'].' '.$row['State'].'</option>';
                 
                 
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

<?php
   ob_end_flush();
?>