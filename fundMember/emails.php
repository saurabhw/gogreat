<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
ob_start();

include '../includes/connection.inc.php';
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid'];
       $myPic = $row1['contact_pic']; 
       

       //$group = $dealerID;
// check if form has been submitted
if(isset($_POST['submit'])){
function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}// end check_email_address

  $loginname=$_SESSION['username'];
//$group = $_POST['group'];

if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
$sql="SELECT * FROM Dealers where loginid='$group'";
$result=mysqli_query($link, $sql)or die(mysql_error());
$resultrow=mysqli_fetch_array($result);
$repid=$resultrow['setuppersonid'];
$fnames = $_POST['fnames'];
$lnames = $_POST['lnames'];
$rel    = $_POST['rel'];
$emails = $_POST['emails'];
$phones = $_POST['phone'];



$x=0;
$arraycount=count($emails);

while($arraycount>$x){

    if($lnames[$x]!=null && $emails[$x]!=null){
     
        if(check_email_address($emails[$x])){
       
            $emailsql = "SELECT * FROM orgCustomers WHERE fundMemberID ='$user' AND orgEmail='$emails[$x]';";
            
            $emailresult = mysqli_query($link, $emailsql) or die(mysqli_error());;
            if(mysqli_num_rows($emailresult) < 1){
           
               mysqli_query($link, "INSERT INTO orgCustomers (orgRel, orgFName, orgLName, orgPhone, orgEmail, fundraiserID,
               			    fund_owner_id, org_contact_created)
                                    VALUES('$rel[$x]', '$fnames[$x]', '$lnames[$x]', '$phones[$x]', '$emails[$x]',
                                    '$group', '$repid', now())") or die(mysqli_error());
                           
	    }
	}
    }
    ++$x;
}
}// end if(isset($_POST['submit']))


$rep = $_SESSION['userId'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member | Send Emails</title>
</head>
	
<body>
<div id="container">
	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
	      
      	<div id="content">
		<h1>Send Emails</h1>
		<h3>Send Emails to Family, Friends and Business Contacts</h3>
		<? echo $user;?>
		<h5>Current Contacts</h5>
		<table id="contacts">
		         <tr>
		              <th><label for="FName">First Name</label></th>
		              <th><label for="LName">Last Name</label></th>
		              <th><label for="role">Role</label></th>
		              <th><label for="email">Email Address</label></th>
		              <th><label for="phone">Phone Number</label></th>
		         </tr>

		        <?php
		        $contact_query = "SELECT * FROM orgCustomers WHERE fundMemberID = '$dealerID'";
		        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
		        if($contact_result){
		           while ($row = mysqli_fetch_assoc($contact_result)){
		              
		              echo '<tr>
		                  <td class="fn">'.$row['first'].'</td>
		                  <td class="ln">'.$row['last'].'</td>
		                  <td class="role">'.$row['relationship'].'</td>
		                  <td class="email">'.$row['email'].'</td>
		                  <td class="pph">'.$row['workPhone'].'</td>
		                  
		                  </tr>';
		                  
			   }// end while
			   	   
			}// end if
		        ?>

		</table>
        		
        		<!--<br>
    			<h5>Set Up Email Contacts</h5>
    			<p>Please enter contact information for those you want to send emails to.</p>
    			<p>Required fields are marked with <span class="required">*</span></p>
    			<form class="distributor1" action="" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          		<table id="contacts">
			        <tr>
			              <td><label for="FName">First Name<span class="required">*</span></label></td>
			              <td><label for="LName">Last Name<span class="required">*</span></label></td>
			              <td><label for="role">Role</label></td>
			              <td><label for="email">Email Address<span class="required">*</span></label></td>
			              <td><label for="phone">Phone Number</label></td>
			              
				</tr>
			        <tr>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="FName" name="fnames[]" style="width:100px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="LName" name="lnames[]" style="width:150px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="relation" name="rel[]" style="width:110px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="email" name="emails[]" style="width:200px;"/>
			                </label></td>
			                <td><label>
			                  <input type="text" size="132" maxlength="30" id="phone" name="phone[]" style="width:90px;"/>
			                </label></td>
			        </tr>
			        <tr>
			              <td><label for="FName">First Name<span class="required">*</span></label></td>
			              <td><label for="LName">Last Name<span class="required">*</span></label></td>
			              <td><label for="relation">Relationship</label></td>
			              <td><label for="email">Email Address<span class="required">*</span></label></td>
			              <td><label for="phone">Phone Number</label></td>
			              
			       </tr>
			        <tr>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="FName" name="fnames[]" style="width:100px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="LName" name="lnames[]" style="width:150px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="relation" name="rel[]" style="width:110px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="email" name="emails[]" style="width:200px;"/>
			                </label></td>
			                <td><label>
			                  <input type="text" size="132" maxlength="30" id="phone" name="phone[]" style="width:90px;"/>
			                </label></td>
				</tr>
			        <tr>
			              <td><label for="FName">First Name<span class="required">*</span></label></td>
			              <td><label for="LName">Last Name<span class="required">*</span></label></td>
			              <td><label for="relation">Relationship</label></td>
			              <td><label for="email">Email Address<span class="required">*</span></label></td>
			              <td><label for="phone">Phone Number</label></td>
			        </tr>
			        <tr>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="FName" name="fnames[]" style="width:100px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="LName" name="lnames[]" style="width:150px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="relation" name="rel[]" style="width:110px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="email" name="emails[]" style="width:200px;"/>
			                </label></td>
			                <td><label>
			                  <input type="text" size="132" maxlength="30" id="phone" name="phone[]" style="width:90px;"/>
			                </label></td>
				</tr>
				<tr>
					<td><label for="FName">First Name<span class="required">*</span></label></td>
			              	<td><label for="LName">Last Name<span class="required">*</span></label></td>
			              	<td><label for="relation">Relationship</label></td>
			              	<td><label for="email">Email Address<span class="required">*</span></label></td>
			              	<td><label for="phone">Phone Number</label></td>
				</tr>
			        <tr>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="FName" name="fnames[]" style="width:100px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="LName" name="lnames[]" style="width:150px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="relation" name="rel[]" style="width:110px;"/>
			                </label></td>
			              <td><label>
			                  <input type="text" size="132" maxlength="30" id="email" name="emails[]" style="width:200px;"/>
			                </label></td>
			                <td><label>
			                  <input type="text" size="132" maxlength="30" id="phone" name="phone[]" style="width:90px;"/>
			                </label></td>
			            </tr>

      			</table>
      	      		<div><br><input name="group" type="hidden" value="<?php echo $group; ?>">
              		<input type="submit" name="submit" value="Add Email Contacts" /><br></div>   
        		</form>-->
        
		    <!--<h3>View/Edit Email Contact List</h3>
		    <p>To view contacts by last name click a letter below or "View All".</p>
		    <div class="navAlpha">
		          <ul class="setupNav">
		        <li><a href="">A</a></li>
		        <li><a href="">B</a></li>
		        <li><a href="">C</a></li>
		        <li><a href="">D</a></li>
		        <li><a href="">E</a></li>
		        <li><a href="">F</a></li>
		        <li><a href="">G</a></li>
		        <li><a href="">H</a></li>
		        <li><a href="">I</a></li>
		        <li><a href="">J</a></li>
		        <li><a href="">K</a></li>
		        <li><a href="">L</a></li>
		        <li><a href="">M</a></li>
		        <li><a href="">N</a></li>
		        <li><a href="">O</a></li>
		        <li><a href="">P</a></li>
		        <li><a href="">Q</a></li>
		        <li><a href="">T</a></li>
		        <li><a href="">D</a></li>
		        <li><a href="">Y</a></li>
		        <li><a href="">U</a></li>
		        <li><a href="">V</a></li>
		        <li><a href="">W</a></li>
		        <li><a href="">X</a></li>
		        <li><a href="">Y</a></li>
		        <li><a href="">Z</a></li>
		        <li>|</li>
		        <li><a href="">View All</a></li>
		      </ul>
		          <p>&nbsp;</p>
		        </div>-->
		    <!--end navAlpha-->
		    
   <!--   <form class="distributor1" action="../handleDistributorSetup.php" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="viewcontacts">
        <tr>
              <td><label for="FName4">First Name</label></td>
              <td><label for="LName4">Last Name</label></td>
              <td><label for="relation4">Relation To</label></td>
              <td><label for="phone4">Phone Number</label></td>
              <td><label for="email4">Email Address</label></td>
              <td><label for="removeContact" class="remove" width="100px">Remove</label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName4" name="FName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName4" name="LName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title4" name="title4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone4" name="phone4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email4" name="email4"/>
                </label></td>
              <td><input name="remove" type="button" id="remove" title="remove" value="X"></td>
            </tr>
        <tr>
              <td>&nbsp;</td>
            </tr>
        <tr>
            <td><input type="submit" value="Print" /></td>
              <td><input type="submit" value="Save" /></td>
          </tr>
      </table>
              <input type="submit" value="Print" />
              <input type="submit" value="Save" />
        </form>-->  
        
    <p>&nbsp;</p>
    <span id="message">
    </span>
    <h5>Send Emails</h5>
    <p>Personalize your email by selecting one or all recipients.<br>Then Select an editable prewritten greeting for the type of email you wish to send, or create your own.</p>
    
    <form id="sendemail" class="graybackground" method="post" action="email_personalised_form.php?group=<?php echo $dealerID; ?>">
          <?php
              if (!$link){
                  die('Could not connect: ' . mysqli_error());
              }
              //$sql="SELECT * FROM orgCustomers WHERE fundMemberID ='$dealerID' AND fundGroupID = '$group'";
              $sql = "SELECT * FROM orgCustomers WHERE fundMemberID = '$dealerID'";
              $result = mysqli_query($link, $sql) or die (mysqli_error());
              echo "<select name='logdropdown'>
                    <option>Select Contact</option>
                    <option value='Everyone'>Everyone</option>";
              while ($row = mysqli_fetch_array($result))
                  {
                  $customername = $row["first"].' '.$row["last"];
                  $customeremail = $row["email"];
                  echo "<option value='$customeremail'>$customername</option>";
                  }// end while
                  echo "</select>";
                  ?>
                  <script language="javascript" type="text/javascript">
			
			function change_input(strURL)
			{
			  var req;
			  
					// Opera 8.0+, Firefox, Safari
					req = new XMLHttpRequest();
				
			
					//function to be called when state is changed
					req.onreadystatechange = function()
					{
					  //when state is completed i.e 4
					  if (req.readyState == 4)
					  {
							// only if http status is "OK"
							if (req.status == 200)
							{
									document.getElementById('message').value=req.responseText;
							}
							else
							{
									alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
			
						   
					  }
					}
					req.open("GET", strURL, true);
					req.send(null);
			  
			}
			
			</script>
          <select name="logdropdown1" id="logdropdown1"  onchange="change_input('efind_ccode.php?logdropdown1='+this.value)">
        <option value="0">Select Type of E-mail</option>
        <option value="Announcement">Fundraiser Announcement</option>
        <option value="Reminder">Fundraiser Reminder</option>
        <option value="FinalEmail">End of Fundraiser</option>
        <option value="Personalized">Personalized E-mail</option>
      </select>
          <br>
          <br>
          <textarea name="message" id="message"rows="10" cols="100"></textarea>
          <br>
          <br>
          <input type="submit" class="redbutton" value="Send Email"/>
        </form>
        <br>
  	</div> <!--end content -->
  	
      	<?php include '../includes/footer.php' ; ?>
    	</div> <!--end container-->
	</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>