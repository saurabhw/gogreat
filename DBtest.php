<?php

if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}

function replace_whitespace($Value = '')
{
	// Replace any whitespace with only a single space
	return preg_replace('/\s+/', '', trim($Value));
}

$date=$_POST["thedate"];

$host="localhost"; // Host name 
$username="amoodf5_ryan"; // Mysql username 
$password="nb]]mFg2ZU.n"; // Mysql password 
$db_name="amoodf5_gm2012"; // Dat 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

$query = "SELECT * FROM IPNdata WHERE Formatteddate='$date'"; 
$result = mysql_query($query) or die(mysql_error());


$uploadornot=$_POST["toupload"];

// Find the current date for recordkeeping purposes
$tempdate=getdate();
$yeardate=$tempdate['year'];
$tempmonthdate=$tempdate['month'];
$daydate=$tempdate['mday'];
$monthdate=substr($tempmonthdate, 0, 3);
$transactiondate=$yeardate.$monthdate.$daydate;

$peopletopay=array();

// Loop through every entry in the IPNdata DB that has the entered date
while($row = mysql_fetch_array($result)){

// Get all the information on which rep sold the baskets
	$basketssold=$row['Product'];
	$transactionid=$row['TXNID'];
	$dateofsale=$row['Date'];
	$dateofsalesorting=strtotime($row['Date']);
	$repspaidarray=array();
	$rep=$row['Rep'];
	$money=$row['Amount'];

	$repquery = "SELECT * FROM Dealers WHERE DealerDir='$rep'"; 
	$represult = mysql_query($repquery) or die(mysql_error());
	$reprow = mysql_fetch_array($represult);

	$pid=$reprow['setuppersonid'];
	
//If the basket sold was by a fundraisermember, skip them
if($reprow['signuptype']==fundraisermember)	{
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$pid'"; 
	$represult2 = mysql_query($repquery2) or die(mysql_erro());
	$reprow2 = mysql_fetch_array($represult2);
	$rep=$reprow2['DealerDir'];
								}

//Pay the fundraiser
	$repquery = "SELECT * FROM Dealers WHERE DealerDir='$rep'"; 
	$represult = mysql_query($repquery) or die(mysql_error());
	$reprow = mysql_fetch_array($represult);

	$moneytopay=$money*.35;
	$money=$money-$moneytopay;
	$emailtopay=$reprow['PaypalEmail'];

	$nextperson=$reprow['setuppersonid'];
	$addtoarray=array($emailtopay, $moneytopay);
	
	$records=array($reprow['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);

//Pay the fundraiser's salesrep
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
	$represult2 = mysql_query($repquery2) or die(mysql_erro());
	$reprow2 = mysql_fetch_array($represult2);

	$commissionperson=$reprow2['setuppersonid'];
	$repquery3 = "SELECT * FROM Dealers WHERE loginid='$commissionperson'"; 
	$represult3 = mysql_query($repquery3) or die(mysql_erro());
	$reprow3 = mysql_fetch_array($represult3);

	$commission=$reprow3['SalesrepCommission'];
	$commission=$commission/100;

	$moneytopay=$money*$commission;
	$money=$money-$moneytopay;

	$nextperson=$reprow2['setuppersonid'];
	$emailtopay=$reprow2['PaypalEmail'];
	$addtoarray=array($emailtopay, $moneytopay);

	$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);

//Pay the salesrep's repfirmowner
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
	$represult2 = mysql_query($repquery2) or die(mysql_erro());
	$reprow2 = mysql_fetch_array($represult2);

	$commission=$reprow2['Commission'];
	$commission=$commission/100;
	$moneytopay=$money*$commission;

	$nextperson=$reprow2['setuppersonid'];
	$emailtopay=$reprow2['PaypalEmail'];
	$addtoarray=array($emailtopay, $moneytopay);

	$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);

//Pay the districtmanager(if exists)
	if($nextperson!=null)	{
		$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
		$represult2 = mysql_query($repquery2) or die(mysql_erro());
		$reprow2 = mysql_fetch_array($represult2);

		$districtcommission=$reprow2['Commission'];
		if($districtcommission!=0 && $districtcommission!=null)	{
			$districtcom=$districtcommission/100;
			$moneytopay=$money*$districtcom;
									}
		else	{
			$moneytopay=$money*.01;
			}

		$nextperson=$reprow2['setuppersonid'];
		$emailtopay=$reprow2['PaypalEmail'];
		$addtoarray=array($emailtopay, $moneytopay);

		$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
		array_push($repspaidarray,$records);

		array_push($peopletopay,$addtoarray);
				}
//Pay the regional manager (if exists)
	if($nextperson!=null)	{
		$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
		$represult2 = mysql_query($repquery2) or die(mysql_erro());
		$reprow2 = mysql_fetch_array($represult2);

		$regionalcommission=$reprow2['Commission'];
		if($regionalcommission!=0 && $regionalcommission!=null)	{
			$regionalcom=$regionalcommission/100;
			$moneytopay=$money*$regionalcom;
									}
		else	{
			$moneytopay=$money*.01;
			}

		$nextperson=$reprow2['setuppersonid'];
		$emailtopay=$reprow2['PaypalEmail'];
		$addtoarray=array($emailtopay, $moneytopay);

		$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
		array_push($repspaidarray,$records);

		array_push($peopletopay,$addtoarray);
				}


//add to the records

$testquery = "SELECT * FROM MasspayPaid WHERE TXNID='$transactionid'"; 
$testresult = mysql_query($testquery) or die(mysql_error());
$testrow = mysql_fetch_array($testresult);

$idtest=$testrow['TXNID'];

if($idtest==null)	{
	$allpeoplepaid=null;
	$allamountpaid=null;
	$zz=0;
	while($repspaidarray[$zz]!=null){
		$personpaid=$repspaidarray[$zz][0];
		$moneypaid=$repspaidarray[$zz][1];
		$basketssold=$repspaidarray[$zz][2];
		$allpeoplepaid=$allpeoplepaid.'(chicken)'.$personpaid;
		$allamountpaid=$allamountpaid.'(pig)'.$moneypaid;
		++$zz;
					}

$recordquery="INSERT INTO MasspayPaid (
  TXNID,
  BasketsSold,
  PersonPaid,
  AmountPaid,
  Date,
  DateBasketSold,
  DateBasketSoldSorting
  ) VALUES (
  '$transactionid',
  '$basketssold',
  '$allpeoplepaid',
  '$allamountpaid',
  '$transactiondate',
  '$dateofsale',
  '$dateofsalesorting'
  )";  
mysql_query($recordquery);
			}







					}

$xx=0;
while($peopletopay[$xx][0]!=null)	{
	$yy=0;
	while($peopletopay[$yy][0]!=null)	{
		if($peopletopay[$xx][0]==$peopletopay[$yy][0] && $xx!=$yy)	{
			$emailtopaynow=$peopletopay[$xx][0];
			$moneytopaythem=$peopletopay[$xx][1]+$peopletopay[$yy][1];
			$newtemparray=array($emailtopaynow,$moneytopaythem);
			array_push($peopletopay,$newtemparray);
			unset($peopletopay[$xx]);
			unset($peopletopay[$yy]);
			$peopletopay=array_values($peopletopay);
										}
		++$yy;
						}
	++$xx;
					}

$xxf=0;
while($peopletopay[$xxf]!=null)	{
	echo $peopletopay[$xxf][0]. "&nbsp&nbsp&nbsp " . round($peopletopay[$xxf][1],2) . " &nbsp&nbsp&nbsp " . 'USD'; 
	echo "<br />";
	++$xxf;
				}




$xml = new SimpleXMLElement("<Masspay/>");

$xmldata=0;

while($peopletopay[$xmldata]!=null)	{
	$f = $xml->addChild('commission');


	$f->addChild("email",$peopletopay[$xmldata][0]);
	$f->addChild("amount",$peopletopay[$xmldata][1]);
	$f->addChild("currency",'USD');
	++$xmldata;
					}
$name='Masspay';
$date=date("d/m/y : H:i:s", time());
$filename=$name.' '.$date;


//$xml->asXML("SITE_ROOT/MPC/$filename.xml");

?>