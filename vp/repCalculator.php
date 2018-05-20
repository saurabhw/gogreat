<?php
    
     include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
     $userID = $_SESSION['userId'];
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $pic = $row['picPath'];
?>

<!DOCTYPE HTML>
<head>
	<title>Income Calculator | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
  
  <div id="content">
    <h1>Income Calculator</h1>
    <h3>Find Out How Much You Can Earn by Using Our Income Calculator</h3>
    
   <button1 class="medredbutton" title="Click to View Instructions" onclick="myToggle()" id="button1">View Instructions</button1>
    <button2 class="medredbutton" title="Click to See an Example" onclick="myToggle2()">See Example</button2>
    
	<div id="example1" style="display: none;">
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
	          <li>Multiplied by your commission percentage &#8212; 0.5%</li>
	        </ul>
	</div>
	
    <div id="tableWrapper">
   <div id="example2" style="display: none;">
    	<br>
      <h5 class="tableHeader">Calculator Example of a Church:</h5>
      <table class="calculatorTable" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th scope="col">Churches</th>
          <th scope="col">Number of<br>Churches</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Number of<br>Ministries,<br>Groups<br>and Events</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Number of<br>Members</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Participating<br>Percent of<br>Members</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Products<br>& Gifts<br>Sold Per<br>Participant</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">$26 Avg.<br>Wholesale<br>Price</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Fundraisers<br>Per Year</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Percent<br>Commission</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Total<br>Commission</th>
        </tr>
        <tr>
          <td class=fl>Large Churches<br>1000+ Members<br>(30 Ministries/<br>Groups/Events)</td>
          <td>6</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>1000</td>
          <td>x</td>
          <td>33.33%</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>$26.00</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>0.5%</td>
          <td>=</td>
          <td>$33,276.67</td>
        </tr>
        <tr>
          <td class=fl>Average Churches<br>100-999 Members<br>(20 Ministries/<br>Groups/Events)</td>
          <td>6</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>320</td>
          <td>x</td>
          <td>33.33%</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>$26.00</td>
          <td>x</td>
          <td>2</td>
          <td>x</td>
          <td>0.5%</td>
          <td>=</td>
          <td>$10,648.54</td>
        <tr>
          <td colspan="15" class=fl >Total Commission From Churches</td>
          <td>Total</td>
          <td>=</td>
          <td>$43,925.21</td>
        </tr>
      </table>
      </div>
      
      <br>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Schools</th>
          <th>Number of<br>Schools</th>
          <th scope="col">&nbsp;</th>
          <th>Number of<br>Clubs, Teams<br>and Groups</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>Students</th>
          <th scope="col">&nbsp;</th>
          <th>Participating <br>Percent of <br>Students</th>
          <th scope="col">&nbsp;</th>
          <th>Products<br>& Gifts<br>Sold Per <br>Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br>Wholesale <br>Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br>Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br>Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br>Commission</th>
        </tr>
        <tr>
          <td class="fl">Large High Schools <br>
            2400+ Students <br>
            (55 Clubs/Teams)</td>
          <td><input type="text" id='LHnum' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHfund' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpercent' name"" size="4" onchange='calculateSchool("LH")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LHbaskets' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='LHprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LHnumPerYear' name"" size="3" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='LHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Average High Schools <br>
            855+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AHnum' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHfund' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpeople' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpercent' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHbaskets' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AHnumPerYear' name"" size="3" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='AHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Large Middle Schools <br>
            1855+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='LMnum' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMfund' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpeople' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpercent' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMbaskets' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='LMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LMnumPerYear' name"" size="3" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='LMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Avg Middle Schools <br>
            650+ Students <br>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AMnum' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMfund' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpeople' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpercent' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMbaskets' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='AMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AMnumPerYear' name"" size="3" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='AMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Elementary Schools<br>
            500+ <br>
            (PTO Others)</td>
          <td><input type="text" id='Enum' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Efund' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epercent' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>0.5%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('LH')" class="medredbutton"  title="Click to Calculate Your Total Commission">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
      <table class="calculatorTable" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th>Churches</th>
          <th>Number of<br>Churches</th>
          <th>&nbsp;</th>
          <th>Number of <br>Ministries, <br>Groups <br>and Events</th>
          <th>&nbsp;</th>
          <th>Number of <br>Members</th>
          <th>&nbsp;</th>
          <th>Participating <br>Percent of <br>Members</th>
          <th>&nbsp;</th>
          <th>Products<br>& Gifts<br>Sold Per <br>Participant</th>
          <th>&nbsp;</th>
          <th>$26 Avg. <br>Wholesale <br>Price</th>
          <th>&nbsp;</th>
          <th>Fundraisers <br>Per Year</th>
          <th>&nbsp;</th>
          <th>Percent <br>Commission</th>
          <th>&nbsp;</th>
          <th>Total<br>Commission</th>
        </tr>
        <tr>
          <td class="fl">Large Churches <br>
            1000+ Members<br>(30 Ministries/<br>Groups/Events)</td>
          <td><input type="text" id='LCnum' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCfund' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpeople' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpercent' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCbaskets' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='LCprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LCnumPerYear' name"" size="3" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='LCtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td class="fl">Avg Churches <br>
            100-999 Members<br>(20 Ministries/<br>Groups/Events)</td>
          <td><input type="text" id='ACnum' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACfund' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpeople' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpercent' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACbaskets' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='ACprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='ACnumPerYear' name"" size="3" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='commission'>0.5%</td>
          <td>=</td>
          <td id='ACtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Churches</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('A')" class="medredbutton" title="Click to Calculate Your Total Commission">Calculate</button></td>
          <td id='churchTotal'>&nbsp;</td>
        </tr>
      </table>
      <table class="calculatorTable" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a elementary school and organization fundraisers showing math and total commission">
        <tr>
          <th>Organizations</th>
          <th>Number of <br>            Organizations</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>            Groups <br>            and Events</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br>            Members</th>
          <th scope="col">&nbsp;</th>

          <th>Participating <br>Percent of <br>Members</th>
          <th scope="col">&nbsp;</th>
          <th>Products<br>& Gifts<br>Sold Per <br>Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br>Wholesale <br>Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br>Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br>Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br>Commission</th>
        </tr>
        <tr>
          <td class="fl">Organizations</td>
          <td><input type="text" id='Onum' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Ofund' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opeople' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opercent' name"" size="4" onchange='calculateSchool("O")'/></td>

          <td>x</td>
          <td><input type="text" id='Obaskets' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='Oprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='OnumPerYear' name"" size="3" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='commission2'>0.5%</td>
          <td>=</td>
          <td id='Ototal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools and Organizations</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('O')" class="medredbutton"  title="Click to Calculate Your Total Commission">Calculate</button></td>
          <td id='orgTotal'>&nbsp;</td>
        </tr>
      </table>
      <div id="redBar2">
        <table border="0" cellspacing="0" cellpadding="3" summary="Table shows grand total commissions from schools, churches and organizations">
          <tr>
            <td class="gTotal">Total Number of commissions from schools, churches and organizations </td>
            <td class="grandTotal"><input id="grandTotal" type="text" name="" value="$"></td>
          </tr>
        </table>
      </div>      <!--end redBar2--> 
    </div>    <!--end tableWrapper--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>