<?php
   
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get members
     $query = "SELECT * FROM orgMembers WHERE  fund_owner_id='$vp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     while($row = mysqli_fetch_assoc($result))
     {
       echo '<option value="'.$row['orgMemberID'].'">'.$row[orgFName].' '.$row[orgLName].' '.$row[orgMemberID].'</option>';
     }
   
     exit;
   }

?>