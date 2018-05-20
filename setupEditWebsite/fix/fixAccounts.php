<?php

  include '../includes/connection.inc.php';
  $link = connectTo();
  $dealer_id = 9014;
  $query = "SELECT DISTINCT Dealer, Address1, Zip FROM Dealers WHERE setuppersonid = '$dealer_id'";
  $result = mysqli_query($link, $query)or die("MySQL ERROR om query: ".mysqli_error($link));
  while($row = mysqli_fetch_assoc($result))
  {
      //
      /*
      echo  '<ul>
       <li>'.$row[Dealer].' '.$row[Zip].'</li>
      </ul>';
     */
     $groupName = addslashes($row['Dealer']);
     $zip = $row['Zip'];
     $a1 = $row['Address1'];
     
     //get first record of this account
     $getGroup = "SELECT * FROM Dealers WHERE Dealer = '$groupName' AND Address1 = '$a1' AND Zip = '$zip' LIMIT 1";
     $getResult = mysqli_query($link, $getGroup)or die("MySQL ERROR om query  get result: ".mysqli_error($link));
     while($row2 = mysqli_fetch_assoc($getResult))
     {
        $mainID = $row2['loginid'];
        //echo $mainID.'<br>';
        
       //set the first record as main group
       $groupSet = "UPDATE Dealers SET
        isMainGroup = 1
        WHERE loginid = '$mainID'";
        
        $setResult = mysqli_query($link, $groupSet)or die("MySQL ERROR om query  set main group: ".mysqli_error($link));
        
        //set clubs with matching  addres and zip under the set main group
        $updateGroups = "UPDATE Dealers SET
                         sponsorid = '$mainID'
                         WHERE Dealer = '$groupName' AND Address1 = '$a1' AND Zip = '$zip' AND setuppersonid = '$dealer_id' AND loginid != '$mainID'";
        $groupsResult = mysqli_query($link, $updateGroups)or die("MySQL ERROR om query  set clubs under main group: ".mysqli_error($link));
                           
     }
  }
?>