<?php
	session_start();
	ob_start();
	$store_id = "9012020"; //for example 1003
        $order_api_secret_key = "p1bg3KFbVfC2"; // your Order API secret key
        $result = file_get_contents('https://app-ecwid-com-n0bu3raupiki.runscope.net/api/v1/9012020/orders');
        echo $result;

# ----

function internal_parse_json($json) {
   if(version_compare(PHP_VERSION,"5.2.0",">=")) {
     return json_decode($json, true);
    }
       include_once('JSON.php');
       $json_parser = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
       return $json_parser->decode($json);
   }

   function internal_fetch_url_libcurl($url) {
       if (intval($timeout) <= 0)
           $timeout = 90;
       if (!function_exists('curl_init'))
           return array("code"=>"0","data"=>"libcurl is not installed");
       $headers[] = "Content-Type: application/x-www-form-urlencoded";
       $ch = curl_init();

       curl_setopt ($ch, CURLOPT_URL, $url);
       curl_setopt ($ch, CURLOPT_HEADER, 0);
       curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt ($ch, CURLOPT_HTTPGET, 1);
       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

       $body = curl_exec ($ch);
       $errno = curl_errno ($ch);
       $error = curl_error($ch);

       $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
       $result = array();
       if( $error ) {
           return array("code"=>"0","data"=>"libcurl error($errno): $error");
       }

       return array("code"=>$httpcode, "data"=>$body);
   }


$orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v1/$store_id/orders?secure_auth_key=$order_api_secret_key&statuses=ACCEPTED&order=15");
$orders = $orders["data"];
$orders = internal_parse_json($orders);
$orders = $orders["orders"];
//print_r($orders);
$message = "";
foreach($orders as $order) {
$message = $message . "\n\nOrder #" . $order["customerEmail"] ." - " . $order["number"] . " - " . $order["customerEmail"] ." - " . $order["affiliateId"] ." - " . $order["created"];
        foreach ($order["items"] as $item) {
$message .= "\n\t" . $item["name"] . " - " . $item["sku"] . " - ". $item["quantity"];
if (is_array($item["options"])) 
foreach($item["options"] as $option) {
$message .= "\n\t\t" . $option["name"] . " - " . $option["value"];
}

}
 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Cash Next Day!</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_homepageStyles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>

  
  <div id="content">
 
   <? echo "<pre> $message </pre>"; ?>
   <? echo $result;
   $mail = $order["customerEmail"];
   $rep = $order["affiliateId"];
   $person = $order['Person'];
   echo $mail.$rep;
   echo $person;
 ?>

  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>