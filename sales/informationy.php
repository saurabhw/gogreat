<?php
	session_start(); // session start
        ob_start();
        ini_set('display_errors', '1'); // errors reporting on
        error_reporting(E_ALL); // all errors
        require_once('../includes/functions.php');
        require_once('../includes/connection.inc.php');
        require_once('../includes/imageFunctions.inc.php');
        $link = connectTo();
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
        {
            header('Location: ../index.php');
            exit;
        }
	
	$groupid = $_GET["group"];
        $userID = $_SESSION['userId'];
        $query1 = "SELECT * FROM user_info WHERE userInfoID = '$userID'";
        $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
        $row = mysqli_fetch_assoc($result1);
        $myPic = $row['picPath'];
        
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	 
	   $groupName = mysqli_real_escape_string($link, $_POST['groupname']);
	   $url = mysqli_real_escape_string($link, $_POST['websiteURL']);
	   $contactName = mysqli_real_escape_string($link, $_POST['contactFirstName']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $fund = mysqli_real_escape_string($link, $_POST['groupID']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $phone = mysqli_real_escape_string($link, $_POST['phone']);
	   $facebookURL = mysqli_real_escape_string($link, $_POST['fb']);
	   $twitterURL = mysqli_real_escape_string($link, $_POST['twitter']);
	   $contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);  
	   $payMail = mysqli_real_escape_string($link, $_POST['pal']);
	   $abt = mysqli_real_escape_string($link, $_POST['about']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	
	     $query = "UPDATE Dealers SET
   				DealerDir = '$groupName',
   				About = '$abt',
   				Phone = '$phone',
   				Fax = '$ext',
  				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
   				State = '$state',
  				Zip = '$zip',
   				ContactName = '$contactName',
   				email = '$contactEmail',
   				website = '$url',
  				PaypalEmail = '$payMail',
    				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE loginid = '$fund'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: query 1 ".mysqli_error($link)); 
  				
  		//update members under this group
	   $query2 = "UPDATE Dealers SET
   				DealerDir = '$groupName',
   				Phone = '$phone',
   				Fax = '$ext',
   				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
  				State = '$state',
  				Zip = '$zip',
  				ContactName = '$contactName',
  				email = '$contactEmail',
  				website = '$url',
  				PaypalEmail = '$payMail',
   				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE setuppersonid = '$fund'";
  				$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query2 ".mysqli_error($link)); 		
  	if($result && $result2){
  	    $redirect = "Location:photos.php?group=$group";
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query3 = "SELECT * FROM $table WHERE loginid='$groupid'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error());
	$row2 = mysqli_fetch_assoc($result3);
	$fundraiserid = $row2['loginid'];
	$orgName = $row2['Dealer'];
	$group_name = $row2['DealerDir'];
	//$name = $row2['Address1'];
	$phone = $row2['Phone'];
	$address1 = $row2['Address1'];
	$address2 = $row2['Address2'];
	
	$contact_name = $row2['ContactName'];
	$city = $row2['City'];
	$zip = $row2['Zip'];
	$fax = $row2['Fax'];
        $state = $row2['State'];
        $email = $row2['email'];
        $url = $row2['website'];
        $twitter = $row2['twitter'];
        $face = $row2['facebook'];
        $pal = $row2['PaypalEmail'];
        $about = $row2['About'];
        $reasons = $row2['FundraiserReasons'];
        $goal = $row2['FundraiserGoal'];
        $about = $row2['About'];
        $start = $row2['FundraiserStartDate'];
        $end = $row2['FundraiserEndDate'];
        $user_name = $row2['userName'];
        $user_pass = $row2['firstPass'];
        //set all session variables for multi part form
     
 
?>

<!DOCTYPE html>
<head>
<title>Edit Account Information | Representative</title>
<style>
    #accountTabs > li.test-class > a {
    font-size: 16px;
    font-weight: bold;
    background: #cb2d3e;
    background: -webkit-linear-gradient(to left, #ef473a, );
    background: linear-gradient(to bottom, #ef473a, #cb2d3e);
    }
     #accountTabs > li.test-class.active > a{
         color:black !important;
     }

</style>
</head>

<body>
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>




<!-- ***************************************************************************************************
********************************************************************************************************
***   SAVE AND CONTINUE NOT FUNCTIONING CORRECTLY AT ALL | Will have to mess around with that at a later date... 
***   Might end up making this formatted like the fundmember contact/home page to speed things up - 
***   Hoping to use a button like in fundmember forms; save and continue is a nonsense button, let users save at any point without continuing through ALL pages.....
*******************************************************************************************************
********************************************************************************************************
-->

<div class="container" id="editGroup">
    <div class="row-fluid">
        
        <div class="page-header interim-header">
        	<h1>Edit Fundraising Group Information</h1>
           <h3><? echo $orgName.' '.$group_name; ?></h3>
        </div>
        <div class="row-flex row-fluid"><!-- START row  -->
          <div class="panel panel-default col-md-10 col-md-push-1 col-lg-offset-1 col-lg-10 " id="info-pannel">
            
            <!--<div class="panel-heading hidden-sm hidden-xs">-->
            <!--    <h3 class="panel-title">More Information About the GreatMoods Program</h3>-->
            <!--</div>-->
            <form id="" action="information.php" methodm="POST" name="addOrg" enctype="multipart/form-data" onSubmit="return validate(this);">


                <div class="panel-body ">
                     <!--Nav tabs -->
                        <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="accountTabs">
                          <li class="test-class active"><a class="white" href="#group-contact">Group Contact</a></li>
                          <li class="test-class"><a class="white" href="#phone-address">Phone & Address</a></li>
                          <li class="test-class"><a class="white" href="#online-contact">Online Contact Info</a></li>
                          <li class="test-class"><a class="white" href="#fund-desc">Fundraiser Desc.</a></li>
                          <li class="test-class"><a class="white" href="#socialmedia-form">Social Media</a></li>
                          <li class="test-class"><a class="white" href="#paypal">PayPal</a></li>
                        </ul>
                    <form action="memberHome.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">


                             <!--Tab panes -->
                            <div class="tab-content responsive hidden-xs hidden-sm  interim-form">
                                <div class="tab-pane active" id="group-contact" role="tabpanel" >   
                                
                                    <div class="interim-form"><!-- START contact info col -->
                                   
                                        <div class="interim-header">
                                            <h3 style="margin-bottom: 25px; text-align: center;"><? echo $orgName.' '.$group_name; ?></h3>
                                        </div>
                                    
                                        <div class="form-area">
                                    		<label for="groupname">Group Name</label><br>
                    				            <input class="form-control" id="group" type="text" name="groupname"  placeholder="Group Type" value="<? echo $group_name;?>" required> <!-- this should say the group not account name --><br>
                                        
                                            <label for="url">Official Website</label><br>
                                                <input class="form-control" id="url" type="url" name="websiteURL" placeholder="http://www.ExisitingWebsite/URL.com" value="<? echo $url; ?>" data-toggle="tooltip" title="'http://' Reuired!">
            								<!--<input id="id" type="hidden" name="fundid" value="<? echo $fundraiserid; ?>" title="Account ID Number" readonly>--><br>

                                            <label for="cName">Contact Name</label><br>
        			                            <input class="form-control" id="cName" type="text" name="contactFirstName" value="<? echo $contact_name;?>" > <!-- this should say the group not account name -->

                                            <br><label for="loginemail">Contact Email</label><br>
                                                <input class="form-control" id="loginemail" type="email" placeholder="faker@hotmail.com" name="contactEmail" value="<? echo $email; ?>" >
                                        </div><!-- end form area -->
                                        
                                    </div>  <!-- end interium form -->      
                                </div> <!--end tab -->
                            
                                    <div class="tab-pane " id="phone-address" role="tabpanel">    
                                        <div class="interim-form"><!-- START contact info col -->
                                            <div class="form-area ">  
                            
                                                    <div class="interim-header"><h3 style="margin-bottom: 25px; text-align: center;">Phone and Address</h3></div>
                                    				<div class="form-group">
                                    				    <label for="address1">Address 1</label><br>
                        								<input class="form-control" id="address1" type="text" name="address1"  placeholder="Address 1" value="<? echo $address1; ?>" required>
                                    
                                    				</div>
                                    				
                                    				<div class="form-group">
                                    				    <label for="address2">Address 2</label><br>
                        			                    <input class="form-control" id="address2" type="text" name="address2"  placeholder="Address 2" value="<? echo $address2; ?>">
                                    				</div>
                                    				
                                    				<div class="form-group">
                                    				    <label for="city">City</label><br>
                        		                            <input class="form-control" id="city" type="text"  placeholder="City" name="city" value="<? echo $city; ?>" required><br>
                        		                            
                        		                        <label for="state">State</label><br>
                            								<select class="form-control" id="state" name="state" style="width:10%">
                            									<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                            									<option value="AL">AL</option>
                            									<option value="AK">AK</option>
                            									<option value="AZ">AZ</option>
                            									<option value="AR">AR</option>
                            									<option value="CA">CA</option>
                            									<option value="CO">CO</option>
                            									<option value="CT">CT</option>
                            									<option value="DE">DE</option>
                            									<option value="DC">DC</option>
                            									<option value="FL">FL</option>
                            									<option value="GA">GA</option>
                            									<option value="HI">HI</option>
                            									<option value="ID">ID</option>
                            									<option value="IL">IL</option>
                            									<option value="IN">IN</option>
                            									<option value="IA">IA</option>
                            									<option value="KS">KS</option>
                            									<option value="KY">KY</option>
                            									<option value="LA">LA</option>
                            									<option value="ME">ME</option>
                            									<option value="MD">MD</option>
                            									<option value="MA">MA</option>
                            									<option value="MI">MI</option>
                            									<option value="MN">MN</option>
                            									<option value="MS">MS</option>
                            									<option value="MO">MO</option>
                            									<option value="MT">MT</option>
                            									<option value="NE">NE</option>
                            									<option value="NV">NV</option>
                            									<option value="NH">NH</option>
                            									<option value="NJ">NJ</option>
                            									<option value="NM">NM</option>
                            									<option value="NY">NY</option>
                            									<option value="NC">NC</option>
                            									<option value="ND">ND</option>
                            									<option value="OH">OH</option>
                            									<option value="OK">OK</option>
                            									<option value="OR">OR</option>
                            									<option value="PA">PA</option>
                            									<option value="RI">RI</option>
                            									<option value="SC">SC</option>
                            									<option value="SD">SD</option>
                            									<option value="TN">TN</option>
                            									<option value="TX">TX</option>
                            									<option value="UT">UT</option>
                            									<option value="VT">VT</option>
                            									<option value="VA">VA</option>
                            									<option value="WA">WA</option>
                            									<option value="WV">WV</option>
                            									<option value="WI">WI</option>
                            									<option value="WY">WY</option>
                            								</select><br>
                            								
                            							<label for=""address1"zip">Zip Code</label><br>
                        								    <input class="form-control" id="zip" type="text" name="zip" placeholder="Zip Code" value="<? echo $zip; ?>" maxlength="5" required>
                                    				</div>
                                    				

                                            		
                                                    <div class="form-group">
                                                        <label for="genderSelect">Phone #</label><br>
                                                       <input class="form-control" id="phone" type="text" name="phone" value="<? echo $tel;?>" maxlength="14" placeholder="(555)-666-7777" >
                                                    </div>
                            
                                            </div><!-- END form area wrap -->
                                        </div><!-- END interiem form contact info col -->                                    
                                    </div><!--end tab -->
                
                                    <div class="tab-pane" id="online-contact" role="tabpanel">  
                                        <!--<p class="card-text">A simple to use calculator that will allow you to find out how much money you can raise using the GreatMoods Program.</p>-->
                                    </div><!--end tab -->
                                    
                                    <div class="tab-pane" id="fund-desc" role="tabpanel">
                                        <!--<h3 class="card-text">Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p> -->
                                        <!--<blockquote class="card-text">Step 1) Setup Website Example</blockquote>-->
                                        <!--<blockquote class="card-text">Step 2) Setup Members Example</blockquote>-->
                                        <!--<blockquote class="card-text">Step 3) Setup E-Mails Example</blockquote>-->
                                    </div><!--end tab -->
                                    
                                    <div class="tab-pane" id="socialmedia-form" role="tabpanel">
                                        <!--<h3 class="card-text">Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p> -->
                                        <!--<blockquote class="card-text">Step 1) Setup Website Example</blockquote>-->
                                        <!--<blockquote class="card-text">Step 2) Setup Members Example</blockquote>-->
                                        <!--<blockquote class="card-text">Step 3) Setup E-Mails Example</blockquote>-->
                                    </div><!--end tab -->
                                    
                                    <div class="tab-pane" id="paypal" role="tabpanel">
                                        <p class="card-text">Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p> 
                                    </div><!--end tab -->
                                    
                            <div id="row">
                            <a href="reasons.php?group=<?echo $fundraiserid;?>">
                                 <input name="username" type="hidden" value="<?php echo $login_email;?>">
                                 <input name="password" type="hidden" value="<?php echo $loginPass;?>">
                                 <input name="type" type="hidden" value="<?php echo $club;?>">
                                 <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
                                <input name="groupID" type="hidden" value="<?php echo $groupid;?>">
                                 <input name="hasLogin" type="hidden" value="<?php echo $hasLogin;?>" /> 
                                 <input id="tabButton" name="submit" type="submit" class="redbutton" value="Save and Continue" title="Saves Changes and Brings You to Edit Reasons">
                            </a>
                            </div>
             	
                                <!-- </div><!-- END inputs div -->
    
                            <!--</div> <!-- END interium form group -->
    
                    </div><!-- end tab content -->
                </div><!--end pannel body--> 
            </form><!-- END form -->
        </div> <!-- end pannel -->
        </div>    
            
            
     <!--  OLD code here
     <div class="table">
         <form id="" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" onSubmit="return validate(this);">
         	<div class="simpleTabs">
			<!--<ul class="simpleTabsNavigation">
				<li><a href="#">Information</a></li>
				<li><a href="#">Account Login</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Social Media</a></li>
				<li><a href="#">Profile Photo</a></li>
			</ul>-->
			
	<!--	<div class="interim-form">
				<div class="interim-header"><h2></? echo $orgName.' '.$group_name; ?></h2></div>
				<div class=""> <!-- titles -->
	<!--			        <span id="hd_group">Group</span>									
	<!--				<span id="hd_url">Existing Website URL</span>
					
				</div> <!-- end row -->
	<!--			<div class=""> <!-- inputs -->
	<!--		        <input id="group" type="text" name="groupname" value="</? echo $group_name;?>" required> <!-- this should say the group not account name -->
    <!--		        <input id="url" type="url" name="websiteURL" value="</? echo $url; ?>">Include http://
				        <input id="id" type="hidden" name="fundid" value="</? echo $fundraiserid; ?>" title="Account ID Number" readonly>
				</div> <!-- end row -->
	<!--			<div class=""> <!-- titles -->									
	<!--				<span id="hd_cname">Contact Name</span>
	<!--				<span id="hd_loginemail">Contact Email</span>
					<!-- <span id="hd_title">Position</span>-->
	<!--			</div> <!-- end row -->
	<!--			<div class=""> <!-- inputs -->
	<!--				<input id="cname" type="text" name="contactFirstName" value="</? echo $contact_name; ?>" >
					<input id="loginemail" type="email" name="contactEmail" value="</? echo $email; ?>" >
    					<!--<select name="">
						<option value="">---</option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
					</select>-->
			<!--	</div> <!-- end row -->
								
			<!--	<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="row"> <!-- titles -->
			<!--					<span id="hd_address1">Address 1</span>
			<!--				</div> <!-- end row -->
			<!--				<div class="row"> <!-- inputs -->
			<!--					<input id="address1" type="text" name="address1" value="</? echo $address1; ?>" required>
			<!--				</div> <!-- end row -->
			<!--				<div class="row">
            <!-           		<span id="hd_address2">Address 2</span>
            <!--      	</div> <!-- end row -->
			<!--                <div class="row">
			                    <input id="address2" type="text" name="address2" value="</? echo $address2; ?>">
			                </div> <!-- end row -->
			<!--				<div class="row"> <!-- titles -->
			<!--				<span id="hd_city">City</span>
								<span id="hd_state">State</span> 
								<span id="hd_zip">Zip</span>
								
							</div> <!-- end row -->
				<!--				<div class="row"> <!-- inputs -->
				<!--				<input id="city" type="text" name="city" value="</? echo $city; ?>" required>
								<select id="state" name="state">
									<option value="</?php echo $state; ?>">/<?php echo $state; ?></option>
									<option value="AL">AL</option>
									<option value="AK">AK</option>
									<option value="AZ">AZ</option>
									<option value="AR">AR</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DE">DE</option>
									<option value="DC">DC</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="IA">IA</option>
									<option value="KS">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="ME">ME</option>
									<option value="MD">MD</option>
									<option value="MA">MA</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MS">MS</option>
									<option value="MO">MO</option>
									<option value="MT">MT</option>
									<option value="NE">NE</option>
									<option value="NV">NV</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NY">NY</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VT">VT</option>
									<option value="VA">VA</option>
									<option value="WA">WA</option>
									<option value="WV">WV</option>
									<option value="WI">WI</option>
									<option value="WY">WY</option>
								</select>
								<input id="zip" type="text" name="zip" value="</? echo $zip; ?>" maxlength="5" required>
							</div> <!-- end row -->
							
			<!--				<div class="row"> <!-- title -->
	       	<!--                    		 		<span id="hd_wphone">Primary Phone</span>
	                           		 		<span id="hd_ext">Ext</span>
							</div> <!-- end row -->
	       	<!--             				<div class="row">
	                   		 			<input id="phone" type="text" name="phone" value="</?php echo $phone;?>" maxlength="14">
								<input id="ext" type="text" name="ext" value="</?php echo $fax;?>" maxlength="5">
							</div> <!-- end row -->
							
			<!--					<div class="row">
								<span id="hd_about">Fundraiser Description</span>
								<textarea name="about" cols="30" rows="5" id="description"><? echo $about;?></textarea>
							</div> <!-- end row -->
							
       	<!--                 			</td>
                        			<td id="td_2">
                        				<!--<div class="row"> <!-- title -->
                            					<!--<span id="hd_mphone">Mobile Phone</span>
							</div> <!-- end row -->
                        				<!--<div class="row"> <!-- inputs -->
                           	    				<!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
							</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- title -->
	                            				<!--<span id="hd_hphone">Home Phone</span>
	                        			</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- inputs -->
	                           	    			<!--<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
	                      	    			</div> <!-- end row -->
							
   	<!--                     			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
		
	<!--				<div class="interim-form"> <!-- payment tab -->
	<!--				<div class="interim-header"><h2>1 Simple Step for Payment</h2></div>
	<!--				<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row"> <!-- title -->
	<!--				<span id="hd_ppemail">PayPal Email</span>
	<!--				</div> <!-- end row -->
	<!--				<div class="row"> <!-- input -->
	<!--					<input id="paypalemail1" type="email" name="pal" value="<? echo $pal ?>" >
	<!--				</div> <!-- end row -->
	<!--				<br>
					<h3>Group Total Funds: 35%</h3>
				</div> <!-- end tab3 content (payment) -->
					
	<!--			<div class="interim-form"> <!-- social media tab4 -->
	<!--				<div class="interim-header"><h2>Social Media Connections</h2></div>
	<!--				<div class="row"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<? echo $face; ?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
	<!--				<br>
	<!--				<div class="row"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="twitter" value="</? echo $twitter; ?>"  placeholder="www.twitter.com/user"> -->
	<!--				</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="">
					</div>--> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
	<!--			</div> <!-- end tab4 content (social media) -->
	<!--	</div> <!-- end simple tabs -->	
         
    <!--    <br>
         
    <!--	<div id="row">
    		<a href="reasons.php?group=</?echo $fundraiserid;?>">
	         	<input name="username" type="hidden" value="</?php echo $login_email;?>">
	         	<input name="password" type="hidden" value="</?php echo $loginPass;?>">
	         	<input name="type" type="hidden" value="</?php echo $club;?>">
	         	<!--<input name="setup_person" type="hidden" value="</?php echo $userID;?>">-->
	<!--         	<input name="groupID" type="hidden" value="</?php echo $groupid;?>">
	         	<input name="hasLogin" type="hidden" value="</?echo $hasLogin;?>" /> 
	         	<input name="submit" type="submit" class="redbutton" value="Save and Continue" title="Saves Changes and Brings You to Edit Reasons">
         	</a>
    	</div> <!-- end row -->
    <!--	<br>
    </div> <!-- end interim-form -->
<!--        </form>
	</div> <!-- end table -->


    </div> <!--END row-->
</div> <!--END container-->    

<?php include 'footer.php' ; ?>
 
    <!-- add repsonsive tabs and accordion conversion at small/xs viewport width | full code for this inside responsive-tabs.js file -->
    <script src="../js/responsive-tabs.js"></script>
    <script>
        $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
            e.preventDefault();
            $( this ).tab( 'show' );
            } );
            
            ( function( $ ) {
              // Test for making sure event are maintained
              fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
        } )( jQuery );
    </script>

</body>


<?php
   ob_end_flush();
?>