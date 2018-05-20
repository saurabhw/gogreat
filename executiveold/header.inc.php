<head>
<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
	<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/layout_styles.css" />
	<link rel="shortcut icon" href="../images/favicon.ico">

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/simpletabs_styles.css" />
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
	
	<script type="text/javascript">
		$( "#birthdate" ).datepicker();
	</script>
	
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
 	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	
	<!--ParamQuery Grid files-->
        <link rel="stylesheet" href="../grid-2.0.4/pqgrid.min.css" />
        <script type="text/javascript" src="../grid-2.0.4/pqgrid.min.js" ></script>
        
     	</script>
        
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
}

</script>  
</head>

<div id="headerMain">
	<div id="bannerwrapmain"><a href="../index.php"><img id="logo" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a> <img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" /></div>
	
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
		                echo '<h4><a href="index.php">GreatMoods<br>Homepage</a></h4>';
		         	echo '<h4><a href="'.$_SESSION['home'].'" />Account<br>Home</a></h4>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
	    
      		</div> <!--end login-->
    	</li>
        <li><a href="#">Women</a>
        	<?php include '../includes/menu_women.php'; ?>
	    </li>
	    <li><a href="#">Accessories</a>
	        <?php include '../includes/menu_accessories.php'; ?>
	    </li>
	    <li><a href="#">Men</a>
	        <?php include '../includes/menu_men.php'; ?>
	    </li>
	    <li><a href="#">Juniors</a>
	        <?php include '../includes/menu_juniors.php'; ?>
	    </li>
	    <li><a href="#">Kids</a>
	        <?php include '../includes/menu_kids.php'; ?>
	    </li>
	    <li><a href="#">Baby</a>
	        <?php include '../includes/menu_baby.php'; ?>
	    </li>
	    <li><a href="#">Fitness</a>
	        <?php include '../includes/menu_fitness.php'; ?>
	    </li>
	    <li><a href="#">Food</a>
	        <?php include '../includes/menu_food.php'; ?>
	    </li>
	    <li><a href="#">Entertainment</a>
	        <?php include '../includes/menu_entertainment.php'; ?>
	    </li>
	    <li><a href="#">Housewares</a>
	        <?php include '../includes/menu_housewares.php'; ?>
	    </li>
	    <li><a href="#">Health</a>
	        <?php include '../includes/menu_health.php'; ?>
	    </li>
	    <li><a href="#">Inspirational</a>
	        <?php include '../includes/menu_inspirational.php'; ?>
	    </li>
	    <li><a href="#">Holiday</a>
	        <?php include '../includes/menu_holiday.php'; ?>
	    </li>
	    <li><a href="#">Business</a>
	        <?php include '../includes/menu_business.php'; ?>
	    </li>
	   <li><a href="#">Education Examples</a>
	    	<?php include '../includes/menu_education_examples.php'; ?>
	    </li>
	    <li><a href="#">Organization Examples</a>
	    	<?php include '../includes/menu_organization_examples.php'; ?>
	    </li>
	</ul>
</div> <!--end headerMain-->
  