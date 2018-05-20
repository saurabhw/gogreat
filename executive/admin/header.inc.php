<head>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/header_homepageStyles.css" rel="stylesheet" type="text/css">
</head>

<div id="headerMain">
	<a href="../index.php"><img id="banner" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
	<img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" />
	<div id="menuWrapper"> </div> <!--end menuWrapper-->
    
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
	                echo '<p class="forgotpw"><a href="../../recover.php">Forgot Password?</a><br />';
	                echo '<a href="">Register Now</a></p>';
	                echo '</div>';
	                
	            } elseif($_SESSION['LOGIN'] == "TRUE") {
	                include('../../includes/logout.inc.php');
	              }
	         ?>
	</div> <!--end login--> 
    
	<div id="mainNav">
      <ul id="menu">
        <li><a href=../"../index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="#" class="drop">Fundraising<br>Examples</a>
      <!-- Begin 4 columns Item -->
      <div class="dropdown_4columns">
      <!-- Begin 4 columns container -->
        <div class="col_1">
          <h3><a class="lead" href="">High School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
           <ul>
            <li><a href="../club_website_TQ_distributor.php?group=37">Band</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=123">BPA</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=38">Book Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=124">Booster Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=39">Chess Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=40">Choir</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=126">Class Trips</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=41">Debate</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=42">FBLA</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=43">Language Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=44">Library</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=45">National Art HS</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=46">National Honor Society</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=125">News Broadcasting</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=47">Prom Committee</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=48">PTA/PTO</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=49">Scholarship Counseling</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=50">School Counseling</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=51">Science &amp; Math Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=52">Student Council</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=53">Theatre</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=54">Yearbook</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="subHead" href="">Athletics</a></h3>
         <ul>
            <li><a href="../club_website_TQ_distributor.php?group=10">Baseball</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=12">Basketball, Boys</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=13">Basketball, Girls</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=14">Bowling</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=15">Cheerleading</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=16">Cross Country</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=129">Danceline</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=17">Football</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=18">Field Hockey</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=19">Golf, Boys</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=20">Golf, Girls</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=21">Gymnastics</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=22">Ice Hockey</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=24">Lacrosse</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=128">Power Lifting</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=26">Ski Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=28">Soccer</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=30">Softball</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=31">Swimming &amp; Diving</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=33">Tennis, Boys</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=34">Tennis, Girls</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=35">Track &amp; Field</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=36">Volleyball, Girls</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=127">Wrestling</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Middle School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=79">Band</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=80">Book Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=82">Booster Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=83">Chess Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=84">Choir</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=87">Library</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=88">PTA/PTO</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=90">Math & Science Club</a></li>
            </ul>
          <h3><a class="subHead" href="#">Athletics</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=55">Baseball</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=56">Basketball</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=58">Bowling</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=59">Cheerleading</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=60">Cross Country</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=61">Football</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=62">Field Hockey</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=63">Golf</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=65">Gymnastics</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=66">Ice Hockey</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=68">Lacrosse</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=71">Soccer</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=73">Softball</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=74">Swimming</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=75">Tennis</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=77">Track &amp; Field</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=78">Volleyball</a></li>
			<li><a href="../club_website_TQ_distributor.php?group=130">Wrestling</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Elementary School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=98">After School Programs</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=99">Band</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=100">Booster Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=107">Carnival</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=101">Choir</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=102">Class Field Trip</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=103">Library</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=104">Math Club</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=105">PTA/PTO</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=106">School Counseling</a></li>
            
          </ul>
          <h3><a class="subHead" href="">General Needs</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=110">Athletic Equipment </a></li>
            <li><a href="../club_website_TQ_distributor.php?group=109">General Fundraiser</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=111">Playground Equipment </a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="leadNoSub" href="">Religious <br />Orgnizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=112">Church</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=131">Mosque</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=133">Synagogue</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=136">Vacation Bible School</a></li>
			<li><a href="../club_website_TQ_distributor.php?group=137">Mission Trip</a></li>
		  </ul>
          <h3><a class="leadNoSub" href="">Community <br />Organizations</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=113">Fire Department</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=114">Jaycees</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=115">Knights of Columbus</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=116">Police Department</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Youth &amp; Sports</a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=118">Athletic Associations</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=119">Big Brothers/Big Sisters</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=120">Boy Scouts</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=138">Cub Scouts</a></li>
		<li><a href="../club_website_TQ_distributor.php?group=122">YMCA</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Local &amp; National <br />Charities </a></h3>
          <ul>
            <li><a href="../club_website_TQ_distributor.php?group=134">American Cancer Society</a></li>
            <li><a href="../club_website_TQ_distributor.php?group=135">Humane Society</a></li>
           </ul>
		</div><!-- End col_1 -->
      </div>
      <!-- End 4 columns container -->
		<li><a href="#" title="Page Not Created Yet">View Sales<br>Coordinators</a>
		<li><a href="coordSetupForm.php">Add Sales<br>Coordinators</a>
		<li><a href="#" title="Page Not Created Yet">Assign<br>Accounts</a>	
		<li><a href="#" title="Page Not Created Yet">Edit My<br>Account</a>	
	</ul>
	</div><!--end mainNav-->
</div><!--end headerMain-->
  