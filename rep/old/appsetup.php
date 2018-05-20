<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

<!DOCTYPE HTML>
<title>Online Application</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link href="../css/applicationstyles.css" rel="stylesheet" type="text/css" />
<link href="../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	var LHtotal;
	var LMtotal;
	var schoolTotal;
	var churchTotal;
	var grandTotal1;
	function calculateSchool(orgType) {
	        //high schools
	        var num = Number(document.getElementById("LHnum").value);
		var fund = Number(document.getElementById("LHfund").value);
		var people = Number(document.getElementById("LHpeople").value);
		var percent = (Number(document.getElementById("LHpercent").value))/100;
		var active = people * percent;
		active = Number(active);
		//document.getElementById("LHactive").innerHTML = active;
		var baskets = Number(document.getElementById("LHbaskets").value);
		var numPerYear = Number(document.getElementById("LHnumPerYear").value);
		var price = 23.40;
		var commission = 0.08;
		var total1 = fund * active * baskets * numPerYear * price * commission * num;
		var result1 = format(total1,2);
		grandTotal1 = result1;
		schoolTotal = result1;
		document.getElementById("LHtotal").innerHTML = result1;
		document.getElementById("schoolTotal").innerHTML = schoolTotal;
		document.getElementById("grandTotal").value = grandTotal1;
		
		//middle schools
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
		
		//churches
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

<body>

<div id="container">
	<?php include '../rep/header.inc.php'; ?>
	<?php include '../rep/leftSidebarNavRep.php'; ?>
	<div id="content">
		<h1>Online Application</h1>
		<h3>Fill In The Potential Income Calculator</h3>
		<div id="column1">
		<h5>The calculator is simple to use:</h5>
	        <ul>
	          <li>Enter the number of accounts you think you can set up</li>
	          <li>Enter the number of groups in each organization that might participate in the fundraiser</li>
	          <li>Enter the total number of students or members in the organization</li>
	          <li>Enter the percentage of students or members who might participate in the fundraiser</li>
	          <li>Enter the average number of gift baskets each participant will sell</li>
	          <li>Multiplied by $23.40 (Average wholesale price of a basket)</li>
	          <li>Enter the average number of fundraisers each account will setup in one year (Most fundraisers sell 3 or 4 times a year with our program.)</li>
	          <li>Multiplied by your commission percentage &#8212; 8%</li>
	        </ul>
	    	</div><!--end column1-->
    
	    <div id="column2">
	      	<img src="../images/rep-pages/calculatorimage.png" width="404" height="270" alt="Women Writing Calculations">
	    </div> <!--end column2-->
    
    <div id="tableWrapper">
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Schools</th>
          <th>Number of<br>Schools</th>
          <th scope="col">&nbsp;</th>
          <th>Number of<br>Clubs, Teams<br>and Groups</th>
          <th scope="col">&nbsp;</th>
          <th>Number of<br>Students</th>
          <th scope="col">&nbsp;</th>
          <th>Participating<br>Percent of<br>Students</th>
          <th scope="col">&nbsp;</th>
          <th>Gift<br>Baskets<br>Sold Per<br>Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$23.40 Avg.<br>Wholesale <br>Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers<br>Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent<br>Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total<br>Commission</th>
        </tr>
        <tr>
          <td class="fl">High Schools</td>
          <td><input type="text" id='LHnum' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHfund' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpeople' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHpercent' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td><input type="text" id='LHbaskets' name"" size="4" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='LHprice'>$23.40</td>
          <td>x</td>
          <td><input type="text" id='LHnumPerYear' name"" size="3" onchange='calculateSchool("LH")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LHtotal'></td>
        </tr>

        <tr>
          <td class="fl">Middle Schools</td>
          <td><input type="text" id='LMnum' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMfund' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpeople' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td><input type="text" id='LMpercent' name"" size="4" onchange='calculateSchool("LM")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LMbaskets' name"" size="4" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='LMprice'>$23.40</td>
          <td>x</td>
          <td><input type="text" id='LMnumPerYear' name"" size="3" onchange='calculateSchool("LM")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LMtotal'></td>
        </tr>
        
        <tr>
          <td class="fl">Elementary Schools</td>
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
          <td id='Eprice'>$23.40</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>8%</td>
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
          <th>Number of<br>Churches</th>
          <th>&nbsp;</th>
          <th>Number of <br/>Ministries, <br>            Groups <br/>            and Events</th>
          <th>&nbsp;</th>
          <th>Number of <br/>            Members</th>
          <th>&nbsp;</th>
          <th>Participating <br/>            Percent of <br/>            Members</th>
          <th>&nbsp;</th>
          <th>Gift <br/>            Baskets <br/>            Sold Per <br/>            Participant</th>
          <th>&nbsp;</th>
          <th>$23.40 Avg. <br/>            Wholesale <br/>            Price</th>
          <th>&nbsp;</th>
          <th>Fundraisers <br/>            Per Year</th>
          <th>&nbsp;</th>
          <th>Percent <br/>            Commission</th>
          <th>&nbsp;</th>
          <th>Total<br/>            Commission</th>
        </tr>
        <tr>
          <td class="fl">Churches</td>
          <td><input type="text" id='LCnum' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCfund' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpeople' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td><input type="text" id='LCpercent' name"" size="4" onchange='calculateSchool("LC")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='LCbaskets' name"" size="4" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='LCprice'>$23.40</td>
          <td>x</td>
          <td><input type="text" id='LCnumPerYear' name"" size="3" onchange='calculateSchool("LC")'/></td>
          <td>x</td>
          <td id='commission'>8%</td>
          <td>=</td>
          <td id='LCtotal'>&nbsp;</td>
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
          <th>Number of <br/>            Organizations</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>            Groups <br/>            and Events</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>            Members</th>
          <th scope="col">&nbsp;</th>

          <th>Participating <br/>            Percent of <br/>            Members</th>
          <th scope="col">&nbsp;</th>
          <th>Gift <br/>            Baskets <br/>            Sold Per <br/>            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$23.40 Avg. <br/>            Wholesale <br/>            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br/>            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent <br/>            Commission</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br/>            Commission</th>
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
            </td>

          <td>x</td>
          <td><input type="text" id='Obaskets' name"" size="4" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='Oprice'>$23.40</td>
          <td>x</td>
          <td><input type="text" id='OnumPerYear' name"" size="3" onchange='calculateSchool("O")'/></td>
          <td>x</td>
          <td id='commission2'>8%</td>
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
      </div> <!--end redBar2--> 
    
      	<h3>Fill In Your Potential Prospects</h3>
      	<p>Required fields are marked with <span class="required">*</span></p>
      	
        <form id="application" action="" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this)">
		<div id="clear">
			<label for="fundtype">
				<span>Fundraising Type</span>
		            	<select id="fundtype" name="fundtype">
		                <option value="">-- Select Type --</option>
		                <option>High Schools</option>
		                <option>Middle Schools</option>
		                <option>Elementary Schools</option>
		                <option>Religious Organizations</option>
		                <option>Community Organizations</option>
		                <option>Youth & Sports</option>
		                <option>Local & National Charities</option>
		                <option>Causes</option>
		              </select>
			</label>
			<label id="groupname" for="groupname">
		            	<span>Group Name</span>
		            	<input id="groupname" type="text" name="groupname" maxlength="40" />
			</label>
			<label id="websiteURL" for="websiteURL">
		              <span>URL of the Existing Website</span>
		              <input id="websiteURL" name="websiteURL" type="text" maxlength="50" />
			</label>
		</div> <!--end line 1-->
            	
            <div id="clear">	
	            <label id="address1" for="address1">
		            <span>Address 1</span>
		            <input id="address1" type="text" name="address1" maxlength="50"/>
	            </label>
	            <label id="address2" for="address2">
		            <span>Address 2</span>
		            <input id="address2" type="text" name="address2" maxlength="50"/>
	            </label>
	            <label for="city">
		            <span>City</span>
		            <input id="city" type="text" maxlength="30" name="city"/>
	            </label>
	            <label id="stateD" for="stateD">
		            <span>State</span>
		            <select id="stateD" name="stateD">
		                <option value="">-- Select State --</option>
		                <option value="AL">Alabama</option>
		                <option value="AK">Alaska</option>
		                <option value="AZ">Arizona</option>
		                <option value="AR">Arkansas</option>
		                <option value="CA">California</option>
		                <option value="CO">Colorado</option>
		                <option value="CT">Connecticut</option>
		                <option value="DE">Delaware</option>
		                <option value="FL">Florida</option>
		                <option value="GA">Georgia</option>
		                <option value="HI">Hawaii</option>
		                <option value="ID">Idaho</option>
		                <option value="IL">Illinois</option>
		                <option value="IN">Indiana</option>
		                <option value="IA">Iowa</option>
		                <option value="KS">Kansas</option>
		                <option value="KY">Kentucky</option>
		                <option value="LA">Louisiana</option>
		                <option value="ME">Maine</option>
		                <option value="MD">Maryland</option>
		                <option value="MA">Massachusetts</option>
		                <option value="MI">Michigan</option>
		                <option value="MN">Minnesota</option>
		                <option value="MS">Mississippi</option>
		                <option value="MO">Missouri</option>
		                <option value="MT">Montana</option>
		                <option value="NE">Nebraska</option>
		                <option value="NV">Nevada</option>
		                <option value="NH">New Hampshire</option>
		                <option value="NJ">New Jersey</option>
		                <option value="NM">New Mexico</option>
		                <option value="NY">New York</option>
		                <option value="NC">North Carolina</option>
		                <option value="ND">North Dakota</option>
		                <option value="OH">Ohio</option>
		                <option value="OK">Oklahoma</option>
		                <option value="OR">Oregon</option>
		                <option value="PA">Pennsylvania</option>
		                <option value="RI">Rhode Island</option>
		                <option value="SC">South Carolina</option>
		                <option value="SD">South Dakota</option>
		                <option value="TN">Tennessee</option>
		                <option value="TX">Texas</option>
		                <option value="UT">Utah</option>
		                <option value="VT">Vermont</option>
		                <option value="VA">Virginia</option>
		                <option value="WA">Washington</option>
		                <option value="WV">West Virginia</option>
		                <option value="WI">Wisconsin</option>
		                <option value="WY">Wyoming</option>
		              </select>
	              </label>
	              <label for="zip">
		              <span>ZIP</span>
		              <input id="zip" name="zip" type="text" maxlength="10" size="8" />
	              </label>
              </div> <!--end line 2-->
	</form>   
	        <form id="application" action="" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this)">
		<div id="clear">
			<label for="fundtype">
				<span>Fundraising Type</span>
		            	<select id="fundtype" name="fundtype">
		                <option value="">-- Select Type --</option>
		                <option>High Schools</option>
		                <option>Middle Schools</option>
		                <option>Elementary Schools</option>
		                <option>Religious Organizations</option>
		                <option>Community Organizations</option>
		                <option>Youth & Sports</option>
		                <option>Local & National Charities</option>
		                <option>Causes</option>
		              </select>
			</label>
			<label id="groupname" for="groupname">
		            	<span>Group Name</span>
		            	<input id="groupname" type="text" name="groupname" maxlength="40" />
			</label>
			<label id="websiteURL" for="websiteURL">
		              <span>URL of the Existing Website</span>
		              <input id="websiteURL" name="websiteURL" type="text" maxlength="50" />
			</label>
		</div> <!--end line 1-->
            	
            <div id="clear">	
	            <label id="address1" for="address1">
		            <span>Address 1</span>
		            <input id="address1" type="text" name="address1" maxlength="50"/>
	            </label>
	            <label id="address2" for="address2">
		            <span>Address 2</span>
		            <input id="address2" type="text" name="address2" maxlength="50"/>
	            </label>
	            <label for="city">
		            <span>City</span>
		            <input id="city" type="text" maxlength="30" name="city"/>
	            </label>
	            <label id="stateD" for="stateD">
		            <span>State</span>
		            <select id="stateD" name="stateD">
		                <option value="">-- Select State --</option>
		                <option value="AL">Alabama</option>
		                <option value="AK">Alaska</option>
		                <option value="AZ">Arizona</option>
		                <option value="AR">Arkansas</option>
		                <option value="CA">California</option>
		                <option value="CO">Colorado</option>
		                <option value="CT">Connecticut</option>
		                <option value="DE">Delaware</option>
		                <option value="FL">Florida</option>
		                <option value="GA">Georgia</option>
		                <option value="HI">Hawaii</option>
		                <option value="ID">Idaho</option>
		                <option value="IL">Illinois</option>
		                <option value="IN">Indiana</option>
		                <option value="IA">Iowa</option>
		                <option value="KS">Kansas</option>
		                <option value="KY">Kentucky</option>
		                <option value="LA">Louisiana</option>
		                <option value="ME">Maine</option>
		                <option value="MD">Maryland</option>
		                <option value="MA">Massachusetts</option>
		                <option value="MI">Michigan</option>
		                <option value="MN">Minnesota</option>
		                <option value="MS">Mississippi</option>
		                <option value="MO">Missouri</option>
		                <option value="MT">Montana</option>
		                <option value="NE">Nebraska</option>
		                <option value="NV">Nevada</option>
		                <option value="NH">New Hampshire</option>
		                <option value="NJ">New Jersey</option>
		                <option value="NM">New Mexico</option>
		                <option value="NY">New York</option>
		                <option value="NC">North Carolina</option>
		                <option value="ND">North Dakota</option>
		                <option value="OH">Ohio</option>
		                <option value="OK">Oklahoma</option>
		                <option value="OR">Oregon</option>
		                <option value="PA">Pennsylvania</option>
		                <option value="RI">Rhode Island</option>
		                <option value="SC">South Carolina</option>
		                <option value="SD">South Dakota</option>
		                <option value="TN">Tennessee</option>
		                <option value="TX">Texas</option>
		                <option value="UT">Utah</option>
		                <option value="VT">Vermont</option>
		                <option value="VA">Virginia</option>
		                <option value="WA">Washington</option>
		                <option value="WV">West Virginia</option>
		                <option value="WI">Wisconsin</option>
		                <option value="WY">Wyoming</option>
		              </select>
	              </label>
	              <label for="zip">
		              <span>ZIP</span>
		              <input id="zip" name="zip" type="text" maxlength="10" size="8" />
	              </label>
              </div> <!--end line 2-->
	</form>  
	        <form id="application" action="" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this)">
		<div id="clear">
			<label for="fundtype">
				<span>Fundraising Type</span>
		            	<select id="fundtype" name="fundtype">
		                <option value="">-- Select Type --</option>
		                <option>High Schools</option>
		                <option>Middle Schools</option>
		                <option>Elementary Schools</option>
		                <option>Religious Organizations</option>
		                <option>Community Organizations</option>
		                <option>Youth & Sports</option>
		                <option>Local & National Charities</option>
		                <option>Causes</option>
		              </select>
			</label>
			<label id="groupname" for="groupname">
		            	<span>Group Name</span>
		            	<input id="groupname" type="text" name="groupname" maxlength="40" />
			</label>
			<label id="websiteURL" for="websiteURL">
		              <span>URL of the Existing Website</span>
		              <input id="websiteURL" name="websiteURL" type="text" maxlength="50" />
			</label>
		</div> <!--end line 1-->
            	
            <div id="clear">	
	            <label id="address1" for="address1">
		            <span>Address 1</span>
		            <input id="address1" type="text" name="address1" maxlength="50"/>
	            </label>
	            <label id="address2" for="address2">
		            <span>Address 2</span>
		            <input id="address2" type="text" name="address2" maxlength="50"/>
	            </label>
	            <label for="city">
		            <span>City</span>
		            <input id="city" type="text" maxlength="30" name="city"/>
	            </label>
	            <label id="stateD" for="stateD">
		            <span>State</span>
		            <select id="stateD" name="stateD">
		                <option value="">-- Select State --</option>
		                <option value="AL">Alabama</option>
		                <option value="AK">Alaska</option>
		                <option value="AZ">Arizona</option>
		                <option value="AR">Arkansas</option>
		                <option value="CA">California</option>
		                <option value="CO">Colorado</option>
		                <option value="CT">Connecticut</option>
		                <option value="DE">Delaware</option>
		                <option value="FL">Florida</option>
		                <option value="GA">Georgia</option>
		                <option value="HI">Hawaii</option>
		                <option value="ID">Idaho</option>
		                <option value="IL">Illinois</option>
		                <option value="IN">Indiana</option>
		                <option value="IA">Iowa</option>
		                <option value="KS">Kansas</option>
		                <option value="KY">Kentucky</option>
		                <option value="LA">Louisiana</option>
		                <option value="ME">Maine</option>
		                <option value="MD">Maryland</option>
		                <option value="MA">Massachusetts</option>
		                <option value="MI">Michigan</option>
		                <option value="MN">Minnesota</option>
		                <option value="MS">Mississippi</option>
		                <option value="MO">Missouri</option>
		                <option value="MT">Montana</option>
		                <option value="NE">Nebraska</option>
		                <option value="NV">Nevada</option>
		                <option value="NH">New Hampshire</option>
		                <option value="NJ">New Jersey</option>
		                <option value="NM">New Mexico</option>
		                <option value="NY">New York</option>
		                <option value="NC">North Carolina</option>
		                <option value="ND">North Dakota</option>
		                <option value="OH">Ohio</option>
		                <option value="OK">Oklahoma</option>
		                <option value="OR">Oregon</option>
		                <option value="PA">Pennsylvania</option>
		                <option value="RI">Rhode Island</option>
		                <option value="SC">South Carolina</option>
		                <option value="SD">South Dakota</option>
		                <option value="TN">Tennessee</option>
		                <option value="TX">Texas</option>
		                <option value="UT">Utah</option>
		                <option value="VT">Vermont</option>
		                <option value="VA">Virginia</option>
		                <option value="WA">Washington</option>
		                <option value="WV">West Virginia</option>
		                <option value="WI">Wisconsin</option>
		                <option value="WY">Wyoming</option>
		              </select>
	              </label>
	              <label for="zip">
		              <span>ZIP</span>
		              <input id="zip" name="zip" type="text" maxlength="10" size="8" />
	              </label>
              </div> <!--end line 2-->
	</form>  
    	<br>
	     <p id="previous"><a href="../rep/appstart.php"><< Previous Step</a></p>  
             <p id="next"><a href="../rep/appsubmit.php">Next Step >></a></p>  
   
	</div> <!--end tableWrapper--> 
		
	</div> <!--end content-->
	
<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>