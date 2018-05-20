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
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   $bob = 24503;
       
?>

<!DOCTYPE html>
<head>
	<title>Add New Members</title> 
	<style>

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #FFF;
    background-color: #cc0000;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
        <br>
        <h2 align="center">Add Fundraiser Leader</h2>
    <br />
      <ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Single')" id="defaultOpen">Add Single Leader</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Multiple')">Upload Multiple Leaders</a></li>
</ul>

<div id="Single" class="tabcontent">


    
        
		
		<form class="" action="addFundLeader.php" method="Post" id="myForm" name="myForm"  onsubmit="return checkForm(this);" enctype="multipart/form-data">
			<div class="table">
				<!--<h3>--Option 1: Add One Leader--</h3>-->
			
				<div class="row">
					<br>
			&nbsp; &nbsp;	<select class="role4" name="scid" onChange="fetch_select2(this.value);" required>
				      		<option value="">Select Sales Coordinator</option>
				      		<option value="<?  echo $bob;?>">GreatMoods Coordinator</option>
				      		<?
				      		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
						$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
					
						while($row2 = mysqli_fetch_assoc($result2))
						{
				                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
					        }
					        ?>
      					</select>
			      		<select class="role4" name="rpid" id="rpid" onChange="fetch_select3(this.value);" required>
			      			<option value="">Select</option>
			      		</select>
					<select class="role4" name="groupid" onChange="fetch_select(this.value);" id="groupid" required>
						<option valeu="">Select</option>
					</select>
					<br>
					
					</div> <!-- end row -->
				
					<br>

				<div class="simpleTabs">
				
					  <div id="border">
					<div class="interim-form">
						<div class="interim-header"><h3>Contact Information</h3></div>
						<div class="row">
							<!--<span>[Group] Leader Type: </span>--> <!-- [Group] = same as the selected group above -->
							<!--<select name="">
								<option value="" selected>Select Leader</option>
								<option value="">-depends on group-</option>
								<option value=""></option>
								<option value=""></option>
								<option value=""></option>
								<option value="">Other/Custom (Specify)</option>--> <!-- If Other/Custom is selected, then display input field below -->
							<!--</select>
							<span>Other/Custom:</span>
							<input id="fltype" type="text" name="" value="">-->
						</div> <!-- end row -->
						
					
						<div class="row"> <!-- inputs -->
							<input id="fname" type="text" name="fname" placeholder="First Name" required>
							
							<input id="lname" type="text" name="lname" placeholder="Last Name" required>
							<!--<input id="pname" type="text" name="">-->
							<select name="title">
								<option value="">Title</option>
								<option value="Mr.">Mr.</option>
								<option value="Ms.">Ms.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss">Miss</option>
								<option value="Dr.">Dr.</option>
								<option value="Rev.">Rev.</option>
							</select>
							<select name="gender">
								<option value="">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div> <!-- end row -->
					

										
					
					</div> <!-- end tab 1 -->
					
					<div class="interim-form">
						<div class="interim-header"><h3>Account Login</h3></div>
						<div id="row"> <!-- titles -->
							<span id="hd_loginemail">Email Address</span>
						</div> <!-- end row -->
						<div id="row"> <!-- inputs -->
							<input id="email" type="text" name="email" value="" required>
						</div> <!-- end row -->
						
						<div id="row"> <!-- titles -->
							<span id="hd_password">Password</span>
							<span id="hd_cpassword">Confirm Password</span>
						</div> <!-- end row -->
						<div id="row"> <!-- inputs -->
							<input id="pass1" type="password" name="password" value="" required>
							<input id="pass2" type="password" name="cpassword" onkeyup="checkPass(); return false;" value="" required>
							<span id="error"></span>
						</div> <!-- end row -->
					</div> <!-- end tab 2 -->
					
					<div class="interim-form">
						<div class="interim-header"><h3>Social Media Connections</h3></div>
						<div id="row"> 
							<span id="hd_fb">Facebook</span>
							<input id="fb" type="text" name="fb" value="" placeholder="www.facebook.com">
						</div> <!-- end row -->
						<br>
						<div id="row"> 
							<span id="hd_tw">Twitter</span>
							<input id="tw" type="text" name="tw" value="" placeholder="www.twitter.com">
						</div> <!-- end row -->
						<br>
						<div id="row"> 
							<span id="hd_li">LinkedIn</span>
							<input id="li" type="text" name="" value="" placeholder="www.linkedin.com">
						</div> <!-- end row -->
						
					
					<div class="interim-form"> <!-- profile pic tab4 -->
						<div class="interim-header"><h3>Profile Photo</h3></div>
						<div class="row"> 
							<span id="">Upload Profile Photo:</span>
							<input type="file" id="" name="uploaded_file">
							<br>
							<input type="submit" name="submit" class="redbutton" value="Add New Fundraiser Leader">
						</div> <!-- end row -->
					</div> <!-- end tab4 content (profile pic) -->
				</div> <!-- end simple tabs -->
			
			 <!-- end table -->
		</form>

		<br></div>
 </div>
    </div></div>

    <div id="Multiple" class="tabcontent">
     
          <form name="import" method="post" action="uploadLeaders.php" enctype="multipart/form-data">
           <div class="row">
				       
						
					</div> <!-- end row -->
					
				<div class="row">
				<br>	
				&nbsp; &nbsp;<select class="role4" name="scid2" onChange="fetch_select18(this.value);" required>
				      		<option value="">Select Sales Coordinator</option>
				      		<option value="<?  echo $bob;?>">GreatMoods Coordinator</option>
				      		<?
				      		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
						$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
					
						while($row2 = mysqli_fetch_assoc($result2))
						{
				                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
					        }
					        ?>
      					</select>
			      		<select class="role4" name="rpid2" id="rpid2" onChange="fetch_select17(this.value);" required>
			      			<option value="">Select</option>
			      		</select>
					<select class="role4" name="groupid2" onChange="fetch_select(this.value);" id="groupid2" required>
						<option>Select</option>
					</select>
					</div> <!-- end row -->
					<br>
					<div id="border">
					    <h3>How To Add Multiple Leaders</h3>
				<ol>
					<li><a href="download.php">Download</a> Our Member Setup Spreadsheet</li>
					<li>Input the Data for Each Member You want to Add.</li>
					<li>Input 6 character password for each leader.</li>
					<li>Select Fundraiser Account from Drop Down Menu (see below)</li>
					<li>Upload the Completed Spreadsheet (see below)</li>
				</ol>
          			
			<br>
			
			<!--<p class="nospace">Label your spreadsheet cloumns from left to right as follows:</p>
		          <table>
		          	<tr>
			          <th>Title</th>
			          <th>First Name</th>
			          <th>Last Name</th>
			          <th>Phone Number</th>
			          <th>Email Address</th>
			          <th>Password</th>
			          </tr>
		          </table>
          -->
          		<br>
          	<div class="table">
         		 
				
				<br />
          
          <br /><br /><input type="file" name="file" required><br /><br />
        <input type="submit" name="submit" value="Submit" class="redbutton" />
        </div> <!-- end table -->
</form>
</div>
    </div>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>