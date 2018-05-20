<?php
  include '../includes/autoload.php';
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
     $groupID = mysqli_real_escape_string($link, $_POST['groupid2']);
     $repID = mysqli_real_escape_string($link, $_POST['rpid2']);
     $scID = mysqli_real_escape_string($link, $_POST['scid2']);;
     $salt = time();
     
     $queryA = "SELECT * FROM Dealers WHERE loginid = '$groupID'";
     $resultA = mysqli_query($link, $queryA)or die ("couldn't execute query A.".mysqli_error($link));
     
     while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
      {
        $titlex = mysqli_real_escape_string($link, $filesop[0]);
        $fname = mysqli_real_escape_string($link, $filesop[1]);
        $lname = mysqli_real_escape_string($link, $filesop[2]);
        $lname = mysqli_real_escape_string($link, addslashes($lname));
        $email = mysqli_real_escape_string($link, $filesop[3]);
        $password2 = mysqli_real_escape_string($link, $filesop[4]);
        $phone = mysqli_real_escape_string($link, $filesop[5]);
        $loginPass = sha1($password.$salt);
        $landingPage = "fundMember/memberLogin.php";
        $role = "Member";
        //check if user already exists
        $queryB = "SELECT * FROM users WHERE username='$email'";
        $resultB = mysqli_query($link, $queryB)or die ("couldn't execute query B.".mysqli_error($link));
        $rowB = mysqli_fetch_assoc($resultB);
        if(mysqli_num_rows($resultB) > 0)
        {
           //check if user already exists in this group
           $queryC = "SELECT * FROM Dealers WHERE userName ='$email' AND setuppersonid = '$groupID' ";
           $resultC = mysqli_query($link, $queryC)or die ("couldn't execute query C.".mysqli_error($link));
           $rowC = mysqli_fetch_assoc($resultC);
	  
           if(mysqli_num_rows($resultC) < 1)
           {
              //user exists but not of this group get info for found user
              $queryD = "SELECT * FROM user_info WHERE email='$email'";
              $resultD = mysqli_query($link, $queryD)or die ("couldn't execute query D.".mysqli_error($link));
              $rowD = mysqli_fetch_assoc($resultD);
              $name = $rowD['FName'];
              $surname = $rowD['LName'];
              $title = $rowD['title'];
              $gender = $rowD['LName']; 
              $foundPic = $rowD['picPath'];
              
              
              //get group info
              $group_query = "SELECT * FROM Dealers WHERE loginid='$groupID'";
	      $g_result = mysqli_query($link, $group_query)
	      or die ("couldn't execute query group query E.".mysql_error());
	      $group_row = mysqli_fetch_assoc($g_result);
	      $group_id = $group_row['loginid'];
	      $dealer = mysqli_real_escape_string($link, $group_row['Dealer']);
	      $dealerdir = mysqli_real_escape_string($link, $group_row['DealerDir']);
	      $about = mysqli_real_escape_string($link, $group_row['About']); 
	      $reason = mysqli_real_escape_string($link, $group_row['FundraiserReasons']);
	      $goal = mysqli_real_escape_string($link, $group_row['FundraiserGoal']); 
	      $start = mysqli_real_escape_string($link, $group_row['FundraiserStartDate']); 
	      $endz = mysqli_real_escape_string($link, $group_row['FundraiserEndDate']); 
	      $phone1 = mysqli_real_escape_string($link, $group_row['Phone']); 
	      $address1 = mysqli_real_escape_string($link, $group_row['Address1']); 
	      $address2 = mysqli_real_escape_string($link, $group_row['Address2']); 
	      $ct = mysqli_real_escape_string($link, $group_row['City']);
	      $st = mysqli_real_escape_string($link, $group_row['State']);
	      $zp = mysqli_real_escape_string($link, $group_row['Zip']);
	      $signupType = mysqli_real_escape_string($link, $group_row['signuptype']);
	      $orgType = mysqli_real_escape_string($link, $group_row['orgtype']);
	      $payMail = mysqli_real_escape_string($link, $group_row['PaypalEmail']);
	      $banner = mysqli_real_escape_string($link, $group_row['banner_path']);
	      $leaderPic = mysqli_real_escape_string($link, $group_row['leader_pic']);
	      $locationPic = mysqli_real_escape_string($link, $group_row['location_pic']);
	      $groupPic = mysqli_real_escape_string($link, $group_row['group_team_pic']);
	      $url = mysqli_real_escape_string($link, $group_row['website']);
	      $club = mysqli_real_escape_string($link, $group_row['clubType']);
	      $sponsor = mysqli_real_escape_string($link, $group_row['sponsorid']);
	      //$repID = $group_row['setuppersonid'];
	      $com = 0.35;
	      $user_page = "../membersite.php?group="; 
	      $dealer = addslashes($dealer);
	      $banner = addslashes($banner);
	      //insert new users into group 
	      $query3 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal,  FundraiserStartDate, FundraiserEndDate, Phone, Address1, Address2, City, State, Zip, PaypalEmail, Banner, setuppersonid, setuppersonid2, setuppersonid3, signuptype, orgtype, email, website, facebook, twitter, leader_pic, location_pic,  group_team_pic, contact_pic, userName, banner_path, firstPass, clubType)";
		$query3 .= "VALUES('$dealer1','$dealerdir1','$about','$reason','$goal','$start','$endz', '$phone1', '$address1', '$address2', '$ct','$st','$zp','$payMail','$banner', '$groupID','$repID','$sponsor', '$signupType', '$orgType', '$email','$url','$face', '$twt','$leaderPic', '$locationPic', '$groupPic', '$foundPic', '$email','$banner', '$password2', '$club')";
		$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 39.".mysqli_error($link));
		 
		 //get the member
		$queryL = "SELECT * FROM Dealers WHERE setuppersonid = '$groupID' AND email = '$email'";
		$resultL = mysqli_query($link, $queryL)or die ("couldn't execute query L.".mysqli_error($link));
		$rowL = mysqli_fetch_assoc($resultL);
		$logID = $rowL['loginid'];
		        
		        //insert into the orgMembers table
  $queryH = "INSERT INTO orgMembers(Title, orgFName, orgLName, orgEmail, orgPhone,orgRel, fundraiserID, fund_owner_id, repID)VALUES('$titlex', '$fname','$lname','$email','$phone', '$role', '$logID','$groupID','$repID')";
	$resultH = mysqli_query($link, $queryH)or die ("couldn't execute query h.".mysqli_error($link));
           }//user not in this group
               $clean1 = "DELETE FROM users WHERE username = 'email'";
               $cleanResult1 = mysqli_query($link, $clean1)or die ("couldn't execute query M.".mysqli_error($link));
               
               $clean2 = "DELETE FROM user_info WHERE email = 'email'";
               $cleanResult2 = mysqli_query($link, $clean2)or die ("couldn't execute query K.".mysqli_error($link));
               
               $clean3 = "DELETE FROM Dealers WHERE userName = 'email'";
               $cleanResult3 = mysqli_query($link, $clean3)or die ("couldn't execute query Q.".mysqli_error($link));
               
               $clean4 = "DELETE FROM orgMembers WHERE orgEmail = 'email'";
               $cleanResult4 = mysqli_query($link, $clean4)or die ("couldn't execute query V.".mysqli_error($link));
               
               $clean5 = "DELETE FROM orgMembers WHERE orgFName = 'First Name'";
               $cleanResult5 = mysqli_query($link, $clean5)or die ("couldn't execute query Z.".mysqli_error($link)); 
        }//user does not exist
        else
        {
              $groupID = mysqli_real_escape_string($link, $_POST['groupid2']);
              $repID = mysqli_real_escape_string($link, $_POST['rpid2']);
             //get group info
              $group_query = "SELECT * FROM Dealers WHERE loginid='$groupID'";
	      $g_result = mysqli_query($link, $group_query)
	      or die ("couldn't execute query group query E.".mysql_error());
	      $group_row = mysqli_fetch_assoc($g_result);
	  
	      $dealer = mysqli_real_escape_string($link, $group_row['Dealer']);
	      //$dealer1 = mysqli_real_escape_string($link, $dealer));
	      $dealerdir = mysqli_real_escape_string($link, $group_row['DealerDir']);
	      //$dealerdir1 = mysqli_real_escape_string($link, $dealerdir));
	      $about = mysqli_real_escape_string($link, $group_row['About']); 
	      $reason = mysqli_real_escape_string($link, $group_row['FundraiserReasons']);
	      $goal = mysqli_real_escape_string($link, $group_row['FundraiserGoal']); 
	      $start = mysqli_real_escape_string($link, $group_row['FundraiserStartDate']); 
	      $endz = mysqli_real_escape_string($link, $group_row['FundraiserEndDate']); 
	      $phone1 = mysqli_real_escape_string($link, $group_row['Phone']);
	      $address1 = mysqli_real_escape_string($link, $group_row['Address1']); 
	      $address2 = mysqli_real_escape_string($link, $group_row['Address2']); 
	      $ct = mysqli_real_escape_string($link, $group_row['City']);
	      $st = mysqli_real_escape_string($link, $group_row['State']);
	      $zp = mysqli_real_escape_string($link, $group_row['Zip']);
	      $signupType = mysqli_real_escape_string($link, $group_row['signuptype']);
	      $orgType = mysqli_real_escape_string($link, $group_row['orgtype']);
	      $payMail = mysqli_real_escape_string($link, $group_row['PaypalEmail']);
	      $banner = mysqli_real_escape_string($link, $group_row['banner_path']);
	      $leaderPic = mysqli_real_escape_string($link, $group_row['leader_pic']);
	      $locationPic = mysqli_real_escape_string($link, $group_row['location_pic']);
	      $groupPic = mysqli_real_escape_string($link, $group_row['group_team_pic']);
	      $url = mysqli_real_escape_string($link, $group_row['website']);
	      $club = mysqli_real_escape_string($link, $group_row['clubType']);
	      $sponsor = mysqli_real_escape_string($link, $group_row['sponsorid']);
	      //$repID = $group_row['setuppersonid'];
	      $com = 0.35;
	      $user_page = "../membersite.php?group="; 
	      
           //insert new users
	  $query1 = "INSERT INTO users (username, password, Security, landingPage, salt, created, lastLogin, role)";
	  $query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$role')";
	  $queryResult1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
	  
	  $queryQ = "SELECT * FROM users WHERE username = '$email'";
	  $resultQ = mysqli_query($link, $queryQ)or die ("couldn't execute query L.".mysqli_error($link));
	  $rowQ = mysqli_fetch_assoc($resultQ);
	  $user_table_id = $rowQ['userID'];
	  
	  $query2 = "INSERT INTO user_info (companyName, FName, LName, email, salesPerson, workPhone, userPaypal, role, dealer, title, user_table_id)";
	  $query2 .= "VALUES('$dealer', '$fname','$lname','$email', '$repID', '$phn', '$payMail','$role', '$dealerdir', '$titlex', '$user_table_id')";
          $queryResult2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysqli_error($link));
        /*
        $sql = mysql_query("INSERT INTO user_info (FName, LName, email,workPhone, title) VALUES ('$fname', '$lname','$email','$phone', '$title')");
        */
        
        $query3 = "INSERT INTO Dealers (Dealer, DealerDir, About, FundraiserReasons, FundraiserGoal, FundraiserStartDate, FundraiserEndDate, Phone, Address1, Address2, City, State, Zip, PaypalEmail, Banner, setuppersonid, setuppersonid2, setuppersonid3, signuptype, orgtype, email, website, facebook, twitter, leader_pic, location_pic,  group_team_pic, userName, banner_path, firstPass, clubType)";
		$query3 .= " VALUES('$dealer','$dealerdir','$about','$reason','$goal','$start','$endz', '$phone1', '$address1', '$address2', '$ct','$st','$zp','$payMail','$banner',  '$groupID','$repID', '$sponsor', '$signupType', '$orgType', '$email','$url','$face', '$twt','$leaderPic', '$locationPic', '$groupPic', '$email','$banner','$password2', '$club')";
		 $queryResult3 = mysqli_query($link, $query3)or die ("couldn't execute query 7683.".mysqli_error($link));
		 //get the member
		$queryL = "SELECT * FROM Dealers WHERE setuppersonid = '$groupID' AND email = '$email'";
		$resultL = mysqli_query($link, $queryL)or die ("couldn't execute query L.".mysqli_error($link));
		$rowL = mysqli_fetch_assoc($resultL);
		$logID = $rowL['loginid'];
		
		  //insert into the orgMembers table
		$queryX = "INSERT INTO orgMembers(Title, orgFName, orgLName, orgEmail, orgPhone,orgRel, fundraiserID, fund_owner_id, repID, isLeader, scID)VALUES('$titlex', '$fname','$lname','$email','$phone', '$role', '$logID','$groupID','$repID', '0','$scID')";
		$resultX = mysqli_query($link, $queryX)or die ("couldn't execute query X.".mysqli_error($link));
		/*
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
               */
               //clean up database
               $clean1 = "DELETE FROM users WHERE username = 'email'";
               $cleanResult1 = mysqli_query($link, $clean1)or die ("couldn't execute query M.".mysqli_error($link));
               
               $clean2 = "DELETE FROM user_info WHERE email = 'email'";
               $cleanResult2 = mysqli_query($link, $clean2)or die ("couldn't execute query K.".mysqli_error($link));
               
               $clean3 = "DELETE FROM Dealers WHERE userName = 'email'";
               $cleanResult3 = mysqli_query($link, $clean3)or die ("couldn't execute query Q.".mysqli_error($link));
               
               $clean4 = "DELETE FROM orgMembers WHERE orgEmail = 'email'";
               $cleanResult4 = mysqli_query($link, $clean4)or die ("couldn't execute query V.".mysqli_error($link));
               
               $clean5 = "DELETE FROM orgMembers WHERE orgFName = 'First Name'";
               $cleanResult5 = mysqli_query($link, $clean5)or die ("couldn't execute query Z.".mysqli_error($link));
	       //header( 'Location: editMembers.php?group='.$groupID );
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
      header( 'Location: editMembers.php?group='.$groupID );
  }
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='VP'";
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
          <h1>Upload Memders</h1>
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