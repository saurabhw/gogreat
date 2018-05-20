<?php
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
ob_end_clean();


//$usernameloggedin=$_SESSION['username'];


$logdropdown1=$_REQUEST['logdropdown1'];

$link = connectTo();
       
       $query = "SELECT * FROM Fundraiser_Messages WHERE orgtype='Elementary Band'";

       $resultset1 = mysqli_query($link, $query);
       while($row1 = mysqli_fetch_array($resultset1))
       {
        $A =  $row1['Ann_msg'];
        $Rm = $row1['Rem_msg'];
        $Fm = $row1['Fin_msg'];
switch($logdropdown1)
{
        case "Announcement" :
                echo "$A";
                break;
        case "Reminder" :
                echo "$Rm";
                break;
        case "FinalEmail" :
                echo "$Fm";
                break;
        case "Personalized" :
                echo "enter your personalized message";
                break;
        default:
                 echo " ";
}
}
?>