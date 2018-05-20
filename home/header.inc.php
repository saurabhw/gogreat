<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}?><head>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/header_homepageStyles.css" rel="stylesheet" type="text/css">
</head>

<div id="container">
  <div id="headerMain"> <a href="index.php"><img id="banner" src="../images/header_LogoRedBackground.png" width="1024" height="150" alt="GreatMoods: Great Fundraising!" /> 		  </a>
  <img id="collage" src="../images/Header-Banner_Homepage-Collage.png" width="1024" height="150" alt=Photo Collage" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
        <div id="login">
        <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="../logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
                echo '<a href="">Register Now</a></p>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('logout.inc.php');
              }
         ?>
      </div>
    <!--end login--> 
    
    <div id="mainNav">
      <ul id="menu">
        <li><a href="../index.php">GreatMoods <br/>Homepage</a></li>
        <li><a href="#" class="drop">Fundraising <br/>Examples</a>
      <!-- Begin 4 columns Item -->
      <div class="dropdown_4columns">
      <!-- Begin 4 columns container -->
        <div class="col_1">
          <h3><a class="lead" href="">High School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
           <ul>
            <li><a href="../club_website_TQ.php?group=37">Band</a></li>
            <li><a href="../club_website_TQ.php?group=123">BPA</a></li>
            <li><a href="../club_website_TQ.php?group=38">Book Club</a></li>
            <li><a href="../club_website_TQ.php?group=124">Booster Club</a></li>
            <li><a href="../club_website_TQ.php?group=39">Chess Club</a></li>
            <li><a href="../club_website_TQ.php?group=40">Choir</a></li>
            <li><a href="../club_website_TQ.php?group=126">Class Trips</a></li>
            <li><a href="../club_website_TQ.php?group=41">Debate</a></li>
            <li><a href="../club_website_TQ.php?group=42">FBLA</a></li>
            <li><a href="../club_website_TQ.php?group=43">Language Club</a></li>
            <li><a href="../club_website_TQ.php?group=44">Library</a></li>
            <li><a href="../club_website_TQ.php?group=45">National Art HS</a></li>
            <li><a href="../club_website_TQ.php?group=46">National Honor Society</a></li>
            <li><a href="../club_website_TQ.php?group=125">News Broadcasting</a></li>
            <li><a href="../club_website_TQ.php?group=47">Prom Committee</a></li>
            <li><a href="../club_website_TQ.php?group=48">PTA/PTO</a></li>
            <li><a href="../club_website_TQ.php?group=49">Scholarship Counseling</a></li>
            <li><a href="../club_website_TQ.php?group=50">School Counseling</a></li>
            <li><a href="../club_website_TQ.php?group=51">Science &amp; Math Club</a></li>
            <li><a href="../club_website_TQ.php?group=52">Student Council</a></li>
            <li><a href="../club_website_TQ.php?group=53">Theatre</a></li>
            <li><a href="../club_website_TQ.php?group=54">Yearbook</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="subHead" href="">Athletics</a></h3>
         <ul>
            <li><a href="../club_website_TQ.php?group=10">Baseball</a></li>
            <li><a href="../club_website_TQ.php?group=12">Basketball, Boys</a></li>
            <li><a href="../club_website_TQ.php?group=13">Basketball, Girls</a></li>
            <li><a href="../club_website_TQ.php?group=14">Bowling</a></li>
            <li><a href="../club_website_TQ.php?group=15">Cheerleading</a></li>
            <li><a href="../club_website_TQ.php?group=16">Cross Country</a></li>
            <li><a href="../club_website_TQ.php?group=129">Danceline</a></li>
            <li><a href="../club_website_TQ.php?group=17">Football</a></li>
            <li><a href="../club_website_TQ.php?group=18">Field Hockey</a></li>
            <li><a href="../club_website_TQ.php?group=19">Golf, Boys</a></li>
            <li><a href="../club_website_TQ.php?group=20">Golf, Girls</a></li>
            <li><a href="../club_website_TQ.php?group=21">Gymnastics</a></li>
            <li><a href="../club_website_TQ.php?group=22">Ice Hockey</a></li>
            <li><a href="../club_website_TQ.php?group=24">Lacrosse</a></li>
            <li><a href="../club_website_TQ.php?group=128">Power Lifting</a></li>
            <li><a href="../club_website_TQ.php?group=26">Ski Club</a></li>
            <li><a href="../club_website_TQ.php?group=28">Soccer</a></li>
            <li><a href="../club_website_TQ.php?group=30">Softball</a></li>
            <li><a href="../club_website_TQ.php?group=31">Swimming &amp; Diving</a></li>
            <li><a href="../club_website_TQ.php?group=33">Tennis, Boys</a></li>
            <li><a href="../club_website_TQ.php?group=34">Tennis, Girls</a></li>
            <li><a href="../club_website_TQ.php?group=35">Track &amp; Field</a></li>
            <li><a href="../club_website_TQ.php?group=36">Volleyball, Girls</a></li>
            <li><a href="../club_website_TQ.php?group=127">Wrestling</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Middle School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=79">Band</a></li>
            <li><a href="../club_website_TQ.php?group=80">Book Club</a></li>
            <li><a href="../club_website_TQ.php?group=82">Booster Club</a></li>
            <li><a href="../club_website_TQ.php?group=83">Chess Club</a></li>
            <li><a href="../club_website_TQ.php?group=84">Choir</a></li>
            <li><a href="../club_website_TQ.php?group=87">Library</a></li>
            <li><a href="../club_website_TQ.php?group=88">PTA/PTO</a></li>
            <li><a href="../club_website_TQ.php?group=90">Math & Science Club</a></li>
            </ul>
          <h3><a class="subHead" href="#">Athletics</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=55">Baseball</a></li>
            <li><a href="../club_website_TQ.php?group=56">Basketball</a></li>
            <li><a href="../club_website_TQ.php?group=58">Bowling</a></li>
            <li><a href="../club_website_TQ.php?group=59">Cheerleading</a></li>
            <li><a href="../club_website_TQ.php?group=60">Cross Country</a></li>
            <li><a href="../club_website_TQ.php?group=61">Football</a></li>
            <li><a href="../club_website_TQ.php?group=62">Field Hockey</a></li>
            <li><a href="../club_website_TQ.php?group=63">Golf</a></li>
            <li><a href="../club_website_TQ.php?group=65">Gymnastics</a></li>
            <li><a href="../club_website_TQ.php?group=66">Ice Hockey</a></li>
            <li><a href="../club_website_TQ.php?group=68">Lacrosse</a></li>
            <li><a href="../club_website_TQ.php?group=71">Soccer</a></li>
            <li><a href="../club_website_TQ.php?group=73">Softball</a></li>
            <li><a href="../club_website_TQ.php?group=74">Swimming</a></li>
            <li><a href="../club_website_TQ.php?group=75">Tennis</a></li>
            <li><a href="../club_website_TQ.php?group=77">Track &amp; Field</a></li>
            <li><a href="../club_website_TQ.php?group=78">Volleyball</a></li>
			<li><a href="../club_website_TQ.php?group=130">Wrestling</a></li>
		  </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Elementary School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=98">After School Programs</a></li>
            <li><a href="../club_website_TQ.php?group=99">Band</a></li>
            <li><a href="../club_website_TQ.php?group=100">Booster Club</a></li>
            <li><a href="../club_website_TQ.php?group=107">Carnival</a></li>
            <li><a href="../club_website_TQ.php?group=101">Choir</a></li>
            <li><a href="../club_website_TQ.php?group=102">Class Field Trip</a></li>
            <li><a href="../club_website_TQ.php?group=103">Library</a></li>
            <li><a href="../club_website_TQ.php?group=104">Math Club</a></li>
            <li><a href="../club_website_TQ.php?group=105">PTA/PTO</a></li>
            <li><a href="../club_website_TQ.php?group=106">School Counseling</a></li>
            <li><a href="../club_website_TQ.php?group=108">Science Club</a></li>
          </ul>
          <h3><a class="subHead" href="">General Needs</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=110">Athletic Equipment </a></li>
            <li><a href="../club_website_TQ.php?group=109">General Fundraiser</a></li>
            <li><a href="../club_website_TQ.php?group=111">Playground Equipment </a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="leadNoSub" href="">Religious <br />Orgnizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=112">Church</a></li>
            <li><a href="../club_website_TQ.php?group=131">Mosque</a></li>
            <li><a href="../club_website_TQ.php?group=133">Synagogue</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Community <br />Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=113">Fire Department</a></li>
            <li><a href="../club_website_TQ.php?group=114">Jaycees</a></li>
            <li><a href="../club_website_TQ.php?group=115">Knights of Columbus</a></li>
            <li><a href="../club_website_TQ.php?group=116">Police Department</a></li>
            <li><a href="../club_website_TQ.php?group=117">Rotary Club</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Youth &amp; Sports</a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=118">Athletic Associations</a></li>
            <li><a href="../club_website_TQ.php?group=119">Big Brothers/Big Sisters</a></li>
            <li><a href="../club_website_TQ.php?group=120">Boy Scouts</a></li>
            <li><a href="../club_website_TQ.php?group=121">Girl Scouts</a></li>
            <li><a href="../club_website_TQ.php?group=122">YMCA</a></li>

          </ul>
          <h3><a class="leadNoSub" href="">Local &amp; National <br />Charities </a></h3>
          <ul>
            <li><a href="../club_website_TQ.php?group=134">Breast Cancer Research</a></li>
            <li><a href="../club_website_TQ.php?group=135">Humane Society</a></li>
           </ul>
		</div><!-- End col_1 -->
      </div>
      <!-- End 4 columns container -->
        <li><a href="home/basketsproducts.php">Gift Baskets<br>& Products</a></li>
		<li><a href="#">Getting <br/>Started</a></li>
		<li><a href="#" class="drop">Help </a>
		<div class="dropdown_4columns">	
			<div class="col_1">
				<h3><a class="lead" href="#">Getting Started</a></h3>
				<ul>
					<li><a href="#">Band</a></li>
					<li><a href="#">Band</a></li>
					<li><a href="#">Band</a></li>
				</ul>	
			</div><!-- End col_1 -->
			<div class="col_1">
			<h3><a class="lead" href="">Forms</a></h3>	
				<ul>
					<li><a href="#">Band</a></li>
					<li><a href="#">Band</a></li>
					<li><a href="#">Band</a></li>
				</ul>
			</div><!-- End col_1 -->
	  
			</div><!-- End dropdown_4columns -->
	  </ul>
    </div><!--end mainNav-->
    

  </div><!--end headerMain-->
  