<?PHP
session_start();
?>
<script language="javascript">
	var numbers; // number of organization fundraisers
	var members; // number of members in organization
	var percent; // percent of members who will participate
	var baskets; // number of baskets sold per fundraiser
	var price = 26.0; // price of basket
	var fundraisers; // number of fundraisers per year
	var commision = 0.10;
	var total;
	var grandTotal;
	function calculate(orgType) {
		numbers = parseFloat(document.getElementById(orgType + "number").value);
		members = parseFloat(document.getElementById(orgType + "members").value);
		percent = parseFloat(document.getElementById(orgType + "percent").value);
		baskets = parseFloat(document.getElementById(orgType + "baskets").value);
		fundraisers = parseFloat(document.getElementById(orgType + "fundraisers").value);
		total = (numbers * members * (percent / 100) * baskets * price * fundraisers * commision).toFixed(2);
		if(orgType.indexOf("H") >= 0) {
			if(isNaN(Math.floor(members*percent/100))) {
				document.getElementById(orgType + "subTotal").innerHTML = " = " + "0 ]";
			} else {
				document.getElementById(orgType + "subTotal").innerHTML = " = " + Math.floor(members * percent / 100) + " ]";
			}
		}
		if(isNaN(total)) {
			total = "0.00";
		}	
		document.getElementById(orgType + "total").innerHTML = total;
		calculateTotal();
	}
	function calculateTotal(){	
		/*
		grandTotal =  parseFloat(document.getElementById("LCtotal").value);
		grandTotal += parseFloat(document.getElementById("ACtotal").value);
		grandTotal += parseFloat(document.getElementById("SCtotal").value);		
		grandTotal += parseFloat(document.getElementById("LHtotal").value);
		grandTotal += parseFloat(document.getElementById("AHtotal").value);
		grandTotal += parseFloat(document.getElementById("SHtotal").value);
		alert(grandTotal);		
		if(isNaN(grandTotal)) {
			grandTotal = 0.00;
		}
		*/
		var totals = document.getElementsByClassName("total");	
		var sum = 0;
		for(var i=0; i<totals.length; i++) {
			alert(parseFloat(totals[i].value));
			sum += parseFloat(totals[i].value);
		}
		if(isNaN(sum))
		sum = 0.00;
		document.getElementById("grandTotal").innerHTML = sum;
	}
</script>
<style type="text/css">
	td {
		text-align: center;
	}
	th {
		font-size: 9pt;
	}
</style>
	<table>
		<tr>
			<th>Churches</th>
			<th># of Churches</th>
			<th># of Members</th>
			<th>% Participating</th>
			<th>Gift Baskets Sold</th>
			<th>$26 Avg Wholesale Price</th>
			<th>Fundraisers Per Year</th>
			<th>10% Commission</th>
			<th>Your Earnings</th>
		</tr>
		<tr>
			<td>Large Churches<br />(1000+ members)</td>
			<td><input type="text" id="LCnumber" size="10" onchange="calculate('LC');"/></td>
			<td>X<input type="text" id="LCmembers" size="10" onchange="calculate('LC');"/></td>
			<td>X<input type="text" id="LCpercent" size="10" onchange="calculate('LC');"/></td>
			<td>X<input type="text" id="LCbaskets" size="10" onchange="calculate('LC');"/></td>
			<td>x $26.00</td>
			<td>X<input type="text" id="LCfundraisers" size="10" onchange="calculate('LC');"/></td>
			<td>%10 = </td>
			<td id="LCtotal" class="total" size="10"> $0.00</td>
		</tr>
                           
		<tr>
			<td>Average Churches</td>
			<td><input type="text" id="ACnumber" size="10" onchange="calculate('AC');"/></td>
			<td>X<input type="text" id="ACmembers" size="10" onchange="calculate('AC');"/></td>
			<td>X<input type="text" id="ACpercent" size="10" onchange="calculate('AC');"/></td>
			<td>X<input type="text" id="ACbaskets" size="10" onchange="calculate('AC');"/></td>
			<td>x $26.00</td>
			<td>X<input type="text" id="ACfundraisers" size="10" onchange="calculate('AC');"/></td>
			<td>%10  = </td>
			<td id="ACtotal" class="total" > $0.00</td>
		</tr>
                            
		<tr>
			<td>Small Churches</td>
                        <td><input type="text" id="SCnumber" size="10" onchange="calculate('SC');"/></td>
                        <td>X<input type="text" id="SCmembers" size="10" onchange="calculate('SC');"/></td>
                        <td>X<input type="text" id="SCpercent" size="10" onchange="calculate('SC');"/></td>
                        <td>X<input type="text" id="SCbaskets" size="10" onchange="calculate('SC');"/></td>
                        <td>x $26.00</td>
                        <td>X<input type="text" id="SCfundraisers" size="10" onchange="calculate('SC');"/></td>
                        <td>%10  = </td>
                        <td id="SCtotal" class="total">0.00</td>
		</tr>
                              
	</table>

	<table>
		<tr>
			<th>Secondary Schools</th>
			<th>No. of School Fundraisers</th>
			<th>Total No. of Students in the School</th>
			<th>Participating % of Students on Clubs/teams</th>
			<th>Total No. of Students on Clubs/Teams</th>
			<th>Gift Baskets Sold Per Student</th>
			<th>$26.00 Average Sale Price</th>
			<th>Fundraisers Per Year</th>
			<th>Commision</th>
			<th>Your Total Commision</th>
		</tr>
		<tr>
			<td>Large High Schools</td>
			<td><input type="text" id="LHnumber" size="9" onchange="calculate('LH');" /></td>
			<td>X <big>[</big><input type="text" id="LHmembers" size="9" onchange="calculate('LH');" /></td>
			<td>X<input type="text" id="LHpercent" size="9" onchange="calculate('LH');" /></td>
			<td id="LHsubTotal">= 0 <big>]</big></td>
			<td>X<input type="text" id="LHbaskets" size="9" onchange="calculate('LH');" /></td>
			<td>$26.00</td>
			<td>X<input type="text" id="LHfundraisers" size="9" onchange="calculate('LH');" /></td>
			<td>10% = </td>
			<td id="LHtotal" class="total"> $0.00</td>
		</tr>
		
		<tr>
			<td>Average Hish Schools</td>
			<td><input type="text" id="AHnumber" size="9" onchange="calculate('AH');" /></td>
			<td>X [<input type="text" id="AHmembers" size="9" onchange="calculate('AH');" /></td>
			<td>X<input type="text" id="AHpercent" size="9" onchange="calculate('AH');" /></td>
			<td id="AHsubTotal">= 0 ]</td>
			<td>X<input type="text" id="AHbaskets" size="9" onchange="calculate('AH');" /></td>
			<td>$26.00</td>
			<td>X<input type="text" id="AHfundraisers" size="9" onchange="calculate('AH');" /></td>
			<td>10% = </td>
			<td id="AHtotal" class="total"> $0.00</td>
		</tr>
		
		<tr>
			<td>Small High Schools</td>
			<td><input type="text" id="SHnumber" size="9" onchange="calculate('SH');" /></td>
			<td>X [<input type="text" id="SHmembers" size="9" onchange="calculate('SH');" /></td>
			<td>X<input type="text" id="SHpercent" size="9" onchange="calculate('SH');" /></td>
			<td id="SHsubTotal">= 0 ]</td>
			<td>X<input type="text" id="SHbaskets" size="9" onchange="calculate('SH');" /></td>
			<td>$26.00</td>
			<td>X<input type="text" id="SHfundraisers" size="9" onchange="calculate('SH');" /></td>
			<td>10% = </td>
			<td id="SHtotal" class="total"> $0.00</td>
		</tr>
	</table>

	<h2>Grand Total: <span id="grandTotal"></span></h2>