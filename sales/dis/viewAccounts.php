<?php
session_start();
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
// if session variable not set, redirect to login page
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
ob_start();
$rep = $_GET['rep'];
$userID = $_SESSION['userId'];
include'connection.inc.php';
$link = connectTo();
$table = "Dealers";
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Distributor Accounts | Sales Coordinator</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico">
	
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getclub.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<body id="type">
<div id="container">
      
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
      
    <div id="contentMain858">
	<h1>View Accounts</h1>
	<h3>Select An Account Below</h3>
	
	<div>
          	<form><select name='users' style='width: 220px;' onchange='showUser(this.value)'><option>Select Account Name</option>
			<?
			$query = "SELECT DISTINCT Dealer FROM $table WHERE setuppersonid ='$rep'";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysql_error()); 
		    			
                        while ($row = mysqli_fetch_assoc($result)){
                            $dealer = $row['Dealer'];
                            echo "<option value='".$dealer."'>$row[Dealer]</option>";
                        }
						
                        echo "</select>";
			?>
			</select><br>
		</form>
		
		<br>
		<div id="txtHint"><b>Account Groups will display here.<b></div>
	</div>
		
	<p>&nbsp;</p>
	</div> <!--end contentMain858-->
  
<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>