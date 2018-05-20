<?php
       include '../includes/autoload.php';
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
     if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       } 
     $userID = $_SESSION['userId'];
    
     $table = "representatives";
     $user_email = $_SESSION['email'];
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $cn = $row['companyName'];
     $fn = $row['FName'];
     $myPic = $row['picPath'];
   
?>

<!DOCTYPE html>
<head>
	<title>Representative Accounts</title>
</head>

<body>
<div id="container">
      
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ;?>
      
    <div id="content">
	<h2 align="center">Account Home</h2>
	
	<h3>Select Representative Account Below</h3>
	
          	<form>
			<?
			
			$query = "SELECT * FROM distributors WHERE setupID ='$userID' AND role = 'RP'";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		       
                       
				echo "<select name='users' style='width: 220px;' onchange='showUser(this.value)'><option>Select Representative Account</option>";
			
						
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            $fn = $row['FName'];
                            $ln = $row['LName'];
                            $rep = $fn.'&nbsp;'.$ln;
                            echo "<option value='".$row['loginid']."'>$rep</option>";
                        }
						
                        echo "";
			?>
			</select><br>
		</form>
		<br>
	<div id="">
		<div id="txtHint"><b>Selected Representative Account Information will display here.<b></div>
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