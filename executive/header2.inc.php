<head>
<link href="../../css/header_styles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../../css/simpletabs_styles.css" />
		<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
	
	<link rel="stylesheet"
     href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />   
	
        
     <script type="text/javascript">
  
      // Form validation code will come here.
      function validate()
      {
      
         if( document.myForm.fname.value == "" )
         {
            alert( "Please provide your first name!" );
            document.myForm.fname.focus() ;
            return false;
         }
         
          if( document.myForm.lname.value == "" )
         {
            alert( "Please provide your last name!" );
            document.myForm.lname.focus() ;
            return false;
         }
         
          if( document.myForm.address1.value == "" )
         {
            alert( "Please enter your address" );
            document.myForm.address1.focus() ;
            return false;
         }
         if( document.myForm.city.value == "" )
         {
            alert( "Please enter your city" );
            document.myForm.state.focus() ;
            return false;
         }
         if( document.myForm.state.value == "" )
         {
            alert( "Please enter your state " );
            document.myForm.state.focus() ;
            return false;
         }
         if( document.myForm.zip.value == "" )
         {
            alert( "Please enter your zip code" );
            document.myForm.zip.focus() ;
            return false;
         }
         
         if( document.myForm.email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.myForm.email.focus() ;
            return false;
         }
         
         if( document.myForm.zip.value == "" ||
         isNaN( document.myForm.zip.value ) ||
         document.myForm.Zip.value.length != 5 )
         {
            alert( "Please provide a zip in the format #####." );
            document.myForm.zip.focus() ;
            return false;
         }
         
         if( document.myForm.Country.value == "-1" )
         {
            alert( "Please provide your country!" );
            return false;
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
	<a href="../../index.php"><img id="banner" src="../../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
	<img id="collage" src="../../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" />
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
		                include('../../includes/logout.inc.php');
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
        <li><a href="../index.php">GreatMoods<br>Homepage</a></li>

</div><!--end headerMain-->
  