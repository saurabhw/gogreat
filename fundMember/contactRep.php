<?
  session_start();
  include("../includes/connection.inc.php");
  include("../includes/functions.php");
  $link = connectTo();
  if(isset($_POST['submit']))
  {
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $id = $_POST['referrer'];
    $gn = $_POST['gn'];
    $ct = $_POST['ct'];
    $message = $_POST['comment'];
    $message .= "<br>Originated From: <br>".$gn.' '.$ct.' '.$id;
    
    
    $subject = "GreatMoods Customer Message";
    $to = $_POST['repmail']; 
    $headers = "From: ".$senderEmail."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    if(mail($to, $subject, $message, $headers))
    {
         header( 'Location: fundSite.php?group='.$id);
    }
  }
?>