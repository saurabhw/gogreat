<?php
      include '../includes/autoload.php';
      //if not logged in kick them to home page
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
       
      
       //$getGroup = $_GET['group'];
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
       $pic = $row['picPath'];
       $table = "Dealers";
       $bob = 24503;

?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Vice President</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h2 align="center">Add Fundraiser Group</h2>
          <br />
         <form class="" method="post" action="addClub.php" id="myForm" name="myForm" onsubmit="return atleast_onecheckbox(e)"  enctype="multipart/form-data">
         
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="role4" name="scid" onChange="fetch_select2(this.value);" required>
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
                 <select class="role4" name="rpid" id="rpid" onChange="fetch_select20(this.value);" required>
                 <option value="">Select Representative</option>
                 </select>
	         <select class="role4" name="groupid" id="groupid" onchange="showUser2(this.value);" required>
			<option value="">Select Fundraiser Account</option>
		
	  	</select>
          	
			<div id="clubs">...</div>
			<br>
			<span id="error"></span><br><br>
		<!--	<input type="submit" name="submit" class="redbutton" value="Add New Clubs" />
		</form>-->
         
          <br />
          </div> <!--end content -->
 
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>