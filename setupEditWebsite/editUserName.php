<?
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   $table = "Dealers";
   $table1 = "users"; 
   $gp = mysqli_real_escape_string($link, $_POST['gp']);
   $un = mysqli_real_escape_string($link, $_POST['un']);
   $username = mysqli_real_escape_string($link, $_POST['email']);
   $pass = mysqli_real_escape_string($link, $_POST['pass']);
   function isUniqueEmail($link, $table1, $email) {
		$query = "SELECT * FROM $table1 WHERE username='$email'";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) >=1) {
			echo "I'm sorry, that email address is already being used, please use another one.";
			return false;
		} else {
			return true;
		}
	}
	if(isUniqueEmail($link, $table1, $username))
	{
	   $query2 = "UPDATE $table SET
  				userName = '$username',
  				firstpass = '$pass',
  				userNameSet = '1'
  				WHERE loginid = '$gp';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link));
  	$salt = time(); 
  	$epass = $pass.$salt;
  	$query3 = "UPDATE $table1 SET
  				username = '$username',
  				password = '$epass'
  				WHERE username = '$un';";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link));  
  	if($result2 && $result3){
  	    $redirect = "Location:information.php?groupid=$un";
  	    header("$redirect");
  	}
    }
?>