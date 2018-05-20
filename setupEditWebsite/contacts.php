<?php
   session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
   if(!isset($_SESSION['authenticated']))
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
   $myQuery = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysqli_error($link));
   $myRow = mysqli_fetch_assoc($myResult);
  
   $pic = $myRow['picPath'];
?>

<!DOCTYPE html>
<head>
<title>View Contacts | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	       	
    <div id="content">
	<h1>Fundraising Contacts</h1>
    	<h3>Current Contacts</h3>
     	
     	
      	<div id="graybackground">
      	<select class="" name="groupid" id="groupid" onChange="fetch_select2(this.value);">
							<option value="">Select FR Account</option>
							<?php 
						$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID'  AND isMainGroup = 0 ORDER BY Dealer asc";
						$result = mysqli_query($link, $getAccount)
						or die("MySQL ERROR om query 1: ".mysqli_error($link));
						while($row = mysqli_fetch_assoc($result))
						{
						  $dealerName = $row['Dealer'];
						  echo '
						  <option value="'.$row['loginid'].'">'.$dealerName.' '.$row[DealerDir].'</option>
						  ';
					        }
						?>
						</select>
						 <span id="ma"></span>
						<select class="" name="memberid" id="memberid" onChange="fetch_select3(this.value);">
						

						</select>
		
      <table id="memberContacts" class="table table-bordered table-striped">
          
      <?
     //include 'getRepContacts.php';
      ?>
    
     
        </div>
       
        <br>
       <!-- <p><a href="addContacts.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Add Contacts" title="Add Contacts"/></a>-->
       <!-- <a href="editMembers.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Continue to Members" title="Continue to Members"/></a></p>-->
        
        </table>
        </div>
        </div> <!--end content-->
          
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>