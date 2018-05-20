<?php
# An HTTP GET request example
$secret = "ropapoaWfYAeVowL6BHADJByMQWGAiEC";
$url = 'https://app.ecwid.com/api/v3/9012020/orders?paymentStatus=PAID&orderNumber=120&token=secret_9e4Mf9JChLtnXBfdaqwmtnFSSBSjT6kx';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

// echo $data;

$json_obj = json_decode($data, true);
$orderNumber = $json_obj[orderNumber];
//Ecwid Shopping Cart (API)  - GET Orders
//http://developers.ecwid.com/api-documentation#orders

$output = array();
foreach ($json_obj['items'] as $item) {
    $output['total'] = $item['total'];
    $output['count'] = $item['count'];
	$output['offset'] = $item['offset'];
	$output['limit'] = $item['limit'];
	$output['items'] = $item['items'];

        echo $item['vendorOrderNumber'];
	echo $item['subtotal'];
	echo $item['total'];
	echo $item['email'];
	echo $item['externalTransactionId'];
	echo $item['paymentModule'];
	echo $item['paymentMethod'];
	echo $item['tax'];
	echo $item['ipAddress'];
	echo $item['couponDiscount'];
	echo $item['paymentStatus'];
	echo $item['paymentMessage'];
	echo $item['fulfillmentStatus'];
	echo $item['orderNumber'];
	echo $item['refererUrl'];
	echo $item['orderComments'];
	echo $item['volumeDiscount'];
	echo $item['customerId'];
	echo $item['membershipBasedDiscount'];
	echo $item['totalAndMembershipBasedDiscount'];
	echo $item['discount'];
	echo $item['usdTotal'];
	echo $item['globalReferer'];
	echo $item['createDate'];
	echo $item['updateDate'];
	echo $item['createTimestamp'];
	echo $item['updateTimestamp'];
	echo $item['customerGroupId'];
	echo $item['customerGroup'];
	
	
	//['items']	
		echo ['id'];
		$output['productId'] = $item['items'][0]['productId'];
		$output['categoryId'] = $item['items'][0]['categoryId'];
		$output['price'] = $item['items'][0]['price'];
		$output['productPrice'] = $item['items'][0]['productPrice'];
		$output['weight'] = $item['items'][0]['weight'];
		$output['sku'] = $item['items'][0]['sku'];
		$output['quantity'] = $item['items'][0]['quantity'];
		$output['shortDescription'] = $item['items'][0]['shortDescription'];
		$output['tax'] = $item['items'][0]['tax'];
		$output['shipping'] = $item['items'][0]['shipping'];
		$output['quantityInStock'] = $item['items'][0]['quantityInStock'];
		$output['name'] = $item['items'][0]['name'];
		$output['tangible'] = $item['items'][0]['tangible'];
		$output['trackQuantity'] = $item['items'][0]['trackQuantity'];
		$output['fixedShippingRateOnly'] = $item['items'][0]['fixedShippingRateOnly'];
		$output['imageUrl'] = $item['items'][0]['imageUrl'];
		$output['fixedShippingRate'] = $item['items'][0]['fixedShippingRate'];
		$output['digital'] = $item['items'][0]['digital'];
		$output['productAvailable'] = $item['items'][0]['productAvailable'];
		$output['couponApplied'] = $item['items'][0]['couponApplied'];
		
		//['files']
			$output['productFileId'] = $item['files'][0]['productFileId'];
			$output['maxDownloads'] = $item['files'][0]['maxDownloads'];
			$output['remainingDownloads'] = $item['files'][0]['remainingDownloads'];
			$output['expire'] = $item['files'][0]['expire'];
			$output['name'] = $item['files'][0]['name'];
			$output['description'] = $item['files'][0]['description'];
			$output['size'] = $item['files'][0]['size'];
			$output['adminUrl'] = $item['files'][0]['adminUrl'];
			$output['customerUrl'] = $item['files'][0]['customerUrl'];
			
		//['selectedOptions']
			$output['name'] = $item['selectedOptions'][0]['name'];
			$output['value'] = $item['selectedOptions'][0]['value'];
			$output['valuesArray'] = $item['selectedOptions'][0]['valuesArray'];
			$output['Big'] = $item['selectedOptions'][0]['Big'];
			$output['type'] = $item['selectedOptions'][0]['type'];
			  // THERE ARE MORE SELECTED OPTIONS BUT I AM LOST AT HOW THEY SHOULD BE ADDED TO THE ARRAY.
			  
			//['taxes']
				$output['name'] = $item['taxes'][0]['name'];
				$output['value'] = $item['taxes'][0]['value'];
				$output['total'] = $item['taxes'][0]['total'];
				$output['taxOnDiscountedSubtotal'] = $item['taxes'][0]['taxOnDiscountedSubtotal'];
				$output['taxOnShipping'] = $item['taxes'][0]['taxOnShipping'];
				
		//['billingPerson']
			$output['name'] = $item['billingPerson'][0]['name'];
			$output['companyName'] = $item['billingPerson'][0]['companyName'];
			$output['street'] = $item['billingPerson'][0]['street'];
			$output['city'] = $item['billingPerson'][0]['city'];
			$output['countryCode'] = $item['billingPerson'][0]['countryCode'];
			$output['countryName'] = $item['billingPerson'][0]['countryName'];
			$output['postalCode'] = $item['billingPerson'][0]['postalCode'];
			$output['stateOrProvinceCode'] = $item['billingPerson'][0]['stateOrProvinceCode'];
			$output['stateOrProvinceName'] = $item['billingPerson'][0]['stateOrProvinceName'];
			$output['phone'] = $item['billingPerson'][0]['phone'];
			
		//['shippingPerson']
			$output['name'] = $item['shippingPerson'][0]['name'];
			$output['companyName'] = $item['shippingPerson'][0]['companyName'];
			$output['street'] = $item['shippingPerson'][0]['street'];
			$output['city'] = $item['shippingPerson'][0]['city'];
			$output['countryCode'] = $item['shippingPerson'][0]['countryCode'];
			$output['countryName'] = $item['shippingPerson'][0]['countryName'];
			$output['postalCode'] = $item['shippingPerson'][0]['postalCode'];
			$output['stateOrProvinceCode'] = $item['shippingPerson'][0]['stateOrProvinceCode'];
			$output['stateOrProvinceName'] = $item['shippingPerson'][0]['stateOrProvinceName'];
			$output['phone'] = $item['shippingPerson'][0]['phone'];
			
		//['shippingOption']
			$output['shippingMethodName'] = $item['shippingOption'][0]['shippingMethodName'];
			$output['shippingRate'] = $item['shippingOption'][0]['shippingRate'];
			$output['estimatedTransitTime'] = $item['shippingOption'][0]['estimatedTransitTime'];
			
		//['handlingFee']
			$output['name'] = $item['handlingFee'][0]['name'];
			$output['value'] = $item['handlingFee'][0]['value'];
			$output['description'] = $item['handlingFee'][0]['description'];
			
		//['paymentParams']
			$output['Company name'] = $item['paymentParams'][0]['Company name'];
			$output['Job position'] = $item['paymentParams'][0]['Job position'];
			$output['PO number'] = $item['paymentParams'][0]['PO number'];
			//$output['Buyer's full name'] = $item['paymentParams'][0]['Buyer's full name'];
			
		//['discountInfo']
			$output['value'] = $item['discountInfo'][0]['value'];
			$output['type'] = $item['discountInfo'][0]['type'];
			$output['base'] = $item['discountInfo'][0]['base'];
			$output['orderTotal'] = $item['discountInfo'][0]['orderTotal'];
			
		$output['hidden'] = $item['hidden'];
		echo $item['total'];
		echo $item['orderNumber'];
		echo $item['email'];
		echo $orderNumber;
}	

echo $output[5];
//echo $json_obj['items'];

/*
$fp = fopen('hardmerch_orders.csv', 'a');
foreach ($output as $line) {
    fputcsv($fp, $items);
}
fclose($fp);
*/
?>