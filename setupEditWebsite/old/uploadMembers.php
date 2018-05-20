<?php
  session_start();
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
   include('../samplewebsites/imageFunctions.inc.php');
   include('../includes/connection.inc.php');
   $link = connectTo();
   $userID = $_SESSION['userId'];
   
   $hostname = "localhost";
   $username = "amoodf5_ryan";
   $password = "nb]]mFg2ZU.n";
   $database = "amoodf5_gm2012";
 
 
   $conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
   mysql_select_db("$database", $conn);
   
   
   if(isset($_POST["submit"]))
   {
     $file = $_FILES['file']['tmp_name'];
     $handle = fopen($file, "r");
     $c = 0;
     $groupID = mysqli_real_escape_string($link, $_POST['groupid']);
     $repID = mysqli_real_escape_string($link, $_POST['rpid']);
     $scID = mysqli_real_escape_string($link, $_POST['scid']);
     $salt = time();
     
     $queryA = "SELECT * FROM Dealers WHERE loginid = '$groupID'";
     $resultA = mysqli_query($link, $queryA)or die ("couldn't execute query A.".mysql_error($link));
     
     while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
      {
        $titlex = $filesop[0];
        $fname = $filesop[1];
        $lname = $filesop[2];
        $lname = addslashes($lname);
        $email = $filesop[3];
        $password = $filesop[4];
        $phone = $filesop[5];
        $loginPass = sha1($password.$salt);
        $landingPage = "fundMember/memberHome.php";
        
        //check if user already exists
        $queryB = "SELECT * FROM users WHERE username='$email'";
        $resultB = mysqli_query($link, $queryB)or die ("couldn't execute query B.".mysql_error($link));
        $rowB = mysqli_fetch_assoc($resultB);
        if(mysqli_num_rows($resultB) > 0)
        {
           //check if user already exists in this group
           $queryC = "SELECT * FROM Dealers WHERE userName ='$email' AND setuppersonid = '$groupID' ";
           $resultC = mysqli_query($link, $queryC)or die ("couldn't execute query C.".mysql_error($link));
           $rowC = mysqli_fetch_assoc($resultC);
	  
           if(mysqli_num_rows($resultC) < 1)
           {
              //user exists but not of this group get info for found user
              $queryD = "SELECT * FROM user_info WHERE email='$email'";
              $resultD = mysqli_query($link, $queryD)or die ("couldn't execute query D.".mysql_error($link));
              $rowD = mysqli_fetch_assoc($resultD);
              $name = $rowD['FName'];
              $surname = $rowD['LName'];
              $title = $rowD['title'];
              $gender = $rowD['LName']; 
              $role = "Member";
              
              //get group info
              $group_query = "SELECT * FROM Dealers WHERE loginid='$groupID'";
	      $g_result = mysqli_query($link, $group_query)
	      or die ("couldn't execute query group query E.".mysql_error());
	      $group_row = mysqli_fetch_assoc($g_result);
	      $group_id = $group_row['loginid'];
	      $dealer = $group_row['Dealer'];
	      $dealerdir = $group_row['DealerDir'];
	      $about = $group_row['About']; 
	      $reason = $group_row['FundraiserReasons'];
	      $goal = $group_row['FundraiserGoal']; 
	      $start = $group_row['FundraiserStartDate']; 
	      $endz = $group_row['FundraiserEndDate']; 
	      $phone1 = $group_row['Phone']; 
	      $address1 = $group_row['Address1']; 
	      $address2 = $group_row['Address2']; 
	      $ct = $group_row['City'];
	      $st = $group_row['State'];
	      $zp = $group_row['Zip'];
	      $signupType = $group_row['signuptype'];
	      $orgType = $group_row['orgtype'];
	      $payMail = $group_row['PaypalEmail'];
	      $banner = $group_row['banner_path'];
	      $leaderPic = $group_row['leader_pic'];
	      $locationPic = $group_row['location_pic'];
	      $groupPic = $group_row['group_team_pic'];
	      $url = $group_row['website'];
	      $club = $group_row['clubType'];
	      //$repID = $group_row['setuppersonid'];
	      $com = 0.35;
	      $user_page = "../membersite.php?group="; 
	      
	      //insert new users into group 
	        $query3 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal, FundraiserStartDate, FundraiserEndDate, Phone, Address1, Address2, City, State, Zip, PaypalEmail, Banner, setuppersonid, setuppersonid2, signuptype, orgtype, email, website, facebook, twitter, leader_pic, location_pic,  group_team_pic, userName, banner_path, firstPass, clubType)";
		$query3 .= "VALUES('$dealer','$dealerdir','$about','$reason','$goal','$start','$endz', '$phone1', '$address1', '$address2', '$ct','$st','$zp','$payMail','$banner','$groupID','$repID', '$signupType', '$orgType', '$email','$url','$face', '$twt','$leaderPic', '$locationPic', '$groupPic', '$email','$banner','$pass', '$club')";
		 $queryResult3 = mysqli_query($link, $query3)or die ("couldn't execute query 13.".mysql_error($link));
	      /*
	      $query3 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal,  FundraiserStartDate, FundraiserEndDate, Phone, Address1, Address2, City, State, Zip, PaypalEmail, Banner, setuppersonid, setuppersonid2, signuptype, orgtype, email, website, facebook, twitter, leader_pic, location_pic,  group_team_pic, userName, banner_path, firstPass, clubType)";
		$query3 .= " VALUES('$dealer','$dealerdir','$about','$reason','$goal','$start','$endz', '$phone1', '$address1', '$address2', '$ct','$st','$zp','$payMail','$banner','$groupID','$repID', '$signupType', '$orgType', '$email','$url','$face', '$twt','$leaderPic', '$locationPic', '$groupPic', '$email','$banner', '$password', '$club')";
		$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 45.".mysql_error($link));
		 */
		 //get the member
		$queryL = "SELECT * FROM Dealers WHERE setuppersonid = '$groupID' AND email = '$email'";
		$resultL = mysqli_query($link, $queryL)or die ("couldn't execute query L.".mysql_error($link));
		$rowL = mysqli_fetch_assoc($resultL);
		$logID = $rowL['loginid'];
		        
		        //insert into the orgMembers table
  $queryH = "INSERT INTO orgMembers(Title, orgFName, orgLName, orgEmail, orgPhone,orgRel, fundraiserID, fund_owner_id, repID, scID, vpID)VALUES('$titlex', '$name','$surname','$email','$phone', '$role', '$logID','$groupID','$repID', '$scID', '$userID')";
	$resultH = mysqli_query($link, $queryH)or die ("couldn't execute query h.".mysql_error($link));
           }//user not in this group
           
        }//user does not exist
        else
        {
              $groupID = mysqli_real_escape_string($link, $_POST['groupid']);
             //get group info
              $group_query = "SELECT * FROM Dealers WHERE loginid='$groupID'";
	      $g_result = mysqli_query($link, $group_query)
	      or die ("couldn't execute query group query E.".mysql_error());
	      $group_row = mysqli_fetch_assoc($g_result);
	  
	      $dealer = $group_row['Dealer'];
	      $dealerdir = $group_row['DealerDir'];
	      $about = $group_row['About']; 
	      $reason = $group_row['FundraiserReasons'];
	      $goal = $group_row['FundraiserGoal']; 
	      $start = $group_row['FundraiserStartDate']; 
	      $endz = $group_row['FundraiserEndDate']; 
	      $phone1 = $group_row['Phone']; 
	      $address1 = $group_row['Address1']; 
	      $address2 = $group_row['Address2']; 
	      $ct = $group_row['City'];
	      $st = $group_row['State'];
	      $zp = $group_row['Zip'];
	      $signupType = $group_row['signuptype'];
	      $orgType = $group_row['orgtype'];
	      $payMail = $group_row['PaypalEmail'];
	      $banner = $group_row['banner_path'];
	      $leaderPic = $group_row['leader_pic'];
	      $locationPic = $group_row['location_pic'];
	      $groupPic = $group_row['group_team_pic'];
	      $url = $group_row['website'];
	      $club = $group_row['clubType'];
	      //$repID = $group_row['setuppersonid'];
	      $com = 0.35;
	      $user_page = "../membersite.php?group="; 
	      
           //insert new users
	  $query1 = "INSERT INTO users (username, password, Security, landingPage, salt, created, lastLogin, role)";
	  $query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$role')";
	  $queryResult1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error($link));
	  
	  $query2 = "INSERT INTO user_info (FName, LName, email, workPhone, userPaypal, role, title)";
	  $query2 .= "VALUES('$fname','$lname','$email','$phn', '$payMail','$role', '$title')";
          $queryResult2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error($link));
        /*
        $sql = mysql_query("INSERT INTO user_info (FName, LName, email,workPhone, title) VALUES ('$fname', '$lname','$email','$phone', '$title')");
        */
        
        $query3 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal, FundraiserStartDate, FundraiserEndDate, Phone, Address1, Address2, City, State, Zip, PaypalEmail, Banner, setuppersonid, setuppersonid2, signuptype, orgtype, email, website, facebook, twitter, leader_pic, location_pic,  group_team_pic, userName, banner_path, firstPass, clubType)";
		$query3 .= "VALUES('$dealer','$dealerdir','$about','$reason','$goal','$start','$endz', '$phone1', '$address1', '$address2', '$ct','$st','$zp','$payMail','$banner','$groupID','$repID', '$signupType', '$orgType', '$email','$url','$face', '$twt','$leaderPic', '$locationPic', '$groupPic', '$email','$banner','$pass', '$club')";
		 $queryResult3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error($link));
		 //get the member
		$queryL = "SELECT * FROM Dealers WHERE setuppersonid = '$group' AND email = '$email'";
		$resultL = mysqli_query($link, $queryL)or die ("couldn't execute query L.".mysql_error($link));
		$rowL = mysqli_fetch_assoc($resultL);
		$logID = $rowL['loginid'];
		
		  //insert into the orgMembers table
		$queryX = "INSERT INTO orgMembers(Title, orgFName, orgLName, orgEmail, orgPhone,orgRel, fundraiserID, fund_owner_id, repID, scID, vpID)VALUES('$titlex', '$fname','$lname','$email','$phone', '$role', '$logID','$groupID','$repID', '$scID', '$userID')";
		$resultX = mysqli_query($link, $queryX)or die ("couldn't execute query X.".mysql_error($link));
		
		$subject = "Hello ".$fname." ".$lname." You Are Now a Member Of ".$dealer."
		 ".$dealerdir." Fundraiser";
                $message = "Hey ".$fname."!";
                $message .= "<br />";
                $message .= "<br />";
                $message .= "You have a new account and fundraising website at GreatMoods! Check out your site:";
                $message .= "<br />";
                $message .= "<br />";
                $message .= "<a href='http://www.greatmoods.com/membersite.php?group='.$logID.' >Check out your fundraising website here!</a>";
                $message .= "<br />";
                $message .= "<br />";
                $message .= "Login to Manage Your Account";
                $message .= "<br />";
                $message .= "<br />";
                $message .= "User Name: ".$email;
                $message .= "<br />";
                $message .= "<br />";
                $message .= "Password: ".$password; 
    
               $lower = strtolower($dealer);
               $cleanName = str_replace(' ', '', $lower);
               $from = $cleanName."@greatmoods.com";
    
               $to = $email; 
               $headers = "From: ".$from."\r\n";
               $headers .= "MIME-Version: 1.0\r\n";
               $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
               mail($to, $subject, $message, $headers);
               
               //clean up database
               $clean1 = "DELETE FROM users WHERE username = 'email'";
               $cleanResult1 = mysqli_query($link, $clean1)or die ("couldn't execute query M.".mysql_error($link));
               
               $clean2 = "DELETE FROM user_info WHERE email = 'email'";
               $cleanResult2 = mysqli_query($link, $clean2)or die ("couldn't execute query K.".mysql_error($link));
               
               $clean3 = "DELETE FROM Dealers WHERE userName = 'email'";
               $cleanResult3 = mysqli_query($link, $clean3)or die ("couldn't execute query Q.".mysql_error($link));
               
               $clean4 = "DELETE FROM orgMembers WHERE orgEmail = 'email'";
               $cleanResult4 = mysqli_query($link, $clean4)or die ("couldn't execute query V.".mysql_error($link));
	       header( 'Location: editMembers.php?group='.$groupID );
       }//end else
      }//end while
      /*
      if($sql)
      {
       echo "You database has imported successfully";
      }
      else
      {
        echo "Sorry! There is some problem.";
      }
      */
  }
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='RP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
          <h1>Upload Members</h1>
          <h3></h3>
          <form name="import" method="post" action="uploadMembers.php" enctype="multipart/form-data">
          
          <div class="row">
					
					<span id="hd_gmfr4">Fundraiser Account:</span>
				</div> <!-- end row -->
          <div class="row">
					<select class="role5" name="groupid" id="groupid" onchange="fetch_select(this.value);" required>
							<option value="">Select Fundraiser Account</option>
							<?php 
						$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID'";
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
				</div> <!-- end row -->
				<br /><p>Fomat your spreadsheet cloumns from left to right as follows:</p>
          <ul>
          <li>Title</li>
          <li>First Name</li>
          <li>Last Name</li>
          <li>Phone Number</li>
          <li>Email Address</li>
          <li>Password</li>
          </ul>
          <br />
          
          <br /><br /><input type="file" name="file" required><br /><br />
        <input type="submit" name="submit" value="Submit" class="redbutton" />
</form>

             
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>