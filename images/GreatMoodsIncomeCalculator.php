<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Great Moods</title>

<link href="css/mainStyles.css" rel="stylesheet" type="text/css" />
<link href="css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	var type;
	function calculate() {
		type = document.forms['sales']['type'].value;
		alert(type);
	}
</script>
</head>

<style type="text/css">
#headerTop{
	background: no-repeat;
	background-position:right top;
	width:1024px;
	height:130px;
	padding:0;
	margin:0;
	position:relative;
	z-index:3;
	}
#content{
	position:relative;
	top:-50px;
	padding-bottom:50px;
	}

</style>
<body>
<div id="container">
	<?php include 'header.php' ; ?>
    <?php include 'mainLeftSidebar.php' ; ?>
    	<div id="content">
    		<h1 id="pageTitle">Income Calculator</h1>
				<h3 id="pageTitleSub">You can fInd out how much you can makeby using our Earning Potential Calculator 				below </h3>
                <div id="leadBox">
                    <div id="infoText">
                        <div id="redBar1"><p>The calculator is simple to use. Type in:</p> </div>
                           <ul>
                                <li>The number of accounts that you think you can setup</li>
                                <li>The average number of students/members who will participate in the fundraisers</li>
                                <li>The average number of gift basketsthat they will sell</li>
                                <li>$26 for the aveage wholesale price of a basket</li>
                                <li>Enter the average number of fundraisers each account will setup in one year, 3 is a good average-Holiday/Christmas, Valentine's Day, Easter, Mother's Day, 				                                Father's Day</li>
                                <li>Multiply by your commission percentage-6%</li>
                           </ul>
                        </div><!--end redBar1-->
                		<img id="leadInImg" src="images/calculatorimage.png" width="340" height="205"><!--leadin image-->
                	</div><!--end infoText-->
				</div>
                
                 	
                         <div id="infoTextTableWrapper">
                             <h3>Calculator Example of a Church</h3>
                             <table id="example1" cellspacing="0" cellpadding="3" >
                               <tr>
                                   <th>Churches</th>
                                  
                                   <th>No. of Churches</th>
                                   <th></th>
                                   <th>No. of Members</th>
                                   <th></th>
                                   <th>Participating % of Members</th>
                                   <th></th>
                                    <th></th>
                                   <th>Gift Baskets Sold Per Fundraiser</th>
                              	   
                                   <th></th>
                                   <th>$26 Average Whsle Price</th>
                                   <th></th>
                                   <th>Fundraisers Per Year</th>
                                   <th></th>
                                   <th></th>
                                   <th>Commission</th>
                                  <th></th>
                                   
                                   <th>Your Earnings</th>
                                </tr> 
                                <tr>
                                   <td >Large Churches<br/> (1000+ members)</td>
                                   
                                   <td>12</td>
                                   <td>x</td>
                                   <td>1000</td>
                                   <td>x</td>
                                   <td>33.33</td>
                                   <td>%</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                   <td>$26.00</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                    <td></td>
                                   <td>10%</td>
                                   <td>=</td>
                                   <td>$41,184.00</td>
                               <tr/>
                           <tr>
                                   <td >Avg. Churches<br/> (100-999 members)</td>
                                  
                                   <td>12</td>
                                   <td>x</td>
                                   <td>320</td>
                                   <td>x</td>
                                   <td>33.33</td>
                                   <td>%</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                   <td>$26.00</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                   <td></td>
                                   <td>10%</td>
                                   <td>=</td>
                                   <td>$13,178.88</td>
                               <tr/>
                             <tr>
                                   <td >Total Commission From Churches</td>
                                   
                                   <td>12</td>
                                   <td>x</td>
                                   <td>320</td>
                                   <td>x</td>
                                   <td>33.33</td>
                                   <td>%</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                   <td>$26.00</td>
                                   <td>x</td>
                                   <td>2</td>
                                   <td>x</td>
                                    <td></td>
                                   <td>Total</td>
                                   <td>=</td>
                                   <td>$54,362.88</td>
                               <tr/>
                           </table>
                   		</div><!--end infoTextTableWrapper-->
                  
        		
                         <div id="infoTextTableWrapper">
                              <h3>Try Our Calculator!</h3>
					<strong>Select Type: </strong> 
					<form name="sales" action='#'>
						<input type="radio" name="type" value="ae" checked onchange="calculate()"/>AE 
						<input type="radio" name="type" value="dist" onchange="calculate()"/>Distributor<br/>
					</form>
                              		<table id="example1">
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
                                                <td>Large High Schools (55 Clubs/Teams) 2400+ Students</td>
                                                <td><input type="text" name"" size="5"/>x</td>
                                                
                                                <td>[<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>=<input type="text" name"" size="5"/>]</td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>10% =</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                            </tr>
                                           
                                            <tr>
                                               <td>Avg High Schools (40 Clubs/Teams) 855+ Students</td>
                                              <td><input type="text" name"" size="5"/>x</td>
                                                
                                                <td>[<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>=<input type="text" name"" size="5"/>]</td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x&nbsp;$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>&nbsp;10% &nbsp;=</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                           </tr>
                                            <tr>
                                               <td>Large Middle Schools (55 Clubs/Teams) 1855+ Students</td>
                                              <td><input type="text" name"" size="5"/>x</td>
                                                
                                                <td>[<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>=<input type="text" name"" size="5"/>]</td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x&nbsp;$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>&nbsp;10% &nbsp;=</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                           </tr>
                                           <tr>
                                               <td>Avg Middle Schools (40 Clubs/Teams) 650+ Students</td>
                                              <td><input type="text" name"" size="5"/>x</td>
                                                
                                                <td>[<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>=<input type="text" name"" size="5"/>]</td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x&nbsp;$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>&nbsp;10% &nbsp;=</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                           </tr>
                                            <tr>
                                               	<td>Total Commissions From Schools</td>
                                               	<td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td style="border:2px solid #000;"> <input type="text" name"" size="10"/></td>
                                            </tr>
                                  </table>

                   		</div><!--end infoTextTableWrapper-->
				
                         <div id="infoTextTableWrapper">
                              <h3>Calculator Example of a Church</h3>
                             			 <table id="example1">
                                           <tr>
                                                <th>Churches</th>
                                                <th># of Churches</th>
                                                <th># of Members</th>
                                               <th>% Participating</th>
                                               <th>Gift Baskets Sold</th>
                                                <th>$26 Avg Wholesale Price</th>
                                               <th>Fundraisers Per Year</th>
                                               <th>10% Commission</th>
                                              <th>Your Total Commission</th>
                                            </tr>
                                            <tr>
                                                <td>Large Churches (1000+ Members) </td>
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                <td>x $26.00</td>
                                                <td>x<input type="text" name"" size="5"/></td>
                                               
                                                <td> 10%</td>
                                                <td>= <input type="text" name"" size="5"/></td>
                                            </tr>
                                           
                                            <tr>
                                               <td>Avg Churches (100-999 Members)</td>
                                               <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                <td>x $26.00</td>
                                                <td>x<input type="text" name"" size="5"/></td>
                                               
                                                <td> x10%</td>
                                                <td>= <input type="text" name"" size="5"/></td>
                                         </tr>
                                          <tr>  
                                             <td>Total Commissions From Churches</td>
                                             <td> </td>
                                             <td> </td>
                                             <td> </td>
                                             <td> </td>
                                             <td> </td>
                                             <td> </td>
                                             <td> </td>
                                             <td style="border:2px solid #000;"> <input type="text" name"" size="7"/></td>
                    					<tr/>
                    		</table>

                   		</div><!--end infoTextTableWrapper-->
        			<div id="infoTextTableWrapper">
                        <h3>Calculator Example of a Church</h3>
           							<table id="example1">
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
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>10% =</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                            </tr>
                                           
                                            <tr>
                                               <td>Organizations</td>
                                              <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="5"/></td>
                                                
                                                <td>x<input type="text" name"" size="4"/></td>
                                               <td> x&nbsp;$26.00</td>
                                                <td>x <input type="text" name"" size="5"/></td>
                                                <td>x<b>&nbsp;10% &nbsp;=</b></td>
                                                
                                                <td><input type="text" name"" size="10"/></td>
                                           </tr>
                                            <tr>
                                               	<td>Total Commissions From Schools</td>
                                               	<td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                 <td> </td>
                                                <td style="border:2px solid #000;"> <input type="text" name"" size="10"/></td>
                                            </tr>
                                  </table>
                   		 </div><!--end infoTextTableWrapper-->
                        <div id="redBar2"><p>Total Number of commissions from schools, churches and organizations:</p> 
                        <input type="text" name="grandTotal" size="10" id="red">
                        </div>
                          
                       
        </div><!--end content-->
    <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
