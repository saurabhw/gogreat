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
  
  <link rel="preload" href="../css2/global_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/global_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- bootstrap file, avoid editing if possible, find the classes you need and then override them in global styles -->
  
  <link rel="preload" href="../css2/bootstrap.css"  as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/bootstrap.css"></noscript><!-- load styles for browsers with JS disabled -->
  
   
  <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link  rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <link rel="preload" href="../css2/content_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><linkrel="stylesheet" href="../css2/content_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <!-- top navigation styles -->
  <link rel="preload" href="../css2/main_nav.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/main_nav.css"></noscript><!-- load styles for browsers with JS disabled -->
  
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
	<script>
		jQuery(function($){
	        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	        $("#phone").mask("999-999-9999");
	        $("#tin").mask("99-9999999");
	        $("#ssn").mask("999-99-9999");
	});
	</script>
	
	<script type="text/javascript">

      function checkForm(form)
      {
     
    
        if(form.pass1.value != "" && form.pass1.value == form.pass2.value) {
          if(form.pass1.value.length < 6) {
            //alert("Error: Password must contain at least six characters!");
            document.getElementById("error").innerHTML = "Error: Password must contain at least six characters!";
            form.pass1.focus();
            return false;
          }
          if(form.pass1.value == form.email.value) {
            //alert("Error: Password must be different from Username!");
            document.getElementById("error").innerHTML = "Error: Password must be different from email address!";
            form.pass1.focus();
            return false;
          }
          re = /[0-9]/;
          if(!re.test(form.pass1.value)) {
            //alert("Error: password must contain at least one number (0-9)!");
            document.getElementById("error").innerHTML = "Error: password must contain at least one number (0-9)!";
            form.pass1.focus();
            return false;
          }
          re = /[a-z]/;
          if(!re.test(form.pass1.value)) {
            //alert("Error: password must contain at least one lowercase letter (a-z)!");
            document.getElementById("error").innerHTML = "Error: password must contain at least one lowercase letter (a-z)!";
            form.pass1.focus();
            return false;
          }
          re = /[A-Z]/;
          if(!re.test(form.pass1.value)) {
            //alert("Error: password must contain at least one uppercase letter (A-Z)!");
            document.getElementById("error").innerHTML = "Error: password must contain at least one uppercase letter (A-Z)!";
            form.pass1.focus();
            return false;
          }
        } else {
          //alert("Error: Please check that you've entered and confirmed your password!");
          document.getElementById("error").innerHTML = "Error: Please check that you've entered and confirmed your password!";
          form.pass1.focus();
          return false;
        }
    
        //alert("You entered a valid password: " + form.pass1.value);
        return true;
      }
    
    </script>
    <script>
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        
        if(pass1.value == pass2.value){
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        }
    }  
    </script>
    
	<script>
		function fetch_select(val) {
			$.ajax({
		     		type: 'post',
		     		url: 'fetch_contact_datax.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("contacts").innerHTML=response; 
		     		}
		   	});
		}
		
		function fetch_select2(val) {
			$.ajax({
		     		type: 'post',
		     		url: 'fetch_contact_datax.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("contacts").innerHTML=response; 
		     		}
		   	});
		   	
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_contact_data.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("logdropdown").innerHTML=response;
		       			var mem = document.getElementById("memid").value;
		       			 document.getElementById("memberid").value = mem;    
		     		}
		   	});
		}
	</script>
	
	<script>
	function fetch_select3(val) {
			$.ajax({
		     		type: 'post',
		     		url: 'sortMembers.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("fm_accts").innerHTML=response; 
		     		}
		   	});
		   	
		}
		
		function fetch_select4(val) {	
			$.ajax({
		     		type: 'post',
		     		url: 'sortMembers.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("fm_accts").innerHTML=response; 
		     		}
		   	});
		   	
		}
		
		function fetch_select6(val) {
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
	function fetch_select5(val) {
			$.ajax({
		     		type: 'post',
		     		url: 'getMemberSales.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("membersales").innerHTML=response; 
		     		}
		   	});
		}
	</script>
	
	<script>
		function fetch_select7(val) {
		
		   	var member = document.getElementById("member").value;
			$.ajax({
		     		type: 'post',
		     		url: 'sortMemberSales.php',
		     		data: {
		       			get_option:val, get_option2:member
		     		},
		     		success: function (response) {
		       			document.getElementById("membersales").innerHTML=response; 
		     		}
		   	});
		}
	</script>
		
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
		
	<script>
	     	// Form validation code will come here.
	      	function validate() { 
	      	          
                        var e = document.getElementById("memberid");
                        var strUser = e.options[e.selectedIndex].value;

                       var strUser1 = e.options[e.selectedIndex].text;
                       if(strUser==0)
                       {  document.getElementById("memberid").style.border="3px solid red";
	            	  document.myForm.memberid.focus() ;
                          alert("Please select a member");
                        } 
	      	     
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
	            		document.myForm.city.focus() ;
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
	         
	        */
			 
			if(document.myForm.password.value == "" ||
			document.myForm.cpassword.value == "" ||
			document.myForm.password.value != document.myForm.cpassword.value ) {
				document.getElementById("password").style.border="3px solid red";
				document.getElementById("cpassword").style.border="3px solid red";
	           		document.myForm.password.focus() ;
	           		return false;
			}
			else {
			 	document.getElementById("password").style.border="1px solid black";
			 	document.getElementById("cpassword").style.border="1px solid black";
			}
			 
			if(document.myForm.vpid.value == "Select VP Account") {
				document.getElementById("vpid").style.border="3px solid red";
	            		document.myForm.vpid.focus();
	            		return false;
			}
			else {
				document.getElementById("vpid").style.border="1px solid black";
			}
	         
			//return( true );
			 
			if(document.myForm.description.value == "") {
				document.getElementById("description").style.border="3px solid red";
	            		document.myForm.description.focus();
	            		return false;
			}
			else {
				document.getElementById("description").style.border="1px solid black";
			}
	         
			// return( true );
			
			if(document.myForm.phone.value == "") {
				document.getElementById("phone").style.border="3px solid red";
	            		document.myForm.vpid.focus();
	            		return false;
			}
			else {
				document.getElementById("phone").style.border="1px solid black";
			}
			   if(document.myForm.leader.value == "None") {
				document.getElementById("leader").style.border="3px solid red";
	            		document.myForm.leader.focus();
	            		return false;
			}
			else {
				document.getElementById("leader").style.border="1px solid black";
			}
			if(document.myForm.cname.value == "") {
				document.getElementById("cname").style.border="3px solid red";
	            		document.myForm.cname.focus();
	            		return false;
			}
			else {
				document.getElementById("cname").style.border="1px solid black";
			}
			
			var card = document.getElementById("memberid")[0].value;
                       if (card.value == 'None')
                        {
                           alert("Please select a card type");
                        }
                        
                        var member = document.getElementById("memberid").selectedIndex;
                        //var selectedValue = memberid.options[memberid.selectedIndex].value;

                        if (member == 0) {
                        alert("Please pick member");
                        
                        }
                        
                        var e = document.getElementById("memberid");
                        var strUser = e.options[e.selectedIndex].value;

                       var strUser1 = e.options[e.selectedIndex].text;
                       if(strUser==0)
                       {
                          alert("Please select a user");
                        }
                        
                        var le = document.getElementById("leader");
                        var strUser13 = le.options[le.selectedIndex].value;

                       var strUser15 = le.options[le.selectedIndex].text;
                       if(strUser13==0)
                       {
                          alert("Please select a user");
                        }
                        
                       
		}
	</script>
	<script>
	function getParameterByName(name) {
         name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
         var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
             results = regex.exec(location.search);
         return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
       }
        function checkCookies() {
        //var sent = GetURLParameter('cs');
        var sent = getParameterByName('cs');
         if(sent == 1)
         {
           
           document.getElementById("emessage").innerHTML="email sent";
           $("#emessage").html("Email(s) Sent").fadeIn(5000).fadeOut(5000);

         }
        }
       </script>
	<script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var le = $("#leader");
            var ty = $("#logdropdown1");
            if (le.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Please select a Sender!");
                document.getElementById("leader").focus();
                document.getElementById("leader").style.border="3px solid red";
                return false;
            }
            if (ty.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Please select an email type!");
                document.getElementById("logdropdown1").focus();
                document.getElementById("logdropdown1").style.border="3px solid red";
                return false;
            }
            return true;
	    });
	});
	</script>

    <script> 
        $(document).ready(function(){               //prevent main sidenav from collpasing upon click, and allows toggle for mobile users 
            $('li.dropdown a').on("click", function(){
              $(this).parent().toggleClass('open');
              });
          
            $('body.canvas-slid').on('click', function (e) {      
                if (!$('li.dropdown').is(e.target) && $('li.dropdown').has(e.target).length === 0 && $('.open').has(e.target).length === 0)  {
                    $('li.dropdown').removeClass('open');
                }
            e.stopPropagation();
            e.preventDefault();
            });
          
            $('#accountIcon, #accountIconMobile').click(function () {
                $('login-modal').modal({
                    show: true
                })
            });
            
            $(document).on('show.bs.modal', '.modal', function (event) {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);
            });    $('[data-toggle="tooltip"]').tooltip(); 

        });
    </script>
  
    <script>/* remove containers so dropdowns placement and hovering are consistant inside sidenavigation */
        $(function () {
            $(window).on('load, resize', function () {
                var viewportWidth = $(window).width();
                if (viewportWidth < 1183) {
                    $(".dropdown-menu #dropdownrow-large").removeClass("container");
                     $(".dropdown-menu #dropdownrow").removeClass("container").removeClass("container-fluid");
                }else{
                    $(".dropdown-menu #dropdownrow-large").addClass("container"),
                    $(".dropdown-menu #dropdownrow").addClass("container").addClass("container-fluid");
                }
            }).resize();
        });
    </script>
</head>

<header>
    <!-- elements above navbar -->
    <div class ="container-fluid">
       <div class="row-fluid" id="aboveNavElements">
          <a href="#" class="hidden-lg hidden-md pull-right" id="accountIcon" role="button" data-toggle="modal" data-target="#login-modal"><i data-toggle="tooltip" data-placement="left" title="Account Information" class="fa fa-user fa-3x" aria-hidden="true"></i></a>

          <div id="headerImage" class="col-lg-3 col-lg-offset-0 col-md-1 col-sm-1">
              <a href="../index.php"><img src="../newdeal/images/logo.png" alt="GMlogo" class="img-responsive"></a>
          </div>

          <div id="bannerHeader" class="col-lg-7 col-lg-push-1 col-md-7 col-xs-12">
                <img class="img-responsive" src="../<?php echo $banner_path;?>" width="" height="" alt="Account Banner Image" />
          </div>    
          
          <a href="#"  id="accountIcon" class="pull-right  hidden-sm hidden-xs" role="button" data-toggle="modal" data-target="#login-modal"><i data-toggle="tooltip" data-placement="left" title="Account Information" class="fa fa-user fa-4x" aria-hidden="true" style="text-indent: 5px;"></i>Account</a>
      </div>
      
   </div>
  
      
  

  <nav class="navbar navbar-default" role="navigation"> <!-- start default nav -->
      <div class="navbar-header container-fluid ">
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
    <div class ="container-fluid">
      <div class="collapse navbar-collapse"> 
        <ul class="nav navbar-nav" id="navCats"  id="mainCategoryType"> <!-- navbar list items -->


        <li class="dropdown">
            <a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Women<span class="sr-only"></span></a>
            <?php include 'menu/menu_women.php'; ?>
         </li> <!-- end nav dropdown for multi columns -->
          
         <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Accessories <span class="sr-only"></span></a>
              <?php include 'menu/menu_accessories.php'; ?>
         </li>

          <li class="dropdown"  id="mainCategoryType">
            <a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Men <span class="sr-only"></span></a>
            <?php include 'menu/menu_men.php'; ?>
          </li> 
          
          <li class="dropdown"  id="mainCategoryType">
            <a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Juniors <span class="sr-only"></span></a>
            <?php include 'menu/menu_juniors.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Kids <span class="sr-only"></span></a>
              <?php include 'menu/menu_kids.php'; ?>
          </li>  
          <li class="dropdown"  id="mainCategoryType">
            <a "greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Fitness <span class="sr-only"></span> </a>
            <?php include 'menu/menu_fitness.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Food <span class="sr-only"></span> </a>
             <?php include 'menu/menu_food.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Entertainment<span class="sr-only"></span> </a>
             <?php include 'menu/menu_entertainment.php'; ?>
          </li>  

          <li class="dropdown" id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only"></span></a>
            <?php include 'menu/menu_housewares.php'; ?>
          </li>         

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Health<span class="sr-only"></span> </a>
            <?php include 'menu/menu_health.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Inspirational<span class="sr-only"></span> </a>
            <?php include 'menu/menu_inspirational.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Holiday<span class="sr-only"></span> </a>
              <?php include 'menu/menu_holiday.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Business<span class="sr-only"></span> </a>
                <?php include 'menu/menu_business.php'; ?>
          </li>
          <!--<li class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid white !important"></li>-->

          <!-- fundraiser examples main navigation start -->
          <li id="fund-border" class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid transparent !important"></li>
          <span id="navbar-examples-wrap">
            <li id="navbar-examples-title">Fundraiser Examples</li>
              <li id="fund-example-item" class="dropdown">
                <a id="school-drop-link" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Schools<span class="sr-only"></span></a>
                   <ul class="dropdown-menu example-list-edu" >
                    <?php include 'menu/menu_education_examples.php'; ?>
                  </ul>
              </li>
            <span class="fund-divider"></span>
            <li id="fund-example-item" class="dropdown">
              <a id="orgs-drop-link" href="#"  class="dropdown-toggle"  role="button" id="mainCategoryType">Organizations<span class="sr-only"></span></a>
                              <ul class="dropdown-menu example-list-org">
                  <?php include 'menu/menu_organization_examples.php'; ?>
                </ul>
            </li>
          </span>
          <li id="fund-border" class="divider-vertical" style="border-right: 1px solid transparent !important;border-left: 1px solid white !important"></li>

        <!--<li id="login-button" role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Login</a></li>-->
      </div> <!-- end navbar collapse -->
    </div><!-- end container -->
  </nav> <!-- end nav -->

    <!-- Code for navbar collapse to SIDEBAR on MOBILE screens -->
  <div class="navmenu navmenu-default navmenu-fixed-left offcanvas" >                
    <ul class="nav navmenu-nav">
      <!--<span role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true">Login</span>-->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle " role="button" aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Women <span class="sr-only"></span></a>
          <?php include 'menu/menu_women.php'; ?>
      </li> <!-- end nav dropdown for multi columns -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Accessories <span class="sr-only"></span></a>
            <?php include 'menu/menu_accessories.php'; ?>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Men <span class="sr-only"></span></a>
            <?php include 'menu/menu_men.php'; ?>
      </li> 
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Juniors <span class="sr-only"></span></a>
            <?php include 'menu/menu_juniors.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Kids <span class="sr-only"></span> </a>
        <?php include 'menu/menu_kids.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Fitness <span class="sr-only"></span> </a>             
          <?php include 'menu/menu_fitness.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Food <span class="sr-only"></span></a>
          <?php include 'menu/menu_food.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Entertainment <span class="sr-only"></span></a>
         <?php include 'menu/menu_entertainment.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Home <span class="sr-only"></span></a>
            <?php include 'menu/menu_housewares.php'; ?>
      </li>         
        <li class="dropdown" id="fundraiserExamples">
          <a href="#"  class="dropdown-toggle" role="button" id="mainCategoryType">School Examples <span class="sr-only"></span></a>
            <ul class="dropdown-menu">
              <?php include 'menu/menu_education_examples.php'; ?>
            </ul>
          </li>
          <li class="dropdown" id="fundraiserExamples">
            <a href="#" class="dropdown-toggle" role="button" id="mainCategoryType">Organization Examples <span class="sr-only"></span></a>
            <ul class="dropdown-menu">
              <?php include 'menu/menu_organization_examples.php'; ?>
            </ul>
          </li>
        <li class="divider"></li>
      </ul> <!-- end navmenu -->
    </div> <!--end side nav -->




  <!-- ACCOUNT MODAL -->    
    <!-- START MODAL LOGIN -  pops v up box for login -->
      <div class="modal fade" id="login-modal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" align="center">
              <img class="img-rounded" id="img_logo" src="../images/GMlogo.png">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
              </button>
            </div>
        		<div id="loginSession">
        		<!-- form for login info and verifying session/user -->
              <?php
                  if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                      echo '<form id="loginform" action="../logInUser.php" method="POST">';
                      echo '<div class="modal-body">';
                      echo '<input class="form-control" id="loginemail" type="text" name="email" value="" placeholder="Email" required>';
                      echo '<input id="loginpassword" class="form-control" "loginpassword" type="password" name="password" value="" placeholder="Password" required>';
                    //   echo '<div class="checkbox"><label><input type="checkbox"> Remember me</label></div>';
                      echo '</div>'; /*modal body end */
                      echo '<div class="modal-footer">';
                      echo '<div><button class="btn btn-success btn-lg btn-block" id="login_btn" name="submit" type="submit" value="login">Login</button></div>';
                       echo '<a href="recover.php"><input class="btn btn-link" name="passrec" type="button" value="Forgot Password" /></a></div>';
                      echo '</div>'; /* end modal footer */
                     /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
                      echo '</form>';
                  }
                   elseif ($_SESSION['LOGIN'] == "TRUE") {
                            echo '<div class="modal-body">';
                                echo '<div class="mallmenu">';
                	            echo '<h4><a href="../index.php">GreatMoods Homepage</a></h4>';
                	         	echo '<h4><a href="'.$_SESSION['home'].'"/>Account Home</a></h4>'; //role specific homepage link, not using session info unlike main folder header.inc 
                	       //  	echo '<h4><a href="#change-pw" id="change-pw-btn" data-toggle="modal">Change Password </a></h4>'; DOES NOT PROPERLY SAVE NEW PW'S
                	       		echo '<h4><a href="../reset.php">Change My Password</a></h4>';
                	         	echo '</div>'; /*modal body end */
                	         	echo '<div class="modal-footer">';
    			         	    include('logout.inc.php');
    			         	    echo '</div>'; /*modal body end */
                    } 
               ?>
              </div>
          </div>    <!-- end modal content -->   
        </div> <!-- end modal-dialogue -->
      </div> <!-- END MODAL LOGIN -->
        
</header>