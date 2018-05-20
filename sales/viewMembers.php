<?php
    include '../includes/autoload.php';
    // if session variable not set, redirect to login page
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
   $groupID = $_GET['group'];
   $userID = $_SESSION['userId'];
   
   $table = "distributors";
   $myQuery = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error($link));
   $myRow = mysqli_fetch_assoc($myResult); 
   $myPic = $myRow['picPath'];
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Distributor Accounts | Sales Coordinator</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../images/favicon.ico">
	
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
xmlhttp.open("GET","getclub2.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<body id="type">
<div id="container">
      
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
      
    <div id="contentMain858">
	
	<div id="content">
	<h1>View Member Accounts</h1>
	<h3>Select An Account Below</h3>
	<br />
	<table>
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email Address</th>
	<th>YTD Sales</th>
	<th></th>
	</tr>
	<?php
	  
	  $query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$groupID'";
          $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysql_error());
          while ($row = mysqli_fetch_assoc($result))
                        {
                           echo '
                           <tr>
                           <td>'.$row['orgFName'].'</td>
                           <td>'.$row['orgLName'].'</td>
                           <td>'.$row['orgEmail'].'</td>
                           <td>'.$row['orgEmail'].'</td>
                          
                           </tr>
                           ';
                           /*
                            $fn = ;
                            $ln = $row['orgLName'];
                            $rep = $fn.'&nbsp;'.$ln;
                            echo "<option value='".$fn."'>$rep</option>";
                            */
                        }
	?>
	</table>
	
          	
			<?
			
			$query = "SELECT * FROM orgMembers WHERE fund_owner_id ='$groupID'";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysql_error()); 
		       
                       
				echo "<select name='users' style='width: 220px;' onchange='showUser(this.value)'><option>Select Account Name</option>";
			
						
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            $fn = $row['orgFName'];
                            $ln = $row['orgLName'];
                            $rep = $fn.'&nbsp;'.$ln;
                            echo "<option value='".$fn."'>$rep</option>";
                        }
						
                        echo "";
                        
			?>
		
		
		<br>
		<div id="txtHint"><b><b></div>
	
		
	</div>
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