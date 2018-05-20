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
   $eventType = $decodedBody['eventType'];
   $data = $decodedBody['data'];
   $store_id = "9012020"; //for example 1003
   $order_api_secret_key = "jrJV5A5Cc9JT"; // your Order API secret key
   $token = "secret_9e4Mf9JChLtnXBfdaqwmtnFSSBSjT6kx";
   include '../includes/connection.inc.php';
   $link = connectTo();
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

   //payment status is paid
   $orders = internal_fetch_url_libcurl("https://app.ecwid.com/api/v1/$store_id/orders?secure_auth_key=$order_api_secret_key&number=$entityId");
   $orders1 = $orders["data"];
   $orders = internal_parse_json($orders);
   $orders = $orders["orders"];
   //print_r($orders);
   $message = "";
   $suppArray = array();//supplier array
   $rand1 = rand(100,10000);
   $rand2 = rand(10,100);
   $rand3 = $rand1.$rand2;
   $orderNum = $entityId;
   $checkOrder = "SELECT * FROM EIPN WHERE orderNumber = '$orderNum'";
   $orderCheck = mysqli_query($link, $checkOrder)or die("MySQL ERROR on query check order: ".mysqli_error($link));
  
   if(mysqli_num_rows($orderCheck) > 0)
    {
          //echo "already there";
    }
    else
    {
        //get the group and rep id
        $getGroup = "SELECT * FROM Dealers WHERE loginid = '$orders[affiliateId]'";
        $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query get group: ".mysqli_error($link));
        $rowG = mysqli_fetch_assoc($groupResult);
        $parent = $rowG['setuppersonid'];
        $repID = $rowG['setuppersonid2'];
        
        //escape the incoming variables
        
        $orderCreatedDate = $orders[created];
        $subTotal = $orders[subtotalCost];
        $affiliate = $orders[affiliateId];
        $itemName= "";
        if(is_array($orders["items"]))
        {
        
          foreach ($orders["items"] as $item) 
          {
           //strip the first three chars off the sku string and push into array
           $skuString = $item['sku'];
           $sup = substr($skuString, 0, 3);
           array_push($suppArray, $sup);
           $itemName = $items[name];
           $nameString = str_replace("'", "", $itemName);
           
           if (is_array($item["options"])) 
              foreach($item["options"] as $option)
               {
                  //$message .= "\n\t\t" . $option["name"] . " - " . $option["value"];
                  //do something with the option
               }    
          }
        }
        $itemCount = count($suppArray);
        //$results = array_unique($myArray);
        
       /*
       What we need to do is determine if all order item SKU strings have the first three characters the same .. if so they are all from the same suppliers
       if not we need to insert orders into supplier table and split the order somehow. 
       
       I think maybe if we hade an order item table with that might help as well then somehow do a join query
       
       Right now I am thinking pushing the first three characters from the sku into an array and sort it or compare them. 
       
       This is the logic I need a little bit of help with.
       */
        
        
        //escape the incoming variables
        $orderNum = $orders[number];
        $orderCreated = $orders[created];
        $subTotal = $orders[subtotalCost];
        $affiliate = $orders[affiliateId];
        $items = $item[name];
        $itemName = mysqli_real_escape_string($link, $item[name]);
        $custName = mysqli_real_escape_string($link, $orders[customerName]);
        
        //billing person
        $billPersonName = mysqli_real_escape_string($link, $orders["billingPerson"]["name"]);
        $billPersonStreet = mysqli_real_escape_string($link, $orders["billingPerson"]["street"]);
        $billPersonCity = mysqli_real_escape_string($link, $orders["billingPerson"]["city"]);
        $billPersonPhone = mysqli_real_escape_string($link, $orders["billingPerson"]["phone"]);
        $billPersonZip = mysqli_real_escape_string($link, $orders["billingPerson"]["postalCode"]);
        $billPersonState = mysqli_real_escape_string($link, $orders["billingPerson"]["stateOrProvinceCode"]);
        $billPersonCountry = mysqli_real_escape_string($link, $orders["billingPerson"]["countryCode"]);
        
        //shipping person
        $shipPersonName = mysqli_real_escape_string($link, $orders["shippingPerson"]["name"]);
        $shipPersonStreet = mysqli_real_escape_string($link, $orders["shippingPerson"]["street"]);
        $shipPersonCity = mysqli_real_escape_string($link, $orders["shippingPerson"]["city"]);
        $shipPersonPhone = mysqli_real_escape_string($link, $orders["shippingPerson"]["phone"]);
        $shipPersonZip = mysqli_real_escape_string($link, $orders["shippingPerson"]["postalCode"]);
        $shipPersonState = mysqli_real_escape_string($link, $orders["shippingPerson"]["stateOrProvinceCode"]);
        $shipPersonCountry = mysqli_real_escape_string($link, $orders["shippingPerson"]["countryCode"]);
        
        
        $custEmail = $orders[customerEmail];
        $custID = $orders[customerID];
        $custIP = $orders[customerIP];
        $transID = $orders[externalTransactionId];
        $vendor = mysqli_real_escape_string($link, $orders["vendorNumber"]);
        $payStatus = $orders["paymentStatus"];
        $sku = $item[sku];
        $quantity = $item[quantity];
        $subTotal = $orders[subtotalCost];
        $shipCost = $orders[shippingCost];
        $totalCost = $orders[totalCost];
        $discount = $orders[discountCost];
        $tax = $order[taxCost];
        $comments = $orders[orderComments];
        
        //insert into main order table
        $queryInsert = "INSERT INTO EIPN
                        (
                          orderNumber,
                          orderDate,
                          vendorNumber,
                          externalTransactionId,
                          shippingCode,
                          paymentStatus,
                          fulfillmentStatus,
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
                          discountCost,
                          subtotalCost,
                          shippingCost,
                          taxCost,
                          totalCost,
                          affiliateId,
                          items,
                          sku,
                          quantity,
                          orderComments,
                          supplyCode,
                          repID,
                          groupID,
                          paidOut
                         )VALUES(
                         '$orderNum',
                         '$orderCreated',
                         '$vendor',
                         '$transID',
                         '',
                         '$payStatus',
                         '',
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
                         '$discount',
                         '$subTotal',
                         '$shipCost',
                         '$tax',
                         '$totalCost',
                         '$affiliate',
                         '$itemName',
                         '$sku',
                         '$quantity',
                         '$comments',
                         '$vendor',
                         '$repID',
                         '$parent',
                         ''
                          )";
        
 
        $result = mysqli_query($link, $queryInsert)or die("MySQL ERROR on query c: ".mysqli_error($link));
        if($result)
        {
          //echo "inserted";
        } 
        //insert into supplier table
        
        $queryInsert2 = "INSERT INTO EIPN
                        (
                          orderNumber,
                          orderDate,
                          vendorNumber,
                          externalTransactionId,
                          shippingCode,
                          paymentStatus,
                          fulfillmentStatus,
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
                          discountCost,
                          subtotalCost,
                          shippingCost,
                          taxCost,
                          totalCost,
                          affiliateId,
                          items,
                          sku,
                          quantity,
                          orderComments,
                          supplyCode,
                          repID,
                          groupID,
                          paidOut
                         )VALUES(
                         '$orderNum',
                         '$orderCreated',
                         '$vendor',
                         '$transID',
                         '',
                         '$payStatus',
                         '',
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
                         '$discount',
                         '$subTotal',
                         '$shipCost',
                         '$tax',
                         '$totalCost',
                         '$affiliate',
                         '$itemName',
                         '$sku',
                         '$quantity',
                         '$comments',
                         '$vendor',
                         '$repID',
                         '$parent',
                         ''
                          )";
        
 
        $result2 = mysqli_query($link2, $queryInsert2)or die("MySQL ERROR on query d: ".mysqli_error($link));
        
      }      
        
     
    }//end else
?>