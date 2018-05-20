<?php 
        session_start();
        if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include 'redirect/redirect.php';
	
        include "connectTo.php";
        $link = connectTo();
	$id = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My GreatMoods Account</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
		<link rel="stylesheet" type="text/css" href="js/css/jquery-ui-1.9.0.custom.css">
		<script src="js/jquery-ui-1.9.0.custom.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		
               <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
      
		<script src="js/loadXMLDoc.js"></script>
		 <script src="js/jquery.js"></script>
		<style type="text/css">
		@import url(css.css);
			#headerTop{
				background: no-repeat;
				background-position:right top;
				width:1024px;
				height:130px;
				padding:0;
				margin:0;
				position:relative;
				z-index:3;
				}
			#content{
				width:800px;
				margin:0px 0 50px 0;
				padding:0px 0px 50px 0px;
				float:right;
				position:relative;
				top:-60px;
				height: auto;
				
				}
			#leadImg{
				position:relative;
				top:-125px;
				right:150px;
				float:right;
				}
			#logout {
				position: absolute;
				right: 8px;
			}
			.school {
				
			}
			.hidden {
				display: none;
			}
			.unhidden {
				display: block;
			}
                  #nav{
                  
                 
                  }
                  #nav ul{
                  display: inline-block;
                  background-color: #cc0000;
                  }



		 </style>
	 <script>
    $(function() {
        
        $( "#accordion" ).accordion({ header: "h3", collapsible: true});
    });
	$(document).ready(function() {
    $("#nav li a").click(function() {
 
        $("#ajax-content").empty().append("<div id='loading'><img src='images/loading.gif' alt='Loading' /></div>");
        $("#nav li a").removeClass('current');
        $(this).addClass('current');
 
        $.ajax({ url: this.href, success: function(html) {
            $("#ajax-content").empty().append(html);
            }
    });
    return false;
    });
 
    $("#ajax-content").empty().append("<div id='loading'><img src='images/loading.gif' alt='Loading' /></div>");
    $.ajax({ url: 'page_1.html', success: function(html) {
            $("#ajax-content").empty().append(html);
    }
    });
});
    </script>
	</head>
    <body>
	  <div id="container">
	  <?php include 'header.php' ; ?>
	  <?php include 'mainLeftSidebar.php' ; ?>
         	   <div id="content">
                      
            <div id="accordion"><!--start accordion-->
              <h3>Sales Person Setup and Edit</h3><!--start panel 1---------------->
                <div>
                <?php
                //get user credentials
	 	$table = "users";
	 	$role = "";
                $query =  "SELECT * FROM $table WHERE username ='$id'";
                $result = mysqli_query($link, $query);
                if (!$result) {
                $message  = 'Invalid query: ' . mysql_error() . "\n";
                $message .= 'Whole query: ' . $query;
                 die($message);
                }
                //get user role
                while ($row = mysqli_fetch_assoc($result)) {
                $role = $row['role'];
               }
               //switch based on role
               switch($role)
               {
	          case "VicePresident":
	          echo '
	          <ul id="nav">
                  <li><a href="dashboard_pages/regMan.php">Setup Regional Manager</a></li>
                  <li><a href="dashboard_pages/distributor.php">Setup Distributor</a></li>
                  <li><a href="dashboard_pages/rep.php">Setup Representative</a></li>
                  </ul>
                  <div id="ajax-content"></div>
	          ';
		  break;
		  case "RegionalManager":
		  echo '
		  <ul id="nav">
                  <li><a href="dashboard_pages/regMan.php">Setup Regional Manager</a></li>
                  <li><a href="dashboard_pages/distributor.php">Setup Distributor</a></li>
                  <li><a href="dashboard_pages/rep.php">Setup Representative</a></li>
                  </ul>
                  <div id="ajax-content"></div>
		  ';
		  break;
		  case "Distributor":
		  echo '
		  <ul id="nav">
                  <li><a href="dashboard_pages/distributor.php">Setup Distributor</a></li>
                  <li><a href="dashboard_pages/rep.php">Setup Representative</a></li>
                  </ul>
                  <div id="ajax-content"></div>
                  ';
		  break;
		  case "Representative":
		  echo '
		  <ul id="nav">
                  <li><a href="dashboard_pages/rep.php">Setup Representative</a></li>
                  </ul>
                  <div id="ajax-content"></div>
                  '; 
	          break;
                  }
                  ?>
                  </div><!--stop panel 1-->
                
                
                
                <h3>Sales Goals</h3><!--start panel 2---------------------->
                 <div>
         
                   
                </div><!--stop panel 2-------------->
                
                
                
               <h3>Add and Edit Prospective Acccounts</h3><!--start panel 3-------------->
                <div>
               
                   </div><!--stop panel 3----------------->
    <h3>View Sales Person(s) and Accounts</h3><!--start panel 4--->
    <div>
    

    </div><!--stop panel 4-->
</div>
 
        
         	
                   </div><!--end content-->
	           <?php include 'footer.php' ; ?>
                  </div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>