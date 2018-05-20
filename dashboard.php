<?php 
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	//include 'redirect/redirect.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My GreatMoods Account</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
		<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
               <link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
              <link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
		<script src="js/loadXMLDoc.js"></script>
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
				width:800px;
				margin:0px 0 50px 0;
				padding:0px 0px 10px 0px;
				float:right;
				position:relative;
				top:-60px;
				}
			#leadImg{
				position:relative;
				top:-125px;
				right:150px;
				float:right;
				}
			#logout {
				position: absolute;
				right: 8px;
			}
			.school {
				
			}
			.hidden {
				display: none;
			}
			.unhidden {
				display: block;
			}
			.panel, .panelcollapsed
                       {
	               background: #cc0000 url(images/arrow-dn.gif) no-repeat 760px;
	               color: #fff;
	               margin: 5px;
	               padding: 6px;
	               width: 780px;
	               border: 1px solid #999;
	               -moz-border-radius: 4px;
	               -webkit-border-radius: 4px;
                       }
                       .panelcollapsed h2
                       {
	               background: #cc0000 url(images/arrow-up.gif) no-repeat 750px;
	               border-color: #CCC;
                       }
                       .panelcontent
                       {
	              background: #fff;
	              overflow: auto;
	              height: 550px;
	              color: #000;
	              padding-bottom: 10px;
                       }
 
                   .panelcollapsed .panelcontent { display: none; }
		 </style>
		 
		 <script type="text/javascript">
	         var PANEL_NORMAL_CLASS    = "panel";
var PANEL_COLLAPSED_CLASS = "panelcollapsed";
var PANEL_HEADING_TAG     = "h2";
var PANEL_CONTENT_CLASS   = "panelcontent";
var PANEL_COOKIE_NAME     = "panels";
var PANEL_ANIMATION_DELAY = 20; /*ms*/
var PANEL_ANIMATION_STEPS = 10;

function setUpPanels()
{
	loadSettings();
	
	// get all headings
	var headingTags = document.getElementsByTagName(PANEL_HEADING_TAG);
	
	// go through all tags
	for (var i=0; i<headingTags.length; i++)
	{
		var el = headingTags[i];
		
		// make sure it's the heading inside a panel
		if (el.parentNode.className != PANEL_NORMAL_CLASS && el.parentNode.className != PANEL_COLLAPSED_CLASS)
			continue;
		
		// get the text value of the tag
		var name = el.firstChild.nodeValue;
	
		// look for the name in loaded settings, apply the normal/collapsed class
		if (panelsStatus[name] == "false")
			el.parentNode.className = PANEL_NORMAL_CLASS;
		else
		if (panelsStatus[name] == "true")
			el.parentNode.className = PANEL_NORMAL_CLASS;
		else
		{
			// if no saved setting, see the initial setting
			panelsStatus[name] = (el.parentNode.className == PANEL_NORMAL_CLASS) ? "true" : "false";
		}
		
		// add the click behavor to headings
		el.onclick = function() 
		{
			var target    = this.parentNode;
			var name      = this.firstChild.nodeValue;
			var collapsed = (target.className == PANEL_COLLAPSED_CLASS);
			saveSettings(name, collapsed?"true":"false");
			animateTogglePanel(target, collapsed);
		};
	}
}

/**
 * Start the expand/collapse animation of the panel
 * @param panel reference to the panel div
 */
function animateTogglePanel(panel, expanding)
{
	// find the .panelcontent div
	var elements = panel.getElementsByTagName("div");
	var panelContent = null;
	for (var i=0; i<elements.length; i++)
	{
		if (elements[i].className == PANEL_CONTENT_CLASS)
		{
			panelContent = elements[i];
			break;
		}
	}
	
	// make sure the content is visible before getting its height
	panelContent.style.display = "block";
	
	// get the height of the content
	var contentHeight = panelContent.offsetHeight;
	
	// if panel is collapsed and expanding, we must start with 0 height
	if (expanding)
		panelContent.style.height = "0px";
	
	var stepHeight = contentHeight / PANEL_ANIMATION_STEPS;
	var direction = (!expanding ? -1 : 1);
	
	setTimeout(function(){animateStep(panelContent,1,stepHeight,direction)}, PANEL_ANIMATION_DELAY);
}

/**
 * Change the height of the target
 * @param panelContent	reference to the panel content to change height
 * @param iteration		current iteration; animation will be stopped when iteration reaches PANEL_ANIMATION_STEPS
 * @param stepHeight	height increment to be added/substracted in one step
 * @param direction		1 for expanding, -1 for collapsing
 */
function animateStep(panelContent, iteration, stepHeight, direction)
{
	if (iteration<PANEL_ANIMATION_STEPS)
	{
		panelContent.style.height = Math.round(((direction>0) ? iteration : 10 - iteration) * stepHeight) +"px";
		iteration++;
		setTimeout(function(){animateStep(panelContent,iteration,stepHeight,direction)}, PANEL_ANIMATION_DELAY);
	}
	else
	{
		// set class for the panel
		panelContent.parentNode.className = (direction<0) ? PANEL_COLLAPSED_CLASS : PANEL_NORMAL_CLASS;
		// clear inline styles
		panelContent.style.display = panelContent.style.height = "";
	}
}

// -----------------------------------------------------------------------------------------------
// Load-Save
// -----------------------------------------------------------------------------------------------
/**
 * Reads the "panels" cookie if exists, expects data formatted as key:value|key:value... puts in panelsStatus object
 */
function loadSettings()
{
	// prepare the object that will keep the panel statuses
	panelsStatus = {};
	
	// find the cookie name
	var start = document.cookie.indexOf(PANEL_COOKIE_NAME + "=");
	if (start == -1) return;
	
	// starting point of the value
	start += PANEL_COOKIE_NAME.length+1;
	
	// find end point of the value
	var end = document.cookie.indexOf(";", start);
	if (end == -1) end = document.cookie.length;
	
	// get the value, split into key:value pairs
	var cookieValue = unescape(document.cookie.substring(start, end));
	var panelsData = cookieValue.split("|");
	
	// split each key:value pair and put in object
	for (var i=0; i< panelsData.length; i++)
	{
		var pair = panelsData[i].split(":");
		panelsStatus[pair[0]] = pair[1];
	}
}

function expandAll()
{
	for (var key in panelsStatus)
		saveSettings(key, "true");
		
	setUpPanels();
}

function collapseAll()
{
	for (var key in panelsStatus)
		saveSettings(key, "false");
		
	setUpPanels();
}

/**
 * Takes data from the panelsStatus object, formats as key:value|key:value... and puts in cookie valid for 365 days
 * @param key	key name to save
 * @paeam value	key value
 */
function saveSettings(key, value)
{
	// put the new value in the object
	panelsStatus[key] = value;
	
	// create an array that will keep the key:value pairs
	var panelsData = [];
	for (var key in panelsStatus)
		panelsData.push(key+":"+panelsStatus[key]);
		
	// set the cookie expiration date 1 year from now
	var today = new Date();
	var expirationDate = new Date(today.getTime() + 365 * 1000 * 60 * 60 * 24);
	// write the cookie
	document.cookie = PANEL_COOKIE_NAME + "=" + escape(panelsData.join("|")) + ";expires=" + expirationDate.toGMTString();
}

// -----------------------------------------------------------------------------------------------
// Register setUpPanels to be executed on load
if (window.addEventListener)
{
	// the "proper" way
	window.addEventListener("load", setUpPanels, false);
}
else 
if (window.attachEvent)
{
	// the IE way
	window.attachEvent("onload", setUpPanels);
}
		 </script>	

	</head>
    <body>
	  <div id="container">
	  <?php include 'header.php' ; ?>
	  <?php include 'mainLeftSidebar.php' ; ?>
         	   <div id="content">
         		  
         		
         	   <h3 align="center">Manage Your Account</h3>
         	   &nbsp;<a style="color: #cc0000;" href="javascript:expandAll()">Expand All</a>
                   <a  style="color: #cc0000;" href="javascript:collapseAll()">Collapse All</a>
                   <div class="panel"><!--------------panel 1-->
                   <h2>Sales Person Setup an Edit</h2>
                   <div class="panelcontent">

	           </div>
                   </div><!-------------stop panel 1-->
                   
                   
                   <div class="panel"><!--------------panel 2-->
                   <h2>Sales Goals</h2>
                   <div class="panelcontent">
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
                   </div><!-------------stop panel 2-->
                   
                   <div class="panel"><!--------------panel 3-->
                   <form method="post" action=""><!--------------------open form--->
                   <h2>Add and Edit Prospective Accounts</h2>
                   <div class="panelcontent">
                   <div><!--holds table in middle-->
                   <h3 align="center">Account Setup</h3>
                   <hr />
                   <div>
                   <table><tr><td>
                   <table style="background: #cc0000; color: #fff;">
                   <tr>
                   <td style="padding: 6px;"><input type="text" id="accountName" name="acName" /> Account Name</td>
                   </tr>
                   <tr>
                   <td style="padding: 6px;"><input type="text" id="accountWeb" name="acWeb" /> Website URL</td>
                   </tr>
                    <tr>
                   <td style="padding: 6px;"><input type="text" id="address" name="acAddress" /> Address</td>
                   </tr>
                   <tr>
                   <td style="padding: 6px;"><input type="text" id="accountCity" name="acCity" /> City <input type="text" id="accountState" name="acState" maxlength="2"
                   size="2" /> State </td>
                   </tr>
                    <tr>
                   <td style="padding: 6px;">
                   <input type="text" id="accountZip" name="aZip" maxlength="10" /> Zip Code</td>
                   </tr>
                   </table>
                   </td>
                   </tr>
                   <tr>
                   <td>
                   <hr />
                   <h3 align="center">Select Fundraiser Type</h3>
                   <select>
                   <option>High Schools</option>
                   <option>Middle Schools</option>
                   <option>Elementary Schools</option>
                   <option>Religious</option>
                   <option>Community Organizations</option>
                   <option>Youth & Sports</option>
                   <option>Local and National Charities</option>
                   <option>Causes</option>
                   </select>
                   <select>
                   <option>Band</option>
                   <option>BPA</option>
                   <option>Book Club</option>
                   <option>Chess Club</option>
                   <option>Choir</option>
                   <option>Class Trips</option>
                   <option>Debate</option>
                   <option>FBLA</option>
                   <option>Language Club</option>
                   <option>Library</option>
                   <option>National Art HS</option>
                   <option>National Honor Society</option>
                   <option>Prom Committee</option>
                   <option>PTA/PTO</option>
                   <option>Scholars Bowl</option>
                   <option>Scholarship Counseling</option>
                   <option>School Counseling</option>
                   <option>Science & Math</option>
                   <option>Student Council</option>
                   <option>Theater</option>
                   <option>Yearbook News</option>
                   <option>Broadcasting</option>
                   </select>
                   <select>
                   <option>Baseball</option>
                   <option>Basketball</option>
                   <option>Boys</option>
                   <option>Girls</option>
                   <option>Bowling</option>
                   <option>Cheerleeading</option>
                   <option>Cross Country</option>
                   <option>Danceline</option>
                   <option>Football</option>
                   <option>Field Hockey</option>
                   <option>Golf</option>
                   <option>Cymnastics</option>
                   <option>Ice Hcokey</option>
                   <option>Lacrosse</option>
                   <option>Power Lifting</option>
                   <option>Ski Club</option>
                   <option>Soccer</option>
                   <option>Softball</option>
                   <option>Swimming & Diving</option>
                   <option>Tennis</option>
                   <option>Track & Field</option>
                   <option>Volleyball</option>
                   <option>Wrestling</option>
                   </select>
                   <select>
                   <option>Fire</option>
                   <option>Police</option>
                   <option>Lion's Club</option>
                   <option>Jaycees</option>
                   <option>Rotary Club</option>
                   <option>Knights of Columbus</option>
                   <option>YMCA</option>
                   <option></option>
                   </select>
                   <select>
                   <option>Boy's Club</option>
                   <option>Girl's Club</option>
                   <option>Athlectic Associations</option>
                   <option>Big Brothers/Big Sisters</option>
                   </select>
                   <hr />
                   <br />
                   </td>
                   <td>
                   <table>
                   <tr style="background-color: #cc0000; color: #fff; width: 600px;">
                   <td>By Account Type</td>
                   <td>Club & Athletic Teams</td>
                   <td>Contact Name</td>
                   <td>Contact Eamil Address</td>
                   <td>Phone Number</td>
                   </tr>
                   </table>
                   </td>
                   </tr>
                   </table>
                   </div>
                   </div>
	             
	           </div>
	           </form>
                   </div><!-------------stop panel 3-->
                   
                   <div class="panel"><!--------------panel 4-->
                   <h2>View Sales Person(s) and Accounts</h2>
                   <div class="panelcontent">
                   <div>
                   
                   </div>
	           </div>
                   </div><!-------------stop panel 4-->
                   </div><!--end content-->
	           <?php include 'footer.php' ; ?>
                  </div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>