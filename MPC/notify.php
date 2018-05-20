<?php
  /*
    This file receives web hook notification from Ecwid.com 
    when there has been a completed paid order.
    
    it also sends a order notification email to supplier with attached CSV file
   */
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
  
  $url = 'https://app.ecwid.com/api/v3/9012020/orders?paymentStatus=PAID&orderNumber='.$entityId.'&token='.$token;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);
    
  $ord = json_decode($data, true);//decode json array
  //print_r($ord);
  $message = "";
  include '../includes/connection.inc.php';
  $link = connectTo();
  include '../includes/connection.inc2.php';
  include '../includes/functions.php';
  require '../email/PHPMailer-master/PHPMailerAutoload.php';
  
  $link2 = connectTo2();
  $rand1 = rand(100,10000);
  $rand2 = rand(10,100);
  $rand3 = $rand1.$rand2;
  $suppArray = array();//supplier array
  
  
  foreach($ord as $order)
  { 
        $orderNum = $order[0][orderNumber];
        $memberGroupID = $order[0][affiliateId];
        //check orders for order already received 
        $checkOrder = "SELECT * FROM EIPN WHERE orderNumber = '$orderNum'";
        $orderCheck = mysqli_query($link2, $checkOrder)or die("MySQL ERROR on query check order: ".mysqli_error($link2));
   
        //check orders for order already received 
        $checkItem = "SELECT * FROM orderItems WHERE orderNumber = '$orderNum'";
        $itemCheck = mysqli_query($link2, $checkOrder)or die("MySQL ERROR on query check order items: ".mysqli_error($link2));
        
        if(mysqli_num_rows($orderCheck) > 0 || mysqli_num_rows($itemCheck) > 0)
         {
          //echo "already there";
         }
        else
        {
        $getGroup = "SELECT * FROM Dealers WHERE loginid = '$memberGroupID'";
        $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR on query get group: ".mysqli_error($link));
        $rowG = mysqli_fetch_assoc($groupResult);
        $parent = $rowG['setuppersonid'];
        $repID = $rowG['setuppersonid2'];
      
         //$message = $message . "\n\nOrder #" . $order[0]["orderNumber"] . " - " . $order[0]["customerEmail"] ." - " .$order[0]["created"]."-".$order[0]["affiliateId"]."-".$order["items"]."-".$order["orderComments"]."-".$order["subtotalCost"];
         
         $tax = $order[0][tax];
         
         $subTotal = $order[0][subtotal];
         $vendor = $order[0][vendorOrderNumber];
         $total = $order[0][total];
         $usdTotal = $order[0][usdTotal];
         $payMeth = $order[0][paymentMethod];
         $payStatus = $order[0][paymentStatus];
         $orderNum = $order[0][orderNumber];
         $fulfill = $order[0][fulfillmentStatus];
         $referURL = $order[0][refererUrl];
         $orderDate = $order[0][createDate];
         $orderComments = $order[0][orderComments];
         $customerEmail = $order[0][email];
         $ipAddress = $order[0][ipAddress];
         $custID = $order[0][customerId];
         $billPerson = $order[0][billingPerson][name];
         $billAddress = $order[0][billingPerson][street];
         $billCity = $order[0][billingPerson][city];
         $billState = $order[0][billingPerson][stateOrProvinceCode];
         $billZip = $order[0][billingPerson][postalCode];
         $billCountry = $order[0][billingPerson][countryName];
         $billPhone = $order[0][billingPerson][phone];
         
         $shipPerson = $order[0][shippingPerson][name];
         $shipAddress = $order[0][shippingPerson][street];
         $shipCity = $order[0][shippingPerson][city];
         $shipState = $order[0][shippingPerson][stateOrProvinceCode];
         $shipZip = $order[0][shippingPerson][postalCode];
         $shipCountry = $order[0][shippingPerson][countryCode];
         $shipPhone = $order[0][shippingPerson][phone];
         
         //echo $message;
         $rand3++;
         //fetch  order items
        foreach ((array) $order[0][items] as $item) 
        {
           //strip the first three chars off the sku string
           $skuString = $item['sku'];
           $sup = substr($skuString, 0, 3);
           array_push($suppArray, $sup);
           $itemName = $item[name];
           $itemID = $item[productId];
           $price = $item[price];
           $prodPrice = $item[productPrice];
           $sku = $item[sku];
           $weight = $item[weight];
           $describe = $item[shortDescription];
           $quant = $item[quantity];
           $shippingCost = "";
           $optionName = "";
           $optionValue = "";
           
           $message .= "\n\t" . $item[name] . " - " . $item[sku] . " - ". $item[quantity]."-".$item[productId];
           //fetch selected options
           if (is_array($item["selectedOptions"])) 
              foreach( $item["selectedOptions"] as $option)
               {
                  $message .= "\n\t\t" . $option[name] . " - " . $option[value];
                  $optionName = $option[name];
                  $optionValue = $option[value];
                  $shipCost = $option[shipping];
                  
               }
               //insert into  supplier db-orderItems 
               $sql = "INSERT INTO orderItems
               (orderNumber, supplierCode, itemName, description, productPrice, price, sku, quantity, shipCost, itemOptionName, itemOptionValue)
               VALUES
               ('$orderNum', '$sup', '$itemName', '$describe', '$prodPrice', '$price', '$sku', '$quant', '$shipCost', '$optionName', '$optionValue')";
               
               $insertItems = mysqli_query($link2, $sql) or die("Item Insert Failed: ".mysqli_error($link2));
               
               //insert into  GreatMoods db-orderItems 
               $sql2 = "INSERT INTO orderItems
               (orderNumber, supplierCode, itemName, description, productPrice, price, sku, quantity, shipCost, itemOptionName, itemOptionValue)
               VALUES
               ('$orderNum', '$sup', '$itemName', '$describe', '$prodPrice', '$price', '$sku', '$quant', '$shipCost', '$optionName', '$optionValue')";
               
               $insertItems2 = mysqli_query($link, $sql2) or die("Item Insert GM Failed: ".mysqli_error($link));
               
               
        }//end order items
        
              //leave only unique values in supplier array
              $suppArray = array_unique($suppArray);
              
              //insert on record for each supplier
              for ($i = 0; $i < count($suppArray); ++$i) {
                
               $supCode = $suppArray[$i];
               
               //insert order Greatmoods db EIPN
               $query2 = "INSERT INTO EIPN
               (orderNumber,orderDate,vendorNumber,paymentStatus,customerId,customerIP,billPerson,billPersonStreet,billPersonCity,billPersonState,billPersonZip,billPersonCountry,
               billPersonPhone,shipPerson,shipPersonStreet,shipPersonCity,shipPersonState,shipPersonZip,shipPersonCountry,shipPersonPhone,subTotalCost,
               taxCost,totalCost,affiliateId,orderComments,supplyCode,repID,groupID)
               VALUES
               ('$orderNum','$orderDate','$vendor','$payStatus','$custID','$ipAddress','$billPerson','$billAddress','$billCity','$billState','$billZip','$billCountry',
               '$billPhone','$shipPerson','$shipAddress','$shipCity','$shipState','$shipZip','$shipCountry','$shipPhone','$subTotal','$tax','$total','$memberGroupID',
               '$orderComments','$supCode','$repID','$memberGroupID')";
                $orderInsert2 = mysqli_query($link, $query2)or die("Order Insert Failed: ".mysqli_error($link));
                
               //insert order supply db EIPN
               $query = "INSERT INTO EIPN
               (orderNumber,orderDate,vendorNumber,paymentStatus,customerId,customerIP,billPerson,billPersonStreet,billPersonCity,billPersonState,billPersonZip,billPersonCountry,
               billPersonPhone,shipPerson,shipPersonStreet,shipPersonCity,shipPersonState,shipPersonZip,shipPersonCountry,shipPersonPhone,subTotalCost,
               taxCost,totalCost,affiliateId,orderComments,supplyCode,repID,groupID)
               VALUES
               ('$orderNum','$orderDate','$vendor','$payStatus','$custID','$ipAddress','$billPerson','$billAddress','$billCity','$billState','$billZip','$billCountry',
               '$billPhone','$shipPerson','$shipAddress','$shipCity','$shipState','$shipZip','$shipCountry','$shipPhone','$subTotal','$tax','$total','$memberGroupID',
               '$orderComments','$supCode','$repID','$memberGroupID')";
               $orderInsert = mysqli_query($link2, $query)or die("Order Insert Failed: ".mysqli_error($link2));
               
               $lastID = mysqli_insert_id($link2);
               
             $queryGetOrder = "SELECT 
	          EIPN.orderNumber,
	          EIPN.orderDate, 
	          EIPN.shippingMethod, 
	          EIPN.shipPerson, 
	          EIPN.shipPersonStreet, 
	          EIPN.shipPersonCity, 
	          EIPN.shipPersonState, 
	          EIPN.shipPersonZip, 
	          EIPN.shipPersonCountry, 
	          EIPN.orderComments,
	          orderItems.itemName,
	          orderItems.description,
	          orderItems.sku,
	          orderItems.quantity,
	          orderItems.itemOptionName,
	          orderItems.itemOptionValue
	FROM EIPN RIGHT JOIN orderItems ON EIPN.orderNumber = orderItems.orderNumber AND EIPN.supplyCode = orderItems.supplierCode WHERE EIPN.recordNum = '$lastID'";
    $orderResult = mysqli_query($link2, $queryGetOrder)or die("MYSQL ERROR purchase order query: ".mysqli_error($link2));
    
    //get supplier email
    $getSup = "SELECT * FROM users WHERE supplyCode = '$supCode'";
    $supResult = mysqli_query($link2, $getSup)or die("Supplier query failed".mysqli_error($lin2));
    $supRow = mysqli_fetch_assoc($supResult);
    $supEmail = $supRow['userEmail'];
    
    $prefix = $lastID.$supCode.'.csv';
	$fp = fopen($prefix, 'w');
 
    $h = "Order Number, Order Date, Shipping Method, Ship Person, Address, City, State, Zip Code, Country, Order Comments, Item Name, Description, SKU, Quantity, Option Name, Option Value";
   
    fputcsv($fp,explode(', ', $h));
    while($rowW = mysqli_fetch_row($orderResult))
    {
        $num = $rowW[recordNum];
        fputcsv($fp, $rowW);
    }
    
    fclose($fp);
    $to = $supEmail;
    $from = "GreatMoods Fundraising";
    $mail = new PHPMailer;
    $subject = "New order Sent From GreatMoods Fundraising";
    $message = "Attached is your order. Be sure to log in at your account at supply.greatmoods.com to download your purchase order. Thank You!";
    
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();
        $mail->Host = 'greatmoods.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'supply@greatmoods.com';                 // SMTP username
        $mail->Password = 'Pam52:)#@!';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('supply@greatmoods.com', $from);
        $mail->addAddress($to, $rec);     // Add a recipient
        //$mail->addAddress('');
        //$mail->addAddress('');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->addAttachment($prefix);         // Add attachments
        //$mail->addAttachment('http://supply.greatmoods.com/purchaseOrder.php?num=309');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = '<!DOCTYPE HTML>'. 
        '<head>'. 
        '<meta http-equiv="content-type" content="text/html">'. 
        '<title>GreatMoods Fundraising</title>'. 
        '</head>'. 
        '<body>'. 
        '<div id="header" style="width: 100%;height: 80px;margin: 
         auto;padding: 8px;color: #fff;text-align: center;background-color: 
        #FFF;font-family: Open Sans,Arial,sans-serif;">'. 
        '<div id="outer" style="width: 80%; margin-top: 10px; float: left;">'.  
        '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family:
         Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 
         1.4em;color: #444;margin-top: 10px;">'. 
         '<p>'.$message.'</p><br>'.  
         '</div><div>'.   
         '</div>'. 
         '.<br><br><br><img src="http://www.greatmoods.com/images/footer_logo.png" />.'
       
         .'</body>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
           //echo 'Message could not be sent.';
           //echo 'Mailer Error: ' . $mail->ErrorInfo;
         } 
         else 
         {
            //echo 'Message has been sent';
           // 

           if (!unlink($prefix))
           {
              //echo ("Error deleting $prefix");
           }
          else
           {
              //echo ("Deleted $prefix");
           }
          
         }
               
            
    }//end for loop
                
                //update orders for groups and members
                $ipn = "INSERT INTO IPNdata
                (order_id,Date,Amount,Rep,Product,Buyer,Address,Phone,Email,quantity,groupID,repID,subtotalCost)
                VALUES
                ('$orderNum','$orderDate','$subTotal','$repID','$itemName','$billPerson','$billAddress','$billPhone','$customerEmail','$quant','$memberGroupID','$repID','$subTotal')";
                $ipnInsert = mysqli_query($link, $ipn)or die("IPN Insert Failed: ".mysqli_error($link));
                
                $cleanUp = "DELETE FROM EIPN WHERE orderNumber = 0";
                $clean = mysqli_query($link2, $cleanUp) or die("Clean UP Failed: ".mysqli_error($link));
                
                $cleanUp2 = "DELETE FROM EIPN WHERE orderNumber = 0";
                $clean2 = mysqli_query($link, $cleanUp2) or die("Clean Up Failed 2: ".mysqli_error($link));
                
                $cleanUp3 = "DELETE FROM IPNdata WHERE order_id = 0";
                $clean3 = mysqli_query($link, $cleanUp3) or die("Clean Up Failed 3: ".mysqli_error($link));
                
       }//end else
    }//end for each order
//echo "<pre>".$message." ".$order["billingPerson"]["phone"]." </pre>";
////send $message
?>