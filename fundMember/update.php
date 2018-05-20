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
   $customer = $_GET['id'];
   // Processing form data when form is submitted
   if(isset($_POST["submit"]))
   {
    // Get hidden input value
    $id = $_POST["id"];
    $fname1 = mysqli_real_escape_string($link, sanitize($_POST['fname']));
    $lname1 = mysqli_real_escape_string($link, sanitize($_POST['lname']));
    $title1 = mysqli_real_escape_string($link, sanitize($_POST['title']));
    $gender1 = mysqli_real_escape_string($link, sanitize($_POST['gender']));
    $email1 = mysqli_real_escape_string($link, sanitize($_POST['email']));
    $relation1 = mysqli_real_escape_string($link, sanitize($_POST['rel']));
    $phone1 = mysqli_real_escape_string($link, sanitize($_POST['phone']));


    // Prepare an insert statement
    $sqlUpdate = "UPDATE orgCustomers SET 
    first = '$fname1', 
    last = '$lname1', 
    relationship = '$relation1', 
    gender = '$gender1', 
    email = '$email1', 
    workPhone = '$phone1', 
    title = '$title1' 
    WHERE customerID = '$customer' AND fundMemberID = '$userName'";
    
    $updateQuery = mysqli_query($link, $sqlUpdate)or die("MySQL ERROR  update query 1: ".mysqli_error($link));
    if($updateQuery)
    {
        header( 'Location: contacts.php' );
    }
 
     
   }//end post submit
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
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysqli_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];
   
   //get customer info
   $getCustomer = "SELECT * FROM orgCustomers WHERE customerID = '$customer'";
   $custResult = mysqli_query($link, $getCustomer)or die("Could not get customer query.".mysqli_error($link));
   $custRow = mysqli_fetch_assoc($custResult);
   $fname = $custRow['first'];
   $lname = $custRow['last'];
   $email = $custRow['email'];
   $phone = $custRow['workPhone'];
   $relation = $custRow['relationship'];
   $gender = $custRow['gender'];
   $title = $custRow['title'];
   
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
	        <?php include 'header(1).php' ; ?>
		<?php include 'memberSidebar_new.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="content">
	
		<div class="wrapper">
		    <div id="border">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Edit Contact</h2>
                    </div>
                    <p>Edit <?php echo $fname.' '.$lname; ?>.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" name="updateForm">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <select class="form-control" id="sel1" name="gender">
                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" required>
                        </div>
                        <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" required>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email Address</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" id="example-email-input" required>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label><br>
                            
                            <input type="text" name="phone" value="<?php echo $phone; ?>" class="input-medium bfh-phone" data-format="ddd-ddd-dddd" id="phone">
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Relationship</label>
                            <input type="text" name="rel" class="form-control" value="<?php echo $relation; ?>">
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
	
	
	
	<?php include 'footer(1).php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>