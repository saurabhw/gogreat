<?php
    session_start();
    if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
   require_once("../includes/connection.inc.php");
   require_once("../includes/functions.php");
   //require_once("../includes/functions.php");
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $userEmail = $_SESSION['email'];
   $userName = $_SESSION['groupid'];
   $query1 = "SELECT * FROM Dealers WHERE loginid='$userName'";
   $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
   $row = mysqli_fetch_assoc($result1);
   $dealerID = $row['loginid'];
   $group = $row['setuppersonid'];
   $myPic = $row['contact_pic']; 
   //$goal = $row['goal2'];
   $twit = $row['twitter']; 
   $face = $row['facebook']; 
   $banner = $row['banner_path'];

   $so_far = getSoloSales($dealerID);
   //get parent info
   $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];


	// mysqli_fetch_row - the results are in an array, keys are integers
	// mysqli_fetch_assoc - the results are in an associative array, keys are the column names
	// mysqli_fetch_array - the results are both, indexed by integer and column names

?>

<!DOCTYPE html>
<head>
	<title>Contacts | Member</title>
	 <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script>
    $(document).ready(function () {
	$('.view_data').click(function () { // id of the modal with event
	
	var order_id = $(this).attr("id");
	$.ajax({
	 url : "select.php",
	 method: "POST",
	 data: {order_id:order_id},
	 success:function(data){
	 $('#edit_detail').html(data);
	 $('#myModal').modal("show");
	 }
	
	});
	})
});
    </script>
</head>
	
<body>
<div id="container">
	        <?php include 'header(1).php' ; ?>
		<?php include 'memberSidebar_new.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="content">
	   <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Contacts</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Contact</a>
                        
                        <!-- Modal -->
  
                    <?php
                    // Include config file
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		            $per_page = 20;
		            $start_from = ($page-1) * $per_page;
		            $pages_query = "SELECT COUNT('customerID') FROM orgCustomers where fundMemberID='$userName'";
		            $many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		            $rowx = $many->fetch_row();
		            $pages = ceil($rowx[0] / $per_page);
		            
                    $sql = "SELECT * FROM orgCustomers WHERE fundMemberID = '$userName' ORDER BY last ASC LIMIT $start_from, $per_page";
                    $result = mysqli_query($link, $sql)or die ("couldn't execute query.".mysqli_error($link));
                    $total_records = mysqli_num_rows($result);
		            $total_pages = ceil($total_records / 20);
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "
                            
                            <table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<!--<th>Company</th>-->";
                                        echo "<th>Title</th>";
                                        echo "<th>Name</th>";
                                        echo "<!--<th>Address</th>-->";
                                        echo "<th>Relationship</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<!--<td>" . $row['companyname'] . "</td>-->";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['first'] . " ".$row['last']."</td>";
                                        echo "<!--<td>" . $row['address'] . "</td>-->";
                                        echo "<td>" . $row['relationship'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['workPhone'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['customerID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['customerID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['customerID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            	
					if($pages >= 1 && $page <= $pages){
						for($x = 1; $x <= $pages; $x++){
					echo'
					<ul class="pagination">
					<li><a href="?group='.$group.'&page='.$x.'
				">'.$x.'</a></li> 
				</ul>
				';
						}
					}
				
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
		
		
	</div>
	
                    </div>
                    
	<!--END MAIN CONTENT-->
	
	
	
	<?php include 'footer(1).php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>