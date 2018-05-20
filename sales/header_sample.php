<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>

<head>
	<meta charset="UTF-8">
	<meta name="wot-verification" content="afd275378407e34df6ec"/>
	
<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<!--<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">-->
	
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
	
	<script src="../js/simpletabs_1.3.js"></script>
	
	
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/ui/jquery.multiselect.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery.multiselect.js"></script>
	<!--google analytics-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88659906-1', 'auto');
  ga('send', 'pageview');

      </script>
	<script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script>
	jQuery(function($){
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        $("#phone").mask("999-999-9999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#ftin1").mask("99-9999999");
        $("#ssn1").mask("999-99-9999");
});
	</script>
	
	<script> $(document).ready(function(){ $("button").click(function(){ $("show").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button1").click(function(){ $("show1").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button2").click(function(){ $("show2").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button3").click(function(){ $("show3").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button4").click(function(){ $("show4").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button5").click(function(){ $("show5").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button6").click(function(){ $("show6").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button7").click(function(){ $("show7").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button8").click(function(){ $("show8").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button9").click(function(){ $("show9").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button10").click(function(){ $("show10").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button11").click(function(){ $("show11").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button12").click(function(){ $("show12").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button13").click(function(){ $("show13").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button14").click(function(){ $("show14").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button15").click(function(){ $("show15").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button16").click(function(){ $("show16").toggle(); }); }); </script>
	
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
        function ValidateRadios() {
         var radios = document.getElementsByName('fundtype')

         for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
        //alert("Selected Value = " + radios[i].value);
        return true; // checked
    }
    //return false;
    };

    // not checked, show error
    document.getElementById('ValidationError').innerHTML = 'Error! You must select one group.';
    return false;
     }
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
        function ValidateRadios2() {
         var radios = document.getElementsByName('clubs[]')

         for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
        //alert("Selected Value = " + radios[i].value);
        return true; // checked
    }
    };

    // not checked, show error
    document.getElementById('ValidationError').innerHTML = 'Error! You must select one group.';
    return false;
     }
</script>
	
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N7BS27"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N7BS27');</script>
	<!-- End Google Tag Manager -->
	
	<script>
		function getSelectedValue() { 
	 		var val = document.getElementById("fundraisingType").value;
	 		//alert("You selected : " + val);
         		document.getElementById("choice").value = val;
        	} 
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
		function showUser(str) {
			if (str=="") {
	  			document.getElementById("txtHint").innerHTML="";
	  			//var z = $(this).find(':selected').data('year');
	  			return;
	  		} 
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	  			xmlhttp=new XMLHttpRequest();
	  		}
			else {// code for IE6, IE5
	  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  		}
			xmlhttp.onreadystatechange=function() {
	  			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    			}
	  		}
	  		var div = str.split(/,/);
	  		var name = div[0];
                        var z = div[1];
			xmlhttp.open("GET","getclub.php?q="+name+"&z="+z,true);
			xmlhttp.send();
		}
	</script>
	
	<script>
		function showUser2(str) {
			if (str=="") {
	  			document.getElementById("clubs").innerHTML="";
	  			//var z = $(this).find(':selected').data('year');
	  			return;
	  		} 
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	  			xmlhttp=new XMLHttpRequest();
	  		}
			else {// code for IE6, IE5
	  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  		}
			xmlhttp.onreadystatechange=function() {
	  			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    				document.getElementById("clubs").innerHTML=xmlhttp.responseText;
	    			}
	  		}
	  		var div = str.split(/,/);
	  		var name = div[0];
                        var z = div[1];
                        var x = div[2];
                        var y = div[3];
                        var u = div[4];
			xmlhttp.open("GET","getClub2.php?q="+name+"&x="+x+"&z="+z+"&y="+y+"&u="+u,true);
			xmlhttp.send();
		}
	</script>
	<script>
	function atleast_onecheckbox(e) {
	var other = document.getElementById("clubs1");
	var gen = document.getElementById("general1");
	var ath = document.getElementById("athletics1");
	var error = document.getElementById("error");
        if ($("input[type=checkbox]:checked").length === 0) {
        if(myForm.clubs1.value == "")
        {  
             e.preventDefault();
             document.getElementById("error").innerHTML="You must select a checkbox or fill in club name.";
             return false;
        }
       }
       return true; 
      }
      </script>
     
	<script>
		function toggle(source) {
	  		checkboxes = document.getElementsByName('clubs[]');
	  		for(var i in checkboxes)
	  		checkboxes[i].checked = source.checked;
	  		
	  		checkboxes1 = document.getElementsByName('general[]');
	  		for(var e in checkboxes1)
	  		checkboxes1[e].checked = source.checked;
	  		
	  		checkboxes2 = document.getElementsByName('athletics[]');
	  		for(var f in checkboxes2)
	  		checkboxes2[f].checked = source.checked;
	  		
		}
		
		
		$(document).ready(function(){
	  		$('input[name="all"],input[name="clubs[]"]').bind('click', function(){
	  			var status = $(this).is(':checked');
	  			$('input[type="checkbox"]', $(this).parent('li')).attr('checked', status);
	  		});
	  		});
	  		
	  		
	</script>
	
	<script>
		function toggle2(source) {
	  		checkboxes = document.getElementsByName('recipents[]');
	  		for(var i in checkboxes)
	  		checkboxes[i].checked = source.checked;
		}
		
		$(document).ready(function(){
	  		$('input[name="all"],input[name="recipents[]"]').bind('click', function(){
	  			var status = $(this).is(':checked');
	  			$('input[type="checkbox"]', $(this).parent('li')).attr('checked', status);
	  		});
	  	});
	</script>
	
	<script>
	$(document).ready(function () {
		$("#makeMeScrollable").smoothDivScroll({
			mousewheelScrolling: "allDirections",
			manualContinuousScrolling: true,
			autoScrollingMode: "onStart"
		});
	});
</script>
	
	<script>
		$(document).ready(function() {
			$(“.nav li:has(ul)”).hover(function(){
				$(this).find(“ul”).slideDown();
			}, function(){
				$(this).find(“ul”).hide();
			});
		});
	</script>
	
	<script>
		$(document).ready(function(){
	  		$("button1").click(function(){
	    			$("show").toggle();
	  		});
		});
	</script>
	
	<script>
		$(document).ready(function(){
	  		$("button2").click(function(){
	    			$("show2").toggle();
	  		});
		});
	</script>
	
	<script>
		var LHtotal;
		var AHtotal;
		var LMtotal;
		var AMtotal;
		var schoolTotal;
		var churchTotal;
		var grandTotal1;
		function calculateSchool(orgType) {
		        //large high schools
		        var num = Number(document.getElementById("LHnum").value);
			var fund = Number(document.getElementById("LHfund").value);
			var people = Number(document.getElementById("LHpeople").value);
			var percent = (Number(document.getElementById("LHpercent").value))/100;
			var active = people * percent;
			active = Number(active);
			//document.getElementById("LHactive").innerHTML = active;
			var baskets = Number(document.getElementById("LHbaskets").value);
			var numPerYear = Number(document.getElementById("LHnumPerYear").value);
			var price = 26.00;
			var commission = 0.08;
			var total1 = fund * active * baskets * numPerYear * price * commission * num;
			var result1 = format(total1,2);
			grandTotal1 = result1;
			schoolTotal = result1;
			document.getElementById("LHtotal").innerHTML = result1;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average high schools
			var num2 = Number(document.getElementById("AHnum").value);
			var fund2 = Number(document.getElementById("AHfund").value);
			var people2 = Number(document.getElementById("AHpeople").value);
			var percent2 = (Number(document.getElementById("AHpercent").value))/100;
			var active2 = people2 * percent2;
			active2 = Number(active2);
			//document.getElementById("AHactive").innerHTML = active2;
			var baskets2 = Number(document.getElementById("AHbaskets").value);
			var numPerYear2 = Number(document.getElementById("AHnumPerYear").value);
			var total2 = fund2 * active2 * baskets2 * numPerYear2 * price * commission * num2;
			var result2 =  format(total2,2);
			document.getElementById("AHtotal").innerHTML = result2;
			grandTotal1 += result2;
			schoolTotal += result2;
			schoolTotal = format(schoolTotal,2);
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//large middle schools
			var num3 = Number(document.getElementById("LMnum").value);
			var fund = Number(document.getElementById("LMfund").value);
			var fund3 = Number(document.getElementById("LMfund").value);
			var people3 = Number(document.getElementById("LMpeople").value);
			var percent3 = (Number(document.getElementById("LMpercent").value))/100;
			var active3 = people3 * percent3;
			active3 = Number(active3);
			//document.getElementById("LMactive").innerHTML = active3;
			var baskets3 = Number(document.getElementById("LMbaskets").value);
			var numPerYear3 = Number(document.getElementById("LMnumPerYear").value);
			var total3 = fund3 * active3 * baskets3 * numPerYear3 * price * commission * num3;
			var result3 =  format(total3,2);
			document.getElementById("LMtotal").innerHTML = result3;
			grandTotal1 += result3;
			schoolTotal += result3;
			schoolTotal = format(schoolTotal,2);
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average middle schools
			var num4 = Number(document.getElementById("AMnum").value);
			var fund4 = Number(document.getElementById("AMfund").value);
			var people4 = Number(document.getElementById("AMpeople").value);
			var percent4 = (Number(document.getElementById("AMpercent").value))/100;
			var active4 = people4 * percent4;
			active4 = Number(active4);
			//document.getElementById("AMactive").innerHTML = active4;
			var baskets4 = Number(document.getElementById("AMbaskets").value);
			var numPerYear4 = Number(document.getElementById("AMnumPerYear").value);
			var total4 = fund4 * active4 * baskets4 * numPerYear4 * price * commission * num4;
			var result4 =  format(total4,2);
			document.getElementById("AMtotal").innerHTML = result4;
			grandTotal1 += result4;
			schoolTotal += result4;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//elementary schools
			var num7 = Number(document.getElementById("Enum").value);
			var fund7 = Number(document.getElementById("Efund").value);
			var people7 = Number(document.getElementById("Epeople").value);
			var percent7 = (Number(document.getElementById("Epercent").value))/100;
			var active7 = people7 * percent7;
			active7 = Number(active7);
			//document.getElementById("Eactive").innerHTML = active7;
			var baskets7 = Number(document.getElementById("Ebaskets").value);
			var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
			var total7 = fund7 * active7 * baskets7 * numPerYear7 * price * commission * num7;
			var result7 =  format(total7,2);
			grandTotal1 += result7;
			schoolTotal += result7;
			document.getElementById("Etotal").innerHTML = result7;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			
			//large churches
			var num5 = Number(document.getElementById("LCnum").value);
			var fund5 = Number(document.getElementById("LCfund").value);
			var people5 = Number(document.getElementById("LCpeople").value);
			var percent5 = (Number(document.getElementById("LCpercent").value))/100;
			var active5 = people5 * percent5;
			active5 = Number(active5);
			//document.getElementById("LCactive").innerHTML = active5;
			var baskets5 = Number(document.getElementById("LCbaskets").value);
			var numPerYear5 = Number(document.getElementById("LCnumPerYear").value);
			var total5 = fund5 * active5* baskets5 * numPerYear5 * price * commission * num5;
			var result5 =  format(total5,2);
			document.getElementById("LCtotal").innerHTML = result5;
			grandTotal1 += result5;
			churchTotal = result5;
			document.getElementById("churchTotal").innerHTML = churchTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average churches
			var num6 = Number(document.getElementById("ACnum").value);
			var fund6 = Number(document.getElementById("ACfund").value);
			var people6 = Number(document.getElementById("ACpeople").value);
			var percent6 = (Number(document.getElementById("ACpercent").value))/100;
			var active6 = people6 * percent6;
			active6 = Number(active6);
			//document.getElementById("ACactive").innerHTML = active6;
			var baskets6 = Number(document.getElementById("ACbaskets").value);
			var numPerYear6 = Number(document.getElementById("ACnumPerYear").value);
			var total6 = fund6 * active6 * baskets6 * numPerYear6 * price * commission * num6;
			var result6 =  format(total6,2);
			document.getElementById("ACtotal").innerHTML = result6;
			grandTotal1 += result6;
			churchTotal += result6;
			document.getElementById("churchTotal").innerHTML = churchTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			
			
			//organizations
			var num8 = Number(document.getElementById("Onum").value);
			var fund8 = Number(document.getElementById("Ofund").value);
			var people8 = Number(document.getElementById("Opeople").value);
			var percent8 = (Number(document.getElementById("Opercent").value))/100;
			var active8 = people8 * percent8;
			active8 = Number(active8);
			//document.getElementById("Oactive").innerHTML = active8;
			var baskets8 = Number(document.getElementById("Obaskets").value);
			var numPerYear8 = Number(document.getElementById("OnumPerYear").value);
			var total8 = fund8 * active8 * baskets8 * numPerYear8 * price * commission * num8;
			var result8 =  format(total8,2);
			//document.getElementById("Ototal").innerHTML = result6;
			grandTotal1 += result8;
			orgTotal = result8;
			document.getElementById("Ototal").innerHTML = result8;
			document.getElementById("orgTotal").innerHTML = orgTotal;
			document.getElementById("grandTotal").value = grandTotal1;	
		}
		function format(num, dec) {
	        	return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	        }
	</script>
	<script>
	
		function fetch_select(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("new_select").innerHTML=response; 
		       			document.getElementById("new_select2").innerHTML='';
		       			
		     		}
		   	});
		   	
		   	$.ajax({
		     		type: 'post',
		     		url: 'getRepContacts.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("memberContacts").innerHTML=response;
		       			
		     		}
		   	});
		  }
	</script>
	<script>
	
		function fetch_select2(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_members.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("new_select2").innerHTML=response;
		       			
		     		}
		   	});
		  }
	</script> 
	
	<script>
	
		function fetch_select3(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_contact_datax.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("new_select2").innerHTML=response; 
		     		}
		   	});
		   	$.ajax({
		     		type: 'post',
		     		url: 'getGroupContacts.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("memberContacts").innerHTML=response; 
		     		}
		   	});
		  }
		  
		function fetch_select6(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("groupid").innerHTML=response;
		       			
		     		}
		   	});
		  }
		  function fetch_select7(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_members.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("memberid").innerHTML=response;
		       			
		     		}
		   	});
		  }
		   function fetch_select9(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetchEmails.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("recipients").innerHTML=response;
		       			document.getElementById("memid").value=val; 
		       			
		     		}
		   	});
		}
		 function fetch_select10(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_contact_datax.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("memberContacts").innerHTML=response; 
		       			
		     		}
		   	});
		}
		function fetch_select11(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'getGroupSales.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("goalreport").innerHTML=response; 
		       			
		     		}
		   	});
		}
		function fetch_select12(val) {
		var group = document.getElementById("groupid").value;
		   	$.ajax({
		     		type: 'post',
		      		url: 'sortReport.php',
		     		data: {
		       			get_option:val, get_option2:group
		     		},
		     		success: function (response) {
		       			document.getElementById("goalreport").innerHTML=response; 
		     		}
		   	});
		   
		} 
		function fetch_select13(val) {
		var group = document.getElementById("memberid").value;
		   	$.ajax({
		     		type: 'post',
		      		url: 'sortReport.php',
		     		data: {
		       			get_option:val, get_option2:group
		     		},
		     		success: function (response) {
		       			document.getElementById("goalreport").innerHTML=response; 
		     		}
		   	});
		   
		} 
		function fetch_select14(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group2.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("groupid").innerHTML=response;
		       			
		     		}
		   	});
		  }
		 
	</script> 
	
	 <script>
	function fetch_select15(val) {
		
		   	$.ajax({
		   	    // var option = $('input[type="radio"]:checked').val();
		     		type: 'post',
		     		url: 'fetch_orgs.php',
		     		data: {
		       			//"fundSelect":radio_button_value
		       			 get_option : val
		     		},
		     		success: function (response) {
		       			document.getElementById("selection").innerHTML=response;
		       			
		       			
		     		}
		   	}); 
		   }    
	 </script>
	 <script>
	 function fetch_select16(val) {
		
		       			document.getElementById("selection").innerHTML='';
		       
		   }    
	 </script>
	 <script>
	 function fetch_select17(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("groupid2").innerHTML=response;
		       			
		     		}
		   	});
		  }
		  
		  function fetch_select18(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("txtHint").innerHTML=response;
		       			
		     		}
		   	});
		  }
		   function fetch_select19(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetchEmails2.php',
		     		data: {
		       			get_option:val
		       			
		     		},
		     		success: function (response) {
		       			document.getElementById("recipients").innerHTML=response; 
		       			
		     		}
		   	});
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
       
       <script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
	</script>
	
	<!--<script src="../js/jquery-validation-1.15.0/lib/jquery.js"></script>
	<script src="../js/jquery-validation-1.15.0/dist/jquery.validate.js"></script>-->
</head>

<div id="container">
  <div id="headerMain">
  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  		<img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
    <ul class="nav">
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
        <?php include 'includes/menu_women_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
        <?php include 'includes/menu_accessories_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
        <?php include 'includes/menu_men_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
        <?php include 'includes/menu_juniors_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
        <?php include 'includes/menu_kids_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'includes/menu_fitness_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'includes/menu_food_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'includes/menu_entertainment_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
        <?php include 'includes/menu_housewares_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
        <?php include 'includes/menu_health_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
        <?php include 'includes/menu_inspirational_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
        <?php include 'includes/menu_holiday_home.php'; ?>
    </li>
    <li class="rtborder"><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'includes/menu_business_home.php'; ?>
    </li>
   
   	<span class="examplesDropdown">Fundraiser Examples</span>
	<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'includes/menu_education_examples.php'; ?></li>
	<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'includes/menu_organization_examples.php'; ?></li>
   
    <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign Up</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>';
		                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<div id="acct_buttons"><input class="user redbutton" name="login" type="submit" value="sign up" /> ';
		               /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	//echo '<span><a href="'.$_SESSION['home'].'" />Account<br>Home</a></span>';
		         	echo '<span><a href="viewReps.php" />Account Home</a></span>';
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
  