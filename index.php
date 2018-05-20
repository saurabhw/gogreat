<?php
	session_start();
	ob_start();
	error_reporting(0);
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Homepage</title>
</head>

<body>
    
<?php include 'includes/header.inc.php'; ?>
<?php include 'navigation/fullSidebar_home.php'; ?>


    <div class="container">
    	 <section id="homecards" class="row center-block"> 
          <div class="img-card col-xs-12  col-sm-5 col-md-5 col-lg-5" id="img-card-one">
            <!-- link wrapped to allow for image and title to be clicked -->
            <a class="cardlink" href="welcome.php">
            <h2 class="card-title text-center">Start a Fundraiser!</h2>
            <img class="img-responsive cardimage" src="images/Team-Pic.jpg">
            </a> <!-- end link wrap | card information will not be clickable -->
              <div class="imgcard-info">
                <h3 class="hvr-underline-from-center text-center"><span style="color:black;">Contact a Rep and get started today!</span></h3>
                <div class="cardbody">GreatMoods is here to help you reach your fundraising goals!  Let us set up your free fundraiser and personalized websites for each member.  <br> <br>Everyone is welcome to set up fundraisers for schools, faith-based groups, and various organizations. Fundraising has never been this fun and convenient! GreatMoods is excited to help you reach your goals and dreams!  Success is just a click away!</div>
    			     <a href="gettingstarted_sendemail.php"><button class="access btn btn-primary">Learn More!</button></a><!-- refernce tab btns for centering completely -->
              </div> <!--end imgcard-info-->
          </div> <!-- end imgcard -->
    
    	  <!-- link wrapped to allow for image and title to be clicked -->
           <div class="img-card col-xs-12 col-sm-5 col-sm-push-2 col-md-5 col-md-push-2 col-lg-5 col-lg-push-2"  id="img-card-two">
             	<a href="search.php">
              <h2 class="card-title text-center">Fundraiser Search!</h2>
              <img class="img-responsive cardimage" src="images/Fundraiser-HP.jpg">
              <div class="imgcard-info">
                  <h3 class="hvr-underline-from-center text-center"><span style="color:black;">Find a Fundraiser to Support!</span></h3>
              </a><!-- end link wrap | card information will not be clickable -->
                  <div class="cardbody">Show your support by shopping at the GreatMoods Mall which contains over 100 different stores with a variety of over 20,000 different products.  This means that there is something for everyone! <br><br> There are even name-brand products, in-style and seasonal goods, and new items being added regularly.  A total of 35% of each purchase you make goes directly to the fundraiser you are supporting! </div>
              	  <a href="search.php" ><button class="access btn btn-primary">Support a Fundraiser</button></a>
              </div> <!-- end image card info -->
          </div> <!-- end image card -->
        </section> <!-- end section homecards -->
    </div>
    

    <section class="container">
        <div class="row">
      		<div class="jumbotron">
                <h1 style="text-align:center !important" class="hvr-underline-from-center">About GreatMoods Fundraising</h1><br>
                <!--<span class="col-flex-item divider"></span>-->
                <!--<p>Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!</p>-->
                <!--<p><br><a href="gm_programoverview.php" class="btn btn-primary">Read more</a></p>-->
            </div>
        </div>
    </section>
    
        <div class="container">
        <div class="panel panel-default" id="info-pannel" style="margin-top:-10.3em;border: 2px solid #cc0000 !important;border-radius: 0px 0px 10px 10px;-webkit-box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);/* box-shadow: 0px 2px 13px rgba(0, 0, 0, .75) !important; */">
            
            <!--<div class="panel-heading hidden-sm hidden-xs">-->
            <!--    <h3 class="panel-title">More Information About the GreatMoods Program</h3>-->
            <!--</div>-->
            
            <div class="panel-body">
             <!--Nav tabs -->
                <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                  <li class="test-class active"><a class="white" href="#trends">GreatMoods Fundraising</a></li>
                  <li class="test-class"><a class="white" href="#strengths">Strengths of GreatMoods</a></li>
                  <li class="test-class"><a class="white" href="#mission">GreatMoods Mission</a></li>
                  <li class="test-class"><a class="white" href="#calc">Calculate Your Success!</a></li>
                  <li class="test-class"><a class="white" href="#steps">Steps to Success!</a></li>
                </ul>
                
                 <!--Tab panes -->
                <div class="tab-content responsive hidden-xs hidden-sm">
                    <div class="tab-pane active" id="trends" role="tabpanel" >   
                        <p class="card-text">Do you have a quality Online Fundraising Program and appropriate Product for Online Fundraising Sales?</p>
                        <p class="card-text">Products and Gifts from the GreatMoods Mall can be shipped Spring, Summer, Winter or Fall. GreatMoods Fundraising delivers it all. This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
                        <p class="card-text">Cash is Deposited Weekly on every order directly into your Group's PayPal Account 24/7/365 days a year.</p>
                        <p class="card-text">Browse our Fundraising Examples from the navigation bar above and see the Future of Fundraising.</p>
                        <a id="tabButton" href="onlinefundraising.php" class="btn btn-primary">Read More</a>
                    </div>
                    
                    <div class="tab-pane" id="strengths" role="tabpanel">   
                        <p class="card-text">Learn about the strengths of the GreatMoods Program! There are 10 good reasons to do fundraising online using the GreatMoods Program!</p>
                        <a  id="tabButton" href="program.php" class="btn btn-primary align-content-center">GreatMoods Strengths</a>
                    </div>
                    <div class="tab-pane " id="mission" role="tabpanel">    
                        <p class="card-text">Our mission statement is simple. Achieving success for your fundraising goals!</p>
                        <a id="tabButton" href="mission.php" class="btn btn-primary">Read Full Mission Statement</a>
                    </div>

                    <div class="tab-pane" id="calc" role="tabpanel">  
                        <p class="card-text">A simple to use calculator that will allow you to find out how much money you can raise using the GreatMoods Program.</p>
                        <a id="tabButton" href="calculator.php" class="btn btn-primary">Use Calculator</a>
                    </div>
                    <div class="tab-pane" id="steps" role="tabpanel">
                        <p class="card-text">The GreatMoods Program allows all of the Fundraising to take place online with our Simple 3 Step Setup.</p> 
                        <blockquote class="card-text">Step 1) Setup Website Example</blockquote>
                        <blockquote class="card-text">Step 2) Setup Members Example</blockquote>
                        <blockquote class="card-text">Step 3) Setup E-Mails Example</blockquote>
                        <a id="tabButton" href="easysetup.php" class="btn btn-primary">Learn More About the Steps Involved</a>
                    </div>
                </div>
            </div><!--end pannel body--> 
        </div> <!-- end pannel -->
    </div><!--end container  -->

<?php include 'footer.php'; ?>
 
    <!-- add repsonsive tabs and accordion conversion at small/xs viewport width | full code for this inside responsive-tabs.js file -->
    <script src="js/responsive-tabs.js"></script>
    <script>
        // show tab content on navtab click events
        $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
            e.preventDefault();
            $( this ).tab( 'show' );
            } );
        
        // convert tabs into accordion dropdown for a clean responsive layout of this content - navtabs look poor on mobile screen 
            ( function( $ ) {
              // Test for making sure event are maintained
              fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
        } )( jQuery );
    </script>
</body>
</html>


<?php
ob_end_flush();
?>