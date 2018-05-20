<?php
	session_start();
	ob_start();
?>
<!--<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
		var fund = Number(document.getElementById("LHfund").value);
		var people = Number(document.getElementById("LHpeople").value);
		var percent = (Number(document.getElementById("LHpercent").value))/100;
		var active = people * percent;
		active = Number(active);
		document.getElementById("LHactive").innerHTML = active;
		var baskets = Number(document.getElementById("LHbaskets").value);
		var numPerYear = Number(document.getElementById("LHnumPerYear").value);
		var price = 26.00;
		var commission = 0.06;
		var total1 = fund * active * baskets * numPerYear * price * commission;
		var result1 = format(total1,2);
		grandTotal1 = result1;
		schoolTotal = result1;
		document.getElementById("LHtotal").innerHTML = result1;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").innerHTML = result1;
		
		//average high schools
		var fund2 = Number(document.getElementById("AHfund").value);
		var people2 = Number(document.getElementById("AHpeople").value);
		var percent2 = (Number(document.getElementById("AHpercent").value))/100;
		var active2 = people2 * percent2;
		active2 = Number(active2);
		document.getElementById("AHactive").innerHTML = active2;
		var baskets2 = Number(document.getElementById("AHbaskets").value);
		var numPerYear2 = Number(document.getElementById("AHnumPerYear").value);
		var total2 = fund2 * active2 * baskets2 * numPerYear2 * price * commission;
		var result2 =  format(total2,2);
		document.getElementById("AHtotal").innerHTML = result2;
		grandTotal1 += result2;
		schoolTotal += result2;
		schoolTotal = format(schoolTotal,2);
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		//large middle schools
		var fund3 = Number(document.getElementById("LMfund").value);
		var people3 = Number(document.getElementById("LMpeople").value);
		var percent3 = (Number(document.getElementById("LMpercent").value))/100;
		var active3 = people3 * percent3;
		active3 = Number(active3);
		document.getElementById("LMactive").innerHTML = active3;
		var baskets3 = Number(document.getElementById("LMbaskets").value);
		var numPerYear3 = Number(document.getElementById("LMnumPerYear").value);
		var total3 = fund3 * active3 * baskets3 * numPerYear3 * price * commission;
		var result3 =  format(total3,2);
		document.getElementById("LMtotal").innerHTML = result3;
		grandTotal1 += result3;
		schoolTotal += result3;
		schoolTotal = format(schoolTotal,2);
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		//average middle schools
		var fund4 = Number(document.getElementById("AMfund").value);
		var people4 = Number(document.getElementById("AMpeople").value);
		var percent4 = (Number(document.getElementById("AMpercent").value))/100;
		var active4 = people4 * percent4;
		active4 = Number(active4);
		document.getElementById("AMactive").innerHTML = active4;
		var baskets4 = Number(document.getElementById("AMbaskets").value);
		var numPerYear4 = Number(document.getElementById("AMnumPerYear").value);
		var total4 = fund4 * active4 * baskets4 * numPerYear4 * price * commission;
		var result4 =  format(total4,2);
		document.getElementById("AMtotal").innerHTML = result4;
		grandTotal1 += result4;
		schoolTotal += result4;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		//large churches
		var fund5 = Number(document.getElementById("LCnum").value);
		var people5 = Number(document.getElementById("LCpeople").value);
		var percent5 = (Number(document.getElementById("LCpercent").value))/100;
		var active5 = people5 * percent5;
		active5 = Number(active5);
		document.getElementById("LCactive").innerHTML = active5;
		var baskets5 = Number(document.getElementById("LCbaskets").value);
		var numPerYear5 = Number(document.getElementById("LCfundPerYear").value);
		var total5 = fund5 * active5* baskets5 * numPerYear5 * price * commission;
		var result5 =  format(total5,2);
		document.getElementById("LCtotal").innerHTML = result5;
		grandTotal1 += result5;
		churchTotal = result5;
		document.getElementById("churchTotal").innerHTML = churchTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		//average churches
		var fund6 = Number(document.getElementById("ACnum").value);
		var people6 = Number(document.getElementById("ACmembers").value);
		var percent6 = (Number(document.getElementById("ACpercent").value))/100;
		var active6 = people6 * percent6;
		active6 = Number(active6);
		document.getElementById("ACactive").innerHTML = active6;
		var baskets6 = Number(document.getElementById("ACbaskets").value);
		var numPerYear6 = Number(document.getElementById("ACfundPerYear").value);
		var total6 = fund6 * active6 * baskets6 * numPerYear6 * price * commission;
		var result6 =  format(total6,2);
		document.getElementById("ACtotal").innerHTML = result6;
		grandTotal1 += result6;
		churchTotal += result6;
		document.getElementById("churchTotal").innerHTML = churchTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		
		//elementary schools
		var fund7 = Number(document.getElementById("Efund").value);
		var people7 = Number(document.getElementById("Epeople").value);
		var percent7 = (Number(document.getElementById("Epercent").value))/100;
		var active7 = people7 * percent7;
		active7 = Number(active7);
		document.getElementById("Eactive").innerHTML = active7;
		var baskets7 = Number(document.getElementById("Ebaskets").value);
		var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
		var total7 = fund7 * active7 * baskets7 * numPerYear7 * price * commission;
		var result7 =  format(total7,2);
		grandTotal1 += result7;
		orgTotal = result7;
		document.getElementById("Etotal").innerHTML = result7;
		document.getElementById("orgTotal").innerHTML = orgTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;
		
		//organizations
		var fund8 = Number(document.getElementById("Ofund").value);
		var people8 = Number(document.getElementById("Opeople").value);
		var percent8 = (Number(document.getElementById("Opercent").value))/100;
		var active8 = people8 * percent8;
		active8 = Number(active8);
		document.getElementById("Oactive").innerHTML = active8;
		var baskets8 = Number(document.getElementById("Obaskets").value);
		var numPerYear8 = Number(document.getElementById("OnumPerYear").value);
		var total8 = fund8 * active8 * baskets8 * numPerYear8 * price * commission;
		var result8 =  format(total8,2);
		//document.getElementById("Etotal").innerHTML = result6;
		grandTotal1 += result8;
		orgTotal += result8;
		document.getElementById("Ototal").innerHTML = result8;
		document.getElementById("orgTotal").innerHTML = orgTotal;
		document.getElementById("grandTotal").innerHTML = grandTotal1;	
	}
	function format(num, dec) {
        return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
        }
	
</script>
</head>
<!--<style type="text/css">
#headerTop {
	background: no-repeat;
	background-position: right top;
	width: 1024px;
	height: 130px;
	padding: 0;
	margin: 0;
	position: relative;
	z-index: 3;
}
#content {
	position: relative;
	top: -50px;
	padding-bottom: 50px;
}
</style>-->
<body>
<div id="container">
<?php include 'header.php' ; ?>
<?php include 'leftSidebarNavRep.php' ; ?>
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
        <li>Enter the number of accounts that you think you can set up</li>
        <li>Enter the average number of students/members who will participate in the fundraiser</li>
        <li>The number of members participating is totaled for you</li>
        <li>Enter the average number of gift baskets participants will sell</li>
        <li>Multiply by $26, the aveage wholesale price of a basket</li>
        <li>Enter the average number of fundraisers each account will setup in one year, 3 is a good average &#8212; Holiday/Christmas, Valentine's Day, Easter, Mother's Day, Father's Day</li>
        <li>Multiply by your commission percentage &#8212; 10%</li>
      </ul>
    </div>
    <!--end infoText--> 
    <img id="leadInImg" src="../images/calculatorimage.png" width="340" height="205"><!--leadin image--> 
  </div>
  <!--end leadBox--> 




<div id="tableWrapper">
  <div class="tableHeader">
  <h3>Calculator Example of a Church</h3>
  </div>
  <div class="calcTable">
  <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows an example of how the calculator works for a church fundraiser showing math and total commission">
  <tr>
    <th scope="col">Churches</th>
    <th scope="col">Number of <br/>
    Churches</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Number of <br/>
    Members</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Participating % <br/>
    of Members</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Number of Participants</th>
    <th scope="col">&nbsp;</th>
        <th scope="col">Gift Baskets Sold <br/>
    Per Participant</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">$26 Average <br/>
    Wholesale Price</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Fundraisers <br/>
    Per Year</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Commission</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Your <br/>
    Earnings</th>
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
</div><!--end calcTable-->

  <p>&nbsp;</p>
  <p>&nbsp; </p>

  <div class="tableHeader">
  <h3 class="tableHeader">Try Our Calculator!</h3>
  </div><!--end tableHeader-->

  <div class="calcTable">
    <table class="calculatorTable">
    <tr>
      <th>Secondary Schools</th>
      <th># of School Fundraisers</th>
      <th># of Enrolled</th>
      <th>% Participating</th>
      <th>No. Students on Clubs/Teams</th>
      <th>Gift Baskets Sold</th>
      <th>$26 Avg Whsle Price</th>
      <th>Fundraisers Per Year</th>
      <th>Commission</th>
      <th>Your Total Commission</th>
    </tr>
    <tr>
      <td class=fl>Large High Schools (55 Clubs/Teams) 2400+ Students</td>
      <td><input type="text" id='LHfund' name"" size="5" onchange='calculateSchool("LH")'/>
        </td>
      <td>
        <input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
      <td>
        <input type="text" id='LHpercent' name"" size="5" onchange='calculateSchool("LH")'/></td>
      <td id='LHactive'></td>
      <td>
        <input type="text" id='LHbaskets' name"" size="4" onchange='calculateSchool("LH")'/></td>
      <td id='LHprice'> x$26.00</td>
      <td>
        <input type="text" id='LHnumPerYear' name"" size="5" onchange='calculateSchool("LH")'/></td>
      <td id='commision'><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='LHtotal'></td>
    </tr>
    <tr>
      <td class=fl>Average High Schools (40 Clubs/Teams) 855+ Students</td>
      <td><input type="text" id='AHfund' name"" size="5" onchange='calculateSchool("AH")'/>
        </td>
      <td>
        <input type="text" id='AHpeople' name"" size="4" onchange='calculateSchool("AH")'/></td>
      <td>
        <input type="text" id='AHpercent' name"" size="5" onchange='calculateSchool("AH")'/></td>
      <td id='AHactive'></td>
      <td>
        <input type="text" id='AHbaskets' name"" size="4" onchange='calculateSchool("AH")'/></td>
      <td> x&nbsp;$26.00</td>
      <td>
        <input type="text" id='AHnumPerYear' name"" size="5" onchange='calculateSchool("AH")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='AHtotal'></td>
    </tr>
    <tr>
      <td class=fl>Large Middle Schools (55 Clubs/Teams) 1855+ Students</td>
      <td><input type="text" id='LMfund' name"" size="5" onchange='calculateSchool("LM")'/>
        </td>
      <td>
        <input type="text" id='LMpeople' name"" size="4" onchange='calculateSchool("LM")'/></td>
      <td>
        <input type="text" id='LMpercent' name"" size="5" onchange='calculateSchool("LM")'/></td>
      <td id='LMactive'></td>
      <td>
        <input type="text" id='LMbaskets' name"" size="4" onchange='calculateSchool("LM")'/></td>
      <td> x&nbsp;$26.00</td>
      <td>
        <input type="text" id='LMnumPerYear' name"" size="5" onchange='calculateSchool("LM")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='LMtotal'></td>
    </tr>
    <tr>
      <td class=fl>Avg Middle Schools (40 Clubs/Teams) 650+ Students</td>
      <td><input type="text" id='AMfund' name"" size="5" onchange='calculateSchool("AM")'/>
        </td>
      <td>
        <input type="text" id='AMpeople' name"" size="4" onchange='calculateSchool("AM")'/></td>
      <td>
        <input type="text" id='AMpercent' name"" size="5" onchange='calculateSchool("AM")'/></td>
      <td id='AMactive'></td>
      <td>
        <input type="text" id='AMbaskets' name"" size="4" onchange='calculateSchool("AM")'/></td>
      <td> x&nbsp;$26.00</td>
      <td>
        <input type="text" id='AMnumPerYear' name"" size="5" onchange='calculateSchool("AM")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='AMtotal'></td>
    </tr>
    <tr>
      <td class=fl>Total Commissions From Schools</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="border:1px solid #cc0000;" id='schoolTotal'></td>
    </tr>
  </table>
  </div><!--end calcTable-->

  
  <div class="calcTable">
  <table class="calculatorTable">
    <tr>
      <th>Churches</th>
      <th># of Churches</th>
      <th># of Members</th>
      <th>% Participating</th>
      <th>Numer of Members</th>
      <th>Gift Baskets Sold</th>
      <th>$26 Avg Wholesale Price</th>
      <th>Fundraisers Per Year</th>
      <th>10% Commission</th>
      <th>Your Total Commission</th>
    </tr>
    <tr>
      <td>Large Churches (1000+ Members) </td>
      <td><input type="text" id='LCnum' name"" size="5" onchange='calculateSchool("LC")'/></td>
       <td>
        <input type="text" id='LCpeople' name"" size="5" onchange='calculateSchool("LC")'/></td>
      
      <td>
        <input type="text" id='LCpercent' name"" size="5" onchange='calculateSchool("LC")'/></td>
        <td id='LCactive'></td>
      <td>
        <input type="text" id='LCbaskets' name"" size="5" onchange='calculateSchool("LC")'/></td>
      <td>x $26.00</td>
      <td>
        <input type="text" id='LCfundPerYear' name"" size="5" onchange='calculateSchool("LC")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='LCtotal'> </td>
    </tr>
    <tr>
      <td>Avg Churches (100-999 Members)</td>
      <td><input type="text" id='ACnum' name"" size="5" onchange='calculateSchool("AC")'/></td>
      <td>
        <input type="text" id='ACmembers' name"" size="5" onchange='calculateSchool("AC")'/></td>
      <td>
        <input type="text" id='ACpercent' name"" size="5" onchange='calculateSchool("AC")'/></td>
        <td id="ACactive"></td>
      <td>
        <input type="text" id='ACbaskets' name"" size="5" onchange='calculateSchool("AC")'/></td>
      <td>x $26.00</td>
      <td>
        <input type="text" id='ACfundPerYear' name"" size="5" onchange='calculateSchool("AC")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='ACtotal'> </td>
    </tr>
    <tr>
      <td>Total Commissions From Churches</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="border: 1px solid #cc0000;" id='churchTotal'></td>
    <tr/>
  </table>
  </div><!--end calcTable-->





  <div class="tableHeader">
  <h3 class="tableHeader">Calculator Example of a Church</h3>
  </div><!--end tableHeader-->
  <table class="calculatorTable">
    <tr>
      <th>Secondary Schools</th>
      <th># of School Fundraisers</th>
      <th># of Enrolled</th>
      <th>% Participating</th>
      <th>No. Students on Clubs/Teams</th>
      <th>Gift Baskets Sold</th>
      <th>$26 Avg Whsle Price</th>
      <th>Fundraisers Per Year</th>
      <th>Commission</th>
      <th>Your Total Commission</th>
    </tr>
    <tr>
      <td>Elementary Schools(PTO Others) 500+</td>
      <td><input type="text" id='Efund' name"" size="5" onchange='calculateSchool("E")'/></td>
      <td>
        <input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
      <td>
        <input type="text" id='Epercent' name"" size="5" onchange='calculateSchool("E")'/></td>
      <td id='Eactive'></td>
      <td>
        <input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
      <td> x$26.00</td>
      <td>
        <input type="text" id='EnumPerYear' name"" size="5" onchange='calculateSchool("E")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='Etotal'></td>
    </tr>
    <tr>
      <td>Organizations</td>
      <td><input type="text" id='Ofund' name"" size="5" onchange='calculateSchool("O")'/></td>
      <td>
        <input type="text" id='Opeople' name"" size="4" onchange='calculateSchool("O")'/></td>
      <td>
        <input type="text" id='Opercent' name"" size="5" onchange='calculateSchool("O")'/></td>
      <td id='Oactive'></td>
      <td>
        <input type="text" id='Obaskets' name"" size="4" onchange='calculateSchool("O")'/></td>
      <td> x&nbsp;$26.00</td>
      <td>
        <input type="text" id='OnumPerYear' name"" size="5" onchange='calculateSchool("O")'/></td>
      <td><b>x&nbsp;10% &nbsp;=</b></td>
      <td id='Ototal'></td>
    </tr>
    <tr>
      <td>Total Commissions From Schools</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td id='orgTotal' style="border:1px solid #cc0000;"></td>
    </tr>
  </table>
  
</div>
<!--end tableWrapper-->
<div id="redBar2">
  <p>Total Number of commissions from schools, churches and organizations : $</p>
    <!--<input type="text" id="grandTotal" />-->
    &nbsp;&nbsp;<p><span id="grandTotal" style="color: #fff;"></span></p>
  </div>
  <!--end redBar2-->
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