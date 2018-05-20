<?php
  session_start();
  if(!isset($_SESSION['authenticated']))
   {
     header('Location: ../../index.php');
     exit;
  }
   include '../../includes/connection.inc.php';
   $link = connectTo();
   $table = "Dealers"; 
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE banner_path='' AND setuppersonid='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
  //$row = mysqli_fetch_assoc($result);
  ?>
  
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Add Banner | GreatMoods</title>
<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/header_styles.css" rel="stylesheet" type="text/css">
<link href="../../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script type="text/javascript">
function validate(form) {
	var pass1 = form['loginPass'].value;
	var pass2 = form['confirmPass'].value;
	if(pass1 == "" || pass1 == null) {
		alert("please enter a valid password");
		return false;
	}
	if(pass1 != pass2) {
		alert("passwords do not match");
		return false;
	}
	return true;
}
</script>
</head>

<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
	       	
    <div id="content">    
	<h1>Add Banners</h1>
	<br>
     	<p>Choose an organization to upload a banner for. That banner will be applied to all clubs for that group.</p>
      	
      	<div id="graybackground4">
      	<div id="bannertable">
        	<div id="row"><span><b>Organization Name</b></span></div> <!-- end row -->
        
	        <?php   
	           while ($row = mysqli_fetch_assoc($result))
	              {
	              echo '<div id="row">
	                  <input id="group" type="text" name="" value="'.$row['Dealer'].'" size="120"/>
	                  <input id="type" type="text" name="" value="'.$row['DealerDir'].'" size="120"/>
	                  <a href="bannerUpload.php?group='.$row['loginid'].'&name='.$row['Dealer'].'"><input id="redbutton" type="button" value="Add Banner" /></a>
	                  </div> <!-- end row -->';
	                  
		   }// end while   
	        ?>
        </div> <!-- end table -->
        </div> <!-- end graybackground -->
      </div> <!--end content-->
          
      <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>