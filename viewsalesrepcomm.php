<?php
session_start(); 
ob_start();

ob_end_clean();

if ($_SERVER['SERVER_NAME'] == "lunds.info" || $_SERVER['SERVER_NAME'] == "chief" || 
stripos(dirname(__FILE__), "/gm/")) {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/gm");
  define("HTML_ROOT", "/gm");
} else {
  define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("HTML_ROOT", "");
}

include(SITE_ROOT.'/includes/login/user.functions.inc.php');

include(SITE_ROOT.'/includes/header.php');

include(SITE_ROOT.'/includes/leftmenu.php');


$$host="localhost"; // Host name 
$username="amoodf5"; // Mysql username 
$password="9rSTuT55"; // Mysql password 
$db_name="amoodf5_info"; // Database name 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

$query = "SELECT * FROM Dealers WHERE signuptype='regionalmanager'"; 

$result = mysql_query($query) or die(mysql_error());







function Chain_setupids($x, $times, $used)	{
	$usedid=$used;
	$indent='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	$query = "SELECT * FROM Dealers WHERE loginid='$x'"; 
	$result = mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);



	if($x!=null && $times=='0')	{
		
		
		echo '<B>Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['loginid'];
		echo '<br />';

		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['DealerDir'];
		echo '<br />';

		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['Dealer'];
		echo '<br />';

		echo '<B>State:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['State'];
		echo '<br />';

		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		if($row['signuptype']=='repfirmowner' || $row['signuptype']=='accountexecutivemanager')	{
			echo $row['Commission'];
							}
		else if($row['signuptype']=='fundraiser')	{	
			echo '35';
								}
		else if($row['signuptype']=='salesrep' || $row['signuptype']=='rep' || $row['signuptype']=='accountexecutive')	{
			$currentid=$row['setuppersonid'];
			$query2 = "SELECT * FROM Dealers WHERE loginid='$currentid'"; 
			$result2 = mysql_query($query2) or die(mysql_error());
			$row2=mysql_fetch_array($result2);	
			echo $row2['SalesrepCommission'];
								}
		else	{
			echo $row['Commission'];
			}
		
	

		
		echo '%';

		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form>';

		echo '<br /><br />';

		Chain_setupids($x,1,$usedid);

					}




	
		



	else if($x!=null)	{


		if($row['setuppersonid']!=null)	{
			if(in_array($row['setuppersonid'], $usedid))	{
			$y=0;
			while($times!=0 && $y<$times)	{
				echo $indent;
				$y++;
							}
			echo '<font color="red"><B>This user was already in the chain: '.$row['setuppersonid'].'</B></font>';
			echo '<br />';
									}
		else	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		$newsetupperson=$row['setuppersonid'];
		$query2 = "SELECT * FROM Dealers WHERE loginid='$newsetupperson'"; 
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2=mysql_fetch_array($result2);

		echo '<B><font color="green">Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['loginid'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['DealerDir'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['Dealer'];
		echo '<br />';
		
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		if($row2['signuptype']=='repfirmowner')	{
			echo $row2['Commission'];
							}
		else if($row2['signuptype']=='fundraiser')	{	
			echo '35';
								}
		else if($row2['signuptype']=='salesrep' || $row2['signuptype']=='rep' || $row2['signuptype']=='accountexecutive')	{
			$currentid=$row2['setuppersonid'];
			$query2 = "SELECT * FROM Dealers WHERE loginid='$currentid'"; 
			$result2 = mysql_query($query2) or die(mysql_error());
			$row2=mysql_fetch_array($result2);	
			echo $row2['SalesrepCommission'];
								}
		
		else	{
			echo $row2['Commission'];
			}

		
		echo '%';

	


		$y=0;
		$indentbutton=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$indentbutton=$indentbutton+72;
			$y++;
						}
		echo '<div><div style=margin-left:'.$indentbutton.'px;>';
		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row2['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form></div></div>';

		echo '<br /></font>';
		array_push($usedid, $row['setuppersonid']);
		Chain_setupids($row['setuppersonid'],$times+1,$usedid);
							}
		}
		


		
		
		if($row['setuppersonid2']!=null)	{
			if(in_array($row['setuppersonid2'], $usedid))	{
			$y=0;
			while($times!=0 && $y<$times)	{
				echo $indent;
				$y++;
							}
			echo '<font color="red"><B>This user was already in the chain: '.$row['setuppersonid2'].'</B></font>';
			echo '<br />';
									}
		else	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		$newsetupperson=$row['setuppersonid2'];
		$query2 = "SELECT * FROM Dealers WHERE loginid='$newsetupperson'"; 
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2=mysql_fetch_array($result2);

		echo '<B>Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['loginid'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['DealerDir'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['Dealer'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['commission2'];
		echo '%';
		

		$indentbutton=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$indentbutton=$indentbutton+72;
			$y++;
						}
		echo '<div><div style=margin-left:'.$indentbutton.'px;>';
		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row2['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form></div></div>';

		echo '<br />';
		array_push($usedid, $row['setuppersonid2']);
		Chain_setupids($row['setuppersonid2'],$times+1,$usedid);
							}
		}



		
		if($row['setuppersonid3']!=null)	{
		if(in_array($row['setuppersonid3'], $usedid))	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<font color="red"><B>This user was already in the chain: '.$row['setuppersonid3'].'</B></font>';
		echo '<br />';
							}
		else	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		$newsetupperson=$row['setuppersonid3'];
		$query2 = "SELECT * FROM Dealers WHERE loginid='$newsetupperson'"; 
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2=mysql_fetch_array($result2);

		echo '<B>Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['loginid'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['DealerDir'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['Dealer'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['commission3'];
		echo '%';


		$indentbutton=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$indentbutton=$indentbutton+72;
			$y++;
						}
		echo '<div><div style=margin-left:'.$indentbutton.'px;>';
		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row2['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form></div></div>';

		echo '<br />';
		array_push($usedid, $row['setuppersonid3']);
		Chain_setupids($row['setuppersonid3'],$times+1, $usedid);
							}
		}


		if($row['setuppersonid4']!=null)	{
		if(in_array($row['setuppersonid4'], $usedid))	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<font color="red"><B>This user was already in the chain: '.$row['setuppersonid4'].'</B></font>';
		echo '<br />';
							}
	else	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		$newsetupperson=$row['setuppersonid4'];
		$query2 = "SELECT * FROM Dealers WHERE loginid='$newsetupperson'"; 
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2=mysql_fetch_array($result2);

		echo '<B>Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['loginid'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['DealerDir'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['Dealer'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['commission4'];
		echo '%';


		$indentbutton=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$indentbutton=$indentbutton+72;
			$y++;
						}
		echo '<div><div style=margin-left:'.$indentbutton.'px;>';
		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row2['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form></div></div>';

		echo '<br />';
		array_push($usedid, $row['setuppersonid4']);
		Chain_setupids($row['setuppersonid4'],$times+1,$usedid);
							}
		}


		if($row['setuppersonid5']!=null)	{
		if(in_array($row['setuppersonid5'], $usedid))	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<font color="red"><B>This user was already in the chain: '.$row['setuppersonid5'].'</B></font>';
		echo '<br />';
							}
	else	{
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		$newsetupperson=$row['setuppersonid5'];
		$query2 = "SELECT * FROM Dealers WHERE loginid='$newsetupperson'"; 
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2=mysql_fetch_array($result2);

		echo '<B>Login ID:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['loginid'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Username:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['DealerDir'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Name:&nbsp;&nbsp;&nbsp;</B>';
		echo $row2['Dealer'];
		echo '<br />';
		$y=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$y++;
						}
		echo '<B>Commission:&nbsp;&nbsp;&nbsp;</B>';
		echo $row['commission5'];
		echo '%';


		$indentbutton=0;
		while($times!=0 && $y<$times)	{
			echo $indent;
			$indentbutton=$indentbutton+72;
			$y++;
						}
		echo '<div><div style=margin-left:'.$indentbutton.'px;>';
		echo '<form action="'. HTML_ROOT .'/'.'admin/setcommissions.php?id='.$dir.'" target=_blank method="post" enctype="multipart/form-data">
		<input type="hidden" name="usernametoset" value="' . $row2['DealerDir'] . '">
		<input type="submit" value="Edit">
		</form></div></div>';

		echo '<br />';
		array_push($usedid, $row['setuppersonid5']);
		Chain_setupids($row['setuppersonid5'],$times+1,$usedid);
							}
		}
		
				}
		if($times=='0' && $used==null)	{
			echo '<hr>';
				}
										
					}
		
echo '<div id="mainbox"> <span class="style3">Viewing All Commissions</span><br /><hr><br />';
	
	$usednames=array();
	$usersquery = "SELECT * FROM Dealers WHERE DealerDir='salesrep' ORDER BY Dealer"; 
$usersresult = mysql_query($usersquery) or die(mysql_error());
while ($usersrow=mysql_fetch_array($usersresult))	{
	Chain_setupids($usersrow['loginid'], 0, $usednames);
							}
							
echo '</div>';
include(SITE_ROOT.'/includes/footer.php'); ?>