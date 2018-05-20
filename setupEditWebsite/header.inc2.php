<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('../includes/logInUser.inc.php');
}?>

<head>	
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/lisa_contacts_page.css">
	
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.3/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" media="screen" href="../jquery-ui-1.10.3/ui/jquery.multiselect.css">
	
	<script type="text/javascript" src="../jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script type="text/javascript">
	
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
	
	<script type="text/javascript">
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
		   
		} 
		
	</script>   
	 
	
	
	
	<script type="text/javascript">
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
		                echo '<h4><a href="../index.php">GreatMoods<br>Homepage</a></h4>';
		         	echo '<h4><a href="editClub.php" />Account<br>Home</a></h4>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
        
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
	  </ul>
    </div><!--end mainNav-->
 