<?php
	include '../includes/autoload.php';

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
  
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   
   $group = $_GET['group'];
   $type = $_POST['RadioGroup1'];
   $fundtype = $_POST['fundtype'];
?>
<!DOCTYPE html>
<head>
	<title>Setup Group Information | Representative</title>
</head>

<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sideLeftNav.php' ; ?>

<div id="content">  
      <h1>Add New Fundraiser</h1>
      <h3>Step 2: Setup Fundraising Group Information</h3>
      
      <div class="table">
      <form class="" action="addFundraiser.php" method="post" id="myForm" name="myForm" onsubmit="return validate(this);" enctype="multipart/form-data">
      
              <select name="" id="">
              <option>Select Organization</option>
      		<?
      		    $sql = "SELECT * FROM organizations WHERE repID = '$userID'";
      		    $getOrgs = mysqli_query($link, $sql)
      		    or die ("couldn't execute query organizations.".mysql_error());
      		    while($rowR = mysqli_fetch_assoc($getOrgs))
      		    {
      		       echo '<option value="$rowR[orgID]">'.$rowR[orgName].' '.$rowR[orgCity].' '.$rowR[orgState].'</option>';
      		    }
      		?>
      		</select>
		<div class="interim-form">
			<div class="interim-header"><h2>Website</h2></div>
				<div class="row">
					<span id="hd_url"><?php echo $fundtype; ?>'s<br>Existing Website URL</span>
				</div> <!-- end row -->
				<div class="row">
					<input id="url" name="websiteURL" type="url" maxlength="250">include http://
				</div> <!-- end row -->
				
				<div class="row">
					<span id="hd_banner"><?echo $fundtype;?>'s Banner</span>
				</div> <!-- end row -->
				<div class="row">
					<input id="AddOrgBannerPhoto" name="banner" type="file">
				</div> <!-- end row -->
		</div> <!-- end interim-form -->
	
		
	<div id="showClubs"></div>

       
              
         <br>
        <input type="hidden" name="fundtype" value="<?php echo $fundtype; ?>" />
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" />
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />
        <input type="submit" name="submit" class="redbutton" value="Create New Fundraiser">
      </form>
      <br>
        
        </div> <!-- end table -->
  </div> <!--end content-->
  
      <div class="clearfloat"></div>
   <?php include '../includes/footer.php' ; ?>
    </div> <!--end container--> 
    
<script>
function validateGroupname(field)
{
	if (field == "") {return "No Group name was entered.\n"}
	return ""
}
function validateAddress1(field)
{
	if (field == "") {return "No Address1 was entered.\n"}
	return ""
}
function validateAddress2(field)
{
	if (field == "") {return "No Address2 was entered.\n"}
	return ""
}
function validateCity(field)
{
	if (field == "") {return "No city was entered.\n"}
	return ""
}
function validateState(field)
{
	if (field == "") {return "No state was selected.\n"}
	return ""
}
function validateZip(field)
{
	if (field == "") {return "No zip was entered.\n"}
	var zip = validateZipCode(field)
	if(!zip){return "Zip not entered correctly.\n"}
	return ""
}
function validateWebsiteURL(field)
{
	if (field == "") {return "No Website URL was entered.\n"}
	return ""
}
function validateClubs(field)
{
	if (field == "") {return "No clubs were chosen.\n"}
	return ""
}
function validateZipCode(elementValue){
    var zipCodePattern = /^\d{5}$|^\d{5}-\d{4}$/;
     return zipCodePattern.test(elementValue);
}

</script>
</body>
</html>
<?php
   ob_end_flush();
?>