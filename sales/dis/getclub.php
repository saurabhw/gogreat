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
$sql = "SELECT * FROM Dealers WHERE Dealer = '".$q."'";

$result = mysqli_query($con,$sql);

echo "<div class='distributor1'><table id='contacts'>
<tr>
							<!--<th align='left'><b>Group<br>Name</b></th>-->
							<th align='left'><b>Group<br>Type</b></th>
							<th align='left'><b>Contact<br>Name</b></th>
							<!--<th align='left'><b>First<br>Name</b></th>
							<th align='left'><b>Last<br>Name</b></th>-->
							<th align='left'><b>Email<br>Address</b></th>
							<th align='left'><b>Phone<br>Number</b></th>
							<!--<th align='left'><b>YTD Earnings</b></th>-->
						</tr>";

while($row = mysqli_fetch_array($result))
  {
  $site = $row['loginid'];
							$credSet = $row['userNameSet'];
							$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
		                                        $resultz = mysqli_query($con, $queryz)or die ("couldn't execute query contacts query.".mysql_error());
							echo'<tr id="dhfix">
								<!--<td><input id="dhgroup" name="" type="text" value="'.$row['Dealer'].'" readonly="readonly" ></td>-->
								<td><input id="dhclub" name="" type="text" value="'.$row['DealerDir'].'" readonly="readonly" ></td>
								<td><input id="dhname" name="" type="text" value="'.$row['ContactName'].'" readonly="readonly" ></td>
								<!--<td><input id="dhname" name="" type="text" value="" readonly="readonly" ></td>
								<td><input id="dhname" name="" type="text" value="" readonly="readonly" ></td>-->
								<td><input id="dhemail" name="" type="text" value="'.$row['email'].'" readonly="readonly" ></td>
								<td><input id="dhphone" name="" type="text" value="'.$row['Phone'].'" readonly="readonly" ></td>
								<!-- <td><input id="dhytd" name="" type="text" value="" readonly="readonly" ></td>-->
								<td><a href="information.php?groupid='.$site.'"><input id="dhbutton" type="button" value="Edit Acct" title="Edit Account Details"/></a></td>
								<td><a href="contacts.php?groupid='.$site.'"><input id="dhbutton" type="button" value="Contacts/Emails" title="View and Edit Contacts or Send Emails"/></a></td>
								<td><a href="../../fundSite_z.php?group='.$site.'"><input id="dhbutton" type="button" name="submit" value="View Site" title="View Fundraiser Website"/></a></td>';
								//if(mysqli_num_rows($resultz) > 0)
								if($credSet == 1)
								{
								      
									echo'<td><form method="post" action="custEmail.php">
										<input type="hidden" name="to" value="'.$row['email'].'" /> 
										<input type="hidden" name="from" value="'.$user_email.'" />
										<input type="hidden" name="clubidemail" value="'.$row['loginid'].'" />
										<input id="dhbutton" type="submit" name="submit1" value="Send Email" title="Send New Account Email"/>
										</form>
									</td>';
								}
								else{
									echo'<td></td>';
								}    
								echo'
								<td>
								<a href="user.php?groupid='.$site.'"><input id="dhbutton" type="submit" name="submit2" value="Edit Login" title="Edit Username and Password"/></a>
								</td>
								
								<td><form method="post" action="deleteFundraiser.php">
									<input type="hidden" name="clubid" value="'.$site.'" />
									<input id="dhbutton" type="submit" name="submit2" value="X" title="Delete Account"/>
									</form>
								</td>
								
								';
								echo'</tr>';		
									$x++;
  }
echo "</table></div>";

mysqli_close($con);
?>