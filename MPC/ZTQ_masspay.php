<?php
/** What this file does:
 *  ====================
 *  1) Connect to the DB and get all entries that are unpaid from the 'payments' table.
 *  2) For every row returned, build a nvp string to send to paypal.
 *  3) Send string to paypal to process masspay. 
*/
    include('./includes/connection.inc.php');

$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";   

$conn = connectTo();
$result=mysqli_query($conn, "SELECT paypalID_fk,balance from payments WHERE 
                       balance > '0.00'
                       AND status = ('unpaid')");
if ($result){                       
    $i = 0;
    while ($i <= mysqli_fetch_row) {
        while($row = mysqli_fetch_object($result)) { 
            $nvpStr.="&L_EMAIL$i=$row->paypalID_fk&L_Amt$i=$row->balance"; 
            $i++;    
        }
    }
}// end if
?>