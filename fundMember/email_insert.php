<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
/*if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}*/

function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

//include(SITE_ROOT.'/includes/login/user.functions.inc.php');

//include(SITE_ROOT.'/includes/header.php');

//include(SITE_ROOT.'/includes/leftmenu.php');

$loginname=$_SESSION['username'];

$con = mysql_connect("localhost", "amoodf5_ryan", "nb]]mFg2ZU.n");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("amoodf5_gm2012") or die(mysql_error()); 
$sql="SELECT * FROM Dealers where DealerDir='$loginname'";
$result=mysql_query($sql);
$resultrow=mysql_fetch_array($result);
$repid=$resultrow['loginid'];

$names=$_POST['names'];
$emails=$_POST['emails'];
$phones=$_POST['phone'];



$x=0;
$arraycount=count($emails);

while($arraycount>$x)	{
	if($names[$x]!=null && $emails[$x]!=null)	{
		if(check_email_address($emails[$x]))	{
			mysql_select_db("amoodf5_emailsystem") or die(mysql_error()); 
			$emailsql="SELECT * FROM Emails_Contacts WHERE loginid='$repid' AND Emailid='$emails[$x]'";
			$emailresult=mysql_query($emailsql);
			$emailrow=mysql_fetch_array($emailresult);
			if($emailrow['Contact_Name']==null)	{
				mysql_query("INSERT INTO Emails_Contacts 
				(Emailid, Contact_Name, PhNo, loginid) 
				VALUES 
				('$emails[$x]', '$names[$x]', '$phones[$x]', '$repid')");
								}
							}
							}
	++$x;
			}
			





/*
//First Line of Contacts
 $Emailid=$_POST['Email_Address1']; 
 $Name=$_POST['Name1'];
 $Ph=$_POST['Cell_Phone1']; 

$con = mysql_connect("localhost", "amoodf5", "8Bntddbc");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
if(!empty($_POST['Email_Address1']))
  {
 mysql_select_db("amoodf5_emailsystem") or die(mysql_error()); 
  mysql_query("INSERT INTO Emails_Contacts (Emailid, Contact_Name, PhNo, loginid) VALUES ('$Emailid', '$Name', '$Ph', '$repid')"); 
 Print "Your first contact was successfully added to the database.";
 }
*/
 ?>










<?php
echo'<script>location.href="' . HTML_ROOT.'/admin/email.php?id=' . $dir . '"</script>';
?>