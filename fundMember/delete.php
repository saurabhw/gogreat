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
   //require_once("../includes/functions.php");
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
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysqli_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];
   
   $customer = trim($_GET["id"]);
   $getCustomer = "SELECT * FROM orgCustomers WHERE customerID = '$customer'";
   $cResult = mysqli_query($link, $getCustomer)or die ("couldn't execute customer query.".mysqli_error($link));
   $cRow = mysqli_fetch_assoc($cResult);
   $fname = $cRow['first'];
   $lname = $cRow['last'];


	// mysqli_fetch_row - the results are in an array, keys are integers
	// mysqli_fetch_assoc - the results are in an associative array, keys are the column names
	// mysqli_fetch_array - the results are both, indexed by integer and column names

// Process delete operation after confirmation
if(isset($_POST["submit"]))
{
    $who = $_POST['id'];
    $del = "DELETE FROM orgCustomers WHERE customerID = '$who' AND fundMemberID = '$userName'";
    $delete = mysqli_query($link, $del)or die ("couldn't execute delete query.".mysqli_error($link));
    if($delete)
    {
        header('Location: contacts.php');
    }
}
?>

<!DOCTYPE html>
<head>
	<title>View Record</title>
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
                        <h1>Delete <?php echo $fname.' '.$lname; ?>?</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger" name="submit">
                                <a href="contacts.php" class="btn btn-default">No</a>
                            </p>
                        </div>
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