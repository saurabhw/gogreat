<?php  
session_start(); 
ob_start();
ob_end_clean();
?>

<?php
if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}

	define("HOST", "localhost");
	define("DBUSER", "amoodf5");
	define("PASS", "8Bntddbc");
	define("DB", "amoodf5_gm2012");
 
include'../includes/getid.php";









// VERIFY THAT a) USER IS LOGGED IN AND b) THEY HAVE ADMIN RIGHTS
include ('/includes/login/db_connect.inc.php');
include ('/includes/admin/checkadminrights.php');

if (isset($_SESSION['loginid']) && isset($_SESSION['username'])) {
	if (!checkAdminRights()) {
		header("Location: ".HTML_ROOT."/login.php");
	}
} 
//else { header("Location: ".HTML_ROOT."/login.php");}





function showSelectFields($selectname, $selected, $fieldnames) {

$str = '<select name="'.$selectname.'">'."\n";

foreach($fieldnames as $short=>$long) {
	if (is_int($short)) $short=$long;
	$str.='<option ';
	if ($selected == $short)
	  $str.='selected="selected" ';
	$str.='value="'.$short.'">'.$long.'</option>'."\n";
}

$str.="</select>\n";
return $str;
}


?>
<table border="0" align="right" cellpadding="0" cellspacing="0">
<tr>
<td width="640">

<?php


echo $_POST["test"];


$presetfundraisertype=$_POST["presetfundraiser"];

?>

<?php
function showAddForm() {
	
global $id;
$orgtype="Organization";

	echo '
	<style type="text/css">
	  label {
	    font-weight: bold;
	  }
	  #exampleusername {
	    font-weight: bold;
	  }
	  #getexampleusername {
	    font-style: normal;
	    font-weight: bold;
	  }
	  #helpbox {
	  	display: none;
	  	position: absolute;
	  	width: 310px;
	    font-size: 10pt;
	    color: #333333;
	  }
	  
	  #helpshadow {
	  	position: absolute;
	  	width: 310px;
	  	background: #333333;
	  	z-index: 9;
	  	padding: 8px;
	  	filter:Alpha(opacity=75);
	  	opacity: 0.75;
	  }
	  
	  #helpcontent {
	  	border: solid 1px #000000;
	  	background: #ffffff;
	    font-size: 10pt;
	    position: absolute;
	    width: 310px;
	  	padding: 8px;
	    color: #333333;
	  	z-index: 10;
	  	text-align: left;
	  }
	</style>
	


	<div id="helpbox">

	<div id="helpcontent">&nbsp;</div>
	<div id="helpshadow">&nbsp;</div>
	
	</div>
	
<div align="left">
	<form enctype="multipart/form-data" action="multisetup.php" method="post">';



 
	
	 ;
if ($_POST["presetfundraiser"]!="Others"){
	echo '<table><tr><td><H2><br><br>';
	echo $_POST["presetfundraiser"];
}
	echo ' Website Setup and Edit Screen</h2>';
	echo '<td width="150">';
if($_POST["presetfundraiser"]=="Elementary Band"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Book Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Booster Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Chess Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Choir"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Class Trip"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Library"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Pre-School"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary ptapto"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary School Counseling"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Science and Math Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Band"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Booster Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Chess Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Choir"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Class Trip"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Library"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Debate"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School ptapto"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School School Counseling"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Science and Math Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Band"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School BPA"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Booster Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Chess Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Choir"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School FBLA"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Class Trip"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Library"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Language Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Debate"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School National Art Honor Society"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School National Honor Society"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Prom Committee"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School ptapto"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School School Counseling"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Scholars Bowl"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Scholarship Counseling"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Science and Math Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Student Council"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Theatre"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Basketball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Baseball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Football Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Golf Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Hockey Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Lacrosse Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Soccer Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Softball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Tennis Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Track and Field Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary Volleyball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Baseball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Basketball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Bowling Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Cheerleading Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Cross Country Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Football Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Field Hockey Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Golf Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Gymnastics Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Ice Hockey Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Lacrosse Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Ski Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Soccer Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Softball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Tennis Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Track and Field Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School Volleyball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Baseball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Basketball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Bowling Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Cheerleading Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Cross Country Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Danceline"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Football Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Field Hockey Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Golf Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Gymnastics Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Ice Hockey Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Lacrosse Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Powerlifting Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Ski Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Soccer Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Softball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Swimming and Diving Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Tennis Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Track and Field Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School Volleyball Team"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}

else if($_POST["presetfundraiser"]=="Boy Scouts"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Girl Scouts"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="4H Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Jaycees"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Kiwanis"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Knights of Columbus"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Lions Club"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Others"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Dealer"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Rep"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Sales Rep"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Rep Firm Owner"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Elementary School"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Middle School"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Junior High"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="High School"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Technical College"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="College"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Church"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Synagogue"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else if($_POST["presetfundraiser"]=="Mosque"){
		echo '<img src="http://www.greatmoods.com/Images/test.jpg"></td></tr></table>';
}
else {
	echo '</td></tr></table>';
}



// ADD CODE HERE to check which checkboxes were set to keep information
/*
keepsetuppersonid
keepsignuptype
keeporgtype
keepflags
keepstaffpic
keepstorepic
keepbanner
keepsponsorid
*/
$keeps = "";

if (isset($_POST['keepsetuppersonid'])) {
	$keeps .= "Setup Person ID<br>\n";
	if (!empty($_POST['setuppersonid'])) $_SESSION['keepsetuppersonid'] = $_POST['setuppersonid'];
} else {
	unset($_SESSION['keepsetuppersonid']);
}

if (isset($_POST['keepsignuptype'])) {
	$keeps .= "Signup Type<br>\n";
	if (!empty($_POST['signuptype'])) $_SESSION['keepsignuptype'] = $_POST['signuptype'];
} else {
	unset($_SESSION['keepsignuptype']);
}

if (isset($_POST['keepsponsorid'])) {
	$keeps .= "Sponsor ID<br>\n";
	if (!empty($_POST['sponsorid'])) $_SESSION['keepsponsorid'] = $_POST['sponsorid'];
} else {
	unset($_SESSION['keepsponsorid']);
}

if (isset($_POST['keeporgtype'])) {
	$keeps .= "Organization Type<br>\n";
	if (!empty($_POST['orgtype'])) $_SESSION['keeporgtype'] = $_POST['orgtype'];
} else {
	unset($_SESSION['keeporgtype']);
}

if (isset($_POST['keepflags'])) {
	$keeps .= "Flags<br>\n";
	if (!empty($_POST['flags'])) $_SESSION['keepflags'] = $_POST['flags'];
} else {
	unset($_SESSION['keepflags']);
}

if (isset($_POST['keepstaffpic'])) {
	$keeps .= "Staff Picture<br>\n";
}

if (isset($_POST['keepstorepic'])) {
	$keeps .= "Store Picture<br>\n";
}

if (isset($_POST['keepbanner'])) {
	$keeps .= "Banner<br>\n";
}

if (!empty($keeps)) {
	$keeps = "<div id='keeps'><b>These items are set to keep for this entry:</b><br>\n" . $keeps . "</div><br>\n";
}

// ADD CODE HERE to store files in a temp location until overwritten by newly uploaded file
if (!empty($_FILES['staffpic']['tmp_name'])) {
	$newfilename="tmp_" . $_SESSION['username'] . "_staff.jpg";
	$newfilepath=dirname($_FILES['staffpic']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['staffpic']['tmp_name'], $newfilepath);
	if (!$copied) {
		echo 'Error while copying staff picture to temp location.<br>';
	} else {
		if (file_exists($newfilepath) && !empty($_POST['keepstaffpic'])) {
			$_SESSION['keepstaffpic'] = $newfilepath;
		}
	}
}

if (!empty($_FILES['storepic']['tmp_name'])) {
	$newfilename="tmp_" . $_SESSION['username'] . "_store.jpg";
	$newfilepath=dirname($_FILES['storepic']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['storepic']['tmp_name'], $newfilepath);
	if (!$copied) {
		echo 'Error while copying store picture to temp location.<br>';
	} else {
		if (file_exists($newfilepath) && !empty($_POST['keepstorepic'])) {
			$_SESSION['keepstorepic'] = $newfilepath;
		}
	}
}

if (!empty($_FILES['banner']['tmp_name'])) {
	$newfilename="tmp_" . $_SESSION['username'] . "_banner.jpg";
	$newfilepath=dirname($_FILES['banner']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['banner']['tmp_name'], $newfilepath);
	if (!$copied) {
		echo 'Error while copying banner to temp location.<br>';
	} else {
		if (file_exists($newfilepath) && !empty($_POST['keepbanner'])) {
			$_SESSION['keepbanner'] = $newfilepath;
		}
	}
}

if (!empty($_SESSION['keepstaffpic']) && empty($_POST['keepstaffpic']))
  unset($_SESSION['keepstaffpic']);

if (!empty($_SESSION['keepstorepic']) && empty($_POST['keepstorepic']))
  unset($_SESSION['keepstorepic']);

if (!empty($_SESSION['keepbanner']) && empty($_POST['keepbanner']))
  unset($_SESSION['keepbanner']);


if (!empty($_POST['dealername']) && !empty($_POST['username'])) {
	// ADD CODE HERE to verify and submit items and then check if they were submitted.
	//  if they were, empty all variables EXCEPT SESSION

	$Dealertemp=urlencode($_POST['dealername']);
	$Dealer=str_replace("+"," ",$Dealertemp);
	$DealerDir=$_POST['username'];
	$About=urlencode(check_input($_POST['about']));
	$Hours=urlencode($_POST['hours']);
	$Phone=urlencode($_POST['phone']);
	$Fax=urlencode($_POST['fax']);
	if (!isset($_POST['email']) || empty($_POST['email'])) {
		$email="";
	} else {
		$email=urlencode($_POST['email']);
	}
	$Address1=urlencode($_POST['address1']);
	$Address2=urlencode($_POST['address2']);
	$City=urlencode($_POST['city']);
	$State=urlencode($_POST['state']);
	$Zip=urlencode($_POST['zip']);
	$StoreEmail=urlencode($_POST['storeemail']);
	$Flags=$_POST['flags'];
	$OtherProducts=urlencode($_POST['otherproducts']);
	
	if (isset($_SESSION['keepstaffpic']) || !empty($_FILES['staffpic']['tmp_name'])) {
		$StaffPic="1";
	} else {
		$StaffPic="0";
	}
	if (isset($_SESSION['keepstorepic']) || !empty($_FILES['storepic']['tmp_name'])) {
		$StorePic="1";
	} else {
		$StorePic="0";
	}
	if (isset($_SESSION['keepbanner']) || !empty($_FILES['banner']['tmp_name'])) {
		$Banner="1";
	} else {
		$Banner="0";
	}
	$sponsorid=$_POST['sponsorid'];
	$setuppersonid=$_POST['setuppersonid'];
	$signuptype=$_POST['signuptype'];
	$orgtype=$_POST['orgtype'];
	$password=$_POST['password'];
	
	
	$initialreason=$_POST['reason'];
	for ($i=0; $i<count($initialreason); $i++) 
		{
        		if($i+1!=count($initialreason))
				{
					$Reason=$Reason.$initialreason[$i].', ';
				}
			else
				{
					$Reason=$Reason.'and '.$initialreason[$i].'.';
					$Reason = ucfirst(strtolower($Reason));
				}
    		}

	$orgtypesarray=$_POST['multisetup'];
	$allsetup=$_POST['allsetup'];


	$filecopyerror = "";
	
	// HANDLE FILE COPY
	if ($StaffPic=="1") {
		$newfilename=$DealerDir."staff.jpg";
		$newfilepath=SITE_ROOT.'/Images/about/'.$newfilename;
		if (!empty($_SESSION['keepstaffpic'])) {
			$oldfilepath=$_SESSION['keepstaffpic'];
		} else if (!empty($_FILES['staffpic']['tmp_name'])) {
			$oldfilepath=dirname($_FILES['staffpic']['tmp_name'])."/"."tmp_" . $_SESSION['username'] . "_staff.jpg";
		}
		if (file_exists($newfilepath))
		  unlink($newfilepath);
		$copied=copy($oldfilepath, $newfilepath);
		if (!$copied) {
			echo 'Error while copying staff picture to dealer folder.<br>';
			$filecopyerror .= "Staff Picture was not copied.<br>";
		}
	}
	
	if ($StorePic=="1") {
		$newfilename=$DealerDir."store.jpg";
		$newfilepath=SITE_ROOT.'/Images/about/'.$newfilename;
		if (!empty($_SESSION['keepstorepic'])) {
			$oldfilepath=$_SESSION['keepstorepic'];
		} else if (!empty($_FILES['storepic']['tmp_name'])) {
			$oldfilepath=dirname($_FILES['storepic']['tmp_name'])."/"."tmp_" . $_SESSION['username'] . "_store.jpg";
		}
		if (file_exists($newfilepath))
		  unlink($newfilepath);
		$copied=copy($oldfilepath, $newfilepath);
		if (!$copied) {
			echo 'Error while copying store picture to dealer folder.<br>';
			$filecopyerror .= "Store Picture was not copied.<br>";
		}
	}
	
	if ($Banner=="1") {
		$newfilename=$DealerDir.".jpg";
		$newfilepath=SITE_ROOT.'/Images/banners/'.$newfilename;
		if (!empty($_SESSION['keepbanner'])) {
			$oldfilepath=$_SESSION['keepbanner'];
		} else if (!empty($_FILES['banner']['tmp_name'])) {
			$oldfilepath=dirname($_FILES['banner']['tmp_name'])."/"."tmp_" . $_SESSION['username'] . "_banner.jpg";
		}
		if (file_exists($newfilepath))
		  unlink($newfilepath);
		$copied=copy($oldfilepath, $newfilepath);
		if (!$copied) {
			echo 'Error while copying banner to dealer folder.<br>';
			$filecopyerror .= "Banner was not copied.<br>";
		}
	}

	
	
	if ($orgtypesarray!=null && $allsetup==null){

		$query = "INSERT INTO Dealers (
  				Dealer,
  				DealerDir,
  				About,
  				FundraiserReasons,
  				Hours,
  				Phone,
  				Fax,
  				Address1,
  				Address2,
  				City,
  				State,
  				Zip,
  				StoreEmail,
  				Banner,
  				Flags,
  				OtherProducts,
  				StaffPic,
  				StorePic,
  				sponsorid,
  				setuppersonid,
  				signuptype,
  				orgtype,
  				password,
  				email
  				) VALUES (
  				'$Dealer',
  				'$DealerDir',
  				'$About',
  				'$Reason',
  				'$Hours',
  				'$Phone',
  				'$Fax',
  				'$Address1',
  				'$Address2',
  				'$City',
  				'$State',
  				'$Zip',
  				'$StoreEmail',
  				'$Banner',
  				'$Flags',
  				'$OtherProducts',
  				'$StaffPic',
  				'$StorePic',
  				'$sponsorid',
  				'$setuppersonid',
  				'$signuptype',
  				'$orgtype',
  				'$password',
  				'$email'
 				 )";  

				$dbsubmitok=0;
				mysql_query($query) or die ("Error while submitting to database: ".mysql_error());

				if (mysql_error()=="") {
					echo '<H3><i>Database submission successful.</i></h3>';
				} else {
					echo '<H3 style="color: red;">Something went horribly wrong during data transmission. Please contact Matt.</h3>';
				}
		
	
		$dealerdirarray=$Dealer;
		$arraycount='0';
		while ($orgtypesarray[$arraycount]!=null){
			$neworgtype=$orgtype." ".$orgtypesarray[$arraycount];
			$newname= $dealerdirarray." ".$orgtypesarray[$arraycount];
			$newdealername=$newname;
			$newdealerdir=str_replace(" ","",$newdealername);
			$newdealerdir=strtolower($newdealerdir);
			$query = "INSERT INTO Dealers (
  				Dealer,
  				DealerDir,
  				About,
  				FundraiserReasons,
  				Hours,
  				Phone,
  				Fax,
  				Address1,
  				Address2,
 				City,
  				State,
  				Zip,
  				StoreEmail,
  				Banner,
  				Flags,
  				OtherProducts,
  				StaffPic,
  				StorePic,
  				sponsorid,
  				setuppersonid,
  				signuptype,
  				orgtype,
  				password,
  				email
  				) VALUES (
  				'$newdealername',
  				'$newdealerdir',
  				'$About',
  				'$Reason',
  				'$Hours',
  				'$Phone',
  				'$Fax',
  				'$Address1',
  				'$Address2',
  				'$City',
  				'$State',
  				'$Zip',
  				'$StoreEmail',
 				'$Banner',
 				'$Flags',
  				'$OtherProducts',
  				'$StaffPic',
  				'$StorePic',
 				'$sponsorid',
  				'$setuppersonid',
  				'$signuptype',
  				'$neworgtype',
  				'$password',
  				'$email'
  				)";  
				$arraycount++;
	$dbsubmitok=0;
	mysql_query($query) or die ("Error while submitting to database: ".mysql_error());

	if (mysql_error()=="") {
		echo '<H3><i>Database submission successful.</i></h3>';
	} else {
		echo '<H3 style="color: red;">Something went horribly wrong during data transmission. Please contact Matt.</h3>';
	}
}
}

		else if($allsetup!=null){
			$query = "INSERT INTO Dealers (
  				Dealer,
  				DealerDir,
  				About,
  				FundraiserReasons,
  				Hours,
  				Phone,
  				Fax,
  				Address1,
  				Address2,
  				City,
  				State,
  				Zip,
  				StoreEmail,
  				Banner,
  				Flags,
  				OtherProducts,
  				StaffPic,
  				StorePic,
  				sponsorid,
  				setuppersonid,
  				signuptype,
  				orgtype,
  				password,
  				email
  				) VALUES (
  				'$Dealer',
  				'$DealerDir',
  				'$About',
  				'$Reason',
  				'$Hours',
  				'$Phone',
  				'$Fax',
  				'$Address1',
  				'$Address2',
  				'$City',
  				'$State',
  				'$Zip',
  				'$StoreEmail',
  				'$Banner',
  				'$Flags',
  				'$OtherProducts',
  				'$StaffPic',
  				'$StorePic',
  				'$sponsorid',
  				'$setuppersonid',
  				'$signuptype',
  				'$orgtype',
  				'$password',
  				'$email'
 				 )";  

				$dbsubmitok=0;
				mysql_query($query) or die ("Error while submitting to database: ".mysql_error());

				if (mysql_error()=="") {
					echo '<H3><i>Database submission successful.</i></h3>';
				} else {
					echo '<H3 style="color: red;">Something went horribly wrong during data transmission. Please contact Matt.</h3>';
				}
		if($orgtype=="Elementary School"){
			$orgtypesarray=array("Baseball Team", "Basketball Team", "Football Team", "Golf Team", "Hockey Team", "Lacrosse Team", 
			"Soccer Team", "Softball Team", "Tennis Team", "Track and Field Team", "Volleyball Team", "Band","Book Club","Booster Club",
			"Chess Club","Choir","Class Trip","Library","Pre-School","ptapto","School Counseling","Science and Math Club");
			}
		
		else if($orgtype=="Middle School"){
			$orgtypesarray=array("Baseball Team", "Basketball Team", "Bowling Team","Cheerleading Team","Cross Country Team",
			"Field Hockey Team","Football Team", "Golf Team", "Gymnastics Team", "Ice Hockey Team","Lacrosse Team","Ski Club", 
			"Soccer Team", "Softball Team", "Swimming and Diving Team","Tennis Team", "Track and Field Team", "Volleyball Team", "Band","Booster Club",
			"Chess Club","Choir","Class Trip","Debate","Library","ptapto","School Counseling","Science and Math Club");
			}
		else if($orgtype=="High School"){
			$orgtypesarray=array("Baseball Team", "Basketball Team", "Bowling Team","Cheerleading Team","Cross Country Team", "Danceline",
			"Field Hockey Team","Football Team", "Golf Team", "Gymnastics Team", "Ice Hockey Team","Lacrosse Team","Power Lifting Team","Ski Club", 
			"Soccer Team", "Softball Team", "Swimming and Diving Team","Tennis Team", "Track and Field Team", "Volleyball Team", "Band","BPA","Booster Club",
			"Chess Club","Choir","Class Trip","Debate","FBLA","Language Club","Library","National Art Honor Society","National Honor Society",
			"Prom Committee","ptapto","School Counseling","Scholars Bowl","Scholarship Counseling","Science and Math Club","Student COuncil",
			"Theatre","Yearbook News Broadcasting");
			}
		$dealerdirarray=$Dealer;
		$arraycount='0';
		while ($orgtypesarray[$arraycount]!=null){
			$neworgtype=$orgtype." ".$orgtypesarray[$arraycount];
			$newname= $dealerdirarray." ".$orgtypesarray[$arraycount];
			$newdealername=$newname;
			$newdealerdir=str_replace(" ","",$newdealername);
			$newdealerdir=strtolower($newdealerdir);
			$query = "INSERT INTO Dealers (
  				Dealer,
  				DealerDir,
  				About,
  				FundraiserReasons,
  				Hours,
  				Phone,
  				Fax,
  				Address1,
  				Address2,
 				City,
  				State,
  				Zip,
  				StoreEmail,
  				Banner,
  				Flags,
  				OtherProducts,
  				StaffPic,
  				StorePic,
  				sponsorid,
  				setuppersonid,
  				signuptype,
  				orgtype,
  				password,
  				email
  				) VALUES (
  				'$newdealername',
  				'$newdealerdir',
  				'$About',
  				'$Reason',
  				'$Hours',
  				'$Phone',
  				'$Fax',
  				'$Address1',
  				'$Address2',
  				'$City',
  				'$State',
  				'$Zip',
  				'$StoreEmail',
 				'$Banner',
 				'$Flags',
  				'$OtherProducts',
  				'$StaffPic',
  				'$StorePic',
 				'$sponsorid',
  				'$setuppersonid',
  				'$signuptype',
  				'$neworgtype',
  				'$password',
  				'$email'
  				)";  
				$arraycount++;
	$dbsubmitok=0;
	mysql_query($query) or die ("Error while submitting to database: ".mysql_error());

	if (mysql_error()=="") {
		echo '<H3><i>Database submission successful.</i></h3>';
	} else {
		echo '<H3 style="color: red;">Something went horribly wrong during data transmission. Please contact Matt.</h3>';
	}
}
}



else{

$query = "INSERT INTO Dealers (
  Dealer,
  DealerDir,
  About,
  FundraiserReasons,
  Hours,
  Phone,
  Fax,
  Address1,
  Address2,
  City,
  State,
  Zip,
  StoreEmail,
  Banner,
  Flags,
  OtherProducts,
  StaffPic,
  StorePic,
  sponsorid,
  setuppersonid,
  signuptype,
  orgtype,
  password,
  email
  ) VALUES (
  '$Dealer',
  '$DealerDir',
  '$About',
  '$Reason',
  '$Hours',
  '$Phone',
  '$Fax',
  '$Address1',
  '$Address2',
  '$City',
  '$State',
  '$Zip',
  '$StoreEmail',
  '$Banner',
  '$Flags',
  '$OtherProducts',
  '$StaffPic',
  '$StorePic',
  '$sponsorid',
  '$setuppersonid',
  '$signuptype',
  '$orgtype',
  '$password',
  '$email'
  )";  

	$dbsubmitok=0;
	mysql_query($query) or die ("Error while submitting to database: ".mysql_error());

	if (mysql_error()=="") {
		echo '<H3><i>Database submission successful.</i></h3>';
	} else {
		echo '<H3 style="color: red;">Something went horribly wrong during data transmission. Please contact Matt.</h3>';
	}
}


}

echo $keeps;

echo '
  <fieldset>
  <dl> 
    <dt><label for="setuppersonid">ID of the Great Moods staff member setting this up:</label></dt> 
    <dd><input name="setuppersonid" type="text" id="setuppersonid" size="50" maxlength="50"';
    echo '>
    &nbsp;&nbsp;<input type="checkbox" name="keepsetuppersonid" value="keepsetuppersonid"';
    if (isset($_POST['keepsetuppersonid']))
      echo ' checked="checked"';
    echo '> Keep Setup Person ID for next entry  
    
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="signuptype">Signup Type:</label></dt> 
    <dd>';
    
	if (isset($_SESSION['keepsignuptype']) && !empty($_SESSION['keepsignuptype'])) {
		$signuptypeselected=$_SESSION['keepsignuptype'];
	} else if (isset($_POST['signuptype'])) {
    	$signuptypeselected = $_POST['signuptype'];
}
	  else if ($_POST['presetfundraiser']=="Dealer"){
		$signuptypeselected="dealer";}
	else if ($_POST['presetfundraiser']=="Rep Firm Owner"){
		$signuptypeselected="repfirmowner";}
	else if ($_POST['presetfundraiser']=="Rep"){
		$signuptypeselected="rep";}
	else if ($_POST['presetfundraiser']=="Sales Rep"){
		$signuptypeselected="salesrep";}
	  else if (isset($_POST['presetfundraiser'])&&$_POST['presetfundraiser']!=null){
		$signuptypeselected="fundraiser";
		
    } else {
		$signuptypeselected = "";
	}
	
	$signuptypeselects = array (
	"",
	"rep",
	"dealer",
	"salesrep",
	"repfirmowner",
	"fundraiser"
	);
	
	echo showSelectFields("signuptype", $signuptypeselected, $signuptypeselects);    
    echo '
    &nbsp;&nbsp;<input type="checkbox" name="keepsignuptype" value="keepsignuptype"';
    if (isset($_POST['keepsignuptype']))
      echo ' checked="checked"';
    echo '> Keep Signup Type for next entry? 
    
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="orgtype">Organization Type <span style="color: red;">(Organizer and Fundraiser only)</span>:</label></dt> 
    <dd>';
    
	if (isset($_SESSION['keeporgtype']) && !empty($_SESSION['keeporgtype'])) {
		$orgtypeselected=$_SESSION['keeporgtype'];
	} else if (isset($_POST['orgtype'])) {
    	$orgtypeselected = $_POST['orgtype'];
    } 
	else if (isset($_POST['presetfundraiser'])){
		$orgtypeselected=$_POST['presetfundraiser'];
						}
else {
		$orgtypeselected = "";
	}
	
	$orgtypeselects = array (
	"",
	"Elementary School",
	"Middle School",
	"Junior High",
	"High School",
	"Technical College",
	"College",
	"Church",
	"Synagogue",
	"Mosque",
	"Elementary Band",
	"Elementary Book Club",
	"Elementary Booster Club",
	"Elementary Chess Club",
	"Elementary Choir",
	"Elementary Class Trip",
	"Elementary Library",
	"Elementary Pre-School",
	"Elementary ptapto",
	"Elementary School Counseling",
	"Elementary Science and Math Club",
	"Elementary Baseball Team",
	"Elementary Basketball Team",
	"Elementary Football Team",
	"Elementary Golf Team",
	"Elementary Hockey Team",
	"Elementary Lacrosse Team",
	"Elementary Soccer Team",
	"Elementary Softball Team",
	"Elementary Tennis Team",
	"Elementary Track and Field Team",
	"Elementary Volleyball Team",
	"Middle School Band",
	"Middle School Booster Club",
	"Middle School Chess Club",
	"Middle School Choir",
	"Middle School Class Trip",
	"Middle School Debate",
	"Middle School Library",
	"Middle School ptapto",
	"Middle School School Counseling",	
	"Middle School Science and Math Club",
	"Middle School Baseball Team",
	"Middle School Basketball Team",
	"Middle School Bowling Team",
	"Middle School Cheerleading Team",
	"Middle School Cross Country Team",
	"Middle School Football Team",
	"Middle School Field Hockey Team",
	"Middle School Golf Team",
	"Middle School Gymnastics Team",
	"Middle School Ice Hockey Team",
	"Middle School Lacrosse Team",
	"Middle School Ski Club",
	"Middle School Soccer Team",
	"Middle School Softball Team",
	"Middle School Swimming and Diving Team",
	"Middle School Tennis Team",
	"Middle School Track and Field Team",
	"Middle School Volleyball Team",
	"High School Band",
	"High School BPA",
	"High School Booster Club",
	"High School Chess Club",
	"High School Choir",
	"High School Class Trip",
	"High School Debate",
	"High School FBLA",
	"High School Language Club",
	"High School Library",
	"High School National Art Honor Society",
	"High School National Honor Society",
	"High School Prom Committee",
	"High School ptapto",
	"High School School Counseling",
	"High School Scholars Bowl",
	"High School Scholarship Counseling",
	"High School Science and Math Club",
	"High School Student Council",
	"High School Theatre",
	"High School Yearbook News Broadcasting",
	"High School Baseball Team",
	"High School Basketball Team",
	"High School Bowling Team",
	"High School Cheerleading Team",
	"High School Cross Country Team",
	"High School Danceline",
	"High School Football Team",
	"High School Field Hockey Team",
	"High School Golf Team",
	"High School Gymnastics Team",
	"High School Ice Hockey Team",
	"High School Lacrosse Team",
	"High School Power Lifting Team",
	"High School Ski Club",
	"High School Soccer Team",
	"High School Softball Team",
	"High School Swimming and Diving Team",
	"High School Tennis Team",
	"High School Track and Field Team",
	"High School Volleyball Team",
	"Boy Scouts",
	"Girl Scouts",
	"4H Club",
	"Jaycees",
	"Kiwanis",
	"Knights of Columbus",
	"Lions Club",
	"Others"
	);
	
	echo showSelectFields("orgtype", $orgtypeselected, $orgtypeselects);    
    
    
/*    
    <input name="orgtype" type="text" id="orgtype" size="50" maxlength="50"';
    if (isset($_SESSION['keeporgtype']) && !empty($_SESSION['keeporgtype'])) {
    	echo ' value="'.$_SESSION['keeporgtype'].'"';
    } else if (isset($_POST['orgtype'])) {
    	echo ' value="' . $_POST['orgtype'] . '"';
    }
    echo '>
*/    
    echo '
    &nbsp;&nbsp;<input type="checkbox" name="keeporgtype" value="keeporgtype"';
    if (isset($_POST['keeporgtype']))
      echo ' checked="checked"';
    echo '> Keep Organization Type for next entry?
    
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="flags">Flags:</label></dt> 
    <dd><input name="flags" type="text" id="flags" size="50" maxlength="50"';
    if (isset($_SESSION['keepflag']) && !empty($_SESSION['keepflag'])) {
    	echo ' value="'.$_SESSION['keepflag'].'"';
    } else if (isset($_POST['flags'])) {
    	echo ' value="' . $_POST['flags'] . '"';
    }
    echo '>
    &nbsp;&nbsp;<input type="checkbox" name="keepflags" value="keepflags"';
    if (isset($_POST['keepflags']))
      echo ' checked="checked"';
    echo '> Keep Flags for next entry?
</dd>
</dl>
   ';
    

if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="dealername">Name of the Retail Dealer/Store:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="dealername">Name of the Sales Representative:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="dealername">Name of the School Club or Organization:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="dealername">Name of the School Athletic Team Sport:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="dealername">Name of the Religious Organization:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="dealername">Name of the School:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="dealername">Name of the Organization:</label></dt>';
				}
else {
	echo '<dt><label for="dealername">Name of the organization:</label></dt>';
	}
echo
    '<dd><input name="dealername" type="text" id="dealername" size="50" maxlength="50" onkeyup="checkstoretaken();"';
    if (isset($_POST['dealername'])) {
    	echo ' value="' . $_POST['dealername'] . '"';
    }
    echo '>
    <span style="color: #ff0000; font-size: 12pt;">&nbsp;*</span>
    
    &nbsp;&nbsp;<img src="'.HTML_ROOT.'/Images/login/spacer.gif" width="20" height="20" id="loadingpic2" style="vertical-align: middle; padding-bottom: 2px;">&nbsp;<span id="storetaken"></span>
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="username">Create a Login User Name:</label></dt> 
    <dd><input name="username" type="text" id="username" maxlength="30" onkeyup="checknametaken();" ';
    if (isset($_POST['username'])) {
      echo 'value="'.$_POST['username'];
    }
    echo '"><span style="color: #ff0000; font-size: 12pt;">&nbsp;*</span>
    
    &nbsp;&nbsp;<img src="'.HTML_ROOT.'/Images/login/spacer.gif" width="20" height="20" id="loadingpic" style="vertical-align: middle; padding-bottom: 2px;">&nbsp;<span id="usertaken"></span>
    <br />
    
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="password">Create a Login Password:</label></dt> 
    <dd><input name="password" type="password" id="password" maxlength="20" onkeyup="checkpassword(1);" value="';
    if (isset($_POST['password']))
      echo $_POST['password'];
    echo '">
    
    &nbsp;&nbsp;<img src="'.HTML_ROOT.'/Images/login/spacer.gif" width="20" height="20" id="pw1pic" style="vertical-align: middle; padding-bottom: 2px;">&nbsp;<span id="pw1txt"></span>
    </dd> 
  </dl> 

  <dl> 
    <dt><label for="password2">Re-type Login Password:</label></dt> 
    <dd><input disabled name="password2" type="password" id="password2" maxlength="20" onkeyup="checkpassword(2);" onfocus="checkpassword(2);">
    
    &nbsp;&nbsp;<img src="'.HTML_ROOT.'/Images/login/spacer.gif" width="20" height="20" id="pw2pic" style="vertical-align: middle; padding-bottom: 2px;">&nbsp;<span id="pw2txt"></span>
    </dd> 
  </dl> 

  <dl>'; 

if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="email">Retail Dealer Email Address to Appear at your Website:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="email">Sales Representative Email Address to Appear at your Website:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="email">Name of School Club or Organization Email Address(s) to Appear at your Website:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="email">Name of School Athletic Team Sport Email Address to Appear at your Website:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="email">Name of Religious Organization Email Address to Appear at your Website:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="email">Name of School Email Address to Appear at your Website:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="email">Name of Organization Email Address to Appear at your Website:</label></dt>';
				}
else {
	echo '<dt><label for="email">Account Email Address:</label></dt>';
	}
echo
    ' 
    <dd><input name="email" type="text" id="email" size="50" maxlength="255" onkeyup="checkemail(this.value);" value="';
    if (isset($_POST['email']))
      echo $_POST['email'];
    echo '">
    
    &nbsp;&nbsp;<img src="'.HTML_ROOT.'/Images/login/spacer.gif" width="20" height="20" id="emailpic" style="vertical-align: middle; padding-bottom: 2px;">&nbsp;<span id="emailtxt"></span>
    </dd> 
  </dl> ';

  if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="about">in a General Description and Information About Your Retail Store:</label></dt> ';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="about">Type in a General Description and Information About You as a Sales Representative:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="about">Type in a General Description and Information About Your School Club or Organization:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="about">General Description and Information About Your School Athletic Team Sport:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="about">Type in a General Description and Information About Your Religious Organization:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="about">Type in a General Description and Information About Your School:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="about">Type in a General Description and Information About Your Organization:</label></dt>';
				}
else {
	echo '<dt><label for="about">About the organization:</label></dt> ';
	}
    echo '
    <dd><textarea name="about" rows="6" cols="40">';
    if (isset($_POST['about'])) {
    	echo stripslashes(urldecode($_POST['about']));
    }
    echo '</textarea>
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="address1">Retail Store Street Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="address1">Sales Representative Street Address:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="address1">School Street Address:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="address1">School Street Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="address1">Religious Organization Street Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="address1">School Street Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="address1">Organization Street Address:</label></dt>';
				}
else {
	echo '<dt><label for="address1">organization Address:</label></dt>';
	}
  echo '   
    <dd><input name="address1" type="text" id="address1" size="50" maxlength="50"';
    if (isset($_POST['address1'])) {
    	echo ' value="' . $_POST['address1'] . '"';
    }
    echo '>
    
    <br/>
        <input name="address2" type="text" id="address2" size="50" maxlength="50"';
    if (isset($_POST['address2'])) {
    	echo ' value="' . $_POST['address2'] . '"';
    }
    echo '>
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="city">Retail Store City:</label></dt> ';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="city">Sales Representative City:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="city">School City:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="city">School City:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="city">Religious Organization City:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="city">School City:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="city">Organization City:</label></dt>';
				}
else {
	echo '<dt><label for="city">organization Address - City:</label></dt> ';
	}
  echo '  
    <dd><input name="city" type="text" id="city" maxlength="30"';
    if (isset($_POST['city'])) {
    	echo ' value="' . $_POST['city'] . '"';
    }
    echo '>
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="state">Retail Store State:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="state">Sales Representative State:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="state">School State:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="state">School State:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="state">School State:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="state">Religious Organization State:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="state">Organization State:</label></dt>';
				}
else {
	echo '<dt><label for="state">organization Address - State:</label></dt>';
	}
    echo '
    <dd>';
		
		echo show_state_select((isset($_POST['state'])) ? $_POST['state'] : '');
echo
    
    '</dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="zip">Retail Store ZIP Code: </label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="zip">Sales Representative ZIP Code:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="zip">School ZIP Code:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="zip">School ZIP Code:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="zip">Religious Organization ZIP Code:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="zip">School ZIP code:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="zip">Organization ZIP Code:</label></dt>';
				}
else {
	echo '<dt><label for="zip">organization Address - ZIP Code:</label></dt>';
	}
    echo ' 
    <dd><input name="zip" type="text" id="zip" size="10" maxlength="10"';
    if (isset($_POST['zip'])) {
    	echo ' value="' . $_POST['zip'] . '"';
    }
    echo '>
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="storeemail">Retail Store Email Address: </label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="storeemail">Sales Representative Email Address:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="storeemail">School Email Address:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="storeemail">School Email Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="storeemail">Religious Organization Email Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="storeemail">School Email Address:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="storeemail">Organization Email Address:</label></dt>';
				}
else {
	echo '<dt><label for="storeemail">organization Email Address:</label></dt>';
	}
    echo ' 
    <dd><input name="storeemail" type="text" id="storeemail" size="50" maxlength="50"';
    if (isset($_POST['storeemail'])) {
    	echo ' value="' . $_POST['storeemail'] . '"';
    }
    echo '>
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="phone">Retail Store Phone Number:</label></dt> ';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="phone">Sales Representative Phone Number:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="phone">School/Organization Phone Number:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="phone">School/Organization Phone Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="phone">Religious Organization Phone Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="phone">School Phone Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="phone">Organization Phone Number:</label></dt>';
				}
else {
	echo '<dt><label for="phone">organization Phone Number:</label></dt> ';
	}
    echo '
    <dd><input name="phone" type="text" id="phone" size="15" maxlength="15"';
    if (isset($_POST['phone'])) {
    	echo ' value="' . $_POST['phone'] . '"';
    }
    echo '> 
    
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="fax">Retail Store FAX Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="fax">Sales Representative FAX Number:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="fax">School/Organization Fax Number:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="fax">School/Organization Fax Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="fax">Religious Organization Fax Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="fax">School Fax Number:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="fax">Organization Fax Number:</label></dt>';
				}
else {
	echo '<dt><label for="fax">organization Fax Number:</label></dt>';
	}
    echo '
    <dd><input name="fax" type="text" id="fax" size="15" maxlength="15"';
    if (isset($_POST['fax'])) {
    	echo ' value="' . $_POST['fax'] . '"';
    }
    echo '> 
    
    </dd> 
  </dl> 

  <dl> ';

if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="hours">Retail Store Hours:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="hours">Sales Representative Hours:</label></dt>';
				}
else if ($_POST["presetfundraiser"]==""){
	echo '<dt><label for="hours">Organization Opening Hours:</label></dt>';
	}
    echo ' 
    <dd><input name="hours" type="text" id="hours" size="50" maxlength="100"';
    if (isset($_POST['hours'])) {
    	echo ' value="' . $_POST['hours'] . '"';
    }
    echo '
    
    </dd> 
  </dl>' ;


echo '<dl>';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="otherproducts">List The Products & Services Your Store Offers:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="otherproducts">State your Story, your Services and your intent to help your customers as a Sales Representative:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="otherproducts">Type in a General Description about the Purpose of Your School Club or Organization Fundraiser:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="otherproducts">General Description about the Purpose of Your School Athletic Team Sport Fundraiser:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="otherproducts">Type in a General Description about the Purpose of Your Religious Organization Fundraiser:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="otherproducts">Type in a General Description about the Purpose of Your Organization Fundraiser:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="otherproducts">Type in a General Description about the Purpose of Your School Fundraiser:</label></dt>';
				}
else {
	echo '<dt><label for="otherproducts">Products of the organization:</label></dt>';
	}
    echo ' 
    <dd><input name="otherproducts" type="text" id="otherproducts" size="50" maxlength="100"';
    if (isset($_POST['otherproducts'])) {
    	echo ' value="' . $_POST['otherproducts'] . '"';
    }
    echo '>
    
    </dd> 
  </dl> ';

// CHECKBOX WITH FUNDRAISER REASONS CODE HERE


if(
$_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
||$_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School Football Team"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
||$_POST["presetfundraiser"]=="Elementary School"
||$_POST["presetfundraiser"]=="Junior High"
||$_POST["presetfundraiser"]=="Middle School"
||$_POST["presetfundraiser"]=="High School"
||$_POST["presetfundraiser"]=="Technical College"
||$_POST["presetfundraiser"]=="College"
){
	if($_POST["presetfundraiser"]=="Elementary Band"||$_POST["presetfundraiser"]=="Middle School Band"||$_POST["presetfundraiser"]=="High School Band"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Book Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Booster Club"||$_POST["presetfundraiser"]=="Middle School Booster Club"||$_POST["presetfundraiser"]=="High School Booster Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Chess Club"||$_POST["presetfundraiser"]=="Middle School Chess Club"||$_POST["presetfundraiser"]=="High School Chess Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Choir"||$_POST["presetfundraiser"]=="Middle School Choir"||$_POST["presetfundraiser"]=="High School Choir"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Class Trip"||$_POST["presetfundraiser"]=="Middle School Class Trip"||$_POST["presetfundraiser"]=="High School Class Trip"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Library"||$_POST["presetfundraiser"]=="Middle School Library"||$_POST["presetfundraiser"]=="High School Library"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Pre-School"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary ptapto"||$_POST["presetfundraiser"]=="Middle School ptapto"||$_POST["presetfundraiser"]=="High School ptapto"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary School Counseling"||$_POST["presetfundraiser"]=="Middle School School Counseling"||$_POST["presetfundraiser"]=="High School School Counseling"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Science and Math Club"||$_POST["presetfundraiser"]=="Middle School Science and Math Club" ||$_POST["presetfundraiser"]=="High School Science and Math Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Debate"||$_POST["presetfundraiser"]=="High School Debate"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School BPA"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School FBLA"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Language Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School National Art Honor Society"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School National Honor Society"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Scholars Bowl"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Scholarship Counseling"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Student Council"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Theatre"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Basketball Team"||$_POST["presetfundraiser"]=="Middle School Basketball Team" ||$_POST["presetfundraiser"]=="High School Basketball Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Baseball Team"||$_POST["presetfundraiser"]=="Middle School Baseball Team"||$_POST["presetfundraiser"]=="High School Baseball Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Football Team"||$_POST["presetfundraiser"]=="Middle School Football Team"||$_POST["presetfundraiser"]=="High School Football Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Golf Team"||$_POST["presetfundraiser"]=="Middle School Golf Team"||$_POST["presetfundraiser"]=="High School Golf Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Hockey Team"||$_POST["presetfundraiser"]=="Middle School Hockey Team"||$_POST["presetfundraiser"]=="High School Hockey Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Lacrosse Team"||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"||$_POST["presetfundraiser"]=="High School Lacrosse Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Soccer Team"||$_POST["presetfundraiser"]=="Middle School Soccer Team"||$_POST["presetfundraiser"]=="High School Soccer Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Softball Team"||$_POST["presetfundraiser"]=="Middle School Softball Team"||$_POST["presetfundraiser"]=="High School Softball Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Tennis Team"||$_POST["presetfundraiser"]=="Middle School Tennis Team"||$_POST["presetfundraiser"]=="High School Tennis Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Track and Field Team"||$_POST["presetfundraiser"]=="Middle School Track and Field Team"||$_POST["presetfundraiser"]=="High School Track and Field Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Elementary Volleyball Team"||$_POST["presetfundraiser"]=="Middle School Volleyball Team"||$_POST["presetfundraiser"]=="High School Volleyball Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Bowling Team"||$_POST["presetfundraiser"]=="High School Bowling Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Cheerleading Team"||$_POST["presetfundraiser"]=="High School Cheerleading Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Cross Country Team"||$_POST["presetfundraiser"]=="High School Cross Country Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Field Hockey Team"||$_POST["presetfundraiser"]=="High School Field Hockey Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Gymnastics Team"||$_POST["presetfundraiser"]=="High School Gymnastics Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Ice Hockey Team"||$_POST["presetfundraiser"]=="High School Ice Hockey Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Ski Club"||$_POST["presetfundraiser"]=="High School Ski Club"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="Middle School Track and Field Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Danceline"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
else if($_POST["presetfundraiser"]=="High School Powerlifting Team"){
		echo '<dl>
		<dt><label for="reasonforfundraiser">Choose a Reason(s) for Your Fundraiser:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=reason[] value="reason1">Reason 1<br>
			<input type="checkbox" name=reason[] value="Reason2">Reason 2<br>
			<input type="checkbox" name=reason[] value="Reason3">Reason 3<br>
			<input type="checkbox" name=reason[] value="Reason4">Reason 4<br>
			<input type="checkbox" name=reason[] value="Reason5">Reason 5<br>
			<input type="checkbox" name=reason[] value="Reason6">Reason 6<br>
			<input type="checkbox" name=reason[] value="Reason7">Reason 7<br>
			<input type="checkbox" name=reason[] value="Reason8">Reason 8<br>
		</dd>
		</dt>
		</dl>';
}
}


// CHECKBOX WITH FUNDRAISER REASONS CODE ENDS HERE



  echo '<dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="staffpic">Attach a Picture of your Friendly Staff:</label></dt> ';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="staffpic">Attach a Picture of You:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="staffpic">Attach a Picture of Your Teacher or Staff Members(s):</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="staffpic">Attach a Picture of Your School Athletic Team Sport Teacher or Staff Members(s):</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="staffpic">Attach a Picture of Your Religious Organization Minister, Pastor, Priest or Staff Members(s):</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="staffpic">Attach a Picture of Your Organization President or Staff Members(s):</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="staffpic">Attach a Picture of Your School Principal or Staff Member(s):</label></dt>';
				}
else {
	echo '<dt><label for="staffpic">Picture of the organization Staff:</label></dt> ';
	}
    echo '
    <dd><input type="file" name="staffpic" />
    &nbsp;&nbsp;<input type="checkbox" name="keepstaffpic" value="keepstaffpic"';
    if (isset($_POST['keepstaffpic'])) {
      echo ' checked="checked"';
    }
    echo '> Keep Staff Picture for next entry?
    
    ';
    if (!empty($_SESSION['keepstaffpic'])) {
    	if (file_exists($_SESSION['keepstaffpic']))
    	  echo '<br>Last uploaded file is <b>available</b> and will be sent if checkbox is checked and if no new file is uploaded.';
    }
    
    echo '
    </dd> 
  </dl> 

  <dl> ';
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="storepic">Attach a Picture of Your Store:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Sales Rep"){
	echo
    '<dt><label for="storepic">Attach a Picture of your Friendly Family or you at a Customer or Something you like:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="storepic">Attach a Picture of your Friendly Club or Organization:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="storepic">Attach a Picture of your Friendly School Athletic Team:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="storepic">Attach a Picture of your Friendly Religious Organization Membership:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="storepic">Attach a Picture of Your School:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="storepic">Attach a Picture of your Friendly Religious Organization Membership:</label></dt>';
				}
else {
	echo '<dt><label for="storepic">Picture of the organization Building:</label></dt>';
	}
    echo ' 
    <dd><input type="file" name="storepic" />
    &nbsp;&nbsp;<input type="checkbox" name="keepstorepic" value="keepstorepic"';
    if (isset($_POST['keepstorepic']))
      echo ' checked="checked"';
    echo '> Keep Store Picture for next entry?
    
    ';
    if (!empty($_SESSION['keepstorepic'])) {
    	if (file_exists($_SESSION['keepstorepic']))
    	  echo '<br>Last uploaded file is <b>available</b> and will be sent if checkbox is checked and if no new file is uploaded.';
    }
    
    echo '
    </dd> 
  </dl> 

  <dl> ';

if ($_POST["presetfundraiser"]!="Sales Rep"){
if ($_POST["presetfundraiser"]==Dealer){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of Your Stores:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Band"
||$_POST["presetfundraiser"]=="Elementary Book Club"
||$_POST["presetfundraiser"]=="Elementary Booster Club"
||$_POST["presetfundraiser"]=="Elementary Chess Club"
||$_POST["presetfundraiser"]=="Elementary Choir"
||$_POST["presetfundraiser"]=="Elementary Class Trip"
||$_POST["presetfundraiser"]=="Elementary Library"
||$_POST["presetfundraiser"]=="Elementary Pre-School"
||$_POST["presetfundraiser"]=="Elementary ptapto"
||$_POST["presetfundraiser"]=="Elementary School Counseling"
||$_POST["presetfundraiser"]=="Elementary Science and Math Club"
||$_POST["presetfundraiser"]=="Middle School Band"
||$_POST["presetfundraiser"]=="Middle School Booster Club"
||$_POST["presetfundraiser"]=="Middle School Chess Club"
||$_POST["presetfundraiser"]=="Middle School Choir"
||$_POST["presetfundraiser"]=="Middle School Class Trip"
||$_POST["presetfundraiser"]=="Middle School Library"
||$_POST["presetfundraiser"]=="Middle School Debate"
||$_POST["presetfundraiser"]=="Middle School ptapto"
||$_POST["presetfundraiser"]=="Middle School School Counseling"
||$_POST["presetfundraiser"]=="Middle School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Band"
||$_POST["presetfundraiser"]=="High School BPA"
||$_POST["presetfundraiser"]=="High School Booster Club"
||$_POST["presetfundraiser"]=="High School Chess Club"
||$_POST["presetfundraiser"]=="High School Choir"
||$_POST["presetfundraiser"]=="High School FBLA"
||$_POST["presetfundraiser"]=="High School Class Trip"
||$_POST["presetfundraiser"]=="High School Library"
||$_POST["presetfundraiser"]=="High School Language Club"
||$_POST["presetfundraiser"]=="High School Debate"
||$_POST["presetfundraiser"]=="High School National Art Honor Society"
||$_POST["presetfundraiser"]=="High School National Honor Society"
||$_POST["presetfundraiser"]=="High School Prom Committee"
||$_POST["presetfundraiser"]=="High School Pre-School"
||$_POST["presetfundraiser"]=="High School ptapto"
||$_POST["presetfundraiser"]=="High School School Counseling"
||$_POST["presetfundraiser"]=="High School Scholars Bowl"
||$_POST["presetfundraiser"]=="High School Scholarship Counseling"
||$_POST["presetfundraiser"]=="High School Science and Math Club"
||$_POST["presetfundraiser"]=="High School Student Council"
||$_POST["presetfundraiser"]=="High School Theatre"
){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of your Club or Organization:</label></dt>';
				}
else if 
($_POST["presetfundraiser"]=="Elementary Baseball Team"
||$_POST["presetfundraiser"]=="Elementary Basketball Team"
||$_POST["presetfundraiser"]=="Elementary Football Team"
||$_POST["presetfundraiser"]=="Elementary Golf Team"
||$_POST["presetfundraiser"]=="Elementary Hockey Team"
||$_POST["presetfundraiser"]=="Elementary Lacrosse Team"
||$_POST["presetfundraiser"]=="Elementary Soccer Team"
||$_POST["presetfundraiser"]=="Elementary Softball Team"
||$_POST["presetfundraiser"]=="Elementary Tennis Team"
||$_POST["presetfundraiser"]=="Elementary Track and Field Team"
||$_POST["presetfundraiser"]=="Elementary Volleyball Team"
||$_POST["presetfundraiser"]=="Middle School Baseball Team"
||$_POST["presetfundraiser"]=="Middle School Basketball Team"
||$_POST["presetfundraiser"]=="Middle School Bowling Team"
||$_POST["presetfundraiser"]=="Middle School Cheerleading Team"
||$_POST["presetfundraiser"]=="Middle School Cross Country Team"
||$_POST["presetfundraiser"]=="Middle School FootballTeam"
||$_POST["presetfundraiser"]=="Middle School Field Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Golf Team"
||$_POST["presetfundraiser"]=="Middle School Gymnastics Team"
||$_POST["presetfundraiser"]=="Middle School Ice Hockey Team"
||$_POST["presetfundraiser"]=="Middle School Lacrosse Team"
||$_POST["presetfundraiser"]=="Middle School Ski Club"
||$_POST["presetfundraiser"]=="Middle School Soccer Team"
||$_POST["presetfundraiser"]=="Middle School Softball Team"
||$_POST["presetfundraiser"]=="Middle School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="Middle School Tennis Team"
||$_POST["presetfundraiser"]=="Middle School Track and Field Team"
||$_POST["presetfundraiser"]=="Middle School Volleyball Team"
||$_POST["presetfundraiser"]=="High School Baseball Team"
||$_POST["presetfundraiser"]=="High School Basketball Team"
||$_POST["presetfundraiser"]=="High School Bowling Team"
||$_POST["presetfundraiser"]=="High School Cheerleading Team"
||$_POST["presetfundraiser"]=="High School Cross Country Team"
||$_POST["presetfundraiser"]=="High School Danceline"
||$_POST["presetfundraiser"]=="High School Football Team"
||$_POST["presetfundraiser"]=="High School Field Hockey Team"
||$_POST["presetfundraiser"]=="High School Golf Team"
||$_POST["presetfundraiser"]=="High School Gymnastics Team"
||$_POST["presetfundraiser"]=="High School Ice Hockey Team"
||$_POST["presetfundraiser"]=="High School Lacrosse Team"
||$_POST["presetfundraiser"]=="High School Powerlifting Team"
||$_POST["presetfundraiser"]=="High School Ski Club"
||$_POST["presetfundraiser"]=="High School Soccer Team"
||$_POST["presetfundraiser"]=="High School Softball Team"
||$_POST["presetfundraiser"]=="High School Swimming and Diving Team"
||$_POST["presetfundraiser"]=="High School Tennis Team"
||$_POST["presetfundraiser"]=="High School Track and Field Team"
||$_POST["presetfundraiser"]=="High School Volleyball Team"
){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of Your School Athletic Team Sport:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Church"||$_POST["presetfundraiser"]=="Mosque"||$_POST["presetfundraiser"]=="Synagogue"){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of Your Religious Organization:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Boy Scouts"||$_POST["presetfundraiser"]=="Girl Scouts"||$_POST["presetfundraiser"]=="4H Club"||$_POST["presetfundraiser"]=="Jaycees"||$_POST["presetfundraiser"]=="Kiwanis"||$_POST["presetfundraiser"]=="Knights of Columbus"||$_POST["presetfundraiser"]=="Lions Club"||$_POST["presetfundraiser"]=="Others"){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of Your Organization:</label></dt>';
				}
else if ($_POST["presetfundraiser"]=="Elementary School"||$_POST["presetfundraiser"]=="Middle School"||$_POST["presetfundraiser"]=="Junior High"||$_POST["presetfundraiser"]=="High School"||$_POST["presetfundraiser"]=="Technical College"||$_POST["presetfundraiser"]=="College"){
	echo
    '<dt><label for="banner">Attach a Logo/Banner of Your School:</label></dt>';
				}
else {
	echo '<dt><label for="banner">Organization Logo/Banner:</label></dt>';
	}
    echo '
    <dd><input type="file" name="banner" />
    &nbsp;&nbsp;<input type="checkbox" name="keepbanner" value="keepbanner"';
    if (isset($_POST['keepbanner']))
      echo ' checked="checked"';
    echo '> Keep Banner for next entry?
    
    ';
    if (!empty($_SESSION['keepbanner'])) {
    	if (file_exists($_SESSION['keepbanner']))
    	  echo '<br>Last uploaded file is <b>available</b> and will be sent if checkbox is checked and if no new file is uploaded.';
    }
    
    echo '
    </dd> 
  </dl>';
}

if ($_POST["presetfundraiser"]=="Elementary School"){
echo '<dl>
		<dt><label for="multifundraisers">Choose Additional Clubs/Sports to Set Up:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=multisetup[] value="Baseball Team">Baseball Team<br>
			<input type="checkbox" name=multisetup[] value="Basketball Team">Basketball Team<br>
			<input type="checkbox" name=multisetup[] value="Football Team">Football Team<br>
			<input type="checkbox" name=multisetup[] value="Golf Team">Golf Team<br>
			<input type="checkbox" name=multisetup[] value="Hockey Team">Hockey Team<br>
			<input type="checkbox" name=multisetup[] value="Lacrosse Team">Lacrosse Team<br>
			<input type="checkbox" name=multisetup[] value="Soccer Team">Soccer Team<br>
			<input type="checkbox" name=multisetup[] value="Softball Team">Softball Team<br>
			<input type="checkbox" name=multisetup[] value="Tennis Team">Tennis Team<br>
			<input type="checkbox" name=multisetup[] value="Track and Field Team">Track and Field Team<br>
			<input type="checkbox" name=multisetup[] value="Volleyball Team">Volleyball Team<br>
			<input type="checkbox" name=multisetup[] value="Band">Band<br>
			<input type="checkbox" name=multisetup[] value="Book Club">Book Club<br>
			<input type="checkbox" name=multisetup[] value="Booster Club">Booster Club<br>
			<input type="checkbox" name=multisetup[] value="Chess Club">Chess Club<br>
			<input type="checkbox" name=multisetup[] value="Choir">Choir<br>
			<input type="checkbox" name=multisetup[] value="Class Trip">Class Trip<br>
			<input type="checkbox" name=multisetup[] value="Library">Library<br>
			<input type="checkbox" name=multisetup[] value="Pre-School">Pre-School<br>
			<input type="checkbox" name=multisetup[] value="ptapto">ptapto<br>
			<input type="checkbox" name=multisetup[] value="School Counseling">School Counseling<br>
			<input type="checkbox" name=multisetup[] value="Science and Math Club">Science and Math Club<br>
			<input type="checkbox" name=allsetup[] value="All">All<br>
		</dd>
		</dt>
		</dl>';
}
else if ($_POST["presetfundraiser"]=="Middle School"){
echo '<dl>
		<dt><label for="multifundraisers">Choose Additional Clubs/Sports to Set Up:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=multisetup[] value="Baseball Team">Baseball Team<br>
			<input type="checkbox" name=multisetup[] value="Basketball Team">Basketball Team<br>
			<input type="checkbox" name=multisetup[] value="Bowling Team">Bowling Team<br>
			<input type="checkbox" name=multisetup[] value="Cheerleading Team">Cheerleading Team<br>
			<input type="checkbox" name=multisetup[] value="Cross Country Team">Cross Country Team<br>
			<input type="checkbox" name=multisetup[] value="Field Hockey Team">Field Hockey Team<br>
			<input type="checkbox" name=multisetup[] value="Football Team">Football Team<br>
			<input type="checkbox" name=multisetup[] value="Golf Team">Golf Team<br>
			<input type="checkbox" name=multisetup[] value="Gymnastics Team">Gymnastics Team<br>
			<input type="checkbox" name=multisetup[] value="Ice Hockey Team">Ice Hockey Team<br>
			<input type="checkbox" name=multisetup[] value="Lacrosse Team">Lacrosse Team<br>
			<input type="checkbox" name=multisetup[] value="Ski Club">Ski Club<br>
			<input type="checkbox" name=multisetup[] value="Soccer Team">Soccer Team<br>
			<input type="checkbox" name=multisetup[] value="Softball Team">Softball Team<br>
			<input type="checkbox" name=multisetup[] value="Swimming and Diving Team">Swimming and Diving Team<br>
			<input type="checkbox" name=multisetup[] value="Tennis Team">Tennis Team<br>
			<input type="checkbox" name=multisetup[] value="Track and Field Team">Track and Field Team<br>
			<input type="checkbox" name=multisetup[] value="Volleyball Team">Volleyball Team<br>
			<input type="checkbox" name=multisetup[] value="Band">Band<br>
			<input type="checkbox" name=multisetup[] value="Booster Club">Booster Club<br>
			<input type="checkbox" name=multisetup[] value="Chess Club">Chess Club<br>
			<input type="checkbox" name=multisetup[] value="Choir">Choir<br>
			<input type="checkbox" name=multisetup[] value="Class Trip">Class Trip<br>
			<input type="checkbox" name=multisetup[] value="Debate">Debate<br>
			<input type="checkbox" name=multisetup[] value="Library">Library<br>
			<input type="checkbox" name=multisetup[] value="ptapto">ptapto<br>
			<input type="checkbox" name=multisetup[] value="School Counseling">School Counseling<br>
			<input type="checkbox" name=multisetup[] value="Science and Math Club">Science and Math Club<br>
			<input type="checkbox" name=allsetup[] value="All">All<br>	
		</dd>
		</dt>
		</dl>';
}
else if ($_POST["presetfundraiser"]=="High School"){
echo '<dl>
		<dt><label for="multifundraisers">Choose Additional Clubs/Sports to Set Up:</lable></dt> ';
		echo '
		<dd>
			<input type="checkbox" name=multisetup[] value="Baseball Team">Baseball Team<br>
			<input type="checkbox" name=multisetup[] value="Basketball Team">Basketball Team<br>
			<input type="checkbox" name=multisetup[] value="Bowling Team">Bowling Team<br>
			<input type="checkbox" name=multisetup[] value="Cheerleading Team">Cheerleading Team<br>
			<input type="checkbox" name=multisetup[] value="Cross Country Team">Cross Country Team<br>
			<input type="checkbox" name=multisetup[] value="Danceline">Danceline<br>
			<input type="checkbox" name=multisetup[] value="Field Hockey Team">Field Hockey Team<br>
			<input type="checkbox" name=multisetup[] value="Football Team">Football Team<br>
			<input type="checkbox" name=multisetup[] value="Golf Team">Golf Team<br>
			<input type="checkbox" name=multisetup[] value="Gymnastics Team">Gymnastics Team<br>
			<input type="checkbox" name=multisetup[] value="Ice Hockey Team">Ice Hockey Team<br>
			<input type="checkbox" name=multisetup[] value="Lacrosse Team">Lacrosse Team<br>
			<input type="checkbox" name=multisetup[] value="Power Lifting Team">Power Lifting Team<br>
			<input type="checkbox" name=multisetup[] value="Ski Club">Ski Club<br>
			<input type="checkbox" name=multisetup[] value="Soccer Team">Soccer Team<br>
			<input type="checkbox" name=multisetup[] value="Softball Team">Softball Team<br>
			<input type="checkbox" name=multisetup[] value="Swimming and Diving Team">Swimming and Diving Team<br>
			<input type="checkbox" name=multisetup[] value="Tennis Team">Tennis Team<br>
			<input type="checkbox" name=multisetup[] value="Track and Field Team">Track and Field Team<br>
			<input type="checkbox" name=multisetup[] value="Volleyball Team">Volleyball Team<br>
			<input type="checkbox" name=multisetup[] value="Band">Band<br>
			<input type="checkbox" name=multisetup[] value="BPA">BPA<br>
			<input type="checkbox" name=multisetup[] value="Booster Club">Booster Club<br>
			<input type="checkbox" name=multisetup[] value="Chess Club">Chess Club<br>
			<input type="checkbox" name=multisetup[] value="Choir">Choir<br>
			<input type="checkbox" name=multisetup[] value="Class Trip">Class Trip<br>
			<input type="checkbox" name=multisetup[] value="Debate">Debate<br>
			<input type="checkbox" name=multisetup[] value="FBLA">FBLA<br>
			<input type="checkbox" name=multisetup[] value="Language Club">Language Club<br>
			<input type="checkbox" name=multisetup[] value="Library">Library<br>
			<input type="checkbox" name=multisetup[] value="National Art Honor Society">National Art Honor Society<br>
			<input type="checkbox" name=multisetup[] value="National Honor Society">National Honor Society<br>
			<input type="checkbox" name=multisetup[] value="Prom Committee">Prom Committee<br>
			<input type="checkbox" name=multisetup[] value="ptapto">ptapto<br>
			<input type="checkbox" name=multisetup[] value="School Counseling">School Counseling<br>
			<input type="checkbox" name=multisetup[] value="Scholars Bowl">Scholars Bowl<br>
			<input type="checkbox" name=multisetup[] value="Scholarship Counseling">Scholarship Counseling<br>
			<input type="checkbox" name=multisetup[] value="Science and Math Club">Science and Math Club<br>
			<input type="checkbox" name=multisetup[] value="Student Council">Student Council<br>
			<input type="checkbox" name=multisetup[] value="Theatre">Theatre<br>
			<input type="checkbox" name=multisetup[] value="Yearbook News Broadcasting">Yearbook News Broadcasting<br>
			<input type="checkbox" name=allsetup[] value="All">All<br>
		</dd>
		</dt>
		</dl>';
}



echo '

  <p><span style="color: #ff0000; font-size: 12pt;">*</span> marks required fields<br>
    <input type="hidden" name="id" value="'.$id.'">
    <input name="reset" type="reset" value="Reset"> 
    <input name="register" type="submit" value="Save, Create or Update Website"> 
  </p> 
       </fieldset>
</form>
</div>
<script language="javascript">
<!--
  if (document.getElementById("password").value.length > 0) {
    checkpassword(2);
  }
// -->
</script>
';
}


/*
$query = "update $tbl_name set About='$about', Hours='$hours', Phone='$phone', Fax='$fax', Location='$address', StoreEmail='$storeemail', OtherProducts='$otherproducts'";
	if ($changestaffpic)
	  $query.=", StaffPic='1'";
	if ($changestorepic)
	  $query.=", StorePic='1'";
	if ($changebanner)
	  $query.=", Banner='1'";
	$query.=" where DealerDir='$id'";
	
	
	
	mysql_query($query) or die ( "Error: ".mysql_error()."<br>".$query );
*/


/*
NOTES for later:

<form enctype="multipart/form-data" action="register.php" method="post" onsubmit="return checksubmit();"> 
to submit files

<input name="otherproducts" type="text" id="otherproducts" size="50" maxlength="100">

getdate()  ->  returns converted values in associative array of a timestamp; if no parameter, then current time is used
mktime()  ->  create time stamp, requires 6 integers: hour, minute, second, month, day of month, year - will adjust for 25 hours e.g.

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');
// Prints: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

2010-07-09 13:09:32
Y-m-d H:i:s

var_dump (getdate(strtotime("2010-07-09 13:09:32")));

array_keys($array)  -> returns array consisting only of the keys

*/

?>
<html><head><title>Editing</title>
<style type="text/css">
  body {
  	font-family: "Arial", "sans-serif", "Helvetica";
  	font-size: 10pt;
  }
  #keeps {
  	color: red;
  	margin-left: 100px;
  	border: 1px solid red;
  	width: 300px;
  }
  table {
  	border-color: #999999;
	border-spacing: 0;
    	border-collapse: collapse;
  }
  td { 
  	vertical-align: top; 
  	border-color: #999999;
  	padding: 3px;
  	margin: 0;
  }
  .example { 
  	font-family: 'monospace','Courier','Courier New'; 
  	padding-left: 10px;
  }
</style>
</head>
<body onload="initSite();">

<?php 

showAddForm();
?>
</td>
<td>
<?php include(SITE_ROOT."/includes/rightmenu.php"); ?>
</td>
</tr>
</table>

<?php


					include(SITE_ROOT."/includes/footer.php");
?>

</body>
</html>