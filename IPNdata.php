<?php
session_start();
include('includes/connection.inc.php');
$link = connectTo();
//To Make live uncomment line below with comment of live then comment the line above it
$debug = true;
//Email address to send emails:
$email="cleo@greatmoods.com";
//add 'cmd' as required to get VERIFIED response
$req = 'cmd=_notify-validate';
//put post into NVP format
foreach ($_POST as $key => $value) 
{
 $value = urlencode(stripslashes($value));
 //$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);
 $req .= "&$key=$value";
}
//DEBUGGING - export a text file with all the post data on it
if ($debug)
{
$ourFileName = "debug/debug1_postdata.txt";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
fwrite($ourFileHandle, $req);
fclose($ourFileHandle);
}
// setup headers for request to paypal
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.paypal.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//Open socket
//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);//Test
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);//Live

if (!$fp)// failed to connect to url
{
 //write to file
 $fh = fopen("logipn.txt", 'a');//open file and create if does not exist
 fwrite($fh, "\r\n/////////////////////////////////////////\r\n HTTP ERROR \r\n");//Just for spacing in log file
 fwrite($fh, $errstr);//write data
 fclose($fh);//close file
 
 //email
 $mail_From = "From: IPN@tester.com";
 $mail_To = $email;
 $mail_Subject = "HTTP ERROR";
 $mail_Body = $errstr;//error string from fsockopen
 mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
} 
else//successful connect to url
{
 //DEBUGGING - export a text file to show we've connected OK
 if ($debug)
 {
	$ourFileName = "debug/debug2_connected.txt";
	$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
	fclose($ourFileHandle);
 }
 fputs ($fp, $header . $req);//send request
 while (!feof($fp)) //while not end of file
 {
  $res = fgets ($fp, 1024);//get response
  //DEBUGGING - export a text file containing the response
  if ($debug)
  {
     $ourFileName = "debug/debug3_fgets.txt";
     $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
     fwrite($ourFileHandle, $res);
     fclose($ourFileHandle);
}

}
  if (strcmp ($res, "VERIFIED")) 
  {
  //DEBUGGING - export a text file to confirm verification
   if ($debug)
   {
       $ourFileName = "debug/debug4_verified.txt";
       $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
       fclose($ourFileHandle);
   }
   //write to file
   $fh = fopen("logipn.txt", 'a');//open file and create if does not exist
   fwrite($fh, "\r\n/////////////////////////////////////////\r\n Verified \r\n");//Just for spacing in log file
   fwrite($fh, $req);//write data
   fclose($fh);//close file
   
   $status = mysqli_real_escape_string($link, $_POST['payment_status']);
   
   //email
   $mail_From = "From: IPN@tester.com";
   $mail_To = $email;
   $mail_Subject = "VERIFIED IPN";
   $mail_Body = $req;
   $mail_Body .= ' Status: '.$status;
   mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
   
if ($status == 'Completed')
 { 
   
   $mail_From = "From: IPN@tester.com";
   $mail_To = $email;
   $mail_Subject = "Complete";
   $mail_Body = $req;
   mail($mail_To, $mail_Subject, $mail_Body, $mail_From);

$host="localhost"; // Host name 
$username="amoodf5_ryan"; // Mysql username 
$password="nb]]mFg2ZU.n"; // Mysql password 
$db_name="amoodf5_gm2012"; // Database name 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

			$date=$_POST[payment_date];
			$amount = $_POST[mc_gross1];
			$rep=mysqli_real_escape_string($link,$_POST[custom]);
			$txnid=$_POST[txn_id];
			$format=(explode(" ",$date));
			$formatteddate=$format[1] . $format[2] . $format[3];
			$finaldate=trim($formatteddate, ",");
			$buyerfirst=$_POST[first_name];
			$buyerlast=$_POST[last_name];
			$buyer=$buyerfirst . ' ' . $buyerlast;
			$productname=null;
			$street=mysqli_real_escape_string($link,$_POST[address_street]);
			$city=mysqli_real_escape_string($link,$_POST[address_city]);
			$state=$_POST[address_state];
			$zip=$_POST[address_zip];
                        $phone=$_POST['contact_phone'];
                        $email=mysqli_real_escape_string($link,$_POST['payer_email']);
                        $business=mysqli_real_escape_string($link,$_POST['payer_business_name']);
                        $country=mysqli_real_escape_string($link,$_POST['address_country']);
                        $memo=mysqli_real_escape_string($link,$_POST['gift_message']);
			$address=$street.' '.$city.' '.$state.' '.$zip;
                        $option1=mysqli_real_escape_string($link,$_POST['option_name1_1']);
                        $option2=mysqli_real_escape_string($link,$_POST['option_name2_1']);
                        $option3=mysqli_real_escape_string($link,$_POST['option_selection1_1']);
                        $option4=mysqli_real_escape_string($link,$_POST['option_selection2_1']);
			$n=1;
			while ($_POST[item_name.$n]!=null){
				$productname=$productname.'(cow)'.$_POST[item_name.$n];
				$n++;
				}
                        $productname=mysqli_real_escape_string($link,$productname);

			$m=1;
			while ($_POST[mc_gross1_.$m]!=null){
				$amounttotal=$amounttotal+$_POST[mc_gross1_.$m];
				$m++;
				}
			$datebss=strtotime($date);
						

$resultx = mysql_query("INSERT INTO IPNdata (Date, Amount, Rep, TXNID, Formatteddate, Product, Buyer, Address, Phone, Email, Business, Country, Memo, Option1, Option2, Option3, Option4, DateBasketSoldSorting)
		VALUES (
	'$date', '$amount', '$rep', '$txnid', '$finaldate', '$productname', '$buyer', '$address', '$phone', '$email', '$business', '$country', '$memo', '$option1', '$option2', '$option3', '$option4', '$datebss')");
	if(!$resultx)
	{
	  die('Invalid query: ' . mysql_error());
	  $mail_From = "From: IPN@tester.com";
          $mail_To = $email;
          $mail_Subject = "Sql Error";
          $mail_Body = mysql_error();
          mail($mail_To, $mail_Subject, $mail_Body, $mail_From);

	}
	 }


}

	
  
  else if (strcmp ($res, "INVALID") == 0) 
  {
   //write to file
   $fh = fopen("logipn.txt", 'a');//open file and create if does not exist
   fwrite($fh, "\r\n/////////////////////////////////////////\r\n Invalid \r\n");//Just for spacing in log file
   fwrite($fh, $req);//write data
   fclose($fh);//close file
 
   //email
   $mail_From = "From: IPN@tester.com";
   $mail_To = $email;
   $mail_Subject = "INVALID IPN";
   $mail_Body = $req;
   mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
  }
//}
 fclose ($fp);//close file pointer
}
?>