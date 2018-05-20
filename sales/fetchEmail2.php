<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
   
    $group = $_POST['get_option2'];
    $what = $_POST['get_option'];
    
    switch ($what) {
    case "Everyone":
        $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$group' AND isLeader = 1 ORDER BY orgLName";
        break;
    case "All Leaders":
        $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$group' AND isLeader = 1 ORDER BY orgLName";
        break;
    case "All Members":
        $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$group' ORDER BY orgLName";
        break;
    case "All Contacts":
        code to be executed if n=label3;
        break;
    ...
    default:
        code to be executed if n is different from all labels;
    }        
   if(isset($_POST['get_option']))
   { 
     //get the sales coordinators
    // $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$group' ORDER BY orgLName";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
     echo'<br />';
     while($row = mysqli_fetch_assoc($result))
     {
       //echo '<option value="'.$row['email'].'">'.$row[first].' '.$row[last].' '.$row[loginid].'</option>';
       echo '<input type="checkbox" name="recipents[]" value="'.$row['orgEmail'].'" checked>'.$row['orgFName'].' '.$row['orgLName'].' '.$row['orgEmail'].' '.$row['orgPhone'].' <br>';
     }
     //echo '</fieldset>';
     exit;
   }

?>