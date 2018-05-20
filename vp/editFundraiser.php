<?php 
      session_start(); // session start
      ob_start();
      ini_set('display_errors', '1'); // errors reporting on
      error_reporting(E_ALL); // all errors
      require_once('../includes/functions.php');
      require_once('../includes/connection.inc.php');
      require_once('../includes/imageFunctions.inc.php');
      $link = connectTo();
      $groupid = $_GET['group'];
      //$groupid = ereg_replace("[^0-9]", "", $groupid);
      $userID = $_SESSION['userId'];
     
       if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
        {
            header('Location: ../index.php');
            exit;
        }
      if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
      
       $check = checkChainGroupVP($userID,$groupid);
      if(!is_numeric($groupid) || $check == 1  )
        {
           header('Location: ../index.php');  
        }	
	
        
        
	   $table = "Dealers";
	  // check if form has been submitted
	   if(isset($_POST['submit'])){
	   
	   $groupNumber = mysqli_real_escape_string($link, $_POST['group']); 
	   $groupName = mysqli_real_escape_string($link, $_POST['groupname']);
	   $url = mysqli_real_escape_string($link, $_POST['websiteURL']);
	   $contactName = mysqli_real_escape_string($link, $_POST['contactFirstName']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $fund = mysqli_real_escape_string($link, $_POST['group']);
	   $phone = mysqli_real_escape_string($link, $_POST['phone']);
	   $facebookURL = mysqli_real_escape_string($link, $_POST['fb']);
	   $twitterURL = mysqli_real_escape_string($link, $_POST['twitter']);
	   $contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);
	   
	   $start = mysqli_real_escape_string($link, $_POST['fundStart']);
	   $ending = mysqli_real_escape_string($link, $_POST['fundEnd']);
	   $goal1 = mysqli_real_escape_string($link, $_POST['fundGoal1']);//total goal
	   $goal = mysqli_real_escape_string($link, $_POST['fundGoal']);//goal for each member
	   
	   
	   
	   $payMail = mysqli_real_escape_string($link, $_POST['pal']);
	   $abt = mysqli_real_escape_string($link, $_POST['about']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   $orgLeaderPhoto = $_FILES['AddOrgLeaderPhoto']['tmp_name'];
	   $orgLocationPhoto = $_FILES['AddOrgLocationPhoto']['tmp_name'];
	   $orgGroupPhoto = $_FILES['AddOrgGroupPhoto']['tmp_name'];
	   $orgContactPhoto = $_FILES['AddOrgContactPhoto']['tmp_name'];
	   $orgBannerPhoto = $_FILES['AddOrgBannerPhoto']['tmp_name'];
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	   $OrgGroupPicPath = "";
	   $OrgLeaderPicPath = "";
	   $OrgLocationPicPath = "";
	   $OrgContactPhotoPath = "";
	   $OrgBannerPathPath = "";
	   
	   $re1 = mysqli_real_escape_string($link, $_POST['reasons1']);
	   $re2 = mysqli_real_escape_string($link, $_POST['reasons2']);
	   $re3 = mysqli_real_escape_string($link, $_POST['reasons3']);
	   $re4 = mysqli_real_escape_string($link, $_POST['reasons4']);
	   $re5 = mysqli_real_escape_string($link, $_POST['reasons5']);
	   $re6 = mysqli_real_escape_string($link, $_POST['reasons6']);
	   $re7 = mysqli_real_escape_string($link, $_POST['reasons7']);
	   $re8 = mysqli_real_escape_string($link, $_POST['reasons8']);
	   $re9 = mysqli_real_escape_string($link, $_POST['reasons9']);
	   $re10 = mysqli_real_escape_string($link, $_POST['reasons10']);
	   
	   $table2 = "captions";
	   $c1 = mysqli_real_escape_string($link, $_POST['capt1']);
	   $c1n = mysqli_real_escape_string($link, $_POST['cap1']);
	   $c2 = mysqli_real_escape_string($link, $_POST['capt2']);
	   $c2n = mysqli_real_escape_string($link, $_POST['cap2']);
	  
	   $query = "UPDATE Dealers SET
   				DealerDir = '$groupName',
   				About = '$abt',
   				FundraiserGoal = '$goal',
  				FundraiserStartDate = '$start',
  				FundraiserEndDate = '$ending',
   				Phone = '$phone',
   				Fax = '$ext',
   				ContactName = '$contactName',
   				PaypalEmail = '$payMail',
   				goal2 = '$goal1',
   				email = '$contactEmail',
   				website = '$url',
    			facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE loginid = '$groupNumber'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: query 1 ".mysqli_error($link)); 
  				
	 //if group has no id record in cations table insert one real quick
    $cCheck = "SELECT * FROM fund_reasons WHERE fundID = '$groupNumber'";
    $cResult = mysqli_query($link, $cCheck)or die("Reasons Check failed".mysqli_error($link));
    if(mysqli_num_rows($cResult) < 1)
    {
        //no record found
        $cInsert = "INSERT INTO captions(fundID)VALUES('$groupNumber')";
        $cQuery = mysqli_query($link, $cInsert)or die("captions insert failed".mysqli_error($link));
    }  
  	
  	$queryc = "UPDATE captions SET
		 c1 = '$c1',
		 c1n = '$c1n',
		 c2 = '$c2',
		 c2n = '$c2n'
		 WHERE fundid = '$groupNumber'";
  $resultc = mysqli_query($link, $queryc)or die("MySQL ERROR on query c: ".mysqli_error($link));
  
  $dealer_group = $groupNumber;
  
   /**  process_image
	  **	This function will first verify if the file uploaded is an image file.
	  **	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	  **      Last, the directory path to the image is returned so it can be saved to the database.
	  **/
	  function process_image($name, $id, $tmpPic, $baseDirPath){

		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			$upload_msg .= $cleanedPic . " is not an image file. <br />";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				$upload_msg .= $_FILES['$name']['error'] . "<br />";
			} else {
				
				if (file_exists($baseDirPath.$id."/".$cleanedPic)){
					$imagePath = "images/dealers/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/dealers/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	     
	     if($orgLeaderPhoto != ''){
		$OrgLeaderPicPath = process_image('AddOrgLeaderPhoto',$dealer_group, $orgLeaderPhoto, $imageDirPath);
		if($OrgLeaderPicPath !=''){
			$query15 = "UPDATE $table SET leader_pic = '$OrgLeaderPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query15);
			}
		}
	    if($orgContactPhoto != ''){
		$OrgContactPicPath = process_image('AddOrgContactPhoto',$dealer_group, $orgContactPhoto, $imageDirPath);
		if($OrgContactPicPath !=''){
			$query16 = "UPDATE $table SET contact_pic = '$OrgContactPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query16);
			}
		}
		if($orgLocationPhoto != ''){
		$OrgLocationPicPath = process_image('AddOrgLocationPhoto',$dealer_group, $orgLocationPhoto, $imageDirPath);
		if($OrgLocationPicPath !=''){
			$query17 = "UPDATE $table SET location_pic = '$OrgLocationPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query17);
			}
		}
	    if($orgGroupPhoto != ''){
		$OrgGroupPicPath = process_image('AddOrgGroupPhoto',$dealer_group, $orgGroupPhoto, $imageDirPath);
		if($OrgGroupPicPath !=''){
			$query18 = "UPDATE $table SET group_team_pic = '$OrgGroupPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query18);
			}
		}
		if($orgBannerPhoto != ''){
		$OrgBannerPathPath = process_image('AddOrgBannerPhoto',$dealer_group, $orgBannerPhoto, $imageDirPath);
		if($OrgBannerPathPath !=''){
			$query19 = "UPDATE $table SET banner_path = '$OrgBannerPathPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query19);
			}
		}
    //if group has no id record in reasons table insert one real quick
    $rCheck = "SELECT * FROM fund_reasons WHERE fundID = '$groupNumber'";
    $rResult = mysqli_query($link, $rCheck)or die("Reasons Check failed".mysqli_error($link));
    if(mysqli_num_rows($rResult) < 1)
    {
        //no record found
        $rInsert = "INSERT INTO fund_reasons(fundID)VALUES('$groupNumber')";
        $rQuery = mysqli_query($link, $rInsert)or die("reasons insert failed".mysqli_error($link));
    }
  	//update fundraiser reasons
  	$rUpdate = "UPDATE fund_reasons SET
  	            r1 = '$re1',
  	            r2 = '$re2',
  	            r3 = '$re3',
  	            r4 = '$re4',
  	            r5 = '$re5',
  	            r6 = '$re6',
  	            r7 = '$re7',
  	            r8 = '$re8',
  	            r9 = '$re9',
  	            r10 = '$re10'
  	            WHERE fundID = '$groupNumber'";
  	$updateReasons = mysqli_query($link,$rUpdate);
  	
  	if($result && $resultc && $updateReasons){
  	    $redirect = "Location:editFundraiser.php?group=".$groupNumber;
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
    $query3 = "SELECT * FROM $table WHERE loginid='$groupid'";
    $result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql1_error($link));
    $row2 = mysqli_fetch_assoc($result3);
    $fundraiserid = $row2['loginid'];
    $orgName = $row2['Dealer'];
    $group_name = $row2['DealerDir'];
    //$name = $row2['Address1'];    $phone = $row2['Phone'];
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
    $about = $row2['About'];
    $start = $row2['FundraiserStartDate'];
    $end = $row2['FundraiserEndDate'];
    $user_name = $row2['userName'];
    $user_pass = $row2['firstPass'];
    $club_type = $row2['clubType'];
    $rep = $row2['setuppersonid'];
    $phone = $row2['Phone'];
    $parent = $row2['sponsorid'];
    
    //$row = mysqli_fetch_assoc($result);
    $fundraiserid = $row2['loginid'];
    $fgoal = $row2['FundraiserGoal'];
    $gGoal = $row2['goal2'];
    $fstart = $row2['FundraiserStartDate'];
    $fend = $row2['FundraiserEndDate'];
    $groupPic = $row2['group_team_pic'];
    $name = $row2['Dealer'].' '.$row2['DealerDir'];
    
    $banner = $row2['banner_path'];
    $location_pic = $row2['location_pic'];
    $leader_pic = $row2['leader_pic'];
    $contact_pic = $row2['contact_pic'];
    //get saved reasons
    $query7 = "SELECT * FROM fund_reasons WHERE fundID = '$groupid'";
    $result7 = mysqli_query($link, $query7) or die(mysqli_error($link));
    $row7 = mysqli_fetch_assoc($result7);
    $re1 = $row7['r1'];
    $re2 = $row7['r2'];
    $re3 = $row7['r3'];
    $re4 = $row7['r4'];
    $re5 = $row7['r5'];
    $re6 = $row7['r6'];
    $re7 = $row7['r7'];
    $re8 = $row7['r8'];
    $re9 = $row7['r9'];
    $re10 = $row7['r10'];
    
    $cap = "Select * FROM captions WHERE fundid = '$groupid'";
    $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysqli_error($link));
    $cr = mysqli_fetch_assoc($cap_result);
    $a1 = $cr['c1'];
    $a1n = $cr['c1n'];
    $a2 = $cr['c2'];
    $a2n = $cr['c2n'];   
    $a3 = $cr['c3'];
    $a3n = $cr['c3n'];   
    $a4 = $cr['c4'];
    $a4n = $cr['c4n']; 
   
    $howMany = "SELECT * FROM orgMembers WHERE fund_owner_id = '$groupid'";
    $memberResult = mysqli_query($link, $howMany)or die ("couldn't execute query members.".mysqli_error($link));
    $getMembers = mysqli_fetch_assoc($memberResult);
    $memberCount = mysqli_num_rows($memberResult);
        
        
    $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
    $result1 = mysqli_query($link, $query1)or die ("couldn't execute query.".mysqli_error($link));
    $row1 = mysqli_fetch_assoc($result1);
    $pic = $row1['picPath'];
        
     
 
?>

<!DOCTYPE html>
<head>
<title>Edit Fundraiser Account</title>

</head>

<body>
      <?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">
 <div class="page-header">
	<h2 align="center">Edit Fundraising Group Information</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
        <div id="border">
            <table>
                <tr>
                    <td>
                       <a href="fundAcctEdit.php?group=<? echo $parent;?>" target="_blank" ><input type="button" class="redbutton" value="Edit Parent Group" /></a>
                       &nbsp;
                    </td>
                    <td>
                       <a href="../fundSite.php?group=<? echo $groupid;?>" target="_blank" ><input type="button" class="redbutton" value="View Web Page" /></a>
                       &nbsp;
                    </td>
                    <td>
                        <a href="editMembers.php?group=<? echo $groupid;?>" target="_blank" ><input type="button" class="redbutton" value="View Members" /></a>
                        &nbsp;
                    </td>
                    <td>
                        <!--<a href="../fundSite.php?group=<? echo $groupid;?>" target="_blank" ><input type="button" class="redbutton" value="Delete Group" /></a>-->
                    </td>
                </tr>
            </table>
        </div>
        <br>
         <div class="table">
         <form id="" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="POST" name="addOrg" enctype="multipart/form-data" onSubmit="return validate(this);">
<div id="border">
         	<div class="simpleTabs">
			
			
			<div class="interim-form">
				<div class="interim-header"><h3 align="center"><? echo $orgName.' '.$group_name; ?></h3></div>
    				<hr style="border-color:#b8b8b8;">
				<div class="row" style="margin-left:1px"> <!-- titles -->
				        <span style="line-height:35px;" id="hd_group">Group</span>									
					<span style="line-height:35px;margin-left:120px;" id="hd_url">Existing Website URL</span>
					
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- inputs -->
				        <input id="group" type="text" name="groupname" value="<? echo $group_name;?>" required> <!-- this should say the group not account name -->
				        <input id="url" type="url" name="websiteURL" value="<? echo $url; ?>">&nbsp;&nbsp;Include http://
				        <input id="id" type="hidden" name="fundid" value="<? echo $groupid; ?>" title="Account ID Number" readonly>
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- titles -->									
					<span style="line-height:35px;" id="hd_cname">Contact Name</span>
					<span style="line-height:35px;margin-left:69px;" id="hd_loginemail">Contact Email</span>
					<!-- <span id="hd_title">Position</span>-->
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- inputs -->
					<input id="cname" type="text" name="contactFirstName" value="<? echo $contact_name; ?>" >
					<input id="loginemail" type="email" name="contactEmail" value="<? echo $email; ?>" >
    					
				</div> <!-- end row -->
								
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<!-- Physical Address -->
							<div class="row"> <!-- titles -->
								<!--<span id="hd_address1">Address 1</span>-->
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<!--<input id="address1" type="text" name="address1" value="<? echo $address1; ?>" required>-->
							</div> <!-- end row -->
							<div class="row">
                        		<!--<span id="hd_address2">Address 2</span>-->
                        	</div> <!-- end row -->
			                <div class="row">
			                    <!--<input id="address2" type="text" name="address2" value="<? echo $address2; ?>">-->
			                </div> <!-- end row -->
							<div class="row"> <!-- titles -->
								<!--<span id="hd_city">City</span>-->
								<!--<span id="hd_state">State</span>-->
								<!--<span id="hd_zip">Zip</span>-->
								
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<!--<input id="city" type="text" name="city" value="<? echo $city; ?>" required>-->
								<!--<select id="state" name="state">
									<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
									<option value="AL">AL</option>
									<option value="AK">AK</option>
									<option value="AZ">AZ</option>
									<option value="AR">AR</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DE">DE</option>
									<option value="DC">DC</option>
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
								</select>-->
								<!--<input id="zip" type="text" name="zip" value="<? echo $zip; ?>" maxlength="5" required>-->
							</div> <!-- end row -->
							<!-- Physical Address End -->
							
							<div class="row" style="margin-left:1px"> <!-- title -->
	                           		 		<span style="line-height:35px;" id="hd_wphone">Primary Phone</span>
	                           		 		<span style="line-height:35px;margin-left:75px;" id="hd_ext">Ext</span>
							</div> <!-- end row -->
	                    				<div class="row" style="margin-left:1px">
	                   		 			<input id="phone" type="text" name="phone" value="<?php echo $phone;?>" maxlength="14">
								<input id="ext" type="text" name="ext" value="<?php echo $fax;?>" maxlength="5">
							</div> <!-- end row -->
							
							<div class="row" style="margin-left:1px">
								<span style="line-height:45px;" id="hd_about">Fundraiser Description</span><br>
								<textarea name="about" cols="60" rows="5" id="description"><? echo $about;?></textarea>
							</div> <!-- end row -->
							<br>
							<div class="row" style="margin-left:1px">
							
				<br><b><p style="font-size: 15px;"><b>User Name:</b> <? echo '<b>'.$user_name.'</b>';?></p></b>
				<br><b><p style="font-size: 15px;"><b>Password:</b> <? echo '<b>'.$user_pass.'</b>';?></p></b>
							</div>
                        			</td>
                        			<td id="td_2">
                        				<!--<div class="row"> <!-- title -->
                            					<!--<span id="hd_mphone">Mobile Phone</span>
							</div> <!-- end row -->
                        				<!--<div class="row"> <!-- inputs -->
                           	    				<!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
							</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- title -->
	                            				<!--<span id="hd_hphone">Home Phone</span>
	                        			</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- inputs -->
	                           	    			<!--<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
	                      	    			</div> <!-- end row -->
							
                        			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
		<br>
				<div class="interim-form"> <!-- payment tab -->
    					<hr style="border-color:#b8b8b8;">
					<h4>Group Total Funds: 35%</h4>
					<h4>1. PayPal Information</h4>
					<p>Please enter new or existing PayPal information for this group.</p>
					<div class="row" style="margin-left:1px"> <!-- title -->
						<span style="line-height:35px;" id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row" style="margin-left:1px"> <!-- input -->
						<input id="paypalemail1" type="email" name="pal" value="<? echo $pal ?>">
					</div> <!-- end row -->
					<br>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h3 align="center">Social Media Connections</h3></div>
    					<hr style="border-color:#b8b8b8;">
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;" id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input style="width:200px;" type="url" id="fb"  name="fb" value="<? echo $face; ?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
					<br>
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;" id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input style="width:200px;" type="url" id="tw" name="twitter" value="<? echo $twitter; ?>"  placeholder="www.twitter.com/user">
					</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="">
					</div>--> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
		</div> <!-- end simple tabs -->	
         
         <br>
         
    	<div id="row" style="margin-left:1px">
    		<!--<a href="reasons.php?group=<?echo $fundraiserid;?>">-->
	         	<input name="username" type="hidden" value="<?php echo $login_email;?>">
	         	<input name="password" type="hidden" value="<?php echo $loginPass;?>">
	         	<input name="type" type="hidden" value="<?php echo $club;?>">
	         	<input name="setup_person" type="hidden" value="<?php echo $rep;?>">
	         	<input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>">
	         	<input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
	
         	<!--</a>-->
    	</div> <!-- end row -->
</div>
		<br>
</div>
<br>
	    <div id="border">
	         <div>
	             <h3 align="center">Fundraiser Goals</h3>
			          <br>
			          <input class="form-control" id="datepicker1" name="fundStart"  type="text" value="<? echo $fstart;?>"/>&nbsp;<label>Start Date</label>
			          <br>
			          <br>
			          <input type="text" name="fundEnd" id="datepicker2" class="form-control" value="<? echo $fend;?>">&nbsp;<label>End Date</label>
			          <br>
			          <br>
			          <input type="text" name="fundGoal1" value="<? echo $gGoal;?>" >Total Group Goal
			          <br>
			          <br>
			          This fundraiser has <? echo $memberCount; ?> members. Divide your group goal evenly.
			          <br>
			          <br>
			          <input type="text" name="fundGoal" value="<? echo $fgoal;?>">&nbsp;<label>Fundraiser Goal For Each Member</label>
			          <br>
			          <br>
			          <input type="hidden" name="g" value="<? echo $groupid;?>" />
			       
			       

		     </div>  
	        
	    </div><!-- description end-->
	    <br>
	    <div id="border">
	  <h3 align="center">Reasons for Raising Money:</h3>
      <p>Please select one or more purposes for your fundraiser.</p>
      
      <?php
      $query5 = "SELECT * FROM reasons WHERE clubType = '$club_type'";
      $result5 = mysqli_query($link, $query5) or die(mysqli_error($link));
      $row5 = mysqli_fetch_assoc($result5);
      $r1 = $row5['r1'];
      $r2 = $row5['r2'];
      $r3 = $row5['r3'];
      $r4 = $row5['r4'];
      $r5 = $row5['r5'];
      $r6 = $row5['r6'];
      $r7 = $row5['r7'];
      $r8 = $row5['r8'];
      $r9 = $row5['r9'];
      $r10 = $row5['r10'];
      ?>
	  <table>
      <tr><td><? echo $r1;?></td></tr>
      <tr><td><? echo $r2;?></td></tr>
      <tr><td><? echo $r3;?></td></tr>
      <tr><td><? echo $r4;?></td></tr>
      <tr><td><? echo $r5;?></td></tr>
      <tr><td><? echo $r6;?><td></tr>
      <tr><td><? echo $r7;?></td></tr>
      <tr><td><? echo $r8;?></td></tr>
      <tr><td><? echo $r9;?></td></tr>
      <tr><td><? echo $r10;?></td></tr>
      </table>
      <br>
      <div id="setupreasons" class="reasoncolumns">
          <label><input type="text" name="reasons1" value="<?php echo $re1; ?>"></label>
              <br>
              <label><input name="reasons2" value="<?php echo $re2; ?>" type="text"></label>
              <br>
              <label><input type="text" id="reasons_2" name="reasons3" value="<?php echo $re3; ?>"></label>
              <br>
              <label><input type="text" id="reasons_3" name="reasons4" value="<?php echo $re4; ?>"></label>
              <br>
              <label><input type="text" id="reasons_4" name="reasons5" value="<?php echo $re5; ?>"></label>
              <br>
              <label><input type="text" id="reasons_5" name="reasons6" value="<?php echo $re6; ?>"></label>
              <br>
              <label><input type="text" id="reasons_6" name="reasons7" value="<?php echo $re7; ?>"></label>
              <br>
              <label><input type="text" id="reasons_7" name="reasons8" value="<?php echo $re8; ?>"></label>
              <br>
            <label><input type="text" id="reasons_8" name="reasons9" value="<?php echo $re9; ?>"></label>
              <br>
              <label><input type="text" id="reasons_9" name="reasons10" value="<?php echo $re10; ?>"></label>
             
          </div> <!--end checkboxForm-->
	    </div>
	    <br>
	    <div id="border">
	         
     <h3 align="center">Personalize the Fundraiser Website With Photos</h3>
     <p>To personalize your webpage, choose an image file to upload.<br> 
          (Acceptable formats are .jpg or .png files.)</p>
          <!--Acceptable formats for video are .avi wmv, mpg/.mpeg, .mov, mp4.rm/.ram, .swf/.flv, -->
    	
	<hr style="border-color:#b8b8b8;">
          <div id="table">
          	<div class="row" style="margin-left:15px;"> <!-- Leader bottom left pic -->
          		<p><b>1.</b> Main Fundraiser Leader Photo</p>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	        <img class="img-responsive" src="../<?php echo $leader_pic; ?>" alt="Leader" width="200px" height="200px"><br>
          		<input id="" name="AddOrgLeaderPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt1" value="<? echo $a1;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap1" value="<? echo $a1n;?>" placeholder="" > Title
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Member Leader bottom right pic -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>2.</b> Student or Other Fundraiser Leader Photo</p>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	       	<img class="img-responsive" src="../<?php echo $contact_pic; ?>" alt="Location" width="200px" height="200px"><br>
          		<input id="" name="AddOrgLocationPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt2" value="<? echo $a2;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap2" value="<? echo $a2n;?>" placeholder="" > Title
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Profile Pic in Left Nav -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>3.</b> Location or General Photo</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          		<img class="img-responsive" src="../<?php echo $location_pic; ?>" alt="Group" width="200px" height="200px"><br>
          		<input id="longtext" name="AddOrgGroupPhoto" type="file" title="Upload photo of the group/team fundraising">
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Banner at top of page -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>4.</b> Organization Banner</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          	    	<img class="img-responsive" src="../<?php echo $banner; ?>" alt="Banner" width="700px" height="150px"><br>
          		<input id="longtext" name="AddOrgBannerPhoto" type="file" title="Upload new file to change current banner">
          	</div> <!-- end row -->
          	<br>
          	<div class="row" style="margin-left:15px;"><!-- Group/Collage in center of page -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>5.</b> Fundraising Group Photo or Collage</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          	    	<img class="img-responsive" src="../<?php echo $collage; ?>" alt="Collage" width="700px" height="150px"><br>
          		<input id="longtext" name="AddOrgContactPhoto" type="file" title="Upload new file to change current collage photo.">
          	</div> <!-- end row -->
          	
          	<!-- Video -->
          	<!--<br>
          	
          	<div class="row" style="margin-left:15px;"> 
          		<p>Fun Video Requesting Support</p>
          		<span style="line-height:35px;" id="longtext">Upload Video:</span><br>
          		<input id="longtext" name="AddOrgSupportVideo" type="file" title="Upload video file"><br>
          		<span style="line-height:35px;" id="removefile"><input id="RemoveOrgSupportVideo" name="RemoveOrgSupportVideo" type="checkbox" value="RemoveOrgSupportVideo">Remove Current Video</span>
          	</div>-->
          	
          	<br>
          	<div style="margin-left:2px;line-height:35px;padding-right:20px;">
   	<br>
      <img class="img-responsive" src="../images/photo_upload_examples.jpg" width="100%" alt="Example Layout of Photos">
      <caption><i>Example Layout of Photos</i></caption>
</div>
          	<div class="row" style="margin-left:15px;">
          	    <br>
          		<input name="group" type="hidden" value="<?php echo $groupid; ?>">
          		<input class="redbutton" name="submit" type="submit" value="Save & Finish">
          		<br>
          		<br>
   
          	</div> <!-- end row -->
          </div> <!-- end table -->
     
        </div> <!--end column1 -->
   </div> <!--end column2 -->
	    </div>
	    <br>
	    <br>
        </form>
          </div> <!--end content -->
    </div> 
</div> <!--end container-->
    </div>
<?php include 'footer.php' ; ?>


</body>

<?php
   ob_end_flush();
?>