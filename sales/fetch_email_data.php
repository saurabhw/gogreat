<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
    
    $member = $_POST['get_option'];        
   if(isset($_POST['get_option']))
   { 
     //get the sales coordinators
     $query = "SELECT * FROM orgCustomers WHERE fundMemberID='$member' ORDER BY last";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<option value="Everyone">Everyone</option>';
     while($row = mysqli_fetch_assoc($result))
     {
       echo '<option value="'.$row['email'].'">'.$row['first'].' '.$row['last'].'</option>';
     }
   
     exit;
   }

?>