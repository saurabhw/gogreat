<?php
//session_start();
ob_start();
$home = $_SESSION['home'];
// run this script only if the logout button has been clicked
if (isset($_POST['logout'])) {
  // empty the $_SESSION array
  $_SESSION = array();
  // invalidate the session cookie
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/');
  }
  // end session and redirect
  session_destroy();
  header('Location: ../index.php');
  exit;
  }
?>
 
<form id="logoutForm" name="logoutForm" method="post" action="../logout.php">
    <input name="logout" class="btn btn-danger btn-lg btn-block" role="button" type="submit" value="Log out" />
</form>  