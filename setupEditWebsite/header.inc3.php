<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('includes/logInUser.inc.php');
}?>

<head>	
	<meta charset="UTF-8">
	 <!-- jQuery (required) -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
  <link rel="stylesheet" href="../jquery-ui-1.7.2/css/base/ui.accordion.css">
  <script>
  $( function() {
    $( "#accordion" ).accordion({
       header: "h3",
       heightStyle: "Content",
       collapsible: true,
       active: 'none'
       
    });
  } );
  </script>
	
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">

	

	
	
	<!-- Required -->
  
  <script>
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
		jQuery('.check-all').click(function() {
      			jQuery('.checked-rec').each(function() {
        			$(this).attr('checked', $('.check-all').is(':checked'));
      			})
      		})
		//$(function () { $('#lstContacts').multiselect({ }); });
	</script>
	<script>
	//format telephone
	$(function() {
        $("input[name='phone']").keyup(function() {
        var curchr = this.value.length;
        var curval = $(this).val();
        if (curchr == 3) {
        $("input[name='phone']").val("(" + curval + ")" + "-");
        } else if (curchr == 9) {
        $("input[name='phone']").val(curval + "-");
        }
        });
       });
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
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
<script>
   function checkPass()
     {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('cpassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.length < 6){
    message.innerHTML = "Passwords Too Short!"
    }
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
<script type="text/javascript">
        function ValidateRadios() {
         var radios = document.getElementsByName('fundtype')

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

<script type="text/javascript">
        function ValidateRadios2() {
         var radios = document.getElementsByName('clubs[]');

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
     function doSomething()
{
alert("Do something radio button was checked");
}
$("#fundraisingType").click(function(e){ 

    $.ajax( {
        type: "POST",
        url: "fetch _orgs.php",
        data: $('#fundraisingType').serialize(),
        success: function( response ) {
        document.getElementById("selection").innerHTML=response;
        
        }
    });

});
</script>
<script>
    $(document).ready(function() {
      $("input:radio").change(function(){
         $.post('fetch_orgs.php', { "fundSelect": $(this).val() }, function(data) {
           // do whatever with data result.
           document.getElementById("selection").innerHTML=data; 
         });
      });
    });
    
  
</script>
<script>
function getOrg(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("selection").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","fetch_orgs.php?get_option="+int,true);
  xmlhttp.send();
}
</script>
</script>
   <script type="text/javascript">
    
    function CheckForm(){
	var checked=false;
	var elements = document.getElementsByName("clubs[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
			return true;
		}
		else
		{
		   
		   alert('You Must Select At Least One Club Type');
		   return false;
	
		}
	}

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
	
		function fetch_select(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_group.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("new_select").innerHTML=response; 
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
		       			document.getElementById("memberid").innerHTML=response;
		       			
		       			
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
	</script> 
	
	<script>
	
	function fetch_select4(val) {
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
	
		function fetch_select3(val) {
		
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
		   	$.ajax({
		     		type: 'post',
		     		url: 'fetch_email_data.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("logdropdown").innerHTML=response;
		       			var mem = document.getElementById("memberid").value;
		       			 document.getElementById("memid").value = mem;    
		     		}
		   	});
		   
		} 
		
		
		function fetch_select5(val) {
		
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
		
		function fetch_select8(val) {
		
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
		function fetch_select9(val) {
		
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
		function fetch_select10(val) {
		
		   	$.ajax({
		     		type: 'post',
		     		url: 'getMemberSales.php',
		     		data: {
		       			get_option:val
		       			
		     		},
		     		success: function (response) {
		       			document.getElementById("goalreport").innerHTML=response; 
		       			
		     		}
		   	});
		}
		
		function fetch_select11(val) {
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
		
		function fetch_select12(val) {
		var group = document.getElementById("groupid").value;
		   	$.ajax({
		     		type: 'post',
		      		url: 'newClubs.php',
		     		data: {
		       			get_option:val
		     		},
		     		success: function (response) {
		       			document.getElementById("clubs").innerHTML=response; 
		     		}
		   	});
		   
		}  
	</script>
	<script>
	function fetch_select13(val) {
		
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
	 function fetch_select14(val) {
		
		       			document.getElementById("selection").innerHTML='';
		       
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
                        var x = div[2];
			xmlhttp.open("GET","getclub.php?q="+name+"&x="+x+"&z="+z,true);
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
			xmlhttp.open("GET","getClub2.php?q="+name+"&x="+x+"&z="+z+"&y="+y,true);
			xmlhttp.send();
		}
	</script>
	
	
	
	<script>
		function getSelectedValue() { 
	 		var val = document.getElementById("fundraisingType").value;
	 		//alert("You selected : " + val);
	 		document.getElementById("choice").value = val;
		} 
	</script>
	
	
	<script> $(document).ready(function(){ $("button1").click(function(){ $("show").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button2").click(function(){ $("show2").toggle(); }); }); </script>
	
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
			var price = 22.75;
			var commission = 0.06;
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
	function atleast_onecheckbox(e) {
	var other = document.getElementById("clubs1");
	var gen = document.getElementById("general1");
	var ath = document.getElementById("athletics1");
        if ($("input[type=checkbox]:checked").length === 0 ) {
        if (other.value == '' && gen.value == '' && ath.value == '') {
        e.preventDefault();
        alert('You must select a checkbox or fill in club name.');
        return false;
        }
       } 
      }
      </script>
      
      <script>
	function atleast_onecheckbox2(e) 
	{
	var other = document.getElementById("clubs1").value;
	var gen = document.getElementById("general1").value;
	var ath = document.getElementById("athletics1").value;
         if ($("input[type=checkbox]:checked").length === 0 ) 
         {
            if (other === "" && gen === "" && ath === "")
            {
              e.preventDefault();
              alert('You must select a checkbox or fill in club name.');
              return false;
            }
         }
        } 
       </script>

	<script>
	     	// Form validation code will come here.
	      	function validate() { 

                      var a = document.getElementById("groupid");
                        var strUser4 = a.options[a.selectedIndex].value;

                       var strUser5 = a.options[a.selectedIndex].text;
                       if(strUser4==0)
                       {  document.getElementById("groupid").style.border="3px solid red";
	            	  document.myForm.groupid.focus() ;
                          alert("Please select a Group");
                        } 



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
	         
	         	if( document.myForm.email.value == "" ) {
	            		document.getElementById("email").style.border="3px solid red";
	            		document.myForm.email.focus() ;
	            		return false;
	         	}
	         	else {
				document.getElementById("email").style.border="1px solid black";
			}
	         
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
			
			var card = document.getElementById("groupid")[0].value;
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
                        
                        if(document.myForm.frname.value == "") {
				document.getElementById("frname").style.border="3px solid red";
	            		document.myForm.frname.focus();
	            		return false;
			}
			else {
				document.getElementById("frname").style.border="1px solid black";
			}
			
			 if(document.myForm.url.value == "") {
				document.getElementById("url").style.border="3px solid red";
	            		document.myForm.url.focus();
	            		return false;
			}
			else {
				document.getElementById("url").style.border="1px solid black";
			}
			
			 if(document.myForm.paypalemail.value == "") {
				document.getElementById("paypalemail").style.border="3px solid red";
	            		document.myForm.paypalemail.focus();
	            		return false;
			}
			else {
				document.getElementById("paypalemail").style.border="1px solid black";
			}
		}
	
	</script>
	
	
	<script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
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
</head>

<div id="container">
  <div id="headerMain"> 
  	<div id="bannerwrapmain"><a href="../index.php"><img id="logo" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
  <img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" /></div>
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
           <ul class="nav">
            <li><a href="#">My Account</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<label class="userlogin">Username:</label>
		                      <input id="loginemail" type="text" name="email" value="">';
		                echo '<br>';
		                echo '<label class="userlogin">Password:</label>
		                      <input id="loginpassword" type="password" name="password" value="" >';
		                echo '<br>';
		                echo '<input id="redbutton" class="user" name="login" type="submit" value="Login" />';
		                echo '</form>';
						
					
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="mallmenu">
		         		<div class="nav-column">';
		                echo '<h4><a href="repLogin.php" />Login<br>Home</a></h4>';
		         	echo '<h4><a href="editClub.php" />Account<br>Home</a></h4>';
		         	echo '<h4><a href="reset.php">Change My Password</a></h4>';
		         	include('includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
	<li><a href="#">Women</a>
        <?php include 'includes/menu_women_home.php'; ?>
    </li>
    <li><a href="#">Accessories</a>
        <?php include 'includes/menu_accessories_home.php'; ?>
    </li>
    <li><a href="#">Men</a>
        <?php include 'includes/menu_men_home.php'; ?>
    </li>
    <li><a href="#">Juniors</a>
        <?php include 'includes/menu_juniors_home.php'; ?>
    </li>
    <li><a href="#">Kids</a>
        <?php include 'includes/menu_kids_home.php'; ?>
    </li>
    <li><a href="#">Baby</a>
        <?php include 'includes/menu_baby_home.php'; ?>
    </li>
    <li><a href="#">Fitness</a>
        <?php include 'includes/menu_fitness_home.php'; ?>
    </li>
    <!-- <li><a href="#">Food</a>
        <?php include 'includes/menu_food_home.php'; ?>
    </li> 
    <li><a href="#">Entertainment</a>
        <?php include 'includes/menu_entertainment_home.php'; ?>
    </li>
    <li><a href="#">Housewares</a>
        <?php include 'includes/menu_housewares_home.php'; ?>
    </li>
    <li><a href="#">Health</a>
        <?php include 'includes/menu_health_home.php'; ?>
    </li>
    <li><a href="#">Inspirational</a>
        <?php include 'includes/menu_inspirational_home.php'; ?>
    </li>
    <li><a href="#">Holiday</a>
        <?php include 'includes/menu_holiday_home.php'; ?>
    </li>
    <li><a href="#">Business</a>
        <?php include 'includes/menu_business_home.php'; ?>
    </li>
   <li><a href="#">Education Examples</a>
    	<?php include 'includes/menu_education_examples.php'; ?>
    </li>
    <li><a href="#">Organizations</a>
    	<?php include 'includes/menu_organization_examples.php'; ?>
    </li>
   
	  </ul>
    </div><!--end mainNav-->
 