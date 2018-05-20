<?php
  include'../includes/connection.inc.php';
  $link = connectTo();
  
  $sql = "SELECT * FROM users";
  $result = mysqli_query($link, $sql)or die ("couldn't execute query.".mysql_error());
  
 while($row = mysqli_fetch_assoc($result))
 {
   $user = $row['userID'];
   $userName = $row['username'];
   
   $query = "UPDATE user_info SET
            user_table_id = '$user'
            WHERE email = '$userName'";
   $result2 = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   if($result2)
   {
     echo 'Done';
   }
 }


 ?>