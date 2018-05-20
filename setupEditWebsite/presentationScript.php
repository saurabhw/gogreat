<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '1'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
       
?>

<!DOCTYPE html>
<head>
	<title>Presentation Scripts</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	
      
    <div id="content">
    <h1>Presentation Scripts</h1>
    <h3>On the Phone or In-Person Sales Points/Scripts</h3>

    <h5>Once you have your prospect’s attention, whether over the phone or in-person, it’s time to give them your sales pitch. Here’s a Sales Presentation guideline:  </h5>
	        
    <ol>
	        <li>You should always start your presentation by getting your Fundraising Leader Contact in front of a computer. Once they’re on their computer, have them go to www.GreatMoods.com.   </li>
	        <li>When both you and the contact are looking at the homepage, you’re going to have them scroll
	         over ‘Education Examples’ and then click on ‘band’ under ‘High School’, ‘Clubs & Organizations’. </li>	        
	        <li>Once you’re both at the ‘band’ fundraising page, explain to them what exactly they’re looking at.  
	        	<ul class="bulletedlist">
			        <li>Point out that every member of a GreatMoods Fundraising Program will get their own Personal Fundraising page (a lot like Facebook!).  </li>
			        <li>Point out all the customizable aspects of the page: The banner at the top of the page, the customized photos, the goals section, the reasons for their fundraiser, etc.  </li>
			        <li>After you’ve explained the customizable aspects of the page, take some time to explain the GreatMoods Shopping Mall.  </li>
			        <li>Point out the shopping ideas list on the right side of the screen.  </li>
			        <li>Really emphasize that, unlike other fundraisers, we have hundreds of products for customers to choose from. So instead of buying something they don’t really care for, like cookie dough or gift wrap, they can support their fundraiser by buying things that they actually want all year! </li>
			</ul>
	        </li>
	      
	        <li>When you’re done explaining everything at the ‘band’ homepage, carry on with your GreatMoods Shopping Mall pitch by having your Fundraising Leader Contact hover over the GreatMoods Mall Drop Down Menu. 
	        	<ul class="bulletedlist">
	        		<li>Take a second to show off the main departments at the very top.</li>
			        <li>Next, have the Fundraising Leader Contact click on a store so they can see examples of products within.</li>
		                 <li>Take a second to point out the variety of products, especially those with different options available.</li>
		                 <li>After you’ve shown off lots of different products, have the Fundraising Leader Contact click on one product’s ‘Buy Now’ to see how to make a purchase.</li>
		                 <li>Have the Fundraising Leader scroll down to the ‘Shopping Bag’ located in the bottom right corner of the screen. </li> 
		                 <li>Have the Fundraising Leader Contact click on ‘Open Bag’. </li>
		                 <li>Let the Fundraiser Leader Contact see what is in their bag and that there are several options to complete the purchase.</li>
		                 <li>Have your Fundraising Leader Contact click ‘Checkout’ so they can view the ‘Shipping Details’ page.</li>
		                 <li>Emphasize that customers are able to send their purchase(s) wherever they want and GreatMoods takes care of the rest. This includes overseas. For example, if someone wants to send a scarf to their aunt as a gift, they can fill in their aunt’s information and the scarf will be sent directly to her. </li>	                
		                <li>Lastly, inform the Fundraising Leader Contact that all payments made through GreatMoods are done using PayPal.</li>
	        	</ul>
	        </li>

		<li>Explain that PayPal is the most trusted online payment method in the world and that it’s super easy to use. Also, really emphasize that by using PayPal, every single purchase made to support their fundraiser is transferred to their group’s PayPal account, CASH WEEKLY. That means the group has almost instant access to the money its members have earned. </li>


		<li>To wrap things up, have your Fundraising Leader Contact click on the ‘Strengths of the GreatMoods Program’ link in the left navigation. At this point your GreatMoods website tour is complete. The last things you want to do before finishing up your appointment is review the ‘10 Good Reasons To Do Fundraising Online With GreatMoods’ They are:  
			<ol>
			  	<li>Everyone who signs up gets a FREE website that they can personalize.</li>
				<li>Unlike other fundraisers, the GreatMoods Program has a wide variety of products to choose from. Including customized apparel, coffee & candy, sporting goods, women’s accessories…. And more!</li>
				<li>PayPal makes it easy and safe to fundraise online.</li>
				<li>35% of every purchase is deposited, CASH WEEKLY, into the group’s PayPal account (Make sure to point out that we can setup the PayPal account with them).</li>
				<li>Fundraisers can occur any time, for any season, multiple times per year. </li>
				<li>Although the option is still there, the GreatMoods Program doesn’t require door to door sales. Everything can be done from a laptop, cell phone or tablet. 
					<ul>
						<li class="indent"><i>Emphasize that people can have great success with their fundraiser(s) by using social media outlets such as Facebook and Twitter. By using social media, like Facebook and Twitter, fundraising members are able to post a link to their fundraiser’s website page for all of their Facebook friends and/or Twitter followers to see.</i></li>
					</ul>
				</li>
				<li>GreatMoods delivers! You tell us where to send your purchase and we take care of the rest.</li>
				<li>It’s Free. The program has never and will never cost anything to sign up and run.</li>
				<li>This is new, and being online makes it efficient for everyone.</li>
				<li>If you’re not a techie? There are plenty of individuals in the younger generation that can easily set up anything online.</li>
				
			</ol>
		</li>
    
   	     <li>After you’ve reviewed the 10 Good Reasons, make sure you answer any questions the Fundraising Leader Contact may have. Once you’re finished answering all their questions, you ask your big question…. “What do you think!?” 
   	     		<ul>
	        		<li class="indent"><i>If a question is asked that you don’t know the answer to, don’t guess, say something to the effect, “You know that is an excellent question, I’m not sure, but I’ll check it out when I get back to the office and get back to you.  Would you like me to call or email the answer?”</i></li>
	        	</ul>
   	     </li>

            <li>Presuming the Fundraising Leader Contact has just said “Yes!” to the program, follow the steps at the page entitled ‘When They Say Yes!’.</li>
	</ol> 
             
        <br>
        
        <p class="indent">If you would like a word-for-word script with more details, please visit the “<a href="printshop.php">Printshop Library</a>” page.</p>
   		
	</div> <!--end column1-->
    
	      </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>