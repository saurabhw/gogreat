<?php
  session_start();
  if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
  include '../includes/connection.inc.php';
  $link = connectTo();
  $groupName = "";
  $FName = mysqli_real_escape_string($link, $_POST['FName']);
  $MName = mysqli_real_escape_string($link, $_POST['MName']);
  $LName = mysqli_real_escape_string($link, $_POST['LName']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $pass =  mysqli_real_escape_string($link, $_POST['confirmPass']);
  $address1 = mysqli_real_escape_string($link, $_POST['address1']);
  $address2 = mysqli_real_escape_string($link, $_POST['address2']);
  $city = mysqli_real_escape_string($link, $_POST['city']);
  $state = mysqli_real_escape_string($link, $_POST['state']);
  $zip = mysqli_real_escape_string($link, $_POST['zip']);
  $comment = mysqli_real_escape_string($link, $_POST['comment']);
  
  $hphone = mysqli_real_escape_string($link, $_POST['homephone']);
  $cphone = mysqli_real_escape_string($link, $_POST['cellphone']);
  $wphone = mysqli_real_escape_string($link, $_POST['workphone']);
  $xhone = mysqli_real_escape_string($link, $_POST['extphone']);
  
  $lhn = mysqli_real_escape_string($link, $_POST['LHnum']);
  $lhf = mysqli_real_escape_string($link, $_POST['LHfund']);
  $lhpeople = mysqli_real_escape_string($link, $_POST['LHpeople']);
  $lhpercent = mysqli_real_escape_string($link, $_POST['LHpercent']);
  $lhbaskets = mysqli_real_escape_string($link, $_POST['LHbaskets']);
  $lhnpy = mysqli_real_escape_string($link, $_POST['LHnumPerYear']);
  
  $lmn = mysqli_real_escape_string($link, $_POST['LMnum']);
  $lmf = mysqli_real_escape_string($link, $_POST['LMfund']);
  $lmpeople = mysqli_real_escape_string($link, $_POST['LMpeople']);
  $lmpercent = mysqli_real_escape_string($link, $_POST['LMpercent']);
  $lmbaskets = mysqli_real_escape_string($link, $_POST['LMbaskets']);
  $lmnpy = mysqli_real_escape_string($link, $_POST['LMnumPerYear']);
  
  $en = mysqli_real_escape_string($link, $_POST['LHnum']);
  $ef = mysqli_real_escape_string($link, $_POST['LHfund']);
  $epeople = mysqli_real_escape_string($link, $_POST['LHpeople']);
  $epercent = mysqli_real_escape_string($link, $_POST['LHpercent']);
  $ebaskets = mysqli_real_escape_string($link, $_POST['LHbaskets']);
  $enpy = mysqli_real_escape_string($link, $_POST['LHnumPerYear']);
  
  $lcn = mysqli_real_escape_string($link, $_POST['LCnum']);
  $lcf = mysqli_real_escape_string($link, $_POST['LCfund']);
  $lcpeople = mysqli_real_escape_string($link, $_POST['LCpeople']);
  $lcpercent = mysqli_real_escape_string($link, $_POST['LCpercent']);
  $lcbaskets = mysqli_real_escape_string($link, $_POST['LCbaskets']);
  $lcnpy = mysqli_real_escape_string($link, $_POST['LCnumPerYear']);
  
  $on = mysqli_real_escape_string($link, $_POST['Onum']);
  $o_f = mysqli_real_escape_string($link, $_POST['Ofund']);
  $opeople = mysqli_real_escape_string($link, $_POST['Opeople']);
  $opercent = mysqli_real_escape_string($link, $_POST['Opercent']);
  $obaskets = mysqli_real_escape_string($link, $_POST['Obaskets']);
  $onpy = mysqli_real_escape_string($link, $_POST['OnumPerYear']);
  
  $hTotal = mysqli_real_escape_string($link, $_POST['lh']);
  $mTotal = mysqli_real_escape_string($link, $_POST['lm']);
  $eTotal = mysqli_real_escape_string($link, $_POST['le']);
  $cTotal = mysqli_real_escape_string($link, $_POST['lc']);
  $oTotal = mysqli_real_escape_string($link, $_POST['lo']);
  
  $highClubs = array("Baseball",
	             "Basketball, Boys","Basketball, Girls",
	             "Basketball, Boys",
	             "Basketball, Girls", "Cross Country", 
	             "Danceline", "Cheerleading", 
	             "Football", "Field Hockey", 
	             "Golf, Boys", "Golf, Girls",
	             "Gymnastics", "Ice Hockey",
	             "Lacrosse", "Power Lifting",
	             "Ski Club", "Soccer",
	             "Softball","Swimming & Diving",
	             "Tennis, Boys", "Tennis, Girls",
	             "Track & Field", "Volleyball, Boys",
	             "Volleyball, Girls", "Wrestling",
	             "Band","BPA","Book Club","Booster Club",
	             "Chess Club","Choir","Class Trips","Debate","FBLA",
	             "Language Club","Library","National Art HS",
	             "National Honor Society","Prom Committee",
	             "PTA/PTO", "Scholars Bowl", "Scholarship Counseling", "School Counseling", "Science & Math Club", " Student Council",
	             "Theatre","Yearbook","News Broadcasting","General Fundraiser");
	             
  $middleClubs = array("Baseball","Basketball","Bowling","Cheerleading","Cross Country","Football",
                       "Field Hockey","Golf","Gymnastics","Ice Hockey","Lacrosse","Ski Club",
                       "Soccer","Softball","Swimming","Tennis","Track & Field","Volleyball",
                       "General Fundraiser", "Band", "Book Club", "Booster Club", "Chess Club",
                       "Choir","Class Trips","Debate","Library","PTA/PTO", "School Counseling","Science Club","Math Club");
                       










           
	             
  $table = "users";
  $table1 = "user_info";
  $table2 = "representatives";
  $table3 = "Dealers";
  $table4 = "income_calculator";
  $role = "Representtive";
  $landingPage = "setupEditWebsite/rephome.php";
 
  
  $target_path = "resumes/";
  $query1 = "INSERT INTO $table1(companyName, FName, MName, LName, address1, address2, city, state, zip, email, role)";
      	$query1 .="VALUES('$groupName','$FName', '$MName', '$LName','$address1','$address2','$city','$state','$zip', '$role')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
     
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Address1, Address2, City, State, Zip, ContactName, setuppersonid, signuptype, orgtype, email, website, userName, firstPass, banner_path) VALUES ( '$groupName', '$optionArray[$i]','$address1','$address2','$city','$state','$zip','$contactFirstName','$setup_person','$type',
'$neworgtype','$contactEmail','$url','$userName','$loginPass', '$bannerPicPath')";
 
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
	
	$query5 = "INSERT INTO $table4 (calc_email, LHnum, LHfund, LHpeople, LHbaskets, LHpercent, LHnumPerYear, LMnum, LMfund, LMpeople, LMbaskets, LMpercent, LMnumPerYear,Enum, Efund, Epeople, Ebaskets, Epercent, EnumPerYear, LCnum, LCfund, LCpeople, LCbaskets, LCpercent, LCnumPerYear, Onum, Ofund, Opeople, Obaskets, Opercent, OnumPerYear,grand_total)";
	$query5 .= "VALUES('$email','$lhn','$lhf','$lhpeople','$lhpercent', '$lhbaskets', '$lhbaskets', '$lhnpy',)";
	$result5 = mysqli_query($link, $query3)or die("MySQL ERROR om query 5: ".mysqli_error($link));
	
	
  
  $target_path = $target_path . basename( $_FILES['resume']['name']); 
  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
  {
    echo "The file ".  basename( $_FILES['resume']['name']). 
    " has been uploaded";
  } 
  else
  {
    echo "There was an error uploading the file, please try again!";
  }
?>