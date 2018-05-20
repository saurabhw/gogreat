<?php
include('../includes/connection.inc.php');
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
//********** MassPay Code ********************
/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_) {
	global $environment;

	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('bob_api1.greatmoods.com');
	$API_Password = urlencode('V79ULNHSKDMVTNT6');
	$API_Signature = urlencode('AHFzJcU15w4NLRhb5aA00X.SEVmNAHygwXDsoZsBUNn36mYgXNkviFkl');
	$API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	//$version = urlencode('51.0');
	$version = urlencode('95.0'); //This is the latest version as of 11/29/2012
	
	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	// Set the API operation, version, and API signature in the request.
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);

	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);

	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}

	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}

	return $httpParsedResponseAr;
}
// Set request-specific fields.
$emailSubject =urlencode('You have received a payment from GreatMoods.');
$receiverType = urlencode('EmailAddress');
$currency = urlencode('USD');	// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Add request-specific fields to the request string.
$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";

$receiversArray = array();
$numToPay = 0;
$environment = 'sandbox';	// or 'beta-sandbox' or 'live'
//*********** bottom of mass pay code *******************************	

$date=$_POST["thedate"];

$link = connectTo();

$query = "SELECT * FROM IPNdata WHERE Formatteddate='$date'"; 
$result = mysqli_query($link,$query) or die(mysqli_error($link));


$uploadornot=$_POST["toupload"];

// Find the current date for recordkeeping purposes
$tempdate=getdate();
$yeardate=$tempdate['year'];
$tempmonthdate=$tempdate['month'];
$daydate=$tempdate['mday'];
$monthdate=substr($tempmonthdate, 0, 3);
$transactiondate=$yeardate.' '.$monthdate.$daydate;

$peopletopay=array();

// Loop through every entry in the IPNdata DB that has the entered date
while($row = mysqli_fetch_array($result)){

// Get all the information on which rep sold the baskets
	$basketssold=$row['Product'];
	$transactionid=$row['oreder_id'];
	$dateofsale=$row['Date'];
	$dateofsalesorting=strtotime($row['Date']);
	$repspaidarray=array();
	$rep=$row['Rep'];
	$money=$row['Amount'];

	$repquery = "SELECT * FROM Dealers WHERE setuppersonid='$rep'"; 
	$represult = mysqli_query($link,$repquery) or die(mysqli_error($link));
	$reprow = mysqli_fetch_array($represult);

	$pid=$reprow['setuppersonid'];
	
//If the basket sold was by a fundraisermember, skip them
if($reprow['signuptype']==fundraisermember)	{
    
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$pid'"; 
	$represult2 = mysqli_query($link, $repquery2) or die(mysqli_error($link));
	$reprow2 = mysqli_fetch_array($represult2);
	$rep=$reprow2['DealerDir'];
								}

//Pay the fundraiser
	$repquery = "SELECT * FROM Dealers WHERE DealerDir='$rep'"; 
	$represult = mysqli_query($link, $repquery) or die(mysqli_error($link));
	$reprow = mysqli_fetch_array($represult);

	$moneytopay=$money*.35;
	$money=$money-$moneytopay;
	$emailtopay=$reprow['PaypalEmail'];
	$userID = $reprow['loginid'];

	$nextperson=$reprow['setuppersonid'];
	$addtoarray=array($emailtopay, $moneytopay);
	
	$records=array($reprow['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);
	$receiverData = array(	'receiverEmail' => $emailtopay,
							'amount' => $moneytopay,
							'uniqueID' => $userID,
							'note' => "example_note");
	$receiversArray[$numToPay] = $receiverData;

//Pay the fundraiser's salesrep
if($nextperson!=null)	{
	$numToPay++;
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
	$represult2 = mysqli_query($link, $repquery2) or die(mysqli_error($link));
	$reprow2 = mysqli_fetch_array($represult2);

	$commissionperson=$reprow2['setuppersonid'];
	$repquery3 = "SELECT * FROM Dealers WHERE loginid='$commissionperson'"; 
	$represult3 = mysqli_query($link,$repquery3) or die(mysqli_error($link));
	$reprow3 = mysqli_fetch_array($represult3);

	$commission=$reprow3['SalesrepCommission'];
	$commission=$commission/100;

	$moneytopay=$money*$commission;
	$money=$money-$moneytopay;

	$nextperson=$reprow2['setuppersonid'];
	$emailtopay=$reprow2['PaypalEmail'];
	$userID = $reprow['loginid'];
	$addtoarray=array($emailtopay, $moneytopay);

	$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);
	$receiverData = array(	'receiverEmail' => $emailtopay,
							'amount' => $moneytopay,
							'uniqueID' => $userID,
							'note' => "example_note");
	$receiversArray[$numToPay] = $receiverData;
}
//Pay the salesrep's repfirmowner
if($nextperson!=null)	{
	$numToPay++;
	$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
	$represult2 = mysqli_query($link,$repquery2) or die(mysqli_error($link));
	$reprow2 = mysqli_fetch_array($represult2);

	$commission=$reprow2['Commission'];
	$commission=$commission/100;
	$moneytopay=$money*$commission;

	$nextperson=$reprow2['setuppersonid'];
	$emailtopay=$reprow2['PaypalEmail'];
	$userID = $reprow['loginid'];
	$addtoarray=array($emailtopay, $moneytopay);

	$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
	array_push($repspaidarray,$records);

	array_push($peopletopay,$addtoarray);
	$receiverData = array(	'receiverEmail' => $emailtopay,
							'amount' => $moneytopay,
							'uniqueID' => $userID,
							'note' => "example_note");
	$receiversArray[$numToPay] = $receiverData;
}
//Pay the districtmanager(if exists)
	if($nextperson!=null)	{
		$numToPay++;
		$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
		$represult2 = mysqli_query($link,$repquery2) or die(mysqli_error($link));
		$reprow2 = mysqli_fetch_array($represult2);

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
		$userID = $reprow['loginid'];
		$addtoarray=array($emailtopay, $moneytopay);

		$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
		array_push($repspaidarray,$records);

		array_push($peopletopay,$addtoarray);
		$receiverData = array(	'receiverEmail' => $emailtopay,
							'amount' => $moneytopay,
							'uniqueID' => $userID,
							'note' => "example_note");
		$receiversArray[$numToPay] = $receiverData;
				}
//Pay the regional manager (if exists)
	if($nextperson!=null)	{
		$numToPay++;
		$repquery2 = "SELECT * FROM Dealers WHERE loginid='$nextperson'"; 
		$represult2 = mysqli_query($link,$repquery2) or die(mysqli_error($link));
		$reprow2 = mysqli_fetch_array($represult2);

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
		$userID = $reprow['loginid'];
		$addtoarray=array($emailtopay, $moneytopay);

		$records=array($reprow2['DealerDir'],$moneytopay,$basketssold);
		array_push($repspaidarray,$records);

		array_push($peopletopay,$addtoarray);
		$receiverData = array(	'receiverEmail' => $emailtopay,
							'amount' => $moneytopay,
							'uniqueID' => $userID,
							'note' => "example_note");
		$receiversArray[$numToPay] = $receiverData;
				}
// encode the array
foreach($receiversArray as $numToPay => $receiverData) {
	$receiverEmail = urlencode($receiverData['receiverEmail']);
	$amount = urlencode($receiverData['amount']);
	$uniqueID = urlencode($receiverData['uniqueID']);
	$note = urlencode($receiverData['note']);
	$nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}

//add to the records

$testquery = "SELECT * FROM MasspayPaid WHERE TXNID='$transactionid'"; 
$testresult = mysqli_query($link,$testquery) or die(mysqli_error($link));
$testrow = mysqli_fetch_array($testresult);

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
mysqli_query($link,$recordquery);
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
$xmlname='Masspay';
$xmldate=date("d-m-y : H:i:s", time());
$xmlfilename=$xmlname.$xmldate;

$xml->asXML("log/$xmlfilename.xml");

echo '<a href = "http://www.greatmoods.com/MPC/log/'.$xmlfilename.'.xml">Right click and save for spreadsheet</a>';
?>