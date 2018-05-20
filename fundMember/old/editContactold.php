<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
$link = connectTo();

 if(isset($_POST['submit']))
 {
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $ttl = mysqli_real_escape_string($link, $_POST['title']);
	   $fn = mysqli_real_escape_string($link, $_POST['fname']);
	   $ln = mysqli_real_escape_string($link, $_POST['lname']);
	   $em1 = mysqli_real_escape_string($link, $_POST['email']);
	   $phn = mysqli_real_escape_string($link, $_POST['phone']);
	   $gnd = mysqli_real_escape_string($link, $_POST['gender']);
	   $rl = mysqli_real_escape_string($link, $_POST['rel']);
	   //$c = mysqli_real_escape_string($link, $_POST['phone']);
	   $cn = mysqli_real_escape_string($link, $_POST['cn']);
	   //$c = mysqli_real_escape_string($link, $_POST['cphone']);
	   $id = mysqli_real_escape_string($link, $_POST['id']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $ad = mysqli_real_escape_string($link, $_POST['ad1']);
	   $ad2 = mysqli_real_escape_string($link, $_POST['ad2']);
	   $who = $_GET['con'];
	   //$who = mysqli_real_escape_string($link, $_POST['conid']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	  /* $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who' AND fundraiserID='$dealerID'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	*/
  	
  	  $query3 = "UPDATE orgCustomers SET
  				first = '$fn',
  				last = '$ln',
  				companyname = '$cn',
   				relationship = '$rl',
   				gender = '$gnd',
  				email = '$em1',
  				workPhone = '$phn',
   				address = '$ad',
   				apt = '$ad2',
   				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				title = '$ttl'
  				WHERE customerID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	
  	
  	if($result3){
  	   
  	    $redirect = "Location:contacts.php";
  	    header("$redirect");
  	}
  	
  }
    $user = $_SESSION['userId'];
    $userName = $_SESSION['email'];
    $userID = $_SESSION['groupid'];
    $query1 = "SELECT * FROM Dealers WHERE loginid = '$userID'";
    $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
    $row = mysqli_fetch_assoc($result1);
    $dealerID = $row['loginid'];
    $group = $row['setuppersonid']; 
    $myPic = $row['contact_pic'];
    $who = $_GET['con'];
    $gp = $_GET['gp'];
    // Get fundraiser name
    $cs = "SELECT * FROM orgCustomers WHERE customerID='$who' AND fundMemberID ='$userID'";
    $cs_result = mysqli_query($link, $cs) or die(mysqli_error($link));
    if($cs_result){
    
    $row = mysqli_fetch_assoc($cs_result);
    $cid = $row['customerID'];
    $cn = $row['companyname'];
    $fn = $row['first'];
    $ln = $row['last'];
    $em = $row['email'];
    $ph = $row['workPhone'];
    $rel = $row['relationship'];
    $bd = $row['birthday'];
    $gen = $row['gender'];
    $add1 = $row['address'];
    $add2 = $row['apt'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $wp = $row['workPhone'];
    $title = $row['title'];
    
    
    
} 
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Edit Contact</title>
</head>

<body>
	<div id="container">
      		<?php include 'header.php' ; ?>
	       	<?php include 'memberSidebar.php' ; ?>
      	
    <div id="content">
    <h1>Edit Contact</h1>
    <h3>Edit <?php echo $fn; echo '&nbsp;'; echo $ln;?></h3>
     <? echo $user; echo '&nbsp;'; echo $userID; echo '&nbsp;'; echo $userName;?>
     <form method="post" action="saveContact.php" onsubmit="return validate()" name="myForm" enctype="multipart/form-data">
      <table id="fm_contacts">
		<tr>
		        <th>Company Name</th>
			<th>Title</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Relationship</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Contact Phone</th>
			<th>Email Address</th>
		</tr>
		
		<tr class="graybackground">
		        <td class="cn"><input type="text" name="cn" value="<? echo $cn;?>" /></td>
			<td class="title"><input type="text" name="title" value="<? echo $title;?>" /></td>
			<td class="fn"><input type="text" name="fname" value="<? echo $fn;?>" /></td>
			<td class="ln"><input type="text" name="lname" value="<? echo $ln;?>" /></td>
			<td class="ln"><input type="text" name="rel" value="<? echo $rel;?>" /></td>
			<td class="gender">
				<select name="gender" value="">
					<option value="<?php echo $gen;?>" selected><?php echo $gen;?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</td>
			<td class="address">
				<input id="address1" type="text" name="ad1" value="<? echo $add1;?>">
				<input id="address2" type="text" name="ad2" value="<? echo $add2;?>"><br>
				<input id="city" type="text" name="city" value="<? echo $city;?>">
				<input id="state" type="text" name="state" value="<? echo $state;?>">
				<input id="zip" type="text" name="zip" value="<? echo $zip;?>">
			</td>
			<td class="hph"><input type="text" name="phone" value="<? echo $ph;?>" maxlength="14"></td>
			
			<td class="email"><input type="text" id="email" name="email" value="<? echo $em;?>" /></td>
		</tr>
        </table>
        
        	<input type="hidden" name="id" value="<? echo $who;?>" />
  		<input type="hidden" name="gp" value="<? echo $gp;?>" />
  		<input type="submit" name="submit" class="redbutton" value="Save" />
  		
        </form>

          </div> <!--end content-->
      <?php include '../includes/footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>