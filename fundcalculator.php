<?php
      session_start();
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
<link href="../../css/incomeCalculatorStyles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	
	function calculateSchool(orgType) {
	        var price = 35; 
	        var commission = 35;
		//elementary schools
		var num7 = Number(document.getElementById("Enum").value);
		var fund7 = Number(document.getElementById("Efund").value);
		var people7 = Number(document.getElementById("Epeople").value);
		var percent7 = (Number(document.getElementById("Epercent").value))/100;
		var active7 = people7 * percent7;
		active7 = Number(active7);
		//document.getElementById("Eactive").innerHTML = active7;
		var baskets7 = Number(document.getElementById("Ebaskets").value);
		var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
		var total7 = fund7 * baskets7 * numPerYear7 * price * commission * num7 * active7;
		var result7 =  format(total7,2);
		document.getElementById("Etotal").innerHTML = result7;
		
		
			
	}
	function format(num, dec) {
        return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
        }
	
</script>
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
        <li><a href="index.php">GreatMoods </br> Homepage</a><li>
		<li><a href="basketsproducts.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
       <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <?php include 'navigation/leftSidebarNavFundraiser.php'; ?>

  <div id="content">
    </br>
    <h3>Find out how much you can raise by using our Earning Potential Calculator below</h3>
    <div id="column1">
    	<h5>The calculator is simple to use:</h5>
	<ul>
          <li>•	Enter the number of schools, churches or organizations you will be fundraising with</li>
          <li>•	Enter the number of Clubs, Teams or Groups you will be fundraising with</li>
          <li>•	Enter the number of Students or Members you believe will participate in your fundraiser</li>
          <li>•	Enter the average number of Gift Baskets each of your members will sell for this fundraiser</li>
          <li>•	Multiply by $35, the average retail price of a gift basket</li>
          <li>•	Your Club, Team or Organization then receives 35% of the Gift Baskets sold</li>
          
	</ul>
    </div><!--end column1-->
    <div id="column2">
      	<img src="../images/rep-pages/calculatorimage.png" width="404" height="270" alt="Women Writing Calculations">
      	<img class="imgLeft" src="../images/rep-pages/mouse.png" width="198" height="166" alt="Computer Mouse">
	<img class="imgRight" src="../images/rep-pages/keyboard.png" width="198" height="166" alt="Computer Keyboard"> 
      <!--leadin image--> 
    </div><!--end column2-->
    
    <div id="tableWrapper">
      </table>
      <h3 class="tableHeader">Try Our Calculator!</h3>
      <table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total commission">
        <tr>
          <th class="calcCategoryHead">Your Fundraiser</th>
          <th>Number of Schools<br/>
            Churches or<br/>
			Organizations</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Clubs, Teams, <br>
            or Groups</th>
          <th scope="col">&nbsp;</th>
          <th>Number of <br/>
            Participants</th>
          <th scope="col">&nbsp;</th>
          <th>Percentage <br/>
            Participating
            </th>
          <th scope="col">&nbsp;</th>
          <th>Gift <br/>
            Baskets <br/>
            Sold Per <br/>
            Participant</th>
          <th scope="col">&nbsp;</th>
          <th>$35 Avg. <br/>
            Retail <br/>
            Price</th>
          <th scope="col">&nbsp;</th>
          <th>Fundraisers <br/>
            Per Year</th>
          <th scope="col">&nbsp;</th>
          <th>Percent to<br/>
            Your Fundraiser</th>
          <th scope="col">&nbsp;</th>
          <th>Total <br/>
            Amount Raised</th>
        </tr>
        
          
        
        <tr>
          <td class="fl">Your Fundraiser<br/>
            </td>
          <td><input type="text" id='Enum' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Efund' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td><input type="text" id='Epercent' name"" size="4" onchange='calculateSchool("E")'/>
            </td>
          <td>x</td>
          <td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='Eprice'>$35.00</td>
          <td>x</td>
          <td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
          <td>x</td>
          <td id='commission2'>35%</td>
          <td>=</td>
          <td id='Etotal'></td>
        </tr>
        <tr>
          <td colspan="15" class="fl"></td>
          <td colspan="2" class ="fl"><button type="button" onclick="calculateSchool('LH')">Calculate</button></td>
          <td id='schoolTotal'></td>
        </tr>
      </table>
      
       
      </div>
      <!--end redBar2--> 
      
    </div>
    <!--end tableWrapper--> 
    
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>