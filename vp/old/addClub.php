<?php
                                                                                         
   include '../includes/autoload.php';
      //if not logged in kick them to home page
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       
       //get user ID and database connection
       //$repID = $_SESSION['userId'];
       include '../includes/connection.inc.php';
       $link = connectTo();
       $getGroup = $_GET['group'];
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
       $pic = $row['picPath'];
       $table = "Dealers";
       
       if(isset($_POST['submit']))
       {
          if (isset($_POST['clubs'])) 
        {
          $org = $_POST['users'];
          $split = explode(",", $org);
          
          $name = $split[0]; 
          $zip = $split[1]; 
          
          $getGroup = "SELECT * FROM Dealers WHERE Dealer = '$name' AND Zip = '$zip' LIMIT 1";
          $groupResult = mysqli_query($link, $getGroup)or die ("couldn't execute group query.".mysqli_error($link));
          $row = mysqli_fetch_assoc($groupResult);
          if(mysqli_num_rows($groupResult) < 1)
          {
             echo 'wrong';
          }
          $groupName = $row['Dealer'];
          $phone = $row['Phone'];
          $ad1 = $row['Address1'];
          $ad2 = $row['Address2'];
          $city = $row['City'];
          $state = $row['State'];
          $banner = $row['Banner'];
          $orgType = $row['orgtype'];
          $signup = $row['signuptype'];
          $bannerP = $row['banner_path'];
          $zip = $row['Zip'];
          $contactEmail = $row['email'];
          $url = $row['website'];
          
          $type = "fundraiser";
          $role = "fundOwner";
          $table1 = "user_info";
          $table2 = "users";
          $table3 = "Dealers";
          $table4 = "captions";
          $table5 = "organizations";
          $salt = time();
         // echo $groupName;
        
    
     
        $optionArray = $_POST['clubs'];
      
         for ($i = 0; $i < count($optionArray); $i++){
      	mysqli_query($link, "start transaction;");
      	
      	$cleanName = str_replace(' ', '', $optionArray[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
      	//insert some data for user_info table
      	$query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, homePhone, role, dealer)";
      	$query1 .="VALUES('$groupName', '$ad1','$ad2', '$city', '$state','$zip', '$userName', '$phone', '$role','$optionArray[$i]')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
     
        	
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/leaderLogin.php";
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, setuppersonid, signuptype, orgtype, email, website, userName, firstPass, banner_path) VALUES ( '$groupName', '$optionArray[$i]', '$phone','$ad1','$ad2','$city','$state','$zip', '$bannerP', '$userID','$type',
'$orgType','$contactEmail','$url','$userName','$loginPass', '$bannerP')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$d_row = mysqli_fetch_assoc($result6);
  	$f_id = $d_row['loginid'];
  	$blank = "";
  	 	
  	 //set up fundraiser owner user name and password
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$query10 = "INSERT INTO fund_reasons (fundID)";
	$query10 .= "VALUES('$f_id')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
	
	
	
	//send in an id for later editing of photo captions
     
           /* $message = "You have created a user name and password for ".$groupName;
  	    $message .= "\r\n";
  	    $message .= "User Name: ".$userName;
  	    $message .= "\r\n";
  	    $message .= "Password: ".$loginPass;
  	    $message = wordwrap($message, 70, "\r\n");
  	    $to = $user_email;
            $subject = 'Account Credentials Ready';
            $headers = 'From: noreply@greatmoods.com' . "\r\n" .
            'Reply-To: noreply@greatmoods.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);*/
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
    } // end for
   	    
}
          
          
          
          
}
 header('Location: accounts.php');
 ob_end_flush();
?>