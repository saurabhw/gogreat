<?php 
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include 'connectTo.php';
	//include 'redirect/redirect.php';
	$link = connectTo();
	$role = $_SESSION['role'];
	$email = $_SESSION['email'];
	$userID = $_SESSION['userId'];
	$name = $_SESSION['firstName'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My GreatMoods Account</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
		<link rel="stylesheet" type="text/css" href="js/css/jquery-ui-1.9.0.custom.css">
		<script src="js/jquery-ui-1.9.0.custom.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
               <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
              
		<script src="js/loadXMLDoc.js"></script>
		<style type="text/css">
			#headerTop{
				background: no-repeat;
				background-position:right top;
				width:1024px;
				height:130px;
				padding:0;
				margin:0;
				position:relative;
				z-index:3;
				}
			#content{
				width:800px;
				margin:0px 0 50px 0;
				padding:0px 0px 50px 0px;
				float:right;
				position:relative;
				top:-60px;
				height: auto;
				}
			#distSetup{
				width:80%;
				margin:0px 0 50px 0;
				padding:0px 0px 50px 0px;
				float:left;
				position:relative;
				top:-50px;
				display:block;
				letter-spacing:2px;
				}
			#leadImg{
				position:relative;
				top:-125px;
				right:150px;
				float:right;
				}
			#logout {
				position: absolute;
				right: 8px;
			}
			.school {
				
			}
			.hidden {
				display: none;
			}
			.unhidden {
				display: block;
			}
			
			
    		</style>
	 <script type="text/javascript">
		function validate(form) {
			for(var i=0; i<11; i++) {
				var input = form[i].value;
				if(input == "" || input == null) {
					if(form[i].name != "address2") {
						alert("Please enter a value for " + form[i].name);
						form[i].focus();
						return false;
					}
				}

			}
		var email = form['email'].value;
		if(!isValidEmail(email)) {
			alert("please enter a valid email address");
			return false;
		}
		var pass1 = form['loginPass'].value;
		var pass2 = form['confirmPass'].value;
		if(pass1 == "" || pass1 == null) {
			alert("please enter a valid password");
			return false;
		}
		if(pass1 != pass2) {
			alert("passwords do not match");
			return false;
		}
		return true;
	}
	function isValidEmail(email) {
		if(email.indexOf("@") == -1 || email.indexOf(".") == -1) {
			return false;
		} else {
			return true;
		}
	}

    $(function() {
        $( "#accordion" ).accordion({ header: "h3", collapsible: true});
       
    });
    </script>
	</head>
    <body>
	  <div id="container">
	  <?php include 'header.php' ; ?>
	  <?php include 'mainLeftSidebar.php' ; ?>
         	   <div id="content">
                      
            <div id="accordion"><!--start accordion-->
              <h3>Sales Person Setup and Edit</h3><!--start panel 1---------------->
               <div id="panel1">
               		<?php
               		echo 'Role: '.$role;
               		echo '<br />';
               		echo 'Name: '.$name;
               		echo '<br />';
               		echo 'Email: '.$email;
               		echo '<br />';
               		echo 'User ID: '.$userID;
               		echo '<br />';
               		?>
		</div><!--stop panel 1-->
             
              <h3>Sales Goals</h3><!--start panel 2---------------------->
                 <div>
         
                   
                </div><!--stop panel 2-------------->
                
                
                
               <h3>Add and Edit Prospective Acccounts</h3><!--start panel 3-------------->
                <div>
                 <form method="post" action=""><!--------------------open form--->
                
                   <h4 align="center" style="background-color: #cc0000; color: #fff;">Account Setup</h4>
                   <table width="400px"><tr><td>
                   
                   Account Name<input type="text" id="accountName" name="acName" /> <br />
                   Address<input type="text" id="address" name="acAddress" /> 
                   City<input type="text" id="accountCity" name="acCity" /> 
                   State Code<input type="text" id="accountState" name="acState" maxlength="2" />
                   Zip Code<input type="text" id="accountZip" name="aZip" maxlength="10" />
                   Website URL<input type="text" id="accountWeb" name="acWeb" />  
         
                   </td>
                  
                   <td>
                
                  Select Fundraiser Type
                   <select>
                   <option>High Schools</option>
                   <option>Middle Schools</option>
                   <option>Elementary Schools</option>
                   <option>Religious</option>
                   <option>Community Organizations</option>
                   <option>Youth & Sports</option>
                   <option>Local and National Charities</option>
                   <option>Causes</option>
                   </select>
                   <select>
                   <option>Band</option>
                   <option>BPA</option>
                   <option>Book Club</option>
                   <option>Chess Club</option>
                   <option>Choir</option>
                   <option>Class Trips</option>
                   <option>Debate</option>
                   <option>FBLA</option>
                   <option>Language Club</option>
                   <option>Library</option>
                   <option>National Art HS</option>
                   <option>National Honor Society</option>
                   <option>Prom Committee</option>
                   <option>PTA/PTO</option>
                   <option>Scholars Bowl</option>
                   <option>Scholarship Counseling</option>
                   <option>School Counseling</option>
                   <option>Science & Math</option>
                   <option>Student Council</option>
                   <option>Theater</option>
                   <option>Yearbook News</option>
                   <option>Broadcasting</option>
                   </select>
                   <select>
                   <option>Baseball</option>
                   <option>Basketball</option>
                   <option>Boys</option>
                   <option>Girls</option>
                   <option>Bowling</option>
                   <option>Cheerleeading</option>
                   <option>Cross Country</option>
                   <option>Danceline</option>
                   <option>Football</option>
                   <option>Field Hockey</option>
                   <option>Golf</option>
                   <option>Cymnastics</option>
                   <option>Ice Hcokey</option>
                   <option>Lacrosse</option>
                   <option>Power Lifting</option>
                   <option>Ski Club</option>
                   <option>Soccer</option>
                   <option>Softball</option>
                   <option>Swimming & Diving</option>
                   <option>Tennis</option>
                   <option>Track & Field</option>
                   <option>Volleyball</option>
                   <option>Wrestling</option>
                   </select>
                   <select>
                   <option>Fire</option>
                   <option>Police</option>
                   <option>Lion's Club</option>
                   <option>Jaycees</option>
                   <option>Rotary Club</option>
                   <option>Knights of Columbus</option>
                   <option>YMCA</option>
                   <option></option>
                   </select>
                   <select>
                   <option>Boy's Club</option>
                   <option>Girl's Club</option>
                   <option>Athlectic Associations</option>
                   <option>Big Brothers/Big Sisters</option>
                   </select>
                 
                   <br />
                   </td>
                   </tr>
                   </table>
                   <td>
                   <table>
                   <tr style="background-color: #cc0000; color: #fff; width: 600px;">
                   <td>By Account Type</td>
                   <td>Club & Athletic Teams</td>
                   <td>Contact Name</td>
                   <td>Contact Eamil Address</td>
                   <td>Phone Number</td>
                   </td>
                   </tr>
                   </table>       
	           </form>
                   </div><!--stop panel 3----------------->
    <h3>View Sales Person(s) and Accounts</h3>
    <div>
     
    </div>
</div>
 
        
         	
                   </div><!--end content-->
	           <?php include 'footer.php' ; ?>
                  </div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>