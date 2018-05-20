<?php

  $store_id = "9012020"; //for example 1003
  $order_api_secret_key = "jrJV5A5Cc9JT"; // your Order API secret key
  $today = date('Y-m-d');
  $token = "secret_wJJYmuht5K3JEWh4U8uCp4nih51xYSgZ";
 //$today = "2016-November-22";


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

 
  $orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v3/$store_id/orders?orderNumber=111&token=$token");
  $orders = $orders["data"];
  $orders = internal_parse_json($orders);
  //$orders = $orders["orders"];
  //print_r($orders);
  $message = "";
  include '../includes/connection.inc.php';
  $link = connectTo();
  $rand1 = rand(100,10000);
  $rand2 = rand(10,100);
  $rand3 = $rand1.$rand2;
  $orderNum = $orders[orderNumber];
  $count = $orders[count];
  //$orderNum = 112;

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
       
        $checkOrder = "SELECT * FROM IPNdata WHERE order_id = '$orderNum'";
        $orderCheck = mysqli_query($link, $checkOrder)or die("MySQL ERROR on query check order: ".mysqli_error($link));
        
        if(mysqli_num_rows($orderCheck) > 0)
        {
          echo "already there";
          echo $orderNum;
          echo $count;
        }
        else
        {
        
        //get the group and rep id
        $getGroup = "SELECT * FROM Dealers WHERE loginid = '$order[affiliateId]'";
        $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query get group: ".mysqli_error($link));
        $rowG = mysqli_fetch_assoc($groupResult);
        $parent = $rowG['setuppersonid'];
        $repID = $rowG['setuppersonid2'];
        
        //escape the incoming variables
        
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
 
}
//echo "<pre> $message </pre>";
//echo $today;
//send $message
?>