<?php
   
    include '../includes/autoload.php';
       
    $id = $_SESSION['userId'];
  
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM Dealers WHERE setuppersonid='$gp' AND isMainGroup = 0 order by Dealer";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     if(mysqli_num_rows($result) < 1)
     {
        echo'<option>No Accounts Added</option>';
     }
     else
     {
          echo'<option value="">Select Group</option>';
          while($row = mysqli_fetch_assoc($result))
          {
            echo '<option value="'.$row['loginid'].'">'.$row['Dealer'].' '.$row['DealerDir'].' </option>';
           }
      }
   
     exit;
   }
