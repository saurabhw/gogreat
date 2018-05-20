<?php
   session_start();
     if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
       
   include '../includes/connection.inc.php';
   include '../includes/functions.php';
   include('../samplewebsites/imageFunctions.inc.php');
   if(isset($_POST['submit1']))
   {
      $_SESSION['role'] = "Member";
      $_SESSION['home'] = "fundMember/memberLogin.php";
   }
   $link = connectTo();
   $table = "Dealers";
   $user = $_SESSION['email']; 
   $userID = $_SESSION['userId'];
   
   $queryT = "SELECT * FROM user_info WHERE userInfoId='$userID'";
    $query1 = "SELECT * FROM Dealers WHERE loginid = '$ct'";
   $resultT = mysqli_query($link, $queryT)or die ("couldn't execute query on query 1.".mysqli_error($link));
   $rowT = mysqli_fetch_assoc($resultT);
   $userName = $_SESSION['email'];
   $user = $_SESSION['email']; 
   $userID = $_SESSION['userId'];
   $myPic = $rowT['picPath'];
   
           //get member data
	$first_name = $rowT['FName'];
	$last_name = $rowT['LName'];
	$tel = $rowT['homePhone'];
	$gender = $row1['gender'];
	$ttl = $rowT['title'];

?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Member Login | GreatMoods</title>
<style>

#loginMemberText{
    width:70%;
}
@media(max-width:1200px){
    #loginMemberText{
        width: 95%;
    }
}
</style>
</head>

<body>
<?php include 'header(1).php'; ?>

    <div class="row-fluid">    <!-- START PROFILE block ROW -->
            <div class="profile-block col-md-3 col-lg-2"><!--START profile -->
        
                <div class="panel text-center">
                    <div class="user-heading">  <!--START profile block user heading -->                        
                    
                        <!-- hidden icons shows on xs sm viewports | social btns show on small only to avoid clutter -->
                        <a href="#" class="pull-right hidden-md hidden-lg" id="accountIconSidebarHeader" role="button" data-toggle="modal" data-target="#loggedin-modal"><i data-toggle="tooltip" data-placement="left" title="Account" class="hidden-lg fa fa-user-circle fa-3x" aria-hidden="true"></i></a>
                        
                        <img src="../<?php echo $myPic;?>" class="img-rounded img-responsive center-block profileimgcrop" alt="Profile Pic"/>
                      	<h1 id="sidebarTitleNoMoney">Welcome <? 
                      	   if(!isset($_SESSION['authenticated']))
                                {
                                   echo $fn; 
                                }
                              else
                              {
                                   echo $_SESSION['firstName']; 
                              }
                      
                      	 ?>!</h1>
                    </div> <!--END profile block user HEADING -->
    
                    <div id="myAccounts-sideNav" class="sidenavList nav nav-pills nav-stacked"> <!-- START MY ACCOUNTS -->
    
                        <li><h4><b>My Accounts</b></h4></li>
                    
                        <ul id="sidenavSectionAccounts" class="nav nav-pills nav-stacked">
                            <div class="accountsBtn center-block">
                                    <?
                                    echo ''.getAccounts1($userID);
                                    ?>
                            </div><!-- end accountBtn div | red btns listed in profile block -->
                        </ul><!-- end account unordered list -->
                    </div> <!-- END sidenav list block -->
                
                    <!-- START program overview list block | 1st Collapsible -->
                   <!-- <div class="sidenavList nav nav-pills nav-stacked">
                    
                        <li class="sidenavTitle" data-target="#sidenavSection2" data-toggle="collapse">
                            <h4><a href="#/">Getting Started <span class="fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>
                        </li>
        
                        <ul id="sidenavSection2" class="nav nav-pills nav-stacked collapse in">
                            <li><a href="fundgettingstarted11.php"><i class="fa fa-desktop navicon"></i> GreatMoods Program Overview</a></li>
                            <li><a href="fundgettingstarted14.php?group=<?php echo $_SESSION['groupid']; ?>"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li>
                            <li><a href="fundgettingstarted1.php?group=<?php echo $_SESSION['groupid']; ?>"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
                            <li><a href="salesContact.php?group=<?php echo $_SESSION['groupid']; ?>"><i class="fa fa-check navicon"></i>Contact Your Rep!</a></li>
                        </ul>--><!-- end sidenav section2 list -->
                    <!--</div>--> <!-- END gettingstarted links list block -->
                
                
                
                  	<!-- START Program Overview- list block | 2nd Collapsible -->
                    <!--<div class="sidenavList nav nav-pills nav-stacked">-->
                    <!--    <li class="sidenavTitle" data-target="#sidenavSection3" data-toggle="collapse">-->
                    <!--        <h4><a href="#/">Program Overview <span class="fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>-->
                    <!--    </li-->
                    <!--    <ul id="sidenavSection3" class="nav nav-pills nav-stacked collapse in">-->
                    <!--        <li><a href="gm_mission.php" title=""><i class="fa fa-heart navicon"></i> Mission</a></li>-->
                    <!--        <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> -->
                    <!--        <li><a href="gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li>-->
                    <!--    </ul><!-- end sidenav section2 list -->
                    <!--</div>-->
                    
                </div> <!--END panel  -->
            </div><!--END PROFILE block -->
    </div><!--END PROFILE block ROW -->
    
    <div class="container" id="fundmemberLogin" ><!-- loginpage main content container -->
        <div class="row-fluid row-flex">
    
            <div class="page-header">
            	<h1>Welcome to Your Fundraising Account!</h1>
            </div>
    
    
    
                    <!-- ********** Contact List, Account Info,  should be the same for all groups -->
                     <!-- groups below are just examples -->
                    <p>STEP 1: UNDER MY ACCOUNTS ON THE LEFT-HAND SIDE, JUST CLICK ON THE RED  
                    BUTTON THAT STATES YOUR FUNDRAISING ACCOUNT TO GET STARTED.</p>
                    <p>
                    THEN YOU CAN GET STARTED PERSONALIZING YOUR FUNDRAISING WEBSITE AND  
                    SET UP YOUR FRIENDS AND FAMILY SUPPORTERS TO START YOUR FUNDRAISING.
                    </p><p>
                    REMEMBER, JUST CLICK YOUR RED BUTTON ON THE LEFT SIDE TO GET STARTED!
                    </p><p>
                    THANK YOU,
                    
                    GREATMOODS TEAM.
                    </p>
        </div><!--end row-->
    </div>    
    
        
        
    <!-- Allow for password change within modal. No need to have seperate page for that.. If I'm missing some PHP functions in header someone please let me know. Success and error messages show up fine.   -------- Messages show up, but they don't do anything, and are shown on all submit button clicks.. PHP is annoyyyinng
        </?php
        if(isset($_POST['submit']))
        {
            $password1 = mysqli_real_escape_string($link, $_POST['password']);
            $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
            if($cpassword != $password1)
            {
                    $alertmsg .= "Passwords do not match";
                    echo '<div class="container"><div id="message" class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="alert" aria-hidden="true">&times;</span></button><div><strong>'.$alertmsg.'!</strong></div></div>';
            }
            
            else
            {
                $salt = time();
                $password = sha1($password1.$salt);
                $update = "UPDATE users SET password = '$password', salt = '$salt' WHERE username = '$current'";
                $result = mysqli_query($link, $update) or die("MYSQL ERROR query update: ".mysqli_error($link));
                
                $update2 = "UPDATE Dealers SET firstPass = '$password' WHERE userName = '$current'";
                $result2 = mysqli_query($link, $update2) or die("MYSQL ERROR query update 2: ".mysqli_error($link));
                
                if($result && $result2)
                {
                    $successmsg .= "Your password Has Been Reset";
                    echo '<div class="container"><div  id="message" class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="alert" aria-hidden="true">&times;</span></button><div><strong>'.$successmsg.'</strong></div></div>';
                    
                    $to = $current;
                    $subject = "Password reset on Greatmoods.com";
                    $headers = 'From: no-reply@greatmoods.com';
                    $message = "Your password has been reset.";
                    $message .="\nYour new password is $password1";
                    //$message .="\nWe highly suggest you log in soon and change it to something you will remember.";
                    mail($to, $subject, $message, $headers);
                }
            }
        }//end post submit
        ?/>-->    

<?php include 'footer(1).php'; ?>
</body>
</html>