<?php
     include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
     $userID = $_SESSION['userId'];
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $pic = $row['picPath'];
?>

<!DOCTYPE html>
<head>
	<title>Your Fundraising Presentation</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
    <h1>The Fundraising Prospect Presentation</h1>
    <h5>On the Phone or In Person Sales Points/Scripts </h5>

	<div id>
      		<h5>Once you have your prospect’s attention, whether over the phone or in person, it’s time to give them your sales pitch. Here’s a Sales presentation guideline:  </h5>
      		
   			        
     		<p>
	        <h5> 1) You should always start your presentation by getting your Fundraising Leader Contact in front of a computer. Once they’re on their computer, have them go to www.GreatMoods.com.   </h5>
	        <h5> 2) When both you and the contact are looking at the homepage, you’re going to have them scroll
	         over ‘Fundraising Examples’ and then click on ‘band’. </h5>	        
	        <h5> 3) Once you’re both at the ‘band’ fundraising page, explain to them what exactly they’re looking at.  </h5>

	        <p> &nbsp&nbsp&nbsp  • Point out that every member of a GreatMoods Fundraising Program will get their own Personal Fundraising page (a lot like Facebook!).  </p>
	        <p> &nbsp&nbsp&nbsp  • Point out all the customizable aspects of the page: The banner at the top of the page, the customized photos, etc.  </p>
	        <p> &nbsp&nbsp&nbsp  • After you’ve explained the customizable aspects of the page, take some time to explain the GreatMoods Shopping Mall  </li>
	        <p> &nbsp&nbsp&nbsp&nbsp&nbsp  • Point out the stores sliding by and the list of our different shops on the right side of the screen.  </p>
	        <p> &nbsp&nbsp&nbsp&nbsp&nbsp  • Really emphasize that, unlike other fundraisers, we have hundreds of products for customers to choose from. So instead of buying something they don’t really care for, like cookie dough or gift wrap, they can support their fundraiser by buying things that they actually want all year! </p>
	        <h5> 4)  When you’re done explaining everything at the ‘band’ homepage, carry on with your GreatMoods Shopping Mall pitch by having your Fundraising Leader Contact click on the store called ‘Fun Fashion Boutique’. </h5>

	        <p> &nbsp&nbsp&nbsp&nbsp&nbsp  • Take a second to show off the store front</p>
	        <p> &nbsp&nbsp&nbsp&nbsp&nbsp  • Next, have the Fundraising Leader Contact click on ‘Scarves Scarves Scarves’ underneath the store window. This will take you to a page with dozens of various scarves. </p>
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  • Take a second to point out the variety of the scarves. Different styles, colors and materials.</p>
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  After you’ve shown off all the different scarves, have the Fundraising Leader Contact click on the scarf in the upper left hand corner, the blue one. </p>
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  Have the Fundraising Leader Contact scroll down to the checkout part of the screen. </p> 
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  Have the Fundraising Leader Contact click on ‘Checkout’. </p>
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  After your Fundraising Leader Contact clicks ‘Checkout’ you should both be looking at the ‘Ship To’ page. </p>
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  Emphasize that customers are able to send their purchase(s) wherever they want and GreatMoods takes care of the rest. This includes overseas. For example, if someone wants to send a scarf to their aunt as a gift, they can fill in their aunt’s information and the scarf will be sent directly to her. </p>	                
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •  Have the Fundraising Leader Contact click on the tab entitled ‘Personal Message’. This tab is located next to the ‘Send To’ tab. </p>	
                 <p>  &nbsp&nbsp&nbsp&nbsp&nbsp  •   Explain that you’re able to write a message that will be shipped with your package. This is a nice addition if you’re sending a gift to somepe.  </p>
                <p> &nbsp&nbsp&nbsp  • Next, have the Fundraising Leader Contact click on the tab entitled ‘Review Order’. This tab is located right next to the ‘Personal Message’ tab.</p>
                <p> &nbsp&nbsp&nbsp  • This page explains itself, but quickly point out that they’re looking at the review page before checking out.</p>
                <p> &nbsp&nbsp&nbsp  • Lastly, inform the Fundraising Leader Contact that all payments made through GreatMoods are done using PayPal.</p>
                
<h5> 5) Explain that PayPal is the most trusted online payment method in the world and that it’s super easy to use. Also, really emphasize that by using PayPal, every single purchase made to support their fundraiser is transferred to their group’s PayPal account, CASH NEXT DAY. That means the group has almost instant access to the money its members have earned. </h5>


<h5> 6) To wrap things up, have your Fundraising Leader Contact click on the ‘Fundraiser Homepage’ button to the left underneath that picture of a band student. At this point your GreatMoods website tour is complete. The last things you want to do before finishing up your appointment is review the 5 key strengths of the GreatMoods program. They are: </h5>
       <p>  1.	It’s Free. The program has never and will never cost anything to sign up. </p>
       <p> 2.	Although the option is still there, the GreatMoods Program doesn’t require door to door sales. Everything can be done from a laptop, cell phone or tablet. </p>
       <p>        •	Emphasize that people can have great success with their fundraiser(s) by using social media outlets such as Facebook and Twitter. By using social media, like Facebook and Twitter, fundraising members are able to post a link to their fundraiser’s website page for all of their Facebook friends and/or Twitter followers to see. </p>
       <p> 3.	Unlike other fundraisers, the GreatMoods Program has a wide variety of products to choose from. Including customized apparel, coffee & candy, sporting goods, women’s accessories…. And more! </p>
       <p> 4.	35% of every purchase is deposited, CASH NEXT DAY, into the group’s PayPal account (Make sure to point out that we can setup the PayPal account with them).  </p>
       <p> 5.	 GreatMoods delivers! You tell us where to send your purchase and we take care of the rest. </p>
    
                 	    
   	     <h5>7) After you’ve reviewed the 5 key points, make sure you answer any questions the Fundraising Leader Contact may have. Once you’re finished answering all their questions, you ask your big question…. “What do you think!?” </h5>

             <p> • If a question is asked that you don’t know the answer to, don’t guess, say something to the effect, “You know that is an excellent question, I’m not sure, but I’ll check it out when I get back to the office and get back to you.  Would you like me to call or email the answer?”</p>

            <h5> 8) Presuming the Fundraising Leader Contact has just said “Yes!” to the program, follow the steps at the page entitled ‘When They Say Yes!’.
</h5>

             
   		
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