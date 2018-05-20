<?php
	session_start();

	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Income Calculator</title>
<style>
@media screen and (max-width:736px){
#scroll{
overflow-x:scroll;
}
}
</style>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
  <!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
    <h1>Calculate Your $uccess</h1>
    <h3>Find Out How Much You Can Raise by Using Our Fundraising Calculator</h3>
    
    	<h5>The calculator is simple to use:</h5>
	<ul class="bulletedlist">
          <li>Enter the number of Students or Members in your School or Organization</li>
          <li>Enter the percentage of Students or Members you believe will participate, ie: 33 (same as 33% or .33)</li>
          <li>Enter the average number of Products and Gifts each of your Students or Members will sell for each fundraiser</li>
          <li>Multiplied by $35 (The average retail price of each product purchased)</li>
          <li>Enter the number of fundraisers per year<br>(Most people do 3 or 4 fundraisers a year with our program. Generally it begins in midsummer for the Winter holidays (Thanksgiving & Christmas) and continues after the first of the year for Valentine's Day, Easter, Mother's Day, Graduation and Father's Day)</li>
          <li>Each Club, Team or Organization then receives 35% of each Product of Gift sold</li>
	</ul>
      <h3 class="tableHeader">Try Our Calculator!</h3>
    <div id="tableWrapper">
	<div id="scroll">
      <table>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total earnings">
        <tr>
          <th class="calcCategoryHead">Your Fundraiser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Number of<br>Students/Members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Percentage of<br>Students/Members<br>Participating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Products & Gifts<br>Sold Per<br>Student/Member&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>$35 Avg.<br>Retail Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Fundraisers<br>Per Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Percent to<br>Your Fundraiser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th>Total<br>Amount Raised&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>

        <tr>
          <td class="fl">Your Fundraiser<br/>
            </td>
          <!--<td><input type="text" id='Enum' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Efund' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>-->
          <td><input type="text" id='Epeople' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epercent' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$35.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="5" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>35%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr class="extrapadding">
          <td colspan="12" class="fl"></td>
		<td></td>
          <td colspan="1" class ="fl"><br><button type="button" class="medredbutton" onclick="calculateSchool('LH')">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
	</table>
	</div>
	</div>
    </div><!--end column1-->
        <div class="col-md-5 col-md-offset-1" id="" style="margin-top: 2em;">	
    	    <div class="row" style="margin-top: 2em;">
                <div class="col-md-12">
      	<img class="img-responsive center-block" src="../images/rep-pages/calculatorimage.png" width="404" height="270" alt="Women Writing Calculations">
	</div>
	</div>
    </div><!--end column2-->	
    <!--end redBar2--> 
    </div>    <!--end tableWrapper--> 
  </div>  <!--end content-->
</div><!--end container-->
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>