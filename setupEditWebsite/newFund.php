<?php
        include '../includes/autoload.php';
        if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
        {
            header('Location: ../index.php');
            exit;
        }
        
        $clubType = mysqli_real_escape_string($link, $_POST['type']);
        $group = mysqli_real_escape_string($link, $_POST['groupid']);
        $userID = $_SESSION['userId'];
      
        $table1 = "user_info";
        $table2 = "users";
        $table3 = "Dealers";
        $table4 = "captions";
        $query = "SELECT * FROM $table3 WHERE loginid='$group' AND setuppersonid='$userID'";
        $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        $fundraiserid = $row['loginid'];
        $dealer = $row['Dealer'];
        $a1 = $row['Address1'];
        $a2 = $row['Address2'];
        $city = $row['City'];
        $state = $row['State'];
        $zip = $row['Zip'];
        $sType = $row['signuptype'];
        $oType = $row['orgtype'];
        $url = $row['website'];
        $bp = $row['bannerPath'];
        $role = "fundOwner";
       
        $dealer = preg_replace("/[^A-Za-z0-9 ]/", '', $dealer);
        $a1 = preg_replace("/[^A-Za-z0-9 ]/", '', $a1);
        $a2 = preg_replace("/[^A-Za-z0-9 ]/", '', $a2);
        
        $cleanName = str_replace(' ', '', $clubType);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
      	//insert some data for user_info table
      	$query1 = "INSERT INTO $table1(companyName, address1, address2, city, state, zip, email, role, dealer)";
      	$query1 .="VALUES('$dealer','$a1','$a2','$city','$state','$zip','$userName','$role','$dealer')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        
        //get default photos from sample database
        /*$sample_table = "sample_websites";
        $query7 = "Select * From $sample_table WHERE club='$optionArray[$i]'";
        $result7 = mysqli_query($link, $query7)or die("MySQL ERROR om query 7: ".mysqli_error($link));
        $row7 = mysqli_fetch_assoc($result7);
        $group_photo = $row7['groupPhoto'];
        $group_lead = $row7['group_leader'];
        $contact_gp = $row7['contact_group_photo'];
        $student_lead = $row7['student_leaders'];*/
        
        //insert fundraiser
     
        	
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Address1, Address2, City, State, Zip, setuppersonid, signuptype, orgtype, website, userName, firstPass, banner_path) VALUES ( '$dealer', '$clubType','$a1','$a2','$city','$state','$zip','$userID','$sType',
'$oType','$url','$userName','$loginPass', '$bp')";
 
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

        $redirect = "Location:editClub.php";
        header("$redirect");
?>