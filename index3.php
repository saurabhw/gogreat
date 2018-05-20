<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Homepage</title>
	<style>
	@import url('https://fonts.googleapis.com/css?family=Roboto');
	</style>
	<script>
	  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
	</script>
</head>

<body>
<!--<div id="container">-->
 <?php include 'includes/header.inc.php'; ?>



<section id="homecards" class="row-flex">
	<div class="container"> 
      <div class="img-card col-xs-12 col-sm-12 col-md-5 col-lg-5" id="img-card-one">
        <!-- link wrapped to allow for image and title to be clicked -->
        <a class="cardlink" href="../gettingstarted_sendemail.php">
        <h2 class="card-title text-center">Start a Fundraiser!</h2>
        <img class="img-responsive cardimage" src=“../images/Team-Pic.jpg“>
        </a> <!-- end link wrap | card information will not be clickable -->
          <div class="imgcard-info">
            <h3 class="hvr-underline-from-center text-center" style=“color:black;”><span>Contact a Rep and get started today!</span></h3>
            <div class="cardbody">GreatMoods is here to help you reach your fundraising goals!  Let us set up your free fundraiser and personalized websites for each member.  <br> <br>Everyone is welcome to set up fundraisers for schools, faith-based groups, and various organizations. Fundraising has never been this fun and convenient! GreatMoods is excited to help you reach your goals and dreams!  Success is just a click away!</div>
			     <a href="../gettingstarted_sendemail.php"><button class="access btn btn-primary hidden-lg hidden-md ">Contact a Rep</button></a>
          </div> <!--end imgcard-info-->
      </div> <!-- end imgcard -->

	  <!-- link wrapped to allow for image and title to be clicked -->
       <div class="img-card col-xs-12 col-sm-12 col-md-5 col-md-push-2 col-lg-5 col-lg-push-2"  id="img-card-two">
         	<a href="../greatmoodsMall.php">
          <h2 class="card-title text-center">Support a Fundraiser!</h2>
          <img class="img-responsive cardimage" src=“../images/Fundraiser-HP.jpg“>
          <div class="imgcard-info">
              <h3 class="hvr-underline-from-center text-center" style=“color:black;”><span>Come shop at the GreatMoods Mall!</span></h3>
          </a><!-- end link wrap | card information will not be clickable -->
              <div class="cardbody">Show your support by shopping at the GreatMoods Mall which contains over 100 different stores with a variety of over 20,000 different products.  This means that there is something for everyone! <br><br> There are even name-brand products, in-style and seasonal goods, and new items being added regularly.  A total of 35% of each purchase you make goes directly to the fundraiser you are supporting! </div>
          	  <a href="../greatmoodsMall.php" ><button class="access btn btn-primary hidden-lg hidden-md ">Start Shopping</button></a>
          </div> <!-- end image card info -->
      </div> <!-- end image card -->
</section> <!-- end section homecards -->

<section class="row row-flex"><br>
  		<div class="jumbotron container-fluid">
            <h1 class="hvr-underline-from-center" style="text-indent:10px">About GreatMoods Fundraising</h1><br>
            <span class="col-flex-item divider"></span>
            <p>Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!</p>
  			    <p>Cash is Deposited every week into your Group's PayPal Account on every individual sale (which is 35% of the Retail Price) and best of all We Deliver! Everything! Everywhere! 24/7/365 days a year!</p>
            <p><a href="../welcome.php" class="btn btn-primary">Read more</a></p>
        </div>
</section>

<!------------------------- work in progress ----------------------->
<!--<div class-"container">-->
<!-- Nav tabs -->
<!--<ul class="nav nav-tabs" role="tablist">-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">GreatMoods Overview</a>-->
<!--  </li>-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">GreatMoods Mission</a>-->
<!--  </li>-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">GreatMoods Online Fundraising</a>-->
<!--  </li>-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Strengths of the GreatMoods Program</a>-->
<!--  </li>-->
<!--</ul>-->

<!-- Tab panes -->
<!--<div class="tab-content">-->
<!--  <div class="tab-pane" id="home" role="tabpanel">  -->
<!--    <p class="card-text">View a slide show that will show you everything you need to know about the GreatMoods program.</p>-->
<!--    <a href="gm_programoverview.php" class="btn btn-primary">View the Full Overview</a>-->
<!--  </div>-->
<!--  <div class="tab-pane" id="profile" role="tabpanel">    -->
<!--    <p class="card-text">Our mission statement is simple. Achieving success for your fundraising goals!</p>-->
<!--    <a href="mission.php" class="btn btn-primary">Read Full Mission Statement</a>-->
<!--  </div>-->
<!--    <div class="tab-pane" id="messages" role="tabpanel">   -->
<!--    <p class="card-text">Learn about the new trends in fundraising, and stay up to do date with your fundraising goals using the GreatMoods program!</p>-->
<!--    <a href="onlinefundraising.php" class="btn btn-primary">Read More</a>-->
<!--  </div>-->
<!--  <div class="tab-pane" id="messages" role="tabpanel">   -->
<!--    <p class="card-text">Learn about the strengths of the GreatMoods Program! There are 10 good reasons to do fundraising online with GreatMoods!</p>-->
<!--    <a href="program.php" class="btn btn-primary">Read more about GreatMoods Strengths</a>-->
<!--    </div>-->
<!--</div>-->
</div>

<!--Item slider text-->
<!--<div class="container">-->
<!--  <div class="row" id="slider-text">-->
<!--    <div class="col-md-6" >-->
<!--      <h2>Featured Products</h2>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!-- Item slider-->
<!--<section class="container-fluid" id="item-showcase" >-->
<!--  <div class="row" style="margin-bottom:10em">-->
<!--    <div class="col-xs-12 col-sm-12 col-md-12">-->
<!--      <div class="carousel carousel-showmanymoveone slide" id="itemslider">-->
<!--        <div class="carousel-inner">-->

<!--          <div class="item active">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="http://wiscopnu.com/store/skin/frontend/default/grayscale_blue/images/catimgs_sweatshirtspants-fullzip.jpg" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product1</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="item">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="https://www.chk-shield.com/out/pictures/generated/product/1/180_260_60/under-armour-beanie-coldgear-storm-2.0-oliv.jpg" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product2</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="item">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="https://s5.sywcdn.net/getImage?url=http%3A%2F%2Fc.shld.net%2Frpx%2Fi%2Fs%2Fi%2Fspin%2Fimage%2Fspin_prod_1018424712&t=Product&w=180&h=180&qlt=90&mrg=1&mh=200&mhmcw=0&s=69eb6f196a6c58fad7e28028515213e4" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product3</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="item">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="https://s12.postimg.org/5w7ki5z4t/item_4_180x200.png" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product4</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="item">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="https://s5.sywcdn.net/getImage?url=http%3A%2F%2Fc.shld.net%2Frpx%2Fi%2Fs%2Fi%2Fspin%2F10131809%2Fprod_2064505312&t=Product&w=180&h=180&qlt=90&mrg=1&mh=200&mhmcw=0&s=c9f0e1f3305214f5e62cd45a2adf3c6c" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product5</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="item">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-2">-->
<!--              <a href="#"><img src="https://sep.yimg.com/ay/yhst-50333102007840/skirt-sports-women-s-fitness-redemption-capri-136.gif" class="img-responsive center-block"></a>-->
<!--              <h4 class="text-center">Product6</h4>-->
<!--              <h5 class="text-center">$9.99</h5>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->

<!--        <div id="slider-control">-->
<!--        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>-->
<!--        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>-->
<!--      </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

 <?php include 'footer.php'; ?>
</body>
</html>


<?php
ob_end_flush();
?>