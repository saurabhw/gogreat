<?php
   
    session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
       
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   {
     //get reps
     $query = "SELECT * FROM Dealers WHERE setuppersonid = '$gp' AND isMainGroup = 1 ORDER BY Dealer ASC";
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
