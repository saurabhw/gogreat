<?php
    session_start();
    if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
   require_once("../includes/connection.inc.php");
   require_once("../includes/functions.php");
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $userEmail = $_SESSION['email'];
   $userName = $_SESSION['groupid'];
   $query1 = "SELECT * FROM Dealers WHERE loginid='$userName'";
   $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
   $row = mysqli_fetch_assoc($result1);
   $dealerID = $row['loginid'];
   $group = $row['setuppersonid'];
   $myPic = $row['contact_pic']; 
   //$goal = $row['goal2'];
   $twit = $row['twitter']; 
   $face = $row['facebook']; 
   $banner = $row['banner_path'];

   $so_far = getSoloSales($dealerID);
   //get parent info
   $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];
   $repID = $pRow['setuppersonid'];


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
    
    //insert contact
    $query = "INSERT INTO orgCustomers (first, last, relationship, gender, email, workPhone, fundMemberID,fundGroupID, repID, title)
    VALUES('$fname1', '$lname1',  '$relation1', '$gender1', '$email1', '$phone1', '$dealerID', '$group', '$repID', '$title1')";
    $result = mysqli_query($link, $query)or die("MySQL ERROR query 1: ".mysqli_error($link));
     
    if($result)
    {
        header( 'Location: contacts.php' );
    }
 }
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
	        <?php include 'header(1).php' ; ?>
		<?php include 'memberSidebar_new.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="content">
	
		<div class="wrapper">
		    <br>
		    <div id="border">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Contact</h2>
                    </div>
                    <p>Fill in this form and submit to add contact record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
	
	
	
	<?php include 'footer(1).php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>