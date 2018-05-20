<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Fundraiser Search</title>
	<style>
	    <style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #d43f3a;
    color: #fff;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
	</style>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
<!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
  <div class="container">
      <br>
      <div id="border">
<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
	<h2 align="center">Find a Fundraiser</h2>	
		<!-- Search box. -->
   <p align="center">
   <input type="text" id="search" name="search" placeholder="Organization Name" />
 </p> 
   
  <!-- Suggestions will be displayed in below div. -->
   <br>
   <div id="display">
        </div>
	<!--end column2--> 
  </div>  <!--end content-->  
</div><!--end container-->
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>