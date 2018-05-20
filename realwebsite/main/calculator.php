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
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
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
		var price = 35.00;
		var commission = 0.35;
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
  <?php include 'header.php' ; ?>
  <?php include 'sidenav.php' ; ?>
  <div id="content">
    <h1>Income Calculator</h1>
    <h3>See How Much You Can Make Using Our Earning Potential Calculator Below </h3>
    <div id="column1">
    	<h5>The calculator is simple to use:</h5>
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
    </div><!--end column1-->
    <div id="column2">
      	<img src="../images/rep-pages/calculatorimage.png" width="404" height="270" alt="Women Writing Calculations">
      	<img class="imgLeft" src="../images/rep-pages/mouse.png" width="198" height="166" alt="Computer Mouse">
	<img class="imgRight" src="../images/rep-pages/keyboard.png" width="198" height="166" alt="Computer Keyboard"> 
      <!--leadin image--> 
    </div><!--end column2-->
    
    <div id="tableWrapper">
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
          <th>$35 Avg. <br/>
            Retail <br/>
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
            </td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$35.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>35%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr>
          <td colspan="15" class="fl">Total Commission From Schools</td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('LH')">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
      
       
      </div>
      <!--end redBar2--> 
      
    </div>
    <!--end tableWrapper--> 
    
  </div>
  <!--end content-->
  <?php include '../footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>