<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
include '../../includes/connection.inc.php';
$link = connectTo();
 if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $t = mysqli_real_escape_string($link, $_POST['title']);
	   $f = mysqli_real_escape_string($link, $_POST['fname']);
	   $l = mysqli_real_escape_string($link, $_POST['lname']);
	   $e = mysqli_real_escape_string($link, $_POST['email']);
	   $p = mysqli_real_escape_string($link, $_POST['phone']);
	   $who = mysqli_real_escape_string($link, $_POST['who']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	   $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	   
  	    $redirect = "Location:contacts.php?groupid=$xgroup";
  	    header("$redirect");
  	}
  	}
// Get fundraiser name
$who = $_GET['id'];
$gp = $_GET['gp'];
$cs = "SELECT * FROM orgContacts WHERE orgContactID = '$who'";
$cs_result = mysqli_query($link, $cs) or die(mysqli_error($link));
if($cs_result){
    $row = mysqli_fetch_assoc($cs_result);
    $title = $row['Title'];
    $fn = $row['orgFName'];
    $ln = $row['orgLName'];
    $em = $row['orgEmail'];
    $ph = $row['orgPhone'];
    
} 
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Edit Member Contact | Sales Coordinator</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/header_styles.css" rel="stylesheet" type="text/css">
<link href="../../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

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
      
    <h1>Edit Contact</h1>
    <h3><?php echo $fn; echo '&nbsp;'; echo $ln;?> Information</h3>
    
     <div id="graybackground4">
     <form method="post" action="editContact.php">
      <div id="table">
       <div id="row"> <!-- header row -->
		<span id="fname">First</span>
		<span id="lname">Last</span>
		<span id="title">Title</span>
	</div> <!-- end row -->
	<div id="row">
		<input id="fname" type="text" name="fname" value="<? echo $fn;?>" />
		<input id="lname" type="text" name="lname" value="<? echo $ln;?>" />
		<input id="title" type="text" name="title" value="<? echo $title;?>" />
	</div> <!-- end row -->
		 
	 <div id="row"> <!-- header row -->
	 	<span id="loginemail">Email</span>
		<span id="phone">Phone</span>
	 </div> <!-- end row -->
	 <div id="row">
	 	<input id="loginemail" type="text" name="email" value="<? echo $em;?>" />
		<input id="phone" type="text" name="phone" value="<? echo $ph;?>" />
	 </div> <!-- end row -->
	 <br>
	 <div id="row">
	        <input type="hidden" name="who" value="<? echo $who;?>" />
	        <input type="hidden" name="gp" value="<? echo $gp;?>" />
	        <input id="redbutton" type="submit" name="submit" value="Save Changes" />
        </div> <!-- end row -->
        
        </div> <!-- end table -->
        </form>
        </div> <!-- end graybackground -->
          </div> <!-- end content -->
          
      <?php include 'footer.php' ; ?>
    </div> <!-- end container -->

</body>
<?php
   ob_end_flush();
?>