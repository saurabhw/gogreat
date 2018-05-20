<?php 

if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

	session_start();
	ob_start();
	//include 'redirect/redirect.php';
	$role = $_SESSION['role'];
	include "connectTo.php";
        $link = connectTo();
	$id = $_SESSION['userId'];
	$table = "users";
	$role = "";
        $query =  "SELECT * FROM $table WHERE username ='$id'";
        $result = mysqli_query($link, $query);
        if (!$result) 
        {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
         }
         //get user role
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My GreatMoods Account</title>
<link rel="stylesheet" type="text/css" href="../css/dashboardStyles.css">
<link rel="stylesheet" type="text/css" href="../js/css/jquery-ui-1.9.0.custom.css">
<script src="../js/jquery-ui-1.9.0.custom.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script src="../js/loadXMLDoc.js"></script>
<script type="text/javascript">
		/*function validate(form) {
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
	}*/
$(function() {
        
        $( "#accordion" ).accordion({ header: "h3", collapsible: true});
    });
	$(document).ready(function() {
	$("#ajax-content").hide();
        $("#nav li a").click(function() {
        $("#ajax-content").show();
        $("#ajax-content").empty().append("<div id='loading'><img src='images/loading.gif' alt='Loading' /></div>");
        $("#nav li a").removeClass('current');
        $(this).addClass('current');
 
        $.ajax({ url: this.href, success: function(html) {
            $("#ajax-content").empty().append(html);
            }
    });
    return false;
    });
 
    $("#ajax-content").empty().append("<div id='loading'></div>");
    $.ajax({ url: 'page_1.html', success: function(html) {
            $("#ajax-content").empty().append(html);
    }
    });
});
</script>
</head>

<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
	<div id="content">         
		<div id="accordion"><!--start accordion-->
			<h3>Add Distributor</h3>
			<div><!--start panel 1-->
			<? echo $id; ?>
			<form class="distributor1" action="handleDistributorSetup1.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
				<table class="setupdist">
					<tr>
						<td><label id="firmName" for="firmName"> Company Name<span class="required">*</span></label></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label><input type="text" size="132" maxlength="40" id="firmName" name="firmName"></label></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label for="FName">First Name<span class="required">*</span></label></td>
						<td><label for="MName">Middle Name</label></td>
						<td><label for="LName">Last Name<span class="required">*</span></label></td>
					</tr>
					<tr>
						<td><label><input type="text" size="132" maxlength="30" id="FName" name="FName"/></label></td>
						<td><label><input type="text" size="132" maxlength="30" id="MName" name="MName"/></label></td>
						<td><label><input type="text" size="132" maxlength="30" id="LName" name="LName"/></label></td>
					</tr>
					<tr>
						<td colspan="3"><label id="address1" for="address1"> Address 1</label></td>
					</tr>
					<tr>
						<td colspan="3"><label><input type="text" maxlength="40" id="address1" name="address1"/></label></td>
					</tr>
						<td colspan="3"><label id="address2" for="address1"> Address 2</label></td>
					</tr>
					<tr>
						<td colspan="3"><label><input type="text" maxlength="40" id="address2" name="address2"/></label></td>
					</tr>
					<tr>
						<td width="125"><label id="city" for="city"> City</label></td>
						<td width="125"><label id="state" for="state"> State</label></td>
						<td><label id="zip" for="zip"> ZIP</label></td>
					</tr>
					<tr>
						<td width="125"><label><input type="list" maxlength="30" id="city" name="city"></label></td>
						<td width="125"><label id="state" for="state">
						<select name="state" size="1">
						<option value="">-- Please select --</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
						</select>
						</label></td>
						<td><label><input type="text" maxlength="10" id="zip" name="zip"/></label></td>
					</tr>
					<tr>
						<td width="125"><label id="phone" for="phone"> Phone Number<span class="required">*</span></label></td>
						<td><label id="ext" for="ext">Extension</label></td>
					</tr>
					<tr>
						<td width="125"><label><input type="text" maxlength="12" id="phone" name="phone"></label></td>
						<td><label><input type="text" maxlength="5" id="ext" name="ext"></label></td>
					</tr>
					<tr>
						<td width="125"><label id="fbPage" for="fbPage">Facebook</label></td>
						<td width="125"><label id="twitter" for="twitter">Twitter</label></td>
						<td><label id="linkedin" for="linkedin" name="linkedin">LinkedIn</label></td>
					</tr>
					<tr>
						<td width="125"><label><input type="text" maxlength="40" id="fbPage" name="fbPage"/></label></td>
						<td width="125"><label><input type="text" maxlength="40" id="twitter" name="twitter"/></label></td>
						<td><label><input type="text" maxlength="40" id="linkedin" name="linkedin"/></label></td>
					</tr>
					<br>
					<tr>
						<td><label for "title" class="formSelect">Title:
						<input type="radio" name="Title" value="owner" id="Title_0">Owner</label></td>
						<td><label for "title" class="formSelect">
						<input type="radio" name="Title" value="co-owner" id="Title_1">Co-owner</label></td>
						<td><label for "title" class="formSelect">
						<input type="radio" name="Title" value="distributorSalesperson" id="Title_2">Distributor Salesperson</label></td>
					</tr>
					<tr class="setupdist">
						<td><label for "contactGMradio1">Have you talked to a GreatMoods Representative?<br>
						<input type="radio" name="contactGMradio1" value="yes" id="contactGMrep_0">Yes</label></td>
						<td><label for "contactGMradio2" class="formSelect">
						<input type="radio" name="contactGMradio2" value="no" id="contactGMrep_1">No</label></td>
					</tr>
					<tr>
						<td><label id="sales"> If so, whom?<input name="sales" type="text" size="30" maxlength="30"></label></td>
						<br>
					</tr>
					<tr>
						<td>Upload Photos</td>
					</tr>
					<tr>
						<td>To personalize your webpage, attach photo(s). Acceptable formats are .jpg or .png files.</td>
					</tr>
					<tr>
						<td><label for="AddPersonalPhoto">Personal Photo:<br>
						<input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" /></label></td>
						<td><label for="RemovePersonalPhoto">
						<input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">Remove Current Photo</label></td>
					</tr>
					
					<tr>
						<td><label for="AddGroupPhoto">Group Photo:<br><input name="AddGroupPhoto" type="file" id="AddGroupPhoto" /></label></td>
						<td><label for="RemoveGroupPhoto">
						<input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">Remove Current Photo</label></td>
					</tr>

				<!--<tr>
					<td width="238" align="left"><label for="AddPersonalPhoto">Personal Photo:</label><input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" /></td>
					<td width="180" valign="bottom"><input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto"><label for="RemovePersonalPhoto">Remove Current Photo</label></td>
				</tr>
				<tr>
					<td width="238" align="left"><label for="AddGroupPhoto">Group Photo:</label><br><input name="AddGroupPhoto" type="file" id="AddGroupPhoto" size="20" /></td>
					<td width="180" valign="bottom"><label for="RemoveGroupPhoto"><input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">Remove Current Photo</label></td>
				</tr>-->
				
					<tr>
						<td>2 Simple Steps for Payment</td>
					</tr>
					<tr>
						<td>Please enter your new or existing Paypal information.<br>All commissions are paid next day into your Paypal account.</td>
					<tr>
						<td><label for="paypal" class="formSelect">Paypal ID (Email address)<br><input type="text" name="paypal"></label></td>
					</tr>
					<tr>
						<td><br>If you prefer, we can set up your Paypal account for you.</td>
					</tr>
					<tr>
						<td><br>A Federal Tax Identification Number (TIN) or Social Security Number is required for distribution of funds and also for tax purposes.
						<span class="required">*</span></td>
					</tr>
					<tr>
						<td><label for="ssn"> SSN</label></td>
						<td><label for="tin"> Tax ID Number (TIN)</label></td>
					</tr>
					<tr>
						<td><label><input type="text" maxlength="30" id="ssn" name="ssn"/></label></td>
						<td><label><input type="text" maxlength="30" id="tin" name="tin"/></label></td>
					</tr>
				
					<!--<p class="footnote"> *We require either a Social Security Number or Tax Identification Number for the distribution of funds.</small> <br class="clearfloat">-->        
	
					<tr>
						<td>Enter an email address and password to create a login to your website. 
						You may use the same email address and password as your Paypal account for your login.</td>
					</tr>
					<tr>
						<td><label for="email" class="formSelect">Email Address (This will be your Login)<br><input type="text" name="email"></label>
					</tr>
					<tr>
						<td><label for="loginPass" class="formSelect">Enter a Login Password<br><input type="password" name="loginPass" id="loginPass"></label></td>
					</tr>
					<tr>
						<td><br><label for="confirmPass" class="formSelect">Confirm Password<br><input type="password" name="confirmPass" id="confirmPass"></label></td>
					</tr>
					<tr>
						<td><br><input type="submit" value="Save" /></td>
					</tr>
					<tr>
						<td><input type="submit" value="Save/Add Distributor" /></td>
						
						<!--<input type="reset" value="Reset Form"/>-->
				</table>
			</form>
			</div><!--stop panel 1-->
       
			<h3>Current Distributors</h3>
			<div><!--start panel 2-->
				<table>
					<tr>
						<th>Company Name</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email Address</th>
						<th>Phone</th>
					</tr>
                   <?
                     $query_d =  "SELECT * FROM distributors WHERE setupID ='$id'";
                     $result_d = mysqli_query($link, $query_d);
                     while($row = mysqli_fetch_assoc($result_d))
                     {
                        $who =  $row['loginid'];
                        echo'<tr>
                        <td>'.$row['companyName'].'</td>
                        <td>'.$row['FName'].'</td>
                        <td>'.$row['LName'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['homePhone'].'</td>
                       <!-- <td>'.$row['loginid'].'</td>-->
                        <td><form method="post" action="viewAccounts.php">
                        <input type="hidden" name="user2" value="'.$row['loginid'].'" />
                        <input type="submit" name="submit" value="View Acounts" />
                        </form>
                        </td>
                        <td><form method="post" action="selectFundraiser.php">
                        <input type="hidden" name="user" value="'.$who.'" />
                        <input type="submit" value="Add Accounts" />
                        </form>
                        </td>
                        </tr>';
                     }
                   ?>
                   </table>
                </div><!--stop panel 2-->
                
                <!--we have to figure out the panel height leave this html in for now-->
                
				<h3>Add Representatives</h3>
				<div><!--start panel 3-->
				</div><!--stop panel 3-->

				<h3>?</h3>
				<div><!--start panel 4-->
				</div><!--stop panel 4-->
		</div><!--end accordian--> 	
	</div><!--end content-->
	
<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>