<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
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
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
         
          
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Organization Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <div id="login">
      <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="includes/logInUser.php" method="post">';
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
                include('includes/logout.inc.php');
              }
         ?>
    </div>
    <!--end login-->
    <div id="mainNav">
      <ul id="menu">
        <li><a href="setupEditWebsite2/disthome.php"> Homepage</a><li>
		<li><a href="#" class="drop">Fundraising <br/>Examples</a>
      <!-- Begin 4 columns Item -->
      <div class="dropdown_4columns">
      <!-- Begin 4 columns container -->
        <div class="col_1">
          <h3><a class="lead" href="">High School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
           <ul>
            <li><a href="club_website_TQ.php?group=37">Band</a></li>
            <li><a href="club_website_TQ.php?group=123">BPA</a></li>
            <li><a href="club_website_TQ.php?group=38">Book Club</a></li>
            <li><a href="club_website_TQ.php?group=124">Booster Club</a></li>
            <li><a href="club_website_TQ.php?group=39">Chess Club</a></li>
            <li><a href="club_website_TQ.php?group=40">Choir</a></li>
            <li><a href="club_website_TQ.php?group=126">Class Trips</a></li>
            <li><a href="club_website_TQ.php?group=41">Debate</a></li>
            <li><a href="club_website_TQ.php?group=42">FBLA</a></li>
            <li><a href="club_website_TQ.php?group=43">Language Club</a></li>
            <li><a href="club_website_TQ.php?group=44">Library</a></li>
            <li><a href="club_website_TQ.php?group=45">National Art HS</a></li>
            <li><a href="club_website_TQ.php?group=46">National Honor Society</a></li>
            <li><a href="club_website_TQ.php?group=125">News Broadcasting</a></li>
            <li><a href="club_website_TQ.php?group=47">Prom Committee</a></li>
            <li><a href="club_website_TQ.php?group=48">PTA/PTO</a></li>
            <li><a href="club_website_TQ.php?group=49">Scholarship Counseling</a></li>
            <li><a href="club_website_TQ.php?group=50">School Counseling</a></li>
            <li><a href="club_website_TQ.php?group=51">Science &amp; Math Club</a></li>
            <li><a href="club_website_TQ.php?group=52">Student Council</a></li>
            <li><a href="club_website_TQ.php?group=53">Theatre</a></li>
            <li><a href="club_website_TQ.php?group=54">Yearbook</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="subHead" href="">Athletics</a></h3>
         <ul>
            <li><a href="club_website_TQ.php?group=10">Baseball</a></li>
            <li><a href="club_website_TQ.php?group=12">Basketball, Boys</a></li>
            <li><a href="club_website_TQ.php?group=13">Basketball, Girls</a></li>
            <li><a href="club_website_TQ.php?group=14">Bowling</a></li>
            <li><a href="club_website_TQ.php?group=15">Cheerleading</a></li>
            <li><a href="club_website_TQ.php?group=16">Cross Country</a></li>
            <li><a href="club_website_TQ.php?group=129">Danceline</a></li>
            <li><a href="club_website_TQ.php?group=17">Football</a></li>
            <li><a href="club_website_TQ.php?group=18">Field Hockey</a></li>
            <li><a href="club_website_TQ.php?group=19">Golf, Boys</a></li>
            <li><a href="club_website_TQ.php?group=20">Golf, Girls</a></li>
            <li><a href="club_website_TQ.php?group=21">Gymnastics</a></li>
            <li><a href="club_website_TQ.php?group=22">Ice Hockey</a></li>
            <li><a href="club_website_TQ.php?group=24">Lacrosse</a></li>
            <li><a href="club_website_TQ.php?group=128">Power Lifting</a></li>
            <li><a href="club_website_TQ.php?group=26">Ski Club</a></li>
            <li><a href="club_website_TQ.php?group=28">Soccer</a></li>
            <li><a href="club_website_TQ.php?group=30">Softball</a></li>
            <li><a href="club_website_TQ.php?group=31">Swimming &amp; Diving</a></li>
            <li><a href="club_website_TQ.php?group=33">Tennis, Boys</a></li>
            <li><a href="club_website_TQ.php?group=34">Tennis, Girls</a></li>
            <li><a href="club_website_TQ.php?group=35">Track &amp; Field</a></li>
            <li><a href="club_website_TQ.php?group=36">Volleyball, Girls</a></li>
            <li><a href="club_website_TQ.php?group=127">Wrestling</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Middle School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=79">Band</a></li>
            <li><a href="club_website_TQ.php?group=80">Book Club</a></li>
            <li><a href="club_website_TQ.php?group=82">Booster Club</a></li>
            <li><a href="club_website_TQ.php?group=83">Chess Club</a></li>
            <li><a href="club_website_TQ.php?group=84">Choir</a></li>
            <li><a href="club_website_TQ.php?group=87">Library</a></li>
            <li><a href="club_website_TQ.php?group=88">PTA/PTO</a></li>
            <li><a href="club_website_TQ.php?group=90">Math & Science Club</a></li>
            </ul>
          <h3><a class="subHead" href="#">Athletics</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=55">Baseball</a></li>
            <li><a href="club_website_TQ.php?group=56">Basketball</a></li>
            <li><a href="club_website_TQ.php?group=58">Bowling</a></li>
            <li><a href="club_website_TQ.php?group=59">Cheerleading</a></li>
            <li><a href="club_website_TQ.php?group=60">Cross Country</a></li>
            <li><a href="club_website_TQ.php?group=61">Football</a></li>
            <li><a href="club_website_TQ.php?group=62">Field Hockey</a></li>
            <li><a href="club_website_TQ.php?group=63">Golf</a></li>
            <li><a href="club_website_TQ.php?group=65">Gymnastics</a></li>
            <li><a href="club_website_TQ.php?group=66">Ice Hockey</a></li>
            <li><a href="club_website_TQ.php?group=68">Lacrosse</a></li>
            <li><a href="club_website_TQ.php?group=71">Soccer</a></li>
            <li><a href="club_website_TQ.php?group=73">Softball</a></li>
            <li><a href="club_website_TQ.php?group=74">Swimming</a></li>
            <li><a href="club_website_TQ.php?group=75">Tennis</a></li>
            <li><a href="club_website_TQ.php?group=77">Track &amp; Field</a></li>
            <li><a href="club_website_TQ.php?group=78">Volleyball</a></li>
			<li><a href="club_website_TQ.php?group=130">Wrestling</a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="lead" href="">Elementary School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=98">After School Programs</a></li>
            <li><a href="club_website_TQ.php?group=99">Band</a></li>
            <li><a href="club_website_TQ.php?group=100">Booster Club</a></li>
            <li><a href="club_website_TQ.php?group=107">Carnival</a></li>
            <li><a href="club_website_TQ.php?group=101">Choir</a></li>
            <li><a href="club_website_TQ.php?group=102">Class Field Trip</a></li>
            <li><a href="club_website_TQ.php?group=103">Library</a></li>
            <li><a href="club_website_TQ.php?group=104">Math Club</a></li>
            <li><a href="club_website_TQ.php?group=105">PTA/PTO</a></li>
            <li><a href="club_website_TQ.php?group=106">School Counseling</a></li>
            
          </ul>
          <h3><a class="subHead" href="">General Needs</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=110">Athletic Equipment </a></li>
            <li><a href="club_website_TQ.php?group=109">General Fundraiser</a></li>
            <li><a href="club_website_TQ.php?group=111">Playground Equipment </a></li>
          </ul>
		</div><!-- End col_1 -->
        <div class="col_1">
          <h3><a class="leadNoSub" href="">Religious <br />Orgnizations</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=112">Church</a></li>
            <li><a href="club_website_TQ.php?group=131">Mosque</a></li>
            <li><a href="club_website_TQ.php?group=133">Synagogue</a></li>
            <li><a href="club_website_TQ.php?group=136">Vacation Bible School</a></li>
			<li><a href="club_website_TQ.php?group=137">Mission Trip</a></li>
		  </ul>
          <h3><a class="leadNoSub" href="">Community <br />Organizations</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=113">Fire Department</a></li>
            <li><a href="club_website_TQ.php?group=114">Jaycees</a></li>
            <li><a href="club_website_TQ.php?group=115">Knights of Columbus</a></li>
            <li><a href="club_website_TQ.php?group=116">Police Department</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Youth &amp; Sports</a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=118">Athletic Associations</a></li>
            <li><a href="club_website_TQ.php?group=119">Big Brothers/Big Sisters</a></li>
            <li><a href="club_website_TQ.php?group=120">Boy Scouts</a></li>
            <li><a href="club_website_TQ.php?group=138">Cub Scouts</a></li>
			<li><a href="club_website_TQ.php?group=122">YMCA</a></li>

          </ul>
          <h3><a class="leadNoSub" href="">Local &amp; National <br />Charities </a></h3>
          <ul>
            <li><a href="club_website_TQ.php?group=134">American Cancer Society</a></li>
            <li><a href="club_website_TQ.php?group=135">Humane Society</a></li>
           </ul>
		</div><!-- End col_1 -->
      </div>
      <!-- End 4 columns container -->
		<li><a href="basketsproducts.php">Gift Basket <br/>& Products</a></li>
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting <br/>Started</a></li>-->
    <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <!--<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>-->
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <?php include 'navigation/leftSidebarNavFundraiser.php'; ?>

  <div id="content">
    </br>
	<h3>Setup/Edit Members Screen Example</h3>
    
    <div>
    	<br>
	<img src="../images/setup-edit_screens/setupeditmembers.png" width="810" height="768" alt="Setup/Edit Members Example">
    </div> <!--end column1-->

  </div> <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>