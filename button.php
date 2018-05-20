<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">


</head>
<body>

<div class="pricepanel">

<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <table class="productpage">
                <tr>
                    <td>
                    <input id="greeting" type="hidden" name="on1" value="Greeting to Person Receiving the Gift (Below):" >Greeting to Person Receiving the Gift (Below):<br />
                    <input id="greeting" type="text" name="os1" maxlength="200"></td>
                </tr>
                <tr>
                    <td>
                    <input type="hidden" name="on0" value="Shipping Date">Shipping Date:
                    <select name="os0">
                        <option value="Week before Easter"> Week before Easter</option>
                        <option value="Week before Easter"> Week before Mother's Day</option>
                        <option value="Week before Easter"> Week before Graduation</option>
                        <option value="Week before Easter"> Week before Father's Day</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Quantity:&nbsp;
                    <input id="quantity" type="text" name="quantity" size="3" value="1">
                    </td>
                 </tr>   
               <tr><td>
                <center>
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" align="top" alt="Make payments with PayPal - it\'s fast, free and secure!">
                </center></td></tr>
                 </table>
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <input type="hidden" name="add" value="1">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="custom" value="<? echo $repNum;?>">
	        <input type="hidden" name="business" value="gmbaskets@yahoo.com">
	        
	        <!-- ************** ENTER ITEM NAME ************** -->
	        <input type="hidden" name="item_name" value="<? echo $productName;?>">
	        
	        <!-- ************** ENTER ITEM PRICE ************** -->
	        <input type="hidden" name="amount" value="<? echo $retailPrice;?>">
	        <input type="hidden" name="buyer_credit_promo_code" value="">
	        <input type="hidden" name="buyer_credit_product_category" value="">
	        <input type="hidden" name="buyer_credit_shipping_method" value="">
	        <input type="hidden" name="buyer_credit_user_address_change" value="">
	        <input type="hidden" name="no_shipping" value="2">
	        <input type="hidden" name="return" value="http://www.greatmoods.com/thankyou.php">
	        <input type="hidden" name="cancel_return" value="http://www.greatmoods.com/special">
	        <input type="hidden" name="notify_url" value="http://greatmoods.com/ipnDB.php">
	        <input type="hidden" name="cn" value="Note to <? echo $id;?> (optional)">
	        <input type="hidden" name="currency_code" value="USD">
	        
	        <!-- ************** ENTER ITEM Weight ************** -->
	        <input type="hidden" name="weight" value="7.5">
	        <input type="hidden" name="weight_unit" value="lbs">
	        <input type="hidden" name="lc" value="US">
	        <input type="hidden" name="bn" value="PP-ShopCartBF">
	        </form>
</div>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WAJJD2FKJVSPG">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>
</body>
</html>