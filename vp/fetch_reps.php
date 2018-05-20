<?php
   
    include '../includes/autoload.php';
       
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM distributors WHERE vpID = '$id' AND setupID = '$gp' AND role = 'RP'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
   
     if(mysqli_num_rows($result) < 1)
     {
       echo '<option value="">No Representatives Added</option>';
     }
     else
     {
       echo '<option value="">Select Representative</option>';
         while($row = mysqli_fetch_assoc($result))
         {
           echo '<option value="'.$row['loginid'].'">'.$row['FName'].' '.$row['LName'].'</option>';
         }
     }
     exit;
   }
?>