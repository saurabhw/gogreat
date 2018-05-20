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
   $myQuery = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error());
   $myRow = mysqli_fetch_assoc($myResult);
  
   $pic = $myRow['picPath'];
   $bob = 24503;
?>

<!DOCTYPE html>
<head>
<title>GreatMoods | View Contacts</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	       	
    <div id="content">
	<h1>Fundraising Contacts</h1>
    	<h3>Current Contacts</h3>
     	
     	
      	<div id="graybackground">
      		<select class="role4" name="scid" onChange="fetch_select2(this.value);" required>
	                <option>Select Sales Coordinator</option>
	                <option value="<?  echo $bob;?>">GreatMoods Coordinator</option>
	                <?
	                     $sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
	                     $result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysql_error());
	                     while($row2 = mysqli_fetch_assoc($result2))
	                     {
	                        echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
	                     }
	                 ?>
      		 </select>
      		 
                 <select class="role4" name="rpid" id="rpid" onChange="fetch_select3(this.value);" required>
                 <option>Select</option>	
                 </select>
                 
		 <select class="role4" name="groupid" onChange="fetch_select(this.value);" id="groupid">
		 <option>Select</option> 	
		 </select>
		 
		 <select class="role4" name="memberid" id="memberid" onChange="fetch_select5(this.value);" required>
		 <option>Select</option>	
		 </select>
		 
      		<!--<select class="role4" name="groupid" id="groupid" onChange="fetch_select2(this.value);">
			<option value="">Select FR Account</option>
			<?php 
			$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID'";
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

		</select>-->
		
      <table id="memberContacts">
      <?
     //include 'getRepContacts.php';
      ?>
      </table>
        </div>
       
        <br>
       <!-- <p><a href="addContacts.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Add Contacts" title="Add Contacts"/></a>-->
       <!-- <a href="editMembers.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Continue to Members" title="Continue to Members"/></a></p>-->
        </div><?php include 'footer.php' ; ?>
        </div> <!--end content-->
          
      
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>