<?php
//To Make live uncomment line below with comment of live then comment the line above it
//Email address to send emails:
$email="cleo@greatmoods.com";
//add 'cmd' as required to get VERIFIED response
$req = 'cmd=_notify-validate';
//put post into NVP format
foreach ($_POST as $key => $value) 
{
 $value = urlencode(stripslashes($value));
 $req .= "&$key=$value";
}
// setup headers for request to paypal
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//Open socket
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);//Test
//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);//Live



 

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
 fputs ($fp, $header . $req);//send request
 while (!feof($fp)) //while not end of file
 {
  $res = fgets ($fp, 1024);//get response
  if (strcmp ($res, "VERIFIED") == 0) 
  {
   //write to file
   $fh = fopen("logipn.txt", 'a');//open file and create if does not exist
   fwrite($fh, "\r\n/////////////////////////////////////////\r\n Verified \r\n");//Just for spacing in log file
   fwrite($fh, $req);//write data
   fclose($fh);//close file
 
   //email
   $mail_From = "From: IPN@tester.com";
   $mail_To = $email;
   $mail_Subject = "VERIFIED IPN";
   $mail_Body = $req;
   mail($mail_To, $mail_Subject, $mail_Body, $mail_From);


if ($_POST['payment_status']==Completed) {
 
$host="localhost"; // Host name 
$username="amoodf5"; // Mysql username 
$password="9rSTuT55"; // Mysql password 
$db_name="amoodf5_info"; // Database name 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

			$date=$_POST[payment_date];
			$amount=$_POST[mc_gross_1];
			$rep=$_POST[custom];
			$txnid=$_POST[txn_id];
			$format=(explode(" ",$date));
			$formatteddate=$format[1] . $format[2] . $format[3];
			$finaldate=trim($formatteddate, ",");
			$buyerfirst=$_POST[first_name];
			$buyerlast=$_POST[last_name];
			$buyer=$buyerfirst . ' ' . $buyerlast;
			$productname=null;
			$street=$_POST[address_street];
			$city=$_POST[address_city];
			$state=$_POST[address_state];
			$zip=$_POST[address_zip];
                        $phone=$_POST['contact_phone'];
                        $email=$_POST['payer_email'];
                        $business=$_POST['payer_business_name'];
                        $country=$_POST['address_country'];
                        $memo=$_POST['gift_message'];
			$address=$street.' '.$city.' '.$state.' '.$zip;
                        $option1=$_POST['option_name1_1'];
                        $option2=$_POST['option_name2_1'];
                        $option3=$_POST['option_selection1_1'];
                        $option4=$_POST['option_selection2_1'];
			$n=1;
			while ($_POST[item_name.$n]!=null){
				$productname=$productname.'(cow)'.$_POST[item_name.$n];
				$n++;
				}
			$m=1;
			while ($_POST[mc_gross_.$m]!=null){
				$amounttotal=$amounttotal+$_POST[mc_gross_.$m];
				$m++;
				}
			$datebss=strtotime($date);
						


mysql_query("INSERT INTO IPNdata (Date, Amount, Rep, TXNID, Formatteddate, Product, Buyer, Address, Phone, Email, Business, Country, Memo, Option1, Option2, Option3, Option4, DateBasketSoldSorting)
		VALUES (
	'$date', '$amounttotal', '$rep', '$txnid', '$finaldate', '$productname', '$buyer', '$address', '$phone', '$email', '$business', '$country', '$memo', '$option1', '$option2', '$option3', '$option4', '$datebss')"); }


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
 }
 fclose ($fp);//close file pointer
}
?>
