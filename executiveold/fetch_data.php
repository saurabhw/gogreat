<?php
   
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     $query = "SELECT * FROM distributors WHERE role='SC' AND setupID='$vp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     while($row = mysqli_fetch_assoc($result))
     {
       echo '<option value="'.$row['loginid'].'">'.$row[FName].' '.$row[LName].' '.$row[loginid].'</option>';
     }
   
     exit;
   }

?>