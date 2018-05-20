<?php
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }


// check if form has been submitted
/*if(isset($_POST['submit'])){
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
$groupid = $_POST['group'];

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
       
            $emailsql = "SELECT * FROM orgContacts WHERE fundraiserID ='$groupid' AND orgEmail='$emails[$x]';";
            
            $emailresult = mysqli_query($link, $emailsql) or die(mysqli_error());;
            if(mysqli_num_rows($emailresult) < 1){
           
               mysqli_query($link, "INSERT INTO orgCustomers (orgRel, orgFName, orgLName, orgPhone, orgEmail, fundraiserID,
               			    fund_owner_id, org_contact_created)
                                    VALUES('$rel[$x]', '$fnames[$x]', '$lnames[$x]', '$phones[$x]', '$emails[$x]',
                                    '$groupid', '$repid', now())") or die(mysqli_error());
                           
	    }
	}
    }
    ++$x;
}
} end if(isset($_POST['submit']))*/

$group = $_POST['clubidemail'];
$rep = $_SESSION['userId'];

   $queryx = "SELECT * FROM Dealers WHERE loginid='$group'";
   $resultx = mysqli_query($link, $queryx)or die ("couldn't execute queryx.".mysql_error());
   $row = mysqli_fetch_assoc($resultx);
   $user_name = $row['userName'];
   $pass = $row['firstPass'];

?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>GreatMoods | Send Email</title>
		<script type="text/javascript">
		</script>
		<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
		<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
		<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
		<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
	</head>
	
	<body id="contacts">
		<div id="container">      	
		
               <?php include 'header.inc.php' ; ?>
		<?php include 'sideLeftNav.php' ; ?>
      		<div id="contentMain858">
       			<!--<div class="nav2">
         			<ul class="setupNav">
        				<li><a href="rephome.php" class="infonav">Account Home</a></li>
        				<li>|</li>  
       					<li><a href="contacts.php?group=<?echo $group;?>" class="contactsnav">Contacts</a></li>
       					<li>|</li>
       					<li id="current"><b>Send Emails</b></li>
     				</ul>
        		</div>--> 
        		
    			<h1>Send Email</h1>
    			<h3>Current Email Contacts</h3>
    			
     			<div class="distributor1">
      				<table id="contacts">
				         <tr>
				              <td><label for="FName">First Name</label></td>
				              <td><label for="LName">Last Name</label></td>
				              <td><label for="rel">Relationship</label></td>
				              <td><label for="email">Email Address</label></td>
				              <td><label for="phone">Phone Number</label></td>
				         </tr>
        
				        <?php
				        $contact_query = "SELECT * FROM orgContacts WHERE fundraiserID = '$group'";
				        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
				        if($contact_result){
				           while ($row = mysqli_fetch_assoc($contact_result)){
				              
				              echo '<tr>
				                  <td>'.$row['orgFName'].'</td>
				                  <td>'.$row['orgLName'].'</td>
				                  <td>'.$row['orgRel'].'</td>
				                  <td>'.$row['orgEmail'].'</td>
				                  <td>'.$row['orgPhone'].'</td>
				                  
				                  </tr>';
				                  
					   }// end while
					   	   
					}// end if
				        ?>
        
        			</table>
        		</div>
        		
        	
        
    		
    <h3>Send Email</h3>
    <p>Send a notification of account to fundraiser contacts.</p>
    <form id="sendemail" class="distributor1" method="post" action="email_personalised_form.php?group=<?php echo $group; ?>">
          <?php
              if (!$link){
                  die('Could not connect: ' . mysqli_error());
              }
              $sql="SELECT * FROM orgContacts  WHERE  fundraiserID = '$group'";
              $result = mysqli_query($link, $sql) or die (mysqli_error());
              echo "<select name='logdropdown'>
                    <option>Select Contact</option>
                    <option>Everyone</option>";
              while ($row=mysqli_fetch_array($result)) {
                  $customername=$row["orgFName"].' '.$row["orgLName"];
                  $customeremail=$row["orgEmail"];
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
         <!-- <select name="logdropdown1" id="logdropdown1"  onchange="change_input('efind_ccode.php?logdropdown1='+this.value)">
        <option value="0">Select Type of E-mail</option>
        <option value="Announcement">New Account Notification</option>
      </select>-->
          <br />
          <br />
          <textarea name="message" id="message"rows="10" cols="50">
You have a new account and fundraising website at GreatMoods! Check out your site: http://www.greatmoods.com/fundSite.php?group=<? echo $group;?>
     Name: <? echo $user_name;?>
   Password: <? echo $pass;?>
          </textarea>
          <br />
          <br />
          <input type="submit" value="Send Email"/>
        </form>
  	</div> <!--end contentMain858-->
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