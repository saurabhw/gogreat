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
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='VP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | VP</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Vice President Team & Accounts</h1>
          <h3></h3>
            <div id="grid_array"></div> <!-- not sure if the page contents need to be inside this div or not, so I am leaving it at the top for now -->
            
            <form>
		<div id="table">
			<div class="row">
				<b>Sort By: </b> 
				<select id="">
					<option value="">View All</option>
					<option value="">A-Z First</option>
					<option value="">A-Z Last</option>
					<option value="">$ High to Low</option>
					<option value="">$ Low to High</option>
				</select>
			</div> <!-- end row -->
			
			<div id="labels" class="row">
				<span id="hd_sc">Sales Coordinator</span>
				<span id="hd_rp">Representative</span>
				<span id="hd_gmfr">Fundraiser Account</span>
				<span id="hd_fl">Fundraiser Leader</span>
				<span id="hd_fm">Fundraiser Member</span>
				<span id="hd_ff">Friends & Family</span>
				<span id="hd_bb">Business Supporter</span>
				<span id="hd_ba">Business Associate</span>
				<span id="hd_cc">Customer & Client</span>
			</div> <!-- end row -->
			
			<div class="row">
				<select class="role" name="" title="Select Account">
					<option value="">Select Sales Coordinator Account</option>
					<option value="">All Sales Coordinators</option
					<option value="">Fred Briggs</option>
					<option value="">Mary Reardon</option>
					<option value="">Gary Lantz</option>
					<option value="">Marsha Fisher</option>
					<option value="">John Humphrey</option>
					<option value="">David Rosati</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Representative Account</option>
					<option value="">All Representatives</option
					<option value="">Amanda Warren</option>
					<option value="">Kelly Edwards</option>
					<option value="">Jim Whitley</option>
					<option value="">Kenneth Weiland</option>
					<option value="">Jamie Arnold</option>
					<option value="">Clyde Raminez</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Fundraiser Account</option>
					<option value="">All Fundraiser Accts</option>
					<optgroup label="High Schools:">
						<option value="">Harding Senior High School</option>
						<option value="">Lincoln High School</option>
						<option value="">Prosperity Heights High School</option>
					</optgroup>
					<optgroup label="Middle Schools:">
						<option value="">John Glen Middle School</option>
						<option value="">Patrick Henry Middle School</option>
					</optgroup>
					<optgroup label="Elementary Schools:">
						<option value="">Webster Elementary School</option>
					</optgroup>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Fundraiser Leader Account</option>
					<option value="">All Leaders</option>
					<option value="">Robert Bell</option>
					<option value="">Mary Brown</option>
					<option value="">Laura Brown</option>
					<option value="">Berta Carreras</option>
					<option value="">Alice Foster</option>
					<option value="">Richard Gates</option>
					<option value="">Chantel Harder</option>
					<option value="">Mary Hatfield</option>
					<option value="">Joel Heim</option>
					<option value="">Michael Knapp</option>
					<option value="">Daniel Martinez</option>
					<option value="">Ernesto Morais</option>
					<option value="">Gerald Pierce</option>
					<option value="">Jillian Poirier</option>
					<option value="">Paul Ruiz</option>
					<option value="">Richard Thompson</option>
					<option value="">Lois Vanfleet</option>
					<option value="">Arthur Vang</option>
					<option value="">Tracy Watson</option>
					<option value="">Dennis Wells</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Fundraiser Member Account</option>
					<option value="">All Members</option>
					<option value="">Robert Bell</option>
					<option value="">Mary Brown</option>
					<option value="">Laura Brown</option>
					<option value="">Berta Carreras</option>
					<option value="">Alice Foster</option>
					<option value="">Richard Gates</option>
					<option value="">Chantel Harder</option>
					<option value="">Mary Hatfield</option>
					<option value="">Joel Heim</option>
					<option value="">Michael Knapp</option>
					<option value="">Daniel Martinez</option>
					<option value="">Ernesto Morais</option>
					<option value="">Gerald Pierce</option>
					<option value="">Jillian Poirier</option>
					<option value="">Paul Ruiz</option>
					<option value="">Richard Thompson</option>
					<option value="">Lois Vanfleet</option>
					<option value="">Arthur Vang</option>
					<option value="">Tracy Watson</option>
					<option value="">Dennis Wells</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Friend & Family Account</option>
					<option value="">All Friends & Family</option>
					<option value="">Hubert Landry</option>
					<option value="">Linda Landry</option>
					<option value="">Deborah Landry</option>
					<option value="">Chanell Landry</option>
					<option value="">Wayne Landry</option>
					<option value="">Cecelia Landry</option>
					<option value="">Michael Landry</option>
					<option value="">Dorcas Landry</option>
					<option value="">James Landry</option>
					<option value="">Linda Slater</option>
					<option value="">Sabrina Slater</option>
					<option value="">Ricardo Slater</option>
					<option value="">William Westrick</option>
					<option value="">Vicki Westrick</option>
					<option value="">Rene Westrick</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Business Supporter Account</option>
					<option value="">All Business Supporters</option>
					<option value="">Jones & Associates</option>
					<option value="">Micro Bank</option>
					<option value="">Silvertech Industries</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Business Associate Account</option>
					<option value="">All Business Associates</option>
					<option value="">Hubert Landry</option>
					<option value="">Linda Landry</option>
					<option value="">Deborah Landry</option>
					<option value="">Chanell Landry</option>
					<option value="">Wayne Landry</option>
					<option value="">Cecelia Landry</option>
					<option value="">Michael Landry</option>
					<option value="">Dorcas Landry</option>
					<option value="">James Landry</option>
					<option value="">Linda Slater</option>
					<option value="">Sabrina Slater</option>
					<option value="">Ricardo Slater</option>
					<option value="">William Westrick</option>
					<option value="">Vicki Westrick</option>
					<option value="">Rene Westrick</option>
				</select>
				<select class="role" name="" title="Select Account">
					<option value="">Select Customer & Client Account</option>
					<option value="">All Customers & Clients</option>
					<option value="">Hubert Landry</option>
					<option value="">Linda Landry</option>
					<option value="">Deborah Landry</option>
					<option value="">Chanell Landry</option>
					<option value="">Wayne Landry</option>
					<option value="">Cecelia Landry</option>
					<option value="">Michael Landry</option>
					<option value="">Dorcas Landry</option>
					<option value="">James Landry</option>
					<option value="">Linda Slater</option>
					<option value="">Sabrina Slater</option>
					<option value="">Ricardo Slater</option>
					<option value="">William Westrick</option>
					<option value="">Vicki Westrick</option>
					<option value="">Rene Westrick</option>
				</select>
			</div> <!-- end row -->
		</div> <!-- end table -->
		
		<!-- This alphabet should allow for sorting the data -->
		<table id="alphabet">
			<tr>
				<td>A</td>
				<td>B</td>
				<td>C</td>
				<td>D</td>
				<td>E</td>
				<td>F</td>
				<td>G</td>
				<td>H</td>
				<td>I</td>
				<td>J</td>
				<td>K</td>
				<td>L</td>
				<td>M</td>
				<td>N</td>
				<td>O</td>
				<td>P</td>
				<td>Q</td>
				<td>R</td>
				<td>S</td>
				<td>T</td>
				<td>U</td>
				<td>V</td>
				<td>W</td>
				<td>X</td>
				<td>Y</td>
				<td>Z</td>
			</tr>
		</table>
		
		<table id="gms_accts">
			<tr>
				<th class="checkbox" title="Select"><input type="checkbox" name="" value=""></th>
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Role</th>
				<th class="sales" title="Total Sales">Total Sales</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Mary</td>
				<td class="ln">Reardon</td>
				<td class="pph">123-123-1234</td>
				<td class="email">mary.reardon@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,123.85</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Gary</td>
				<td class="ln">Lantz</td>
				<td class="pph">123-123-1234</td>
				<td class="email">gary.lantz@email.com</td>
				<td class="role">Sales Coordinator</td>
				<td class="sales">$40,456.23</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Fred</td>
				<td class="ln">Briggs</td>
				<td class="pph">123-123-1234</td>
				<td class="email">fred.briggs@email.com</td>
				<td class="role">Sales Coordinator</td>
				<td class="sales">$40,789.69</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Marsha</td>
				<td class="ln">Fisher</td>
				<td class="pph">123-123-1234</td>
				<td class="email">marsha.fisher@email.com</td>
				<td class="role">Sales Coordinator</td>
				<td class="sales">$40,987.87</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">John</td>
				<td class="ln">Humphrey</td>
				<td class="pph">123-123-1234</td>
				<td class="email">john.humphrey@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,654.12</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">David</td>
				<td class="ln">Rosatti</td>
				<td class="pph">123-123-1234</td>
				<td class="email">david.rosatti@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,321.74</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Amanda</td>
				<td class="ln">Warren</td>
				<td class="pph">123-123-1234</td>
				<td class="email">amanda.warren@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,147.58</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Kelly</td>
				<td class="ln">Edwards</td>
				<td class="pph">123-123-1234</td>
				<td class="email">kelly.edwards@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,258.32</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Jim</td>
				<td class="ln">Whitley</td>
				<td class="pph">123-123-1234</td>
				<td class="email">jim.whitley@email.com</td>
				<td class="role">Representative</td>
				<td class="sales">$30,369.96</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
		</table>
		
	</form>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>