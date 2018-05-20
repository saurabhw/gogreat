<?
   session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
   error_reporting(E_ALL); // all errors
   require_once('../includes/functions.php');
   require_once('../includes/connection.inc.php');
   require_once('../includes/imageFunctions.inc.php');
   $link = connectTo();
   
   $table2 = "distributors";
   $table3 = "user_info";
   
   $query = "SELECT * FROM $table2";
   $result = mysqli_query($link, $query)or die ("couldn't execute query distributors.".mysqli_error($link));
   while($row = mysqli_fetch_assoc($result))
   {
       $em = $row['email'];
       $query1 = "SELECT * FROM $table3 WHERE email = '$em'";
       $result1 = mysqli_query($link, $query1)or die ("couldn't execute query user info.".mysqli_error($link));
       while($row1 = mysqli_fetch_assoc($result1))
       {
           $fn = $row1['FName'];
           $ln = $row1['LName'];
           $a1 = $row1['address1'];
           $a2 = $row1['address2'];
           $ct = $row1['city'];
           $st = $row1['state'];
           $zp = $row1['zip'];
           
           $query3 = "UPDATE distributors SET
                      FName = '$fn',
                      LName = '$ln',
                      address1 = '$a1',
                      address2 = '$a2',
                      city = '$ct',
                      state = '$st',
                      zip = '$zp'
                      WHERE email = '$em'";
           $result3 = mysqli_query($link, $query3)or die ("couldn't execute query update.".mysqli_error($link));
           if($result3)
           {
               echo $fn.' '.$ln." updated.";
           }
           
       }
   }
?>