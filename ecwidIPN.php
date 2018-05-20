<?php
/*
$url = 'https://app.ecwid.com/api/v3/{9012020}/orders?paymentStatus=PAID&fulfillmentStatus=AWAITING_PROCESSING&token={TOKEN}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

echo $data;
*/
# An HTTP GET request example

$url = 'https://app.ecwid.com/api/v3/{9012020}/orders?paymentStatus=PAID&fulfillmentStatus=Shipped&customer=cleo@greatmoods.com&token=jrJV5A5Cc9JT';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

$data = json_decode($data, true);

echo 'Count: ' . $data['count'] . "<br/>";
echo 'Total orders: ' . $data['total'] . "<br/>";
echo 'Order subtotal for 1st order in results: ' . $data['items'][0]['subtotal'] . "</br>";





?>