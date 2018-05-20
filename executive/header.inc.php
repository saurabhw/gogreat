<head>
	<meta charset="UTF-8">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GreatMoods | Executive</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
    <!-- Bootstrap -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link href="../css/global_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/allforms_styles.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />   
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->
	<script src="../js/simpletabs_1.3.js"></script>
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
      function validate()
      {
		  
		  if( document.myForm.fname.value == "" )
         {
            document.getElementById("fname").style.border="3px solid red";
            document.myForm.fname.focus() ;
            return false;
         }else {
			 document.getElementById("fname").style.border="1px solid black";
		 }
         
          if( document.myForm.lname.value == "" )
         {
            document.getElementById("lname").style.border="3px solid red";
            document.myForm.lname.focus() ;
            return false;
         }else {
			 document.getElementById("lname").style.border="1px solid black";
		 }
         
          if( document.myForm.address1.value == "" )
         {
            document.getElementById("address1").style.border="3px solid red";
            document.myForm.address1.focus() ;
            return false;
         }else {
			 document.getElementById("address1").style.border="1px solid black";
		 }
		 
         if( document.myForm.city.value == "" )
         {
            document.getElementById("city").style.border="3px solid red";
            document.myForm.state.focus() ;
            return false;
         }else {
			 document.getElementById("city").style.border="1px solid black";
		 }
		 
         if( document.myForm.state.value == "" )
         {
            document.getElementById("state").style.border="3px solid red";
            document.myForm.state.focus() ;
            return false;
         }else {
			 document.getElementById("state").style.border="1px solid black";
		 }
		 
         if( document.myForm.zip.value == "" )
         {
            document.getElementById("zip").style.border="3px solid red";
            document.myForm.zip.focus() ;
            return false;
         }else {
			 document.getElementById("zip").style.border="1px solid black";
		 }
         
         if( document.myForm.email.value == "" )
         {
            document.getElementById("email").style.border="3px solid red";
            document.myForm.email.focus() ;
            return false;
         }else {
			 document.getElementById("email").style.border="1px solid black";
		 }
         
         if( document.myForm.zip.value == "" ||
         isNaN( document.myForm.zip.value ) ||
         document.myForm.Zip.value.length != 5 )
         {
            document.getElementById("zip").style.border="3px solid red";
            document.myForm.zip.focus() ;
            return false;
         }else {
			 document.getElementById("zip").style.border="1px solid black";
		 }
         
         if( document.myForm.Country.value == "-1" )
         {
            document.getElementById("Country").style.border="3px solid red";
            return false;
         }else {
			 document.getElementById("Country").style.border="1px solid black";
		 }
	
		 
		 if(document.myForm.password == "" ||
		 document.myForm.cpassword == "" ||
		 document.myForm.password != document.myForm.cpassword )
		 {
			document.getElementById("password").style.border="3px solid red";
			document.getElementById("cpassword").style.border="3px solid red";
            document.myForm.password.focus() ;
            return false;
		 }else {
			 document.getElementById("password").style.border="1px solid black";
			 document.getElementById("cpassword").style.border="1px solid black";
		 }
		 
		 if(document.myForm.vpid == "Select VP Account")
		 {
			document.getElementById("vpid").style.border="3px solid red";
            document.myForm.password.focus();
            return false;
		 }else {
			 document.getElementById("vpid").style.border="1px solid black";
		 }
         
		 return( true );
      }
 
</script>

<script>

function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response; 
     }
   });
   
   
   $.ajax({
     type: 'post',
     url: 'fetch_datax.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("gms_accts").innerHTML=response; 
     }
   });
   
   
}

function fetch_select2(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data2.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select2").innerHTML=response; 
     }
   });
    $.ajax({
     type: 'post',
     url: 'fetch_data2x.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("gms_accts").innerHTML=response; 
     }
   });
}

function fetch_select3(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data3.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select3").innerHTML=response; 
     }
   });
   
    $.ajax({
     type: 'post',
     url: 'fetch_data3x.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("gms_accts").innerHTML=response; 
     }
   });
}


function fetch_select4(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data4.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select4").innerHTML=response; 
     }
   });
   
   $.ajax({
     type: 'post',
     url: 'fetch_data4x.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("gms_accts").innerHTML=response; 
     }
   });
}

function fetch_select5(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data5.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select5").innerHTML=response; 
     }
   });
}

</script>  
 <script>
    $(document).ready(function () {
	$('.view_data').click(function () { // id of the modal with event
	
	var order_id = $(this).attr("id");
	$.ajax({
	 url : "selectSupplier.php",
	 method: "POST",
	 data: {order_id:order_id},
	 success:function(data){
	 $('#edit_detail').html(data);
	 $('#dataModal').modal("show");
	 }
	
	});
	})
});
    </script>  
</head>

<div id="headerMain">
	<div id="bannerwrap"><a href="../index.php"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="../images/Header-new_Homepage-Collage.png" width="1024" height="150" alt="GreatMoods Photo Collage" /></div>
	
	<div id="menuWrapper"> </div> <!--end menuWrapper-->

      <ul class="nav">
        <li><a href="#">Women</a>
	        <?php include 'menu_women_home.php'; ?>
	    </li>
	    <li><a href="#">Accessories</a>
	        <?php include 'menu_accessories_home.php'; ?>
	    </li>
	    <li><a href="#">Men</a>
	        <?php include 'menu_men_home.php'; ?>
	    </li>
	    <li><a href="#">Juniors</a>
	        <?php include 'menu_juniors_home.php'; ?>
	    </li>
	    <li><a href="#">Kids</a>
	        <?php include 'menu_kids_home.php'; ?>
	    </li>
	    <li><a href="#">Fitness</a>
	        <?php include 'menu_fitness_home.php'; ?>
	    </li>
	   <li><a href="#">Food</a>
	        <?php include 'menu_food_home.php'; ?>
	    </li>
	    <li><a href="#">Entertainment</a>
	        <?php include 'menu_entertainment_home.php'; ?>
	    </li>
	    <li><a href="#">Home</a>
	        <?php include 'menu_housewares_home.php'; ?>
	    </li>
	    <li><a href="#">Health</a>
	        <?php include 'menu_health_home.php'; ?>
	    </li>
	    <li><a href="#">Inspirational</a>
	        <?php include 'menu_inspirational_home.php'; ?>
	    </li>
	    <li><a href="#">Holiday</a>
	        <?php include 'menu_holiday_home.php'; ?>
	    </li>
	    <li class="rtborder"><a href="#">Business</a>
	        <?php include 'menu_business_home.php'; ?>
	    </li>
	   
	   	<span class="examplesDropdown">Fundraiser Examples</span>
		<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'menu_education_examples.php'; ?></li>
		<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'menu_organization_examples.php'; ?></li>
	   
	   <li class="lfborder"><a class="logintitle" href="#">My Account</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>
		                      <input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in">';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	echo '<span><a href="viewAccounts.php">Account Home</a></span>';
		         	echo '<span><a href="../reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
	  </ul><!--end mainNav-->

</div><!--end headerMain-->
  