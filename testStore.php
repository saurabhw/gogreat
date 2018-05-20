<?php
	session_start();
        $group = $_GET['group'];
	ob_start();
	$where = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Cash Next Day!</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_homepageStyles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="images/favicon.ico">
<script>
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
var group = getUrlVars()["group"];
</script>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  
  <div id="content">
  <div id="my-store-2912226">This store is powered by Ecwid - <a href="http://www.ecwid.com">E-Commerce Software</a>. If you your browser does not support JavaScript, please proceed to its <a href="http://app.ecwid.com/jsp/2912226/catalog">simple HTML version</a>.</div><div>

<script type="text/javascript" src="http://app.ecwid.com/script.js?2912226" charset="utf-8"></script>
<script> 
xAffiliate(group); 
</script>
<script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(3 ,3) list(10) table(20)","categoryView=grid","searchView=list"," style=","id=my-store-2912226");</script>

    </div>
    <!--end column1-->
    
  <p id="actionID" style="background-color: #000; color: #fff;"></p>

  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>