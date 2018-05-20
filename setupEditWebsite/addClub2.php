<?php
   
      include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
       
       
       $getGroup = $_GET['group'];
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
       $row = mysqli_fetch_assoc($result);
       $pic = $row['picPath'];
       $table = "Dealers";
       
       if(isset($_POST['submit']))
       {
          
          
          $orgID = $_POST['group'];
          
          
          $getGroup = "SELECT * FROM Dealers WHERE loginid = '$orgID'";
          $groupResult = mysqli_query($link, $getGroup)or die ("couldn't execute group query.".mysql_error());
          $row = mysqli_fetch_assoc($groupResult);
          if(mysqli_num_rows($groupResult) < 1)
          {
             echo 'wrong';
          }
          $groupName =  mysqli_real_escape_string($link, $row['Dealer']);
          $phone = $row['Phone'];
          $ad1 = $row['Address1'];
          $ad2 = $row['Address2'];
          $city = $row['City'];
          $state = $row['State'];
          $banner = mysqli_real_escape_string($link, $row['Banner']);
          $orgType = $row['orgtype'];
          $signup = $row['signuptype'];
          $bannerP = mysqli_real_escape_string($link, $row['banner_path']);
          $set_up = $row['setuppersonid'];
          $leaderPic = $row['leader_pic'];
          $locationPic = $row['location_pic'];
          $collage = $row['group_team_pic'];
          $contactPic = $row['contact_pic'];
          $zip = $row['Zip'];
          $contactEmail = $row['email'];
          $url = $row['website'];
          $sponsor = $row['loginid'];
          $type = "fundraiser";
          $role = "fundOwner";
          $table1 = "user_info";
          $table2 = "users";
          $table3 = "Dealers";
          $table4 = "captions";
          $table5 = "organizations";
          $salt = time();
         // echo $groupName;
     
      if (isset($_POST['clubs'])) 
       {
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
      	$userID = $_SESSION['userId'];
      	 $result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
         //query data just inserted to get info id
         $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
         $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
         $row1 = mysqli_fetch_assoc($result2);
         $user_id = $row1['userInfoID'];
         //isert fundraiser
     
         $club_type = "Clubs & Organizations";
         $loginPass = $cleanName.$tax;
         $loginPassx = sha1($loginPass.$salt); 	
	 $landingPage = "editFundraiser/leaderLogin.php";
	
	 $query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, firstPass, banner_path, clubType) VALUES ( '$groupName', '$optionArray[$i]', '$phone','$ad1','$ad2','$city','$state','$zip', '$banner', '$sponsor', '$set_up', '$type', '$orgType','$contactEmail','$url', '$leaderPic', '$locationPic', '$collage', '$contactPic', '$userName','$loginPass', '$bannerP', '$club_type')";
 
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
	
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
      } // end for
   	    
    }//post clubs    
    if (isset($_POST['clubs1'])) 
       {
          $optionArray4 = $_POST['clubs1'];
      
         //for ($i = 0; $i < count($optionArray4); $i++){
      	 mysqli_query($link, "start transaction;");
      	
      	 $cleanName = str_replace(' ', '', $optionArray4[$i]);
         $cleanName = strtolower($cleanName);
         $cleanName = trim($cleanName);
         $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
         $tax = rand(100,9000);
         $tax2 = rand(1,99);
         $tax = $tax.$tax2;
         $userName = $cleanName.$tax;
      	 //insert some data for user_info table
      	 $query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, homePhone, role, dealer)";
      	 $query1 .="VALUES('$groupName', '$ad1','$ad2', '$city', '$state','$zip', '$userName', '$phone', '$role','$optionArray4')";
      	 $userID = $_SESSION['userId'];
      	 $result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
         //query data just inserted to get info id
         $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
         $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
         $row1 = mysqli_fetch_assoc($result2);
         $user_id = $row1['userInfoID'];
         //isert fundraiser
     
         $club_type = "Athletics";
         $loginPass = $cleanName.$tax;
         $loginPassx = sha1($loginPass.$salt); 	
	 $landingPage = "editFundraiser/leaderLogin.php";
	
	 $query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype, email, website, leader_pic, location_pic, group_team_pic, contact_pic,userName, firstPass, banner_path, clubType) VALUES ( '$groupName', '$optionArray4', '$phone','$ad1','$ad2','$city','$state','$zip', '$banner', '$sponsor', '$set_up','$type',
'$orgType','$contactEmail','$url', '$leaderPic', '$locationPic', '$collage', '$contactPic', '$userName','$loginPass', '$bannerP', '$club_type')";
 
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
	
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
      //} // end for
   	    
    }//post clubs 1 
    if (isset($_POST['athletics'])) 
       {
          $optionArray2 = $_POST['athletics'];
      
         for ($i = 0; $i < count($optionArray2); $i++){
      	 mysqli_query($link, "start transaction;");
      	
      	 $cleanName = str_replace(' ', '', $optionArray2[$i]);
         $cleanName = strtolower($cleanName);
         $cleanName = trim($cleanName);
         $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
         $tax = rand(100,9000);
         $tax2 = rand(1,99);
         $tax = $tax.$tax2;
         $userName = $cleanName.$tax;
      	 //insert some data for user_info table
      	 $query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, homePhone, role, dealer)";
      	 $query1 .="VALUES('$groupName', '$ad1','$ad2', '$city', '$state','$zip', '$userName', '$phone', '$role','$optionArray2[$i]')";
      	 $userID = $_SESSION['userId'];
      	 $result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
         //query data just inserted to get info id
         $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
         $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
         $row1 = mysqli_fetch_assoc($result2);
         $user_id = $row1['userInfoID'];
         //isert fundraiser
     
         $club_type = "Athletics";
         $loginPass = $cleanName.$tax;
         $loginPassx = sha1($loginPass.$salt); 	
	 $landingPage = "editFundraiser/leaderLogin.php";
	
	 $query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype, email, website, leader_pic, location_pic, group_team_pic, contact_pic,userName, firstPass, banner_path, clubType) VALUES ( '$groupName', '$optionArray2[$i]', '$phone','$ad1','$ad2','$city','$state','$zip', '$banner', '$sponsor', '$set_up','$type',
'$orgType','$contactEmail','$url', '$leaderPic', '$locationPic', '$collage', '$contactPic', '$userName','$loginPass', '$bannerP', '$club_type')";
 
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
	
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
      } // end for
   	    
    }//post athletics 
    
    if (isset($_POST['athletics1'])) 
       {
          $optionArray5 = $_POST['athletics1'];
      
         //for ($i = 0; $i < count($optionArray5); $i++){
      	 mysqli_query($link, "start transaction;");
      	
      	 $cleanName = str_replace(' ', '', $optionArray5[$i]);
         $cleanName = strtolower($cleanName);
         $cleanName = trim($cleanName);
         $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
         $tax = rand(100,9000);
         $tax2 = rand(1,99);
         $tax = $tax.$tax2;
         $userName = $cleanName.$tax;
      	 //insert some data for user_info table
      	 $query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, homePhone, role, dealer)";
      	 $query1 .="VALUES('$groupName', '$ad1','$ad2', '$city', '$state','$zip', '$userName', '$phone', '$role','$optionArray5')";
      	 $userID = $_SESSION['userId'];
      	 $result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
         //query data just inserted to get info id
         $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
         $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
         $row1 = mysqli_fetch_assoc($result2);
         $user_id = $row1['userInfoID'];
         //isert fundraiser
     
         $club_type = "Athletics";
         $loginPass = $cleanName.$tax;
         $loginPassx = sha1($loginPass.$salt); 	
	 $landingPage = "editFundraiser/leaderLogin.php";
	
	 $query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype, email, website, leader_pic, location_pic, group_team_pic, contact_pic,userName, firstPass, banner_path, clubType) VALUES ( '$groupName', '$optionArray5', '$phone','$ad1','$ad2','$city','$state','$zip', '$banner', '$sponsor', '$set_up','$type',
'$orgType','$contactEmail','$url', '$leaderPic', '$locationPic', '$collage', '$contactPic', '$userName','$loginPass', '$bannerP', '$club_type')";
 
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
	
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
     // } // end for
   	    
    }//post athletics 
    if (isset($_POST['general1'])) 
       {
          $optionArray6 = $_POST['general1'];
      
         //for ($i = 0; $i < count($optionArray6); $i++){
      	 mysqli_query($link, "start transaction;");
      	
      	 $cleanName = str_replace(' ', '', $optionArray6[$i]);
         $cleanName = strtolower($cleanName);
         $cleanName = trim($cleanName);
         $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
         $tax = rand(100,9000);
         $tax2 = rand(1,99);
         $tax = $tax.$tax2;
         $userName = $cleanName.$tax;
      	 //insert some data for user_info table
      	 $query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, homePhone, role, dealer)";
      	 $query1 .="VALUES('$groupName', '$ad1','$ad2', '$city', '$state','$zip', '$userName', '$phone', '$role','$optionArray6')";
      	 $userID = $_SESSION['userId'];
      	 $result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
         //query data just inserted to get info id
         $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
         $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
         $row1 = mysqli_fetch_assoc($result2);
         $user_id = $row1['userInfoID'];
         //isert fundraiser
     
         $club_type = "Athletics";
         $loginPass = $cleanName.$tax;
         $loginPassx = sha1($loginPass.$salt); 	
	 $landingPage = "editFundraiser/leaderLogin.php";
	
	 $query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype, email, website, leader_pic, location_pic, group_team_pic, contact_pic,userName, firstPass, banner_path, clubType) VALUES ( '$groupName', '$optionArray6', '$phone','$ad1','$ad2','$city','$state','$zip', '$banner', '$sponsor', '$set_up','$type',
'$orgType','$contactEmail','$url', '$leaderPic', '$locationPic', '$collage', '$contactPic', '$userName','$loginPass', '$bannerP', '$club_type')";
 
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
	$result8 = mysqli_query($link, $query8);
	
       
       if($result1 && $result4 && $result3 && $result5 && $result6 && $result7 && $result8)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
      //} // end for
   	    
    }//post athletics 
     
        $clean = "DELETE FROM Dealers WHERE Dealer = ''"; 
        $cleanResult = mysqli_query($link, $clean) 
        or die("MySQL ERROR on query clean: ".mysqli_error($link));
        /*
        while($cleanRow = mysqli_fetch_assoc($cleanResult))
        {
           $user
        }  
        */  
        
        //clean up
        $dbClean = "DELETE FROM Dealers WHERE DealerDir = '' OR Dealer = '' AND setuppersonid = '$userID'"; 
        $cleanResult = mysqli_query($link, $dbClean)or die("MySQL ERROR on db clean: ".mysqli_error($link));               
}//post submit
header('Location: editClub.php');
ob_end_flush();
?>