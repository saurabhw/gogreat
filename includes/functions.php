<?php
/*function connectTo() {
	$host = "localhost";
	$db_name = "amoodf5_gm2012";
	$username = "amoodf5";
	$password = "AtG7L26B";
	$link = mysqli_connect("$host", "$username", "$password", "$db_name");
	return $link;
}

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}
*/
 function sanitize($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);
        //$var = preg_replace("/[^a-zA-Z]/", "", $var);
        return $var;
    }

function mysqli_prep($string) { // ESCAPE ALL STRINGS
	global $link;
	$escaped_string = mysqli_real_escape_string($link, $string);	
	return $escaped_string;
}
function confirm_query($result_set) {
	global $link;
	if (!$result_set) {
		die("Database query failed: " . mysqli_error($link) . "...");
	}
}

// START REP EMAIL SECTION FOR ALL FUNDRAISERS, CONTACTS, MEMBERS, AND CUSTOMERS

// GET THE REP'S ID
function repID() {
	global $link;
	global $repEmail;
	$query = "SELECT * FROM user_info WHERE email = '$repEmail'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	$row = mysqli_fetch_assoc($result);
	$repID = $row["userInfoID"]; // rep's ID
	return $repID;
}

// USE THE REP'S ID TO GET THE REP'S GROUPS: SCHOOL NAME, GROUP TYPE, AND GROUP LOGINID
function repGroups() {
	global $link;
	global $repID;
	$query = "SELECT * FROM Dealers WHERE setuppersonid = '$repID'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	return $result;
}
function getRepTotal($rep) {
       

        global $link;
        $repTotal = '';
        $sql = "SELECT * FROM Dealers  WHERE setuppersonid = '$rep'";
	$sqlResult = mysqli_query($link, $sql)or die ("couldn't execute query sales.".mysqli_error($link));
	while($row = mysqli_fetch_assoc($sqlResult))
	{
	   $group = $row['loginid'];
	
	   $groupTotal = getGroupSales($group);
	   $repTotal = $repTotal + $groupTotal;
	
	
       }
        $repTotal = $repTotal * .35;
	$repTotal = round($repTotal, 2);
	return $repTotal;
}
function getGroupSales($group) {
       

        global $link;
	$query = "SELECT SUM(Amount) as total FROM IPNdata  WHERE groupID = '$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query sales.".mysqli_error($link));
	$row = mysqli_fetch_assoc($result);
	$total = $row['total'];
	
	$getMembers = "SELECT * FROM orgMembers WHERE fund_owner_id = '$group'";
	$memberResult = mysqli_query($link, $getMembers) or die ("couldn't execute query members.".mysqli_error($link));

	while($row2 = mysqli_fetch_assoc($memberResult))
	{
	   $memberID = $row2['fundraiserID'];
	   $membersSales = "SELECT SUM(Amount) as mt FROM IPNdata  WHERE groupID = '$memberID'";
	   $memberSalesResult = mysqli_query($link, $membersSales) 
	   or die ("couldn't execute query members.".mysqli_error($link));
	   
	  $salesRow = mysqli_fetch_assoc($memberSalesResult);
	   
	      $memberTotal = $salesRow['mt'];
	      $total = $total + $memberTotal;
	   
	   
	}
	$total = $total * .35;
	$total = round($total, 2);
	return $total;
}
function getMemberSales($group) {
       

        global $link;
	
	$total = '';
	
	$getMembers = "SELECT * FROM orgMembers WHERE fund_owner_id = '$group'";
	$memberResult = mysqli_query($link, $getMembers) or die ("couldn't execute query members.".mysqli_error($link));

	while($row2 = mysqli_fetch_assoc($memberResult))
	{
	   $memberID = $row2['fundraiserID'];
	   $membersSales = "SELECT SUM(Amount) as mt FROM IPNdata  WHERE groupID = '$memberID'";
	   $memberSalesResult = mysqli_query($link, $membersSales) 
	   or die ("couldn't execute query members.".mysqli_error($link));
	   
	  $salesRow = mysqli_fetch_assoc($memberSalesResult);
	   
	      $memberTotal = $salesRow['mt'];
	      $total = $total + $memberTotal;
	   
	   
	}
	$total = $total * .35;
	$total = round($total, 2);
	return $total;
}

function getSoloSales($group) {
       

        global $link;
	
	$total1 = 0.00;
	
	$getMembers = "SELECT SUM(Amount) as total FROM IPNdata WHERE groupID = '$group'";
	$memberResult = mysqli_query($link, $getMembers) or die ("couldn't execute query members.".mysqli_error($link));
        $row2 = mysqli_fetch_assoc($memberResult);
        $total = $row2['total'];
        if($total == '')
        {
           $total = 0.00;
        }
        $total1 = $total1 + $total;
        $total1 = $total1 * .35;
        $total1 = round($total1, 2);
	return $total1;
}

function groupInfo() {
	global $link;
	global $repGroups;
	
	// START IF REPGROUPS
	if ($repGroups) {
		while ($row = mysqli_fetch_assoc($repGroups)) {
			$groupid = $row["loginid"]; // GROUP ID used to get contacts, members, and customers
			
			// GET CONTACTS USING THE GROUP ID
			$query_contacts = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupid' ORDER BY orgFName ASC";
			$result_contacts = mysqli_query($link, $query_contacts);
			confirm_query($result_contacts);
			
			if ($result_contacts) {
				while ($row_contacts = mysqli_fetch_assoc($result_contacts)) {
					$contacts_ID	= htmlspecialchars($row_contacts["orgContactID"]);
					$contacts_Group = htmlspecialchars($row_contacts["fundraiserID"]);
					$contacts_FName = htmlspecialchars($row_contacts["orgFName"]);
					$contacts_LName = htmlspecialchars($row_contacts["orgLName"]);
					$contacts_Title = htmlspecialchars($row_contacts["Title"]);
					$contacts_Email = htmlspecialchars($row_contacts["orgEmail"]);
					$contacts_Phone = htmlspecialchars($row_contacts["orgPhone"]);
					
					// START SECTION FOR REPS TO UPDATE THEIR FUNDRAISING CONTACTS
					$output = '';
					$output = $output . '
					<form action="contacts_update.php" method="post" enctype="multipart/form-data" onsubmit="update_contactLoading();">
						<input type="hidden" name="update_contact" value="' . $contacts_ID . '" />
						<input type="hidden" name="group_info" value="' . $contacts_Group . '" />
					<tr>
						<td><input type="text" name="update_first" value="' . $contacts_FName . '" /></td>
						<td><input type="text" name="update_last" value="' . $contacts_LName . '" /></td>
						<td><input type="text" name="update_title" value="' . $contacts_Title . '" /></td>
						<td><input type="text" name="update_email" value="' . $contacts_Email . '" /></td>
						<td><input type="text" name="update_phone" value="' . $contacts_Phone . '" /></td>
						<td><input type="submit" name="submit_update" value="Update" class="edit_contact" /></td>
						</form>';
					// END SECTION FOR REPS TO UPDATE THEIR FUNDRAISING CONTACTS
					
					// START SECTION FOR REPS TO DELETE THEIR FUNDRAISING CONTACTS
					$output = $output . '
						<form action="contacts_delete.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="group_info" value="' . $contacts_Group . '" />
						<input type="hidden" name="delete_contact" value="' . $contacts_ID . '" />
						<td><input type="submit" name="delete" value="Delete" class="edit_contact" /></td>
						</form>
					</tr>';
					// END SECTION FOR REPS TO DELETE THEIR FUNDRAISING CONTACTS
					
					echo $output;
				}
			}
			
			// START GETTING MEMBERS USING THE GROUP ID
			$query_members = "SELECT * FROM orgMembers WHERE fund_owner_id = '$groupid'";
			$result_members = mysqli_query($link, $query_members);
			confirm_query($result_members);
			
			if ($result_members) {
				while ($row_members = mysqli_fetch_assoc($result_members)) {
					$members_FName = $row_members["orgFName"];
					$members_LName = $row_members["orgLName"];
					$members_Title = $row_members["Title"];
					$members_Email = $row_members["orgEmail"];
					$members_Phone = $row_members["orgPhone"];
					
					$output_members = '';
					$output_members = $output_members . $members_FName . '<br>';
					echo $output_members;
				}
			}
			
			// START GETTING CUSTOMERS USING THE GROUP ID
			$query_cust = "SELECT * FROM orgCustomers WHERE fundGroupID = '$groupid'";
			$result_cust = mysqli_query($link, $query_cust);
			confirm_query($result_cust);
			
			if ($result_cust) {
				while ($row_cust = mysqli_fetch_assoc($result_cust)) {
					$customers_FName = $row_cust["first"];
					$customers_LName = $row_cust["last"];
					$customers_Rel	 = $row_cust["relationship"];
					$customers_Email = $row_cust["email"];
					$customers_Phone = $row_cust["workPhone"];
					
					$output_cust = '';
					$output_cust = $output_cust . $customers_FName . '<br>';
					echo $output_cust;
				}
			}
		}
	}
	}
	// END IF REPGROUPS
    function getAccounts1($uid){
       //get all acounts for logged in user	
       global $link;
       $query = "SELECT * FROM user_info WHERE userInfoID='$uid'";
       $resultx = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $rowx = mysqli_fetch_assoc($resultx);
       $pic = $rowx['picPath'];
       $userEmail = $rowx['email'];
       
       //check if user is leader
       $getLeader = "SELECT * FROM orgMembers WHERE orgEmail = '$userEmail' AND isLeader = 1";
       $result1 = mysqli_query($link, $getLeader)or die ("Could not execute leader query.".mysqli_error($link));
       
       //check if user has member account
       $getMember = "SELECT * FROM Dealers WHERE userName = '$userEmail'";
       $result2 = mysqli_query($link, $getMember)or die ("couldn't execute get member query.".mysqli_error($link));
       
       //check if user has RP account
       $getRep = "SELECT * FROM distributors WHERE email = '$userEmail' AND role = 'RP'";
       $result3 = mysqli_query($link, $getRep)or die ("couldn't execute get rp query.".mysqli_error($link));
       
       //check if user has SC account
       $getDis = "SELECT * FROM distributors WHERE email = '$userEmail' AND role = 'SC'";
       $result4 = mysqli_query($link, $getDis)or die ("couldn't execute get sc query.".mysqli_error($link));
       
        //check if user has VP account
       $getVP = "SELECT * FROM distributors WHERE email = '$userEmail' AND role = 'VP'";
       $result5 = mysqli_query($link, $getVP)or die ("couldn't execute get vp query.".mysqli_error($link));
       
       if(mysqli_num_rows($result5) > 0)
       {
         $vpRow = mysqli_fetch_assoc($result5);
         
         //echo 'user has member account'; 
         echo '<form action="../vp/accounts.php" method="Post"><input type="submit" class="redbutton2" value="VP Login" name="submit1"></form><br>';
         
       }
       else
       {
          //echo 'No member account.<br>';
       }
       
        if(mysqli_num_rows($result4) > 0)
       {
         //echo 'user has SC account'; 
         echo '<form action="../sales/viewReps.php" method="Post"><input type="submit" class="redbutton2" value="Coordinator Login" name="submit1"></form><br>';
         
       }
       else
       {
          //echo 'No SC account.<br>';
       }

       if(mysqli_num_rows($result3) > 0)
       {
         //echo 'user has SC account'; 
         echo '<form action="../setupEditWebsite/editClub.php" method="Post"><input type="submit" class="redbutton2" value="Rep Login" name="submit1"></form><br>';
         
       }
       else
       {
          //echo 'No SC account.<br>';
       }
        if(mysqli_num_rows($result1) > 0)
       { /*
          while($row = mysqli_fetch_assoc($result1))
          {
            $gid = $row['fund_owner_id'];
            $getGroup = "SELECT * FROM Dealers WHERE loginid = '$gid'";
            $groupResult = mysqli_query($link, $getGroup)or die("Could not execute group query.".mysqli_error($link));
            $groupRow = mysqli_fetch_assoc($groupResult);
            $groupName = $groupRow['Dealer'];
            $club = $groupRow['DealerDir'];
            echo'<form action="../editFundraiser/coordhome.php" method="post">
            <input type="hidden" name="clubid" value="'.$row[fund_owner_id].'">
            <input type="submit" name="submit1" class="redbutton2" value="'.$groupName.' '.$club.' Leader">
            </form>';
          }
          */
       }
       if(mysqli_num_rows($result2) > 0)
       {
         while($rowM = mysqli_fetch_assoc($result2))
         {
           //member account
           echo '<form action="../fundMember/memberHome.php" method="Post">
           <input type="hidden" name="acctid" value="'.$rowM['loginid'].'">
           <input type="hidden" name="club" value="'.$rowM['DealerDir'].'">
           <input type="submit" class="redbutton2" value="'.$rowM['Dealer'].' '.$rowM['DealerDir'].'" name="submit1">
           </form><br>'; 
        } 
       }
       
       }
       
      function getAccounts($email){
      global $link;
      $getFunds = "SELECT * FROM Dealers WHERE userName = '$email'";
      $result = mysqli_query($link, $getFunds)or die("could not get fundraiser accounts.".mysqli_error($link));
      while($row = mysqli_fetch_assoc($result))
      {
         echo '<form action="../sales/viewReps.php" method="Post">
         <input type="hidden" name="" value="'.$row[loginid].'">
         <input type="submit" class="redbutton2" value="'.$row[Dealer]. ' '.$row[DealerDir].'" name="submit1">
         </form><br>';
      }
    } 
    //check if group belongs to logged in rep
   function checkChainRep($user, $account)
   {
      global $link;
      $query = "SELECT * FROM Dealers WHERE loginid = '$account'";
      $val = 0;
      $getAccount = mysqli_query($link,$query)or die("could not get account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($getAccount);
      
      $rep = $row['setuppersonid'];
      if($rep != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
   }
   function checkChainGroupSC($user, $account)
   {
      global $link;
      $val = 0;
      $query = "SELECT * FROM Dealers WHERE loginid = '$account'";
      
      $getAccount = mysqli_query($link,$query)or die("could not get account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($getAccount);
      
      $rep = $row['setuppersonid'];
      
      $getInfo = "SELECT * FROM distributors WHERE loginid = '$rep' AND role = 'RP'";
      $fetchRep = mysqli_query($link, $getInfo)or die("could not get rep account.".mysqli_error($link));
      $repRow = mysqli_fetch_assoc($fetchRep);
      $sc = $repRow['setupID'];
      
      if($sc != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
   }
   function checkChainGroupVP($user, $account)
   {
      global $link;
      $val = 0;
      $query = "SELECT * FROM Dealers WHERE loginid = '$account'";
      
      $getAccount = mysqli_query($link,$query)or die("could not get account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($getAccount);
      
      $rep = $row['setuppersonid'];
      
      $getInfo = "SELECT * FROM distributors WHERE loginid = '$rep' AND role = 'RP'";
      $fetchRep = mysqli_query($link, $getInfo)or die("could not get rep account.".mysqli_error($link));
      $repRow = mysqli_fetch_assoc($fetchRep);
      $vp = $repRow['vpID'];
      
      if($vp != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
   }
   //check if member belongs to logged in rep
    function checkChainMembersRep($user, $account)
   {
      global $link;
      $query = "SELECT * FROM Dealers WHERE loginid = '$account'";
      $val = 0;
      $getAccount = mysqli_query($link,$query)or die("could not get account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($getAccount);
      
      $rep = $row['setuppersonid2'];
      if($rep != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
   }

   function checkContactChainRep($user, $account)
   {
      global $link;
      $query = "SELECT * FROM orgCustomers WHERE customerID = '$account'";
      $val = 0;
      $getAccount = mysqli_query($link,$query)or die("could not get account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($getAccount);
      
      $rep = $row['repID'];
      if($rep != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
   }

  function mySCRep($user)
  {
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$user' AND role = 'RP'";
      $info = mysqli_query($link, $query)or die("could not get my account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $sc = $row['setupID'];
      return $sc;
  }
  function myVPRep($user)
  {
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$user' AND role = 'RP'";
      $info = mysqli_query($link, $query)or die("could not get my account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $vp = $row['vpID'];
      return $vp;
  }
  function myVPSC($user)
  {
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$user' AND role = 'SC'";
      $info = mysqli_query($link, $query)or die("could not get my account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $vp = $row['setupID'];
      return $vp;
  }
  function editRepSC($user, $rep)
  {
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$rep' AND role = 'RP'";
      $info = mysqli_query($link, $query)or die("could not  get rep account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $sc = $row['setupID'];
      if($sc != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val;
  }
  
  function isMyRepVP($user, $rep)
  {
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$rep' AND role = 'RP'";
      $info = mysqli_query($link, $query)or die("could not  get sc account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $vp = $row['vpID'];
      if($vp != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val; 
  }

 function isMySalesperson($user, $rep)
  {
      
      global $link;
      $query = "SELECT * FROM distributors WHERE loginid = '$rep' AND role = 'SC'";
      $info = mysqli_query($link, $query)or die("could not  get sc account.".mysqli_error($link));
      $row = mysqli_fetch_assoc($info);
      
      $vp = $row['vpID'];
      if($vp != $user)
      {
         $val = 1;
      }
      else
      {
        $val = 2; 
      }
      return $val; 
  }




















