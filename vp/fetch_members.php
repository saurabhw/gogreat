<?php
   
    include '../includes/autoload.php';
       
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM orgMembers WHERE fund_owner_id = '$gp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
   
     if(mysqli_num_rows($result) < 1)
     {
       echo '<option value="">No Members Added</option>';
     }
     else
     {
       echo '<option value="">Select Member</option>';
         while($row = mysqli_fetch_assoc($result))
         {
           echo '<option value="'.$row['fundraiserID'].'">'.$row['orgFName'].' '.$row['orgLName'].'</option>';
         }
     }
     exit;
   }
