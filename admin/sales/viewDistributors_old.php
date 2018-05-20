<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

   session_start();
   ob_start();
   //include'../includes/connection.inc.php';
   // if session variable not set, redirect to login page
   if(!isset($_SESSION['authenticated'])){
    header('Location: ../index.php');
    exit;
    }
 
   $loginuser = $_SESSION['userId'];
   include "connectTo.php";
   $link = connectTo();
   $table = "distributors";

       
   
   $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 20;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('ID') FROM $table where setupID ='$loginuser'";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysql_error($link)); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM $table WHERE setupID ='$loginuser'  ORDER BY companyName ASC LIMIT $start_from, $per_page";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
		//$row = mysqli_fetch_assoc($result);
		/*
		// $total_records = $row[0];
		// $total_pages = ceil($total_records / 20);
		*/

?>
<!DOCTYPE html>
	<head>
	<title>GreatMoods | View Distributors</title>
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
  
          <h3>Current Distributors</h3>
       
        </div>    <!--end -->
    <div class="distributor1" style="margin: auto;">
    <table id="contacts">
						<tr>
							<th align="left"><b>Group<br>Name</b></th>
							<th align="left"><b>Club<br>Type</b></th>
							<th align="left"><b>Contact<br>Name</b></th>
							<!--<th align="left"><b>First<br>Name</b></th>
							<th align="left"><b>Last<br>Name</b></th>-->
							<th align="left"><b>Email<br>Address</b></th>
							<th align="left"><b>Phone<br>Number</b></th>
							<!--<th align="left"><b>YTD Earnings</b></th>-->
						</tr>
         <?
                   
                     while($row = mysqli_fetch_assoc($result))
                     {
                        $who =  $row['loginid'];
                        echo'<tr>
                        <td>'.$row['companyName'].'</td>
                        <td>'.$row['FName'].'</td>
                        <td>'.$row['LName'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['homePhone'].'</td>
                       <!-- <td>'.$row['loginid'].'</td>-->
                        <td><form method="post" action="viewAccounts.php">
                        <input type="hidden" name="user2" value="'.$row['loginid'].'" />
                        <input type="submit" name="submit" value="View Acounts" />
                        </form>
                        </td>
                        <td><form method="post" action="selectFundraiser.php">
                        <input type="hidden" name="user" value="'.$who.'" />
                        <input type="submit" value="Add Accounts" />
                        </form>
                        </td>
                        </tr>';
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
    
    

  </div>      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div><!--end container-->

</body>

<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>