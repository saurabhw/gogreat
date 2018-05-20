<?php

  include '../includes/connection.inc.php';
  $link = connectTo();
  
  $query = "Select * FROM Dealers";
  $result = mysqli_query($link, $query)or die("MySQL ERROR om query: ".mysqli_error());
  while($row = mysqli_fetch_assoc($result))
  {
     $orgType = $row['orgtype'];
     $clubType = $row['DealerDir'];
     $orgType = str_replace("'",'',$orgType);
     $clubType = str_replace("'",'',$clubType);
     $id = $row['loginid'];
     $banner = $row['Banner'];
     $leader = $row['leader_pic'];
     $location = $row['location_pic'];
     $gtp = $row['group_team_pic'];
     $cp = $row['contact_pic'];
     $banner_path = $row['banner_path'];
     $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$orgType' AND club = '$clubType'";
     $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
     $row2 = mysqli_fetch_assoc($sampleResult);
     
     $studentPhoto = $row2['student_leaders'];
     $groupPhoto = $row2['groupPhoto'];
     $bannerPhoto = $row2['bannerPath'];
     $contactPhoto = $row2['contact_group_photo'];
     $groupLeaderPhoto = $row2['group_leader'];
     
     $studentPhoto = addslashes($studentPhoto);
     $groupPhoto = addslashes($groupPhoto);
     $bannerPhoto = addslashes($bannerPhoto);
     $contactPhoto = addslashes($contactPhoto);
     $groupLeaderPhoto = addslashes($groupLeaderPhoto);
     
     if($banner == '')
     {
        $query1 = "UPDATE Dealers SET   
               Banner = '$bannerPhoto'
               WHERE loginid = '$id'";
        $result1 = mysqli_query($link, $query1)or die("error query 1:".mysqli_error());        
     }
     if($leader == '')
     {
        $query2 = "UPDATE Dealers SET   
               leader_pic = '$groupLeaderPhoto'
               WHERE loginid = '$id'";
        $result2 = mysqli_query($link, $query2)or die("error query 2:".mysqli_error());        
     }
     if($location == '')
     {
        $query3 = "UPDATE Dealers SET   
               location_pic = '$contactPhoto'
               WHERE loginid = '$id'";
        $result3 = mysqli_query($link, $query3)or die("error query 3:".mysqli_error());        
     }
      if($gtp == '')
     {
        $query4 = "UPDATE Dealers SET   
               group_team_pic = '$groupPhoto'
               WHERE loginid = '$id'";
        $result4 = mysqli_query($link, $query4)or die("error query 4:".mysqli_error());        
     }
      if($cp == '')
     {
        $query4 = "UPDATE Dealers SET   
               contact_pic = '$studentPhoto'
               WHERE loginid = '$id'";
        $result4 = mysqli_query($link, $query4)or die("error query 4:".mysqli_error());        
     }
     if($banner_path == '')
     {
        $query5 = "UPDATE Dealers SET   
               banner_path = '$bannerPhoto'
               WHERE loginid = '$id'";
        $result5 = mysqli_query($link, $query5)or die("error query 5:".mysqli_error());        
     }
     
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  /*
  $getReasons = "SELECT * FROM fund_reasons";
  $reasonsResult = mysqli_query($link, $getReasons) or die(mysqli_error());
  
  
  while($row1 = mysqli_fetch_assoc($reasonsResult))
  {
     $fund = $row1['fundID'];
  
     $getIDs = "SELECT * FROM Dealers WHERE loginid = '$fund'";
     $result = mysqli_query($link, $getIDs) or die(mysqli_error());
     while($row = mysqli_fetch_assoc($result))
     {
        $id = $row['loginid'];
        $orgType = $row['orgtype'];
        $clubType = $row['DealerDir'];
        $orgType = addslashes($orgType);
        $clubType = addslashes($clubType);
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$orgType' AND club = '$clubType'";
        $sampleResult = mysqli_query($link, $sampleR) or die(mysqli_error());
        while($row2 = mysqli_fetch_assoc($sampleResult))
        {
          $r1 = $row2['reason1'];
          $r2 = $row2['reason2'];
          $r3 = $row2['reason3'];
          $r4 = $row2['reason4'];
          $r5 = $row2['reason5'];
          $r6 = $row2['reason6'];
          $r7 = $row2['reason7'];
          $r8 = $row2['reason8'];
          $r9 = $row2['reason9'];
          $r10 = $row2['reason10'];
          
          $query = "UPDATE fund_reasons SET
          r1 = '$r1',
          r2 = '$r2',
          r3 = '$r3',
          r4  = '$r4', 
          r5  = '$r5', 
          r6  = '$r6', 
          r7  = '$r7', 
          r8  = '$r8', 
          r9  = '$r9', 
          r10  = '$r10'
          WHERE fundID = '$id'";
          $result2 = mysqli_query($link, $query)or die(mysqli_error());
          if($result2)
          { 
            echo 'done';
          }
     }
  }
  }
  */
?>