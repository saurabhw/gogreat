<?php
   
   include '../includes/autoload.php';
       
    $id = $_SESSION['userId'];
    $link = connectTo();
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM Dealers WHERE loginid = '$gp' AND setuppersonid='$id' LIMIT 1";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     if(mysqli_num_rows($result) < 0)
     while($row = mysqli_fetch_assoc($result))
     {
       echo '<option value="'.$row['loginid'].'">'.$row['Dealer'].' '.$row['DealerDir'].'</option>';
     }
   
     exit;
   }
