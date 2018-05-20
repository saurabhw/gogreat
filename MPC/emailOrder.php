<?php 
  
	require_once '../includes/connection.inc.php';
	require_once '../includes/connection.inc2.php';
	require '../email/PHPMailer-master/PHPMailerAutoload.php';
	$link = connectTo();
	$link2 = connectTo2();
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
    /*
	$res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
	$id = $userRow['supplyCode'];
	$name = $userRow['userName'];
	$add = $userRow['address'];
	$cty = $userRow['city'];
	$st = $userRow['state'];
	$zp = $userRow['zip'];
	$email = $userRow['userEmail'];
    $poNumber = $_GET['num'];
	$prefix = $poNumber.$id.'.csv';
	$fp = fopen($prefix, 'w');
	*/
	$query = "SELECT 
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
	FROM EIPN RIGHT JOIN orderItems ON EIPN.orderNumber = orderItems.orderNumber AND EIPN.supplyCode = orderItems.supplierCode WHERE EIPN.recordNum = '$poNumber'";
    $result = mysqli_query($link2, $query)or die("MYSQL ERROR purchase order query: ".mysqli_error($link2));
 
    $h = "Order Number, Order Date, Shipping Method, Ship Person, Address, City, State, Zip Code, Country, Order Comments, Item Name, Description, SKU, Quantity, Option Name, Option Value";
   
    fputcsv($fp,explode(', ', $h));
    while($row = mysqli_fetch_row($result))
    {
        $num = $row[recordNum];
        fputcsv($fp, $row);
    }
    
    fclose($fp);
    $to = $email;
    $from = "GreatMoods Fundraising";
    $mail = new PHPMailer;
    $subject = "New order Sent From GreatMoods Fundraising";
    $message = "Attached is your order. Be sure to download your purchase order. Thank You!";
    
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
           echo 'Message could not be sent.';
           echo 'Mailer Error: ' . $mail->ErrorInfo;
         } 
         else 
         {
            //echo 'Message has been sent';
           // 

           if (!unlink($prefix))
           {
              echo ("Error deleting $prefix");
           }
          else
           {
              //echo ("Deleted $prefix");
           }
           header('Location: home.php?sc=10');
         }
?>