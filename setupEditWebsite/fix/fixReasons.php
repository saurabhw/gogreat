<?php

  include '../includes/connection.inc.php';
  $link = connectTo();
  
  
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
        $sampleResult = mysqli_query($link, $sampleR) or die(mysqli_error($link));
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
?>