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
	
	function calculateSchool(orgType) {
	        var price = 35; 
	        var commission = .35;
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
		var total7 = fund7 * baskets7 * numPerYear7 * price * commission * num7 * active7;
		var result7 =  format(total7,2);
		document.getElementById("Etotal").innerHTML = result7;			
	}
	function format(num, dec) {
        return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
        }
	
</script>
</head>

<body>
<div id="container">
  <?php include 'header.inc.php' ; ?>
  <?php include 'leftSidebarNavHomepage.php' ; ?>
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
          <li>Multiply by $35, the average retail price of a basket</li>
          <li>Enter the average number of fundraisers each account will setup in one year, 3 is a good average &#8212; Holiday/Christmas, Valentine's Day, Easter, Mother's Day, Father's Day</li>
          <li>Multiply by your commission percentage &#8212; 35%</li>
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
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>