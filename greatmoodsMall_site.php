<?php
      session_start();
   
      ob_start();
      
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group']; 
      $where = $_SERVER['REQUEST_URI'];
       
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
      $result1 = mysqli_query($link, $query1) or die("couldn't execute query 1.".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $club_name = $row['Dealer'];
      $club_type = $row['DealerDir'];
      $goal = $row['FundraiserGoal'];
      $reasons = $row['FundraiserReasons'];
      $about = $row['About'];
      $so_far = '0';
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      $location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $banner_path = $row['banner_path'];
      $_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysql_error());
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
      $result2 = mysqli_query($link, $query2) or die("couldn't execute query 2.".mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
        $cap = "Select * FROM captions WHERE fundid = '$groupID'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysql_error());
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];  
        
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $owner = $row3['orgFName'].' '.$row3['orgLName'];
      $owner_email = $row3['orgEmail'];
      $owner_phone = $row3['orgPhone'];  
?>

<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<title>GreatMoods Mall</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script>
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
var group = getUrlVars()["group"];
</script>

<script type="text/javascript" src="http://app.ecwid.com/script.js?STORE_ID" charset="utf-8"></script>
<script> 
 var group = "<?php echo $groupID; ?>";  
 xAffiliate("group"); 
 alert("<?php echo $groupID; ?>");
</script>
<script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(3,3) list(10) table(20)","categoryView=grid","searchView=list","style="); </script>pe="text/javascript"> xProductBrowser("categoriesPerRow=5","views=grid(5,4) list(10) table(20)","categoryView=grid","searchView=list","style="); </script>
</head>

<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include 'includes/header_site.php'; ?><br>
    <?php include 'includes/sidenav_site.php'; ?>
	
	<div id="content">

	<!-- Bag Widget -->
	<div id="my-cart-9012020"></div>
		<div>
		<script type="text/javascript" src="https://app.ecwid.com/script.js?9012020&data_platform=code&data_date=2016-03-17" charset="utf-8"></script>
		<!-- remove layout parameter if you want to position minicart yourself -->
		<script type="text/javascript"> xMinicart("layout=attachToCategories", "id=my-cart-9012020"); </script>
		</div>
	<!-- END Bag Widget -->


	<!-- Product Browser Widget -->
	<div id="my-store-9012020"></div>
		<div>
		<script type="text/javascript" src="https://app.ecwid.com/script.js?9012020&data_platform=code&data_date=2016-03-17" charset="utf-8"></script>
		<script type="text/javascript">xAffiliate('<?php echo $groupID; ?>'); </script><script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(5,4) list(10) table(20)","categoryView=grid","searchView=list","id=my-store-9012020");</script>
		</div>
	<!-- END Product Browser Widget -->
	
	
	</div> <!--end content-->

<?php include 'footer.php' ; ?>

</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>