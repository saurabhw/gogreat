<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Greatmoods</title>

    <!-- Bootstrap core CSS -->    
    <link href="css/bootstrap.css" rel="stylesheet">
    
    

    <!-- Custom styles for this template -->
	<link href="css/doc.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="css/jPushMenu.css" /> 
</head>
<body>
	<div class="wrapper" id="top">


<footer class="footer_sec">
	<div class="back_btn"><a href="#top" class="scroll"><img src="images/newimages/imagesback_top.png" alt="" /></a></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="footer_left">
					<a href="#"><img src="images/newimages/logo.png" alt="" /></a>
				</div>
				<div class="footer_rt">
					<ul class="ftr_list">
						<li><a href="#">Supported housing</a></li>
						<li><a href="#">Privacy Statement</a></li>
						<li><a href="#">Terms of use</a></li>
					</ul>
					<p>2011 <a href="#">Greatmoods.com,</a> LLC.</p>
				</div>
			</div>
		</div>
	</div>
</footer>

</div>
<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
 <script>
  $('.carousel').carousel({
   interval: 6000,
   pause: "false"
  });
 </script>
 
<script type="text/javascript">
$(document).ready(function(){
$('#open1').click(function(){
$('#hide1').slideToggle();
});

$('#open2').click(function(){
$('#hide2').slideToggle();
});
});
</script> 
<script src="js/tab.js"></script> 

<script>
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 30) {
        $(".header_sec").addClass("fixed");
    } else {
        $(".header_sec").removeClass("fixed");
    }
});
</script> 


<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			
			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});


		});
	</script>
<script src="js/jPushMenu.js"></script>

<!--call jPushMenu, required-->
<script>
jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});
</script>


	<script>
	$(function() {
	  $('a.scroll[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	</script>
</body>
</html>
