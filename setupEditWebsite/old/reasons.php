<?php
        session_start();
         if(!isset($_SESSION['authenticated']))
         {
            header('Location: ../index.php');
            exit;
         }
        include '../includes/connection.inc.php';
        $link = connectTo();
	$groupid = $_GET["group"];
	$userID = $_SESSION['userId'];
        $table = "Dealers";
	//update DB
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $group = mysqli_real_escape_string($link, $_POST['group']);
	   $about = mysqli_real_escape_string($link, $_POST['description']);
	   $initialreason = $_POST['reasons'];
	   
	   $sql = "UPDATE Dealers SET About = '$about' WHERE loginid = '$group' AND setuppersonid = '$userID'";
	   $resultU = mysqli_query($link, $sql)or die ("couldn't execute query update.".mysql_error());
	 
	  
  	if($resultU){
  	    $redirect = "Location:photos.php?group=".$group;
  	    header("$redirect");
  	}
  	}
  	
        $queryA = "SELECT * FROM user_info WHERE userInfoID = '$userID' and role = 'Representative'";
        $resultA = mysqli_query($link, $queryA)or die ("couldn't execute query 1.".mysql_error());
        $rowA = mysqli_fetch_assoc($resultA);
        $pic = $rowA['picPath'];
        
	$query1 = "SELECT * FROM $table WHERE loginid='$groupid' AND setuppersonid='$userID'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row = mysqli_fetch_assoc($result1);
	$about = $row['About'];
	$fundraiserid = $row['loginid'];
	$club_type = $row['DealerDir'];
	$org_type = $row['orgtype'];
	$current_reasons = $row['FundraiserReasons'];	
	
	$table2 = "reasons";
	$query2 = "SELECT * FROM reasons WHERE clubType='$club_type' AND orgType='$org_type'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error());
	$row2 = mysqli_fetch_assoc($result2);
	$r1 = $row2['r1'];
	$r2 = $row2['r2'];
	$r3 = $row2['r3'];
	$r4 = $row2['r4'];
	$r5 = $row2['r5'];
	$r6 = $row2['r6'];
	$r7 = $row2['r7'];
	$r8 = $row2['r8'];
	$r9 = $row2['r9'];
	$r10 = $row2['r10'];	
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Edit About Fundraiser | Representative</title>
	<link rel="stylesheet" type="text/css" href="../css/layout_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
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
<?php include 'sideLeftNav.php' ; ?>
      
      <div id="content">
        
    <h1>Edit</h1>
    <h3>About Your <? echo $club_type; ?> Fundraiser</h3>
    
    <p>General description and information about your <!--<? echo $org_type; ?>--> fundraiser:</p>
    <form action="reasons.php" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
    <textarea name="description" cols="50" rows="5" id="description"><? echo $about;?></textarea>
    <br>
    
         <?php
      if($current_reasons != "")
      {
         echo '<h3>Current Selected Reasons</h3><div>'; 
         $r_list = explode('.', $current_reasons);
       
         echo '<ul>';
           foreach ($r_list as $item)
           {
             echo '<li><b>', trim($item), '</b></li>';
           }
         echo '</ul>';
         
         echo '<p></p></div>';
     }
 
         /* echo '<div id ="reasoncontent">'; 
         $r_list = explode('.', $current_reasons);
         echo '<ul>';
         foreach ($r_list as $item){
            
echo '<li>', trim($item), '</li>';
         }
         echo '</ul>';
         echo '</div>';*/
      ?>
    
    <br>

          
          <input name="group" type="hidden" value="<?php echo $groupid; ?>">   
          <input type="submit" name="submit" class="redbutton"  value="Save and Continue to Photos">

          <p class="clearfloat"></p>
          
      </form>
  </div> <!--end content-->
  
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

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