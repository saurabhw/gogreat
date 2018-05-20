<?php
   session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
        {
            header('Location: ../index.php');
            exit;
        }
    if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       /*
       $check = checkChainGroupSC($userID,$groupid);
      if(!is_numeric($groupid) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }	
	
        */
	$groupid = $_GET["group"];
	$groupid = ereg_replace("[^0-9]", "", $groupid);
    $userID = $_SESSION['userId'];
    $query1 = "SELECT * FROM user_info WHERE userInfoID = '$userID'";
    $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
    $row = mysqli_fetch_assoc($result1);
    $myPic = $row['picPath'];
        
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	 
	   $groupName = mysqli_real_escape_string($link, $_POST['frname']);
	   $url = mysqli_real_escape_string($link, $_POST['websiteURL']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $fund = mysqli_real_escape_string($link, $_POST['groupID']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $phone = mysqli_real_escape_string($link, $_POST['phone']);
	   $facebookURL = mysqli_real_escape_string($link, $_POST['fb']);
	   $twitterURL = mysqli_real_escape_string($link, $_POST['twitter']);
	   $contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);  
	   $payMail = mysqli_real_escape_string($link, $_POST['pal']);
	   $abt = mysqli_real_escape_string($link, $_POST['about']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   $bannerPic = $_FILES['banner']['tmp_name'];
           $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/banners/';
           $bannerPicPath = "";
	   
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	   function process_image($name, $id, $tmpPic, $baseDirPath){
		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic))
		{
			// is not an image
			$msg .= $cleanedPic . " is not an image file. <br />";
		} else
			{
				if($_FILES['$name']['error'] > 0)
				{
					$msg .= $_FILES['$name']['error'] . "<br />";
				} else
					{
						if(file_exists($baseDirPath.$id."/".$cleanedPic))
						{
							$imagePath = "images/banners/".$id."/".$cleanedPic;
						} else
							{
								$picDirectory = $baseDirPath;
								
								if (!is_dir($picDirectory.$id))
								{
									mkdir($picDirectory.$id);
								}
								$picDirectory = $picDirectory.$id."/";
								move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
								$msg .= "\n$cleanedPic uploaded.<br />";
								$imagePath = "images/banners/".$id."/".$cleanedPic;
							} //end else
							return $imagePath;
					} //end else
			}// and else
	}// process_image
	
	     $query = "UPDATE Dealers SET
   				Dealer = '$groupName',
   				Phone = '$phone',
   				Fax = '$ext',
  				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
   				State = '$state',
  				Zip = '$zip',
   				website = '$url'
  				WHERE loginid = '$fund'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: query 1 ".mysqli_error($link)); 
  				
  		
	   $query2 = "UPDATE Dealers SET
   				Dealer = '$groupName',
   				Phone = '$phone',
   				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
  				State = '$state',
  				Zip = '$zip',
  				website = '$url'
  				WHERE sponsorid = '$fund'";
  				$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query2 ".mysqli_error($link)); 	
  				if($bannerPic != ''){
		$bannerPicPath = process_image('banner', $fund, $bannerPic, $imageDirPath);
		if($bannerPicPath !=''){
			$queryW = "UPDATE Dealers SET Banner = '$bannerPicPath', banner_path = '$bannerPicPath' WHERE Dealer = '$groupName'";
			mysqli_query($link, $queryW)or die("MySQL ERROR on query w: ".mysqli_error($link));
			}
		}	
  	if($result && $result2){
  	    $redirect = "Location:editClub.php";
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query3 = "SELECT * FROM $table WHERE loginid='$groupid'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));
	$row2 = mysqli_fetch_assoc($result3);
	$fundraiserid = $row2['loginid'];
	$orgName = $row2['Dealer'];
	$group_name = $row2['DealerDir'];
	//$name = $row2['Address1'];
	$phone = $row2['Phone'];
	$address1 = $row2['Address1'];
	$address2 = $row2['Address2'];
	
	$contact_name = $row2['ContactName'];
	$city = $row2['City'];
	$zip = $row2['Zip'];
	$fax = $row2['Fax'];
        $state = $row2['State'];
        $email = $row2['email'];
        $url = $row2['website'];
        $twitter = $row2['twitter'];
        $face = $row2['facebook'];
        $pal = $row2['PaypalEmail'];
        $about = $row2['About'];
        $reasons = $row2['FundraiserReasons'];
        $goal = $row2['FundraiserGoal'];
        //$about = $row2['About'];
        $start = $row2['FundraiserStartDate'];
        $end = $row2['FundraiserEndDate'];
        $user_name = $row2['userName'];
        $user_pass = $row2['firstPass'];
        $current_banner = $row2['banner_path'];
        //set all session variables for multi part form
     
 
?>

<!DOCTYPE html>
<head>
<title>Edit Account Information | Representative</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
</style>
</head>

<body>
      <?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
 <div class="page-header">
	<h2 align="center">Edit Fundraising Account Information</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
	<br>
<div id="border">
	<form class="" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate();" enctype="multipart/form-data">
	<div class="table">
      		<div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="row" style="margin-left:2px;">
				<span style="line-height:35px;" id="hd_frname"><?echo $group_name;?>&nbsp;Name</span >
			</div> <!-- end row -->			
			<div class="row" style="margin-left:2px;">
				<input id="frname" type="text" name="frname" value="<? echo $orgName; ?>" maxlength="40" required>
			</div> <!-- end row -->
			<!-- Physical Address -->
			
			<div class="row" style="margin-left:2px;">
				<span style="line-height:35px;" id="hd_address1">Address 1</span>
        			<span style="line-height:35px;" id="hd_address2">Address 2</span >
			</div> <!-- end row -->
			<div class="row" style="margin-left:2px;">
				<input id="address1" type="text" name="address1" maxlength="50" value="<? echo $address1; ?>" required>
        			<input id="address2" type="text" name="address2" value="<? echo $address2 ?>" maxlength="50">
			</div> <!-- end row -->
			
			<div class="row" style="margin-left:2px;">
				<span style="line-height:35px;" id="hd_city">City</span >
        			<span style="line-height:35px;" id="hd_state">State</span >
        			<span style="line-height:35px;" id="hd_zip">Zip</span >
			</div> <!-- end row -->
			<div class="row" style="margin-left:2px;">
				<input id="city" type="text" maxlength="30" name="city" value="<? echo $city; ?>" required/>
        			<select id="state" name="state" required>
			                <option value="<? echo $state; ?>" selected="selected"><? echo $state; ?></option>
					<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
			        </select>
			        <input id="zip" name="zip" type="text" maxlength="5" value="<? echo $zip ?>" required/>
			</div> <!-- end row -->
			<!-- Physical Address End -->
			<div class="row" style="margin-left:2px;">
				
        			<span style="line-height:35px;" id="hd_zip">Phone</span >
			</div> <!-- end row -->
			<div class="row" style="margin-left:2px;">
			<input type="text" name="phone" id="phone" value="<? echo $phone; ?>" maxlength="14" />
			</div> <!-- end row -->
		</div> <!-- end interim-form -->
		<br>
		<div class="interim-form">
	<hr style="border-color:#b8b8b8;">
			<div class="interim-header"><h2>Website</h2></div>
				<div class="row" style="margin-left:2px;">
					<span style="line-height:35px;" id="hd_url"><?php echo $orgName; ?>'s<br>Existing Website URL</span >
				</div> <!-- end row -->
				<div class="row" style="margin-left:2px;">
					<input style="margin-left:2px;width:200px;" id="url" name="websiteURL" type="url" maxlength="250" value="<? echo $url; ?>" placeholder="&nbsp;include http://">
				</div> <!-- end row -->
				
				<div class="row" style="margin-left:2px;">
					<span style="line-height:35px;" id="hd_banner"><?echo $orgName;?>'s Banner</span >
				</div> <!-- end row -->
				<div class="row" style="margin-left:2px;">
					<input style="margin-left:2px;" id="banner" name="banner" type="file">
				</div> <!-- end row -->
				
		</div> <!-- end interim-form -->  
		<br>
               <div class="interim-form">
	<hr style="border-color:#b8b8b8;">
               		<div class="interim-header"><h2>Current Banner</h2></div>
               		<span style="line-height:35px;">Preview:</span >
			<img class="img-responsive" style="width:400px;" id="bannerPreview" src="../<?echo $current_banner;?>" alt="Current Banner" />
		</div>
         <br>
         <br>
    	<div id="row">
	         	<input name="setup_person" type="hidden" value="<?php echo $userID;?>">
	         	<input name="groupID" type="hidden" value="<?php echo $groupid;?>">
	         	<input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
	         	<input name="submit" type="submit" class="redbutton" value="Save Changes" title="Saves Changes">
         	</form>
		</div> <!-- end table -->

  </div> <!--end content -->
	    </div>
    </div> 
</div>
</div> <!--end container-->
<br>
    
<?php include 'footer.php' ; ?>

</body>

<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
<?php
   ob_end_flush();
?>