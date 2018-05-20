<?php
ob_start();
    session_start(); 
    ob_end_clean();
    include '../includes/connection.inc.php';
    $link = connectTo();

    $usernameloggedin = $_SESSION['username'];
    $group = $_REQUEST['memid'];
    $getGroup = "SELECT * FROM Dealers WHERE loginid = '$group'";
    $getResult = mysqli_query($link, $getGroup)or die("MySQL ERROR: ".mysqli_error($link));
    $row = mysqli_fetch_assoc($getResult);
    $club = mysqli_real_escape_string($link, $row['DealerDir']);
    $orgType = mysqli_real_escape_string($link, $row['orgtype']);
    //$club = "Band";
    //$orgType = "High School";

    $logdropdown1 = $_REQUEST['logdropdown1'];

$link = connectTo();
       
       $query = "SELECT * FROM Fundraiser_Messages WHERE orgtype = '$orgType' AND clubType = '$club'";
       $resultset1 = mysqli_query($link, $query)or die("MySQL ERROR: ".mysqli_error($link));

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