<?php
   // Get contents of webhook request
   $requestBody = file_get_contents('php://input');
   $client_secret = 'ropapoaWfYAeVowL6BHADJByMQWGAiEC';
   // your client_secret value sent to you after the app registration

   // Parse webhook data
   $decodedBody = json_decode($requestBody, true);
   $eventId = $decodedBody['eventId'];
   $eventCreated = $decodedBody['eventCreated'];
   $storeId = $decodedBody['storeId'];
   $entityId = $decodedBody['entityId'];//order Number
   //$eventType = $decodedBody['eventType'];
   $eventType = "order.created";
   $data = $decodedBody['data'];
   $store_id = "9012020"; //for example 1003
   $order_api_secret_key = "jrJV5A5Cc9JT"; // your Order API secret key
   $token = "secret_9e4Mf9JChLtnXBfdaqwmtnFSSBSjT6kx";
   include '../includes/connection.inc.php';
   include '../includes/connection.inc2.php';
   $link = connectTo();
   $link2 = connectTo2();
   // Reply with 200OK to Ecwid
   http_response_code(200);

   // Filter out the events we're not interested in
   if ($eventType !== 'order.created') {
     $mess = "not a new order";
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
   if(isset($_Post['submit']))
    {
    
    $orderN = $_POST['order'];
   //payment status is paid
   $orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v3/9012020/orders?paymentStatus=PAID&orderNumber=$orderN&token=secret_9e4Mf9JChLtnXBfdaqwmtnFSSBSjT6kx");
   $order = $orders["data"];
   $order = internal_parse_json($order);
   //$order = $orders["orders"];
   //print_r($orders);
   $message = "";
   $suppArray = array();//supplier array
   $rand1 = rand(100,10000);
   $rand2 = rand(10,100);
   $rand3 = $rand1.$rand2;
   $orderNum = $entityId;
   //if status is PAID then insert
   if($orders[paymentStatus] == "PAID")
   {
   //check orders for order already received 
   $checkOrder = "SELECT * FROM EIPN WHERE orderNumber = '$orderN'";
   $orderCheck = mysqli_query($link2, $checkOrder)or die("MySQL ERROR on query check order: ".mysqli_error($link2));
   
   //check orders for order already received 
   $checkItem = "SELECT * FROM orderItems WHERE orderNumber = '$orderN'";
   $itemCheck = mysqli_query($link2, $checkOrder)or die("MySQL ERROR on query check order items: ".mysqli_error($link2));
   
   
     if(mysqli_num_rows($orderCheck) > 0 || mysqli_num_rows($itemCheck) > 0)
      {
          //echo "already there";
      }
      else
      { 
        //get the group and rep id
        $getGroup = "SELECT * FROM Dealers WHERE loginid = 25358";
        $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query get group: ".mysqli_error($link));
        $rowG = mysqli_fetch_assoc($groupResult);
        $parent = $rowG['setuppersonid'];
        $repID = $rowG['setuppersonid2'];
        
        //escape the incoming variables
        
        //escape the incoming variables
        $orderNum = $orders[orderNumber];
        $orderCreated = $orders[createDate];
        $subTotal = $orders[subtotal];
        $grandTotal = $orders[total];
        $affiliate = $orders[affiliateId];
        
        $custName = mysqli_real_escape_string($link, $orders[customerName]);
        
        //billing person
        $billPersonName = mysqli_real_escape_string($link, $order["billingPerson"]["name"]);
        $billPersonStreet = mysqli_real_escape_string($link, $order["billingPerson"]["street"]);
        $billPersonCity = mysqli_real_escape_string($link, $order["billingPerson"]["city"]);
        $billPersonPhone = mysqli_real_escape_string($link, $order["billingPerson"]["phone"]);
        $billPersonZip = mysqli_real_escape_string($link, $order["billingPerson"]["postalCode"]);
        $billPersonState = mysqli_real_escape_string($link, $order["billingPerson"]["stateOrProvinceCode"]);
        $billPersonCountry = mysqli_real_escape_string($link, $order["billingPerson"]["countryCode"]);
        
        //shipping person
        $shipPersonName = mysqli_real_escape_string($link, $order["shippingPerson"]["name"]);
        $shipPersonStreet = mysqli_real_escape_string($link, $order["shippingPerson"]["street"]);
        $shipPersonCity = mysqli_real_escape_string($link, $order["shippingPerson"]["city"]);
        $shipPersonPhone = mysqli_real_escape_string($link, $order["shippingPerson"]["phone"]);
        $shipPersonZip = mysqli_real_escape_string($link, $order["shippingPerson"]["postalCode"]);
        $shipPersonState = mysqli_real_escape_string($link, $order["shippingPerson"]["stateOrProvinceCode"]);
        $shipPersonCountry = mysqli_real_escape_string($link, $order["shippingPerson"]["countryCode"]);
        
        
        $custEmail = $orders[customerEmail];
        $custID = $orders[customerID];
        $custIP = $orders[customerIP];
        $transID = $orders[externalTransactionId];
        $vendor = mysqli_real_escape_string($link, $orders["vendorNumber"]);
        $payStatus = $orders["paymentStatus"];
        
        $sku = $item[sku];
        $quantity = $item[quantity];
        $items = $item[name];
        $itemName = mysqli_real_escape_string($link, $item[name]);
        
        $subTotal = $orders[subtotalCost];
        $shipCost = $orders[shippingCost];
        $totalCost = $orders[totalCost];
        $discount = $orders[discountCost];
        $tax = $order[taxCost];
        $comments = $orders[orderComments];
        $orderCreatedDate = $orders[created];
        $subTotal = $orders[subtotalCost];
        $affiliate = $orders[affiliateId];
        $itemName= "";
        $itemOptionN = "";
        $itemOptionV = "";
        $orderInsert = "INSERT INTO EIPN
                        (
                          orderNumber,
                          orderDate,
                          vendorNumber,
                          externalTransactionId,
                          paymentStatus,
                          customerId,
                          customerIP,
                          billPerson,
                          billPersonStreet,
                          billPersonCity,
                          billPersonState,
                          billPersonZip,
                          billPersonCountry,
                          billPersonPhone,
                          shipPerson,
                          shipPersonStreet, 
                          shipPersonCity,
                          shipPersonState,
                          shipPersonZip,
                          shipPersonCountry,
                          shipPersonPhone,
                          subtotalCost,
                          shippingCost,
                          taxCost,
                          totalCost,
                          affiliateId,
                          orderComments,
                          supplyCode,
                          repID,
                          groupID,
                         )VALUES(
                         '$orderNum',
                         '$orderCreated',
                         '$vendor',
                         '$transID',
                         '$payStatus',
                         '$custID',
                         '$custIP',
                         '$billPersonName',
                         '$billPersonStreet',
                         '$billPersonCity',
                         '$billPersonState',
                         '$billPersonZip',
                         '$billPersonCountry',
                         '$billPersonPhone',
                         '$shipPersonName',
                         '$shipPersonStreet',
                         '$shipPersonCity',
                         '$shipPersonState',
                         '$shipPersonZip',
                         '$shipPersonCountry',
                         '$shipPersonPhone',
                         '$subTotal',
                         '$shipCost',
                         '$tax',
                         '$totalCost',
                         '$affiliate',
                         '$comments',
                         '$vendor',
                         '$repID',
                         '$parent'
                          )";
        $orderEntry = mysqli_query($link2, $orderInsert) or die("Order insert failed ".mysqli_error($link2));
        
       if($orderEntry)
       {
         if(is_array($orders["items"]))
         {
        
           foreach ($orders["items"] as $item) 
          {
           //strip the first three chars off the sku string and push into array
           $skuString = $item['sku'];
           $sup = substr($skuString, 0, 3);
           array_push($suppArray, $sup);
           $itemName = $item[name];
           $wholesale = $item[productPrice];
           $price = $item[price];
           $sku = $item[sku];
           $quantity = $item[quantity];
           $description = $item[shortDescription];
           $nameString = str_replace("'", "", $itemName);
           
           if (is_array($item["options"])) 
              foreach($item["options"] as $option)
               {
                  //$message .= "\n\t\t" . $option["name"] . " - " . $option["value"];
                  //do something with the option
                  $itemOptionN = $option[selectedOptions][name];
                  $itemOptionV = $option[selectedOptions][value];
               }  
    
                                   
      $itemInsert = "INSERT into orderItems(orderNumber, supplierCode, itemName, description, productPrice, price, sku, quantity, itemOptionName, itemOptionValue)
    VALUES('$orderNum', '$sup', '$itemName', '$description', '$wholesale', '$price','$sku', '$quantity', '$itemOptionN', '$itemOptionV')";
      $insert = mysqli_query($link2, $itemInsert)or die("MySQL ERROR insert Item query: ".mysqli_error($link2));
         }// end for each    
        }// end is array items
        }//end order entry
        
        
        //$itemCount = count($suppArray);
    }//end else
   }//end if payment status
   }//post submit
?>