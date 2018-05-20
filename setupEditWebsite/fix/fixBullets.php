<?php

  include '../includes/connection.inc.php';
  $link = connectTo();
  
  $query = "Select * FROM sample_websites";
  $result = mysqli_query($link, $query)or die("MySQL ERROR om query: ".mysqli_error());
  while($row = mysqli_fetch_assoc($result))
  {
     $reasons = $row['sampleReasons'];
     $id = $row['samplewebID'];
     
     $trimmed = rtrim($reasons);
     
     $update = "UPDATE sample_websites SET
                sampleReasons = '$trimmed'
                WHERE samplewebID = '$id'";
     $updateResult = mysqli_query($link, $update) or die("MySQL ERROR om query: ".mysqli_error($link));          
   
     
  }
  

?>