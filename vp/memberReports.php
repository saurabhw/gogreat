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
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
       //$fundID = $_GET['group'];
       $pic = $row['picPath'];
       $bob = 24503;
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Sales Reports</title>
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
      		                 <option value="">Select Representative</option>
      		                 </select>
       
       <select class="role4" name="groupid" id="groupid" onChange="fetch_select(this.value);">
	<option value="">Select FR Account</option>
	
	</select>
	
	<select class="role4" name="memberid" id="memberid" onChange="fetch_select10(this.value);">
	<option value="">Select Member</option>
	</select>
		
	<select class="role4" name="sort" id="sort" onChange="fetch_select11(this.value);">
			<option value="">Sort By...</option>
			<option value="CustomerF">Customer First</option>
			<option value="CustomerL">Customer Last</option>
			<option value="Amount">Amount</option>
			<option value="Date">Date</option>
		</select>
		<br><br>
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
				<th class="actual">Fund Earned</th>
				<th class="actual">RP %</th>
				<th class="actual">SC %</th>
				<th class="actual">My %</th>
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