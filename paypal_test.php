<?php
	session_start();
	$item = 'Basket - Holiday Joy';
	$itemPrice = '00.02';
?>
<HTML>
<BODY>
<h1>Holiday Joy $24.95</h1>
<p><img style="position: relative; top: 10px;" id="leadImg" src="images/single_basket-2.JPG" width="250" height="300"></p>
<!-- Buy now Button example -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
 
    <!-- Identify your business so that you can collect the payments. --> 
    <input type="hidden" name="business" value="bob@greatmoods.com"> 
 
    <!-- Specify a Buy Now button. --> 
    <input type="hidden" name="cmd" value="_xclick"> 
 
    <!-- Specify details about the item that buyers will purchase. --> 
    <input type="hidden" name="item_name" value="<?php echo $item; ?>"> 
    <input type="hidden" name="amount" value="<?php echo $itemPrice; ?>">  
    <input type="hidden" name="currency_code" value="USD"> 
 
    <!-- Display the payment button. --> 
    <input type="image" name="submit" border="0" 
        src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
        alt="PayPal - The safer, easier way to pay online"> 
    <img alt="" border="0" width="1" height="1" 
        src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
</form>
 <!-- Add to cart Button example -->
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" 
        method="post"> 
 
    <!-- Identify your business so that you can collect the payments. --> 
    <input type="hidden" name="business" value="sales@greatmoods.com"> 
 
    <!-- Specify a PayPal Shopping Cart Add to Cart button. --> 
    <input type="hidden" name="cmd" value="_cart"> 
    <input type="hidden" name="add" value="1"> 
 
    <!-- Specify details about the item that buyers will purchase. --> 
    <input type="hidden" name="item_name" 
        value="<?php echo $item; ?>"> 
    <input type="hidden" name="amount" value="<?php echo $itemPrice; ?>"> 
    <input type="hidden" name="currency_code" value="USD"> 
 
    <!-- Display the payment button. --> 
    <input type="image" name="submit" border="0" 
        src="https://www.paypal.com/en_US/i/btn/btn_cart_LG.gif" 
        alt="PayPal - The safer, easier way to pay online"> 
    <img alt="" border="0" width="1" height="1" 
        src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
</form>
</BODY>
</HTML>