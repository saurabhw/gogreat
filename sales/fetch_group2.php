<?php
   
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM Dealers WHERE isMainGroup = 1 AND setuppersonid ='$gp' ORDER BY Dealer desc";
     
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     if(mysqli_num_rows($result) < 1)
     {
        echo'<option>No Accounts Added</option>';
     }
     else
     {
          echo'<option value="">Select Group</option>';
          while($row = mysqli_fetch_assoc($result))
          { $a1 = mysqli_real_escape_string($link, $row['Address1']); 
            echo '<option value="'.$row[Dealer].','.$row[Zip].','.$a1.','.$row['loginid'].','.$row[setuppersonid].'">'.$row['Dealer'] .' '.$row['City'].' '.$row['State'].'</option>';
           }
      }
   
     exit;
   }
