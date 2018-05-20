<?php
    session_start();
    if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
     
    ob_start();
    $userID = $_SESSION['userId'];
    ini_set('display_errors', '0'); // errors reporting on
    error_reporting(E_ALL); // all errors
    require_once('../includes/functions.php');
    require_once('../includes/connection.inc.php');
    require_once('../includes/imageFunctions.inc.php');
    $link = connectTo();
    $sc = mySCRep['$userID'];
    $vp = myVPRep['$userID'];
    
    /*
   $so_far = getSoloSales($dealerID);
   //get parent info
   $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];
   $repID = $pRow['setuppersonid'];
   */


	// mysqli_fetch_row - the results are in an array, keys are integers
	// mysqli_fetch_assoc - the results are in an associative array, keys are the column names
	// mysqli_fetch_array - the results are both, indexed by integer and column names
  // Include config file
 require_once 'config.php';
 
 // Define variables and initialize with empty values
 $name = $address = $salary = "";
 $name_err = $address_err = $salary_err = "";
 
 // Processing form data when form is submitted
 if(isset($_POST['submit']))
 {
    $fname1 = mysqli_real_escape_string($link, preg_replace("/[^a-zA-Z]/", "", sanitize($_POST['fname'])));
    $lname1 = mysqli_real_escape_string($link, sanitize($_POST['lname']));
    $title1 = mysqli_real_escape_string($link, sanitize($_POST['title']));
    $gender1 = mysqli_real_escape_string($link, sanitize($_POST['gender']));
    $email1 = mysqli_real_escape_string($link, sanitize($_POST['email']));
    $relation1 = mysqli_real_escape_string($link, sanitize($_POST['rel']));
    $phone1 = mysqli_real_escape_string($link, sanitize($_POST['phone']));
    $member = $_POST['memberid'];
    $group = $_POST['groupid'];
    
    //insert contact
    $query = "INSERT INTO orgCustomers (first, last, relationship, gender, email, workPhone, fundMemberID,fundGroupID, repID, title, scID, vpID)
    VALUES('$fname1', '$lname1',  '$relation1', '$gender1', '$email1', '$phone1', '$member', '$group', '$userID', '$title1', '$sc', '$vp')";
    $result = mysqli_query($link, $query)or die("MySQL ERROR query 1: ".mysqli_error($link));
     
    if($result)
    {
        header( 'Location: contacts.php' );
    }
 }
 
   
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
?>

<!DOCTYPE html>
<head>
	 <title>Add Contact</title>
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
        <div class="container-fluid">
            <h2 align="center">Create Contact</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            	<div class="row">
					     <!--<span id="ga"></span>-->
						<select class="" name="groupid" id="groupid" onChange="fetch_select2(this.value);" required>
							<option value="">Select FR Account</option>
							<?php 
						$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID' AND isMainGroup = 0 ORDER BY Dealer asc";
						$result = mysqli_query($link, $getAccount)
						or die("MySQL ERROR om query 1: ".mysqli_error($link));
						while($row = mysqli_fetch_assoc($result))
						{
						  $dealerName = $row['Dealer'];
						  echo '
						  <option value="'.$row['loginid'].'">'.$dealerName.' '.$row[DealerDir].'</option>
						  ';
					        }
						?>
						</select>
						<br>
						<br>
						<!-- <span id="ma"></span>-->
						<select class="" name="memberid" id="memberid" required>
						<option value="">Select Member</option>
						</select>
					</div> <!-- end row -->
					<br><br>
            <div id="border">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        
                    </div>
                    <p>Fill in this form and submit to add contact record to the database.</p>
                    
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="" name="title">
                        </div>
                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <select class="form-control" id="sel1" name="gender">
                            <option value="">---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>" >
                            <label>Relationship</label>
                            
                            <select class="form-control" id="sel1" name="rel" required>
                            <option value="">---</option>
                            <option value="Business Associate">Business Associate</option>
                            <option value="Business Supporter">Business Supporter</option>
                            <option value="Friend & Family">Friend & Family</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="" required>
                        </div>
                        <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="" required>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email Address</label><br>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label><br>
                            <input type="text" class="input-medium bfh-phone" data-format="ddd-ddd-dddd" name="phone" id="phone">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        <a href="contacts.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            </div>
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