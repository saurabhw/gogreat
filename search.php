<?php

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods | Recover Account</title>
	<link rel="stylesheet" type="text/css" href="css/layout_styles.css">
	<link rel="stylesheet" type="text/css" href="css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="css/sidenav_styles.css">
	<link rel="stylesheet" type="text/css" href="css/addnew_form_styles.css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	

</head>

<body>
	<?php include 'includes/header.inc.php'; ?>
  <!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1" style="margin-top: 2em;">
		<h2 align="center">Fundraiser Search</h2>
		
	   	<div class="page-header">
		</div>
		<div id="border">
        <form role="form" method="post">
		  <div class="form-group">
			<input type="text" class="form-control" id="keyword" placeholder="Enter keyword">
		  </div>
		</form>
		<table id="search_display" class="table table-bordered table-striped">
		    <thead>
		        <th>Name</th>
		        <th>Type</th>
		        <th>City</th>
		        <th>State</th>
		        <th>Zip Code</th>
		    </thead>
		</table>
		</div><!--end border-->
 
		
	
	
		</div> <!-- end column1 -->
	<div class="row row-centered" style="margin-top: 2em;">
	<div class="center-block" style="margin-top: 2em;">	

	</div>
	</div>
	</div>
	</div>
	 <!-- end content -->
	<div style="height:180px;"></div>
	<br>
	</div>
	<?php include 'footer.php' ; ?>	
<!-- end container -->
 <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 3) {
				$.post('includes/search.php', { keywords: searchKeyword }, function(data) {
					$('#search_display').empty()
					$.each(data, function() {
					    //$('#search_display').append('<thead><th>Name</th><th//>Type</th><th>City</th><th>State</th><th>Zip</th//><th></th></thead>');
						$('#search_display').append('<tr><td>' + this.Dealer + '</td><td> ' + this.club + '</td> <td>' + this.city + '</td><td> ' + this.state + '</td><td> ' + this.zip + '</td><td><a href="fundSite.php?group='+ this.id +'" target="blank"><input type="button" class="redbutton" value="Support"></a></td></tr>');
					});
				}, "json");
			}
		});
	});
	</script>
</body>
</html>