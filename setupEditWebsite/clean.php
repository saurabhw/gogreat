<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>

if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
      $check = checkChainRep($userID,$group);
      if(!is_numeric($group) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }	 