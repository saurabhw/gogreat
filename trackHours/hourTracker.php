<?php
  session_start();
  ini_set('display_errors', '0'); // errors reporting on
  error_reporting(E_ALL); // all errors
  //$userID = $_SESSION['userId'];
  $userID = 11;
  $fn = $_SESSION['firstname'];
  $ln = $_SESSION['lastname'];
  $name = $fn.' '.$ln;
  require_once("connection.inc.php");
  $link = connectTo();
  /*
  //Real world user table password coulumn would be encrypted. Would need to create user insert file to salt password  
  //login file makes session valid
  */
  $msg = "";
  if(isset($_POST['submit']))
   {
	   $sun = mysqli_real_escape_string($link, $_POST['Sunday']);
	   $mon = mysqli_real_escape_string($link, $_POST['Monday']);
	   $tue = mysqli_real_escape_string($link, $_POST['Tuesday']);
	   $wed = mysqli_real_escape_string($link, $_POST['Wednesday']);
	   $thu = mysqli_real_escape_string($link, $_POST['Thursday']);
	   $fri = mysqli_real_escape_string($link, $_POST['Friday']);
	   $sat = mysqli_real_escape_string($link, $_POST['Saturday']);
	   
	   /*
	   //real world write logic that gets the date and pay period modify queries. compare to columns
	   //use prepared statements in real world
	   */
	   
	   $hoursQuery = "UPDATE workHours SET
	                                Monday = '$mon',
					Tuesday = '$tue',
					Wednesday = '$wed',
					Thursday = '$thu',
					Friday = '$fri',
					Saturday = '$sat',
					Sunday = '$sun'
					WHERE userID = '$userID'";
	   $hoursUpdate = mysqli_query($link, $hoursQuery)or die("Cant Update Your Data: ".mysqli_error($link));
	   
	   if($hoursUpdate)
	   {
		   $msg .= "Hours Updated";
		   //echo $msg;
	   }
   }
  $getHours = "SELECT * FROM workHours WHERE userID = '$userID'";
  $hoursResult = mysqli_query($link, $getHours)or die("Cant Access Your Data: ".mysqli_error($link));
  $myHours = mysqli_fetch_assoc($hoursResult);
  
?>
<html>
	<head>
		<title>Company Time Tracking Software</title>
		<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	        <script src="js/jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	        <script src="js/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	        <script src="js/jquery-ui-1.10.3/ui/jquery.multiselect.js"></script>
	        <link href="js/jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	         <link href="js/jquery-ui-1.10.3/ui/jquery.multiselect.css" media="screen" rel="stylesheet" type="text/css">
	         <link href="css/style.css" rel="stylesheet" type="text/css">
                <script>
                  $( function() {
                  
                   } );
                   $(window).load(function() {
                   $('body').css('background', '#4d0000');
                   $("#content").css('background', 'white');
                   $("#content").css('width', '660px');
                   $("#content").css('height', '400px');
                   });
                </script>
		<!--<script>
		 function isNumeric(val)
		 {
                   var numeric = true;
                   var chars = "0123456789.-,+";
                   var len = val.length;
                   var char = "";
                   for (i=0; i<len; i++) { char = val.charAt(i); if (chars.indexOf(char)==-1) { numeric = false; } }
                   return numeric;
                 }
		function validate(e)
		{
			var sun = document.GetElementById("Sunday").value;
			var mon = document.GetElementById("Monday").value;
			var tue = document.GetElementById("Tuesday").value;
			var wed = document.GetElementById("Wednesday").value;
			var thu = document.GetElementById("Thursday").value;
			var fri = document.GetElementById("Friday").value;
			var sat = document.GetElementById("Saturday").value;
			if(tue !== "" && isNumeric("tue"))
		    {
			 if(tue > 10)
			 {
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			 }
			}
			if(wed > 10)
			{
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
			if(thu > 10)
			{
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
			if(fri > 10)
			{
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
			if(sat > 10)
			{
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
			else
			{
				document.GetElementById("Monday").value = "";
			}
			if(sun > 10)
			{ 
		        e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
            else
			{
				document.GetElementById("Monday").value = "";
			}			
			if(mon > 10)
			{
				e.preventDefault();
				document.GetElementById("error").innerHTML = "Hours worked cannot be greater that 10.";
				return false;
			}
			return true;
		}
		</script>-->
	</head>
	<body>
	<div id="container">
	<div id="banner">
	<div id="content">
	<div id="center">
	<h2>Acme Inc. Employees</h2>
	<? 
	  if(!$_SESSION['authenticated'])
	  {
		  echo'<h2>Log into your account.</h2><br/>
		  <form action="../logInUser.php" method"post">
		  Username: <input type="text" name="username"><br>
		  Password: <input type="password" name="password">
		  <input type="submit" name="submit1" value="login">
		  <br/>
		  </form>';
	  }
	  else
	  {
              echo "Welcome back ".$name."!";
	      echo '<br>Please enter hors worked for this pay period:<br>
		  
             <form action="hourTracker.php" method="post" onsubmit="return validate();">
              <table>
              <tr>
	      <td>Sunday: </td><td><input type="text" name="Sunday" value="'.$myHours['Sunday'].'"></td>
	      </tr>
	      <tr>
	      <td>Monday: </td><td> <input type="text" name="Monday" value="'.$myHours['Monday'].'"></td>
	      </tr>
	      <td>Tuesday: </td><td><input type="text" name="Tuesday" value="'.$myHours['Tuesday'].'"></td>
	      </tr>
	      <tr>
	      <td>Wednesday: </td><td><input type="text" name="Wednesday" value="'.$myHours['Wednesday'].'"></td>
	      </tr>
	      <tr>
	      <td>Thursday: </td><td><input type="text" name="Thursday" value="'.$myHours['Thursday'].'"></td>
	      </tr>
	      <tr>
	      <td>Friday: </td><td><input type="text" name="Friday" value="'.$myHours['Friday'].'"></td>
	      </tr>
	      <tr>
	      <td>Saturday: </td><td><input type="text" name="Saturday" value="'.$myHours['Saturday'].'"></td>
	      </tr>
	      </table>
	      <input type="submit" name="submit" value="Save Hours">
		  <span id="error"></span>
             </form>
	      ';
	      echo $msg;
	  }
	 ?> 
	 </center><!--end center-->
	 </div><!--end content-->
	  </div><!--end container-->
</body>
</html>