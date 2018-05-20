<?php
    
    session_start();
	session_destroy();
	//session_unset();
	header('Location: ../index.php');
    exit;
?>


<!DOCTYPE HTML>
<head>
	<title>Access Denied</title>
</head>

<body>
<div id="container">
 
  
  
  <div id="contentSample">
      <h1>Forbidden</h1>
<p>You don't have permission to access This Folder
on this server.</p>
  </div>  <!--end content-->
  
 
</div><!--end container-->

</body>
</html>


<?php
ob_end_flush();
?>