<?php

  include '../includes/connection.inc.php';
  $link = connectTo();
  //$dealer_id = 9014;
  $query = "SELECT * FROM orgMembers";
  $result = mysqli_query($link, $query)or die("MySQL ERROR om query: ".mysqli_error($link));
  while($row = mysqli_fetch_assoc($result))
  {
    
     $group_id = $row['fund_owner_id'];
     
     //get first dealer id of this account
     $getGroup = "SELECT * FROM Dealers WHERE loginid = '$group_id'";
     $getResult = mysqli_query($link, $getGroup)or die("MySQL ERROR om query  get result: ".mysqli_error($link));
     while($row2 = mysqli_fetch_assoc($getResult))
     {
        $repID = $row2['setuppersonid'];
        //get rep's setup people
        $query2 = "SELECT * FROM distributors WHERE loginid = '$repID' AND role = 'RP'";
        $resultRep = mysqli_query($link, $query2)or die("MySQL ERROR om query  get rep result: ".mysqli_error($link));
        $rowRep = mysqli_fetch_assoc($resultRep);
        $scID = $rowRep['setupID'];
        $vpID = $rowRep['vpID'];
        
        //set the first record as main group
        $groupSet = "UPDATE orgMembers SET
        repID = '$repID',
        scID = '$scID',
        vpID = '$vpID'
        WHERE fund_owner_id = '$group_id'";
        $setResult = mysqli_query($link, $groupSet)or die("MySQL ERROR om query  set main group: ".mysqli_error($link));
        
       
                           
     }
  }
?>