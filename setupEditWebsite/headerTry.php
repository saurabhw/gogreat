<?php

 
//   if(!isset($_SESSION['authenticated']))
//       {
//             header('Location: ../index.php');
//             exit;
//       }
     
    
//       $user = $_SESSION['userId'];
//       $userName = $_SESSION['email'];
//       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
//       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
//       $row1 = mysqli_fetch_assoc($result1);
//       $dealerID = $row1['loginid'];
//       $group = $row1['setuppersonid']; 
//       $banner = $row1['banner_path'];  
       
?>

<head>
 <meta charset="UTF-8">
  <meta name="wot-verification" content="afd275378407e34df6ec"/> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.rel='stylesheet'" crossorigin="anonymous"> <!-- asynch css load -->
  <noscript> <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript> <!-- load styles for browsers with JS disabled -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="preload" href="../css/global_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/global_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- bootstrap file, avoid editing if possible, find the classes you need and then override them in global styles -->
  
  <link rel="preload" href="../css/bootstrap.css"  as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/bootstrap.css"></noscript><!-- load styles for browsers with JS disabled -->
  
    
  <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link  rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <link rel="preload" href="../css/content_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><linkrel="stylesheet" href="../css/content_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <!-- top navigation styles -->
  <link rel="preload" href="../css/main_nav.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/main_nav.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  		<!-- jQuery (required) before bootstrap JS -->
  		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		    
	<!--<link rel="stylesheet" href="../jquery-ui-1.7.2/css/base/ui.accordion.css">-->
	
	<!--<script src="../js/js-image-slider.js" type="text/javascript"></script>-->
    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="../js/simpletabs_1.3.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>


  <!-- function for loading basic content for browser with JS disabled -->
	<script>
	/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
	!function(a){"use strict";var b=function(b,c,d){function e(a){return h.body?a():void setTimeout(function(){e(a)})}function f(){i.addEventListener&&i.removeEventListener("load",f),i.media=d||"all"}var g,h=a.document,i=h.createElement("link");if(c)g=c;else{var j=(h.body||h.getElementsByTagName("head")[0]).childNodes;g=j[j.length-1]}var k=h.styleSheets;i.rel="stylesheet",i.href=b,i.media="only x",e(function(){g.parentNode.insertBefore(i,c?g:g.nextSibling)});var l=function(a){for(var b=i.href,c=k.length;c--;)if(k[c].href===b)return a();setTimeout(function(){l(a)})};return i.addEventListener&&i.addEventListener("load",f),i.onloadcssdefined=l,l(f),i};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
	/*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
	!function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(b){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
	</script>
	

	
	<!--google analytics-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88659906-1', 'auto');
  ga('send', 'pageview');

      </script>