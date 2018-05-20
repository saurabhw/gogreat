<?php
session_start();
$q=$_GET["q"];
$loginuser = $_SESSION['userId'];
$con = mysqli_connect('localhost','amoodf5','AtG7L26B','amoodf5_gm2012');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"Dealers");
$sql = "SELECT * FROM distributors WHERE FName = '".$q."' AND setupID='$loginuser'";

$result = mysqli_query($con,$sql);

echo "<div class='distributor1'><table id='contacts'>
<tr>
							<th align='left'><b>Company<br>Name</b></th>
							<th align='left'><b>First<br>Name</b></th>
							<th align='left'><b>Last<br>Name</b></th>
							<th align='left'><b>Email<br>Address</b></th>
							<th align='left'><b>Phone<br>Number</b></th>
							
						</tr>";

                        while($row = mysqli_fetch_array($result))
                         {
                                  $log_id = $row['loginid'];
				  echo'<tr id="dhfix">
				  <td><input id="dhgroup" name="" type="text" value="'.$row['companyname'].'" readonly="readonly" ></td>
				  <td><input id="dhclub" name="" type="text" value="'.$row['FName'].'" readonly="readonly" ></td>
				  <td><input id="dhname" name="" type="text" value="'.$row['ContactName'].'" readonly="readonly" ></td>
				  <td><input id="dhemail" name="" type="text" value="'.$row['email'].'" readonly="readonly" ></td>
				  <td><input id="dhphone" name="" type="text" value="'.$row['homePhone'].'" readonly="readonly" ></td>
				  <td><a href=""><input id="dhbutton" type="button" value="Edit Account Details"/></a></td>
				  <td><a href="viewAccounts.php?rep='.$log_id.'"><input id="dhbutton" type="button" value="View Accounts"/></a></td>
				  <td><form method="post" action="deleteFundraiser.php">
					<input type="hidden" name="clubid" value="'.$site.'" />
					<input id="dhbutton" type="submit" name="submit2" value="X" title="Delete Account"/>
				  </form></td>
			          </tr>';		
									
  }
echo "</table></div>";

mysqli_close($con);
?>