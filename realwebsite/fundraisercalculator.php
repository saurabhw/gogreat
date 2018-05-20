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
<link href="../css/newheaderstylesample.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function calculateSchool(orgType) {
	        var people = Number(document.getElementById("LHpeople").value);
		var percent = (Number(document.getElementById("LHpercent").value))/100;
		var active = people * percent;
		active = Number(active);
		var baskets = Number(document.getElementById("LHbaskets").value);
		var numPerYear = Number(document.getElementById("LHnumPerYear").value);
		var price = 35.00;
		var commission = 0.35;
		var total = active * baskets * numPerYear * price * commission;
		var result = format(total,2);
		document.getElementById("LHtotal").innerHTML = result;
		document.getElementById("grandTotal").value = result;	
	}
	function format(num, dec) {
        return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
        }
	
</script>
</head>

<body>
  <?php include 'newheader.php' ; ?>
  <?php include 'sidenavsample.php' ; ?>
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
          <li>Enter the number of Students in your organization</li>
          <li>Enter the percentage of students/members who might participate in the fundraiser</li>
          <li>Enter the average number of gift baskets each participant will sell</li>
          <li>Multiply by $35, the average retail price of a basket</li>
          <li>Enter number of fundraisers you will hold with us; Holiday/Christmas, Valentine's Day, Easter, Mother's Day, Father's Day</li>
          <li>Multiply by the 35% that you receive!</li>
        </ul>
      </div>
      <!--end infoText--> 
      <img id="leadInImg" src="../images/calculatorimage.png" width="340" height="205"> 
      <!--leadin image--> 
      </div>
    <!--end leadBox-->
    
    <div id="tableWrapper">
      
      <h3 class="tableHeader">Try Our Calculator!</h3>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Schools</th>
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
          <td class="fl">Your Group<br/>
            </td>
          
          <td><input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpercent' name"" size="4" onchange='calculateSchool("LH")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LHbaskets' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='LHprice'>$35.00</td>
          <td>x</td>
          <td><input type="text" id='LHnumPerYear' name"" size="3" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='commission'>35%</td>
          <td>=</td>
          <td id='LHtotal'></td>
        </tr>
        <tr>
          
        <tr>
          <td colspan="11" class="fl"></td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('O')">Calculate</button></td>
          <td id='orgTotal'>&nbsp;</td>
        </tr>
      </table>
      <div id="redBar2">
        <table "width="100%" border="0" cellspacing="0" cellpadding="3" summary="Table shows grand total commissions from schools, churches and organizations">
          <tr>
            <th width="70%" class="gTotal">Total Money Raised! </th>
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
  <?php include 'footer_samplewebsites.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>