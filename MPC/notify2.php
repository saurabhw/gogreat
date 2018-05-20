<?php 
// Get contents of webhook request
$requestBody = file_get_contents('php://input');
$client_secret = 'ropapoaWfYAeVowL6BHADJByMQWGAiEC'; 
$order_api_secret_key = "jrJV5A5Cc9JT"; // your Order API secret key
// your client_secret value sent to you after the app registration
//client_id: great-moods

// Parse webhook data
$decodedBody = json_decode($requestBody, true);

$eventId = $decodedBody['eventId'];
$eventCreated = $decodedBody['eventCreated'];
$storeId = $decodedBody['storeId'];
$entityId = $decodedBody['entityId'];//order number
$eventType = $decodedBody['eventType'];//status created and paid
//$order = $decodedBody['data'];
include '../includes/connection.inc.php';
$link = connectTo();
// Reply with 200OK to Ecwid
http_response_code(200);

// Filter out the events we're not interested in
if ($eventType !== 'order.created') {
    $mess = "verification failed";
    mail("cleo@greatmoods.com","My subject",$mess);
    exit;
}

// Continue if eventType is order.updated
// Verify the webhook (check that it is sent by Ecwid)
foreach (getallheaders() as $name => $value) {
    if ($name == "X-Ecwid-Webhook-Signature") {
        $headerSignature = "$value";

        $hmac_result = hash_hmac("sha256", "$eventCreated.$eventId", $client_secret, true);
        $generatedSignature = base64_encode($hmac_result);

        if ($generatedSignature !== $headerSignature) {
            $mess = "verification failed";
            mail("cleo@greatmoods.com","My subject",$mess);
            echo 'Signature verification failed';
            exit;
        }
  }
}

// Handle the event
// ...

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

 
  $orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v3/$store_id/orders?secure_auth_key=$order_api_secret_key&paymentStatus=PAID&orderNumber=$entityId");
  $orders = $orders["data"];
  $orders = internal_parse_json($orders);
  $orders = $orders["orders"];
  //print_r($orders);
  $message = "";
  include '../includes/connection.inc.php';
  $link = connectTo();
  $rand1 = rand(100,10000);
  $rand2 = rand(10,100);
  $rand3 = $rand1.$rand2;

       foreach($orders as $order)
       {
         $message = $message . "\n\nOrder #" . $order["number"] . " - " . $order["customerEmail"] ." - " .             $order["created"]."-".$order["affiliateId"]."-".$order["items"]."-".$order["orderComments"]."-".$order["subtotalCost"]."-".$order["person"][9].'hi';
        $rand3++;
        foreach ($order["items"] as $item) 
        {
          
           $message .= "\n\t" . $item["name"] . " - " . $item["sku"] . " - ". $item["quantity"];
           if (is_array($item["options"])) 
              foreach($item["options"] as $option)
               {
                  $message .= "\n\t\t" . $option["name"] . " - " . $option["value"];
               }
       }
        //get the group and rep id
        $getGroup = "SELECT * FROM Dealers WHERE loginid = '$order[affiliateId]'";
        $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query get group: ".mysqli_error($link));
        $rowG = mysqli_fetch_assoc($groupResult);
        $parent = $rowG['setuppersonid'];
        $repID = $rowG['setuppersonid2'];
        
        //escape the incoming variables
        $orderNum = $order[number];
        $orderCreated = $order[created];
        $subTotal = $order[subtotalCost];
        $affiliate = $order[affiliateId];
        $items = $order[items];
        $itemString = str_replace("'", "", $items);
        $itemName = $item[name];
        $nameString = str_replace("'", "", $itemName);
        $custName = $order[customerName];
        $custPhone = $order[phone];
        $custEmail = $order[customerEmail];
        $transID = $order[externalTransactionId];
        $sku = $item[sku];
        $quantity = $item[quantity];
        $totalCost = $order[totalCost];
        
        
        $query = "INSERT INTO IPNdata (order_id, Date, Amount, Rep, TXNID, Product, Buyer, Phone, Email,          DateBasketSoldSorting, sku, quantity, groupID, repID, subTotalCost)";
        $query .= "Values('$orderNum', '$orderCreated', '$subTotal', '$affiliate', '$itemString', '$nameString', '$custName', '$custPhone','$custEmail', '$transID', '$sku', '$quantity', '$parent', '$repID', '$totalCost')";
        
        
        
        $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
        if($result)
        {
          echo "inserted";
        }
        
	
 
}
mail("cleo@greatmoods.com","My subject",$order);

?>