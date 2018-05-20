<?php
require_once 'atn/AuthorizeNet.php'; // The SDK
define('AUTHORIZENET_SANDBOX', true);
$url = "http://greatmoods.com/direct_post.php";
$api_login_id = '68kTEnEwT6RB';
$transaction_key = '4qP6UyJp8N27a5wz';
$md5_setting = '68kTEnEwT6RB'; // Your MD5 Setting
$amount = "5.99";
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
?>