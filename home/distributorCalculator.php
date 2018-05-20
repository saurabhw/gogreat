<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
-->
<title>GreatMoods Income Calculator</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	var LHtotal;
	var AHtotal;
	var LMtotal;
	var AMtotal;
	var schoolTotal;
	var churchTotal;
	var grandTotal1;
	function calculateSchool(orgType) {
	        //large high schools
	        var num = Number(document.getElementById("LHnum").value);
		var fund = Number(document.getElementById("LHfund").value);
		var people = Number(document.getElementById("LHpeople").value);
		var percent = (Number(document.getElementById("LHpercent").value))/100;
		var active = people * percent;
		active = Number(active);
		//document.getElementById("LHactive").innerHTML = active;
		var baskets = Number(document.getElementById("LHbaskets").value);
		var numPerYear = Number(document.getElementById("LHnumPerYear").value);
		var price = 26.00;
		var commission = 0.10;
		var total1 = fund * active * baskets * numPerYear * price * commission * num;
		var result1 = format(total1,2);
		grandTotal1 = result1;
		schoolTotal = result1;
		document.getElementById("LHtotal").innerHTML = result1;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//average high schools
		var num2 = Number(document.getElementById("AHnum").value);
		var fund2 = Number(document.getElementById("AHfund").value);
		var people2 = Number(document.getElementById("AHpeople").value);
		var percent2 = (Number(document.getElementById("AHpercent").value))/100;
		var active2 = people2 * percent2;
		active2 = Number(active2);
		//document.getElementById("AHactive").innerHTML = active2;
		var baskets2 = Number(document.getElementById("AHbaskets").value);
		var numPerYear2 = Number(document.getElementById("AHnumPerYear").value);
		var total2 = fund2 * active2 * baskets2 * numPerYear2 * price * commission * num2;
		var result2 =  format(total2,2);
		document.getElementById("AHtotal").innerHTML = result2;
		grandTotal1 += result2;
		schoolTotal += result2;
		schoolTotal = format(schoolTotal,2);
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//large middle schools
		var num3 = Number(document.getElementById("LMnum").value);
		var fund = Number(document.getElementById("LMfund").value);
		var fund3 = Number(document.getElementById("LMfund").value);
		var people3 = Number(document.getElementById("LMpeople").value);
		var percent3 = (Number(document.getElementById("LMpercent").value))/100;
		var active3 = people3 * percent3;
		active3 = Number(active3);
		//document.getElementById("LMactive").innerHTML = active3;
		var baskets3 = Number(document.getElementById("LMbaskets").value);
		var numPerYear3 = Number(document.getElementById("LMnumPerYear").value);
		var total3 = fund3 * active3 * baskets3 * numPerYear3 * price * commission * num3;
		var result3 =  format(total3,2);
		document.getElementById("LMtotal").innerHTML = result3;
		grandTotal1 += result3;
		schoolTotal += result3;
		schoolTotal = format(schoolTotal,2);
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//average middle schools
		var num4 = Number(document.getElementById("AMnum").value);
		var fund4 = Number(document.getElementById("AMfund").value);
		var people4 = Number(document.getElementById("AMpeople").value);
		var percent4 = (Number(document.getElementById("AMpercent").value))/100;
		var active4 = people4 * percent4;
		active4 = Number(active4);
		//document.getElementById("AMactive").innerHTML = active4;
		var baskets4 = Number(document.getElementById("AMbaskets").value);
		var numPerYear4 = Number(document.getElementById("AMnumPerYear").value);
		var total4 = fund4 * active4 * baskets4 * numPerYear4 * price * commission * num4;
		var result4 =  format(total4,2);
		document.getElementById("AMtotal").innerHTML = result4;
		grandTotal1 += result4;
		schoolTotal += result4;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//elementary schools
		var num7 = Number(document.getElementById("Enum").value);
		var fund7 = Number(document.getElementById("Efund").value);
		var people7 = Number(document.getElementById("Epeople").value);
		var percent7 = (Number(document.getElementById("Epercent").value))/100;
		var active7 = people7 * percent7;
		active7 = Number(active7);
		//document.getElementById("Eactive").innerHTML = active7;
		var baskets7 = Number(document.getElementById("Ebaskets").value);
		var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
		var total7 = fund7 * active7 * baskets7 * numPerYear7 * price * commission * num7;
		var result7 =  format(total7,2);
		grandTotal1 += result7;
		schoolTotal += result7;
		document.getElementById("Etotal").innerHTML = result7;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		
		//large churches
		var num5 = Number(document.getElementById("LCnum").value);
		var fund5 = Number(document.getElementById("LCfund").value);
		var people5 = Number(document.getElementById("LCpeople").value);
		var percent5 = (Number(document.getElementById("LCpercent").value))/100;
		var active5 = people5 * percent5;
		active5 = Number(active5);
		//document.getElementById("LCactive").innerHTML = active5;
		var baskets5 = Number(document.getElementById("LCbaskets").value);
		var numPerYear5 = Number(document.getElementById("LCnumPerYear").value);
		var total5 = fund5 * active5* baskets5 * numPerYear5 * price * commission * num5;
		var result5 =  format(total5,2);
		document.getElementById("LCtotal").innerHTML = result5;
		grandTotal1 += result5;
		churchTotal = result5;
		document.getElementById("churchTotal").innerHTML = churchTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//average churches
		var num6 = Number(document.getElementById("ACnum").value);
		var fund6 = Number(document.getElementById("ACfund").value);
		var people6 = Number(document.getElementById("ACpeople").value);
		var percent6 = (Number(document.getElementById("ACpercent").value))/100;
		var active6 = people6 * percent6;
		active6 = Number(active6);
		//document.getElementById("ACactive").innerHTML = active6;
		var baskets6 = Number(document.getElementById("ACbaskets").value);
		var numPerYear6 = Number(document.getElementById("ACnumPerYear").value);
		var total6 = fund6 * active6 * baskets6 * numPerYear6 * price * commission * num6;
		var result6 =  format(total6,2);
		document.getElementById("ACtotal").innerHTML = result6;
		grandTotal1 += result6;
		churchTotal += result6;
		document.getElementById("churchTotal").innerHTML = churchTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		
		
		//organizations
		var num8 = Number(document.getElementById("Onum").value);
		var fund8 = Number(document.getElementById("Ofund").value);
		var people8 = Number(document.getElementById("Opeople").value);
		var percent8 = (Number(document.getElementById("Opercent").value))/100;
		var active8 = people8 * percent8;
		active8 = Number(active8);
		//document.getElementById("Oactive").innerHTML = active8;
		var baskets8 = Number(document.getElementById("Obaskets").value);
		var numPerYear8 = Number(document.getElementById("OnumPerYear").value);
		var total8 = fund8 * active8 * baskets8 * numPerYear8 * price * commission * num8;
		var result8 =  format(total8,2);
		//document.getElementById("Ototal").innerHTML = result6;
		grandTotal1 += result8;
		orgTotal = result8;
		document.getElementById("Ototal").innerHTML = result8;
		document.getElementById("orgTotal").innerHTML = orgTotal;
		document.getElementById("grandTotal").value = grandTotal1;	
	}
	function format(num, dec) {
        return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
        }
	
</script>
</head>

<body>
<div id="container">
  <?php include 'header_homepage2.php' ; ?>
  <?php include 'leftSidebarNavHomepage.php' ; ?>
  <div id="content">
    <h1>Income Calculator</h1>
    <h3>Find out how much you can make by using our Earning Potential Calculator below </h3>
    <div id="leadBox">
      <div id="infoText">
        <div id="redBar1">
          <h3>The calculator is simple to use:</h3>
        </div>
        <!--end redBar1-->
        <ul>
          <li>Enter the number of accounts you think you can set up</li>
          <li>Enter the number of groups in each organization that might participate in the fundraiser</li>
          <li>Enter the total number of students/members in the organization</li>
          <li>Enter the percentage of students/members who might participate in the fundraiser</li>
          <li>Enter the average number of gift baskets each participant will sell</li>
          <li>Multiply by $26, the average wholesale price of a basket</li>
          <li>Enter the average number of fundraisers each account will setup in one year, 3 is a good average &#8212; Holiday/Christmas, Valentine's Day, Easter, Mother's Day, Father's Day</li>
          <li>Multiply by your commission percentage &#8212; 10%</li>
        </ul>
      </div>
      <!--end infoText--> 
      <img id="leadInImg" src="../images/calculatorimage.png" width="340" height="205"> 
      <!--leadin image--> 
      </div>
    <!--end leadBox-->
    
    <div id="tableWrapper">
      <h3 class="tableHeader">Calculator Example of a Church</h3>
      <table class="calculatorTable" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th scope="col">Churches</th>
          <th scope="col">Number of <br/>
            Churches</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Number of <br/>
            Ministries, <br>
            Groups <br/>
            and Events</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Number of <br/>
            Members</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Participating <br/>
            Percent of <br/>
            Members</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Gift <br/>
            Baskets <br/>
            Sold Per <br/>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">$26 Avg. <br/>
            Wholesale <br/>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Fundraisers <br/>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Percent <br/>
            Commission</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Total<br/>
            Commission</th>
        </tr>
        <tr>
          <td class=fl>Large Churches<br/>
1000+ Members             <br>
            (30 Ministries/Groups/Events)</td>
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
          <td>10%</td>
          <td>=</td>
          <td>$41,600.00</td>
        </tr>
        <tr>
          <td class=fl>Average Churches<br/>
100-999 Members             <br>
            (30 Ministries/Groups/Events)</td>
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
          <td>10%</td>
          <td>=</td>
          <td>$13,312.00</td>
        <tr>
          <td colspan="15" class=fl >Total Commission From Churches</td>
          <td>Total</td>
          <td>=</td>
          <td>$54,912.00</td>
        </tr>
      </table>
      <h3 class="tableHeader">Try Our Calculator!</h3>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Schools</th>
          <th>Number of <br/>
            Schools</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Clubs, Teams <br>
            and Groups</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Students</th>
          <th scope="col">&nbsp;</th>
          <th>Participating <br/>
            Percent of <br/>
            Students</th>
          <th scope="col">&nbsp;</th>
          <th>Gift <br/>
            Baskets <br/>
            Sold Per <br/>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br/>
            Wholesale <br/>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br/>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br/>
            Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br/>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Large High Schools <br/>
            2400+ Students <br/>
            (55 Clubs/Teams)</td>
          <td><input type="text" id='LHnum' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHfund' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpercent' name"" size="4" onchange='calculateSchool("LH")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='LHbaskets' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='LHprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LHnumPerYear' name"" size="3" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='LHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Average High Schools <br/>
            855+ Students <br/>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AHnum' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHfund' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpeople' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td><input type="text" id='AHpercent' name"" size="4" onchange='calculateSchool("AH")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='AHbaskets' name"" size="4" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AHnumPerYear' name"" size="3" onchange='calculateSchool("AH")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='AHtotal'></td>
        </tr>
        <tr>
          <td class="fl">Large Middle Schools <br/>
            1855+ Students <br/>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='LMnum' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMfund' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpeople' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpercent' name"" size="4" onchange='calculateSchool("LM")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='LMbaskets' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='LMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LMnumPerYear' name"" size="3" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='LMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Avg Middle Schools <br/>
            650+ Students <br/>
            (40 Clubs/Teams)</td>
          <td><input type="text" id='AMnum' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMfund' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpeople' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td><input type="text" id='AMpercent' name"" size="4" onchange='calculateSchool("AM")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='AMbaskets' name"" size="4" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='AMprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='AMnumPerYear' name"" size="3" onchange='calculateSchool("AM")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='AMtotal'></td>
        </tr>
        <tr>
          <td class="fl">Elementary Schools<br/>
            500+ <br/>
            (PTO Others)</td>
          <td><input type="text" id='Enum' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Efund' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epercent' name"" size="4" onchange='calculateSchool("E")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>10%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('LH')">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
        <tr>
          <th>Churches</th>
          <th>Number of <br/>
            Churches</th>
          <th>&nbsp;</th>
          <th>Number of <br/>
            Ministries, <br>
            Groups <br/>
            and Events</th>
          <th>&nbsp;</th>
          <th>Number of <br/>
            Members</th>
          <th>&nbsp;</th>
          <th>Participating <br/>
            Percent of <br/>
            Members</th>
          <th>&nbsp;</th>
          <th>Gift <br/>
            Baskets <br/>
            Sold Per <br/>
            Participant</th>
          <th>&nbsp;</th>
          <th>$26 Avg. <br/>
            Wholesale <br/>
            Price</th>
          <th>&nbsp;</th>
          <th>Fundraisers <br/>
            Per Year</th>
          <th>&nbsp;</th>
          <th>Percent <br/>
            Commission</th>
          <th>&nbsp;</th>
          <th>Total<br/>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Large Churches <br/>
            1000+ Members<br>
            (30 Ministries/Groups/Events)</td>
          <td><input type="text" id='LCnum' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCfund' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpeople' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpercent' name"" size="4" onchange='calculateSchool("LC")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='LCbaskets' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='LCprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='LCnumPerYear' name"" size="3" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='LCtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td class="fl">Avg Churches <br/>
            100-999 Members<br>
            (20 Ministries/Groups/Events)</td>
          <td><input type="text" id='ACnum' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACfund' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpeople' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td><input type="text" id='ACpercent' name"" size="4" onchange='calculateSchool("AC")'/>
            %</td>
          <td>x</td>
          <td><input type="text" id='ACbaskets' name"" size="4" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='ACprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='ACnumPerYear' name"" size="3" onchange='calculateSchool("AC")'/></td>
          <td>x</td>
          <td id='commission'>10%</td>
          <td>=</td>
          <td id='ACtotal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Churches</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('A')">Calculate</button></td>
          <td id='churchTotal'>&nbsp;</td>
        </tr>
      </table>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a elementary school and organization fundraisers showing math and total commission">
        <tr>
          <th>Organizations</th>
          <th>Number of <br/>
            Organizations</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Groups <br/>
            and Events</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Members</th>
          <th scope="col">&nbsp;</th>

          <th>Participating <br/>
            Percent of <br/>
            Members</th>
          <th scope="col">&nbsp;</th>
          <th>Gift <br/>
            Baskets <br/>
            Sold Per <br/>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$26 Avg. <br/>
            Wholesale <br/>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br/>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br/>
            Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br/>
            Commission</th>
        </tr>
        <tr>
          <td class="fl">Organizations</td>
          <td><input type="text" id='Onum' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Ofund' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opeople' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td><input type="text" id='Opercent' name"" size="4" onchange='calculateSchool("O")'/>
            %</td>

          <td>x</td>
          <td><input type="text" id='Obaskets' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='Oprice'>$26.00</td>
          <td>x</td>
          <td><input type="text" id='OnumPerYear' name"" size="3" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='commission2'>10%</td>
          <td>=</td>
          <td id='Ototal'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools and Organizations</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('O')">Calculate</button></td>
          <td id='orgTotal'>&nbsp;</td>
        </tr>
      </table>
      <div id="redBar2">
        <table "width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows grand total commissions from schools, churches and organizations">
          <tr>
            <th width="70%" class="gTotal">Total Number of commissions from schools, churches and organizations </th>
            <th width="10%" class="gTotal1" align="right">$</th>
            <th width="20%" class="grandTotal" ><input id="grandTotal" type="text" name:"" size="6"/></th>
          </tr>
        </table>
      </div>
      <!--end redBar2--> 
      
    </div>
    <!--end tableWrapper--> 
    
  </div>
  <!--end content-->
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>