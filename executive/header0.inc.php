<head>
	<link rel="shortcut icon" href="../../images/favicon.ico">
	
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/all_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/addnew_form_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/simpletabs_styles.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />   
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
 
     <script type="text/javascript">
	 

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

<script type="text/javascript">

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
</head>

<div id="headerMain">
	<a href="../../index.php"><img id="logo" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
	<img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" />
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
		                echo '<h4><a href="../index.php">GreatMoods<br>Homepage</a></h4>';
		         	echo '<h4><a href="viewReps.php" />Account<br>Home</a></h4>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
        <!--<li><a href="../index.php">GreatMoods Homepage</a></li> -->
	<li><a href="#">Women</a>
        <?php include '../includes/menu_women_home.php'; ?>
    </li>
    <li><a href="#">Accessories</a>
        <?php include '../includes/menu_accessories_home.php'; ?>
    </li>
    <li><a href="#">Men</a>
        <?php include '../includes/menu_men_home.php'; ?>
    </li>
    <li><a href="#">Juniors</a>
        <?php include '../includes/menu_juniors_home.php'; ?>
    </li>
    <li><a href="#">Kids</a>
        <?php include '../includes/menu_kids_home.php'; ?>
    </li>
    <li><a href="#">Baby</a>
        <?php include '../includes/menu_baby_home.php'; ?>
    </li>
    <li><a href="#">Fitness</a>
        <?php include '../includes/menu_fitness_home.php'; ?>
    </li>
    <li><a href="#">Food</a>
        <?php include '../includes/menu_food_home.php'; ?>
    </li>
    <li><a href="#">Entertainment</a>
        <?php include '../includes/menu_entertainment_home.php'; ?>
    </li>
    <li><a href="#">Housewares</a>
        <?php include '../includes/menu_housewares_home.php'; ?>
    </li>
    <li><a href="#">Health</a>
        <?php include '../includes/menu_health_home.php'; ?>
    </li>
    <li><a href="#">Inspirational</a>
        <?php include '../includes/menu_inspirational_home.php'; ?>
    </li>
    <li><a href="#">Holiday</a>
        <?php include '../includes/menu_holiday_home.php'; ?>
    </li>
    <li><a href="#">Business</a>
        <?php include '../includes/menu_business_home.php'; ?>
    </li>
   <li><a href="#">Education Examples</a>
    	<?php include '../includes/menu_education_examples.php'; ?>
    </li>
    <li><a href="#">Organization Examples</a>
    	<?php include '../includes/menu_organization_examples.php'; ?>
    </li>
</div><!--end headerMain-->
  