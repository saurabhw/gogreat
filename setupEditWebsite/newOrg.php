<?php
  session_start();

  if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include('../samplewebsites/imageFunctions.inc.php');
   include('../includes/connection.inc.php');
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='RP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   
   if(isset($_POST['submit']))
   { 
      $orgName = mysqli_real_escape_string($link, $_POST['orgName']);
      $ad1 = mysqli_real_escape_string($link, $_POST['a1']);
      $ad2 = mysqli_real_escape_string($link, $_POST['a2']);
      $city = mysqli_real_escape_string($link, $_POST['city']);
      $state = mysqli_real_escape_string($link, $_POST['state']);
      $zip = mysqli_real_escape_string($link, $_POST['zip']);
      $phone = mysqli_real_escape_string($link, $_POST['phone']);
      $ext = mysqli_real_escape_string($link, $_POST['ext']);
      $orgType = mysqli_real_escape_string($link, $_POST['fundtype']);
      $email = mysqli_real_escape_string($link, $_POST['email']);
      
      //insert organzation
      $sql = "INSERT INTO organizations(orgType, orgName, orgAddress, orgAddress2, orgCity, orgState, orgZip, orgPhone, ext, orgEmail, repID)VALUES('$orgType', '$orgName', '$ad1', '$ad2', '$city', '$state', '$zip', '$phone', '$ext', '$email', '$userID')";
      $result = mysqli_query($link, $sql)or die ("couldn't execute query.".mysql_error());
      if($result)
      {
        header('Location: editClub.php');
      }
   }

?>