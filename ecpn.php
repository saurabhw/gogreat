<?php
 session_start();
 include('includes/connection.inc.php');
 $link = connectTo();
 $email = "cleo@greatmoods.com";
 $order = $_POST['order_id'];
 $store_id = "2912226"; //for example 1003
 foreach ($_POST as $key => $value) 
{
 $value = urlencode(stripslashes($value));
 //$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);
 $req .= "&$key=$value";
}
 $order_api_secret_key = "p1bg3KFbVfC2"; // your Order API secret key
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
 $orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v1/$store_id/orders?secure_auth_key=$order_api_secret_key&statuses=ACCEPTED&order=$order");
 $orders = $orders["data"];
 $orders = internal_parse_json($orders);
 $orders = $orders["orders"];
 foreach($orders as $order) {
 $message = $message . "\n\nOrder #" . $order["customerEmail"] ." - " . $order["number"] . " - " . $order["customerEmail"] ." - " . $order["affiliateId"] ." - " . $order["created"];
        foreach ($order["items"] as $item) {
 $message .= "\n\t" . $item["name"] . " - " . $item["sku"] . " - ". $item["quantity"];
 if (is_array($item["options"])) 
 foreach($item["options"] as $option) {
 $message .= "\n\t\t" . $option["name"] . " - " . $option["value"];
}

}
 //get order details
 $mail = $order["customerEmail"];
 $date = $order["created"];
 $amount = $order["totalCost"];
 $payPalID = $order["externalTransactionId"];
 $comments = $order["orderComments"];
 $buyer = $order["customerName"];
 
 if($orders)
 {
   $mail_From = "From: IPN@tester.com";
   $mail_To = $email;
   $mail_Subject = "Complete";
   $mail_Body = $req;
   mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
 }
 
}
?>