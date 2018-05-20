<link href="../css/header1Styles.css" rel="stylesheet" type="text/css">

<div id="headerMain">
  <<div id="container">
  <div id="headerMain"> <a href="index.php"><img id="banner" src="../images/header_LogoRedBackground.png" width="1024" height="150" alt="GreatMoods: Great Fundraising!" /> 		  </a>
  <img id="collage" src="../images/Header-Banner_Homepage-Collage.png" width="1024" height="150" alt=Photo Collage" />
    <div id="menuWrapper"> </div>
    <?php
					if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
						echo "<span style='position: relative; top: 20px; left: 20px; '>";
						echo '<form id="log" action="logInUser.php" method="post">';
						echo '<label id="user">username: </label><input type="text" name="enter your name" id="user" value=""><br />';
                        echo '<label id="user">password: </label> <input type="password" name="password" id="password" value="" ><br />';
                        echo '<input id="user" type="submit" value="login" />';
                        echo '<p class="user"><a href="">Forgot Password?</a><br />  <a href="">Register</a></p>';
                       echo '</form></span>';
					} elseif($_SESSION['LOGIN'] == "TRUE") {
						echo "<span style='position:absolute; top: 160px; left: 40px;'><form action='../logout.php' method='LINK'>";
						echo "<input type='submit' value='Logout' /></form></span>";
					}
					?>
  </div>
  <div id="menuWrapper"> </div>
  <!--end headerArc-->
  
  <ul id="menu">
    <li><a href="../index.php">Welcome</a></li>
    <li><a href="#" class="drop">Sample Website<br/>
      Fundraisers</a><!-- Begin 4 columns Item -->
      <div class="dropdown_4columns"><!-- Begin 4 columns container -->
        <div class="col_1">
          <h3><a class="lead" href="">High School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="#">Band</a></li>
            <li><a href="#">BPA</a></li>
            <li><a href="#">Book Club</a></li>
            <li><a href="#">Booster Club</a></li>
            <li><a href="#">Chess Club</a></li>
            <li><a href="#">Choir</a></li>
            <li><a href="#">Class Trips</a></li>
            <li><a href="#">Debate</a></li>
            <li><a href="#">FBLA</a></li>
            <li><a href="#">Language Club</a></li>
            <li><a href="#">Library</a></li>
            <li><a href="#">National Art HS</a></li>
            <li><a href="#">National Honor Society</a></li>
            <li><a href="#">Prom Committee</a></li>
            <li><a href="#">PTA/PTO</a></li>
            <li><a href="#">Scholars Bowl</a></li>
            <li><a href="#">Scholarship Counseling</a></li>
            <li><a href="#">School Counseling</a></li>
            <li><a href="#">Science &amp; Math Club</a></li>
            <li><a href="#">Student Council</a></li>
            <li><a href="#">Theatre</a></li>
            <li><a href="#">Yearbook</a></li>
            <li><a href="#">News Broadcasting</a></li>
          </ul>
        </div>
        <div class="col_1">
          <h3><a class="subHead" href="">Athletics</a></h3>
          <ul>
            <li><a href="#">Baseball</a></li>
            <li><a href="#">Basketball, Boys</a></li>
            <li><a href="#">Basketball, Girls</a></li>
            <li><a href="#">Bowling</a></li>
            <li><a href="#">Cheerleading</a></li>
            <li><a href="#">Cross Country</a></li>
            <li><a href="#">Danceline</a></li>
            <li><a href="#">Football</a></li>
            <li><a href="#">Field Hockey</a></li>
            <li><a href="#">Golf, Boys</a></li>
            <li><a href="#">Golf, Girls</a></a></li>
            <li><a href="#">Gymnastics</a></li>
            <li><a href="#">Ice Hockey</a></li>
            <li><a href="#">Lacrosse</a></li>
            <li><a href="#">Power Lifting</a></li>
            <li><a href="#">Ski Club</a></li>
            <li><a href="#">Soccer</a></li>
            <li><a href="#">Softball</a></li>
            <li><a href="#">Swimming &amp; Diving</a></li>
            <li><a href="#">Tennis, Boys</a></li>
            <li><a href="#">Tennis, Girls</a></a></li>
            <li><a href="#">Track &amp; Field</a></li>
            <li><a href="#">Volleyball, Boys</a></li>
            <li><a href="#">Volleyball, Girls</a></a></li>
            <li><a href="#">Wrestling</a></li>
          </ul>
        </div>
        <div class="col_1">
          <h3><a class="lead" href="">Middle School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="#">Band</a></li>
            <li><a href="#">Book Club</a></li>
            <li><a href="#">Booster Club</a></li>
            <li><a href="#">Chess Club</a></li>
            <li><a href="#">Choir</a></li>
            <li><a href="#">Class Trips</a></li>
            <li><a href="#">Debate</a></li>
            <li><a href="#">Library</a></li>
            <li><a href="#">PTA/PTO</a></li>
            <li><a href="#">School Counseling</a></li>
            <li><a href="#">Science Club</a></li>
            <li><a href="#">Math Club</a></li>
          </ul>
          <h3><a class="subHead" href="#">Athletics</a></h3>
          <ul>
            <li><a href="#">Baseball</a></li>
            <li><a href="#">Basketball</li>
            <li><a href="#">Bowling</a></li>
            <li><a href="#">Cheerleading</a></li>
            <li><a href="#">Cross Country</a></li>
            <li><a href="#">Football</a></li>
            <li><a href="#">Field Hockey</a></li>
            <li><a href="#">Golf</li>
            <li><a href="#">Gymnastics</a></li>
            <li><a href="#">Ice Hockey</a></li>
            <li><a href="#">Lacrosse</a></li>
            <li><a href="#">Ski Club</a></li>
            <li><a href="#">Soccer</a></li>
            <li><a href="#">Softball</a></li>
            <li><a href="#">Swimming</a></li>
            <li><a href="#">Tennis</li>
            <li><a href="#">Track &amp; Field</a></li>
            <li><a href="#">Volleyball</li>
          </ul>
        </div>
        <div class="col_1">
          <h3><a class="lead" href="">Elementary School</a></h3>
          <h3><a class="subHead" href="">Clubs &amp; Organizations</a></h3>
          <ul>
            <li><a href="">After School Programs</a></li>
            <li><a href="">Band</a></li>
            <li><a href="">Booster Club</a></li>
            <li><a href="">School Carnival</a></li>
            <li><a href="">Choir</a></li>
            <li><a href="">Class Field Trip</a></li>
            <li><a href="">Library</a></li>
            <li><a href="">PTA/PTO</a></li>
            <li><a href="">School Counseling</a></li>
            <li><a href="">Science Club</a></li>
            <li><a href="">Math Club</a></li>
          </ul>
          <h3><a class="subHead" href="">General Needs</a></h3>
          <ul>
            <li><a href="#">Computer</a></li>
            <li><a href="#">Athletic Equipment Fundraiser</a></li>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Field &amp; Equipment Fundraiser</a></li>
            <li><a href="#">General Fundraiser</a></li>
            <li><a href="#">Playground Equipment Fundraiser</a></li>
          </ul>
        </div>
        <div class="col_1">
          <h3><a class="leadNoSub" href="">Religious Orgnizations</a></h3>
          <ul>
            <li><a href="#">Church</a></li>
            <li><a href="#">Mosque</a></li>
            <li><a href="#">Synagogue</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Community Organizations</a></h3>
          <ul>
            <li><a href="#">Fire Department</a></li>
            <li><a href="#">Police Department</a></li>
            <li><a href="#">Lion's Club</a></li>
            <li><a href="#">Jaycees</a></li>
            <li><a href="#">Rotary Club</a></li>
            <li><a href="#">Knights of Columbus</a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Youth &amp; Sports</a></h3>
          <ul>
            <li><a href="#">Boy Scouts</a></li>
            <li><a href="#">Girl Scouts</a></li>
            <li><a href="#">YMCA</a></li>
            <li><a href="#">Athletic Associations</a></li>
            <li><a href="#">Big Brothers/Big Sisters</a></li>
          </ul>
        </div>
        <div class="col_1">
          <h3><a class="leadNoSub" href="">Local &amp; National Charities </a></h3>
          <ul>
            <li><a href="#">Humane Society</a></li>
            <li><a href="#">Breast Cancer Research</a></li>
            <li><a href="#">Alzheimers</a></li>
            <li><a href="#">Parkinsons</a></li>
            <li><a href="#"></a></li>
          </ul>
          <h3><a class="leadNoSub" href="">Causes</a></h3>
          <ul>
            <li><a href="#">Vets</a></li>
            <li><a href="#">Personal</a></li>
            <li><a href="#">Memorial Fund</a></li>
            <li><a href="#">Hospital</a></li>
            <li><a href="#">Local Benefit</a></li>
          </ul>
        </div>
      </div>
      <!-- End 4 columns container -->
    <li><a href="../programs.php">GreatMoods<br/>
      Programs</a></li>
    <li><a href="../giftBaskets.php">Gift Basket<br/>
      Opportunities</a></li>
    <li><a href="../gettingStarted.php">Getting<br/>
      Started</a></li>
    <li><a href="../setupEditMainWebsite/index.php">Setup/Edit<br/>
      Website</a></li>
    <li><a href="#">Training Tips,<br/>
      Tools &amp; Forms </a></li>
    </li>
    <!-- End 4 columns Item -->
  </ul>
</div>
<!--end headerMain--> 