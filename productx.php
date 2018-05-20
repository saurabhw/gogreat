<?php 
session_start();
if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}

include(SITE_ROOT.'/includes/upcarray1.php');     
include(SITE_ROOT."/includes/dealerarray.php");  

$host="localhost"; // Host name  
$username="amoodf5"; // Mysql username  
$password="AtG7L26B"; // Mysql password  
$db_name="amoodf5_info"; // Database name  
$tbl_name="Baskets"; // Table name  
mysql_connect("$host", "$username", "$password")or die("cannot connect");   
mysql_select_db("$db_name")or die("cannot select DB");  

$id = $_GET['id'];
$bid = $_GET['bid'];


$result = mysql_query("SELECT * FROM Baskets WHERE Bid='$bid' ");

$row = mysql_fetch_array($result);

	$title = $row['BasketName'];
	$retail = $row['RetailPrice'];
	$whole = $row['WholesalePrice'];
	$content = $row['Description'];
	$upc = $row['UPC'];
	$basketidtemp=strtolower($title);
	$basket=str_replace(" ", "", $basketidtemp);
        $basket=str_replace("'", "", $basket);









$cat="Product View - "."$title"; //Sets title of page and mood.

include(SITE_ROOT.'/includes/header.php');

include(SITE_ROOT.'/includes/leftmenu.php');

?>

<table width="873" height="507" border="0" align="right" cellpadding="0" cellspacing="0">
    <tr>
      <td width="534" rowspan="3"><div align="right">
          <table width="99%" height="531" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="15" height="15" valign="top" background="<?php echo HTML_ROOT; ?>/Images/box/tl.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
              <td height="15" background="<?php echo HTML_ROOT; ?>/Images/box/topline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
              <td width="15" height="15" background="<?php echo HTML_ROOT; ?>/Images/box/tr.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            </tr>
            <tr>
              <td background="<?php echo HTML_ROOT; ?>/Images/box/leftline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
              <td width="499" valign="middle"><div align="center"><img src="<?php echo HTML_ROOT; ?>/Images/products/gb/large/<? echo $basket;?>.jpg" width="490" border="0" /></div></td>
              <td height="500" background="<?php echo HTML_ROOT; ?>/Images/box/rightline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            </tr>
            <tr>
              <td width="15" height="15" valign="bottom" background="<?php echo HTML_ROOT; ?>/Images/box/bl.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
              <td height="15" background="<?php echo HTML_ROOT; ?>/Images/box/botline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
              <td width="15" height="15" valign="bottom" background="<?php echo HTML_ROOT; ?>/Images/box/br.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            </tr>
          </table>
        </div></td>
      <td width="339" height="239"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="40" colspan="2" align="center" valign="top" class="prod-title" style="color:red;"><? echo $title; ?></td>
          </tr>
          <tr>
            <!-- <td width="50%" height="25" align="center" valign="top" class="InStock">Gift Basket</td> -->
            <!-- <td align="center" valign="top" class="InStock" style="color: #873945">In Stock</td> -->
          </tr>
        </table>
        <table width="99%" height="164" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#663300" bgcolor="#B8860B">
          <tr>
            <td height="162"><table width="100%" height="145" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50%" height="42"><div style="text-align:left; color:black;"><font size="+1">&nbsp;&nbsp;&nbsp;&nbsp;Price:</font> <span class="style161" style="color:#000">$ 
<? echo $retail; ?>

</span> </div></td>

                </tr>
                <tr>
                  <td height="40" colspan="2" align="center">

<?php

$host="localhost"; // Host name  
$username="amoodf5"; // Mysql username  
$password="AtG7L26B"; // Mysql password  
$db_name="amoodf5_info"; // Database name  
$tbl_name="Baskets"; // Table name  
mysql_connect("$host", "$username", "$password")or die("cannot connect");   
mysql_select_db("$db_name")or die("cannot select DB"); 

$id = $_GET['id'];
$bid = $_GET['bid'];

$userresult = mysql_query("SELECT * FROM Dealers WHERE DealerDir='$id'");
$userrow = mysql_fetch_array($userresult);
$activated=$userrow['activated'];
$usertype=$userrow['signuptype'];
$repNum=$userrow['setuppersonid']; 

if($bid<='51')  {
             echo '<font style="color:red"><B> Sold Out </B></font>';
                        }
else {
if($activated=='1' && $usertype=='fundraiser') {
	if($usertype=='fundraiser' || $usertype=='fundraisermember')	{
        echo '
	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<table>
		<tr><td style="text-align:left; color:black;"><input type="hidden" name="on1" value="Greeting / Note to the person receiving the Gift Basket" >Greeting / Note to the person receiving the Gift Basket</td></tr><tr><td style="text-align:left;"><input type="text" name="os1" maxlength="200"></td></tr>
		<tr><td style="text-align:left; color:black;"><input type="hidden" name="on0" value="Shipping Date">Shipping Date: </td></tr><tr><td style="text-align:left; color:black;"><select name="os0">
        <option value="Week before Christmas"> Week before Christmas </option>
	</select> </td></tr><tr></tr>
	<tr><td td style="text-align:left;color:black;">Quantity:&nbsp; <input type="text" name="quantity" size="3" value="1">
					</table>
					<center><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" align="top" alt="Make payments with PayPal - it\'s fast, free and secure!"></center>
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					<input type="hidden" name="add" value="1">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="custom" value="'.$repNum.'">
                             
					<input type="hidden" name="business" value="goofy4333@gmail.com">
                        
					<!-- ************** ENTER ITEM NAME ************** -->
					<input type="hidden" name="item_name" value="'.$title.'">

					<!-- ************** ENTER ITEM PRICE ************** -->
					<input type="hidden" name="amount" value="'.$retail.'">
                                        <input type="hidden" name="buyer_credit_promo_code" value="">
                                        <input type="hidden" name="buyer_credit_product_category" value="">
                                        <input type="hidden" name="buyer_credit_shipping_method" value="">
                                        <input type="hidden" name="buyer_credit_user_address_change" value="">
                                        <input type="hidden" name="no_shipping" value="2">
                                        <input type="hidden" name="return" value="http://www.greatmoods.com/success.php">
					<input type="hidden" name="cancel_return" value="http://www.greatmoods.com/special">
					<input type="hidden" name="notify_url" value="http://greatmoods.com/ipnDB.php">
					<input type="hidden" name="cn" value="Note to '.$id.' (optional)">
					<input type="hidden" name="currency_code" value="USD">
					<!-- ************** ENTER ITEM Weight ************** -->
					<input type="hidden" name="weight" value="7.5">
					<input type="hidden" name="weight_unit" value="lbs">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="bn" value="PP-ShopCartBF">




	</form>';
                }
					}
else {
      echo '<font style="color:red"><B>This account is not activated. Please contact fundraiser administrator.</B></font>';
     }
                             }
?>
 </td>
                </tr>
            </table></td>
          </tr>
        </table></td>
    </tr>
 
    <tr>
      <td height="244" valign="bottom">
      
        <table width="99%" height="244" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="16" valign="top" style="background-image: url('<?php echo HTML_ROOT; ?>/Images/box/tl.gif'); background-repeat: no-repeat; #height: 13px;">
            	<img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="16" border="0" style="#height: 13px;" />
            </td>
            <td height="16" background="<?php echo HTML_ROOT; ?>/Images/box/topline.gif" style="#height: 13px;">
            	<img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="16" border="0" style="#height: 13px;" />
            </td>
            <td width="15" height="16" style="background-image: url('<?php echo HTML_ROOT; ?>/Images/box/tr.gif'); background-repeat: no-repeat; #height: 13px;">
            	<img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="16" border="0" style="#height: 13px;" />
            </td>
          </tr>
          <tr>
            <td background="<?php echo HTML_ROOT; ?>/Images/box/leftline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            <td width="306" valign="top">
            







                  <div style="text-align: center; width: 305px; height: 260px;">
					<div style="float: left; margin-left: 8px; width: 20px; height: 20px; background: url('<?php echo HTML_ROOT; ?>/Images/LeftSideRed.jpg');"></div>
					<div style="float: left; width: 249px; height: 20px; background: red; color: $ffffff;" class="style1">Thank You</div>
					<div style="float: left; width: 20px; height: 20px; background: url('<?php echo HTML_ROOT; ?>/Images/RightSideRed.jpg');"></div>
                    









                  <div style="text-align: justify; clear: both; padding: 16px 10px 10px 8px;"> 
                      <br />
                      <span style="font-size: 15px; line-height:20px;"><?php echo "$content"; ?></span>
                  </div>
                  </div>
                      
            
            
            </td>
            <td width="15" height="300" background="<?php echo HTML_ROOT; ?>/Images/box/rightline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
          </tr>
          <tr>
            <td width="15" height="15" valign="bottom" background="<?php echo HTML_ROOT; ?>/Images/box/bl.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            <td height="15" background="<?php echo HTML_ROOT; ?>/Images/box/botline.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
            <td width="15" height="15" valign="bottom" background="<?php echo HTML_ROOT; ?>/Images/box/br.gif"><img src="<?php echo HTML_ROOT; ?>/Images/box/boxspacer.gif" width="15" height="15" /></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>

  <? include(SITE_ROOT.'/includes/footer.php'); ?>