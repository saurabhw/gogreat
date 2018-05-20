<?
        session_start();
        include '../../includes/connection.inc.php';
        $link = connectTo();
         if(!isset($_SESSION['authenticated'])){
            header('Location: ../index.php');
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
  				WHERE loginid = '$group';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR query 2: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:contacts.php?groupid=$group";
  	    header("$redirect");
  	}
  	}
  	$userID = $_SESSION['userId'];
        $group = $_GET["groupid"];
        
	$query1 = "SELECT * FROM $table WHERE loginid='$group' AND setuppersonid='$userID'";
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
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Reasons for Fundraiser</title>
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
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="reasons">
<div id="container">
     <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="contentMain858">
    <div class="nav2">
          <ul id="setupNav">
        <li><a href="information.php"><<&nbsp;</a></li>
        <li><a href="information.php?groupid=<?echo $group;?>" class="infonav">Information</a></li>
        <li>|</li>
        <li id="current"><a href="reasons.php?groupid=<?echo $group;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li><a href="contacts.php?groupid=<?echo $group;?>" class="contactsnav">Contacts</a></li>
        <li>|</li>
        <li><a href="photos.php?groupid=<?echo $group;?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?groupid=<?echo $group;?>" class="goalsnav">Goals</a></li>
        <li><a href="contacts.php">&nbsp;>> </a></li>
      </ul>
        </div>
    <!--end nav2-->
    <h5 id="setupreasons">Setup/Edit Website</h5>
    <h3 id="setupreasons">About Your Fundraiser:</h3>
    <label>General description and information about your fundraiser:</label>
    <br>
    <br>
    <?
    echo $club_type;
    echo $org_type;
    ?>
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
    
    <h3>Please select one or more purposes for your fundraiser.</h3>
    <div class="distributor1">
          
        <div class="checkboxForm" id="setupreasons">
              <label>
            <input type="checkbox" id="reasons_0" name="reasons[]" value="<? echo $r1;?>"><input id="reasons_0"  value="<? echo $r1;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_1" name="reasons[]" value="<? echo $r2;?>"><input id="reasons_1" value="<? echo $r2;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_2" name="reasons[]" value="<? echo $r3;?>"><input id="reasons_2"  value="<? echo $r3;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_3" name="reasons[]" value="<? echo $r4;?>"><input id="reasons_3"  value="<? echo $r4;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_4" name="reasons[]" value="<? echo $r5;?>"><input id="reasons_4"  value="<? echo $r5;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_5" name="reasons[]" value="<? echo $r6;?>"><input id="reasons_5" value="<? echo $r6;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_6" name="reasons[]" value="<? echo $r7;?>"><input id="reasons_6" value="<? echo $r7;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_7" name="reasons[]" value="<? echo $r8;?>"><input id="reasons_7" name="reasons[]" value="<? echo $r8;?>" type="text">
            </label>
              <br>
            <label>
            <input type="checkbox" id="reasons_8" name="reasons[]" value="<? echo $r9;?>"><input id="reasons_8"  value="<? echo $r9;?>" type="text">
            </label>
              <br>
              <label>
            <input type="checkbox" id="reasons_9" name="reasons[]" value="<? echo $r10;?>"><input id="reasons_9"  value="<? echo $r10;?>" type="text">
            </label>
         
              <br>
            </div>
        <!--end checkboxForm-->
        <div class="checkboxForm" id="setupreasons">
           <label for="reasons_11">
            <input type="checkbox" id="reasons_11"><input id="reasons_11" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_12">
            <input type="checkbox" id="reasons_12"><input id="reasons_12" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_13">
            <input type="checkbox" id="reasons_13"><input id="reasons_13" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_11">
            <input type="checkbox" id="reasons_14"><input id="reasons_11" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_12">
            <input type="checkbox" id="reasons_15"><input id="reasons_12" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_13">
            <input type="checkbox" id="reasons_16"><input id="reasons_13" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_14">
            <input type="checkbox" id="reasons_17"><input id="reasons_14" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
              <label for="reasons_15">
            <input type="checkbox" id="reasons_18"><input id="reasons_15" name="reasons[]" placeholder="Other" class="otherReason" type="text">
          </label>
              <br>
          </div>
          <div>
          <input name="group" type="hidden" value="<?php echo $group; ?>">   
          <input name="submit" type="submit" value="Save and Continue">
          </div>
        <!--end checkboxForm-->
        <p class="clearfloat"></p>
      </form>
        </div>
    <!--end distributor1-->
  </div>
      <!--end contentMain858-->
      <?php include '../footer.php' ; ?>
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