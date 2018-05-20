<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   if(!isset($_SESSION['authenticated'])){
    header('Location: ../index.php');
    exit;
    }
   $distributor = $_GET['rep'];
   $loginuser = $_SESSION['userId'];
   include "connectTo.php";
   $link = connectTo();
   $table = "Dealers";
       
   
   $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 20;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('loginid') FROM $table where setuppersonid='$distributor'";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysql_error($link)); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM $table WHERE setuppersonid='$distributor'  ORDER BY Dealer ASC LIMIT $start_from, $per_page";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
		//$row = mysqli_fetch_assoc($result);
		/*
		// $total_records = $row[0];
		// $total_pages = ceil($total_records / 20);
		*/

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Reasons for Fundraiser</title>
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
	<body id="type">
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="contentMain858">
  
    <div style="margin: auto;">
  
          <h3>Current Representative Accounts</h3>
       
        </div>
    <!--end -->
    <div class="distributor1" style="margin: auto;">
    	<table id="contacts">
						<tr>
							<th align="left"><b>Group<br>Name</b></th>
							<th align="left"><b>Club<br>Type</b></th>
							<th align="left"><b>Contact<br>Name</b></th>
							<th align="left"><b>Email<br>Address</b></th>
							<th align="left"><b>Phone<br>Number</b></th>
							
						</tr>
          <? 
				while ($row = mysqli_fetch_assoc($result)){
							$site = $row['loginid'];
							$credSet = $row['userNameSet'];
							$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
		                                        $resultz = mysqli_query($link, $queryz)or die ("couldn't execute query contacts query.".mysql_error());
							echo'<tr id="dhfix">
								<td><input id="dhgroup" name="" type="text" value="'.$row['Dealer'].'" readonly="readonly" ></td>
								<td><input id="dhclub" name="" type="text" value="'.$row['DealerDir'].'" readonly="readonly" ></td>
								<td><input id="dhname" name="" type="text" value="'.$row['ContactName'].'" readonly="readonly" ></td>
								<!--<td><input id="dhname" name="" type="text" value="" readonly="readonly" ></td>
								<td><input id="dhname" name="" type="text" value="" readonly="readonly" ></td>-->
								<td><input id="dhemail" name="" type="text" value="'.$row['email'].'" readonly="readonly" ></td>
								<td><input id="dhphone" name="" type="text" value="'.$row['Phone'].'" readonly="readonly" ></td>
								<!-- <td><input id="dhytd" name="" type="text" value="" readonly="readonly" ></td>-->
								<td><a href="rep/information.php?groupid='.$site.'"><input id="dhbutton" type="button" value="Edit Acct" /></a></td>
								<td><a href="../fundSitex.php?group='.$site.'"><input id="dhbutton" type="button" name="submit" value="View Site" /></a></td>';
								//if(mysqli_num_rows($resultz) > 0)
								if($credSet == 1)
								{
								      
									echo'<td><form method="post" action="custEmail.php">
										<input type="hidden" name="to" value="'.$row['email'].'" /> 
										<input type="hidden" name="from" value="'.$user_email.'" />
										<input type="hidden" name="clubidemail" value="'.$row['loginid'].'" />
										<input id="dhbutton" type="submit" name="submit1" value="Send Email" />
										</form>
									</td>';
								}
								else{
									echo'<td></td>';
								}    
								echo'<td><form method="post" action="deleteFundraiser.php">
									<input type="hidden" name="clubid" value="'.$site.'" />
									<input id="dhbutton" type="submit" name="submit2" value="Delete Acct" />
									</form>
								</td>
								<td>
								<a href="user.php?groupid='.$site.'"><input id="dhbutton" type="submit" name="submit2" value="Edit Login" /></a>
								</td>
								';
								echo'</tr>';		
									$x++;
							}
						?>			
					</table>
					<?
						if($pages >= 1 && $page <= $pages){
							for($x = 1; $x <= $pages; $x++){
							echo'<a href="?page='.$x.'">'.$x.'</a> ';
							}
						}
					?>
            </div>
    <p>&nbsp;</p>
    
    

  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

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