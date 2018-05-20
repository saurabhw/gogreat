<?php
    session_start(); // session start
    ob_start();
    ini_set('display_errors', '0'); // errors reporting on
    error_reporting(E_ALL); // all errors
    require_once('../includes/functions.php');
    require_once('../includes/connection.inc.php');
    require_once('../includes/imageFunctions.inc.php');
    $link = connectTo();
    $who = $_GET['id'];
    $gp = $_GET['mi'];
    //$groupID = $_SESSION['groupid'];
    $userID = $_SESSION['userId'];
    $group = $who;
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
      $check = checkContactChainRep($userID,$group);
      if(!is_numeric($group) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }	 

 if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $t = mysqli_real_escape_string($link, $_POST['title']);
	   $gd = mysqli_real_escape_string($link, $_POST['gender']);
	   $f = mysqli_real_escape_string($link, $_POST['fname']);
	   $l = mysqli_real_escape_string($link, $_POST['lname']);
	   $e = mysqli_real_escape_string($link, $_POST['email']);
	   $p = mysqli_real_escape_string($link, $_POST['phone']);
	   $ad1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $ad2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $fb = mysqli_real_escape_string($link, $_POST['fb']);
	   $tw = mysqli_real_escape_string($link, $_POST['tw']);
	   $cn = mysqli_real_escape_string($link, $_POST['cn']);
	   $rel = mysqli_real_escape_string($link, $_POST['rel']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   $who = mysqli_real_escape_string($link, $_POST['who']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	   $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	$query3 = "UPDATE orgCustomers SET
  				first = '$f',
  				last = '$l',
  				companyname = '$cn',
  				relationship = '$rel',
  				gender = '$gd',
  				email = '$e',
  				workPhone = '$p',
  				ext = '$ext',
  				address = '$ad1',
  				apt = '$ad2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				image_path = '$p',
  				title = '$t'
  				WHERE customerID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2&& $result3){
  	   
  	    $redirect = "Location:contacts.php?group=$xgroup";
  	    header("$redirect");
  	}
  	}
// Get fundraiser name

$cs = "SELECT * FROM orgCustomers WHERE  customerID = '$who'";
$cs_result = mysqli_query($link, $cs) or die(mysqli_error($link));
if($cs_result){
    $row = mysqli_fetch_assoc($cs_result);
    $title = $row['title'];
    $fn = $row['first'];
    $ln = $row['last'];
    $em = $row['email'];
    $ad1 = $row['address'];
    $ad2 = $row['apt'];
    $cty = $row['city'];
    $st = $row['state'];
    $zp = $row['zip'];
    $rel = $row['relationship'];
    $cn = $row['companyname'];
    $gnd = $row['gender'];
    $ph = $row['workPhone'];
    $ex = $row['ext'];
    

   
   $myQuery = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysqli_error($link));
   $myRow = mysqli_fetch_assoc($myResult);
  
   $pic = $myRow['picPath'];
    
} 
?>

<!DOCTYPE html>
<head>
	<title>Update  | Contacts</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
	
<body>
<div id="container">
	        <?php include 'header.inc.php' ; ?>
           <?php include 'sideLeftNav.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="content">
	
		<div class="wrapper">
		    <h2 align="center">Edit Contact</h2>
		    <div id="border">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        
                    </div>
                    <p>Edit <?php echo $fn.' '.$ln; ?>.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" name="updateForm">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <select class="form-control" id="sel1" name="gender">
                            <option value="<?php echo $gnd; ?>"><?php echo $gnd; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $fn; ?>" required>
                        </div>
                        <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $ln; ?>" required>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email Address</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $em; ?>" id="example-email-input" required>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label><br>
                            
                            <input type="text" name="phone" value="<?php echo $ph; ?>" class="input-medium bfh-phone" data-format="ddd-ddd-dddd" id="phone">
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Relationship</label>
                            <input type="text" name="rel" class="form-control" value="<?php echo $rel; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $customer; ?>"/>
                       
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        <a href="contacts.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  </div>      
        </div>
    </div>
		
	</div>
	
	<!--END MAIN CONTENT-->
	
	
	
	<?php include 'footer.php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>