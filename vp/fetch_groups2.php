<?php
   
    include '../includes/autoload.php';
       
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     //$query = "SELECT * FROM Dealers WHERE setuppersonid = '$gp'";
     $query = "SELECT DISTINCT Dealer, DealerDir, Zip FROM Dealers WHERE setuppersonid ='$gp' AND isMainGroup = 0 ORDER BY Dealer" asc;
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
   
     if(mysqli_num_rows($result) < 1)
     {
       echo '<option value="">No Fundraisers Added</option>';
     }
     else
     {
       echo '<option value="">Select Fundraiser Account</option>';
         while($row = mysqli_fetch_assoc($result))
         {
           echo '<option value="'.$row['Dealer'].','.$row['Zip'].'">'.$row['Dealer'].' '.$row['DealerDir'].'</option>';
         }
     }
     exit;
   }
