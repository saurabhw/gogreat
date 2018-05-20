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
	
        $table = "Dealers";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        $rp = mysqli_real_escape_string($link, $_POST['repid']);
        
        $query = "Select * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        $name = $row['Dealer'];
        $type = $row['DealerDir'];
        $aa1 = $row['Address1'];
        $aa2 = $row['Address2'];
        $cct = $row['City'];
        $sst = $row['State'];
        $zpp = $row['Zip'];
        
          
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);

   $pic = $row['picPath'];
       
       
 	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Delete Fundraiser</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="content">
    
	<div>
	<br><br>
	<h2 align="center">Delete <? echo $name.''.$type?>?</h2>
		<div id="border">
		<?
		  $sql1 = "SELECT * FROM orgMembers WHERE fundraiserID = '$group'";
                  $sqlResult = mysqli_query($link, $sql1)or die ("couldn't execute query sql1.".mysqli_error($link));
                  $row12 = mysqli_fetch_assoc($sqlResult);
                  $member_first = $row12['orgFName'];
                  $member_last = $row12['orgLName'];
                  //echo 'Delete '.$member_first.' '.$member_last;
         	?>
			<h3>Warning!</h3> 
         		<p>Deletion of this account will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
         		<table>
         			<form action="fundDestroy.php" method="post">
         			
         			<tr>
					<td><? echo $name;?></td><td><? echo $type;?></td>
         			</tr>
        			<tr>
         				<td><? echo $aa1;?></td><td><? echo $aa2;?></td>
		   	     	</tr>
         			<tr>
         				<td><? echo $cct;?></td><td><? echo $zpp;?></td>
         			</tr>
		    	   	<tr>
         				<td><? echo $sst;?></td><td>
         				<input type="hidden" name="clubid" value="<? echo $group; ?>" />
         				<input type="hidden" name="repid" value="<? echo $rp; ?>" />
         				</td>
		        	</tr>
         			<tr>
         				<td>
         				    <br><input type="submit" name="submit" class="redbutton" value="Delete This Account" /></td>
         			</tr>
         			</form>
         		</table>
		</div>
	</div>
    <!--end distributor1-->
    
    <p>&nbsp;</p>
    
    

  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>