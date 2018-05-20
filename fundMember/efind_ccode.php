<?php
    ob_start();
    session_start(); 
    ob_end_clean();
    include '../includes/connection.inc.php';
    $link = connectTo();

    $usernameloggedin = $_SESSION['username'];
    //$group = $_SESSION['groupid'];
    $group = 24673;
    $getGroup = "SELECT * FROM Dealers WHERE loginid = '$group'";
    $getResult = mysqli_query($link, $getGroup)or die("MySQL ERROR: ".mysqli_error($link));
    $row = mysqli_fetch_assoc($getResult);
    $club = mysqli_real_escape_string($link, $row['DealerDir']);
    $orgType = mysqli_real_escape_string($link, $row['orgtype']);
    //$club = "Band";
    //$orgType = "High School";



    $logdropdown1 = $_REQUEST['logdropdown1'];
    

       
    $query = "SELECT * FROM Fundraiser_Messages WHERE orgtype = '$orgType' AND clubType = '$club'";

       $resultset1 = mysqli_query($link, $query)or die("MySQL ERROR2: ".mysqli_error($link));
       while($row1 = mysqli_fetch_assoc($resultset1))
       {
        $A =  $row1['Ann_msg'];
        $Rm = $row1['Rem_msg'];
        $Fm = $row1['Fin_msg'];
        $monthMessage = "";
        
     $monthName = "";
     $monthNum = date("m");
     switch($monthNum)
       {
        case 12 :
                $monthName = "Dec";
                $monthMessage = $row1['Dec'];
                break;
        case 11 :
                $monthName = "Nov";
                $monthMessage = $row1['Nov'];
                break;
        case 10 :
                $monthName = "Oct";
                $monthMessage = $row1['Oct'];
                break;
        case 9 :
                $monthName = "Sep";
                $monthMessage = $row1['Sep'];
                break;
        case 8 :
                $monthName = "Aug";
                $monthMessage = $row1['Aug'];
                break;
        case 7 :
                $monthName = "Jul";
                $monthMessage = $row1['Jul'];
                break;
        case 6 :
                $monthName = "Jun";
                $monthMessage = $row1['Jun'];
                break;
        case 5 :
                $monthName = "May";
                $monthMessage = $row1['May'];
                break;
        case 4 :
                $monthName = "Apr";
                $monthMessage = $row1['Apr'];
                break;
        case 3 :
                $monthName = "Mar";
                $monthMessage = $row1['Mar'];
                break;
        case 2 :
                $monthName = "Feb";
                $monthMessage = $row1['Feb'];
                break;
        case 1 :
                $monthName = "Jan";
                $monthMessage = $row1['Jan'];
                break;
        default:
                 echo " ";
      }

        
        
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
        case "Monthly Message" :
                echo $monthMessage;
                break;
        default:
                 echo " ";
      }
}
?>