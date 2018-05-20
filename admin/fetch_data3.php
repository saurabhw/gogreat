<?php
   
    include "connectTo.php";
    $id = $_SESSION['userId'];
    $link = connectTo();
    $vp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get  the fundraiser groups
     $query = "SELECT * FROM Dealers WHERE  setuppersonid='$vp' ORDER BY Dealer";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     while($row = mysqli_fetch_assoc($result))
     {
       echo '<option value="'.$row['loginid'].'">'.$row[Dealer].' '.$row[DealerDir].' '.$row[loginid].'</option>';
     }
   
     exit;
   }

?>