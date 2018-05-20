<?php
ini_set('session.cache_limiter', 'private');
ini_set('session.cache_limiter', 'must-revalidate');
ob_start();
session_start();
?>

<? 
if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}

$dir=$_GET['id'];

$host="localhost"; // Host name 
$username="amoodf5"; // Mysql username 
$password="AtG7L26B"; // Mysql password 
$db_name="amoodf5_gm2012"; // Database name 

mysql_connect("$host", "$username", "$password");
mysql_select_db("$db_name")or die("cannot select DB");

$theloginid=mysql_real_escape_string($_POST['theloginid']);

$query = "SELECT * FROM Dealers WHERE loginid='$theloginid'"; 
$result = mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

$dealerdir=mysql_real_escape_string($row['DealerDir']);
$dealername=mysql_real_escape_string($_POST['dealername']);
$about=mysql_real_escape_string($_POST['about']);
$otherproducts=mysql_real_escape_string($_POST['otherproducts']);
$fundraisergoal=mysql_real_escape_string($_POST['fundraisergoal']);
$phone=mysql_real_escape_string($_POST['phone']);
$fax=mysql_real_escape_string($_POST['fax']);
$address1=mysql_real_escape_string($_POST['address1']);
$address2=mysql_real_escape_string($_POST['address2']);
$city=mysql_real_escape_string($_POST['city']);
$state=mysql_real_escape_string($_POST['state']);
$zip=mysql_real_escape_string($_POST['zip']);
$hours=mysql_real_escape_string($_POST['hours']);
$contact=mysql_real_escape_string($_POST['contactname']);
$startdate=mysql_real_escape_string($_POST['startdateone']).'/'.mysql_real_escape_string($_POST['startdatetwo']).'/'.mysql_real_escape_string($_POST['startdatethree']);
$enddate=mysql_real_escape_string($_POST['enddateone']).'/'.mysql_real_escape_string($_POST['enddatetwo']).'/'.mysql_real_escape_string($_POST['enddatethree']);
$frcontactone=mysql_real_escape_string($_POST['contactnameone']).'^'.mysql_real_escape_string($_POST['contactphoneone']).'^'.mysql_real_escape_string($_POST['contactemailone']);
$frcontacttwo=mysql_real_escape_string($_POST['contactemailtwo']).'^'.mysql_real_escape_string($_POST['contactemailtwo']).'^'.mysql_real_escape_string($_POST['contactemailtwo']);
$frcontactthree=mysql_real_escape_string($_POST['contactemailthree']).'^'.mysql_real_escape_string($_POST['contactemailthree']).'^'.mysql_real_escape_string($_POST['contactemailthree']);
$frcontactfour=mysql_real_escape_string($_POST['contactemailfour']).'^'.mysql_real_escape_string($_POST['contactemailfour']).'^'.mysql_real_escape_string($_POST['contactemailfour']);
$frcontactfive=mysql_real_escape_string($_POST['contactemailfive']).'^'.mysql_real_escape_string($_POST['contactemailfive']).'^'.mysql_real_escape_string($_POST['contactemailfive']);
$frcontactsix=mysql_real_escape_string($_POST['contactemailsix']).'^'.mysql_real_escape_string($_POST['contactemailsix']).'^'.mysql_real_escape_string($_POST['contactemailsix']);
$schoolname=mysql_real_escape_string($_POST['schoolname']);
$schoolwebsite=mysql_real_escape_string($_POST['schoolwebsite']);
$email=mysql_real_escape_string($_POST['email']);
$storeemail=mysql_real_escape_string($_POST['storeemail']);
$facebook=mysql_real_escape_string($_POST['facebook']);
$twitter=mysql_real_escape_string($_POST['twitter']);
$StaffPic=mysql_real_escape_string($_POST['staffpic']);
$StorePic=mysql_real_escape_string($_POST['storepic']);
$Banner=mysql_real_escape_string($_POST['banner']);

$initialreason=mysql_real_escape_string($_POST['reason']);
	$i=0;
	while($initialreason[$i]!=null)	{ 
		$Reason=$Reason.'^'.$initialreason[$i];
        	++$i;
    						}

if ($_POST['deletestaffpic']=="1")	{
	$StaffPic=0;
					}
if ($_POST['deletestorepic']=="1")	{
	$StorePic=0;
					}
if ($_POST['deletebanner']=="1")	{
	$Banner=0;
					}

// CREATE TEMP FILES AND SET DATABASE IMAGE INFO

if (!empty($_FILES['staffpic']['tmp_name']))	{
        $filetype=mime_content_type($_FILES['staffpic']['tmp_name']);                         		
	if($filetype=="image/jpg"||
	$filetype=="image/jpeg"||
	$filetype=="image/gif"||
	$filetype=="image/bmp"||
	$filetype=="image/png")	{
	$StaffPic="1";
        $newfilename="tmp_" . $dealerdir . "_staff.jpg";
        $newfilepath=dirname($_FILES['staffpic']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['staffpic']['tmp_name'], $newfilepath);
	if (!$copied) {
		echo 'Error while copying staff picture to temp location.<br>';
	              } 
        else 	{
		if (file_exists($newfilepath) && !empty($_POST['keepstaffpic'])) {
			$_SESSION['keepstaffpic'] = $newfilepath;
			$StaffPic="1";
		                                                                 }
		}
				}
	else	{
		$StaffPic="0";
		}
                    							         

                                      		}


if (!empty($_FILES['storepic']['tmp_name'])) 	{
	$filetype=mime_content_type($_FILES['storepic']['tmp_name']);                        		
	if($filetype=="image/jpg"||
	$filetype=="image/jpeg"||
	$filetype=="image/gif"||
	$filetype=="image/bmp"||
	$filetype=="image/png")	{
	$StorePic="1";
        $newfilename="tmp_" . $dealerdir . "_store.jpg";
	$newfilepath=dirname($_FILES['storepic']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['storepic']['tmp_name'], $newfilepath);
	if (!$copied) 	{
		echo 'Error while copying store picture to temp location.<br>';
			} 
	else 	{
		if (file_exists($newfilepath) && !empty($_POST['keepstorepic']))	{
			$_SESSION['keepstorepic'] = $newfilepath;
			$StorePic="1";
											}
		}
				}
	else	{
		$StorePic="0";
		}

						}


if (!empty($_FILES['banner']['tmp_name'])) 	{
	$filetype=mime_content_type($_FILES['banner']['tmp_name']);                         		
	if($filetype=="image/jpg"||
	$filetype=="image/jpeg"||
	$filetype=="image/gif"||
	$filetype=="image/bmp"||
	$filetype=="image/png")	{
	$Banner="1";
       	$newfilename="tmp_" . $dealerdir . "_banner.jpg";
	$newfilepath=dirname($_FILES['banner']['tmp_name'])."/".$newfilename;
	if (file_exists($newfilepath))
	  unlink($newfilepath);
	$copied=copy($_FILES['banner']['tmp_name'], $newfilepath);
	if (!$copied)	{
		echo 'Error while copying banner to temp location.<br>';
			} 
	else	{
		if (file_exists($newfilepath) && !empty($_POST['keepbanner'])) 	{
			$_SESSION['keepbanner'] = $newfilepath;
			$Banner="1";
										}
		}
				}
	else	{
		$Banner="0";
		}
						}


// UPLOAD PICS

if ($StaffPic=="1" && !empty($_FILES['staffpic']['tmp_name'])) {
	$newfilename=$dealerdir."staff.jpg";
	$newfilepath=SITE_ROOT.'/Images/about/'.$newfilename;
	if (!empty($_SESSION['keepstaffpic'])) {
		$oldfilepath=$_SESSION['keepstaffpic'];
	} else if (!empty($_FILES['staffpic']['tmp_name'])) {
		$oldfilepath=dirname($_FILES['staffpic']['tmp_name'])."/"."tmp_" . $dealerdir . "_staff.jpg";
	}
	if (file_exists($newfilepath))
		unlink($newfilepath);
	$copied=copy($oldfilepath, $newfilepath);
	if (!$copied) {
		echo 'Error while copying staff picture to dealer folder.<br>';
		$filecopyerror .= "Staff Picture was not copied.<br>";
	}
}
	
if ($StorePic=="1" && !empty($_FILES['storepic']['tmp_name'])) {
	$newfilename=$dealerdir."store.jpg";
	$newfilepath=SITE_ROOT.'/Images/about/'.$newfilename;
	if (!empty($_SESSION['keepstorepic'])) {
		$oldfilepath=$_SESSION['keepstorepic'];
	} else if (!empty($_FILES['storepic']['tmp_name'])) {
		$oldfilepath=dirname($_FILES['storepic']['tmp_name'])."/"."tmp_" . $dealerdir . "_store.jpg";
	}
	if (file_exists($newfilepath))
		unlink($newfilepath);
	$copied=copy($oldfilepath, $newfilepath);
	if (!$copied) {
		echo 'Error while copying store picture to dealer folder.<br>';
		$filecopyerror .= "Store Picture was not copied.<br>";
	}
}
	
if ($Banner=="1" && !empty($_FILES['banner']['tmp_name'])) {
	$newfilename=$dealerdir.".jpg";
	$newfilepath=SITE_ROOT.'/Images/banners/'.$newfilename;
	if (!empty($_SESSION['keepbanner'])) {
		$oldfilepath=$_SESSION['keepbanner'];
	} else if (!empty($_FILES['banner']['tmp_name'])) {
		$oldfilepath=dirname($_FILES['banner']['tmp_name'])."/"."tmp_" . $dealerdir . "_banner.jpg";
	}
	if (file_exists($newfilepath))
		unlink($newfilepath);
	$copied=copy($oldfilepath, $newfilepath);
	if (!$copied) {
		echo 'Error while copying banner to dealer folder.<br>';
		$filecopyerror .= "Banner was not copied.<br>";
	}
}

// UPDATE THE DATABASE

mysql_query("UPDATE Dealers
SET
Dealer='$dealername',
About='$about',
FundraiserReasons='$Reason',
FundraiserGoal='$fundraisergoal',
FundraiserStartDate='$startdate',
FundraiserEndDate='$enddate',
Hours='$hours',
Phone='$phone',
Fax='$fax',
Address1='$address1',
Address2='$address2',
City='$city',
State='$state',
Zip='$zip',
ContactName='$contact',
SchoolName='$schoolname',
FundraiserContactOne='$frcontactone',
FundraiserContactTwo='$frcontacttwo',
FundraiserContactThree='$frcontactthree',
FundraiserContactFour='$frcontactfour',
FundraiserContactFive='$frcontactfive',
FundraiserContactSix='$frcontactsix',
StoreEmail='$storeemail',
SchoolWebsite='$schoolwebsite',
Banner='$Banner',
OtherProducts='$otherproducts',
StaffPic='$StaffPic',
StorePic='$StorePic',
email='$email',
facebook='$facebook',
twitter='$twitter'
WHERE loginid='$theloginid'");


header('Location: http://www.greatmoods.com/includes/login/loginscreen.php?id='.$dir.'');
?>