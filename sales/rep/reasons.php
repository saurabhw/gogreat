<?
        session_start();
        include '../../includes/connection.inc.php';
        $link = connectTo();
         if(!isset($_SESSION['authenticated'])){
            header('Location: ../../index.php');
            exit;
         }

        $table = "Dealers";
	//update DB
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $group = mysqli_real_escape_string($link, $_POST['group']);
	   $about = mysqli_real_escape_string($link, $_POST['description']);
	   $initialreason = $_POST['reasons'];
	    for ($i = 0; $i < count($initialreason); $i++) 
		{
                  if($i+1!=count($initialreason))
		     {
			if($initialreason[$i] !=''){
				$Reason=$Reason.$initialreason[$i].'. ';
			}
		     }
		  else
		     {
		     if($initialreason[$i] !=''){
			$Reason=$Reason.'and '.$initialreason[$i].'.';
			$Reason = ucfirst(strtolower($Reason));
			}
		     }
    		}
	   $query2 = "UPDATE $table SET
  				About = '$about',
  				FundraiserReasons = '$Reason'
  				WHERE loginid = '$groupid';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR query 2: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:photos.php?groupid=$group";
  	    header("$redirect");
  	}
  	}
  	$userID = $_SESSION['userId'];
        $groupid = $_GET['groupid'];
        
	$query1 = "SELECT * FROM $table WHERE loginid='$groupid'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row = mysqli_fetch_assoc($result1);
	$about = $row['About'];
	$fundraiserid = $row['loginid'];
	$club_type = $row['DealerDir'];
	$org_type = $row['orgtype'];
	$current_reasons = $row['FundraiserReasons'];	
	//$org_type = "High School";
	//$club_type = "Band";
	$table2 = "reasons";
	$query2 = "SELECT * FROM $table2 WHERE clubType='$club_type' AND orgType='$org_type'";
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
<title>Edit Reasons | Sales Coordinator</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">

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
      <?php include 'acct_sidenav.php' ; ?>
      <div id="contentMain858">

    <h1>Edit Reasons</h1>
    <h3>About the <? echo $club_type; ?> Fundraiser:</h3> <!--<? echo $org_type; ?>-->
    
    <p>General description and information about the fundraiser:</p>
    <form action="" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
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
      /*
         echo '<div id ="reasoncontent">'; 
         $r_list = explode('.', $current_reasons);
         echo '<ul>';
         foreach ($r_list as $item){
            
echo '<li>', trim($item), '</li>';
         }
         echo '</ul>';
         echo '</div>';*/
      ?>
    
    <h3>Reasons for the <? echo $club_type; ?> Fundraiser</h3>
    <p>Select one or more purposes for the fundraiser or type in your own.</p>  <!--<?php echo $r1; echo $group;?>-->
    <div id="graybackground">
        
        <div class="checkboxForm" id="setupreasons">
              <label><input type="checkbox" id="reasons_0" name="reasons[]" value="<? echo $r1;?>"><input id="reasons_0"  value="<? echo $r1;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_1" name="reasons[]" value="<? echo $r2;?>"><input id="reasons_1" value="<? echo $r2;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_2" name="reasons[]" value="<? echo $r3;?>"><input id="reasons_2"  value="<? echo $r3;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_3" name="reasons[]" value="<? echo $r4;?>"><input id="reasons_3"  value="<? echo $r4;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_4" name="reasons[]" value="<? echo $r5;?>"><input id="reasons_4"  value="<? echo $r5;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_5" name="reasons[]" value="<? echo $r6;?>"><input id="reasons_5" value="<? echo $r6;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_6" name="reasons[]" value="<? echo $r7;?>"><input id="reasons_6" value="<? echo $r7;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_7" name="reasons[]" value="<? echo $r8;?>"><input id="reasons_7" value="<? echo $r8;?>" type="text"></label>
              <br>
            <label><input type="checkbox" id="reasons_8" name="reasons[]" value="<? echo $r9;?>"><input id="reasons_8"  value="<? echo $r9;?>" type="text"></label>
              <br>
              <label><input type="checkbox" id="reasons_9" name="reasons[]" value="<? echo $r10;?>"><input id="reasons_9"  value="<? echo $r10;?>" type="text"></label>
              <br>
            </div> <!--end checkboxForm-->
            
        <div class="checkboxForm" id="setupreasons">
           <label for="reasons_11"><input type="checkbox" id="reasons_11"><input id="reasons_11" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_12"><input type="checkbox" id="reasons_12"><input id="reasons_12" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_13"><input type="checkbox" id="reasons_13"><input id="reasons_13" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_11"><input type="checkbox" id="reasons_14"><input id="reasons_11" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_12"><input type="checkbox" id="reasons_15"><input id="reasons_12" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_13"><input type="checkbox" id="reasons_16"><input id="reasons_13" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_14"><input type="checkbox" id="reasons_17"><input id="reasons_14" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <label for="reasons_15"><input type="checkbox" id="reasons_18"><input id="reasons_15" name="reasons[]" placeholder="Other" class="otherReason" type="text"></label>
              <br>
              <br>
          </div> <!--end checkboxForm-->
          
          <input name="group" type="hidden" value="<?php echo $groupid; ?>">   
          <input id="redbutton" name="submit" type="submit" value="Save & Continue to Photos">

          <p class="clearfloat"></p>
          </div> <!-- end graybackground -->
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