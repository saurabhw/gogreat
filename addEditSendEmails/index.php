<?php
	session_start();
	//include "../redirect/redirect.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="../js/loadXMLDoc.js"></script>
<script type="text/javascript">
	onload = function() {
		var alpha = "";
		var list = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		for(var i=0; i<26; i++) {
			alpha += "<a href='javascript:loadXMLDoc(\"displayEmail.php?letter=" + list[i] + "\", \"contactList\")'>" + list[i] + "</a>";
		}
		alpha += "<a href='javascript:loadXMLDoc(\"displayEmail.php?letter=all\", \"contactList\")'>(Show all)</a>";
		document.getElementById("alpha").innerHTML = alpha;
	};
	function validate(radioObj) {
		var numOfRadios = radioObj.length;
		var atLeastOneChecked = false;
		for(var i=0; i<numOfRadios; i++) {
			if(radioObj[i].checked) {
				atLeastOneChecked = true;
			}
		}
		if(!atLeastOneChecked) {
			alert("Pleace choose who this email will be sent to.");
			return false;
		} else {
			return true;
		}
	}
	function getEmail(letter) {
		
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add, Edit or Send Emails</title>

<link href="addEditSendEmail.css" rel="stylesheet" type="text/css" />
<link href="../css/mainStyles.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
#headerTop{
	background: url(../images/groups%20via%20web/ACO_Banner1.jpg) no-repeat;
	background-position:right top;
	width:1024px;
	height:130px;
	padding:0;
	margin:0;
	position:relative;
	z-index:3;
	}
#content{
	width:700px;
	margin:0px 0 25px 0;
	padding:0px 50px 0px 0px;
	float:left;
	
	background-repeat:no-repeat;
	background-position:left top;
	}
</style>
<body>
<div id="container">
	<?php include 'header.php' ; ?>
		<?php include 'mainLeftSidebar.php' ; ?>
	<div id="content">
	<h1 class="setupEmail">Setup Email Contacts</h1>
		 <form id="setupEmail" action="addEmailContact.php" method="post">
                    <table id="setUpEmailContacts" style="border-spacing: 10px;">
                        <tr></tr>
                            <th valign:"top"> 
                            	<label>Last Name:</label>
                            </th>
							<th valign:"top">
                            	<label>First Name:</label>
                            </th>
                              <th valign:"top">
                              	<label>E-Mail Address:</label> 
                              </th>
                            <th valign:"top">
                              	<label>Phone Number:</label> 
                             </th>
                               
                      <tr></tr>
							<td valign:"top">
                                <input type="text" name="LName" id="LName" size="15"/>
                            </td>
                            <td valign:"top">
                              	<input type="text" name="FName" id="FName" size="15">
                            </td>
                            <td valign:"top">
                              	<input type="text" name="email" id="email" size="15">
                            </td>
                            <td valign:"top">
								<input type="text" name="phone" id="phone" size="15">
                          	</td>
                  			
                  </table>  
                    <p><a href="url">Add More Email Contacts</a></p>
                    <input type="submit" value="Save Contacts" />
                    </form>
                    <hr />
                    <h1 class="setupEmail">View, Edit Email Contact List</h1>
                    <span><p id="alpha" style="font-size:21px;letter-spacing:3px;">
			</p></span>
                    <form action="form_action.asp" method="post">
                        <table id="contactList" >
                            <tr>    
                                <th valign="top">Name</th>
                                <th valign="top">Email</th>
                                <th valign="top">Phone</th>
                           </tr>	
			</table>
                     
                      <input type="submit" value="Submit" />
                    </form>
                        <hr />
                    <h1 class="setupEmail">Add Personalized E-mail to Your Fundraising Campaigns</h1>
                        <table id="fundraiserType">
                        <form action="createEmails.php" method="post" name='createEmail' onsubmit='return validate(this["sendTo"])'/>
                        <tr>
                           <td valign="top" >
                               <h4>Fundraiser Type</h4>
                                <select>
                                    <option>Christmas</option>
                                    <option>Easter</option>
                                    <option>Valentines Day</option>
                                </select>
                            </td>
                            <td valign="top" >	
                                <h4>Personalize Your Message</h4>
                                <textarea rows="2" cols="20" name="body"></textarea>
                            </td>
                            <td valign="top" >
                               <h4>Send Dates</h4>
                                <input type="text" size="10" />
                            </td>
                        </tr>
                    </table>
                    
                    
                    	<h4>Send Personalized Msg to:</h4><br/>
                        <input type="radio" name="sendTo" value='friends'/>Friends<br/>
                        <input type="radio" name="sendTo" value='family'/>Family<br/>
                        <input type="radio" name="sendTo" value='both'/>Friends &amp; Family<br/>
                        <input type="radio" name="sendTo" value='individual'/>Individuals<br/>
                        <input type="submit" value="Save List"/>
                        </form><br />
                    <hr />
                    	<p>View or Edit All Emails by Date</p>
                    <hr/>
                </div> <!--end content-->
		<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
