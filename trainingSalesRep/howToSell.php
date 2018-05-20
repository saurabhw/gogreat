<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>How to Sell</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
<link href="../jquery-ui-1.7.2/css/base/ui.core.css" rel="stylesheet" type="text/css">
<link href="../jquery-ui-1.7.2/css/base/ui.accordion.css" rel="stylesheet" type="text/css">
<link href="../jquery-ui-1.7.2/css/base/ui.theme.css" rel="stylesheet" type="text/css">
<link href="../jquery-ui-1.7.2/css/base/ui.images.css" rel="stylesheet" type="text/css">
<script src="../jquery-ui-1.7.2/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../jquery-ui-1.7.2/js/jquery-ui-1.7.2.min.js" type="text/javascript"></script>
<style type="text/css">
/* BeginOAWidget_Instance_2028523: #jQueryUIAccordion */

		


#jQueryUIAccordion .ui-widget {
	font-family: inherit;
	padding: 20px;
}
#jQueryUIAccordion .ui-accordion-header {
	z-index: 100;
	line-height: 1em;
	color: #555555;
	text-decoration: none;
	font-size: 1.25em;
	font-weight: normal;
	font-family: Arial, Helvetica, sans-serif;
	background-color: transparent;
	border: none;/*	border-color: #d3d3d3;
	border-width: 1px;*/
}
#jQueryUIAccordion .ui-accordion-content {
	font-family: Arial, Helvetica, sans-serif;
	color: #000;
	font-size: 1em;
	line-height: 130%;
	background-color: transparent;
	background-color: #ccc; /*(this works*/
) border:none;
	padding-bottom: 0px;/*	border-color: #d3d3d3;
	border-width: 1px;*/
}
#jQueryUIAccordion .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
	color: #FFF;
}
/* Active text color */
#jQueryUIAccordion .ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited {
	color: #FFF;
}
/* Active background color */
#jQueryUIAccordion .ui-state-active {
	background-color: transparent;
}
/* text color when you hover */
#jQueryUIAccordion .ui-state-hover a, .ui-state-hover a:hover {
	color: #CCC;
}
/* background color when you hover */
#jQueryUIAccordion .ui-state-hover {
	background-color: transparent;
}
/* Corner radius */
#jQueryUIAccordion .ui-corner-tl {
	-moz-border-radius-topleft: 7px;
	-webkit-border-top-left-radius: 7px;
}
#jQueryUIAccordion .ui-corner-tr {
	-moz-border-radius-topright: 7px;
	-webkit-border-top-right-radius: 7px;
}
#jQueryUIAccordion .ui-corner-bl {
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
}
#jQueryUIAccordion .ui-corner-br {
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion .ui-corner-top {
	-moz-border-radius-topleft: 7px;
	-webkit-border-top-left-radius: 7px;
	-moz-border-radius-topright: 7px;
	-webkit-border-top-right-radius: 7px;
}
#jQueryUIAccordion .ui-corner-bottom {
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion .ui-corner-right {
	-moz-border-radius-topright: 0px;
	-webkit-border-top-right-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion .ui-corner-left {
	-moz-border-radius-topleft: 0px;
	-webkit-border-top-left-radius: 0px;
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
}
#jQueryUIAccordion .ui-corner-all {
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
}
		
		
/* EndOAWidget_Instance_2028523 */
</style>
<script type="text/xml">
<!--
<oa:widgets>
  <oa:widget wid="2028523" binding="#jQueryUIAccordion" />
  <oa:widget wid="2028523" binding="#jQueryUIAccordion_2" />
</oa:widgets>
-->
</script>
<style type="text/css">
/* BeginOAWidget_Instance_2028523: #jQueryUIAccordion_2 */

		

#jQueryUIAccordion_2 .ui-widget {
	font-family: inherit;
	padding: 20px;
}
#jQueryUIAccordion_2 .ui-accordion-header {
	z-index: 100;
	line-height: 1em;
	color: #555555;
	text-decoration: none;
	font-size: 1.25em;
	font-weight: normal;
	font-family: Arial, Helvetica, sans-serif;
	background-color: transparent;
	border: none;/*	border-color: #d3d3d3;
	border-width: 1px;*/		}
#jQueryUIAccordion_2 .ui-accordion-content {
	font-family: Arial, Helvetica, sans-serif;
	color: #000;
	font-size: 1em;
	line-height: 130%;
	background-color: transparent;
	background-color: #ccc; /*(this works*/
)  border:none;
	padding-bottom: 0px;/*	border-color: #d3d3d3;
	border-width: 1px;*/
}
#jQueryUIAccordion_2 .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
	color: #FFF;
}
/* Active text color */
#jQueryUIAccordion_2 .ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited {
	color: #FFF;
}
/* Active background color */
#jQueryUIAccordion_2 .ui-state-active {
	background-color: transparent;
}
/* text color when you hover */
#jQueryUIAccordion_2 .ui-state-hover a, .ui-state-hover a:hover {
	color: #CCC;
}
/* background color when you hover */
#jQueryUIAccordion_2 .ui-state-hover {
	background-color: transparent;
}
/* Corner radius */
#jQueryUIAccordion_2 .ui-corner-tl {
	-moz-border-radius-topleft: 7px;
	-webkit-border-top-left-radius: 7px;
}
#jQueryUIAccordion_2 .ui-corner-tr {
	-moz-border-radius-topright: 7px;
	-webkit-border-top-right-radius: 7px;
}
#jQueryUIAccordion_2 .ui-corner-bl {
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
}
#jQueryUIAccordion_2 .ui-corner-br {
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion_2 .ui-corner-top {
	-moz-border-radius-topleft: 7px;
	-webkit-border-top-left-radius: 7px;
	-moz-border-radius-topright: 7px;
	-webkit-border-top-right-radius: 7px;
}
#jQueryUIAccordion_2 .ui-corner-bottom {
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion_2 .ui-corner-right {
	-moz-border-radius-topright: 0px;
	-webkit-border-top-right-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
}
#jQueryUIAccordion_2 .ui-corner-left {
	-moz-border-radius-topleft: 0px;
	-webkit-border-top-left-radius: 0px;
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
}
#jQueryUIAccordion_2 .ui-corner-all {
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
}
		
		
/* EndOAWidget_Instance_2028523 */
</style>
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>How to Sell</h1>
    <p>&nbsp;</p>
    <div class="col1">
      <p class="accordionWidget">Selling of the GreatMoods program should be easy and fun for you.  Our program gives a fundraiser some new aspects that should make their fundraising task fun and simple.  We offer some distinct advantages over other forms of fundraising and those are:</p>
    </div>
    <!--end col1-->
    <div> </div>
    <!--end col2-->
    
    <div class="mainWide" />
    <div class="col1">
      <h3>Knowledge of the Site</h3>
      <p>Knowing how to navigate and use the website is one of the best ways to sell our program to an organization.  understanding how our website works is a vital aspect of selling our program.  Navigate through the website and familiarize yourself with what we offer and how the site works for the consumer.</p>
<p>	  Before talking to a potential account contact, go to the sample website for that account category and become familiar with it so that you can properly walk them through an example of how the organization&#39;s web page will look. For example, if you are trying to set up a high school band, learn how to navigate to the sample  band page, then go to a sample of the band members page.</p>
      <p><a href="#">Screen Navigation</a> (document) <img class="imgLeft" style="vertical-align:top" src="../images/pdficon_small.png" width="16" height="16" alt="Download PDF"></p>
      <p>(Screen capture)</p>
    </div>
    <!--end col1-->
    <div class="col2"> <img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="Prospect List Screen Capture">
      <div id="pcaption">Screen Navigation. </div>
    </div>
    <!--end col2--> 
  </div>
  <!--end main-->
  
  <div class="mainWide" />
  <div class="col1">
    <h3>Selling Points</h3>
    <p>When making your sales pitch to an account there are 5 main selling points that give our program an advantage over other fundraising programs, and these are going to be your main selling points along with the website.</p>
    <div id="leadBox">
      <div id="infoText">
        <div id="redBar1">
          <h3>Advantages of GreatMoods Program</h3>
        </div>
        <!--end redBar1-->
        <ul>
          <li><a href="#free">It's Free</a></li>
          <li><a href="#online">All Online</a></li>
          <li>
          
          </li>
          <li><a href="#easy">Easy 1…2…3 Setup</a></li>
          <li><a href="#potential">Earning Potential</a> </li>
        </ul>
      </div>
      <!--end infoText--> 
    </div>
    <!--end leadBox-->
    
    <p>&nbsp;</p>
    <h5 id="free">It’s Free</h5>
    <p>Using the GreatMoods program is completely free for the fundraiser, this means that there is no start-up fee or upfront cost for them.  They also do not have to sell any certain amount of product in order to make money.  The fundraiser will make money each and every time a gift basket is sold, no questions asked.</p>
    <h5 id="online">All Online</h5>
    <p>By having the fundraiser completely online our program offers some distinct advantages over other fundraising options.  The advantages include but are not limited to being paid instantly, direct shipping, no door to door selling, and opening up new markets.</p>
    <script type="text/javascript">
// BeginOAWidget_Instance_2028523: #jQueryUIAccordion
 $(function(){
				// Accordion
				$("#jQueryUIAccordion").accordion({ header: "h3",
											animated: "slide",
											event: "click",
											collapsible : "false"
											  });			
				});
			
// EndOAWidget_Instance_2028523
    </script> 
    <!-- Accordion -->
    <div id="jQueryUIAccordion" class="ui-white-icons  ">
      <div>
        <h3><a href="#">Paid Instantly</a></h3>
        <div>
          <p>With our program the fundraiser will be able to receive their payments within days of their consumer ordering a gift basket.  All payments are processed on PayPal and distributed directly into the proper account.  This setup will eliminate the problem of collecting money from their members, and provide them with year round access to their funds.</p>
        </div>
      </div>
      <div>
        <h3><a href="#">Direct Shipping</a></h3>
        <div>
          <p>With all of the orders being processed online, this allows us to ship the gift baskets directly to whomever ordered them.  The process of shipping the baskets to the consumer will alleviate the fundraiser from having to sort out who ordered what, and won’t have to worry about kids picking up their orders and distributing them to their consumers.</p>
        </div>
      </div>
      <div>
        <h3><a href="#">No Door to Door</a></h3>
        <div>
          <p>Door to door sales can all but be eliminated if the fundraiser would like with our program.  Since the members only have to enter in the emails of the people that they would like to sell to they won’t have to go door to door and try and sell to complete strangers.  This is what the kids will want to do as well which will make the selling process easier and safer.</p>
        </div>
      </div>
      <div>
        <h3><a href="#">New Markets</a></h3>
        <div>
          <p>In the past fundraising was limited to the local community, but not anymore due to us only needing the email of a potential consumer.  With our program the fundraising can go national, because all they need is the email of the consumer and we will ship their product directly to them.  This will allow the fundraisers to go after a different segment of the population, rather than just the same people in the community who get asked constantly to support fundraisers.</p>
        </div>
      </div>
    </div>
    
    <!--<p>Paid Instantly</p>
<p>With our program the fundraiser will be able to receive their payments within days of their consumer ordering a gift basket.  All payments are processed on PayPal and distributed directly into the proper account.  This setup will eliminate the problem of collecting money from their members, and provide them with year round access to their funds.</p>
    <p>Direct Shipping</p>
    <p>With all of the orders being processed online, this allows us to ship the gift baskets directly to whomever ordered them.  The process of shipping the baskets to the consumer will alleviate the fundraiser from having to sort out who ordered what, and won’t have to worry about kids picking up their orders and distributing them to their consumers.</p>
    <p>No Door to Door</p>
    <p>Door to door sales can all but be eliminated if the fundraiser would like with our program.  Since the members only have to enter in the emails of the people that they would like to sell to they won’t have to go door to door and try and sell to complete strangers.  This is what the kids will want to do as well which will make the selling process easier and safer.</p>
    <p>New Markets</p>
    <p>In the past fundraising was limited to the local community, but not anymore due to us only needing the email of a potential consumer.  With our program the fundraising can go national, because all they need is the email of the consumer and we will ship their product directly to them.  This will allow the fundraisers to go after a different segment of the population, rather than just the same people in the community who get asked constantly to support fundraisers.</p>-->
    <p>&nbsp;</p>
  </div>
  <!--end col1-->
  <div class="col2">
    <h5 id="personalized">Personalized Sites</h5>
    <p>Everybody involved with our program will get their own website which they can personalize to their liking.  This includes the fundraiser as well as any member within that fundraiser who is participating.  Both the fundraiser and the participant will be able to edit their information to their pleasing as well as add some pictures and a video if they would like.</p>
    <h5 id="easy">Easy 1…2…3 setup</h5>
    <p>Getting started with our program is a simple 1..2..3 step process that involves editing their own site, adding their students/members, and getting the emails of the consumers.</p>
    <script type="text/javascript">
// BeginOAWidget_Instance_2028523: #jQueryUIAccordion_2
 $(function(){
				// Accordion
				$("#jQueryUIAccordion_2").accordion({ header: "h3",
											animated: "slide",
											event: "click",
											collapsible : "false"
											  });			
				});
			
// EndOAWidget_Instance_2028523
    </script> 
    <!-- Accordion -->
    <div id="jQueryUIAccordion_2" class="ui-white-icons  ">
      <div>
        <h3><a href="#">Step 1</a></h3>
        <div>
          <p>The first step for the fundraiser is going to be editing their site.  This will involve them entering in why they are doing the fundraiser as well as uploading some pictures and maybe a video to their website.  Also in this step they are going to have to enter in their PayPal account information.</p>
        </div>
      </div>
      <div>
        <h3><a href="#">Step 2</a></h3>
        <div>
          <p>After they have finished editing their site, the next step is going to be adding the participating members.  This step can be done one of two ways, by either entering them on the site or by downloading the spreadsheet and filling it out then submitting it back to us.  Once these names and emails are submitted a personalized page will be created for all of the participating members.</p>
        </div>
      </div>
      <div>
        <h3><a href="#">Step 3</a></h3>
        <div>
          <p>The final step in the process involves the member.  They will each be sent an email with a link back to their page.  They can edit their own site if they choose.  Once they are on the page all they have to do is go to setup/edit emails and enter in the emails of the people that they would like to sell to.  After they have entered in the emails the process is complete and they can start fundraising!</p>
        </div>
      </div>
    </div>
    
    <!--<p>Step 1</p>
    <p>The first step for the fundraiser is going to be editing their site.  This will involve them entering in why they are doing the fundraiser as well as uploading some pictures and maybe a video to their website.  Also in this step they are going to have to enter in their PayPal account information.</p>
    <p>Step 2</p>
    <p>After they have finished editing their site, the next step is going to be adding the participating members.  This step can be done one of two ways, by either entering them on the site or by downloading the spreadsheet and filling it out then submitting it back to us.  Once these names and emails are submitted a personalized page will be created for all of the participating members.</p>
    <p>Step 3</p>
    <p>The final step in the process involves the member.  They will each be sent an email with a link back to their page.  They can edit their own site if they choose.  Once they are on the page all they have to do is go to setup/edit emails and enter in the emails of the people that they would like to sell to.  After they have entered in the emails the process is complete and they can start fundraising!</p>-->
    
    <p>&nbsp;</p>
    <h5 id="potential">Earning Potential</h5>
    <p>Fundraisers have the opportunity to meet their fundraising goals with us for a few reasons.  First is that they can get 3 potential fundraisers a year out of our program.  Another reason that they will be able to reach their goal is because of the ease of our program, and the amount of people who will be able to participate compared to a normal fundraiser.  Have the fundraiser tell you how many participants they have and how many baskets they think each will sell and then tell them how much they could make with our program.</p>
    <p> <a href "../rep/repCalculator.php">Calculator</a></p>
  </div>
  <!--end col2-->
  <div class="mainWide" />
  <div class="col1">
    <h3>Sales Meeting/Call</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget metus et turpis euismod convallis nec non eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Donec sed nisl mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit ante accumsan libero scelerisque bibendum. Phasellus pellentesque placerat libero placerat malesuada.</p>
  </div>
  <!--end col1-->
  <div class="col2"> <img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="Prospect List Screen Capture">
    <div id="pcaption">Sales meeting. </div>
  </div>
  <!--end col2--> 
</div>
<!--end mainWide-->

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