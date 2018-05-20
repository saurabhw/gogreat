<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculator test</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="tableWrapper">
  <h3 class="tableHeader">Calculator Example of a Church</h3>
  <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
    <tr>
      <th scope="col">Churches</th>
      <th scope="col">Number of <br/>
        Church <br/>
        Fundraisers</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">Number of <br/>
        Members</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">Participating <br/>
        Percent of <br/>
        Members</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">Total <br/>
        Number of <br/>
        Participants</th>
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
        (1000+ members)</td>
      <td>12</td>
      <td>x</td>
      <td>1000</td>
      <td>x</td>
      <td>33.33%</td>
      <td>=</td>
      <td>4,000</td>
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
        (100-999 members)</td>
      <td>12</td>
      <td>x</td>
      <td>320</td>
      <td>x</td>
      <td>33.33%</td>
      <td>=</td>
      <td>1,280</td>
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
      <th>Secondary <br/>
        Schools</th>
      <th>Number of <br/>
        School <br/>
        Fundraisers</th>
      <th scope="col">&nbsp;</th>
      <th>Number of <br/>
        Students</th>
      <th scope="col">&nbsp;</th>
      <th>Participating <br/>
        Percent of <br/>
        Students</th>
      <th scope="col">&nbsp;</th>
      <th>Total <br/>
        Number of <br/>
        Participants</th>
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
      <td class=fl>Large High Schools <br/>
        (55 Clubs/Teams) <br/>
        2400+ Students</td>
      <td><input type="text" id='LHfund' name"" size="4" onchange='calculateSchool("LH")'/></td>
      <td>x</td>
      <td><input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
      <td>x</td>
      <td><input type="text" id='LHpercent' name"" size="4" onchange='calculateSchool("LH")'/>
        %</td>
      <td id='LHactive'>=</td>
      <td></td>
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
      <td class=fl>Average High Schools <br/>
        (40 Clubs/Teams) <br/>
        855+ Students</td>
      <td><input type="text" id='AHfund' name"" size="4" onchange='calculateSchool("AH")'/></td>
      <td>x</td>
      <td><input type="text" id='AHpeople' name"" size="4" onchange='calculateSchool("AH")'/></td>
      <td>x</td>
      <td><input type="text" id='AHpercent' name"" size="4" onchange='calculateSchool("AH")'/>
        %</td>
      <td id='AHactive'>=</td>
      <td></td>
      <td>x</td>
      <td><input type="text" id='AHbaskets' name"" size="4" onchange='calculateSchool("AH")'/></td>
      <td>x</td>
      <td id='AHprice'>$26.00</td>
      <td>x</td>
      <td><input type="text" id='AHnumPerYear' name"" size="3" onchange='calculateSchool("AH")'/></td>
      <td>x</td>
      <td id='commission'>10%</td>
      <td>=</td>
      <td id='AHtotal'></td>
    </tr>
    <tr>
      <td class=fl>Large Middle Schools <br/>
        (40 Clubs/Teams) <br/>
        1855+ Students</td>
      <td><input type="text" id='LMfund' name"" size="4" onchange='calculateSchool("LM")'/></td>
      <td>x</td>
      <td><input type="text" id='LMpeople' name"" size="4" onchange='calculateSchool("LM")'/></td>
      <td>x</td>
      <td><input type="text" id='LMpercent' name"" size="4" onchange='calculateSchool("LM")'/>
        %</td>
      <td id='LMactive'>=</td>
      <td></td>
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
      <td class=fl>Avg Middle Schools <br/>
        (40 Clubs/Teams) <br/>
        650+ Students</td>
      <td><input type="text" id='AMfund' name"" size="4" onchange='calculateSchool("AM")'/></td>
      <td>x</td>
      <td><input type="text" id='AMpeople' name"" size="4" onchange='calculateSchool("AM")'/></td>
      <td>x</td>
      <td><input type="text" id='AMpercent' name"" size="4" onchange='calculateSchool("AM")'/>
        %</td>
      <td id='AMactive'>=</td>
      <td></td>
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
      <td colspan="15" class="fl">Total Commission From Schools</td>
      <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('LH')">Calculate</button></td>
      <td id='schoolTotal'></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
    <tr>
      <th>Churches</th>
      <th>Number of <br/>
        Church <br/>
        Fundraisers</th>
      <th>&nbsp;</th>
      <th>Number of <br/>
        Members</th>
      <th>&nbsp;</th>
      <th>Participating <br/>
        Percent of <br/>
        Members</th>
      <th>&nbsp;</th>
      <th>Total <br/>
        Number of <br/>
        Participants</th>
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
      <td class=fl>Large Churches <br/>
        (1000+ Members)</td>
      <td><input type="text" id='LCnum' name"" size="4" onchange='calculateChurch("LC")'/></td>
      <td>x</td>
      <td><input type="text" id='LCpeople' name"" size="4" onchange='calculateChurch("LC")'/></td>
      <td>x</td>
      <td><input type="text" id='LCpercent' name"" size="4" onchange='calculateChurch("LC")'/>
        %</td>
      <td id='LCactive'>=</td>
      <td></td>
      <td>x</td>
      <td><input type="text" id='LCbaskets' name"" size="4" onchange='calculateChurch("LC")'/></td>
      <td>x</td>
      <td id='LCprice'>$26.00</td>
      <td>x</td>
      <td><input type="text" id='LCnumPerYear' name"" size="3" onchange='calculateChurch("LC")'/></td>
      <td>x</td>
      <td id='commission'>10%</td>
      <td>=</td>
      <td id='LCtotal'></td>
    </tr>
    <tr>
      <td class=fl>Avg Churches <br/>
        (100-999 Members)</td>
      <td><input type="text" id='ACnum' name"" size="4" onchange='calculateChurch("AC")'/></td>
      <td>x</td>
      <td><input type="text" id='ACpeople' name"" size="4" onchange='calculateChurch("AC")'/></td>
      <td>x</td>
      <td><input type="text" id='ACpercent' name"" size="4" onchange='calculateChurch("AC")'/>
        %</td>
      <td id='ACactive'>=</td>
      <td></td>
      <td>x</td>
      <td><input type="text" id='ACbaskets' name"" size="4" onchange='calculateChurch("AC")'/></td>
      <td>x</td>
      <td id='ACprice'>$26.00</td>
      <td>x</td>
      <td><input type="text" id='ACnumPerYear' name"" size="3" onchange='calculateChurch("AC")'/></td>
      <td>x</td>
      <td id='commission'>10%</td>
      <td>=</td>
      <td id='ACtotal'></td>
    </tr>
    <tr>
      <td colspan="15" class="fl">Total Commission From Churches</td>
      <td colspan="2" class ="fl"><button type="button" onclick="calculateChurch('A')">Calculate</button></td>
      <td id='churchTotal'></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a elementary school and organization fundraisers showing math and total commission">
    <tr>
      <th>Schools and <br/>
        Organizations</th>
      <th>Number of <br/>
        Organization <br/>
        Fundraisers</th>
      <th scope="col">&nbsp;</th>
      <th>Number of <br/>
        Students/<br/>
        Members</th>
      <th scope="col">&nbsp;</th>
      <th>Participating <br/>
        Percent of <br/>
        Members</th>
      <th scope="col">&nbsp;</th>
      <th>Total <br/>
        Number of <br/>
        Participants</th>
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
      <td class=fl>Elementary Schools<br/>
        (PTO Others) <br/>
        500+</td>
      <td><input type="text" id='Efund' name"" size="4" onchange='calculateSchool("E")'/></td>
      <td>x</td>
      <td><input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
      <td>x</td>
      <td><input type="text" id='Epercent' name"" size="4" onchange='calculateSchool("E")'/>
        %</td>
      <td id='Eactive'>=</td>
      <td></td>
      <td>x</td>
      <td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
      <td>x</td>
      <td id='Eprice'>$26.00</td>
      <td>x</td>
      <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
      <td>x</td>
      <td id='commission'>10%</td>
      <td>=</td>
      <td id='Etotal'></td>
    </tr>
    <tr>
      <td class=fl>Organizations</td>
      <td><input type="text" id='Ofund' name"" size="4" onchange='calculateSchool("O")'/></td>
      <td>x</td>
      <td><input type="text" id='Opeople' name"" size="4" onchange='calculateSchool("O")'/></td>
      <td>x</td>
      <td><input type="text" id='Opercent' name"" size="4" onchange='calculateSchool("O")'/>
        %</td>
      <td id='Oactive'>=</td>
      <td></td>
      <td>x</td>
      <td><input type="text" id='Obaskets' name"" size="4" onchange='calculateSchool("O")'/></td>
      <td>x</td>
      <td id='Oprice'>$26.00</td>
      <td>x</td>
      <td><input type="text" id='OnumPerYear' name"" size="3" onchange='calculateSchool("O")'/></td>
      <td>x</td>
      <td id='commission'>10%</td>
      <td>=</td>
      <td id='Ototal'></td>
    </tr>
    <tr>
      <td colspan="15" class="fl">Total Commission From Schools and Organizations</td>
      <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('O')">Calculate</button></td>
      <td id='orgTotal'></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div id="redBar2">
    <p>Total Number of commissions from schools, churches and organizations : $</p>
    <div id="grandTotal"> </div>
  </div>
  <!--end redBar2--> 
  

</div>
<!--end tableWrapper-->
</body>
</html>
