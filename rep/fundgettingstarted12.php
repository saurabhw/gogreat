<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         $student_leader_name = $row['student_leader'];
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
      }
?>

	<?php include 'header.inc.php'; ?>
  	<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
    <div id="column1b">
	<h1>GreatMoods Online Fundraising</h1>
    	<h3>New Trends in Fundraising</h3>
    
      <p>Everyone has a cell phone and Internet access today. It would be very hard to find anyone who has not shopped Online or ordered Online to make a purchase for the Holidays or for a Special Occasion Gift.</p>
      <p>Fundraising is about to change forever, from door to door sales of Candy, Cookie Dough and Gift Wrap being the primary means to raise money, to Online Fundraising. </p>
      <p>A good online Fundraising Program will ship all products ordered directly to the Customer or Recipient.</p>
	  <p>Online e-commerce has been growing at a rate of 15% to 25% for over a decade and will continue at that growth rate for decades to come. Online Fundraising is beginning a similar growth rate to that right now! </p>
	<h3>Online Fundraising with GreatMoods</h3>  
	  <p>Do you have a quality Online Fundraising Program and appropriate Product for Online Fundraising Sales? Can’t ship Cookie Dough, can’t ship one dollar Chocolate Bars, it would cost a fortune.</p>
	  <p>Products and Gifts from the GreatMoods Mall can be shipped Spring, Summer, Winter or Fall. GreatMoods Fundraising delivers it all.</p>
	  <p>This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
	  <p>Cash is Deposited Weekly on every order directly into your Group's PayPal Account 24/7/365 days a year.</p>	
	  <p>Browse our Fundraising Examples from the navigation bar above and see the Future of Fundraising.</p>
	</div>
    <!--end column1b-->
    
    <div id="column2b">
    <div><br>
    	<img src="../../images/rep-pages/oline.png" width="404" height="270" alt="Boyscouts">
	<img class="imgLeft" src="../../images/rep-pages/orchestracamp.png" width="198" height="166" alt="Stuents Playing Dodgeball">
	<img class="imgRight" src="../../images/rep-pages/kindergartenfieldtrip.png" width="198" height="166" alt="Elementary School Children">
    </div>
		
     <!--<h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div> -->
    </div> <!--end column2b--> 
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>