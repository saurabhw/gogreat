<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
include '../../includes/connection.inc.php';
$link = connectTo();
$group = $_GET['groupid'];
// Get fundraiser name
$fund_query = "SELECT * FROM Dealers WHERE loginid = '$group'";
$fund_result = mysqli_query($link, $fund_query) or die(mysqli_error($link));
if($fund_result){
    $row = mysqli_fetch_assoc($fund_result);
    $fund_name = $row['Dealer']." ".$row['DealerDir'];
    $fund = $row['Dealer'];
} 
?>
<!DOCTYPE html>
<head>
<title>View Contacts | Sales Coordinator</title>
<link rel="stylesheet" type="text/css" href="../../css/layout_styles.css">
<link rel="stylesheet" type="text/css" href="../../css/form_styles.css">
<link rel="stylesheet" type="text/css" href="../../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../../css/sidebar_nav.css">
<link rel="shortcut icon" href="../../images/favicon.ico">

<script type="text/javascript">
function validate(form) {
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
</script>
</head>

<body id="contacts">
	<div id="container">
      		<?php include 'header.inc.php' ; ?>
	       	<?php include 'acct_sidenav.php' ; ?>
	       	
    <div id="content">
	<h1>View Fundraising Leader Contacts</h1>
    	<h3><?php echo $fund_name; ?> Current Contacts</h3>
     	
     	<div id="table">
      	<div id="graybackground">
	        <div id="row">
	          <span id="fname">First</span>
	          <span id="lname">Last</span>
	          <span id="title">Position Title</span>
	          <span id="loginemail">Email</span>
	          <span id="phone">Phone</span>
	        </div> <!-- end row -->
	        
        <?php
        $contact_query = "SELECT * FROM orgContacts WHERE fundraiserID = '$group'";
        $contact_result = mysqli_query($link, $contact_query) or die(mysqli_error($link));
        if($contact_result){
           while ($row = mysqli_fetch_assoc($contact_result)){
              
              echo '<div id="row">
                  <input id="fname" type="text" name="" value="'.$row['orgFName'].'"/>
                  <input id="lname" type="text" name="" value="'.$row['orgLName'].'"/>
                  <input id="title" type="text" name="" value="'.$row['Title'].'"/>
                  <input id="loginemail" type="text" name="" value="'.$row['orgEmail'].'"/>
                  <input id="phone" type="text" name="" value="'.$row['orgPhone'].'"/>
                  <span><a href="editContact.php?gp='.$_GET["groupid"].'&id='.$row['orgContactID'].'"><input id="redbutton" type="button" name="Edit" value="Edit" /></a></span>

                   <span><form action="" method="post">
                     <input type="hidden" name="delete_id" value="'.$row['orgContactID'].'" />
                     <a href="destroyUser.php?gp='.$_GET["groupid"].'&conid='.$row['orgContactID'].'"><input id="redbutton" type="button" name="delete" value="X" title="Delete Contact"/></a>
                  </form></span>
                  </div>';
                  
	   }// end while
	   	   
	}// end if
        ?>
        </div> <!-- end graybackground -->
        <br>
        <p><a href="addContacts.php?groupid=<? echo $_GET['groupid'];?>"><input id="redbutton" type="button" value="Add Contacts" /></a></p>
        </div> <!-- end table -->
          </div> <!--end content-->
          
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>