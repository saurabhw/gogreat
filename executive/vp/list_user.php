<?php
session_start();
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);

  ob_start();


$userID = $_SESSION['userId'];
$conn = mysql_connect("localhost","gogrea5_ryan","nb]]mFg2ZU.n");
mysql_select_db("gogrea5_gm2012",$conn);
$result = mysql_query("Select * FROM distributors  WHERE setupID='$userID' and role='VP'");
?>
<html>
<head>
<title>Vice Presidents</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<div id="container">
      <?php include '../header.inc.php'; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
      <div stlye="float: right;">   
      	<h3></h3> 
     		<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="add_user.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add User</a></div>
<div style="margin: auto;">
<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
<tr class="listheader">
<td>Company Name</td>
<td>First Name</td>
<td>Last Name</td>
<td>Address 2</td>
<td>City</td>
<td>State</td>
<td>Zip Code</td>
<td>Primary Phone</td>
<td>Email Address</td>
<td>Actions</td>
</tr>
<?php
$i=0;
while($row = mysql_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["companyName"]; ?></td>
<td><?php echo $row["FName"]; ?></td>
<td><?php echo $row["LName"]; ?></td>
<td><?php echo $row["address1"].' '.$row[address2]; ?></td>
<td><?php echo $row["city"]; ?></td>
<td><?php echo $row["state"]; ?></td>
<td><?php echo $row["zip"]; ?></td>
<td><?php echo $row["homePhone"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><a href="edit_user.php?user=<?php echo $row["loginid"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="delete_user.php?user=<?php echo $row["loginid"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>

</form>
 </div> 
      <?php include '../footer.php' ; ?>   
</div> <!--end container-->


</body></html>