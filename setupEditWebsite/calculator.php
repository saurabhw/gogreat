<?php
	include '../includes/autoload.php';
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	
	$table = "income_calculator";
	$errors = array();
	$missing = array();
	// check if email search has been submitted
	
	   //$s_temp = stripslashes($_POST['findemail']);
	   $s_temp = $_SESSION['email'];
	   $s_email = mysqli_real_escape_string($link,$s_temp);
	   $s_query = "SELECT * FROM $table WHERE calc_email = '$s_email'";
	   $s_result = mysqli_query($link, $s_query)or die ("Couldn't execute search query." . mysql_error());
	   $s_row_count = mysqli_num_rows($s_result);
	   if($s_row_count){
	       // Load values into variables for the input fields
	       $record = mysqli_fetch_assoc($s_result);
	       $email = $record['calc_email'];
	       $LHnum = $record['LHnum'];
	       $LHfund = $record['LHfund'];
	       $LHpeople = $record['LHpeople'];
	       $LHpercent = $record['LHpercent'];
	       $LHbaskets = $record['LHbaskets'];
	       $LHnumPerYear = $record['LHnumPerYear'];
	       $AHnum = $record['AHnum'];
	       $AHfund = $record['AHfund'];
	       $AHpeople = $record['AHpeople'];
	       $AHpercent = $record['AHpercent'];
	       $AHbaskets = $record['AHbaskets'];
	       $AHnumPerYear = $record['AHnumPerYear'];
	       $LMnum = $record['LMnum'];
	       $LMfund = $record['LMfund'];
	       $LMpeople = $record['LMpeople'];
	       $LMpercent = $record['LMpercent'];
	       $LMbaskets = $record['LMbaskets'];
	       $LMnumPerYear = $record['LMnumPerYear'];
	       $AMnum = $record['AMnum'];
	       $AMfund = $record['AMfund'];
	       $AMpeople = $record['AMpeople'];
	       $AMpercent = $record['AMpercent'];
	       $AMbaskets = $record['AMbaskets'];
	       $AMnumPerYear = $record['AMnumPerYear'];
	       $Enum = $record['Enum'];
	       $Efund = $record['Efund'];
	       $Epeople = $record['Epeople'];
	       $Epercent = $record['Epercent'];
	       $Ebaskets = $record['Ebaskets'];
	       $EnumPerYear = $record['EnumPerYear'];
	       $LCnum = $record['LCnum'];
	       $LCfund = $record['LCfund'];
	       $LCpeople = $record['LCpeople'];
	       $LCpercent = $record['LCpercent'];
	       $LCbaskets = $record['LCbaskets'];
	       $LCnumPerYear = $record['LCnumPerYear'];
	       $ACnum = $record['ACnum'];
	       $ACfund = $record['ACfund'];
	       $ACpeople = $record['ACpeople'];
	       $ACpercent = $record['ACpercent'];
	       $ACbaskets = $record['ACbaskets'];
	       $ACnumPerYear = $record['ACnumPerYear'];
	       $Onum = $record['Onum'];
	       $Ofund = $record['Ofund'];
	       $Opeople = $record['Opeople'];
	       $Opercent = $record['Opercent'];
	       $Obaskets = $record['Obaskets'];
	       $OnumPerYear = $record['OnumPerYear'];
	       $grandTotal = $record['grand_total'];
	       
	   }// end if ($s_row_count)
	  
	// check if form has been submitted
	if(isset($_POST['save'])){
		// list expected fields
		$expected = array('email','LHnum','LHfund','LHpeople','LHpercent','LHbaskets','LHnumPerYear',
			'AHnum','AHfund','AHpeople','AHpercent','AHbaskets','AHnumPerYear',
			'LMnum','LMfund','LMpeople','LMpercent','LMbaskets','LMnumPerYear',
			'AMnum','AMfund','AMpeople','AMpercent','AMbaskets','AMnumPerYear',
			'Enum','Efund','Epeople','Epercent','Ebaskets','EnumPerYear',
			'LCnum','LCfund','LCpeople','LCpercent','LCbaskets','LCnumPerYear',
			'ACnum','ACfund','ACpeople','ACpercent','ACbaskets','ACnumPerYear',
			'Onum','Ofund','Opeople','Opercent','Obaskets','OnumPerYear','grandTotal');
		// set required fields
		$required = array('email');
		require('../samplewebsites/processSampleWebsiteForm.php');
	   // Database operations
	//if(!$missing && !$errors){
	  // check if email is already in table. Overright the record if it is.
	  $email_query = "SELECT calc_email FROM $table WHERE calc_email = '$email'";
	  $email_result = mysqli_query($link, $email_query);
	  $row_count = mysqli_num_rows($email_result);
	  if($row_count){
	    //update the record
	    $update_query = "UPDATE $table SET LHnum = '$LHnum', LHfund = '$LHfund', LHpeople = '$LHpeople',
	    				       LHpercent = '$LHpercent', LHbaskets = '$LHbaskets', LHnumPerYear = '$LHnumPerYear',
	    				       AHnum = '$AHnum', AHfund = '$AHfund', AHpeople = '$AHpeople',
	    				       AHpercent = '$AHpercent', AHbaskets = '$AHbaskets', AHnumPerYear = '$AHnumPerYear',
	    				       
	    				       LMnum = '$LMnum', LMfund = '$LMfund', LMpeople = '$LMpeople',
	    				       LMpercent = '$LMpercent', LMbaskets = '$LMbaskets', LMnumPerYear = '$LMnumPerYear',
	    				       
	    				       AMnum = '$AMnum', AMfund = '$AMfund', AMpeople = '$AMpeople',
	    				       AMpercent = '$AMpercent', AMbaskets = '$AMbaskets', AMnumPerYear = '$AMnumPerYear',
	    				       
	    				       Enum = '$Enum', Efund = '$Efund', Epeople = '$Epeople',
	    				       Epercent = '$Epercent', Ebaskets = '$Ebaskets', EnumPerYear = '$EnumPerYear',
	    				       
	    				       LCnum = '$LCnum', LCfund = '$LCfund', LCpeople = '$LCpeople',
	    				       LCpercent = '$LCpercent', LCbaskets = '$LCbaskets', LCnumPerYear = '$LCnumPerYear',
	    				       
	    				       ACnum = '$ACnum', ACfund = '$ACfund', ACpeople = '$ACpeople',
	    				       ACpercent = '$ACpercent', ACbaskets = '$ACbaskets', ACnumPerYear = '$ACnumPerYear',
	    				       
	    				       Onum = '$Onum', Ofund = '$Ofund', Opeople = '$Opeople',
	    				       Opercent = '$Opercent', Obaskets = '$Obaskets', OnumPerYear = '$OnumPerYear',
	    				       grand_total = '$grandTotal'
	    				       
	    					 WHERE calc_email = '$email'";
	    $update_result = mysqli_query($link, $update_query)or die ("Couldn't execute update query." . mysql_error());
	  }else{
	    // Insert new record
	    $insert_query = "INSERT INTO $table(calc_email,LHnum,LHfund,LHpeople,LHpercent,LHbaskets,LHnumPerYear,
	    				        AHnum,AHfund,AHpeople,AHpercent,AHbaskets,AHnumPerYear,
	    				        LMnum,LMfund,LMpeople,LMpercent,LMbaskets,LMnumPerYear,
	    				        AMnum,AMfund,AMpeople,AMpercent,AMbaskets,AMnumPerYear,
	    				        Enum,Efund,Epeople,Epercent,Ebaskets,EnumPerYear,
	    				        LCnum,LCfund,LCpeople,LCpercent,LCbaskets,LCnumPerYear,
	    				        ACnum,ACfund,ACpeople,ACpercent,ACbaskets,ACnumPerYear,
	    				        Onum,Ofund,Opeople,Opercent,Obaskets,OnumPerYear,grand_total)
			
	    	VALUES('$email','$LHnum','$LHfund','$LHpeople','$LHpercent','$LHbaskets','$LHnumPerYear',
	    	       '$AHnum','$AHfund','$AHpeople','$AHpercent','$AHbaskets','$AHnumPerYear',
	    	       '$LMnum','$LMfund','$LMpeople','$LMpercent','$LMbaskets','$LMnumPerYear',
	    	       '$AMnum','$AMfund','$AMpeople','$AMpercent','$AMbaskets','$AMnumPerYear',
	    	       '$Enum','$Efund','$Epeople','$Epercent','$Ebaskets','$EnumPerYear',
	    	       '$LCnum','$LCfund','$LCpeople','$LCpercent','$LCbaskets','$LCnumPerYear',
	    	       '$ACnum','$ACfund','$ACpeople','$ACpercent','$ACbaskets','$ACnumPerYear',
	    	       '$Onum','$Ofund','$Opeople','$Opercent','$Obaskets','$OnumPerYear','$grandTotal')";
	    $insert_result = mysqli_query($link, $insert_query)or die ("Couldn't execute insert query." . mysql_error());
	    }
	
	//}// end if(!missing..	
	}// end isset
	
	 session_start();

  if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
       
	
?>
<!DOCTYPE HTML>
<head>
	<title>Calculate Sales Goals</title>
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'sideLeftNav.php' ; ?>
  
  <div id="content">
    <h1>Income Calculator</h1>
    <h3>Find Out How Much You Can Earn by Using Our Income Calculator</h3>

   <button1 class="redbutton" title="Click to View Instructions">View Instructions</button1>
   <button2 class="redbutton" title="Click to See an Example">See Example</button2>
   
	<show class="hide">
		<br><br>
		<h5>The calculator is simple to use:</h5>
	        <ul id="reasoncontent">
	          <li>Enter the number of accounts you think you can set up</li>
	          <li>Enter the number of groups in each organization that might participate in the fundraiser</li>
	          <li>Enter the total number of students or members in the organization</li>
	          <li>Enter the percentage of students or members who might participate in the fundraiser</li>
	          <li>Enter the average number of products and gifts each participant will sell</li>
	          <li>Multiplied by $26 (Average wholesale price of a basket)</li>
	          <li>Enter the average number of fundraisers each account will setup in one year<br>(Most accounts will do 3 to 5 fundraising opportunities in a year with our program.)</li>
	          <li>Multiplied by your commission percentage &#8212; 8%</li>
	        </ul>
	</show>
	
    <div id="tableWrapper">
    
    <show2 class="hide">
    	<br>
      <h5 class="tableHeader">Calculator Example of a Church:</h5>
      <table class="calculatorTable" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th>Churches</th>
          <th>Number of<br>Churches</th>
          <th>&nbsp;</th>
          <th>Number of<br>Ministries,<br>Groups<br>and Events</th>
          <th>&nbsp;</th>
          <th>Number of<br>Members</th>
          <th>&nbsp;</th>
          <th>Participating<br>Percent of<br>Members</th>
          <th>&nbsp;</th>
          <th>Products<br>& Gifts<br>Sold Per<br>Participant</th>
          <th>&nbsp;</th>
          <th>$22.75 Avg.<br>Wholesale<br>Price</th>
          <th>&nbsp;</th>
          <th>Fundraisers<br>Per Year</th>
          <th>&nbsp;</th>
          <th>Percent<br>Commission</th>
          <th>&nbsp;</th>
          <th>Total<br>Commission</th>
        </tr>
        <tr>
          <td class=fl>Large Churches<br>1000+ Members<br>(30 Ministries/<br>Groups/Events)</td>
          <td>6</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>1000</td>
          <td>x</td>
          <td>75%</td>
          <td>x</td>
          <td>5</td>
          <td>x</td>
          <td>$22.75</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>6%</td>
          <td>=</td>
          <td class="rtalign">$122,850.00</td>
        </tr>
        <tr>
          <td class=fl>Average Churches<br>100-999 Members<br>(20 Ministries/<br>Groups/Events)</td>
          <td>6</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>320</td>
          <td>x</td>
          <td>60%</td>
          <td>x</td>
          <td>4</td>
          <td>x</td>
          <td>$22.75</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>6%</td>
          <td>=</td>
          <td class="rtalign">$25,159.68</td>
        </tr>
        <tr>
          <td class=fl>Church Choir</td>
          <td>1</td>
          <td>x</td>
          <td>1</td>
          <td>x</td>
          <td>20</td>
          <td>x</td>
          <td>75%</td>
          <td>x</td>
          <td>5</td>
          <td>x</td>
          <td>$22.75</td>
          <td>x</td>
          <td>1</td>
          <td>x</td>
          <td>6%</td>
          <td>=</td>
          <td class="rtalign">$102.38</td>
        </tr>
        <tr>
          <td colspan="15" class=fl >Total Commission From Churches</td>
          <td>Total</td>
          <td>=</td>
          <td class="rtalign">$148,112.06</td>
        </tr>
      </table>
      </show2>
      
      <br>
      <form action="calculator.php" method="POST" id="calculator" name="calculator" enctype="multipart/form-data" >
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Schools</th>
          <th>Number of <br>
            Schools</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>
            Clubs, Teams <br>
            and Groups</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>
            Students</th>
          <th scope="col">&nbsp;</th>
          <th>Participating <br>
            Percent of <br>
            Students</th>
          <th scope="col">&nbsp;</th>
          <th>Products<br>& Gifts<br>
            Sold Per <br>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br>
            Wholesale <br>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br>
            Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Large High Schools <br>
            2400+ Students <br>
            (55 Clubs/Teams)</td>
          <td><input type="text" id='LHnum' name="LHnum" size="4" value="<?php echo "$LHnum";?>" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHfund' name="LHfund" size="4" value="<?php echo "$LHfund";?>" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpeople' name="LHpeople" size="4" value="<?php echo "$LHpeople";?>" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpercent' name="LHpercent" size="4" value="<?php echo "$LHpercent";?>" onchange='calculateSchool("LH")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LHbaskets' name="LHbaskets" size="4" value="<?php echo "$LHbaskets";?>" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='LHprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LHnumPerYear' name="LHnumPerYear" size="3" value="<?php echo "$LHnumPerYear";?>" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Average High Schools <br>
            855+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AHnum' name="AHnum" size="4" value="<?php echo "$AHnum";?>" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHfund' name="AHfund" size="4" value="<?php echo "$AHfund";?>" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpeople' name="AHpeople" size="4" value="<?php echo "$AHpeople";?>" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpercent' name="AHpercent" size="4" value="<?php echo "$AHpercent";?>" onchange='calculateSchool("AH")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='AHbaskets' name="AHbaskets" size="4" value="<?php echo "$AHbaskets";?>" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AHnumPerYear' name="AHnumPerYear" size="3" value="<?php echo "$AHnumPerYear";?>" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='AHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Large Middle Schools <br>
            1855+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='LMnum' name="LMnum" size="4" value="<?php echo "$LMnum";?>" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMfund' name="LMfund" size="4" value="<?php echo "$LMfund";?>" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpeople' name="LMpeople" size="4" value="<?php echo "$LMpeople";?>" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpercent' name="LMpercent" size="4" value="<?php echo "$LMpercent";?>" onchange='calculateSchool("LM")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LMbaskets' name="LMbaskets" size="4" value="<?php echo "$LMbaskets";?>" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='LMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LMnumPerYear' name="LMnumPerYear" size="3" value="<?php echo "$LMnumPerYear";?>" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Avg Middle Schools <br>
            650+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AMnum' name="AMnum" size="4" value="<?php echo "$AMnum";?>" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMfund' name="AMfund" size="4" value="<?php echo "$AMfund";?>" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpeople' name="AMpeople" size="4" value="<?php echo "$AMpeople";?>" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpercent' name="AMpercent" size="4" value="<?php echo "$AMpercent";?>" onchange='calculateSchool("AM")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='AMbaskets' name="AMbaskets" size="4" value="<?php echo "$AMbaskets";?>" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='AMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AMnumPerYear' name="AMnumPerYear" size="3" value="<?php echo "$AMnumPerYear";?>" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='AMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Elementary Schools<br>
            500+ <br>
            (PTO Others)</td>
          <td><input type="text" id='Enum' name="Enum" size="4" value="<?php echo "$Enum";?>" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Efund' name="Efund" size="4" value="<?php echo "$Efund";?>" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epeople' name="Epeople" size="4" value="<?php echo "$Epeople";?>" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epercent' name="Epercent" size="4" value="<?php echo "$Epercent";?>" onchange='calculateSchool("E")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name="Ebaskets" size="4" value="<?php echo "$Ebaskets";?>" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name="EnumPerYear" size="3" value="<?php echo "$EnumPerYear";?>" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>8%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools</td>
          <td colspan="2" class ="fl"><button class="medredbutton" type="button" onclick="calculateSchool('LH')">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th>Churches</th>
          <th>Number of <br>
            Churches</th>
          <th>&nbsp;</th>
          <th>Number of <br>
            Ministries, <br>
            Groups <br>
            and Events</th>
          <th>&nbsp;</th>
          <th>Number of <br>
            Members</th>
          <th>&nbsp;</th>
          <th>Participating <br>
            Percent of <br>
            Members</th>
          <th>&nbsp;</th>
          <th>Products<br>& Gifts<br>
            Sold Per <br>
            Participant</th>
          <th>&nbsp;</th>
          <th>$26 Avg. <br>
            Wholesale <br>
            Price</th>
          <th>&nbsp;</th>
          <th>Fundraisers <br>
            Per Year</th>
          <th>&nbsp;</th>
          <th>Percent <br>
            Commission</th>
          <th>&nbsp;</th>
          <th>Total<br>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Large Churches <br>1000+ Members<br>(30 Ministries/<br>Groups/Events)</td>
          <td><input type="text" id='LCnum' name="LCnum" size="4" value="<?php echo "$LCnum";?>" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCfund' name="LCfund" size="4" value="<?php echo "$LCfund";?>" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpeople' name="LCpeople" size="4" value="<?php echo "$LCpeople";?>" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpercent' name="LCpercent" size="4" value="<?php echo "$LCpercent";?>" onchange='calculateSchool("LC")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LCbaskets' name="LCbaskets" size="4" value="<?php echo "$LCbaskets";?>" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='LCprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LCnumPerYear' name="LCnumPerYear" size="3" value="<?php echo "$LCnumPerYear";?>" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LCtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td class="fl">Avg Churches <br>100-999 Members<br>(20 Ministries/<br>Groups/Events)</td>
          <td><input type="text" id='ACnum' name="ACnum" size="4" value="<?php echo "$ACnum";?>" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACfund' name="ACfund" size="4" value="<?php echo "$ACfund";?>" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpeople' name="ACpeople" size="4" value="<?php echo "$ACpeople";?>" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpercent' name="ACpercent" size="4" value="<?php echo "$ACpercent";?>" onchange='calculateSchool("AC")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='ACbaskets' name="ACbaskets" size="4" value="<?php echo "$ACbaskets";?>" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='ACprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='ACnumPerYear' name="ACnumPerYear" size="3" value="<?php echo "$ACnumPerYear";?>" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='ACtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Churches</td>
          <td colspan="2" class ="fl"><button class="medredbutton" type="button" onclick="calculateSchool('A')">Calculate</button></td>
          <td id='churchTotal'>&nbsp;</td>
        </tr>
      </table>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a elementary school and organization fundraisers showing math and total commission">
        <tr>
          <th>Organizations</th>
          <th>Number of <br>
            Organizations</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>
            Groups <br>
            and Events</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>
            Members</th>
          <th scope="col">&nbsp;</th>

          <th>Participating <br>
            Percent of <br>
            Members</th>
          <th scope="col">&nbsp;</th>
          <th>Products<br>& Gifts<br>
            Sold Per <br>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br>
            Wholesale <br>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br>
            Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Organizations</td>
          <td><input type="text" id='Onum' name="Onum" size="4" value="<?php echo "$Onum";?>" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Ofund' name="Ofund" size="4" value="<?php echo "$Ofund";?>" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opeople' name="Opeople" size="4" value="<?php echo "$Opeople";?>" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opercent' name="Opercent" size="4" value="<?php echo "$Opercent";?>" onchange='calculateSchool("O")'/>
            </td>

          <td>x</td>
          <td><input type="text" id='Obaskets' name="Obaskets" size="4" value="<?php echo "$Obaskets";?>" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='Oprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='OnumPerYear' name="OnumPerYear" size="3" value="<?php echo "$OnumPerYear";?>" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='commission2'>8%</td>
          <td>=</td>
          <td id='Ototal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools and Organizations</td>
          <td colspan="2" class ="fl"><button class="medredbutton" type="button" onclick="calculateSchool('O')">Calculate</button></td>
          <td id='orgTotal'>&nbsp;</td>
        </tr>
      </table>
      
      <div id="redBar2">
        <table border="0" cellspacing="0" cellpadding="3" summary="Table shows grand total commissions from schools, churches and organizations">
          <tr>
            <td class="gTotal">Total Number of commissions from schools, churches and organizations:</td>
            <td class="grandTotal"><input id="grandTotal" type="text" name="grandTotal" value="<?php echo '$'; echo "$grandTotal";?>"></td>
          </tr>
          </table>
      </div> <!--end redBar2-->
      
      <div class="clear"></div> <br>
      
     <input class="redbutton" type="submit" name="save" value="Save Your Numbers" style="float: right;">
     
     <div class="clear"></div> <br>
     
    </div><!--end tableWrapper--> 
    </form>
    
  </div><!--end content-->
  
    <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>

<?php
ob_end_flush();
?>