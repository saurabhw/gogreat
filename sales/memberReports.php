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
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
      // $fundID = $_GET['group'];
       $myPic = $row['picPath'];
       
?>
<!DOCTYPE html>
<head>
	<title>Sales Reports</title>
</head>

<body>
<div id="container">
     <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
      <br />
          <h2>Member Sales Reports</h2>
          <h3></h3>
    
	  <form>
		
	<select class="role4" name="rpid" onChange="fetch_select6(this.value);" required>
                        <option value="">Select Representative</option>
                       
	                <?
	                     $sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
	                     $result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
	                     while($row2 = mysqli_fetch_assoc($result2))
	                     {
                                echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
                             }
                         ?>
      		</select>
                
	         <select class="role4" name="groupid" id="groupid" onchange="fetch_select7(this.value);" required>
			<option value="">Select Fundraiser Account</option>
	  	</select>
	
	<select class="role4" name="memberid" id="memberid" onChange="fetch_select13(this.value);">
	<option value="">Select Member</option>
	</select>
		
	<select class="role4" name="sort" id="sort" onChange="fetch_select13(this.value);">
			<option value="">Sort By...</option>
			<option value="CustomerF">Customer First</option>
			<option value="CustomerL">Customer Last</option>
			<option value="Amount">Amount</option>
			<option value="Date">Date</option>
		</select><br><br>
	<table class="table table-bordered table-striped" id="goalreport">
	    <thead>
	<tr> 
			        <th class="gp">Order #</th>
			        <th class="items">Date</th>
			        <th class="items">Buyer Name</th>
			        <th class="whlsle">Buyer Email</th>
			        <th class="whlsle">Buyer Phone</th>
			        <th class="goal">Product</th>
			        <th class="goal">Quantity</th>
				<th class="actual">Amount</th>
				<th class="actual">Earned</th>
				<th class="actual">Rep %</th>
				<th class="actual">My Commission</th>
			</tr></thead>
		</table>

	</form>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>