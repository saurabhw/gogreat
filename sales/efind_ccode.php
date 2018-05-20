<?php
    ob_start();
    session_start(); 
    ob_end_clean();
    include '../includes/connection.inc.php';
    $link = connectTo();

    $usernameloggedin = $_SESSION['username'];
    $group = $_REQUEST['memid'];
    //$group = $_REQUEST['typef'];
    $getGroup = "SELECT * FROM Dealers WHERE loginid = '$group'";
    $getResult = mysqli_query($link, $getGroup)or die("MySQL ERROR: ".mysqli_error($link));
    $row = mysqli_fetch_assoc($getResult);
    $club = mysqli_real_escape_string($link, $row['DealerDir']);
    $orgType = mysqli_real_escape_string($link, $row['orgtype']);
    //$club = "Band";
    //$orgType = "High School";

    $logdropdown1 = $_REQUEST['logdropdown1'];
    

       
    $query = "SELECT * FROM Fundraiser_Messages WHERE orgtype = '$orgType' AND clubType = '$club'";
    $resultset1 = mysqli_query($link, $query)or die("MySQL ERROR: ".mysqli_error($link));
    if(mysqli_num_rows($resultset1) > 0)
    {
       while($row1 = mysqli_fetch_array($resultset1))
       {
        $A =  $row1['Ann_msg'];
        $Rm = $row1['Rem_msg'];
        $Fm = $row1['Fin_msg'];
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
                 $monthMessage = "Greetings,

GreatMoods is here to help you achieve success! As a free online fundraising organization, GreatMoods is dedicated to becoming a resource that ensures maximal success for you and for the organizations you set up! 

You have the opportunity to set up as many groups/organizations as you would like! GreatMoods makes it easy for you to setup and maintain your groups/organizations through technology! We do this by enabling organizations to effectively fundraise online!

We’re here to help you with anything you might need when it comes to starting and maintaining your fundraiser! GreatMoods will provide you with the necessary resources and information for your team’s success.

There is nothing you can’t do if you want it bad enough! GreatMoods is here to help you!


Sincerely,
The GreatMoods team
 ";
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
                echo  $monthMessage;
                break;
      }
 }
}//end if
else
{
    $queryC = "SELECT * FROM Fundraiser_Messages WHERE orgtype = 'Default' AND clubType = 'Default'";
    $resultsetC = mysqli_query($link, $queryC)or die("MySQL ERROR: ".mysqli_error($link));
    
    while($rowC = mysqli_fetch_array($resultsetC))
       {
        $A =  $rowC['Ann_msg'];
        $Rm = $rowC['Rem_msg'];
        $Fm = $rowC['Fin_msg'];
        $monthName = "";
        $monthNum = date("m");
     switch($monthNum)
       {
        case 12 :
                $monthName = "Dec";
                $monthMessage = $rowC['Dec'];
                break;
        case 11 :
                $monthName = "Nov";
                $monthMessage = $rowC['Nov'];
                break;
        case 10 :
                $monthName = "Oct";
                $monthMessage = $rowC['Oct'];
                break;
        case 9 :
                $monthName = "Sep";
                $monthMessage = $rowC['Sep'];
                break;
        case 8 :
                $monthName = "Aug";
                $monthMessage = $rowC['Aug'];
                break;
        case 7 :
                $monthName = "Jul";
                $monthMessage = $rowC['Jul'];
                break;
        case 6 :
                $monthName = "Jun";
                $monthMessage = $rowC['Jun'];
                break;
        case 5 :
                $monthName = "May";
                $monthMessage = $rowC['May'];
                break;
        case 4 :
                $monthName = "Apr";
                $monthMessage = $rowC['Apr'];
                break;
        case 3 :
                $monthName = "Mar";
                $monthMessage = $rowC['Mar'];
                break;
        case 2 :
                $monthName = "Feb";
                $monthMessage = $rowC['Feb'];
                break;
        case 1 :
                $monthName = "Jan";
                $monthMessage = $rowC['Jan'];
                break;
        default:
                 $monthMessage = "Greetings,

GreatMoods is here to help you achieve success! As a free online fundraising organization, GreatMoods is dedicated to becoming a resource that ensures maximal success for you and for the organizations you set up! 

You have the opportunity to set up as many groups/organizations as you would like! GreatMoods makes it easy for you to setup and maintain your groups/organizations through technology! We do this by enabling organizations to effectively fundraise online!

We’re here to help you with anything you might need when it comes to starting and maintaining your fundraiser! GreatMoods will provide you with the necessary resources and information for your team’s success.

There is nothing you can’t do if you want it bad enough! GreatMoods is here to help you!


Sincerely,
The GreatMoods team
 ";
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
                echo  $monthMessage;
                break;
      }
 }
}
?>