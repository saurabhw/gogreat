<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_homepageStyles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  <div id="content">
 <div id="my-store-2909271">This store is powered by Ecwid - <a href="http://www.ecwid.com">Shopping Cart Software</a>. If you your browser does not support JavaScript, please proceed to its <a href="http://app.ecwid.com/jsp/2909271/catalog">simple HTML version</a>.</div><div>
<script type="text/javascript" src="http://app.ecwid.com/script.js?2909271" charset="utf-8"></script><script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(3,3) list(10) table(20)","categoryView=grid","searchView=list","id=my-store-2909271");</script>
</div>
 <div>
<script type="text/javascript" src="http://app.ecwid.com/script.js?2909271" charset="utf-8"></script>
<script type="text/javascript"> xCategories(); </script>
</div>
 <div>
<script type="text/javascript" src="http://app.ecwid.com/script.js?2909271" charset="utf-8"></script>
<script type="text/javascript"> xVCategories(); </script>
</div><div>
<script type="text/javascript" src="http://app.ecwid.com/script.js?2909271" charset="utf-8"></script>
<script type="text/javascript"> 
 
        </div><!--end content-->
<div>
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>