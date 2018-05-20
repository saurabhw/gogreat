<?php 

?>

<head>
	
	<meta charset="UTF-8">
	 <!-- jQuery (required) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<!-- Optional plugins -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/swfobject.js"></script>
	
	<!-- Anything Slider -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/anythingslider.css">
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>
	
	<!-- Add the stylesheet(s) you are going to use here. -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">
	
	<!-- AnythingSlider optional extensions -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.3/themes/base/jquery-ui.css">
	<!--<link rel="stylesheet" href="../jquery-ui-1.7.2/css/base/ui.accordion.css">-->
	
	<script src="../js/js-image-slider.js" type="text/javascript"></script>
	<script src="../js/simpletabs_1.3.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	<!--google analytics-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88659906-1', 'auto');
  ga('send', 'pageview');

      </script>
	
	<!-- Latest compiled and minified CSS -->
	<!-- <link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
	
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js" type="text/javascript"></script>
	
	<script> $(document).ready(function(){ $("button").click(function(){ $("show").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button1").click(function(){ $("show1").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button2").click(function(){ $("show2").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button3").click(function(){ $("show3").toggle(); }); }); </script>
	<!--google analytics-->
	
	<script> //select-deselect all recipients in emails
		function setCheckboxes1(act) {
		  var e = document.getElementsByClassName('leaders');
		  var elts_cnt  = (typeof(e.length) != 'undefined') ? e.length : 0;
		  if (!elts_cnt) {
		    return;
		  }
		  for (var i = 0; i < elts_cnt; i++) {
		    e[i].checked = (act == 1 || act == 0) ? act : (e[i].checked ? 0 : 1);
		  }
		}
		function setCheckboxes2(act) {
		  var e = document.getElementsByClassName('members');
		  var elts_cnt  = (typeof(e.length) != 'undefined') ? e.length : 0;
		  if (!elts_cnt) {
		    return;
		  }
		  for (var i = 0; i < elts_cnt; i++) {
		    e[i].checked = (act == 1 || act == 0) ? act : (e[i].checked ? 0 : 1);
		  }
		}
		function setCheckboxes3(act) {
		  var e = document.getElementsByClassName('contacts');
		  var elts_cnt  = (typeof(e.length) != 'undefined') ? e.length : 0;
		  if (!elts_cnt) {
		    return;
		  }
		  for (var i = 0; i < elts_cnt; i++) {
		    e[i].checked = (act == 1 || act == 0) ? act : (e[i].checked ? 0 : 1);
		  }
		}
	</script>
	
	<script type="text/javascript">
	     	// Form validation code will come here.
	      	function validate() {  
			if( document.myForm.fname.value == "" ) {
	            		document.getElementById("fname").style.border="3px solid red";
	            		document.myForm.fname.focus() ;
	            		return false;
	         	} 
	         	else {
				 document.getElementById("fname").style.border="1px solid black";
			}
	         
	          	if( document.myForm.lname.value == "" ) {
	            		document.getElementById("lname").style.border="3px solid red";
	            		document.myForm.lname.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("lname").style.border="1px solid black";
			}
	             /*
	          	if( document.myForm.address1.value == "" ) {
	            		document.getElementById("address1").style.border="3px solid red";
	            		document.myForm.address1.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("address1").style.border="1px solid black";
			}
			 
	         	if( document.myForm.city.value == "" ) {
	            		document.getElementById("city").style.border="3px solid red";
	            		document.myForm.state.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("city").style.border="1px solid black";
			}
			 
	         	if( document.myForm.state.value == "" ) {
	            		document.getElementById("state").style.border="3px solid red";
	            		document.myForm.state.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("state").style.border="1px solid black";
			}
			 
	         	if( document.myForm.zip.value == "" ) {
	            		document.getElementById("zip").style.border="3px solid red";
	            		document.myForm.zip.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("zip").style.border="1px solid black";
			}
	         */
	         	if( document.myForm.email.value == "" ) {
	            		document.getElementById("email").style.border="3px solid red";
	            		document.myForm.email.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("email").style.border="1px solid black";
			}
	         /*
	         	if( document.myForm.zip.value == "" ||
	         	isNaN( document.myForm.zip.value ) ||
	         	document.myForm.Zip.value.length != 5 ) {
	            		document.getElementById("zip").style.border="3px solid red";
	            		document.myForm.zip.focus() ;
	            		return false;
	        	}
	        	else {
				document.getElementById("zip").style.border="1px solid black";
			}
	         
	         	if( document.myForm.Country.value == "-1" ) {
	            		document.getElementById("Country").style.border="3px solid red";
	            		return false;
	         	}
	         	else {
				document.getElementById("Country").style.border="1px solid black";
			}
			 
			if(document.myForm.password == "" ||
			document.myForm.cpassword == "" ||
			document.myForm.password != document.myForm.cpassword ) {
				document.getElementById("password").style.border="3px solid red";
				document.getElementById("cpassword").style.border="3px solid red";
	           		document.myForm.password.focus() ;
	           		return false;
			}
			else {
			 	document.getElementById("password").style.border="1px solid black";
			 	document.getElementById("cpassword").style.border="1px solid black";
			}
			 
			if(document.myForm.vpid == "Select VP Account") {
				document.getElementById("vpid").style.border="3px solid red";
	            		document.myForm.vpid.focus();
	            		return false;
			}
			else {
				document.getElementById("vpid").style.border="1px solid black";
			}
	         
			//return( true );
			 
			if(document.myForm.description == "") {
				document.getElementById("description").style.border="3px solid red";
	            		document.myForm.description.focus();
	            		return false;
			}
			else {
				document.getElementById("description").style.border="1px solid black";
			}
	         
			// return( true );
			
			/*if(document.myForm.phone == "") {
				document.getElementById("phone").style.border="3px solid red";
	            		document.myForm.vpid.focus();
	            		return false;
			}
			else {
				document.getElementById("phone").style.border="1px solid black";
			}
			*/
		}
	</script>
	<script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script>
	jQuery(function($){
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        $("#phone").mask("999-999-9999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
});
	</script>
	<script>
        $( function() {
        $( "#accordion" ).accordion({
        header: "h4",
        heightStyle: "Content",
        collapsible: true,
        active: 0,
        autoHeight: true   
    });
  } );
  </script>
	<script type="text/javascript">
		function validate(form) {
			var pass1 = form['loginPass'].value;
			var pass2 = form['confirmPass'].value;
			if (pass1 == "" || pass1 == null) {
				alert("please enter a valid password");
				return false;
			}
			if (pass1 != pass2) {
				alert("passwords do not match");
				return false;
			}
			return true;
		}
		
		$(function() {
			$("#datepicker").datepicker();
		});
		 
		function validateAddNewContact() {
			var firstname = document.forms["addnewcontact"]["firstname"].value;
			if (firstname == null || firstname == "") {
				alert("First name must be filled in.");
				return false;
			}
	
			var lastname = document.forms["addnewcontact"]["lastname"].value;
			if (lastname == null || lastname == "") {
				alert("Last name must be filled in.");
				return false;
			}
	
			var email = document.forms["addnewcontact"]["email"].value;
			var at = email.indexOf("@");
			var dot = email.lastIndexOf(".");
			if (at < 1 || dot < at + 2 || dot + 2 >= email.length) {
				alert("Not a valid e-mail address.");
				return false;
			}
		}
		
		function update_customerLoading() {
			document.getElementById('loadingMessage').style.display = 'block';
			document.getElementById('loadingOver').style.display = 'block';
		}
	</script>
	
	
	<script>
		function fetch_select4(val) {
		   	$.ajax({
		     		type: 'post',
		     		url: 'sortReport.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("goalreport").innerHTML=response; 
		     		}
		   	});
		  }
	</script> 
	
	
	<script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
	</script>
</head>

<div id="container">
  <div id="headerMain">
  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  		<img id="banner" src="../<?php echo $bb;?>" width="1024" height="150" alt="banner placeholder" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
	<ul class="nav">
	     <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
	        <?php include 'menu_women.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
	        <?php include 'menu_accessories.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
	        <?php include 'menu_men.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
	        <?php include 'menu_juniors.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
	        <?php include 'menu_kids.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
	        <?php include 'menu_fitness.php'; ?>
	    </li>
	   <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
	        <?php include 'menu_food.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
	        <?php include 'menu_entertainment.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
	        <?php include 'menu_housewares.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
	        <?php include 'menu_health.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
	        <?php include 'menu_inspirational.php'; ?>
	    </li>
	    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
	        <?php include 'menu_holiday.php'; ?>
	    </li>
	    <li class="rtborder"><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
	        <?php include 'menu_business.php'; ?>
	    </li>
	   
	   	<span class="examplesDropdown">Fundraiser Examples</span>
		<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'menu_education_examples.php'; ?></li>
		<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'menu_organization_examples.php'; ?></li>
	   
	    <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign In</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" class="newloginform" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>';
		                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in">';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	echo '<span><a href="memberLogin.php" title="Choose a Different Group Account">Login Home</a></span>';
		                echo '<span><a href="memberHome.php">Account Home</a></span>';
		         	echo '<span><a href="../reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
 
      		</div> <!--end login-->
    	</li>
</ul>
</div> <!--end headerMain-->  