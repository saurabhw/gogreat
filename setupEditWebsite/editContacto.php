<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
$link = connectTo();
 if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $compnay = mysqli_real_escape_string($link, $_POST['cn']);
	   $t = mysqli_real_escape_string($link, $_POST['title']);
	   $f = mysqli_real_escape_string($link, $_POST['fname']);
	   $l = mysqli_real_escape_string($link, $_POST['lname']);
	   $e = mysqli_real_escape_string($link, $_POST['email']);
	   $p = mysqli_real_escape_string($link, $_POST['phone']);
	   $add1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $add2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $who = mysqli_real_escape_string($link, $_POST['who']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	   $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query 2 ".mysqli_error($link)); 
  	
  	$query3 = "UPDATE orgCustomers SET
  				first= '$f',
  				last = '$l',
  				companyname = '$company',
  				relationship= '$e',
  				workPhone = '$p',
  				address = '$add1',
  				apt = '$add2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip'
  				WHERE customerID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: query 3 ".mysqli_error($link)); 
  	
  	if($result2 && $result3){
  	   
  	    $redirect = "Location:contacts.php?group=$xgroup";
  	    header("$redirect");
  	}
  	}
  	
   $userID = $_SESSION['userId'];
   $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
   $row = mysqli_fetch_assoc($result1);
   $pic = $row['picPath'];

  	
  	
  	
  	
// Get fundraiser name
$who = $_GET['id'];
$gp = $_GET['gp'];
$cs = "SELECT * FROM orgCustomers WHERE customerID = '$who'";
$cs_result = mysqli_query($link, $cs) or die(mysqli_error($link));
if($cs_result){
    $row1 = mysqli_fetch_assoc($cs_result);
    $title = $row1['Title'];
    $fn = $row1['first'];
    $ln = $row1['last'];
    $em = $row1['email'];
    $ph = $row1['workPhone'];
    $rel = $row1['relationship'];
    $ct = $row1['city'];
    $st = $row1['state'];
    $zp = $row1['zip'];
    $a1 = $row1['address'];
    $a2 = $row1['apt'];
    
    
    
    
} 
?>
<!DOCTYPE html>
<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
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
<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../css/form_styles.css" rel="stylesheet" type="text/css" />
<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">

<body id="contacts">
	<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	       	
      	<div id="content">
    <h1>Edit Contact</h1>
    <h3>Edit <?php echo $fn; echo '&nbsp;'; echo $ln;?></h3>
    
     <div id="table">
     <form id="graybackground5" method="post" action="editContact.php">
     	<div id="row">
     		<span id="title">Company Name</span>
     		<span id="fname">First</span>
     		<span id="lname">Last</span>
     		<span id="loginemail">Email</span>
     		<span id="phone">Phone</span>
     		<span id="rel">Relationship</span>
     	</div> <!-- end row -->
     	
	<div id="row">
		<input id="cn" type="text" name="cn" value="<? echo $cn;?>" />
		<input id="fname" type="text" name="fname" value="<? echo $fn;?>" />
		<input id="lname" type="text" name="lname" value="<? echo $ln;?>" />
		<input id="loginemail" type="text" name="email" value="<? echo $em;?>" />
          	<input id="phone" type="text" name="phone" value="<? echo $ph;?>" />
          	<input id="rel" type="text" name="rel" value="<? echo $rel;?>" /><br>
          	<input id="city" type="text" name="rel" value="<? echo $cty;?>" /><br>
          	<input id="rel" type="text" name="rel" value="<? echo $st;?>" /><br>
          	<input id="zip" type="text" name="rel" value="<? echo $zp;?>" /><br>
          	<input id="rel" type="text" name="rel" value="<? echo $address;?>" /><br>
          	
          	<input type="hidden" name="who" value="<? echo $who;?>" />
          	<input type="hidden" name="gp" value="<? echo $gp;?>" /><br />
          	<input type="submit" name="submit" value="Save Changes" />
        </div> <!-- end row -->
        </form>
        </div>
          </div> <!--end content-->
      <?php include '../includes/footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>