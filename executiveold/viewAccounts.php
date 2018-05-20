<?php
session_start();

/*if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/
       require_once '../grid-2.0.4/php/conf.php';

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Executive</title>
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css" />
	<link rel="stylesheet" type="text/css" href="../css/all_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/contacts_styles.css" />
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
 	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	 
	 <!--ParamQuery Grid files-->
        <link rel="stylesheet" href="../../grid-2.0.4/pqgrid.min.css" />
        <script type="text/javascript" src="../../grid-2.0.4/pqgrid.min.js" ></script>
        
        <script>
$(function(){
   var dataModel = {
        location: "remote",
        paging: "remote",
        dataType: "JSON",
        method: "POST",
        curPage: 1,
        filterIndx: "",
        filterValue: "",
        getUrl: function () {
            var data = {
                pq_curpage: this.curPage,
                pq_rpp: this.rPP};
            if (this.filterIndx && this.filterValue ) {
                data['filterIndx']=this.filterIndx;
                data['filterValue']=this.filterValue;
            }
             
    var obj = {url: "remote.php", data: data};
    obj.width = 700;
    obj.height = 400;
    obj.colModel = [{title:"Rank", width:100, dataType:"integer"},
        {title:"Company", width:200, dataType:"string"},
        {title:"Revenues ($ millions)", width:150, dataType:"float", align:"right"},
        {title:"Profits ($ millions)", width:150, dataType:"float", align:"right"}];
    obj.dataModel = {data:data};
    $("#grid_array").pqGrid( obj );                                
 
});        
</script>   
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Executive Team & Accounts</h1>
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
				<span id="hd_vp">Vice President</span>
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
					<option value="">Select Vice President Account</option>
					<option value="">All Vice Presidents</option
					<option value="">Paige Bodenhamer</option>
					<option value="">Samuel Mortensen</option>
					<option value="">Terry Cole</option>
					<option value="">Harold Roberts</option>
					<option value="">Wanda Greeley</option>
					<option value="">Wayne Zhu</option>
				</select>
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
				<td class="role">Vice President</td>
				<td class="sales">$50,987.87</td>
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