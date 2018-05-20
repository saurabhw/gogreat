<?
 session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   session_start();
   include '../includes/connection.inc.php';
   $link = connectTo();
   $table = "Dealers";
   $group = $_GET['group']; 
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $gp = mysqli_real_escape_string($link, $_POST['gp']);
	   $start = mysqli_real_escape_string($link, $_POST['fundStart']);
	   $ending = mysqli_real_escape_string($link, $_POST['fundEnd']);
	   $goal = mysqli_real_escape_string($link, $_POST['fundGoal']);
	   $query2 = "UPDATE $table SET
  				FundraiserGoal = '$goal',
  				FundraiserStartDate = '$start',
  				FundraiserEndDate = '$ending'
  				WHERE loginid = '$gp';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:contacts.php?group=$gp";
  	    header("$redirect");
  	}
  	}
   $group = $_GET["group"];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Edit Goals | Representative</title>
<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../css/addnew_form_styles.css" rel="stylesheet" type="text/css" />
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
    <h1>Edit Goals</h1>
    <h3>Fundraising Goal</h3> 
         <!-- <p>Plan your fundraiser according to funds needed. Select a fundraiser event, enter start date and end date.
          Use the calculator to determine individual and group goals.</p>-->   

          <form id="" method="post" action="goals.php" enctype="multipart/form-data">
          	<div id="table" class="graybackground">
          		<div id="row">
          			<span id="hd_startdate">Start Date</span>
          			<input id="startdate" type="text" name="fundStart" value="<? echo $fstart; ?>" placeholder="09/01/2016">
          		</div> <!-- end row -->
          		
          		<div id="row">
          			<span id="hd_enddate">End Date</span>
          			<input id="enddate" type="text" name="fundEnd" value="<? echo $fend;?>" placeholder="09/30/2016">
          		</div> <!-- end row -->
          		
          		<div id="row">
          			<span id="hd_fundgoal">Fundraiser Goal</span>
          			<input id="fundgoal" type="text" name="fundGoal" value="<? echo $fgoal;?>" placeholder="500">
          		</div> <!-- end row -->
          		</div> <!-- end table -->
          		
          		<br>
          		
          		<?
        $gn = $_SESSION['groupName'];	
        $a1 = $_SESSION['address1'];			
        $a2 = $_SESSION['address2'];		
        $ct = $_SESSION['city'];
        $st = $_SESSION['state'];
        $zip = $_SESSION['zip' ];
        $url = $_SESSION['url'];
        $tw = $_SESSION['tw'];
        $fb = $_SESSION['fc'];
        $pal = $_SESSION['pp'];
        $about = $_SESSION['ab'];
        $goal = $_SESSION['goal'];
        $start = $_SESSION['startDate'];
        $end = $_SESSION['endDate'];
          ?>
         <!-- <input type="hidden" name="group" value="<? echo $gn; ?>" />
          <input type="hidden" name="address1" value="<? echo $a1; ?>" />
          <input type="hidden" name="address2" value="<? echo $a2; ?>" />
          <input type="hidden" name="city" value="<? echo $ct; ?>" />
          <input type="hidden" name="state" value="<? echo $st; ?>" />
          <input type="hidden" name="zip" value="<? echo $zip; ?>" />
          <input type="hidden" name="url" value="<? echo $url; ?>" />
          <input type="hidden" name="twitter" value="<? echo $tw; ?>" />
          <input type="hidden" name="face" value="<? echo $fb; ?>" />
          <input type="hidden" name="about" value="<? echo $about; ?>" />
          <input type="hidden" name="goal" value="<? echo $goal; ?>" />
          <input type="hidden" name="start" value="<? echo $start; ?>" />
          <input type="hidden" name="end" value="<? echo $end; ?>" />
          <input type="hidden" name="pp" value="<? echo $pal; ?>" />
          <input type="hidden" name="id" value="<? echo $fundraiserid; ?>" />-->
          <input type="hidden" name="gp" value="<?echo $fundraiserid; ?>" />
          <input type="submit" name="submit" class="redbutton" value="Save and Continue to Leader Contacts" />
          
          </form>  

      </div>  <!--end content-->
      
     <?php include '../includes/footer.php' ; ?>
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