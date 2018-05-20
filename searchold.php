<?php 
session_start();
	ob_start();
	//include 'redirect/redirect.php';
	include('includes/connection.inc.php');
	$link = connectTo();
	$table = "user_info";
	$type = "Distributor";
	$query = "SELECT * FROM $table where role='$type'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	//$row = mysqli_fetch_assoc($result);
	$fname = $row['FName'];
	$mname = $row['MName'];
	$lname = $row['LName'];
	$phone = $row['homePhone'];
	$email = $row['email'];
	$cell = $row['cellPhone'];
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome To Greatmoods!</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
		
		<script src="js/loadXMLDoc.js"></script>
		<style type="text/css">
			#headerTop{
				background: no-repeat;
				background-position:right top;
				width:1024px;
				height:130px;
				padding:0;
				margin:0;
				position:relative;
				z-index:3;
				}
			#content{
				width:700px;
				margin:0px 0 50px 0;
				padding:0px 0px 50px 0px;
				float:right;
				position:relative;
				top:-50px;
				}
			#leadImg{
				position:relative;
				top:-125px;
				right:150px;
				float:right;
				}
			#logout {
				position: absolute;
				right: 8px;
			}
			.school {
				
			}
			.hidden {
				display: none;
			}
			.unhidden {
				display: block;
			}
			#content1
			{
			   text-align: center;
			   margin-left: 10px;
			  
			}
		</style>	

	</head>
    <body>
	  <div id="container">
		<?php include 'header.php' ; ?>
			<?php include 'mainLeftSidebar.php' ; ?>
         		<div id="content1">
         		<h3>Current Distributors</h3>
         		<table align"left" width"80%">
         		<tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Home Phone</th>
                        <th>Email Address</th>
            </tr>
         		<?
         		
         		 while ($row = mysqli_fetch_assoc($result))	
         		 {
		                echo '<tr>
				<td><input name="" type="text" value="'.$row['FName'].'" readonly="readonly" ></td>
				<td><input name="" type="text" value="'.$row['LName'].'" readonly="readonly" ></td>
				<td><input name="" type="text" value="'.$row['homePhone'].'" readonly="readonly" ></td>
				<td><input name="" type="text" value="'.$row['email'].'"></td>
				<td><input name="" type="text" value="'.$row['cellPhone'].'"></td>
				
				</tr>';
				
			}
         		?>
         		</table>
         		
         		
				</div><!--end content-->
			<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>